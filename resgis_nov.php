<?php
session_start();
if (!isset($_SESSION['login']))
{
    echo "<script type='text/javascript'>
        alert('Usuario no haz Iniciado Sesión, por favor Logueate!!!!');
        window.location='index.php';
        </script>";
}
require("class/class.php");
$tra1=new Colegio();

if(isset($_POST['enviar']))
{
    $nov=$tra1->Inser_nov($_POST['Registro'], $_POST['fecha'], $_POST['hora'], $_POST['tip_nov'], $_POST['id']);
    echo "<script type='text/javascript'>
        alert('Novedad generada satisfactoriamente');
        window.location='resgis_nov.php';
        </script>";
}


$tra3=new Colegio();
$tra4=$tra3->Tipo_nov();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/gene_nov.css">
    <title>Registro novedad</title>
</head>
<body>
<header>
        <img class="lado_izq" src="imag/Captura.jpg" alt="Escudo 1">
        <center><img class="texto_tit" src="imag/logo_colegio1.jpg" atl="Titulo"></center>
        <img class="lado_der" src="imag/Captura.jpg" alt="Escudo 2">
    </header>
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
    <hr>
    <div>
    <center><form method="POST" class="form">
        <h1>Generación de Novedad</h1>
        <br>
        <select name="tip_nov" class="controls">
        <option class="controls">Seleccione el Tipo de Novedad</option>
        <?php
        for($i=0;$i<sizeof($tra4);$i++)
        {
            $id=$tra4[$i]['IdtipoNov'];
            $nom=$tra4[$i]['NombreTipoNovedad'];
        ?>
        <option value="<?php echo $id; ?>"><?php echo $nom;?></option>
        <?php
        }
        ?>
        </select><br>
        <input type="text" name="id" placeholder="# Documento estudiante" class="controls"><br>
        <input type="date" name="fecha" class="controls"><br>
        <input type="time" name="hora"  class="controls"><br>
        <textarea name="Registro" class="controls" cols="30" rows="10" placeholder="Haga una descripción detallada de la novedad" ></textarea>
        
        <input type="submit" name="enviar"  value="CREAR NOVEDAD" class="buttons">
        <input type="reset"  value="LIMPIAR FORMULARIO" class="buttons"><br>
    </form>
    </center>
    </div>
<br>
</body>
<?php require_once("partials/footer.php") ?>
</html>
