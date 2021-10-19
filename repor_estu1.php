<?php
session_start();
if (!isset($_SESSION['login']))
{
    echo "<script type='text/javascript'>
        alert('Usuario no haz Iniciado Sesión, por favor Logueate!!!!');
        window.location='index.php';
        </script>";
}
$id=$_POST['documento'];
require_once("class/class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/repor_est1.css">
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
                        <li><a href="">Inactivar</a></li>
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
<br>

<br><center><form class="form-login" method="post" name="login" action="repor_estu1.php">
    <h4>Consulta por estudiante</h4>
    <input class="controls" type="text" name="usuario" value="" placeholder="Ingresa Numero de documento estudiante" required>
    

    <input class="buttons" type="submit" name="enviar" value="Consultar">
    
</form><br><br><br></center>

<div class="reporte">
    <center>
            <form class="formNov" method="POST" name="novedad" action="">
                <br><h2>REPORTE TOTAL DE NOVEDADES</h2><hr><br>
                <div class="container" method="POST">
                    <div class="result_nov">
                    <table border=1>
                            <?php
                            $tra2=new Colegio();
                            $tra3=$tra2->Repor_Estud($id);
                        

                        for($i=0; $i<sizeof($tra3); $i++){
                            ?>
                            <tr>
                            <td>Tipo de Novedad:</td>
                            <td><?php echo $tra3[0]['NombreTipoNovedad'];?></td>
                            </tr>
                            <tr>
                            <td>Novedad:</td>
                            <td><?php echo $tra3[0]['Registro'];?></td>
                            </tr>
                            <tr>
                            <td>Fecha Novedad:</td>
                            <td><?php echo $tra3[0]['fecha'];?></td>
                            </tr>
                            <tr>
                            <td>Hora Novedad:</td>
                            <td><?php echo $tra3[0]['hora'];?></td>
                            </tr>
                            <tr>
                            <td>Estudiante:</td>
                            <td><?php echo $tra3[0]['Nombre']." ".$tra3[0]['Apellido'];?></td>
                            </tr>
                            <tr>
                            <td></td>
                            <td></td>
                            </tr>
                            <?php
                            }   
                        
                        ?>
                        </table>
                    </div>    
                </div>
            </form>
        </center><br>
    </div>

</body>

<footer>
<?php require_once("partials/footer.php") ?>
</footer>

</html>