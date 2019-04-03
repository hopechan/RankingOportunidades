<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Editar Estudiante</title>
</head>
<body>
    <section class="barra">
        <a href=""><img src="../vista/img/logo.png" alt="logo Oportunidades"></a>
    </section>
    <section class="lateral">
        <a href="../index.php"><i class="fas fa-home"></i> Inicio</a>
        <a href="./webEstudiantes.php"><i class="fas fa-user-graduate"></i> Estudiantes</a>
        <a href="./webNotas.php"><i class="fas fa-book-open"></i> Notas</a>
        <a href="./webCertificacion.php"><i class="fas fa-certificate"></i> Certificaciones</a>
    </section>
    <?php
        include_once("../controlador/controladorEstudiante.php");
        $ce = new ControladorEst();
        $id = $_GET['idEstudiante'];
        $estudiante = $ce->buscarxId($id);
    ?>
    <section class="main">
        <section class="formulario">
            <form method="post">
                <h3>Nuevo Estudiante</h3>
                <fieldset>
                    <legend>Datos Personales</legend>
                    Nombre: <input type="text" name="txtNombre" value=<?php echo $estudiante[0]->getNombre()?>>
                    Apellidos: <input type="text" name="txtApellidos" value=<?php echo $estudiante[0]->getApellidos()?>><br>
                    Fecha Nacimiento: <input type="date" name="txtFechaNac" value=<?php echo $estudiante[0]->getFechaNacimiento()?>><br>
                    Telefono: <input type="tel" name="txtTelefono" value=<?php echo $estudiante[0]->getTelefono()?>><br>
                    email: <input type="email" name="txtEmail" value=<?php echo $estudiante[0]->getEmail()?>><br>
                    Direccion: <input type="text" value="<?php echo $estudiante[0]->getDireccion()?>">
                </fieldset><br>
                <fieldset>
                    <legend>Datos Oportunidades</legend>
                    Año: <select name="cmbYear">
                        <option value="1">YEAR 1</option>
                        <option value="">YEAR 2</option>
                        <option value="">YEAR 3</option>
                    </select>Centro Escolar: <input type="text" name="txtCE" placeholder="Ingrese Centro Escolar">
                </fieldset>
                <input type="submit" value="Guardar" name="btnActualizar">
            </form>
        </section>
    </section>
    <?php
        include_once("../modelo/estudiante.php");
        if (isset($_POST['btnActualizar'])) {
            $e = new Estudiante();
            $e->setNombre($_POST['txtNombre']);
            $e->setApellidos($_POST['txtApellidos']);
            $e->setFechaNacimiento($_POST['txtFechaNac']);
            $e->setTelefono($_POST['txtTelefono']);
            $e->setEmail($_POST['txtEmail']);
            $e->setDireccion($_POST['txtDireccion']);
            $e->setYear($_POST['cmbYear']);
            $e->setCentroEscolar($_POST['txtCE']);
            $ce->editarEstudiante($e);
        }
    ?>
</body>
</html>