<html>
<head>
    <title>Registro Aprendiz Borrado</title>
</head>

<body>
<font face=helvetica>
<center>

<?php
// conexión
require_once 'conexion.php';

$id = $_REQUEST['cod'];   // ID del estudiante

// 1. Verificar si existe el estudiante
$registro = mysqli_query($conexion,
    "SELECT * FROM estudiante WHERE id_apr = '$id'"
);

if ($reg = mysqli_fetch_array($registro)) {

    // 2. Verificar si el estudiante tiene matrículas
    $checkMatricula = mysqli_query($conexion,
        "SELECT * FROM matricula WHERE id_apr = '$id'"
    );

    if (mysqli_num_rows($checkMatricula) > 0) {
        // ❌ Tiene matrículas → NO se puede borrar
        echo '<br><br><br><center>
                <font face=tahoma color=red size=4>
                <b>No se puede borrar este estudiante porque tiene matrículas registradas.</b><br>
              ';
    } else {
        // ✔️ No tiene matrículas → Se puede borrar
        mysqli_query($conexion,
            "DELETE FROM estudiante WHERE id_apr = '$id'"
        ) or die("Error al borrar: " . mysqli_error($conexion));

        echo '<br><br><br><center>
                <font face=tahoma color=green size=4>
                <b>REGISTRO ELIMINADO</b><br>
              ';
    }

} else {
    // ❌ Estudiante no existe
    echo '<br><br><br><center>
            <font face=tahoma color=red size=4>
            <b>REGISTRO NO ENCONTRADO</b><br>
          ';
}

// cerrar conexión
mysqli_close($conexion);
?>

<br>
<center>
<form action="menu.php">
    <input type="submit" value="Ir Menu Principal">
</form>
<form action="BorrarAprendiz.php">
    <input type="submit" value="Borrar Otro Aprendiz">
</form>

</body>
</html>
