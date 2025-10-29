<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Asignatura</title>
</head>
<body>
<?php
require_once 'conexion.php';

$codigo = $_REQUEST['codigo-asi'];
$verificar = mysqli_query($conexion, "SELECT * FROM asignatura WHERE cod_asi = '$codigo'");

if (mysqli_num_rows($verificar) > 0) {
    echo '<br><br><center><h3>⚠️ El código de la asignatura ya existe.</h3></center>';
    mysqli_close($conexion);
    exit;
}

$sql = "INSERT INTO asignatura (nom_asi, cod_asi, sem_asi, id_pro)
        VALUES (
        '{$_REQUEST['nombre-asi']}',
        '$codigo',
        '{$_REQUEST['semestre-asi']}',
        '{$_REQUEST['id-pro']}'
        )";

if (mysqli_query($conexion, $sql)) {
    echo '<br><br><center><h3>Asignatura registrada correctamente ✅</h3></center>';
} else {
    echo '<br><br><center><h3>Error al insertar: ' . mysqli_error($conexion) . '</h3></center>';
}

mysqli_close($conexion);
?>
</body>
</html>
