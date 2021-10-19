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
$clas= new Colegio;
$rol=$clas->ROl();
if (isset($_POST['enviar'])) 
{
    $ins=$clas->Insert_user($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['tel'], $_POST['pass'], $_POST['rol'], $_POST['email']);

}
if(isset($_POST['enviar']))
{
    $inf=$clas->Insert_info ($_POST['grado'], $_POST['acudiente'], $_POST['id_acudiente'], $_POST['telefono'], $_POST['id'], $_POST['email_acu']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/crea_usu.css">
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
    
    <h1>MODULO ADMINISTRATIVO</h1>
    <center>
    <div>
    <form method="POST" class="form">
        <h1>Creacion de usuario</h1>
        <br>
        <input type="text" name="id" placeholder="# Documento estudiante" class="controls"><br>
        <input type="text" name="nombre" placeholder="Nombres del estudiante"class="controls"><br>
        <input type="text" name="apellido" placeholder="Apellidos del estudiante"class="controls"><br>
        <input type="text" name="direccion" placeholder="Dirección del estudiante"class="controls"><br>
        <input type="text" name="tel" placeholder="# Teléfono del estudiante"class="controls"><br>
        <input type="password" name="pass" value="" placeholder="&#128272;Contraseña" class="controls"><br>
        <select name="rol" class="controls" placeholder="Password creado">
        <option class="controls">Seleccione el rol</option>
        <?php
        for($i=0;$i<sizeof($rol);$i++)
        {
            $id=$rol[$i]['IdRol'];
            $nom=$rol[$i]['NombreRol'];
        ?>
        <option value="<?php echo $id; ?>"><?php echo $nom;?></option>
        <?php
        }
        ?>
        </select><br>
        <input type="email" name="email" placeholder="Email Estudiante" class="controls"><br>
        <input type="text" name="grado" placeholder="Grado del estudiante" class="controls"><br>
        <input type="text" name="acudiente" placeholder="Nombre completo del acudiente" class="controls"><br>
        <input type="text" name="id_acudiente" placeholder="# de documento del acudiente " class="controls"><br>
        <input type="text" name="telefono" placeholder="# de teléfono acudiente" class="controls"><br>
        <input type="text" name="email_acu" placeholder="Direccion de E-MAIL Acudiente" class="controls"><br>
        <input type="submit" name="enviar"  value="CREAR ESTUDIANTE" class="buttons">
        <input type="reset"  value="LIMPIAR FORMULARIO" class="buttons"><br>
    </form>
    </div>
</center>
    <br>
    </body>
<?php require_once("partials/footer.php") ?>

</html>