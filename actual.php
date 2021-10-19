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
	<link rel="stylesheet" href="estilos/consulta.css">
	<link rel="stylesheet" href="estilos/con_nov1.css" type="text/css">
	<title>Base de Datos Colegio Bilingue de Soacha Rosalia Vidal de Rico </title>
    <?php require("partials/header.php");?>
</head>
<body>
<body>
<?php require("partials/nav_cons.php");?><br>
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