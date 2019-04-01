<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Nuevo Estudiante</title>
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
    <section class="main">
        <section class="formulario">
            <form method="post" enctype="multipart/form-data">
                <h3>Nuevo Estudiante</h3>
                <fieldset>
                    <legend>Datos Personales</legend>
                    Nombre:	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="text" name="txtNombre" placeholder="Ingrese el nombre"><br>
                    Apellidos:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="text" name="txtApellidos" placeholder="Ingrese los apellidos"><br>
                    Fecha Nacimiento: &nbsp&nbsp<input type="date" name="txtFechaNac" placeholder="1999-12-5"><br>
                    Telefono: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="tel" name="txtTelefono" placeholder="Ingrese numero de telefono"><br>
                    email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="email" name="txtEmail" placeholder="Ingrese correo electronico"><br>
                    Direccion: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="text" name="txtDireccion" id="">
                </fieldset><br>
                <fieldset>
                    <legend>Foto</legend>
                    <input type="file" name="foto">
                </fieldset><br>
                <fieldset>
                    <legend>Datos Oportunidades</legend>
                    Año: <select name="cmbYear">
                        <option value="1">YEAR 1</option>
                        <option value="">YEAR 2</option>
                        <option value="">YEAR 3</option>
                    </select>Centro Escolar: <input type="text" name="txtCE" placeholder="Ingrese Centro Escolar"> 
                </fieldset>
                <br>
                <input type="submit" value="Guardar" name="btnGuardar">
            </form>
        </section>
    </section>
    <?php
        if (isset($_POST['btnGuardar'])) {
            include_once("../modelo/estudiante.php");
            include_once("../modelo/documento");
            include_once("../controlador/controladorEstudiante.php");
            $e = new Estudiante();
                $e->setIdEstudiante(null);
                $e->setNombre($_POST['txtNombre']);
                $e->setApellidos($_POST['txtApellidos']);
                $e->setFechaNacimiento($_POST['txtFechaNac']);
                $e->setTelefono($_POST['txtTelefono']);
                $e->setEmail($_POST['txtEmail']);
                $e->setDireccion($_POST['txtDireccion']);
                $e->setYear($_POST['cmbYear']);
                $e->setCentroEscolar($_POST['txtCE']);
            $foto = $_FILES['']
            $d = new Documentos();
                $d->setIdDocumento(null);
                $d->setIdEstudiante(($ce->maxId() + 1)); //obtengo el ultimo id y le sumo 1
                $d->setNombreDocumento("foto");
                $d->setDocumento();
            $ce = new ControladorEst();
            $ce->Agregarestudiante($e);
            echo "<script type='text/javascript'>
                alert('Registro guardado con exito');
                window.location='../vista/webEstudiantes.php';
                </script>
                ";
        }
    ?>
</body>
</html>