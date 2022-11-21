$(document).ready(function(){


	$('#recover').click(function(){
		let formData = new FormData();

		let correo = $('#correo').val();
		formData.append('correo',correo);


		if (correo == '') {
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 1000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				type: 'warning',
				title: 'Ingresa tu correo electronico'
			});

		}else if($("#correo").val().indexOf('@', 0) == -1 || $("#correo").val().indexOf('.', 0) == -1){
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 1000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				type: 'warning',
				title: 'Ingresa un correo electronico valido'
			});  

		}else{
			$.ajax({
				url: 'restablecer/recover',
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(data) {
					parseInt(data);

                //CORREO INCORRECTA
                if (data==0) {
                	const Toast = Swal.mixin({
                		toast: true,
                		position: 'top-end',
                		showConfirmButton: false,
                		timer: 2000,
                		timerProgressBar: true,
                		didOpen: (toast) => {
                			toast.addEventListener('mouseenter', Swal.stopTimer)
                			toast.addEventListener('mouseleave', Swal.resumeTimer)
                		}
                	})

                	Toast.fire({
                		type: 'info',
                		title: 'El correo ingresado no existe o no esta verificado'
                	});
                }
                //CORREO INCORRECTA


                //REGISTRO CORRECTO
                else if (data==1) {

                	Swal.fire(
                		'Correo enviado',
                		'Enviamos un link a tu correo electronico para que restablezcas tu contraseña',
                		'success'
                		).then(function() {
                			window.location = "recover";
                		});

                	}
                //REGISTRO CORRECTO



                //CUENTA INCORRECTA
                else{
                	const Toast = Swal.mixin({
                		toast: true,
                		position: 'top-end',
                		showConfirmButton: false,
                		timer: 3000,
                		timerProgressBar: true,
                		didOpen: (toast) => {
                			toast.addEventListener('mouseenter', Swal.stopTimer)
                			toast.addEventListener('mouseleave', Swal.resumeTimer)
                		}
                	})

                	Toast.fire({
                		type: 'error',
                		title: 'Correo electronico incorrecto'
                	});
                }
                //CUENTA INCORRECTA

            }
        });
		}
	});
});

