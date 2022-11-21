<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

require("../conexion/conexion.php");

$correo=$_POST['correo'];

$correo_encrip=sha1(trim($correo));

$checkemail=mysqli_query($mysqli,"SELECT * FROM usuarios WHERE correo='$correo' and estado='0'");
$check_mail=mysqli_num_rows($checkemail);
if($check_mail>0){

	$colores_top="SELECT marca, logo FROM configuracion ";
	$colores_=mysqli_query($mysqli,$colores_top);
	while ($color=mysqli_fetch_row ($colores_)){
		$marca=$color[0];
		$logo=$color[1];
	}

	$extra="SELECT dominio FROM monitoreo ";
	$extra_=mysqli_query($mysqli,$extra);
	while ($base=mysqli_fetch_row ($extra_)){
		$dominio=$base[0];
	}

	//-----ENVIADOR DE CORREOS---------
	$carta =
	'
	<!DOCTYPE html>
	<html lang="en">
	<body>

	<div style="border: 2px solid #00757E; background-color:#00757E; padding: 10px;height: 90px;margin-top: -50px;">
	<center>
	<img src="'.$dominio.'/assets/img/logo/'.$logo.'" style="max-height: 70px;">
	</center>
	</div>

	<div style="border: 2px solid #00757E; padding-top: 15px;padding-left: 10px;padding-bottom: 50px;width: auto;height: auto;">
	<br>
	<center>
	<span style="font-size: 20px; color: #00757E; "><b style="text-transform: lowercase;">'.$marca.' RECUPERAR CONTRASEÑA</b> </span>
	<br>
	<span style="font-family:helvetica,arial,sans-serif; font-size: 14pt; color: #757575; ">Acabas de solicitar un codigo para restablecer tu contraseña.</span>
	<br>
	<br>
	<br>
	<span style="font-family:helvetica,arial,sans-serif; ">
	<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #006A8C" href="'.$dominio.'/restablecer/restablecer-nuevos-datos?xCBcDeFGHyYAcSDgSADcNfsaGYRsdSdSDSAeDSVVVsSAKIh='.$correo_encrip.'&1C2H3I4P5H6Y7S8I9P1R=2O3G4R5A6M7A8C8I1O2N37A8C8I1O2N3">RESTABLECER CONTRASEÑA</a>
	</span>
	<br>
	<p>Click al botón para restablecer tu contraseña</p>
	<br>
	<span style="font-family:helvetica,arial,sans-serif; font-size: 12pt; color: #00757E; ">Si usted no solicito el código de restablecimiento de contraseña por favor comunicate con soporte <br>para verificar si fue un error u otro usuario está entrando a tu cuenta.</span>

	<br>

	'.$dominio.'

	</center>

	</div> 

	</body>
	</html>  

	';


	$mail = new PHPMailer(true);


	try {

		$mail->SMTPDebug = 0;  
		$mail->isSMTP();                                            
		$mail->Host       = 'smtp.gmail.com';   
		$mail->SMTPAuth   = true;
		$mail->Username   = 'enviadorcorreosdemo@gmail.com';                     
		$mail->Password   = 'Demo123Demo123';                               
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;



		$mail->setFrom('enviadorcorreosdemo@gmail.com', ''.$marca.'');
		$mail->addAddress($correo);  

		$mail->isHTML(true);                                
		$mail->Subject = 'Restablecer clave '.$marca.'';
		$mail->Body    = ($carta);

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

		$mail->send();


	} catch (Exception $e) {
		echo 'Message Error: ', $mail->ErrorInfo;
	}

	//-----ENVIADOR DE CORREOS-----


	$sentencia="update usuarios set estado='3', clave='$correo_encrip' where correo='$correo'";
	$resent=mysqli_query($mysqli,$sentencia);

	echo 1;


}else{

	echo 0;

}




?>
