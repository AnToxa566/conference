
<!-- Content -->

<div class="container mb-5 wrapper flex-grow-1">

	<!-- List of Options -->

	<div class="mb-4">

		<!-- Title -->

		<div class="row px-5 pb-4 mb-4 border-bottom">
			<div class="col-3 font-weight-bold text-muted">
				Тема
			</div>

			<div class="col-9">
				<?= $conference['title']; ?>
			</div>
		</div>

		<!-- Date & Time -->

		<div class="row px-5 pb-4 mb-4 border-bottom">
			<div class="col-3 font-weight-bold text-muted">
				Время
			</div>

			<div class="col-9">
				<?= date('H:i Y-m-d', strtotime($conference['dateTimeEvent'])); ?>
			</div>
		</div>

		<!-- Address -->

		<div class="row px-5 pb-4 mb-4 border-bottom">
			<div class="col-3 font-weight-bold text-muted">
				Адрес
			</div>

			<!-- Latitude & Longitude -->

			<div class="col-9">
				<p class="mb-4">
					<?php 
						if ($conference['latitude'] == NULL || $conference['longitude'] == NULL) {
							echo "Адрес не установлен";
						}
						else {
							echo $conference['latitude'] . ", " . $conference['longitude'];
						}
					?>
				</p>

				<!-- Map -->

				<div id="map" class="shadow-sm rounded w-100" style="height: 300px"></div>

				<script type="text/javascript">
					var pos, opt, map, marker;

					function initMap() {
						<?php 
							if ($conference['latitude'] == NULL || $conference['longitude'] == NULL) {
								?>
									pos = { lat: 50.450087, lng: 30.524010 }
									opt = { center: pos, zoom: 12, }
								<?php
							}
							else {
								?>
									pos = { lat: <?= $conference['latitude']; ?>, 
											lng: <?= $conference['longitude']; ?> }

									opt = { center: pos, zoom: 15 }

									marker = new google.maps.Marker({
										position: pos
									});
								<?php
							}
						?>

						map = new google.maps.Map(document.getElementById("map"), opt);
						marker != null ? marker.setMap(map) : marker = null;
					}
				</script>
			</div>
		</div>

		<!-- Country -->

		<div class="row px-5 pb-4 mb-4 border-bottom">
			<div class="col-3 font-weight-bold text-muted">
				Страна
			</div>

			<div class="col-9">
				<?= $conference['country']; ?>
			</div>
		</div>

	</div>

	<!-- List of Options END -->



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

		<!-- Update -->

		<div class="col-2">
			<a href="/update/<?= $conference['id']; ?>/">
				<button type="button" 
					class="btn btn-primary p-2 rounded shadow-sm w-100" 
					style="font-size: 14px;">
					Редактировать
				</button>
			</a>
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

	</div>

	<!-- Buttons END -->

</div>

<!-- Content END -->