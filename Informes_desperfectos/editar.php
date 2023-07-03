<?php
include("conexion.php");



// Obtener el valor de "numer_aviso" de la URL
$numer_aviso = $_GET['numer_aviso'];
// Consultar la base de datos para obtener los datos del registro correspondiente
$sql = "SELECT gs.fecha_regis, gs.estad_atenc, gs.impor_produ, gs.numer_aviso, gs.numer_unida, gs.equip_siste, gs.descr_despe, gs.atenc_es_fs, gs.clase_orden, gs.permi_segur, gs.tarea_criti, gs.comen_tario, gs.rpe_regis,gs.tipo_falla, tf.area_depto, tf.modo_falla, tf.clave_falla
    FROM gesti_servi gs
    INNER JOIN tipo_falla tf ON gs.tipo_falla = tf.clave_falla WHERE numer_aviso = '$numer_aviso'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);


?>
<script>
        function confirmarActualizacion() {
            // Mostrar un mensaje de confirmación al usuario
            var confirmacion = confirm("¿Estás seguro de que deseas actualizar los datos?");

            // Si el usuario hace clic en "Aceptar", se envía el formulario
            if (confirmacion) {
                document.getElementById("formulario").submit();
            }
        }
    </script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar informe de desperfectos</title>
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
            <a class="link bien" href="index.php">Volver al menu principal</a>
            <?php
            session_start();
            include("conexion.php");
            // Controlo si el usuario ya está logueado en el sistema.
            if (isset($_SESSION['rpe_traba'])) {
                // Le doy la bienvenida al usuario.
                echo '<h3 class="bien">Bienvenido(a) <strong>' . $_SESSION['nombr_traba'] . '</strong><h3>';

            ?>

        </section>
    </header>
    <section class="introduccion">
        <h2>Editar Informe de desperfectos internos </h2>
    <?php
                echo ' del departamento de <strong>' . $_SESSION['area_depto'] . ' </strong> ';
            } else {
                // Si no está logueado lo redireccion a la página de login.
                header("HTTP/1.1 302 Moved Temporarily");
                header("Location:cerrar-sesion.php");
            }
    ?>

    </section>

    <div class="container-agregar">
        <form id="formulario" method="post" action="editardt.php">
            <div class="nav-crud">

                <div class="contenido-crud">
                    <input type="datetime" name="fecha_regis" value="<?php echo $row['fecha_regis'] ?>" readonly="readonly">
                </div>
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="estad_atenc" id="estad_atenc">
                        <option value="">Estado</option>
                        <?php
                        $sql = mysqli_query($link, "SELECT DISTINCT estad_atenc FROM gesti_servi ORDER BY estad_atenc");
                        while ($datos = mysqli_fetch_array($sql)) {
                            $selected = ($datos['estad_atenc'] == $row['estad_atenc']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $datos['estad_atenc'] ?>" <?php echo $selected ?>><?php echo $datos['estad_atenc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>


                </div>
                <div class="contenido-crud">
                    <input type="text" name="rpe_regis" placeholder="RPE" value="<?php echo $row['rpe_regis'] ?>" readonly="readonly">
                </div>
                <div class="contenido-crud">
                    <input type="text" name="impor_produ" id="impor_produ" placeholder="Prioridad" value="<?php echo $row['impor_produ'] ?>">

                </div>
                <div class="contenido-crud">
                    <input type="text" name="numer_aviso" id="numer_aviso" placeholder="Numero de aviso" value="<?php echo $row['numer_aviso'] ?>" readonly="readonly">

                </div>
                <div class="contenido-crud">
                    <input class="contenido-agregar" name="area_depto" id="area_depto" value=" <?php echo  $row['area_depto'] ?>" readonly="readonly">
                </div>
                <div class="contenido-crud">
                    <input type="text" class="contenido-agregar" name="clave_depto" value="<?php echo  $_SESSION['clave_depto'] ?>" readonly="readonly">
                </div>
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="numer_unida" id="numer_unida">
                        <option value="0" selected>Unidades</option>
                        <?php
                        $sql = mysqli_query($link, "SELECT DISTINCT numer_unida FROM gesti_servi ORDER BY numer_unida");
                        while ($datos = mysqli_fetch_array($sql)) {

                            $selected = ($datos['numer_unida'] == $row['numer_unida']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $datos['numer_unida'] ?>" <?php echo $selected ?>><?php echo $datos['numer_unida'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="tipo_falla">
                        <option value="">Tipo de falla</option>
                        <?php
                        $clave_depto = $_SESSION['clave_depto'];
                        $sql = mysqli_query($link, "SELECT DISTINCT clave_falla FROM tipo_falla WHERE clave_depto = '$clave_depto' ORDER BY clave_falla ");
                        while ($datos = mysqli_fetch_array($sql)) {
                            $selected = ($datos['clave_falla'] == $row['clave_falla']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $datos['clave_falla'] ?>" <?php echo $selected ?>><?php echo $datos['clave_falla'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="contenido-crud">
                    <input type="text" name="equip_siste" id="equip_siste" placeholder="Equipos" value="<?php echo $row['equip_siste'] ?>">

                </div>
                <div class="contenido-crud">
                    <input type="text" name="descr_despe" id="descr_despe" placeholder="Descripcion del desperfecto" value="<?php echo $row['descr_despe'] ?>">

                </div>
                <div class="contenido-crud">

                    <select class="contenido-agregar" name="atenc_es_fs" id="atenc_es_fs">
                        <option value="0" selected>Atencion</option>
                        <?php
                        $sql = mysqli_query($link, "SELECT DISTINCT atenc_es_fs FROM gesti_servi ORDER BY atenc_es_fs");
                        while ($datos = mysqli_fetch_array($sql)) {
                            $selected = ($datos['atenc_es_fs'] == $row['atenc_es_fs']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $datos['atenc_es_fs'] ?>" <?php echo $selected ?>><?php echo $datos['atenc_es_fs'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="contenido-crud">

                    <select class="contenido-agregar" name="clase_orden" id="clase_orden">
                        <option value="0" selected>Clase de orden</option>
                        <?php
                        $sql = mysqli_query($link, "SELECT DISTINCT clase_orden FROM gesti_servi ORDER BY clase_orden");
                        while ($datos = mysqli_fetch_array($sql)) {
                            $selected = ($datos['clase_orden'] == $row['clase_orden']) ? 'selected' : '';
                        ?>
                             <option value="<?php echo $datos['clase_orden'] ?>" <?php echo $selected ?>><?php echo $datos['clase_orden'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="permi_segur" id="permi_segur">
                        <option value="0" selected>Permiso de seguridad</option>
                        <?php
                        $sql = mysqli_query($link, "SELECT DISTINCT permi_segur FROM gesti_servi ORDER BY permi_segur");
                        while ($datos = mysqli_fetch_array($sql)) {
                            $selected = ($datos['permi_segur '] == $row['permi_segur ']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $datos['permi_segur'] ?>" <?php echo $selected ?>><?php echo $datos['permi_segur'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="tarea_criti">
                        <option value="" selected>Tarea critica</option>
                        <?php
                        $sql = mysqli_query($link, "SELECT DISTINCT tarea_criti FROM gesti_servi ORDER BY tarea_criti");
                        while ($datos = mysqli_fetch_array($sql)) {
                            $selected = ($datos['tarea_criti'] == $row['tarea_criti']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $datos['tarea_criti'] ?>" <?php echo $selected ?>><?php echo $datos['tarea_criti'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="contenido-crud">
                    <input type="text" name="comen_tario" id="comen_tario" placeholder="Comentarios" value="<?php echo $row['comen_tario'] ?>">

                </div>
                <div class="contenido-crud">
                    <input type="button" value="Actualizar" onclick="confirmarActualizacion()" class="buttonA">

                </div>
            </div>
        </form>



    </div>

</body>

</html>