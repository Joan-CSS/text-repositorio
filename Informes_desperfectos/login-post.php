<?php

session_start();

// Obtengo los datos cargados en el formulario de login.
// NUMERO DE CONTROL
$rpe_traba = $_POST['rpe_traba'];
//CONTRASENA
$llave_traba = $_POST['llave_traba'];
include("conexion.php");
/*  $sql = ("SELECT * FROM contr_acces WHERE ((contr_acces.rpe_traba = '$rpe_traba') && (contr_acces.llave_traba = '$llave_traba'))"); */
/* $sql = ("SELECT *  FROM contr_acces AS C INNER JOIN tipo_falla AS F on F.clave_depto=C.clave_depto WHERE (rpe_traba='$rpe_traba' AND llave_traba='$llave_traba')") */
$sql = ("SELECT rpe_traba,nombr_traba,contr_acces.clave_depto,llave_traba,area_depto, clave_falla,modo_falla FROM contr_acces JOIN tipo_falla on tipo_falla.clave_depto=contr_acces.clave_depto WHERE (rpe_traba='$rpe_traba' AND llave_traba='$llave_traba')");
$resultado = $link->query($sql);
$datos = $resultado->fetch_object();
if ($datos) {
  // Guardo en la sesión el email del usuario.
  $_SESSION["rpe_traba"] = $rpe_traba;
  $_SESSION["nombr_traba"] = $datos->nombr_traba;
  $_SESSION["area_depto"] = $datos->area_depto;
  $_SESSION["clave_depto"] = $datos->clave_depto;
  // Redirecciono al usuario a la página principal del sitio.
  header("HTTP/1.1 302 Moved Temporarily");
  header("Location: index.php");
} else {
  echo 'El email o password es incorrecto, <a href="login.php">vuelva a intenarlo</a>.<br/>';
}
