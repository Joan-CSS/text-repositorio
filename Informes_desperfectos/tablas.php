
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de informes</title>
    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <link rel="preload" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <section class="banner">
            <div class="contenido-banner">
                <img class="logo-index" src="img/CFEsinletra.png" alt="">
            </div>
            <a class="link bien" href="index.php">Volver al menu principal</a>
            <?php
            include_once "conexion.php";

            $numer_unida = isset($_POST['numer_unida']) ? $_POST['numer_unida'] : 0;
            $clave_depto = isset($_POST['clave_depto']) ? $_POST['clave_depto'] : 0;
            $clase_orden = isset($_POST['clase_orden']) ? $_POST['clase_orden'] : 0;
            $estad_atenc = isset($_POST['estad_atenc']) ? $_POST['estad_atenc'] : 0;
            $atenc_es_fs = isset($_POST['atenc_es_fs']) ? $_POST['atenc_es_fs'] : 0;
            $impor_produ = isset($_POST['impor_produ']) ? $_POST['impor_produ'] : 0;
            $requi_inver = isset($_POST['requi_inver']) ? $_POST['requi_inver'] : 0;
            $modo_falla = isset($_POST['modo_falla']) ? $_POST['modo_falla'] : 0;

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
            <h2>Tabla del estado de desperfectos
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
    <main>
        <div class="main-container">
            <h2>Busqueda de Registros por Unidad, Departamento,Clase y Estado</h2>

            <form name="selecciona" action="tablas.php" method="POST">
                <div class="nav-select">
                    <div class="contenido-select">

                        <select name="numer_unida" id="numer_unida">

                            <option value="0" selected>Unidades</option>
                            <?php
                            $sql = mysqli_query($link, "SELECT DISTINCT numer_unida FROM gesti_servi ORDER BY numer_unida");
                            while ($datos = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $datos['numer_unida'] ?>"><?php echo $datos['numer_unida'] ?></option>
                            <?php
                            }
                            ?>

                        </select>

                    </div>
                    <div class="contenido-select">

                        <select name="clave_depto" id="clave_depto">

                            <option value="0" selected>Departamento</option>
                            <?php
                            $sql = mysqli_query($link, "SELECT DISTINCT clave_depto FROM gesti_servi ORDER BY clave_depto");
                            while ($datos = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $datos['clave_depto'] ?>"><?php echo $datos['clave_depto'] ?></option>
                            <?php
                            }
                            ?>


                        </select>
                    </div>
                    <div class="contenido-select">
                        <select name="clase_orden" id="clase_orden">

                            <option value="0" selected>Clases</option>
                            <?php
                            $sql = mysqli_query($link, "SELECT DISTINCT clase_orden FROM gesti_servi ORDER BY clase_orden");
                            while ($datos = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $datos['clase_orden'] ?>"><?php echo $datos['clase_orden'] ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="contenido-select">
                        <select name="estad_atenc" id="estad_atenc">

                            <option value="0" selected>Estado</option>
                            <?php
                            $sql = mysqli_query($link, "SELECT DISTINCT estad_atenc FROM gesti_servi ORDER BY estad_atenc");
                            while ($datos = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $datos['estad_atenc'] ?>"><?php echo $datos['estad_atenc'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="contenido-select">
                        <select name="atenc_es_fs" id="atenc_es_fs">

                            <option value="0" selected>Atencion</option>
                            <?php
                            $sql = mysqli_query($link, "SELECT DISTINCT atenc_es_fs FROM gesti_servi ORDER BY atenc_es_fs");
                            while ($datos = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $datos['atenc_es_fs'] ?>"><?php echo $datos['atenc_es_fs'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="contenido-select">
                        <select name="impor_produ">

                            <option value="0" selected>Prioridad</option>
                            <?php
                            $sql = mysqli_query($link, "SELECT DISTINCT impor_produ FROM gesti_servi ORDER BY impor_produ");
                            while ($datos = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $datos['impor_produ'] ?>"><?php echo $datos['impor_produ'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="contenido-select">
                        <select name="requi_inver" id="requi_inver">

                            <option value="0" selected>Inversion</option>

                            <?php
                            $sql = mysqli_query($link, "SELECT DISTINCT requi_inver FROM gesti_servi ORDER BY requi_inver");
                            while ($datos = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $datos['requi_inver'] ?>"><?php echo $datos['requi_inver'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="contenido-select">
                        <input type="text" name="palabra_clave" id="palabra_clave" placeholder="Palabra clave">
                    </div>

                    <div class="contenido-select">
                        <select name="modo_falla" id="modo_falla">
                            <option value="" selected>Modo de falla</option>
                            <?php
                            $sql = mysqli_query($link, "SELECT DISTINCT modo_falla FROM tipo_falla ORDER BY modo_falla");
                            while ($datos = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $datos['modo_falla'] ?>"><?php echo $datos['modo_falla'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    
                    <div class="contenido-select">
                        <input type="submit" value="Buscar" name="buscar" class="buttonA">
                    </div>
                    <div class="contenido-select">
                        <input type="reset" value="Restaurar" class="buttonA">
                    </div>
                    
                    <div class="contenido-select">
                   <a href="exportarExcel.php" class="buttonE">Exportar a excel</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="tabla">
            <table class="contenido-tabla">
                <thead>
                    <tr>
                        <th><p class="text-tabla">U</p></th>
                        <th><p class="text-tabla">C</p></th>
                        <th><p class="text-tabla">Depto</p></th>
                        <th><p class="text-tabla">Equipo</p></th>
                        <th><p class="text-tabla">Descripcion</p></th>
                        <th><p class="text-tabla">Clase</p></th>
                        <th><p class="text-tabla">Comentario</p></th>
                        <th><p class="text-tabla">Estatus</p></th>
                        <th><p class="text-tabla">Fecha Registro</p></th>
                        <th><p class="text-tabla">Fecha Prog</p></th>
                        <th><p class="text-tabla">Atencion (E/S F/S)</p></th>
                        <th><p class="text-tabla">Prioridad</p></th>
                        <th><p class="text-tabla">Aviso</p></th>
                        <th><p class="text-tabla">Inversion (SI/NO)</p></th>
                        <th><p class="text-tabla">Num de solicitud</p></th>
                        <th><p class="text-tabla">Fecha de solicitud</p></th>
                        <th><p class="text-tabla">Costo en pesos</p></th>
                        <th><p class="text-tabla">Ubicacion tecnica</p></th>
                        <th><p class="text-tabla">Permiso de seg</p></th>
                        <th><p class="text-tabla">Orden de trab</p></th>
                        <th><p class="text-tabla">RPE de Reg</p></th>
                        <th><p class="text-tabla">Fecha de modif</p></th>
                        <th><p class="text-tabla">RPE </p></th>
                        <th><p class="text-tabla">Modo de falla</p></th>
                    </tr>
                </thead>
                <?php


                $consulta = "SELECT g.numer_unida, g.conse_cutiv, g.clave_depto, g.equip_siste, g.descr_despe, g.clase_orden, g.comen_tario,
                g.estad_atenc, g.fecha_regis, g.fecha_plane, g.atenc_es_fs, g.impor_produ, g.numer_aviso,
                g.requi_inver, g.numer_requi, g.fecha_solpe, g.fecha_solpe, g.costo_atenc, g.ubica_tecni, g.permi_segur,g.orden_mysap, g.rpe_soluc, g.fecha_modif, g.rpe_modif, t.area_depto, t.modo_falla, t.clave_depto FROM gesti_servi g LEFT JOIN tipo_falla t ON g.clave_depto = t.clave_depto 
                WHERE 1=1";
                if (!empty($numer_unida)) {
                    $consulta .= " AND g.numer_unida = '$numer_unida'";
                }

                if (!empty($clave_depto)) {
                    $consulta .= " AND g.clave_depto = '$clave_depto'";
                }

                if (!empty($clase_orden)) {
                    $consulta .= " AND g.clase_orden = '$clase_orden'";
                }

                if (!empty($estad_atenc)) {
                    $consulta .= " AND g.estad_atenc = '$estad_atenc'";
                }

                if (!empty($atenc_es_fs)) {
                    $consulta .= " AND g.atenc_es_fs = '$atenc_es_fs'";
                }

                if (!empty($impor_produ)) {
                    $consulta .= " AND g.impor_produ = '$impor_produ'";
                }

                if (!empty($requi_inver)) {
                    $consulta .= " AND g.requi_inver = '$requi_inver'";
                }

                if (!empty($modo_falla)) {
                    $consulta .= " AND t.modo_falla = '$modo_falla'";
                }

                $consulta .= " LIMIT 100";
                $resultado = mysqli_query($link, $consulta);


                if ($resultado) {
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['numer_unida'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['conse_cutiv'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['clave_depto'];
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
                        echo $row['clase_orden'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['comen_tario'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['estad_atenc'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['fecha_regis'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['fecha_plane'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['atenc_es_fs'];
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
                        echo $row['requi_inver'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['numer_requi'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['fecha_solpe'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['costo_atenc'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['ubica_tecni'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['permi_segur'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['orden_mysap'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['rpe_soluc'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['fecha_modif'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['rpe_modif'];
                        echo "</p>";
                        echo "</td>";

                        echo "<td>";
                        echo "<p class=text-tabla>";
                        echo $row['modo_falla'];
                        echo "</p>";
                        echo "</td>";

                        echo "</tr>";
                        echo"</tbody>";
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