<?php
//require_once("class/class.php")
//$nom_est=$_POST['nom_est'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos1.css">
    <title>Consulta estudiante</title>
</head>
<body>
<header>
<img class="lado_izq" src="imag/Captura.jpg" alt="Escudo 1">
        <center><img class="texto_tit" src="imag/logo_colegio1.jpg" atl="Titulo"></center>
        <img class="lado_der" src="imag/Captura.jpg" alt="Escudo 2">
    </header>
    <hr>
    <div class="form">
<form action="" name="form" method="post"  >
<center>

	<table>
    <tr>
    <td><h2><center>Consulta estudiante</center></h2></td>
    </tr>
    <tr>
    <td><h3><center>Buscar estudiante</center></h3></td>
    </tr>
    <tr>
    <td><center><input class="entrada" type="text" placeholder="Digite nombre del estudiante"></center></td>
    </tr>
    <tr>
    <td><center><input class="entrada" type="text" placeholder="Escribir observacion academica"></center></td>
    </tr>
    <tr>
    <td><center><input class="entrada" type="text" placeholder="Escribir observacion diciplinaria"></center><br></td>
    </tr>
    <tr>
    <tr>
    <td><center><input  class="boton" type="submit" name="buscar" value="Buscar"></center></td>
    </tr>
    <tr>
    <td><center><input  class="boton" type="submit" name="agregar" value="Agregar"></center></td>
    </tr>
    <tr>
    <td><center><input  class="boton" type="submit" name="cancelar" ></center></td>
    </tr>
    <tr>
    <td><center><input  class="boton" type="submit" name="guardar" value="Guardar"><br></td>
    </tr>
    <tr>
    <td><center><textarea cols="35" rows="10">
	  </textarea></center></td>
      </tr>
      </center>
 </table>
    </form>
    </div>
</body>
</html>