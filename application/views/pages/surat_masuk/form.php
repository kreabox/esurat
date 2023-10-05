<div class="">
<div class="card card-primary card-outline">
	<!--begin::Form-->
	<form>
		<!--begin::Body-->
		<div class="card-body">
			<div class="row">
				<div class="col mb-3">
					<label for="templateName" class="form-label">Nomor Surat</label>
					<input type="text" class="form-control" id="nomor" name="nomor" aria-describedby="templateHelp" placeholder="Nomor Surat">
					<div id="templateHelp" class="form-text">
						Nomor Surat
					</div>
				</div>
				<div class="col mb-3">
					<label for="templateName" class="form-label">Perihal Surat</label>
					<input type="text" class="form-control" id="perihal" name="perihal" aria-describedby="templateHelp" placeholder="Perihal Surat">
					<div id="templateHelp" class="form-text">
						Perihal Surat
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col mb-3">
					<label for="templateName" class="form-label">Pengirim Surat</label>
					<input type="text" class="form-control" id="pengirim" name="pengirim" aria-describedby="pengirimSurat" placeholder="Nama/Asal Surat">
					<div id="pengirimSurat" class="form-text">
						Pengirim Surat
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
			<div class="">
				<label for="templateName" class="form-label">Scan/Foto Surat Masuk</label>
				<div class="input-group mb-3">
					<!-- Accept only PDF or Foto -->
					<input type="file" class="form-control" id="file" name="file" accept="application/pdf, image/*" />
					<label class="input-group-text" for="inputFileTempalate">Upload</label>
				</div>
			</div>
			
			<div class="mb-3">
					<label for="keteranganLabel" class="form-label">Keterangan/Catatan</label>
					<textarea class="form-control" id="keterangan" name="keterangan" cols="6" row="3"></textarea>
			</div>
		</div>
		<!--end::Body-->
		<!--begin::Footer-->
		<div class="card-footer">
			<div class="row">
				<div class="col-12">
					<button type="button" class="btn btn-primary float-end" id="saveSuratMasuk">Submit <i class="bi bi-save"></i></button>
				</div>
			</div>
		</div>
		<!--end::Footer-->
	</form>
	<!--end::Form-->
</div>
</div>
