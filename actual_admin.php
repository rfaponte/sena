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
$tra= new Colegio();
$tra1=$tra->Datos_Estud($usuario);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="estilos/con_nov1.css" type="text/css">
	<title>Base de Datos Colegio Bilingue de Soacha Rosalia Vidal de Rico </title>
    <?php require("partials/header.php");?>
</head>
<body>
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
                        <li><a href="">Crear</a></li>
                        <li><a href="">Actualizar</a></li>
                        <li><a href="">Inactivar</a></li>
                    </ul>
                </li>
                <li class="nav__menu--title"><a href="">Generar</a>
                    <ul class="nav__submenu">
                        <li><a href="">Novedad</a></li>
                    </ul>
                </li>
                <li class="nav__menu--title"><a href="actual.php">Actualizar Datos</a></li>

                <li class="nav__menu--title"><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <h4>ACTUALIZA TUS DATOS</h4><br>
        <center>
			<h4><?php echo $tra1[0]['Nombre'].' '.$tra1[0]['Apellido'] ?></h4>
            <form class="formNov" method="POST" name="novedad" action="">
                <div class="container" method="POST">
                    <div class="result_nov">
                        <table class="table">
							<tr>
								<td>Direccion</td><td><input type="text" name="dir" value="<?php echo $tra1[0]['Direccion'];?>" required></td>
								<td>Telefono</td><td><input type="text" name="tel" value="<?php echo $tra1[0]['Telefono'];?>" required></td>
							</tr>
						</table>
						<input type="submit" class="button" name="enviar" value="Actualizar">
                    </div>    
                </div>
            </form>
        </center><br><br><br>
</body>
<?php require("partials/footer.php");?>
</html>
<?php
if(isset($_POST['enviar']))
{
	$pos[]=$_POST;
	
	$tra3=$tra->trae_datos($usuario);
	
	$id=$tra3[0]['DocumentoId'];
	$tra2=$tra->ActualizarDatos1($pos,$usuario,$id);
}

?>