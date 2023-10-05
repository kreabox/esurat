<div class="">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-stripped dt" width="100%">
					<thead>
						<tr >
							<th>#</th>
							<th>Tanggal Dibuat</th>
							<th>Nomor Surat</th>
							<th>Perihal</th>
							<th>Kepada</th>
							<th>File Template</th>
							<th>Tanggal Surat</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1; foreach($surat_keluar as $a): ?>
							<tr>
								<td><?= $n++ ?></td>
								<td><?= $a->createAt  ?></td>
								<td><?= $a->nomor  ?></td>
								<td><?= $a->perihal ?></td>
								<td><?= $a->kepada ?></td>
								<td><?= $a->file ?? 'Template Belum Ditentukan' ?></td>
								<td><?= $a->tanggal ?></td>
								<td>
									<a target="_blank" href="<?= base_url('cetak/surat_keluar/'.$a->suratkeluarId) ?>" class="btn btn-sm btn-dark"><i class="bi bi-printer"></i></a>
									<a href="<?= base_url('surat_keluar/edit/'.$a->suratkeluarId) ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
									<button type="button" class="btn btn-sm btn-danger" onclick="hapusSuratKeluar('<?= $a->suratkeluarId ?>')"><i class="bi bi-trash"></i></button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
