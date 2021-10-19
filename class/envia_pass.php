<?php
require_once("class.php");

ini_set( 'display_errors','Off' );
ini_set( 'error_reporting', E_ALL );
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_DISPLAY', false );

$id=$_POST["usuario"];
$tra=new Colegio();
$tra1=$tra->valida_usu($id);
$item=$tra1[0]['DocumentoId'];
$nom=$tra1[0]['Nombre'];
$apell=$tra1[0]['Apellido'];
$pass=$tra1[0]['Contraseña'];
$email=$tra1[0]['Email'];

$destino=$id;

if ($id===$email){


$contenido= "Nombre: ".$nom."n\Apellido: ".$apell."n\Documento: ".$item."n\Su contraseña es :".$pass;

mail($destino,"Solicitud recuperación de Contraseña",$contenido); 

    echo "<script type='text/javascript'>
        alert('Se han enviado la contraseña al correo ingresado');
        window.location='../index.php';
        </script>";
}else
    echo "<script type='text/javascript'>
        alert('No existe correo ingresado...por favor verificar');
        window.location='../Recuperacion_contraseña.php';
        </script>";



?>
