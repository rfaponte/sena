<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>&#128512;Módulo de Recuperación de Contraseña"&#128512;
</title>
    <link rel="stylesheet" href="estilos/style1.css">
</head>
<header>
    <img class="lado_izq" src="imag/Captura.JPG" alt="logo 1">

    <div class="lado_central">
        <center><img src="imag/logo_colegio1.jpg" height="120px" width="100%" alt="logo 3"></center>
    </div>
    <img class="lado_der" src="imag/Captura.JPG" alt="logo 2">
</header>
<body>
    <form class="form-login" method="post" name="login" action="class/envia_pass.php">
        <h4>Validación de Usuario</h4><br>
        <input class="controls" type="text" name="usuario" value="" placeholder="&#128273;Usuario" required>
        <input class="buttons" type="submit" name="Recuperar Contraseña" value="Recuperar Contraseña">
        
    </form>
    <br><br><br><br>

</body>
<hr>
    <footer>
        <div id="footer_prin">
            <div class="texto_fot">
                <p>&copy: Colegio Bilingüe "Rosalia Vidal de Rico" - Carrera 11 No 10 - 07, SOACHA, CUNDINAMARCA - Teléfono (1) 5754994</p>
                    <?php echo date("Y"); ?><br>
            </div>
            <div class="contador">
                <a href="https://www.hitwebcounter.com" target="_blank">
                    <img src="https://hitwebcounter.com/counter/counter.php?page=7819000&style=0014&nbdigits=5&type=page&initCount=0" title="Free Counter" Alt="web counter" border="0" /></a>
            </div>
    </footer>

</html>