
<!-- Content -->

<div class="container mb-5 wrapper flex-grow-1">

	<!-- Content's Title -->

	<div class="row border-bottom mb-5 pb-4">
		<div class="col-9" style="font-size: 32px;">
			Организовать конференцию
		</div>
	</div>

	<!-- Form of Options -->

	<form action="/schedule/save/" method="POST" class="mb-4">

		<!-- Title -->

		<div class="row mb-4 align-items-center">
			<div class="col-2">
				Тема <span class="text-danger">*</span>
			</div>

			<div class="col-10">
				<input type="text"
						name="title" 
						class="form-control"
						placeholder="Введите тему" 
						minlength="2" maxlength="255" required>
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
				min="<?php echo date('Y-m-d'); ?>" required>
			</div>

			<div class="col-5">
				<input type="time"
						name="time"
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
						class="form-control"
						oninput="updateMap()"
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
				var pos, opt;

				function initMap() {
					pos = { lat: 50.450087, lng: 30.524010 }
					opt = { center: pos, zoom: 12 }

					map = new google.maps.Map(document.getElementById("map"), opt);
					marker = new google.maps.Marker({
						map: map,
						draggable: true
					});

					marker.addListener("dragend", () => {
					    input_lat.value = marker.getPosition().lat().toPrecision(6);
			    		input_lng.value = marker.getPosition().lng().toPrecision(6);
					});

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
						
						marker.setPosition({ lat: latitude, lng: longitude });
						map.panTo({ lat: latitude, lng: longitude });
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
				<a href="/conferences/">
					<button type="button"
						class="btn btn-primary p-2 rounded shadow-sm w-100"
						style="font-size: 14px;">
						Назад
					</button>
				</a>
			</div>

			<!-- Save -->

			<div class="col-2">
				<input type="submit" 
						name="submit" value="Сохранить" 
						class="btn btn-primary p-2 rounded shadow-sm w-100" 
						style="font-size: 14px;"/>
			</div>
		</div>

	</form>

	<!-- Form of Options END -->

</div>

<!-- Content END -->