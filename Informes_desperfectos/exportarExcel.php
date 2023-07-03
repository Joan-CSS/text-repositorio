<?php
include("conexion.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Informe_de_desperfectos_internos.xls");

?>
<table class="contenido-tabla">
                <thead>
                    <tr>
                        <th>U</th>
                        <th>C</th>
                        <th>Depto</th>
                        <th>Equipo</th>
                        <th>Descripcion</th>
                        <th>Clase</th>
                        <th>Comentario</th>
                        <th>Estatus</th>
                        <th>Fecha Registro</th>
                        <th>Fecha Prog.</th>
                        <th>Atencion (E/S F/S)</th>
                        <th>Prioridad</th>
                        <th>Aviso</th>
                        <th>Inversion (SI/NO)</th>
                        <th>Num de solicitud</th>
                        <th>Fecha de solicitud</th>
                        <th>Costo en pesos</th>
                        <th>Ubicacion tecnica</th>
                        <th>Permiso de seg</th>
                        <th>Orden de trab</th>
                        <th>RPE de Reg</th>
                        <th>Fecha de modif</th>
                        <th>RPE </th>
                        <th>Modo de falla</th>
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
                        echo $row['numer_unida'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['conse_cutiv'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['clave_depto'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['equip_siste'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['descr_despe'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['clase_orden'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['comen_tario'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['estad_atenc'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['fecha_regis'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['fecha_plane'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['atenc_es_fs'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['impor_produ'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['numer_aviso'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['requi_inver'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['numer_requi'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['fecha_solpe'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['costo_atenc'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['ubica_tecni'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['permi_segur'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['orden_mysap'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['rpe_soluc'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['fecha_modif'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['rpe_modif'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['modo_falla'];
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