<?php
require_once 'conexion.php';

// evitar inyecciones con un escape
$cod = mysqli_real_escape_string($conexion, $_REQUEST['cod']);

$registro = mysqli_query($conexion, "SELECT * FROM estudiante WHERE ID_APR = '$cod'");
?>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
    <title>Ficha del Aprendiz</title>
</head>
<body>

<?php
if ($reg = mysqli_fetch_array($registro)) {
    echo "<div class='card'>
            <h3>Ficha Técnica del Aprendiz</h3>
            <p><b>ID:</b> {$reg['ID_APR']}</p>
            <p><b>Nombre:</b> {$reg['NOM_APR']}</p>
            <p><b>Apellido:</b> {$reg['APE_APR']}</p>
            <p><b>Tipo Doc:</b> {$reg['TDO_APR']}</p>
            <p><b>Documento:</b> {$reg['NDO_APR']}</p>
            <p><b>Teléfono:</b> {$reg['TEL_APR']}</p>
            <img src='{$reg['FOT_APR']}' width='200'>
          </div>";
} else {
    echo "<h3 style='color:red;'>El registro del aprendiz NO EXISTE</h3>";
}
mysqli_close($conexion);
?>

<div class="container">
    <form action="menu.php">
        <input type="submit" value="Ir al Menú Principal">
    </form>

    <form action="ConsultarAprendiz.html">
        <input type="submit" value="Consultar Otro Aprendiz">
    </form>
</div>

</body>
</html>
