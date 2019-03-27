<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Certificacion</title>
</head>
<body>
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
            <label for="cmbEstudiante">Estudiante</label>
                <option value="E">--Elija un estudiante--</option>
            <?php
                require_once("../controlador/controladorTipo.php");
                $ct = new ControladorTipo();
                $tipos = $ct->obtenerTipos();
                for ($i=0; $i < sizeof($tipos); $i++) { 
                    echo "<option value= '".$tipos[$i]->getIdTipo()."'>".$tipos[$i]->getTipo()."</option>";
                }
            ?>
        </form>
    </section>
</body>
</html>