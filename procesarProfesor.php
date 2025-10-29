<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // conexión
        require_once 'conexion.php';

        // mover la foto
        move_uploaded_file($_FILES['foto-cargada']['tmp_name'], 'imagenes/' . $_FILES['foto-cargada']['name']);
        $nomf = 'imagenes/' . $_FILES['foto-cargada']['name'];

        $numero_doc = $_REQUEST['numero-doc'];
        $verificar = mysqli_query($conexion,"SELECT *FROM profesor WHERE ndo_apr = '$numero_doc'");

        if(mysqli_num_rows($verificar)>0){
            echo '<br><br><center><h3>⚠️ El numero de documento ya existe como registro.</h3></center>';
            mysqli_close(($conexion));
            exit;
        }

        // registrar en la tabla
        $sql = "INSERT INTO profesor (nom_pro, ape_pro, ema_pro, tel_pro, esp_pro, fot_pro, TDO_APR, NDO_APR) VALUES (
            '{$_REQUEST['nombre-usuario']}',
            '{$_REQUEST['apellido-usuario']}',
            '{$_REQUEST['correo-profesor']}',
            '{$_REQUEST['numero-telefono']}',
            '{$_REQUEST['especializacion-p']}',
            '$nomf',
            '{$_REQUEST['tipo-doc']}',
            '{$_REQUEST['numero-doc']}'
        )";

        // ejecutar consulta
        if (mysqli_query($conexion, $sql)) {
            echo '<br><br><center><h3>Datos agregados correctamente</h3></center>';
        } else {
            echo '<br><br><center><h3>Error al insertar datos: ' . mysqli_error($conex) . '</h3></center>';
        }

        // desconectar
        mysqli_close($conexion);
    ?>
</body>
</html>
