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
	<base href="<?php echo $dominio ?>/manager/mascotas-detalle.php" />
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
	<link href="../assets/css/style.css" rel="stylesheet">

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

				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
					<div class="breadcrumb-title pe-3">Detalle de la mascota</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="estadisticas"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item" aria-current="page"><a href="mascotas">Mascotas activas</a></li>
								<li class="breadcrumb-item active" aria-current="page">Detalle</li>
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
								<a class="dropdown-item" href="mascotas">Lista de mascotas</a>
								<a class="dropdown-item" href="mascotas-nuevo">Nueva mascota</a>
							</div>
						</div>
					</div>
				</div>


				<?php

				require("../conexion/conexion.php");

				$id_pet=$_GET['i'];

				if($id_pet==true){

					$mascotas="SELECT * FROM mascotas WHERE id_mascota='$id_pet'";
					$mascota=mysqli_query($mysqli,$mascotas);

					$result = 0;
					$result = mysqli_num_rows($mascota);
					if ($result > 0) {
						while ($pets=mysqli_fetch_row ($mascota)){


							$id_mascota = $pets[0];
							$id_usuario = $pets[1];
							$nombre = $pets[2];
							$fecha_nacimiento = $pets[3];
							$edad = $pets[4];
							$raza = $pets[5];
							$especie = $pets[6];
							$color = $pets[7];
							$sexo = $pets[8];
							$peso = $pets[9];
							$tipo_peso = $pets[10];
							$fecha_registro = $pets[11];
							$estado = $pets[12];

							//IMAGENES
							$imagenes_m="SELECT imagen FROM mascotas_img WHERE id_mascota='$id_mascota'";
							$m_imagenes=mysqli_query($mysqli,$imagenes_m);
							while ($imagenes_v=mysqli_fetch_row ($m_imagenes)){
								$imagen_pet=$imagenes_v[0];
							}
							//IMAGENES

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

				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<hr class="my-3" />
										<div class="row">
											<a href="javascript:history.back()">
												<div class="col-sm-12 d-grid gap-2">
													<button type="submit" class="btn btn-light px-4">Regresar</button>
												</div>
											</a>
										</div>
										<hr class="my-3" />
										<div class="d-flex flex-column align-items-center text-center">
											<img src="../assets/img/mascotas/<?php echo $imagen_pet ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110" height="110">
											<div class="mt-3">
												<h4><?php echo $nombre; ?></h4>
											</div>
											<div class="row">
												<div class="col-sm-12 d-grid gap-2">
													<button type="submit" class="btn btn-light px-4" data-bs-toggle="modal" data-bs-target="#editar_imagen">Editar imagen</button>
												</div>


												<!-- Modal -->
												<div class="modal fade" id="editar_imagen" tabindex="-1" aria-labelledby="imagen_mascota" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="imagen_mascota">Editar imagen de la mascota</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<center>
																	<img src="../assets/img/mascotas/<?php echo $imagen_pet ?>" class="rounded-circle p-1 bg-primary" width="200" height="200">
																</center>
																<br>
																<br>

																<center>
																	<div class="photo">
																		<div class="prevPhoto">
																			<span class="delPhoto notBlock">X</span>
																			<label for="foto"></label>
																		</div>
																		<div class="upimg">
																			<input id="id_mascota" value="<?php echo $id_mascota; ?>" style="display: none;" />
																			<input type="file" id="foto">
																		</div>
																		<div id="form_alert"></div>
																	</div>
																	<small class="color_blanco">Sube aqui la nueva imagen de la mascota</small>
																</center>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
																<button type="button" id="mascotas-editar-img" class="btn btn-primary" disabled>Actualizar imagen</button>
															</div>
														</div>
													</div>
												</div>
												<!-- Modal -->

											</div>
										</div>
										<hr class="my-3" />
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0">Registro</h6>
												<span class="text-white"><?php echo $fecha_registro; ?></span>
											</li>
										</ul>

										<center>
											<br>
											<?php 

											if($estado==0){

												echo 
												'
												<form action="validaciones/mascotas/mascotas-bloquear" method="POST">
												<input name="id_mascota" value="'.$id_mascota.'" style="display: none;" />
												<button type="submit" class="btn btn-outline-danger px-3 radius-30">BLOQUEAR MASCOTA</button>
												</form>
												';

											}else{

												echo 
												'
												<form action="validaciones/mascotas/mascotas-desbloquear" method="POST">
												<input name="id_mascota" value="'.$id_mascota.'" style="display: none;" />
												<button type="submit" class="btn btn-outline-warning px-3 radius-30">DESBLOQUEAR MASCOTA</button>
												</form>
												<br>
												<form action="validaciones/mascotas/mascotas-eliminar" method="POST">
												<input name="id_mascota" value="'.$id_mascota.'" style="display: none;" />
												<button type="submit" class="btn btn-outline-danger px-3 radius-30">ELIMINAR MASCOTA</button>
												</form>
												';

											}

											?>
										</center>

									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9">
												<center><h5 class="mb-3">Datos de la mascota</h5></center>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nombre</h6>
											</div>
											<div class="col-sm-9">
												<input id="id_mascota" value="<?php echo $id_mascota; ?>" style="display: none;" />
												<input type="text" class="form-control" id="nombre" value="<?php echo $nombre; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Fecha de nacimiento</h6>
											</div>
											<div class="col-sm-9">
												<input type="date" class="form-control" id="fecha_nacimiento" max="<?php echo date('Y-m-d')?>" value="<?php echo $fecha_nacimiento; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Edad</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="edad" value="<?php echo $edad; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Raza y Especie</h6>
											</div>
											<div class="col-sm-4">
												<!--<input type="text" class="form-control" id="raza" value="<?php echo $raza; ?>" />-->
												<select type="text" class="form-control" id="raza">
													<option value="<?php echo $raza; ?>"><?php echo $raza; ?></option>
													<option value="Perro Peruano" style="color: black;">Perro Peruano</option>
														<option value="Chihuahua" style="color: black;">Chihuahua</option>
														<option value="Pitbull" style="color: black;">Pitbull</option>
														<option value="Beagle" style="color: black;">Beagle</option>
														<option value="Rottweiler" style="color: black;">Rottweiler</option>
														<option value="Corgi" style="color: black;">Corgi</option>
														<option value="Boxer" style="color: black;">Boxer</option>
														<option value="Labrador" style="color: black;">Labrador</option>
														<option value="Dalmata" style="color: black;">Dalmata</option>
														<option value="Buildog" style="color: black;">Buildog Inglés</option>
														<option value="Cocker" style="color: black;">Cocker</option>
													
												</select>
											</div>
											<div class="col-sm-5">
												<input type="text" class="form-control" id="especie" value="<?php echo $especie; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Color</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="color" value="<?php echo $color; ?>" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Sexo</h6>
											</div>
											<div class="col-sm-9">
												<select type="text" class="form-control" id="sexo">
													<option value="<?php echo $sexo; ?>"><?php echo $sexo; ?></option>
													<option value="Macho" style="color: black;">Macho</option>
													<option value="Hembra" style="color: black;">Hembra</option>
												</select>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Peso</h6>
											</div>
											<div class="col-sm-6">
												<input type="number" class="form-control" id="peso" value="<?php echo $peso; ?>" />
											</div>
											<div class="col-sm-3">
												<select type="text" class="form-control" id="tipo_peso">
													<option value="<?php echo $tipo_peso; ?>"><?php echo $tipo_peso; ?></option>
													<option value="Kilogramos" style="color: black;">Kilogramos</option>
													<option value="Gramos" style="color: black;">Gramos</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 d-grid gap-2">
												<button type="button" class="btn btn-light px-4 btn-block" id="mascotas-detalle">Actualizar información</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">

											<div class="row">
												<div class="col-sm-10">
													<center><h5 class="mb-3">Registro de visitas</h5></center>
												</div>
												<div class="col-sm-2">
													<button type="button" class="btn btn-light px-4 btn-block" data-bs-toggle="modal" data-bs-target="#registro_visitas"><i class="bx bx-list-plus"></i> NUEVO</button>


													<!-- Modal -->
													<div class="modal fade" id="registro_visitas" tabindex="-1" aria-labelledby="visitas" aria-hidden="true">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="visitas">Nuevo registro de visita</h5>
																	<button type="button" class="btn-close" style="background-color: white;" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	
																	<div class="row">
																		<div class="col-sm-6">
																			<center>
																				<label>Motivo de la visita</label>
																				<input id="id_mascota" value="<?php echo $id_mascota; ?>" style="display: none;" />
																				<textarea class="form-control" id="motivo_v" rows="2" placeholder="Motivo de la visita"></textarea>
																			</center>
																		</div>
																		<div class="col-sm-2">
																			<center>
																				<label>Peso</label>
																				<input type="number" class="form-control" id="peso_v" placeholder="Ingresa el peso" />
																			</center>
																		</div>
																		<div class="col-sm-2">
																			<center>
																				<label>Peso en:</label>
																				<select type="text" class="form-control" id="tipo_peso_v">
																					<option value="Kilogramos" style="color: black;">Kilogramos</option>
																					<option value="Gramos" style="color: black;">Gramos</option>
																				</select>
																			</center>
																		</div>
																		<div class="col-sm-2">
																			<center>
																				<label>Temperatura</label>
																				<input type="text" class="form-control" id="temperatura_v" placeholder="Ingresa la temperatura" />
																			</center>
																		</div>
																		<div class="col-sm-4 mt-5">
																			<center>
																				<label>Diagnostico y tratamiento</label>
																				<textarea class="form-control" id="diagnostico_v" rows="3" placeholder="Diagnostico y tratamientos"></textarea>
																			</center>
																		</div>
																		<div class="col-sm-4 mt-5">
																			<center>
																				<label>Sintomas</label>
																				<textarea class="form-control" id="sintomas_v" rows="3" placeholder="Ingresa los sintomas"></textarea>
																			</center>
																		</div>
																		<div class="col-sm-4 mt-5">
																			<center>
																				<label>Medicinas o productos aplicados:</label>
																				<textarea class="form-control" id="medicinas_aplicadas_v" rows="3" placeholder="Ingresa las medicinas o productos aplicados"></textarea>
																			</center>
																		</div>
																		<div class="col-sm-6 mt-5">
																			<center>
																				<label>Fecha de la proxima visita</label>
																				<input type="date" class="form-control" min="<?php echo date('Y-m-d')?>" id="visita_proxima_v" />
																			</center>
																		</div>
																		<div class="col-sm-6 mt-5">
																			<center>
																				<label>Motivo de la proxima visita</label>
																				<input type="text" class="form-control" id="motivo_proximo_v" placeholder="Ingresa el motivo de la proxima visita" />
																			</center>
																		</div>


																		<center><h5 class="mt-4">Exámenes de Laboratorio / Placas:</h5></center>	

																		<div class="col-sm-6">
																			<center>
																				Imagenes
																				<br>
																				<br>
																				<fieldset>
																					<div class="row mostrar_foto">	

																					</div>
																					<br>	
																					<center><button type="button" id="agregar_imagenes" class="btn btn-primary">+</button></center>
																				</fieldset>
																			</center>
																		</div>


																		<div class="col-sm-6">
																			<center>
																				Pdf
																				<br>
																				<br>
																				<fieldset>
																					<div class="row mostrar_foto2">	

																					</div>
																					<br>	
																					<center><button type="button" id="agregar_pdf" class="btn btn-primary">+</button></center>
																				</fieldset>
																			</center>
																		</div>

																	</div>


																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
																	<button type="button" id="visitas-agregar" class="btn btn-primary">Guardar</button>
																</div>
															</div>
														</div>
													</div>
													<!-- Modal -->

												</div>
											</div>

											<hr>

											<div class="table-responsive">
												<table id="visitas_" class="table table-striped table-bordered" style="width:100%;">
													<thead style="background-color: #212529;">
														<tr>
															<th>Fecha de visita</th>
															<th>Motivo de visita</th>
															<th>Diagnostico</th>
															<th>Detalle</th>
														</tr>
													</thead>
													<tbody>

														<?php

														require("../conexion/conexion.php");

														$visitas="SELECT * FROM visitas WHERE id_mascota='$id_mascota' and estado='0' ORDER BY id_visita DESC ";
														$visita=mysqli_query($mysqli,$visitas);
														while ($visit=mysqli_fetch_row ($visita)){

															echo 
															'
															<tr>
															<td>'.htmlentities($visit[2]).'</td>
															<td>'.htmlentities($visit[3]).'</td>
															<td>'.htmlentities($visit[8]).'</td>
															<td><a href="visitas/'.htmlentities($visit[0]).'/'.htmlentities($visit[1]).'"><button type="button" class="btn btn-outline-success px-3 radius-30">Vista previa</button></a></td>
															</tr>
															';
														}

														?>
													</tbody>

												</table>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">

											<div class="row">
												<div class="col-sm-10">
													<center><h5 class="mb-3">Internamientos</h5></center>
												</div>
												<div class="col-sm-2">
													<button type="button" class="btn btn-light px-4 btn-block" data-bs-toggle="modal" data-bs-target="#registro_internamientos"><i class="bx bx-list-plus"></i> NUEVO</button>


													<!-- Modal -->
													<div class="modal fade" id="registro_internamientos" tabindex="-1" aria-labelledby="internamientos" aria-hidden="true">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="internamientos">Nuevo internamiento</h5>
																	<button type="button" class="btn-close" style="background-color: white;" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	
																	<div class="row">
																		<div class="col-sm-12">
																			<center>
																				<label>Fecha de entrada</label>
																				<input id="id_mascota" value="<?php echo $id_mascota; ?>" style="display: none;" />
																				<input type="date" class="form-control" id="entrada_i" />
																			</center>
																		</div>

																		<div class="col-sm-6 mt-5">
																			<center>
																				<label>Medicinas aplicadas</label>
																				<textarea class="form-control" id="medicinas_aplicadas_i" rows="3" placeholder="Medicinas aplicadas"></textarea>
																			</center>
																		</div>
																		<div class="col-sm-6 mt-5">
																			<center>
																				<label>Motivo</label>
																				<textarea class="form-control" id="motivo_i" rows="3" placeholder="Ingresa el motivo"></textarea>
																			</center>
																		</div>

																		<div class="col-sm-6 mt-5">
																			<center>
																				<label>Antecedentes</label>
																				<textarea class="form-control" id="antecedentes_i" rows="3" placeholder="Ingresa los antecedentes"></textarea>
																			</center>
																		</div>

																		<div class="col-sm-6 mt-5">
																			<center>
																				<label>Tratamiento</label>
																				<textarea class="form-control" id="tratamiento_i" rows="3" placeholder="Ingresa el tratamiento"></textarea>
																			</center>
																		</div>

																	</div>


																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
																	<button type="button" id="internamientos-agregar" class="btn btn-primary">Guardar</button>
																</div>
															</div>
														</div>
													</div>
													<!-- Modal -->

												</div>
											</div>

											<hr>

											<div class="table-responsive">
												<table id="internamientos_" class="table table-striped table-bordered" style="width:100%;">
													<thead style="background-color: #212529;">
														<tr>
															<th>Fecha de entrada</th>
															<th>Medicina</th>
															<th>Motivo</th>
															<th>Dias internado</th>
															<th>Estado</th>
															<th>Detalle</th>
														</tr>
													</thead>
													<tbody>

														<?php

														require("../conexion/conexion.php");

														$internamientos="SELECT id_internamiento, fecha_entrada, fecha_salida, medicinas_aplicadas, motivo, TIMESTAMPDIFF(DAY, fecha_entrada, curdate() ), id_mascota, estado FROM internamientos WHERE id_mascota='$id_mascota' ORDER BY estado ASC";
														$internamiento=mysqli_query($mysqli,$internamientos);
														while ($interna=mysqli_fetch_row ($internamiento)){

															echo 
															'
															<tr>
															<td>'.htmlentities($interna[1]).'</td>
															<td>'.htmlentities($interna[3]).'</td>
															<td>'.htmlentities($interna[4]).'</td>
															';

															$fecha1= new DateTime($interna[1]);
															$fecha2= new DateTime($interna[2]);
															$diff = $fecha1->diff($fecha2);

															if($interna[2]==true){

																echo '<td>'.$diff->days.' dias</td>';

															}else{

																echo '<td>'.htmlentities($interna[5]).' dias</td>';
															}

															if($interna[7]==0){

																echo '<td><span class="badge bg-success">INTERNADO</span></td>';

															}else{

																echo '<td><span class="badge bg-danger">DADO DE ALTA</span></td>';

															}

															echo
															'
															<td><a href="internamientos/'.htmlentities($interna[0]).'/'.htmlentities($interna[6]).'"><button type="button" class="btn btn-outline-success px-3 radius-30">Vista previa</button></a></td>
															</tr>
															';
														}

														?>
													</tbody>

												</table>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">

											<div class="row">
												<div class="col-sm-10">
													<center><h5 class="mb-3">Citas</h5></center>
												</div>
												<div class="col-sm-2">
													<button type="button" class="btn btn-light px-4 btn-block" data-bs-toggle="modal" data-bs-target="#registro_citas"><i class="bx bx-list-plus"></i> NUEVO</button>


													<!-- Modal -->
													<div class="modal fade" id="registro_citas" tabindex="-1" aria-labelledby="citas" aria-hidden="true">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="citas">Nueva cita</h5>
																	<button type="button" class="btn-close" style="background-color: white;" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	
																	<div class="row">
																		<div class="col-sm-3">
																			<center>
																				<label>Fecha de la cita</label>
																				<input id="id_mascota" value="<?php echo $id_mascota; ?>" style="display: none;" />
																				<input type="date" class="form-control" min="<?php echo date('Y-m-d')?>" id="fecha_cita" />
																			</center>
																		</div>

																		<div class="col-sm-3">
																			<center>
																				<label>Hora de la cita</label>
																				<input type="time" class="form-control" id="hora_cita" />
																			</center>
																		</div>
																		<div class="col-sm-6">
																			<center>
																				<label>Nombre del doctor/doctora</label>
																				<select class="form-control" id="doctor_cita">
																					<option value="">Doctores disponibles</option>
																					<?php
																					require("../conexion/conexion.php");
																					$sql=("SELECT * FROM doctores ORDER BY id_doctor DESC");
																					$query=mysqli_query($mysqli,$sql);
																					while($arreglo=mysqli_fetch_array($query)){
																						$id_doctor = $arreglo['id_doctor'];
																						$nombre = $arreglo['nombre'];
																						$apellido = $arreglo['apellido'];
																						echo '<option value="'.$id_doctor.'" style="color: black;">'.$nombre.' '.$apellido.'</option>';
																					}
																					?>
																				</select>
																			</center>
																		</div>

																		<div class="col-sm-12 mt-5">
																			<center>
																				<label>Motivo de la cita</label>
																				<textarea class="form-control" id="motivo_cita" rows="3" placeholder="Ingresa el motivo de la cita"></textarea>
																			</center>
																		</div>

																	</div>


																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
																	<button type="button" id="citas-agregar" class="btn btn-primary">Guardar</button>
																</div>
															</div>
														</div>
													</div>
													<!-- Modal -->

												</div>
											</div>

											<hr>

											<div class="table-responsive">
												<table id="citas_" class="table table-striped table-bordered" style="width:100%;">
													<thead style="background-color: #212529;">
														<tr>
															<th>Fecha de la cita</th>
															<th>Doctor</th>
															<th>Motivo</th>
															<th>Detalle</th>
															<th>Eliminar</th>
														</tr>
													</thead>
													<tbody>

														<?php

														require("../conexion/conexion.php");

														$citas="SELECT * FROM citas WHERE id_mascota='$id_mascota' ORDER BY id_cita DESC";
														$citas_=mysqli_query($mysqli,$citas);
														while ($cita=mysqli_fetch_row ($citas_)){

															$doctores=("SELECT * FROM doctores WHERE id_doctor='$cita[4]'");
															$doctor=mysqli_query($mysqli,$doctores);
															while($doct=mysqli_fetch_array($doctor)){
																$nombre = $doct['nombre'];
																$apellido = $doct['apellido'];
															}

															echo 
															'
															<tr>
															<td>'.htmlentities($cita[2].' '.$cita[3]).'</td>
															<td>'.htmlentities($nombre.' '.$apellido).'</td>
															<td>'.htmlentities($cita[5]).'</td>
															<td><a href="citas/'.htmlentities($cita[0]).'/'.htmlentities($cita[1]).'"><button type="button" class="btn btn-outline-success px-3 radius-30">Vista previa</button></a></td>

															';
															if($cita[7]==0){
																echo'
																<td>
																<form action="validaciones/citas/citas-eliminar" method="POST">
																<input name="id_cita" value="'.$cita[0].'" style="display: none;" />
																<input name="id_mascota" value="'.$cita[1].'" style="display: none;" />
																<button type="submit" class="btn btn-outline-danger px-3 radius-30">Eliminar</button>
																</form>
																</td>
																';
															}else{
																echo'<td></td>';
															}
															echo'
															</tr>
															';
														}

														?>
													</tbody>

												</table>
											</div>
										</div>
									</div>
								</div>
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
	<script src="validaciones/mascotas/js/mascotas-editar.js"></script>
	<script src="validaciones/mascotas/js/mascotas-editar-img.js"></script>
	<script src="validaciones/visitas/js/visitas-agregar.js"></script>
	<script src="validaciones/internamientos/js/internamientos-agregar.js"></script>
	<script src="validaciones/citas/js/citas-agregar.js"></script>

	<!------ VALIDA QUE EL CAMPO DE IMAGEN NO ESTE VACIO ------->
	<script type="text/javascript">
		$("#foto").change(function(){
			$("button").prop("disabled", this.files.length == 0);
		});
	</script>
	<!------ VALIDA QUE EL CAMPO DE IMAGEN NO ESTE VACIO ------->


	<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#visitas_').DataTable()
		});
		$(document).ready(function() {
			$('#internamientos_').DataTable()
		});
		$(document).ready(function() {
			$('#citas_').DataTable()
		});
	</script>

</body>
</html>