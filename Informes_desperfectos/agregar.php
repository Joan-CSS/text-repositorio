<script>
        function confirmarAgregar() {
            // Mostrar un mensaje de confirmación al usuario
            var confirmacion = confirm("¿Estás seguro de que deseas agregar los datos?");

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar informe de desperfectos</title>
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
        <h2>Agregar Informe de desperfectos internos </h2>
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
        <form id=formulario method="post" action="agregardt.php">
            <div class="nav-crud">

                <div class="contenido-crud">
                    <input type="datetime" name="fecha_regis" value="<?php echo date("Y-m-d"); ?>" readonly="readonly">
                </div>
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="estad_atenc" id="estad_atenc" required>
                        <option value="0">Estado</option>
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
                <div class="contenido-crud">
                    <input type="text" name="rpe_regis" id="rpe_traba" placeholder="RPE" value="<?php echo $_SESSION['rpe_traba']; ?>" readonly="readonly">
                </div>
                <div class="contenido-crud">
                    <input type="text" name="impor_produ" id="impor_produ" placeholder="Prioridad" required>

                </div>
                <div class="contenido-crud">
                    <input type="text" name="numer_aviso" id="numer_aviso" placeholder="Numero de aviso" required>

                </div>
                <div class="contenido-crud">
                    <input class="contenido-agregar" name="area_depto" id="area_depto" value=" <?php echo  $_SESSION['area_depto']?>" readonly="readonly">
                </div>
                <div class="contenido-crud">
                    <input type="text" class="contenido-agregar" name="clave_depto" value="<?php echo  $_SESSION['clave_depto']?>" readonly="readonly">
                </div>
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="numer_unida" id="numer_unida" required>
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
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="tipo_falla" required>
                        <option value="">Tipo de falla</option>
                         <?php
                         $clave_depto = $_SESSION['clave_depto'];
                        $sql = mysqli_query($link, "SELECT DISTINCT clave_falla FROM tipo_falla WHERE clave_depto = '$clave_depto' ORDER BY clave_falla ");
                        while ($datos = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?php echo $datos['clave_falla'] ?>"><?php echo $datos['clave_falla'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                
                <div class="contenido-crud">
                    <input type="text" name="equip_siste" id="equip_siste" placeholder="Equipos" required>

                </div>
                <div class="contenido-crud">
                    <input type="text" name="descr_despe" id="descr_despe" placeholder="Descripcion del desperfecto" required>

                </div>
                <div class="contenido-crud">

                    <select class="contenido-agregar" name="atenc_es_fs" id="atenc_es_fs" required>
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
                <div class="contenido-crud">

                    <select class="contenido-agregar" name="clase_orden" id="clase_orden" required>
                        <option value="0" selected>Clase de orden</option>
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
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="permi_segur" id="permi_segur" required>
                        <option value="0" selected>Permiso de seguridad</option>
                        <?php
                        $sql = mysqli_query($link, "SELECT DISTINCT permi_segur FROM gesti_servi ORDER BY permi_segur");
                        while ($datos = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?php echo $datos['permi_segur'] ?>"><?php echo $datos['permi_segur'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="contenido-crud">
                    <select class="contenido-agregar" name="tarea_criti" required>
                        <option value="" selected>Tarea critica</option>
                        <?php
                        $sql = mysqli_query($link, "SELECT DISTINCT tarea_criti FROM gesti_servi ORDER BY tarea_criti");
                        while ($datos = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?php echo $datos['tarea_criti'] ?>"><?php echo $datos['tarea_criti'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="contenido-crud">
                    <input type="text" name="comen_tario" id="comen_tario" placeholder="Comentarios">

                </div>
                <div class="contenido-crud">
                    <input type="button" value="Agregar" onclick="confirmarAgregar()" class="buttonA">

                </div>
            </div>
        </form>



    </div>

</body>

</html>