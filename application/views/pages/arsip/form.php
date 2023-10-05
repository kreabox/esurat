<div class="">
<div class="card card-primary card-outline">
	<!--begin::Form-->
	<form>
		<!--begin::Body-->
		<div class="card-body">
			<div class="mb-3">
				<label for="templateName" class="form-label">Title/Nama Template</label>
				<input type="text" class="form-control" id="nama_template" name="nama_template" aria-describedby="templateHelp">
				<div id="templateHelp" class="form-text">
					Tentukan Identifikasi/Nama /Judul Dari Template
				</div>
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Keterangan/Catatan</label>
				<textarea class="form-control" id="keterangan" name="keterangan" cols="6" row="3"></textarea>
			</div>
			<div class="input-group mb-3">
				<input type="file" class="form-control" id="inputFileTemplate" name="inputFileTemplate">
				<label class="input-group-text" for="inputFileTempalate">Upload</label>
			</div>
			<div class="mb-3 form-check">
				<label class="form-check-label" for="exampleCheck1">Pastikan File Mengandung Variabel Sesuai Dengan Ketentuan</label>
			</div>
		</div>
		<!--end::Body-->
		<!--begin::Footer-->
		<div class="card-footer">
			<div class="row">
				<div class="col-12">
					<button type="button" class="btn btn-primary float-end">Submit <i class="bi bi-save"></i></button>
				</div>
			</div>
		</div>
		<!--end::Footer-->
	</form>
	<!--end::Form-->
</div>
</div>
