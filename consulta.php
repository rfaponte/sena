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
$info=new Colegio();
$inf=$info->trae_datos($usuario);

$id=$inf[0]['DocumentoId'];
$info1=new Colegio();
$inf1=$info1->trae_info($id);
$grado=$inf1[0]['Grado'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilos/consulta.css">
	<title>Base de Datos Colegio Bilingue de Soacha Rosalia Vidal de Rico </title>
	<?php require("partials/header.php");?>
</head>
<body>
	<?php require("partials/nav_cons.php");?>
	<div class="contenedor">
			<center>
				<table>
					<tr>
					<td colspan="2" align="center"><h2>BIENVENIDO(A) ESTUDIANTE</h2><hr></td>
					</tr>
					<tr>
					<td>Numero de Documento</td>
					<td><?php echo $inf[0]['DocumentoId'];?></td>
					<tr>
					<tr>
					<td>Nombres y Apellidos</td>
					<td><?php echo $inf[0]['Nombre']." ".$inf[0]['Apellido'];?></td>
					</tr>
					<tr>
					<td>Grado</td>
					<td><?php echo $grado;?></td>
				</table>
			</center>
	</div>
	<br><br><br><br>
	<?php require("partials/footer.php");?>

</body>
</html>