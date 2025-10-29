<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Matrículas</title>
<link rel="stylesheet" href="diseño-form.css">
<style>
    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }
    h1 {
        text-align: center;
        color: #0C713D;
        margin-top: 20px;
    }
    table {
        margin: 40px auto;
        border-collapse: collapse;
        width: 90%;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
    }
    th, td {
        border-bottom: 1px solid #ddd;
        padding: 12px 15px;
        text-align: center;
    }
    th {
        background-color: #0C713D;
        color: white;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    .boton-volver {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        border: none;
        background-color: #0C713D;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
    }
    .boton-volver:hover {
        background-color: #09562d;
    }
</style>
</head>
<body>

<h1>LISTA DE MATRÍCULAS REGISTRADAS</h1>

<?php
require_once 'conexion.php';

$sql = "SELECT 
            matricula.id_mat,
            estudiante.ID_APR,
            asignatura.nom_asi,
            matricula.fec_mat,
            matricula.est_mat
        FROM matricula
        INNER JOIN estudiante ON matricula.ID_APR = estudiante.ID_APR
        INNER JOIN asignatura ON matricula.id_asi = asignatura.id_asi";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table>
            <tr>
                <th>ID Matrícula</th>
                <th>Estudiante</th>
                <th>Asignatura</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>{$fila['id_mat']}</td>
                <td>{$fila['ID_APR']}</td>
                <td>{$fila['nom_asi']}</td>
                <td>{$fila['fec_mat']}</td>
                <td>{$fila['est_mat']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<center><h3>No hay matrículas registradas aún.</h3></center>";
}

mysqli_close($conexion);
?>

<button class="boton-volver" onclick="window.location.href='menu.php'">Volver al Menú</button>

</body>
</html>
