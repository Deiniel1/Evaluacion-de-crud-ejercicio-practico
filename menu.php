<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Menú Principal</title>
<style>
    body {
        background-color: #006400;
        font-family: Arial, sans-serif;
        text-align: center;
    }

    h1 {
        color: white;
        margin-top: 20px;
    }

    .menu {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 40px;
    }

    .menu-item {
        background-color: orange;
        padding: 10px 15px;
        border-radius: 10px;
        box-shadow: 2px 2px 5px black;
        transition: 0.3s;
        text-align: center;
        width: 130px;
        cursor: pointer;
        color: black;
        text-decoration: none;
        font-weight: bold;
    }

    .menu-item:hover {
        background-color: #ffb732;
        transform: scale(1.05);
    }

    .menu-item img {
        display: block;
        margin: 10px auto 0;
        width: 50px;
        height: 50px;
        object-fit: contain;
    }
</style>
</head>
<body>

<h1>MENU PRINCIPAL</h1>

<div class="menu">

    <a href="formularioEstudiante.html" class="menu-item">
        Registrar Estudiante
        <img src="imagenes/iconoE.webp" alt="Registrar Estudiante">
    </a>

    <a href="formularioAsignatura.html" class="menu-item">
        Registrar Asignatura
        <img src="imagenes/registroA.png" alt="Registrar Asignatura">
    </a>

    <a href="formularioCadi.html" class="menu-item">
        Registrar Cadi
        <img src="imagenes/registroC.jpg" alt="Registrar Cadi">
    </a>

    <a href="formularioMatricula.html" class="menu-item">
        Matricular
        <img src="imagenes/matricula.png" alt="Matricular">
    </a>
    
    <a href="formularioProfesor.html" class="menu-item">
        Registrar Profesor
        <img src="imagenes/iconoP.webp" alt="Registrar Profesor">
    </a>

    <a href="ver_Profesore.php" class="menu-item">
        Listar Docentes
        <img src="imagenes/listarP.png" alt="Listar Docentes">
    </a>

    <a href="ver_Estudiantes.php" class="menu-item">
        Listar Estudiantes
        <img src="imagenes/listarE.png" alt="Listar Estudiantes">
    </a>

    <a href="ver_Cadi.php" class="menu-item">
        Listar Cadis
        <img src="imagenes/listarC.png" alt="Listar Cadis">
    </a>

    <a href="ver_asignatura.php" class="menu-item">
        Listar Asignatura
        <img src="imagenes/asignadaM.png" alt="Listar Asignatura">
    </a>


    <a href="ver_matricula.php" class="menu-item">
        Listar Matriculas
        <img src="imagenes/Lmatricula.jpeg" alt="Listar Matriculas">
    </a>

    <a href="https://www.ucundinamarca.edu.co/" class="menu-item">
        Salir
        <img src="imagenes/salir.png" alt="Salir">
    </a>

</div>

</body>
</html>
