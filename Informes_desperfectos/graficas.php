<?php


// Controlo si el usuario ya está logueado en el sistema.
if (isset($_SESSION['rpe_traba'])) {

} else {
    // Si no está logueado lo redireccion a la página de login.
    header("HTTP/1.1 302 Moved Temporarily");
    header("Location:cerrar-sesion.php");
}
$field = 'clave_depto';
$temp = isset($_SESSION[$field]) ? $_SESSION[$field] : "no hay depto";
include "conexion.php";
$fecha1 = $_POST["fecha1"];
$fecha2 = $_POST["fecha2"];

$sql = "SELECT tipo_falla, count(tipo_falla) as Fallas, DAYOFWEEK(fecha_regis) as Dia_Semana from gesti_servi where clave_depto = '$temp' and fecha_regis between '$fecha1' and '$fecha2' group by tipo_falla order by DAYOFWEEK(fecha_regis)"; //Consulta

$resultado = mysqli_query($link, $sql); //Resultado consulta
$i = mysqli_num_rows($resultado); // Total de resultados
$Arreglo = array();

for ($r = 0; $r < $i; $r++) {
    mysqli_data_seek($resultado, $r); //Ubica en el resultado de la busqueda
    $renglon = mysqli_fetch_object($resultado); //Obtiene una fila de datos del conjunto de resultados y lo devuleve como objeto
    $Arreglo[] = $renglon;
}
?>


<!DOCTYPE html>
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
    <script src="js/chart.min.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
</head>
<body>


    <div class="contenedor_de_grafica">
        <div class="grafica_de_barras">
            <canvas id="Grafica">
            </canvas>
        </div>
    </div>

  

        <script>
            $(document).ready(function() {
                var ctx = $("#Grafica");

            var data = {
                labels: [
                    <?php foreach ($Arreglo as $A) : ?> "<?php echo $A->tipo_falla ?>",
                    <?php endforeach; ?>,
                ],

                datasets: [{
                    type: 'bar',
                    label: 'tipo_fallas',
                    backgroundColor: '#0B9D5C',
                    borderColor: "#0d260d",
                    borderWidth: 3,
                    data: [
                        <?php foreach ($Arreglo as $A) : ?> "<?php echo $A->Fallas ?>",
                        <?php endforeach; ?>,
                    ]
                }]
            };
            var options = {
                responsive: true,
                legend: {
                    display: true,
                    position: "top",

                },
                tittle: {

                    display: true,
                    position: "top",
                    text: 'Tipo de fallas',
                    fontColor: "#111",
                    fontSize: 18
                }
            };
            
            var chart = new Chart(ctx, {
                type: "bar",
                data: data,
                
                backgroundColor: ['#009973', '#009973', '#009973', '#009973', '#009973', '#009973', '#009973'],
                
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                    },
                }
            });
        });
        </script>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>