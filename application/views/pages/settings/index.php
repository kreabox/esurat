<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<div class=" d-flex justify-content-between">
					<h3 class="card-title">Manage Users</h3>
					<button data-bs-toggle="modal" data-bs-target="#addNewUserModal" class="btn btn-primary">Create User <i class="bi bi-people"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="table-resposive">
					<table class="table table-hover table-stripped dt" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Username</th>
								<th>Nama Lengkap</th>
								<th>Role</th>
								<th>Jabatan</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $n = 1; foreach($users as $user): ?>
							<tr>
								<td align="center" width="4%"><?= $n++ ?></td>
								<td><?= $user->username ?></td>
								<td><?= $user->nama_lengkap ?></td>
								<td>
									<?php if($user->role == 'admin'): ?>
									<span class="badge bg-danger"><?= strtoupper($user->role) ?></span>
									<?php else: ?>
									<span class="badge bg-success"><?= strtoupper($user->role) ?></span>
									<?php endif; ?>
								</td>
								<td><?= $user->jabatan ?? 'NOT DEFINED' ?></td>
								<td  align="center" width="10%">
									<button class="btn btn-sm btn-warning" type="button" onclick="updatePassUser(<?= $user->id ?>)"  data-toggle="tooltip" data-placement="top" title="Reset Password User"><i class="bi bi-lock"></i></button>
									<button class="btn btn-sm btn-primary" type="button" onclick="updateUser(<?= $user->id ?>)"><i class="bi bi-pencil-square"></i></button>
									<button class="btn btn-sm btn-danger" type="button" onclick="deleteUser(<?= $user->id ?>)"><i class="bi bi-trash"></i></button>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="col"></div> -->
</div>


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalUpdatePassUser" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalUpdatePassword" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalUpdatePassword">Update Password User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?= form_open('', array('id'=>'form_update_password')) ?>
				<input type="hidden" name="id" id="id">
				<div class="form-group">
					<label for="password">Password Baru</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="saveUpdatePassUser">Save Password <i class="bi bi-lock"></i></button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUpdateUser" tabindex="-1" aria-labelledby="modalUpdateUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="modalUpdateUserLabel">Modal title</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
			<?= form_open('', array('id'=>'form_update_user')) ?>
			<input type="hidden" name="id" id="id_u">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username_u" class="form-control">
			</div>
			<div class="form-group">
				<label for="nama_lengkap">Nama Lengkap</label>
				<input type="text" name="nama_lengkap" id="nama_lengkap_u" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email_u" class="form-control">
			</div>
			<div class="form-group">
				<label for="role">Role</label>
				<select name="role" id="role_u" class="form-control">
					<option value="">-- Select Role --</option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</div>
			<div class="form-group">
				<label for="status">Jabatan</label>
				<select name="jabatan" id="jabatan_u" class="form-control">
					<option value="">-- Jabatan --</option>
					<option value="administrator">Administrator</option>
				</select>
			</div>
		<?= form_close() ?>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="saveUpdateUser">Save Changes <i class="bi bi-save"></i></button>
	  </div>
	</div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNewUserModal" tabindex="-1" aria-labelledby="addNewUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="addNewUserModalLabel">Add New User</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		 <?= form_open('', array('id'=>'form_add_user')) ?>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="nama_lengkap">Nama Lengkap</label>
				<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="role">Role</label>
				<select name="role" id="role" class="form-control">
					<option value="">-- Select Role --</option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</div>
			<div class="form-group">
				<label for="status">Jabatan</label>
				<select name="status" id="status" class="form-control">
					<option value="">-- Jabatan --</option>
					<option value="administrator">Administrator</option>
				</select>
			</div>
		<?= form_close() ?>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="saveNewUser">Save Data <i class="bi bi-save"></i></button>
	  </div>
	</div>
  </div>
</div>
