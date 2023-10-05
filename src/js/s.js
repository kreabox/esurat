$('#saveNewUser').on('click',  () =>{
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, save it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/add_user`,
				type: 'POST',
				data: $('#form_add_user').serialize(),
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Saved!',
							'Your user has been saved.',
							'success'
						)
						$('#form_add_user')[0].reset();
						window.location.reload();
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			})
		}
	});
});
$('#saveUpdateUser').on('click',  () =>{
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, save it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/update_user`,
				type: 'POST',
				data: $('#form_update_user').serialize(),
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Saved!',
							'Your user has been saved.',
							'success'
						)
						$('#form_update_user')[0].reset();
						window.location.reload();
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			})
		}
	});
});

$('#saveUpdatePassUser').on('click',  () =>{
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, save it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/update_pass_user`,
				type: 'POST',
				data: $('#form_update_password').serialize(),
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Saved!',
							'Your user has been saved.',
							'success'
						)
						$('#form_update_password')[0].reset();
						window.location.reload();
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			})
		}
	});
});


function updatePassUser(id) {
	$.ajax({
		url: `${base_url}api/get_user`,
		data: {
			id: id
		},
		type: 'POST',
		success: (data)=> {
			console.log(data)
			if (data.status === true) {
				$('#id').val(data.data.id);
				$('#modalUpdatePassUser').modal('show')
			} else {
				Swal.fire('Error', data.message, 'error')
			}
		},
		error: (err)=> {
			console.log(err)
			Swal.fire('Error', 'Server Error', 'error')
		}
	});
}

function updateUser(id) {
	$.ajax({
		url: `${base_url}api/get_user`,
		data: {
			id: id
		},
		type: 'POST',
		success: (data)=> {
			console.log(data)
			if (data.status === true) {
				$('#id_u').val(data.data.id);
				$('#nama_lengkap_u').val(data.data.nama_lengkap);
				$('#username_u').val(data.data.username);
				$('#jabatan_u').val(data.data.jabatan);
				$('#email_u').val(data.data.email);
				$('#role_u').val(data.data.role);
				$('#modalUpdateUser').modal('show')
			} else {
				Swal.fire('Error', data.message, 'error')
			}
		},
		error: (err)=> {
			console.log(err)
			Swal.fire('Error', 'Server Error', 'error')
		}
	})
}

function deleteUser(id) {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/delete_user`,
				data: {
					id: id
				},
				type: 'POST',
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Deleted!',
							'Your user has been deleted.',
							'success'
						)
						window.location.reload();
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			})
		}
	});
}



$('#simpanTemplate').on('click',  () =>{
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, save it!'
	}).then((result) => {
		if (result.isConfirmed) {
			var formData = new FormData();
			formData.append('file', $('#file')[0].files[0]);
			formData.append('nama', $('#nama').val());
			formData.append('keterangan', $('#keterangan').val());
			$.ajax({
				url: `${base_url}api/add_template`,
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Saved!',
							'Your template has been saved.',
							'success'
						)
						window.location.replace(`${base_url}/templating`);
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			})
		}
	});
})
function deleteTemplate(id){
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/delete_template`,
				data: {
					id: id
				},
				type: 'POST',
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Deleted!',
							'Your template has been deleted.',
							'success'
						)
						window.location.replace(`${base_url}/templating`);
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			})
		}
	});
}


$('#simpanPenandatangan').on('click', ()=> {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, save it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/add_penandatangan`,
				data: $('#form_add_penandatangan').serialize(),
				type: 'POST',
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Saved Successfully!',
							'Your Signer has been Saved.',
							'success'
						)
						window.location.reload();
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			});
		}
	});
});
$('#simpanUpdatePenandatangan').on('click', ()=> {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, save it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/update_penandatangan`,
				data: $('#form_update_penandatangan').serialize(),
				type: 'POST',
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Saved Successfully!',
							'Your Signer has been Saved.',
							'success'
						)
						window.location.reload();
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			});
		}
	});
});


function updatePenandatangan(id){
	$.ajax({
		url: `${base_url}api/get_penandatangan`,
		data: {
			id: id
		},
		type: 'POST',
		success: (data)=> {
			console.log(data)
			if (data.status === true) {
				$('#id_u').val(data.data.penandatanganId);
				$('#nama_u').val(data.data.nama);
				$('#jabatan_u').val(data.data.jabatan);
				$('#pangkat_golongan_u').val(data.data.pangkat_golongan);
				$('#nip_u').val(data.data.nip);
				$('#modalUpdatePenandatangan').modal('show');
			} else {
				Swal.fire('Error', data.message, 'error')
			}
		},
		error: (err)=> {
			console.log(err)
			Swal.fire('Error', 'Server Error', 'error')
		}
	})
}
function deletePenandatangan(id){
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/delete_penandatangan`,
				data: {
					id: id
				},
				type: 'POST',
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Deleted!',
							'Your Signer has been deleted.',
							'success'
						)
						window.location.reload();
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			})
		}
	});
}

$('#saveSuratMasuk').on('click', ()=> {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Continue!'
	}).then((result) => {
		if (result.isConfirmed) {
			var formData = new FormData();
			formData.append('file', $('#file')[0].files[0]);
			formData.append('pengirim', $('#pengirim').val());
			formData.append('tanggal', $('#tanggal').val());
			formData.append('nomor', $('#nomor').val());
			formData.append('perihal', $('#perihal').val());
			formData.append('keterangan', $('#keterangan').val());
			$.ajax({
				url: `${base_url}api/add_surat_masuk`,
				type: 'POST',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Saved Successfully!',
							'Your Letter has been Saved.',
							'success'
						)
						window.location.replace(`${base_url}surat_masuk`);
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
				error: (err)=> {
					console.log(err)
					Swal.fire('Error', 'Server Error', 'error')
				}
			});
		}
	});
});
$('#saveSuratKeluar').on('click', ()=> {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#5cb85c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Continue!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/add_surat_keluar`,
				type: 'POST',
				data: $('#form_add_surat_keluar').serialize(),
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Saved Successfully!',
							'Your Letter has been Saved.',
							'success'
						)
						window.location.replace(`${base_url}surat_keluar`);
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
			});
		}
	});
});

function hapusSuratMasuk(id){
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/delete_surat_masuk`,
				data: {
					id: id
				},
				type: 'POST',
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Deleted!',
							'Your Letter has been deleted.',
							'success'
						)
						window.location.replace(`${base_url}surat_masuk`);
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
			});
		}
	});
}
function hapusSuratKeluar(id){
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: `${base_url}api/delete_surat_keluar`,
				data: {
					id: id
				},
				type: 'POST',
				success: (data)=> {
					console.log(data)
					if (data.status === true) {
						Swal.fire(
							'Deleted!',
							'Your Letter has been deleted.',
							'success'
						)
						window.location.replace(`${base_url}surat_keluar`);
					} else {
						Swal.fire('Error', data.message, 'error')
					}
				},
			});
		}
	});
}
