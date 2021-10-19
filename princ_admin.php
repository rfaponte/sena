<?php
session_start();
if (!isset($_SESSION['login']))
{
    echo "<script type='text/javascript'>
        alert('Usuario no haz Iniciado Sesión, por favor Logueate!!!!');
        window.location='index.php';
        </script>";
}
require_once("class/class.php");
$usuario=$_SESSION['login'];
$tra=new Colegio();
$tra1=$tra->trae_datos($usuario);
$nom=$tra1[0]['Nombre'];
$apell=$tra1[0]['Apellido'];
$doc=$tra1[0]['DocumentoId'];
$dir=$tra1[0]['Direccion'];
$tel=$tra1[0]['Telefono'];
$email=$tra1[0]['Email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/prin_adm.css">
    <title>&#9999; Módulo Administrativo &#128452;</title>
    <?php require("partials/header.php");?>
</head>

<body>
    
<nav class="navbar">
            <ul class="nav__menu">
            <li class="nav__menu--title"><a href="princ_admin.php">Inicio</a>          
                </li>    
            <li class="nav__menu--title"><a href="">Consultar</a>
                    <ul class="nav__submenu">
                        <li><a href="repor_estu.php">Estudiante</a></li>
                        <li><a href="report_nove.php">Novedades</a></li>
                    </ul>
            </li>
            <li class="nav__menu--title"><a href="">Estudiantes</a>
                    <ul class="nav__submenu">
                        <li><a href="crea_est.php">Crear</a></li>
                        <li><a href="">Actualizar</a></li>
                        <li><a href="inactiva_est.php">Inactivar</a></li>
                    </ul>
                </li>
                <li class="nav__menu--title"><a href="">Generar</a>
                    <ul class="nav__submenu">
                        <li><a href="resgis_nov.php">Novedad</a></li>
                    </ul>
                </li>
                <li class="nav__menu--title"><a href="actual_admin.php">Actualizar Datos</a></li>

                <li class="nav__menu--title"><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    
    <h1>MODULO ADMINISTRATIVO</h1>
    <div class="formulario">
    <form class="form-login" method="post" name="modulo">
        <h4>BIENVENIDO(A)...</h4>
        <div class="datos">
            NOMBRES: <?php echo $nom;?>
            <br><br>
            APELLIDOS: <?php echo $apell;?>
            <br><br>
            DOCUMENTO: <?php echo $doc;?>
            <br><br>
            DIRECCION: <?php echo $dir;?>
            <br><br>
            TELEFONO: <?php echo $tel;?>
            <br><br>
            EMAIL: <?php echo $email;?>
            <br><br>
            <hr>
        </div>    
    </form>
    <img src="imag/imagen1.jpg" width="400" height="300">
    </div>
    <?php require_once("partials/footer.php") ?>
    </body>


</html>