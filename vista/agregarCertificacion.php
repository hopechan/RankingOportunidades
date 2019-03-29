<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Certificacion</title>
</head>
<body>
    <section><a href="webCertificacion.php">Regresar</a></section>
    <section>Nueva Certificacion</section>
    <section>
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