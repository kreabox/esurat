$('#doLogin').on('click', ()=> {
	$.ajax({
		url:  `${base_url}auth/login`,
		type: 'POST',
		data: {
			username: $('#username').val(),
			password: $('#password').val()
		},
		success: (data)=> {
			console.log(data);
			if (data.status === true) {
				window.location.replace(base_url);
			} else {
				Swal.fire('Error', data.message, 'error')
			}
		},
		error: (err)=> {
			console.log(err)
			Swal.fire('Error', 'Server Error', 'error')
		}
	})
})
