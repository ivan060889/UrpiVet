<?php 

session_start();
if (@!$_SESSION['correo']) {
	header("Location:desconectar");
}elseif ($_SESSION['rol']==1) {
	header("Location:desconectar");
}

?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Favicon/Icono -->
	<?php include'include/favicon.php' ?>
	<!-- Favicon/Icono -->

	<!--plugins-->
	<link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<script src="../assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="../assets/css/icons.css" rel="stylesheet">
	<link href="../assets/css/style.css" rel="stylesheet">
		
	<!-- Titulo -->
	<?php include'include/title.php' ?>
	<!-- Titulo -->

</head>

<?php
require("../conexion/conexion.php");
$configuracion="SELECT marca, logo, color_user FROM configuracion ";
$config=mysqli_query($mysqli,$configuracion);
while ($conf=mysqli_fetch_row ($config)){
	$marca=$conf[0];
	$logo=$conf[1];
	$color_user=$conf[2];
}
?>

<body class="bg-theme <?php echo $color_user ?>">
	<!--wrapper-->
	<div class="wrapper">

		<!-- Wrapper -->
		<?php include'include/wrapper.php' ?>
		<!-- Wrapper -->
		
		<!-- Header -->
		<?php include'include/header.php' ?>
		<!-- Header -->

		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-lg-1 row-cols-xl-12">

					<div class="col">
						
						<br>
						<br>
						<center>
							<h1 class="text-uppercase"><?php echo $marca ?></h1>

							<div class="row">
								<div class="col-md-6">
									<br>
									<h3>GESTI??N DE VETERINARIA</h3>
									<p>
										Nuestro sistema de gesti??n veterinaria te da control total de tu establecimiento donde podr??s controlar desde el ingreso de los pacientes hasta todos los procedimientos cl??nicos y administrativos que se realicen. Disponemos de gran variedad de informes donde podr??s tener consolidados de la informaci??n solicitada por fechas para tener control total de los datos.
										
										<br>
										<br>

										Sabemos que las personas aman a sus mascotas, pero en un mundo en el que los dispositivos m??viles y la tecnolog??a captan suelen captar la mayor parte de la atenci??n de las personas, creemos que es importante poder involucrar a nuestras mascotas en la tecnolog??a que tambi??n es parte de nuestras vidas.

										<br>
										<br>

										Si tienes alguna duda sobre el sistema, contactanos por <a href="https://api.whatsapp.com/send?phone=573004055563&text=Hola,%20%20Quisiera%20realizar%20una%20consulta" target="_blanck" style="color: #1AD300;">whatsapp</a> para ofrecerte un mejor soporte

									</p>
								</div>

								<div class="col-md-6">
									<br>
									<h3>SOBRE EL SISTEMA</h3>
									<p>
										Nuestro sistema veterinario fue creado para suplir las necesidades de orden y control de cl??nicas veterinarias y especialistas veterinarios. El proceso de creaci??n se debi?? al no encontrar una herramienta que cumpliera con los requerimientos b??sicos, por lo cual se desarroll?? SystemPets, el software veterinario que espera convertirse en la herramienta n??mero 1 del sector y ayudar a muchas cl??nicas a controlar tus datos y gestionar de manera correcta clientes y recordatorios para ser m??s productivos y eficientes.
										
										<br>
										<br>

										Para la tranquilidad de nuestros usuarios, SystemPets garantiza que la informaci??n que suministren estar?? resguardada con los mejores est??ndares de seguridad y confiabilidad. Manejamos todas las medidas t??cnicas y organizativas est??ndares de la industria para asegurar la informaci??n almacenada durante el tiempo que utilice el sistema.

									</p>
								</div>
							</div>

						</center>
						<br>
						<br>
						<br>

					</div>

				</div>

			</div>
		</div>


		<div class="overlay toggle-icon"></div>
		<a class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

		<!-- Footer -->
		<?php include'include/footer.php' ?>
		<!-- Footer -->

	</div>


	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="../assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="../assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<script src="../assets/plugins/jquery-knob/excanvas.js"></script>
	<script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>
	<script>
		$(function() {
			$(".knob").knob();
		});
	</script>
	<script src="../assets/js/index.js"></script>
	<script src="../assets/js/app.js"></script>
	
</body>
</html>