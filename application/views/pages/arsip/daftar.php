<div class="">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-stripped dt" width="100%">
					<thead>
						<tr >
							<th>#</th>
							<th>Nomor Surat</th>
							<th>Perihal</th>
							<th>Pengirim</th>
							<th>File Data</th>
							<th>Status</th>
							<th>Tanggal Diarsipkan</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1; foreach($arsips as $a): ?>
							<tr>
								<td><?= $n++ ?></td>
								<td><?= $a->nomor  ?></td>
								<td><?= $a->perihal ?></td>
								<td><?= $a->pengirim ?></td>
								<td><?= $a->file_data ?></td>
								<td><?= $a->status ?></td>
								<td><?= $a->tgl_dibuat ?></td>
								<td></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
