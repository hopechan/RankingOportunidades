<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Nueva Certificacion</title>
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
    <section><br></section>
    <section class="main">
        <form method="post">
            <label for="cmbTipo">Certificacion</label>
            <select name="cmbTipo" id="">
                <option value="A">--Elija un tipo de evaluacion--</option>
            <?php
                require_once("../controlador/controladorTipo.php");
                $ct = new ControladorTipo();
                $tipos = $ct->obtenerTipos();
                for ($i=0; $i < sizeof($tipos); $i++) { 
                    echo "<option value= '".$tipos[$i]->getIdTipo()."'>".$tipos[$i]->getTipo()."</option>";
                }
            ?>
            </select>
            <br><br>
            <label for="cmbEstudiante">Estudiante</label>
            <select name="cmbEstudiantes">
                <option value="E">--Elija un estudiante--</option>
            <?php
                require_once("../controlador/controladorEstudiante.php");
                $ce = new ControladorEst();
                $estudiantes = $ce->Obtenerest();
                for ($i=0; $i < sizeof($estudiantes); $i++) { 
                    echo "<option value= '".$estudiantes[$i]->getIdEstudiante()."'>".$estudiantes[$i]->getNombre()." ".$estudiantes[$i]->getApellidos()."</option>";
                }
            ?>
            </select>
            <br><br>
            <label for="txtNota">Nota Obtenida </label><input type="number" name="txtNota" step="0.1">
            <br><br>
            <input type="submit" value="Guardar" name="btnGuardar">
        </form>
    </section>
    <?php
        if (isset($_POST['btnGuardar'])) {
            include_once("../controlador/controladorCertificacion.php");
            include_once("../modelo/certificacion.php");
            //se obtienen los valores ingresados en formulario
            $idTipo = $_POST['cmbTipo'];
            $idEstudiante = $_POST['cmbEstudiantes'];
            $nota = $_POST['txtNota'];
            //objetos de clases
            $c = new Certificacion();
            $c->setIdCertificacion(null);
            $c->setIdTipo($idTipo);
            $c->setIdEstudiante($idEstudiante);
            $c->setNota($nota);

            $cc = new ControladorCertificacion();
            $cc->agregarCertificacion($c);

            echo "<script>alert('Se ha guardado con exito');
                    window.location='webCertificacion.php';
                </script>";
        }
    ?>
</body>
</html>