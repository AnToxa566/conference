
<!-- Content -->

<div class="container mb-5 wrapper flex-grow-1">

	<!-- Content's Title -->

	<div class="row border-bottom mb-5 pb-4">
		<div class="col-9" style="font-size: 32px;">
			Редактировать "<?= $conference['title']; ?>"
		</div>
	</div>

	<!-- Form of Options -->

	<form action="/update/save/<?= $conference['id']; ?>/" method="POST" class="mb-4">

		<!-- Title -->

		<div class="row mb-4 align-items-center">
			<div class="col-2">
				Тема <span class="text-danger">*</span>
			</div>

			<div class="col-10">
				<input type="text"
						name="title"
						class="form-control"
						value="<?= $conference['title']; ?>" 
						placeholder="Введите тему" required>
			</div>
		</div>

		<!-- Date & Time -->

		<div class="row mb-4 align-items-center">
			<div class="col-2">
				Когда <span class="text-danger">*</span>
			</div>

			<div class="col-5">
				<input type="date"
						name="date" 
						class="form-control"
						value="<?= date('Y-m-d', strtotime($conference['dateTimeEvent'])); ?>" 
						min="<?php echo date('Y-m-d'); ?>" required>
			</div>

			<div class="col-5">
				<input type="time"
						name="time"
						value="<?= date('H:i', strtotime($conference['dateTimeEvent'])); ?>" 
						class="form-control" required>
			</div>
		</div>

		<!-- Address -->

		<div class="row mb-3 align-items-center">
			<div class="col-2">
				Адрес
			</div>

			<!-- Latitude -->

			<div class="col-5">
				<input type="number" 
						name="latitude"
						id="get_lat"
						oninput="updateMap()"
						class="form-control"
						value="<?= $conference['latitude'] == NULL ? '' : $conference['latitude']; ?>"
						min="-85" max="85"
						step="0.0001"
						placeholder="Широта">
			</div>

			<!-- Longitude -->

			<div class="col-5">
				<input type="number" 
						name="longitude"
						id="get_lng"
						class="form-control"
						oninput="updateMap()"
						value="<?= $conference['longitude'] == NULL ? '' : $conference['longitude']; ?>"
						min="-180" max="180"
						step="0.0001"
						placeholder="Долгота">
			</div>
		</div>

		<!-- Map -->

		<div class="row mb-4">
			<div id="map" class="col-10 offset-2 shadow-sm rounded w-100" style="height: 300px"></div>

			<script type="text/javascript">
				var input_lat = document.getElementById('get_lat');
				var input_lng = document.getElementById('get_lng');

				var map, marker;
				var latitude, longitude;

				function initMap() {
					marker = new google.maps.Marker({
						draggable: true
					});

					marker.addListener("dragend", () => {
					    input_lat.value = marker.getPosition().lat().toPrecision(6);
			    		input_lng.value = marker.getPosition().lng().toPrecision(6);
					});

					<?php
						if ($conference['latitude'] == NULL || $conference['longitude'] == NULL) {
							?>
								pos = { lat: 50.450087, lng: 30.524010 }
								opt = { center: pos, zoom: 12 }
							<?php
						}
						else {
							?>
								pos = { lat: <?= $conference['latitude'] ?>, 
										lng: <?= $conference['longitude'] ?> }
								opt = { center: pos, zoom: 15 }

								marker.setPosition(pos);
							<?php
						}
					?>

					map = new google.maps.Map(document.getElementById("map"), opt);
					marker.setMap(map);

					map.addListener("click", (e) => {
						marker.setMap(map);

						marker.setPosition(e.latLng);
						map.panTo(e.latLng);

					    input_lat.value = marker.getPosition().lat().toPrecision(6);
			    		input_lng.value = marker.getPosition().lng().toPrecision(6);
					});
				}

				function updateMap() {
					if (input_lat.value == '' || input_lng.value == '') {
						marker.setMap(null);
					}
					else {
						marker.setMap(map);

						latitude = input_lat.value;
						longitude = input_lng.value;

						latitude = (latitude && +latitude) || 50.450087;
						longitude = (longitude && +longitude) || 30.524010;

						map.setCenter({
					        lat: latitude,
					        lng: longitude
					    });

					    marker.setPosition({lat: latitude, lng: longitude});
					}
				}
			</script>
		</div>

		<!-- Map END -->



		<!-- Country -->

		<div class="row mb-4 align-items-center">
			<div class="col-2">
				Страна <span class="text-danger">*</span>
			</div>

			<div class="col-10">
				<select class="custom-select" name="country" required>
				    <option value="" disabled selected>Выбирете страну</option>
				    <option value="<?= $conference['country'] ?>" selected><?= $conference['country'] ?></option>

				    <?php foreach ($contries as $country): ?>

				    	<option value="<?= $country['country_name']; ?>"><?= $country['country_name']; ?></option>

				    <?php endforeach; ?>

				</select>
			</div>
		</div>

		<!-- Buttons -->

		<div class="row">

			<!-- Back -->

			<div class="col-2">
				<button type="button"
					onclick="history.back()"
					class="btn btn-primary p-2 rounded shadow-sm w-100"
					style="font-size: 14px;">
					Назад
				</button>
			</div>

			<!-- Save -->

			<div class="col-2">
				<input type="submit" 
						name="submit" value="Сохранить" 
						class="btn btn-primary p-2 rounded shadow-sm w-100" 
						style="font-size: 14px;"/>
			</div>

			<!-- Delete -->

			<div class="col-2">
				<a href="#confirmModal" data-toggle="modal">
					<button type="button" 
						class="btn btn-primary p-2 rounded shadow-sm w-100" 
						style="font-size: 14px;">
						Удалить
					</button>
				</a>
			</div>
		</div>

		<!-- Buttons END -->



		<!-- Delete Confirm Modal -->

		<div id="confirmModal" class="modal fade">
			<div class="modal-dialog modal-confirm">
				<div class="modal-content">

					<!-- Modal Header -->

					<div class="modal-header">			
						<h4 class="modal-title text-body" style="font-size: 22px">Вы уверены?</h4>	
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>

					<!-- Modal Body -->

					<div class="modal-body">
						<p class="text-muted mb-3">Вы уверены, что хотите удалить эту конференцию?</p>
					</div>

					<!-- Modal Footer -->

					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Отмена</button>
						<a href="/conference/delete/<?= $conference['id']; ?>/">
							<button type="button" class="btn btn-danger">Удалить</button>
						</a>
					</div>
				</div>
			</div>
		</div>

	</form>

	<!-- Form of Options END -->

</div>

<!-- Content END -->