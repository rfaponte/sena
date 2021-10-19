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
//$info=new Colegio();
//$novedad=$info->Traer_Noved();
$info1=new Colegio();
$a=$_GET['id'];
$idNov=$info1->Ver_Novedad($a);
if(isset($_POST['Buscar']))
{
    $most=$info1->Ver_Novedad($a,$_POST['Registro'],$_POST['fecha'],$_POST['hora']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Novedades</title>
    <link rel="stylesheet" href="estilos/con_nov1.css" type="text/css">
    <?php require("partials/header.php");?>
</head>
<body>
<?php require("partials/nav_cons.php");?><br>
        <h4>NOVEDADES DEL ESTUDIANTE</h4><br>
        <center>
            <form class="formNov" method="POST" name="novedad" action="">
                <h1>Resultados</h1><hr><br>
                <div class="container" method="POST">
                    <div class="result_nov">
                        <table>
                        <?php
                            for($i = 0; $i <count($idNov); $i++){
                                $idNov[$i]['Registro'];
                            ?>
                            <tr>
                            <td>Tipo de Novedad:</td>
                            <td><?php echo $idNov[$i]['NombreTipoNovedad'];?></td>
                            </tr>
                            <tr>
                            <td>Novedad:</td>
                            <td><?php echo $idNov[$i]['Registro'];?></td>
                            </tr>
                            <tr>
                            <td>Fecha Novedad:</td>
                            <td><?php echo $idNov[$i]['fecha'];?></td>
                            </tr>
                            <tr>
                            <td>Hora Novedad:</td>
                            <td><?php echo $idNov[$i]['hora'];?></td>
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
</body>
<?php require("partials/footer.php");?>
</html>