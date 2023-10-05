<div class="">
	<div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between">
				<h4 class="card-title">Daftar Template Surat</h4>
				<a href="<?= base_url('templating/create') ?>" class="btn btn-dark btn-sm">Tambah Template <i class="bi bi-plus"></i></a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-stripped dt" width="100%">
					<thead>
						<tr >
							<th>#</th>
							<th>Title</th>
							<th>Keterangan</th>
							<th>File Data</th>
							<th>Tanggal Upload</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1; foreach($templating as $a): ?>
							<tr>
								<td width="4%"><?= $n++ ?></td>
								<td><?= $a->nama_template  ?></td>
								<td><?= $a->keterangan  ?></td>
								<td><a class="btn btn-outline-dark btn-sm px-4 py-1" href="<?= base_url('doc_template/'.$a->file_template)  ?>"><?= $a->file_template  ?></a></td>
								<td><?= $a->tanggalUpload  ?></td>
								<td align="center" width="10%">
									<a href="<?= base_url('templating/edit/'.$a->templateId) ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Template"><i class="bi bi-pencil-square"></i></a>
									<button class="btn btn-sm btn-danger" type="button" onclick="deleteTemplate(<?= $a->templateId ?>)"><i class="bi bi-trash"></i></button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="mt-4">
	<div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between">
				<h4 class="card-title">Daftar Penandatangan Surat Keluar</h4>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddPenandatangan">
						Tambah Penandatangan <i class="bi bi-plus"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-stripped dt" width="100%">
					<thead>
						<tr >
							<th>#</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Jabatan</th>
							<th>Pangkat/Golongan</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1; foreach($penandatangan as $p): ?>
							<tr>
								<td width="4%"><?= $n++ ?></td>
								<td><?= $p->nama  ?></td>
								<td><?= $p->nip  ?></td>
								<td><?= $p->jabatan  ?></td>
								<td><?= $p->pangkat_golongan ?></td>
								<td align="center" width="10%">
									<button class="btn btn-sm btn-primary" type="button" onclick="updatePenandatangan(<?= $p->penandatanganId ?>)"><i class="bi bi-pencil-square"></i></button>
									<button class="btn btn-sm btn-danger" type="button" onclick="deletePenandatangan(<?= $p->penandatanganId ?>)"><i class="bi bi-trash"></i></button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAddPenandatangan" tabindex="-1" aria-labelledby="modalAddPenandatanganLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="modalAddPenandatanganLabel">Tambah Penandatangan Surat</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		<?= form_open('', array('id'=>'form_add_penandatangan')) ?>
			<div class="mb-3">
				<label for="templateName" class="form-label">Nama Lengkap (Beserta Gelar)</label>
				<input type="text" class="form-control" id="nama" name="nama" aria-describedby="templateHelp">
				<div id="templateHelp" class="form-text">
					Tentukan Nama Penandatangan Beserta Gelar Lengkap
				</div>
			</div>
			<div class="mb-3">
				<label for="templateName" class="form-label">Jabatan Penanda Tangan</label>
				<input type="text" class="form-control" id="jabatan" name="jabatan" aria-describedby="templateHelp">
				<div id="templateHelp" class="form-text">
					Tentukan Jabatan/Posisi Penandatangan
				</div>
			</div>
			<div class="mb-3">
				<label for="templateName" class="form-label">NIP (Nomor Induk Pegawai)</label>
				<input type="text" class="form-control" id="nip" name="nip" aria-describedby="templateHelp">
				<div id="templateHelp" class="form-text">
					Input NIP Penandatangan
				</div>
			</div>
			<div class="mb-3">
				<label for="templateName" class="form-label">Pangkat/Golongan ASN Penandatangan</label>
				<select name="pangkat_golongan" id="pangkat_golongan" class="form-control">
							<option value="">-- Pilih --</option>
							<option value="JURU MUDA/Ia">JURU MUDA/Ia</option>
							<option value="JURU MUDA TINGKAT I/Ib">JURU MUDA TINGKAT I/Ib</option>
							<option value="JURU/Ic">JURU/Ic</option>
							<option value="JURU TINGKAT I/Id">JURU TINGKAT I/Id</option>

							<option value="Pengatur MUDA/IIa">Pengatur MUDA/IIa</option>
							<option value="Pengatur MUDA TINGKAT I/IIb">Pengatur MUDA TINGKAT I/IIb</option>
							<option value="Pengatur/IIc">Pengatur/IIc</option>
							<option value="Pengatur TINGKAT I/IId">Pengatur TINGKAT I/IId</option>

							<option value="PENATA MUDA/IIIa">PENATA MUDA/IIIa</option>
							<option value="PENATA MUDA TINGKAT I/IIIb">PENATA MUDA TINGKAT I/IIIb</option>
							<option value="PENATA/IIIc">PENATA/IIIc</option>
							<option value="PENATA TINGKAT I/IIId">PENATA TINGKAT I/IIId</option>

							<option value="PEMBINA/IVa">PEMBINA/IVa</option>
							<option value="PEMBINA TINGKAT I/IVb">PEMBINA TINGKAT I/IVb</option>
							<option value="PEMBINA UTAMA MUDA/IVc">PEMBINA UTAMA MUDA/IVc</option>
							<option value="PEMBINA UTAMA MADYA/IVd">PEMBINA UTAMA MADYA/IVd</option>
							<option value="PEMBINA UTAMA/IVe">PEMBINA UTAMA/IVe</option>
				</select>
				<div id="templateHelp" class="form-text">
					Pilih Pangkat Penandatangan
				</div>
			</div>
		<?= form_close() ?>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="simpanPenandatangan">Save Data <i class="bi bi-save"></i></button>
	  </div>
	</div>
  </div>
</div>


<div class="modal fade" id="modalUpdatePenandatangan" tabindex="-1" aria-labelledby="modalUpdatePenandatanganLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="modalUpdatePenandatanganLabel">Update Penandatangan Surat</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		<?= form_open('', array('id'=>'form_update_penandatangan')) ?>
			<input type="hidden" name="id" id="id_u">
			<div class="mb-3">
				<label for="templateName" class="form-label">Nama Lengkap (Beserta Gelar)</label>
				<input type="text" class="form-control" id="nama_u" name="nama" aria-describedby="templateHelp">
				<div id="templateHelp" class="form-text">
					Tentukan Nama Penandatangan Beserta Gelar Lengkap
				</div>
			</div>
			<div class="mb-3">
				<label for="templateName" class="form-label">Jabatan Penanda Tangan</label>
				<input type="text" class="form-control" id="jabatan_u" name="jabatan" aria-describedby="templateHelp">
				<div id="templateHelp" class="form-text">
					Tentukan Jabatan/Posisi Penandatangan
				</div>
			</div>
			<div class="mb-3">
				<label for="templateName" class="form-label">NIP (Nomor Induk Pegawai)</label>
				<input type="text" class="form-control" id="nip_u" name="nip" aria-describedby="templateHelp">
				<div id="templateHelp" class="form-text">
					Input NIP Penandatangan
				</div>
			</div>
			<div class="mb-3">
				<label for="templateName" class="form-label">Pangkat/Golongan ASN Penandatangan</label>
				<select name="pangkat_golongan" id="pangkat_golongan_u" class="form-control">
							<option value="">-- Pilih --</option>
							<option value="JURU MUDA/Ia">JURU MUDA/Ia</option>
							<option value="JURU MUDA TINGKAT I/Ib">JURU MUDA TINGKAT I/Ib</option>
							<option value="JURU/Ic">JURU/Ic</option>
							<option value="JURU TINGKAT I/Id">JURU TINGKAT I/Id</option>

							<option value="Pengatur MUDA/IIa">Pengatur MUDA/IIa</option>
							<option value="Pengatur MUDA TINGKAT I/IIb">Pengatur MUDA TINGKAT I/IIb</option>
							<option value="Pengatur/IIc">Pengatur/IIc</option>
							<option value="Pengatur TINGKAT I/IId">Pengatur TINGKAT I/IId</option>

							<option value="PENATA MUDA/IIIa">PENATA MUDA/IIIa</option>
							<option value="PENATA MUDA TINGKAT I/IIIb">PENATA MUDA TINGKAT I/IIIb</option>
							<option value="PENATA/IIIc">PENATA/IIIc</option>
							<option value="PENATA TINGKAT I/IIId">PENATA TINGKAT I/IIId</option>

							<option value="PEMBINA/IVa">PEMBINA/IVa</option>
							<option value="PEMBINA TINGKAT I/IVb">PEMBINA TINGKAT I/IVb</option>
							<option value="PEMBINA UTAMA MUDA/IVc">PEMBINA UTAMA MUDA/IVc</option>
							<option value="PEMBINA UTAMA MADYA/IVd">PEMBINA UTAMA MADYA/IVd</option>
							<option value="PEMBINA UTAMA/IVe">PEMBINA UTAMA/IVe</option>
				</select>
				<div id="templateHelp" class="form-text">
					Pilih Pangkat Penandatangan
				</div>
			</div>
		<?= form_close() ?>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="simpanUpdatePenandatangan">Save Data <i class="bi bi-save"></i></button>
	  </div>
	</div>
  </div>
</div>


