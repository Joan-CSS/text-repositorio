<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona la fecha </title>
    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet" />
    
</head>

<body>
    <header>
        <section class="banner">
            <div class="contenido-banner">
                <img class="logo-index" src="img/CFEsinletra.png" alt="">
            </div>
            <a class="link bien" href="index.php">Volver al menu principal</a>
        <?php
        session_start();
        // Controlo si el usuario ya está logueado en el sistema.
        if (isset($_SESSION['rpe_traba'])) {
            // Le doy la bienvenida al usuario.
            echo '<h3 class="bien">Bienvenido(a) <strong>' . $_SESSION['nombr_traba'] . '</strong><h3>';

        ?>
        </section>
    </header>
    <section>

            <div class="introduccion">
                <!-- Se presentan las graficas con el titulo de su respectivo departamento segun el usuario -->
                <h2>Gráficas del estado de desperfecto
                <?php
                echo ' del departamento de <strong>' . $_SESSION['area_depto'] . ' </strong> ';
            } else {
                // Si no está logueado lo redireccion a la página de login.
                header("HTTP/1.1 302 Moved Temporarily");
                header("Location:cerrar-sesion.php");
            }
                ?>
                </h2>
            </div>

    </section>

    <section>
        <form class="inputs-fecha" action="indexgrafica.php" method="post">
            <fieldset>
                <legend>Ingresa las fechas de busqueda</legend>
                <div class="container-fecha">
                    <div class="campos-fecha">
                        <label>Fecha inicial</label>
                        <input type="date" class="fecha1" name="fecha1" id="fecha1" placeholder="" min="2017-01-27" max="Hoy" required>
                    </div>
                    <div class="campos-fecha">
                        <label>Fecha terminacion</label>
                        <input type="date" class="fecha2" name="fecha2" id="fecha2" placeholder="" min="2020-01-27" max="Hoy" required>
                    </div>
                    <input type="submit" align="center" name="Buscar" class="boton_1" value="Buscar">
                </div>
            </fieldset>
        </form>

</body>

</html>