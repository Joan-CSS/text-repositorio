<?php
include("conexion.php");

// Obtener los valores de los campos a insertar
//gesti_servi
$fecha_regis = $_POST['fecha_regis'];
$estad_atenc = $_POST['estad_atenc'];
$impor_produ = $_POST['impor_produ'];
$numer_unida = $_POST['numer_unida'];
$equip_siste = $_POST['equip_siste'];
$descr_despe = $_POST['descr_despe'];
$atenc_es_fs = $_POST['atenc_es_fs'];
$clase_orden = $_POST['clase_orden'];
$permi_segur = $_POST['permi_segur'];
$comen_tario = $_POST['comen_tario'];
$tarea_criti = $_POST['tarea_criti'];
$rpe_regis = $_POST['rpe_regis'];
$clave_depto = $_POST['clave_depto'];
$tipo_falla = $_POST['tipo_falla'];
//tipo_falla
$area_depto = $_POST['area_depto'];
$numer_aviso = $_POST['numer_aviso'];

$sql = "SELECT numer_aviso FROM gesti_servi WHERE numer_aviso = '$numer_aviso'";
$result = $link->query($sql);

// Verificar si la consulta tuvo resultados
if ($result->num_rows > 0) {
    // El número de aviso ya existe, mostrar mensaje de repetido
    echo "El número de aviso '$numer_aviso' ya está registrado.";



} else {

    // El número de aviso no existe, puedes continuar con el proceso de inserción o actualización
    // aquí puedes realizar las operaciones correspondientes

    mysqli_begin_transaction($link);
if (empty($fecha_regis) || empty($estad_atenc) || empty($impor_produ) || empty($numer_aviso) || empty($numer_unida) || empty($equip_siste) || empty($descr_despe) || empty($atenc_es_fs) || empty($clase_orden) || empty($permi_segur) || empty($tarea_criti) || empty($rpe_regis) || empty($clave_depto) || empty($tipo_falla) || empty($area_depto) ) {
// Si alguno de los campos está vacío, muestra un mensaje de error
echo "Por favor, complete todos los campos obligatorios.";
} else {

try {
$sql_gesti_servi = "INSERT INTO gesti_servi (fecha_regis, estad_atenc, impor_produ,numer_aviso,numer_unida,equip_siste,descr_despe,atenc_es_fs,clase_orden,permi_segur,comen_tario,tarea_criti,rpe_regis,clave_depto,tipo_falla) VALUES ('$fecha_regis', '$estad_atenc', '$impor_produ','$numer_aviso','$numer_unida','$equip_siste','$descr_despe','$atenc_es_fs','$clase_orden','$permi_segur','$comen_tario','$tarea_criti','$rpe_regis', '$clave_depto','$tipo_falla')";
mysqli_query($link, $sql_gesti_servi);


mysqli_commit($link);

header("HTTP/1.1 302 Moved Temporarily");
header("Location: crud.php");
} catch (Exception $e) {
mysqli_rollback($link);
echo "Error: " . $e->getMessage();
}

mysqli_close($link);
}
}

// Cerrar la conexión a la base de datos

?>

