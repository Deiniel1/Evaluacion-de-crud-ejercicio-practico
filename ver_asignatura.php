<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Asignaturas</title>
    <link rel="stylesheet" href="diseño-form.css">
   

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #eef2f3;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #0C713D;
        margin-top: 30px;
        font-size: 28px;
    }

    table {
        margin: 40px auto;
        border-collapse: collapse;
        width: 90%;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
    }

    th, td {
        border-bottom: 1px solid #ddd;
        padding: 12px 15px;
        text-align: center;
    }

    th {
        background-color: #0C713D;
        color: white;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .boton-volver {
        display: block;
        margin: 30px auto;
        padding: 10px 20px;
        border: none;
        background-color: #0C713D;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .boton-volver:hover {
        background-color: #09562d;
    }
</style>

</head>
<body>

<h1 style="text-align:center;">LISTA DE ASIGNATURAS REGISTRADAS</h1>

<?php
require_once 'conexion.php';

$sql = "SELECT asignatura.*, profesor.nom_pro
        FROM asignatura
        LEFT JOIN profesor
        ON asignatura.id_pro = profesor.id_pro";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table>
            <tr>
                
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Semestre</th>
                <th>Profesor Asignado</th>
            </tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
            
                <td>{$fila['nom_asi']}</td>
                <td>{$fila['cod_asi']}</td>
                <td>{$fila['sem_asi']}</td>
                
                 <td>" . ($fila['nom_pro'] ?? 'Sin asignar') . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<center><h3>No hay asignaturas registradas aún.</h3></center>";
}

mysqli_close($conexion);
?>

<button class="boton-volver" onclick="window.location.href='menu.php'">Volver al Menú</button>

</body>
</html>
