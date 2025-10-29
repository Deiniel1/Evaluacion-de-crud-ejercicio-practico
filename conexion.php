<?php
$servidor = "localhost:3306"; // usa el puerto que veas en Workbench
$usuario = "root";
$clave = "123456";
$baseDatos = "udecbd";

$conexion = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
