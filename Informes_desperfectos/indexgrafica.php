<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficas CFE</title>
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
            <h2>Gráficas del estado de desperfectos
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

    <?php
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
    $field = 'clave_depto';
    $temp = isset($_SESSION[$field]) ? $_SESSION[$field] : "no hay depto";
    ?>
    <!-- Se presenta la fecha segun sea la semana seleccionada en DeterFecha.php -->
    <h2>Fecha seleccionada del <?php echo $fecha1; ?> al <?php echo $fecha2; ?>
    </h2>
    <br>
    <?php

    // Se imprime la tabla de descripciones del departamento del usuario
    switch ($temp) {

            //Operaciones
        case 1:
            echo '<table class="tabla-grafica" align="center" class = "Tabla_TipoFalla" cellpadding="5%">';
            echo '<tr bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >O01 = MALA MANIOBRA</a> </TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >O04 = DESCUIDO </a></TD>';
            echo '</TR>';
            break;

            //Quimico
        case 2:
            echo '<table class="tabla-grafica" align="center" class = "Tabla_TipoFalla" cellpadding="5%">';
            echo '<tr bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >Q01 = CORROSIÓN</a> </TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >Q02 = CONTAMINACIÓN </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >Q05 = CORROSIÓN FATIGA</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >Q03 = ALTA CONCENTRACIÓN</a></TD>';
            echo '</TR>';
            break;


            //Mecanico
        case 3:
            echo '<table class="tabla-grafica" align="center" class = "Tabla_TipoFalla" cellpadding="5%">';
            echo '<tr bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M01 = FUGA</a> </TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M15 = RUPTURA </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M09 = OBSTRUCCIÓN</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M23 = ALTA TEMPERATURA</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M13 = VIBRACIÓN</a></TD>';
            echo '</TR>';
            echo '<TR bgcolor="#79d279" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M28 = DESAJUSTE </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M04 = DESGASTE NORMAL</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M14 = DEFORMACIÓN</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M05 = DESGASTE ANORMAL</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M02 = ENSUCIAMENTO</a></TD>';
            echo '</TR>';
            echo '<TR bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M26 = CONTAMINACIÓN</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M17 = SOBRECALENTAMIENTO</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M03 = EROSIÓN</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M30 = FALTA DE MANTENIMIENTO</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >M10 = TAPONAMIENTO</a></TD>';
            echo '</TR>';
            break;

            //Electrico
        case 4:
            echo '<table class="tabla-grafica" align="center" class = "Tabla_TipoFalla" cellpadding="5%">';
            echo '<tr bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E09 = SOBRECARGA</a> </TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E08 = FALSO CONTACTO </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E07 = CORTO CIRCUITO</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E11 = FALLA A TIERRA</a></TD>';
            echo '</TR>';
            echo '<TR bgcolor="#79d279" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E12 = ALTA TEMPERATURA </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E06 = PUNTO CALIENTE</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E16 = RUPTURA</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E22 = FALLA DE POTENCIAL</a></TD>';
            echo '</TR>';
            echo '<TR bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E21 = FALLA CONTROLES Y SENALIZACION</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E24 = FALSA OPERACIÓN</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E35 = FATIGA DE MATERIALES</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >E20 = DESCALIBRACIÓN</a></TD>';
            echo '</TR>';
            break;

            //Instrumentacion y control
        case 5:
            echo '<table class="tabla-grafica" align="center" class = "Tabla_TipoFalla" cellpadding="5%">';
            echo '<tr bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I06 = FALLA DE MEDICIÓN</a> </TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I39 = FALLA COMPONENTE ELECTRONICO </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I02 = FALLA DE CONTROL</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I32 = FALSA OPERACIÓN</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I42 = DESAJUSTE</a></TD>';
            echo '</TR>';
            echo '<TR bgcolor="#79d279" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I03 = FALSO CONTACTO </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I37 = FALLA DE ELEMENTO PRIMRIO</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I12 = FALLA DE ACTUADOR</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I08 = ENSUCIAMENTO</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I07 = FUGAS</a></TD>';
            echo '</TR>';
            echo '<TR bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I28 = FALLA DE APERTURA</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I01 = DESCALIBRACIÓN</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I40 = FALLA TRANSITORIA</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I26 = FALLA DE ARRANQUE</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I36 = ALTA TEMPERATURA</a></TD>';
            echo '</TR>';
            echo '<TR bgcolor="#79d279" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I29 = FALLA DE CIERRE </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I13 = BAJA PRESIÓN DEL AIRE</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I15 = OBSTRUCCIÓN</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I43 = ENVEJECIMIENTO DE MATERIALES</a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" >I20 = RUPTURA</a></TD>';
            echo '</TR>';
            break;

            //Civil
        case 7:
            echo '<table class="tabla-grafica" align="center" class = "Tabla_TipoFalla" cellpadding="5%">';
            echo '<tr bgcolor="#9fdf9f" class = "grosor_font">';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" > C05 = FALTA DE MANTENIMIENTO</a> </TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" > C01 = ASENTAMIENTO DEL SUBSUELO </a></TD>';
            echo '<TD><a align ="center" style="font-family: calibri; font-size: 100%;" > C12 = AGRIETAMIENTO</a></TD>';
            break;

        default:
            echo "No hay registro de su departamento";
    }

    ?>

    <?php
    include "graficas.php";
    ?>


    <?php
    //Se crea la tabla de los respectivos dias para contabilizar las fallas 
    echo '<table align="center" class = "Tabla_Fallas" cellpadding="5%">';
    echo '<tr bgcolor="#0B9D5C" class = "grosor_font">';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">TIPO DE FALLA</font></td>';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">LUNES</font></td>';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">MARTES</font></td>';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">MIERCOLES</font></td>';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">JUEVES</font></td>';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">VIERNES</font></td>';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">SABADO</font></td>';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">DOMINGO</font></td>';
    echo '<td align = "center" style="font-family: calibri; font-size: 100%;"><font color = "FFFFFF">TOTAL</font></td>';
    // #087645
    echo '</tr>';

    //Se conecta a la base de datos
    
    $sql = "SELECT tipo_falla, count(tipo_falla) as Fallas, DAYOFWEEK(fecha_regis) as Dia_Semana,
    SUM(CASE WHEN DAYOFWEEK(fecha_regis) =2 THEN 1 ELSE 0 END) as Lunes,
    SUM(CASE WHEN DAYOFWEEK(fecha_regis) =3 THEN 1 ELSE 0 END) as Martes,
    SUM(CASE WHEN DAYOFWEEK(fecha_regis) =4 THEN 1 ELSE 0 END) as Miercoles,
    SUM(CASE WHEN DAYOFWEEK(fecha_regis) =5 THEN 1 ELSE 0 END) as Jueves,
    SUM(CASE WHEN DAYOFWEEK(fecha_regis) =6 THEN 1 ELSE 0 END) as Viernes,
    SUM(CASE WHEN DAYOFWEEK(fecha_regis) =7 THEN 1 ELSE 0 END) as Sabado,
    SUM(CASE WHEN DAYOFWEEK(fecha_regis) =1 THEN 1 ELSE 0 END) as Domingo
    from gesti_servi where clave_depto = '$temp' and fecha_regis between '$fecha1' and '$fecha2' group by tipo_falla order by tipo_falla, DAYOFWEEK(fecha_regis)";

    $resultado = mysqli_query($link, $sql);
    $i = mysqli_num_rows($resultado); // Total de resultados



    for ($r = 0; $r < $i; $r++) {

        mysqli_data_seek($resultado, $r);
        $renglon = mysqli_fetch_object($resultado);

        echo '<tr bgcolor="#9fdf9f" class = "grosor_font">';

        echo '<td bgcolor="#66cc66", align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->tipo_falla;
        echo '</td>';

        echo '<td align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->Lunes;
        echo '</td>';

        echo '<td align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->Martes;
        echo '</td>';

        echo '<td align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->Miercoles;
        echo '</td>';

        echo '<td align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->Jueves;
        echo '</td>';

        echo '<td align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->Viernes;
        echo '</td>';

        echo '<td align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->Sabado;
        echo '</td>';

        echo '<td align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->Domingo;
        echo '</td>';

        echo '<td align ="center" style="font-family: calibri; font-size: 100%;">';
        echo $renglon->Fallas;
        echo '</td>';

        echo '</tr>';
    }

    echo '</table>';

    ?>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>

</html>