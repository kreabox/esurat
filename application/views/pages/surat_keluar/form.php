<div class="">
<div class="card card-primary card-outline">
	<!--begin::Form-->
		<?= form_open('', array('id'=>'form_add_surat_keluar')) ?>
		<!--begin::Body-->
		<div class="card-body">
			<div class="row">
				<div class="col mb-3">
					<label for="templateName" class="form-label">Nomor Surat</label>
					<input type="text" class="form-control" id="nomor" name="nomor" aria-describedby="templateHelp">
					<div id="templateHelp" class="form-text">
						Nomor Surat
					</div>
				</div>
				<div class="col mb-3">
					<label for="templateName" class="form-label">Perihal Surat</label>
					<input type="text" class="form-control" id="perihal" name="perihal" aria-describedby="templateHelp">
					<div id="templateHelp" class="form-text">
						Perihal Surat
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col mb-3">
					<label for="templateName" class="form-label">Kepada/Tujuan (atas Nama/Jabatan)</label>
					<input type="text" class="form-control" id="kepada" name="kepada" aria-describedby="templateHelp">
					<div id="templateHelp" class="form-text">
						Surat Ditujukan Kepada/Tujuan atas Nama?
					</div>
				</div>
				<div class="col mb-3">
					<label for="templateName" class="form-label">Cq. Surat (<i>Casu Quo</i>)</label>
					<input type="text" class="form-control" id="cq" name="cq" aria-describedby="templateHelp">
					<div id="templateHelp" class="form-text">
						Perihal Surat
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col mb-3">
					<label for="templateName" class="form-label">Alamat Tujuan</label>
					<textarea type="text" class="form-control" id="alamat" name="alamat" cols="4" row="2" aria-describedby="templateHelp"></textarea>
					<div id="templateHelp" class="form-text">
						Surat Ditujukan Pada Alamat?
					</div>
				</div>
				<div class="col mb-3">
					<label for="templateName" class="form-label">Tanggal Surat</label>
					<input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggalSurat">
					<div id="tanggalSurat" class="form-text">
						Tanggal Surat
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col mb-3">
					<label for="templateName" class="form-label">Sifat Surat</label>
					<div class="input-group mb-3">
						<select name="sifat" id="sifat" class="form-control">
							<option value="">-- Pilih Sifat  Surat --</option>
							<option value="PENTING">PENTING</option>
							<option value="RAHASIA">RAHASIA</option>
							<option value="SEGERA">SEGERA</option>
							<option value="UNDANGAN">UNDANGAN</option>
							<option value="PEMBERITAHUAN">PEMBERITAHUAN</option>
							<option value="LAIN-LAIN">LAIN-LAIN</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col mb-3">
					<label for="templateName" class="form-label">Template Surat</label>
					<select name="templateId" id="templateId" class="form-control">
						<option value="">-- Pilih Template Surat --</option>
						<?php foreach($template as $t): ?>
							<option value="<?= $t->templateId ?>"><?= $t->nama_template ?></option>
						<?php endforeach; ?>
					</select>
					
				</div>
				<div class="col mb-3">
					<label for="templateName" class="form-label">Pejabat Penandatangan Surat</label>
					<select name="penandatanganId" id="penandatanganId" class="form-control">
						<option value="">-- Pilih Penandatangan  Surat --</option>
						<?php foreach($penandatangan as $p): ?>
							<option value="<?= $p->penandatanganId ?>"><?= $p->nama ?> - <?= $p->jabatan ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			
			<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Keterangan/Catatan/Memo</label>
					<textarea class="form-control" id="keterangan" name="keterangan" cols="6" row="3"></textarea>
			</div>
		</div>
		<?= form_close() ?>
		<!--end::Body-->
		<!--begin::Footer-->
		<div class="card-footer">
			<div class="row">
				<div class="col-12">
					<button type="button" class="btn btn-primary float-end" id="saveSuratKeluar">Submit <i class="bi bi-save"></i></button>
				</div>
			</div>
		</div>
		<!--end::Footer-->
	
	<!--end::Form-->
</div>
</div>
