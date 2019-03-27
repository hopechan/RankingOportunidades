<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav>
    </nav>
    <header>
        <h3>Agregar Estudiante</h3>
    </header>
    <article>
        <form method="post">
            Nombre: <br><br>
            <input type="text" name="txtNombre" class="box3"><br><br>
            Apellidos: <br><br>
            <input type="text" name="txtApellido" class="box3"><br><br>
            Fecha de Nacimiento: <br><br>
            <input type="date" name="numNaci" class="box3"><br><br>
            Centro escolar:<br><br>
            <input type="text" name="txtCe" class="box3"><br><br>
            <input type="submit" value="Agregar" name="AddEst" class="box2">
        </form>
        <?php
        require_once("../controlador/controladorEstudiante.php");
        require_once("../modelo/estudiante.php");
        if (isset($_POST['AddEst'])) {
            $nombre = $_POST['txtNombre'];
            $apellidos = $_POST['txtApellido'];
            $fechanac = $_POST['numNaci'];
            $centroesc = $_POST['txtCe'];
            $ce = new ControladorEst();
            $nuevoEstudiante = new Estudiante();
            $nuevoEstudiante -> setIdEstudiante(null);
            $nuevoEstudiante -> setNombre($nombre);
            $nuevoEstudiante -> setApellidos($apellidos);
            $nuevoEstudiante -> setFechaNacimiento($fechanac);
            $nuevoEstudiante -> setCentroEscolar($centroesc);
            $ce -> Agregarestudiante($nuevoEstudiante);
            echo "<script type='text/javascript'>
            alert('¡Registro agregado con exito!');
            window.location='../index.php';
            </script>";
        }
        
        ?>
    </article>  
</body>
</html>