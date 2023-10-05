<div class="">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-stripped dt" width="100%">
					<thead>
						<tr >
							<th>#</th>
							<th>Nomor Surat</th>
							<th>Tanggal Surat</th>
							<th>Perihal</th>
							<th>Pengirim</th>
							<th>File Data</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1; foreach($surat_masuk as $a): ?>
							<tr>
								<td><?= $n++ ?></td>
								<td><?= $a->nomor  ?></td>
								<td><?= $a->tanggal ?></td>
								<td><?= $a->perihal ?></td>
								<td><?= $a->pengirim ?></td>
								<td>
									<?php if($a->file == ''): ?>
										<span class="badge bg-danger py-2 px-3">TIDAK ADA FILE</span>
									<?php else: ?>
									<a href="<?= base_url('upload/surat_masuk/'.$a->file) ?>" target="_blank" class="btn btn-sm btn-outline-dark"><i class="bi bi-file-earmark-pdf"></i> Lihat Surat</a>
									<?php endif; ?>
								</td>
								<td>
									<?php if($a->status == 'ARCHIVED'): ?>
										<span class="badge bg-success py-2 px-3">DIARSIPKAN</span>
									<?php else: ?>
										<span class="badge bg-primary py-2 px-3">DISIMPAN</span>
									<?php endif; ?>
								</td>
								<td>
									<a href="<?= base_url('surat_masuk/edit/'.$a->suratmasukId) ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i> Edit</a>
									<button type="button" class="btn btn-sm btn-danger" onclick="hapusSuratMasuk(<?= $a->suratmasukId ?>)"><i class="bi bi-trash"></i></button> 
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
