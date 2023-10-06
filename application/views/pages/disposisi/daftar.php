<div class="">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-stripped dt" width="100%">
					<thead>
						<tr >
							<th>#</th>
							<th>Tanggal Disposisi</th>
							<th>Nomor Surat</th>
							<th>Pengirim</th>
							<th>Perihal</th>
							<th>Disposisi Kepada</th>
							<th>Disposisi Dari</th>
							<th>Memo Disposisi</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1; foreach($disposisi as $a): ?>
							<tr>
								<td><?= $n++ ?></td>
								<td><?= $a->tanggal  ?></td>
								<td><?= $a->nomor  ?></td>
								<td><?= $a->pengirim ?></td>
								<td><?= $a->perihal ?></td>
								<td><?= $a->kepada ?></td>
								<td><?= $a->dari ?></td>
								<td><?= $a->memo ?></td>
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
