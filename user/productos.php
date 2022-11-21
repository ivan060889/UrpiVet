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
	<link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<script src="../assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
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
$configuracion="SELECT color_user, telefono FROM configuracion ";
$config=mysqli_query($mysqli,$configuracion);
while ($conf=mysqli_fetch_row ($config)){
	$color_user=$conf[0];
	$telefono=$conf[1];
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

				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Productos</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="estadisticas"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Productosa disponibles en tienda</li>
							</ol>
						</nav>
					</div>
				</div>

				<hr/>
				<div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
					<?php

					require("../conexion/conexion.php");

					date_default_timezone_set('America/Panama');
					$fecha_actual = date("Y-m-d");

					$inventarios="SELECT * FROM inventario WHERE estado='0' and fecha_vencimiento>'$fecha_actual' and stock>='1'";
					$inventario=mysqli_query($mysqli,$inventarios);
					$result = 0;
					$result = mysqli_num_rows($inventario);
					if ($result > 0) {

						while ($invent=mysqli_fetch_row ($inventario)){

							$id_inventario = $invent[0];
							$nombre_articulo = $invent[1];
							$detalle_articulo = substr($invent[2], 0, 200);
							$numero_factura = $invent[3];
							$fecha_ingreso = $invent[4];
							$proveedor = $invent[5];
							$cantidad_sugerida = $invent[6];
							$stock = $invent[7];
							$precio_unitario = $invent[8];
							$precio_sugerido = $invent[9];
							$fecha_vencimiento = $invent[10];
							$codigo_barras = $invent[11];
							$estado = $invent[12];

							//IMAGENES
							$imagenes_i="SELECT imagen FROM inventario_img WHERE id_inventario='$id_inventario' LIMIT 1";
							$i_imagenes=mysqli_query($mysqli,$imagenes_i);
							while ($imagenes_v=mysqli_fetch_row ($i_imagenes)){
								$imagen_inv=$imagenes_v[0];
							}
							//IMAGENES

							echo 
							'
							<div class="col">
							<div class="card">
							<div class="card-body">
							<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
							<div class="carousel-inner">
							<div class="carousel-item active">
							<img src="../assets/img/inventario/'.htmlentities($imagen_inv).'" class="d-block w-100" width="150" height="300">
							</div>
							';
							
							//IMAGENES
							$imagenes_it="SELECT imagen FROM inventario_img WHERE id_inventario='$id_inventario'";
							$i_imagenest=mysqli_query($mysqli,$imagenes_it);
							while ($imagenes_vt=mysqli_fetch_row ($i_imagenest)){
								$imagen_inv_rot=$imagenes_vt[0];

								echo 
								'
								<div class="carousel-item">
								<img src="../assets/img/inventario/'.htmlentities($imagen_inv_rot).'" class="d-block w-100" width="150" height="300">
								</div>
								';
							}
							//IMAGENES

							echo'
							</div>

							<div class="card-body">
							<h5 class="card-title text-center">'.htmlentities($nombre_articulo).'</h5>
							<p class="card-text">'.htmlentities($detalle_articulo).'...</p>
							</div>
							<ul class="list-group list-group-flush">
							<li class="list-group-item">COSTO $'.number_format($precio_sugerido).'</li>
							</ul>
							<div class="card-body">	
							<a href="https://api.whatsapp.com/send?phone='.htmlentities($telefono).'&text=Quiero%20comprar%20el%20producto%20('.htmlentities($nombre_articulo).')" target="_blank" class="btn btn-success" style="width:100%;">Comprar</a>
							</div>
						
							</div>
							</div>
							</div>
							</div>
							';
						}

						}else{


						}

						?>
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
						<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
						<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
						<script src="../assets/js/app.js"></script>

						</body>
						</html>