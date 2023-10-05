<div class="row">
	<div class="col-lg-6">
		<!-- <div class="card mb-4">
			<div class="card-header border-0">
				<div class="d-flex justify-content-between">
					<h3 class="card-title">Online Store Visitors</h3>
					<a href="javascript:void(0);">View Report</a>
				</div>
			</div>
			<div class="card-body">
				<div class="d-flex">
					<p class="d-flex flex-column">
						<span class="fw-bold fs-5">820</span>
						<span>Visitors Over Time</span>
					</p>
					<p class="ms-auto d-flex flex-column text-end">
						<span class="text-success">
							<i class="bi bi-arrow-up"></i> 12.5%
						</span>
						<span class="text-secondary">Since last week</span>
					</p>
				</div>

				<div class="position-relative mb-4">
					<div id="visitors-chart"></div>
				</div>

				<div class="d-flex flex-row justify-content-end">
					<span class="me-2">
						<i class="bi bi-square-fill text-primary"></i> This Week
					</span>

					<span>
						<i class="bi bi-square-fill text-secondary"></i> Last Week
					</span>
				</div>
			</div>
		</div> -->
		<div class="card">
			<div class="card-header border-0">
				<h3 class="card-title">Aktifitas Terakhir Sistem</h3>
				<div class="card-tools">
					<a href="#" class="btn btn-tool btn-sm">
						<i class="bi bi-download"></i>
					</a>
					<a href="#" class="btn btn-tool btn-sm">
						<i class="bi bi-list"></i>
					</a>
				</div>
			</div>
			<div class="card-body table-responsive p-0">
				<table class="table table-striped align-middle">
					<thead>
						<tr>
							<th>Datetime</th>
							<th>Activity</th>
							<th>Controller</th>
							<th>Database</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($activity as $key => $value): ?>
							<tr>
								<td><?= $value->datetime ?></td>
								<td><?= $value->activity ?></td>
								<td><?= $value->controller ?></td>
								<td><?= $value->model ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.col-md-6 -->
	<div class="col-lg-6">
		<!-- <div class="card mb-4">
			<div class="card-header border-0">
				<div class="d-flex justify-content-between">
					<h3 class="card-title">Sales</h3>
					<a href="javascript:void(0);">View Report</a>
				</div>
			</div>
			<div class="card-body">
				<div class="d-flex">
					<p class="d-flex flex-column">
						<span class="fw-bold fs-5">$18,230.00</span>
						<span>Sales Over Time</span>
					</p>
					<p class="ms-auto d-flex flex-column text-end">
						<span class="text-success">
							<i class="bi bi-arrow-up"></i> 33.1%
						</span>
						<span class="text-secondary">Since Past Year</span>
					</p>
				</div>

				<div class="position-relative mb-4">
					<div id="sales-chart"></div>
				</div>

				<div class="d-flex flex-row justify-content-end">
					<span class="me-2">
						<i class="bi bi-square-fill text-primary"></i> This year
					</span>

					<span>
						<i class="bi bi-square-fill text-secondary"></i> Last year
					</span>
				</div>
			</div>
		</div> -->
		<div class="card">
			<div class="card-header border-0">
				<h3 class="card-title">Data Store Overview</h3>
				<div class="card-tools">
					<a href="#" class="btn btn-sm btn-tool">
						<i class="bi bi-download"></i>
					</a>
					<a href="#" class="btn btn-sm btn-tool">
						<i class="bi bi-list"></i>
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center border-bottom mb-3">
					<p class="text-success fs-2">
						<i class="bi bi-4x bi-download"></i>
					</p>
					<p class="d-flex flex-column text-end">
						<span class="fw-bold">
							<i class="ion ion-android-arrow-up text-success"></i> <?= $surat_masuk ?>
						</span>
						<span class="text-secondary">SURAT MASUK DISIMPAN</span>
					</p>
				</div>
				<!-- /.d-flex -->
				<div class="d-flex justify-content-between align-items-center border-bottom mb-3">
					<p class="text-warning fs-2">
						<i class="bi bi-4x bi-upload"></i>
					</p>
					<p class="d-flex flex-column text-end">
						<span class="fw-bold">
							<i class="ion ion-android-arrow-up text-warning"></i><?= $surat_keluar ?>
						</span>
						<span class="text-secondary">SURAT KELUAR DIBUAT</span>
					</p>
				</div>
				<!-- /.d-flex -->
				<div class="d-flex justify-content-between align-items-center mb-0">
					<p class="text-dark fs-2">
							<i class="bi bi-4x bi-clipboard"></i>
					</p>
					<p class="d-flex flex-column text-end">
						<span class="fw-bold">
							<i class="ion ion-android-arrow-down text-danger"></i>
							<?= $template ?>
						</span>
						<span class="text-secondary">TEMPLATE SURAT DISIMPAN</span>
					</p>
				</div>
				<!-- /.d-flex -->
			</div>
		</div>
	</div>
	<!-- /.col-md-6 -->
</div>
