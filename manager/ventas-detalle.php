<?php

session_start();
if (@!$_SESSION['correo']) {
	header("Location:desconectar");
}elseif ($_SESSION['rol']==2) {
	header("Location:desconectar");
}

require("../conexion/conexion.php");
$monitoreo="SELECT dominio FROM monitoreo ";
$monitor=mysqli_query($mysqli,$monitoreo);
while ($moni=mysqli_fetch_row ($monitor)){
	$dominio=$moni[0];
}
?>

<!doctype html>
<html lang="en">

<head>
	<base href="<?php echo $dominio ?>/manager/ventas-detalle.php" />
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
	<link href="../https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="../assets/css/icons.css" rel="stylesheet">
	<link href="../assets/css/sweetalert2.min.css" rel="stylesheet">

	<!-- Titulo -->
	<?php include'include/title.php' ?>
	<!-- Titulo -->

</head>

<?php
require("../conexion/conexion.php");
$configuracion="SELECT color_manager FROM configuracion ";
$config=mysqli_query($mysqli,$configuracion);
while ($conf=mysqli_fetch_row ($config)){
	$color_manager=$conf[0];
}
?>

<body class="bg-theme <?php echo $color_manager ?>">


	<!---- Este script permite mantener la posición de la página cuando se refresca ---->
	<script>
		window.onload=function(){
			var pos=window.name || 0;
			window.scrollTo(0,pos);
		}
		window.onunload=function(){
			window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
		}
	</script>
	<!---- Este script permite mantener la posición de la página cuando se refresca ---->

	
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
					<div class="breadcrumb-title pe-3">Detalle de la venta</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="estadisticas"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item" aria-current="page"><a href="ventas">Ventas</a></li>
								<li class="breadcrumb-item active" aria-current="page">Detalle de la venta</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Opciones</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	
								<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
								<a class="dropdown-item" href="ventas">Lista de ventas</a>
								<a class="dropdown-item" href="caja">Nuevo venta</a>
							</div>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-sm-9">
								<div class="card">
									<div class="card-body">
										<center><h5 class="mb-3">Detalle de la venta</h5></center>

										<div class="table-responsive">
											<table id="example2" class="table table-striped table-bordered" style="width:100%;">
												<thead style="background-color: #212529;">
													<tr>
														<th>Producto</th>
														<th>Nombre</th>
														<th>Precio</th>
														<th>Cantidad</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody>

													<?php

													require("../conexion/conexion.php");

													$id_vent=$_GET['i'];

													if($id_vent==true){

														$ventas_detalle_="SELECT * FROM ventas_detalle WHERE id_venta='$id_vent' and estado='0' ORDER BY id_venta_detalle DESC ";
														$ventas_detalle=mysqli_query($mysqli,$ventas_detalle_);
														while ($ventas_detail=mysqli_fetch_row ($ventas_detalle)){

															$id_venta_detalle = $ventas_detail[0];
															$id_venta = $ventas_detail[1];
															$id_usuario = $ventas_detail[2];
															$id_inventario = $ventas_detail[3];
															$precio = $ventas_detail[4];
															$cantidad = $ventas_detail[5];
															$total = $ventas_detail[6];
															$fecha_registro = $ventas_detail[7];
															$estado = $ventas_detail[8];



															//DATOS
															$inventarios_="SELECT nombre_articulo FROM inventario WHERE id_inventario='$id_inventario'";
															$inventario=mysqli_query($mysqli,$inventarios_);
															while ($invent_info=mysqli_fetch_row ($inventario)){
																$nombre=$invent_info[0];
															}
															//DATOS

															//IMAGENES
															$imagenes_i="SELECT imagen FROM inventario_img WHERE id_inventario='$id_inventario'";
															$i_imagenes=mysqli_query($mysqli,$imagenes_i);
															while ($imagenes_v=mysqli_fetch_row ($i_imagenes)){
																$imagen_inv=$imagenes_v[0];
															}
															//IMAGENES

															echo 
															'
															<tr>
															<td><img src="../assets/img/inventario/'.htmlentities($imagen_inv).'" width="100" style="border-radius:20px;"></td>
															<td>'.htmlentities($nombre).'</td>
															<td>'.htmlentities(number_format($precio)).'</td>
															<td>'.htmlentities($cantidad).'</td>
															<td>'.htmlentities(number_format($total)).'</td>
															</tr>
															';
														}

													}else{

														echo'
														<script>
														function redireccionarPagina() {
															window.location = "javascript:history.back()";
														}
														setTimeout("redireccionarPagina()");
														</script>
														';

													}

													?>
												</tbody>

											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div style="margin-top: 130px;"></div>

								<div class="row">
									<a href="javascript:history.back()">
										<div class="col-sm-12 d-grid gap-2">
											<button type="submit" class="btn btn-light px-4">Regresar</button>
										</div>
									</a>
								</div>
								<br>
								<br>
								<center>
									<h6>IMPRIMIR TIQUETE</h6>
									<a href="imprimir?id=<?php echo $id_vent ?>" target="_blank"><img src="../assets/img/iconos/impresora.png" width="90" height="80"></a>
								</center>
								<div style="margin-top: 50px;"></div>
							</div>

						</div>
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
	<script src="../assets/js/app.js"></script>
	<script src="../assets/js/sweetalert2.min.js"></script>
	<script src="validaciones/usuarios/js/usuarios-editar.js"></script>

	<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
			.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

</body>
</html>