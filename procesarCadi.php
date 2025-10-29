<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cadi</title>
</head>
<body>
<?php
require_once 'conexion.php';



$responsable_cad = $_REQUEST['responsable-cadi'];
$verificar = mysqli_query($conexion, "SELECT * FROM cadi WHERE res_cad = '$responsable_cad'");

if (mysqli_num_rows($verificar) > 0) {
    echo '<br><br><center><h3>⚠️ El número de documento ya existe como registro.</h3></center>';
    mysqli_close($conexion);
    exit;
}

$sql = "INSERT INTO cadi (nom_cad, res_cad, ema_cad, ubi_cad)
        VALUES (
        
        '{$_REQUEST['nombre-cadi']}',
        '{$_REQUEST['responsable-cadi']}',
        '{$_REQUEST['correo-cadi']}',
        '{$_REQUEST['ubicacion-cadi']}'
        )";

if (mysqli_query($conexion, $sql)) {
    echo '<br><br><center><h3>Datos del Cadi agregados correctamente ✅</h3></center>';
} else {
    echo '<br><br><center><h3>Error al insertar datos: ' . mysqli_error($conexion) . '</h3></center>';
}

mysqli_close($conexion);
?>
</body>
</html>
