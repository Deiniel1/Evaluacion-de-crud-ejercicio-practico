<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Profesores</title>
    <link rel="stylesheet" href="diseño-form.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
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
        img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
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

    <h1 style="text-align:center;">LISTA DE PROFESORES REGISTRADOS</h1>

    <?php
require_once 'conexion.php';

$sql = "SELECT profesor.*, asignatura.nom_asi
        FROM profesor 
        LEFT JOIN asignatura 
        ON profesor.id_pro = asignatura.id_pro";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo electrónico</th>
            <th>Teléfono</th>
            <th>Especialización</th>
            <th>Foto</th>
            <th>Tipo Documento</th>
            <th>Número Documento</th>
            <th>Asignatura</th>
          </tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>{$fila['id_pro']}</td>
                <td>{$fila['nom_pro']}</td>
                <td>{$fila['ape_pro']}</td>
                <td>{$fila['ema_pro']}</td>
                <td>{$fila['tel_pro']}</td>
                <td>{$fila['esp_pro']}</td>
                <td><img src='{$fila['FOT_pro']}' alt='Foto del profesor'></td>
                <td>{$fila['TDO_APR']}</td>
                <td>{$fila['NDO_APR']}</td>
                <td>" . ($fila['nom_asi'] ?? 'Sin asignar') . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<center><h3>No hay profesores registrados aún.</h3></center>";
}

mysqli_close($conexion);
?>


    

    <button class="boton-volver" onclick="window.location.href='menu.php'">Volver al Menú</button>

</body>
</html>
