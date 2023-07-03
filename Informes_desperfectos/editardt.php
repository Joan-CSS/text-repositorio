<?php
include("conexion.php");

// Obtener los valores de los campos a insertar
            //gesti_servi
            $fecha_regis = $_POST['fecha_regis'];
            $estad_atenc = $_POST['estad_atenc'];
            $impor_produ = $_POST['impor_produ'];
            $numer_aviso= $_POST['numer_aviso'];
            $numer_unida = $_POST['numer_unida'];
            $equip_siste = $_POST['equip_siste'];
            $descr_despe = $_POST['descr_despe'];
            $atenc_es_fs = $_POST['atenc_es_fs'];
            $clase_orden = $_POST['clase_orden'];
            $permi_segur = $_POST['permi_segur'];
            $comen_tario = $_POST['comen_tario'];
            $tarea_criti = $_POST['tarea_criti'];
            $rpe_regis = $_POST['rpe_regis'];
            $clave_depto =$_POST['clave_depto'];
            $tipo_falla = $_POST['tipo_falla'];
            
            //tipo_falla
            $area_depto = $_POST['area_depto'];
          
          
            if (empty($fecha_regis) || empty($estad_atenc) || empty($impor_produ) || empty($numer_aviso) || empty($numer_unida) || empty($equip_siste) || empty($descr_despe) || empty($atenc_es_fs) || empty($clase_orden) || empty($permi_segur) || empty($comen_tario) || empty($tarea_criti) || empty($rpe_regis) || empty($clave_depto) || empty($tipo_falla) || empty($area_depto) || empty($modo_falla)) {
                // Si alguno de los campos está vacío, muestra un mensaje de error
                echo "Por favor, complete todos los campos obligatorios.";
            } else {
                
                $sql_gesti_servi = "UPDATE gesti_servi SET fecha_regis='".$fecha_regis."', estad_atenc='".$estad_atenc."', impor_produ='".$impor_produ."', numer_unida='".$numer_unida."', equip_siste='".$equip_siste."', descr_despe='".$descr_despe."', atenc_es_fs='".$atenc_es_fs."', clase_orden='".$clase_orden."', permi_segur='".$permi_segur."', comen_tario='".$comen_tario."', tarea_criti='".$tarea_criti."', rpe_regis='".$rpe_regis."', clave_depto='".$clave_depto."', tipo_falla='".$tipo_falla."' WHERE numer_aviso='".$numer_aviso."'";
    
                $query=mysqli_query($link, $sql_gesti_servi);
    
                if(($query)){
                    
                    echo "No se actualizo"; 
                }else {
                    
                    header("HTTP/1.1 302 Moved Temporarily");
                    header("Location: crud.php");
    
            }
    
            mysqli_close($link);
            }

?>