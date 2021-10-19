<?php
require_once("class.php");

ini_set( 'display_errors','Off' );
ini_set( 'error_reporting', E_ALL );
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_DISPLAY', false );

$usuario=$_POST["usuario"];
$pass=$_POST["pass"];
$tra=new Colegio();

$tra1=$tra->valida_pass($usuario,$pass);

$usu=$tra1[0]['Email'];
$pass1=$tra1[0]['Contraseña'];

$rol=$tra1[0]['Rol_IdRol'];

if ($usuario===$usu && $pass===$pass1 && $rol==="2")
{
    session_start();
    $_SESSION['login']=$_POST["usuario"];

    echo "<script type='text/javascript'>
        alert('Bienvenido al Sistema de Gestión de Novedades del Colegio Bilingüe Rosalía Vidal de Rico..  Ingresaste con ROL ADMINISTRATIVO');
        window.location='../princ_admin.php';
        </script>";
    
}elseif ($usuario===$usu && $pass===$pass1 && $rol==="3")
{
    session_start();
    $_SESSION['login']=$_POST['usuario'];

    echo "<script type='text/javascript'>
        alert('Bienvenido al Sistema de Gestión de Novedades del Colegio Bilingüe Rosalía Vidal de Rico..  Ingresaste con ROL CONSULTA');
        window.location='../consulta.php';
        </script>";
}
else{   
        echo "<script type='text/javascript'>
        alert('No coinciden las credenciales... Por favor verificar!!');
        window.location='../index.php';
        </script>";
    }
?>
