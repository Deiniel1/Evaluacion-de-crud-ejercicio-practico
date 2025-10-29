<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de estudiantes</title>
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

    <h1 style="text-align:center;">LISTA DE ESTUDIANTES REGISTRADOS</h1>

    <?php
        require_once 'conexion.php';

        $sql = "SELECT * FROM estudiante";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Teléfono</th>
                    <th>Foto</th>
                  </tr>";

            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>
                        <td>{$fila['ID_APR']}</td>
                        <td>{$fila['NOM_APR']}</td>
                        <td>{$fila['APE_APR']}</td>
                        <td>{$fila['TDO_APR']}</td>
                        <td>{$fila['NDO_APR']}</td>
                        <td>{$fila['TEL_APR']}</td>
                        <td><img src='{$fila['FOT_APR']}' alt='Foto-cargada'></td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<center><h3>No hay aprendices registrados aún.</h3></center>";
        }

        mysqli_close($conexion);
    ?>

    <button class="boton-volver" onclick="window.location.href='menu.php'">Volver al Menú</button>

</body>
</html>
