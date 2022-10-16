
<!-- Content -->

<div class="container mb-5 wrapper flex-grow-1">

	<!-- Content's Header -->

	<div class="row border-bottom mb-4 pb-4">

		<!-- Title -->

		<div class="col-9" style="font-size: 32px;">
			Конференции
		</div>

		<!-- Add conferance -->

		<div class="col-3">
			<a href="/schedule/">
				<button type="button"
						class="btn btn-primary p-2 rounded shadow-sm w-100" 
						style="font-size: 14px;">
					Организовать конференцию
				</button>
			</a>
		</div>
	</div>

	<!-- List of Conferences -->

	<div>

		<?php foreach ($conferences as $conference): ?>

			<!-- Conference Start -->

			<div class="conference shadow p-4 px-5 mb-4 rounded">
				<div class="row align-items-center">
					<div class="col-8 text-left">

						<!-- Title -->

						<a href="/conference/<?= $conference['id']; ?>/" 
							class="conference_title mb-3 text-decoration-none text-body d-block" 
							style="font-size: 20px;">

							<?= $conference['title']; ?>
						</a>

						<!-- Date & Time -->

						<p class="conference_date mb-3" style="font-size: 18px;"> 
							<?= date('H:i Y-m-d', strtotime($conference['dateTimeEvent'])); ?>
						</p>

						<!-- Country -->

						<p class="conference_address text-muted">
							<?= $conference['country']; ?>
						</p>
					</div>

					<!-- Update Button -->

					<div class="col-2">
						<a href="/update/<?= $conference['id']; ?>/">
							<button type="button" 
								class="conference_btn btn d-none btn-primary p-2 rounded shadow-sm w-100" 
								style="font-size: 14px;">
								Редактировать
							</button>
						</a>
					</div>

					<!-- Delete Button -->
					
					<div class="col-2">
						<a href="#confirmModal-<?= $conference['id']; ?>" data-toggle="modal">
							<button type="button" 
								class="conference_btn btn d-none btn-primary p-2 rounded shadow-sm w-100" 
								style="font-size: 14px;">
								Удалить
							</button>
						</a>  
					</div>
				</div>

				<!-- Delete Confirm Modal -->

				<div id="confirmModal-<?= $conference['id']; ?>" class="modal fade">
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

			<!-- Conference End -->

		<?php endforeach; ?>

	</div>

	<!-- List of Conferences END -->

</div>

<!-- Content END -->