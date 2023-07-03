<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="preload" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <section class="banner">
            <div class="contenido-banner">
                <img class="logo-index" src="img/CFEsinletra.png" alt="">
            </div>
            <?php

            // Controlo si el usuario ya está logueado en el sistema.
            if (isset($_SESSION['rpe_traba'])) {
                // Le doy la bienvenida al usuario.
                echo '<h3 class="bien">Bienvenido(a) <strong>' . $_SESSION['nombr_traba'] . '</strong><h3>';

            ?>

        </section>
    </header>
    <section class="introduccion">
        <h2>Informe de desperfectos internos </h2>
    <?php
                echo ' del departamento de <strong>' . $_SESSION['area_depto'] . ' </strong> ';
            } else {
                // Si no está logueado lo redireccion a la página de login.
                header("HTTP/1.1 302 Moved Temporarily");
                header("Location:cerrar-sesion.php");
            }
    ?>
    </section>

    <main class="navegacion">
        <div class="nav-botones">
            <section class="contenido-navegacion">

                <a class="link" href="selectfecha.php">
                    <p>Graficas estado de desperfectos </p>
                </a>
                <div class="iconos-nav">
                    <a class="link" href="selectfecha.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-antenna-bars-5" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="6" y1="18" x2="6" y2="15" />
                            <line x1="10" y1="18" x2="10" y2="12" />
                            <line x1="14" y1="18" x2="14" y2="9" />
                            <line x1="18" y1="18" x2="18" y2="6" />

                        </svg></a>
                </div>

            </section>
            <section class="contenido-navegacion">
                <a class="link" href="tablas.php">
                    <p>Tablas de bitacora<br><br></p>
                </a>
                <div class="iconos-nav">
                    <a class="link" href="tablas.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                            <rect x="9" y="3" width="6" height="4" rx="2" />
                            <path d="M9 17v-5" />
                            <path d="M12 17v-1" />
                            <path d="M15 17v-3" />
                        </svg>
                    </a>
                </div>
            </section>
            <section class="contenido-navegacion">
                <a class="link" href="crud.php">
                    <p>Trabajos por prioridad</p>
                </a>
                <div class="iconos-nav">
                    <a class="link" href="crud.php">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" />
                            <line x1="13" y1="8" x2="15" y2="8" />
                            <line x1="13" y1="12" x2="15" y2="12" />
                        </svg>
                    </a>
                </div>
            </section>
            <section class="contenido-navegacion">
                <a class="link" href="agregar.php">
                    <p>Registrar desperfecto</p>
                </a>
                <div class="iconos-nav">
                    <a class="link" href="agregar.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-run" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="13" cy="4" r="1" />
                            <path d="M4 17l5 1l.75 -1.5" />
                            <path d="M15 21l0 -4l-4 -3l1 -6" />
                            <path d="M7 12l0 -3l5 -1l3 3l3 1" />
                        </svg>
                    </a>
                </div>
            </section>
            <section class="contenido-navegacion">
                <p>Unidades de servicio reserva </p>
                <div class="iconos-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-temperature" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 13.5a4 4 0 1 0 4 0v-8.5a2 2 0 0 0 -4 0v8.5" />
                        <line x1="10" y1="9" x2="14" y2="9" />
                    </svg>
                </div>
            </section>
            <section class="contenido-navegacion">
                <a class="link" href="cerrar-sesion.php">
                    <p>Salir <br></br> </p>
                </a>
                <div class="iconos-nav">
                    <a class="link" href="cerrar-sesion.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="4" y1="12" x2="14" y2="12" />
                            <line x1="4" y1="12" x2="8" y2="16" />
                            <line x1="4" y1="12" x2="8" y2="8" />
                            <line x1="20" y1="4" x2="20" y2="20" />
                        </svg></a>
                </div>

            </section>
        </div><!--nav,botones-->
    </main>

    <footer>

    </footer>

</body>

</html>