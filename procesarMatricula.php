<?php
include 'conexion.php';

// Capturar los datos del formulario
$id_apr = $_POST['ID_APR'];
$id_asi = $_POST['id_asi'];
$fec_mat = $_POST['fec_mat'];
$est_mat = $_POST['est_mat'];

// Validar que los IDs existan antes de insertar
$validarEstu = mysqli_query($conexion, "SELECT ID_APR FROM estudiante WHERE ID_APR = '$id_apr'");
$validarAsig = mysqli_query($conexion, "SELECT id_asi FROM asignatura WHERE id_asi = '$id_asi'");

if (mysqli_num_rows($validarEstu) == 0) {
    echo "<script>alert('El ID del estudiante no existe.'); window.history.back();</script>";
    exit;
}

if (mysqli_num_rows($validarAsig) == 0) {
    echo "<script>alert('El ID de la asignatura no existe.'); window.history.back();</script>";
    exit;
}

// Insertar los datos en la tabla matrícula
$sql = "INSERT INTO matricula (id_apr, id_asi, fec_mat, est_mat)
        VALUES ('$id_apr', '$id_asi', '$fec_mat', '$est_mat')";

if (mysqli_query($conexion, $sql)) {
    echo "<script>alert('Matrícula registrada exitosamente.');</script>";
} else {
    echo "<script>alert('Error al registrar la matrícula: " . mysqli_error($conexion) . "'); window.history.back();</script>";
}

mysqli_close($conexion);
?>
