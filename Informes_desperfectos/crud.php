<!DOCTYPE html>
<?php

session_start();
include("conexion.php");

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <section class="banner expandir">
            <div class="contenido-b">
                <img class="logo-index " src="img/CFEsinletra.png" alt="">
                <a class="link bien" href="index.php">Volver al menu principal</a>
                <?php

                // Controlo si el usuario ya está logueado en el sistema.
                if (isset($_SESSION['rpe_traba'])) {
                    // Le doy la bienvenida al usuario.
                    echo '<h3 class="bien">Bienvenido(a) <strong>' . $_SESSION['nombr_traba'] . '</strong><h3>';

                ?>
            </div>

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
    <div class="contenido-agregar">
        <a href="agregar.php" class="buttonE">Agregar</a>
    </div>
    </section>
    <main>
        <div class="container-crud">
            <table>
                <thead>
                    <tr>
                        <th>
                            <p class="text-tabla">Fecha de registro</p>
                        </th>
                        <th>
                            <p class="text-tabla">Estado</p>
                        </th>
                        <th>
                            <p class="text-tabla">RPE trabajador</p>
                        </th>
                        <th>
                            <p class="text-tabla">Prioridad</p>
                        </th>
                        <th>
                            <p class="text-tabla">numero de aviso</p>
                        </th>
                        <th>
                            <p class="text-tabla">Area de departamento</p>
                        </th>
                        <th>
                            <p class="text-tabla">Numero de unidad</p>
                        </th>
                        <th>
                            <p class="text-tabla">Modo de falla</p>
                        </th>
                        <th>
                            <p class="text-tabla">Equipo</p>
                        </th>
                        <th>
                            <p class="text-tabla">Descripcion</p>
                        </th>
                        <th>
                            <p class="text-tabla">Atencion</p>
                        </th>
                        <th>
                            <p class="text-tabla">Clase de orden</p>
                        </th>
                        <th>
                            <p class="text-tabla">Permiso de seguridad</p>
                        </th>
                        <th>
                            <p class="text-tabla">Tarea critica</p>
                        </th>
                        <th>
                            <p class="text-tabla">Comentario</p>
                        </th>
                        <th>
                            <p class="text-tabla">Opciones</p>
                        </th>



                    </tr>
                </thead>
                <?php




                $usuarioActual = $_SESSION['rpe_traba']; // Es para que el usuario actual pueda ver sus registros 

                $consulta = "SELECT gs.fecha_regis, gs.estad_atenc, gs.impor_produ, gs.numer_aviso, gs.numer_unida, gs.equip_siste, gs.descr_despe, gs.atenc_es_fs, gs.clase_orden, gs.permi_segur, gs.tarea_criti, gs.comen_tario, gs.rpe_regis, gs.tipo_falla, tf.area_depto, tf.modo_falla, tf.clave_falla
                FROM gesti_servi gs
                INNER JOIN tipo_falla tf ON gs.tipo_falla = tf.clave_falla
                WHERE gs.rpe_regis = '$usuarioActual'
                ORDER BY gs.fecha_regis DESC 
                LIMIT 25";



                $resultado = mysqli_query($link, $consulta);
                if ($resultado) {
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['fecha_regis'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['estad_atenc'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['rpe_regis'];
                        echo "</p>";
                        echo "</td>";


                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['impor_produ'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['numer_aviso'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['area_depto'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['numer_unida'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['modo_falla'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['equip_siste'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['descr_despe'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['atenc_es_fs'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['clase_orden'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['permi_segur'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['tarea_criti'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['comen_tario'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<a class='link' href='editar.php?numer_aviso=" . $row['numer_aviso'] . "'>Editar</a>";
                        echo "</td>";

                        echo "</tr>";
                        echo "</tbody>";
                    }
                } else {
                    echo "Error en la consulta: " . mysqli_error($link);
                }



                mysqli_close($link);
                ?>
            </table>
        </div>
    </main>
</body>

</html>