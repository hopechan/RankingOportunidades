<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Certificacion</title>
</head>
<body>
    <?php
        include_once("../controlador/controladorTipo.php");
        include_once("../controlador/controladorEstudiante.php");
        include_once("../controlador/controladorCertificacion.php");
        $ct = new ControladorTipo();
        $ce = new ControladorEst();
        $cc = new ControladorCertificacion();
        $tipos = $ct->obtenerTipos();
        $estudiantes = $ce->Obtenerest();
        $certificacion = $cc->buscarCertificacion($_GET['idCertificacion']);
    ?>
    <a href="./webCertificacion.php">Regresar</a>
    <section>Actualizar</section>
    <section>
        <form method="post">
            <label for="cmbTipo">Tipo Evaluacion</label>
            <select name="cmbTipo">
                <option value="A">--Elija un tipo--</option>
                <?php
                    for ($i=0; $i < sizeof($tipos); $i++) {
                        echo "<option value=".$tipos[$i]->getIdTipo().">".$tipos[$i]->getTipo()."</option>";
                    }
                ?>
            </select>
            <br><br>
            <label for="cmbEstudiante">Estudiante</label>
            <select name="cmbEstudiante">
                <option value="E">--Elija un Alumno--</option>
                <?php
                    for ($i=0; $i < sizeof($estudiantes); $i++) {
                        echo "<option value=".$estudiantes[$i]->getIdEstudiante().">".$estudiantes[$i]->getNombre()." ".$estudiantes[$i]->getApellidos()."</option>";
                    }
                ?>
            </select>
            <br><br>
            <label for="txtNota">Nota</label>
            <input type="number" name="txtNota" value="<?echo $certificacion[0]->getNota()?>">
            <input type="hidden" name="txtId" value="<?echo $certificacion[0]->getIdCertificacion()?>">
            <br><br>
            <input type="submit" value="Actualizar" name="btnActualizar">
        </form>
    </section>
    <?php
        include_once("../modelo/certificacion.php");
        if (isset($_POST['btnActualizar'])) {
            $idCertificacion = $_POST['txtId'];
            $idTipo = $_POST['cmbTipo'];
            $idEstudiante = $_POST['cmbEstudiante'];
            $nota = $_POST['txtNota'];
            $c = new Certificacion();
                $c->setIdCertificacion($idCertificacion);
                $c->setIdTipo($idTipo);
                $c->setIdEstudiante($idEstudiante);
                $c->setNota($nota);
            $cc->actualizarCertificacion($c);
        }
    ?>
</body>
</html>