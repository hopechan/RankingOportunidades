<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Notas</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        Agregar Nota <br><br>
    </header>
    <article>
        <form method="post">
            
            Seleccione el numero de evaluaciones: <br><br>
            <input type="number" name="Evaluaciones" min="1" max="5"> <br><br>
            <input type="submit" value="Generar" name="gen"><br><br>
            Elija un tipo de evaluación:  <br><br>
            <select name="cmbTipo">
                <option value="A">-Elija un Tipo de evaluación</option>
                <?php
                    require_once("../controlador/controladorTipo.php");
                    $ct = new ControladorTipo();
                    $tipos= $ct -> obtenerTipos();
                    for ($i=0; $i <sizeof($tipos) ; $i++) { 
                       echo "<option value='".$tipos[$i]->getIdTipo()."'>".$tipos[$i]->getTipo()."</option><br><br>";
                    }
                ?>
            </select><br><br>
            Elija un Estudiante: <br><br>
            <select name="cmbEstudiante">
                    <option value="E">-Elija un Estudiante</option>
                    <?php
                        require_once("../controlador/controladorEstudiante.php");
                        $ce = new ControladorEst();
                        $estudiantes= $ce ->Obtenerest();
                        for ($i=0; $i <sizeof($tipos) ; $i++) { 
                            echo "<option value='".$estudiantes[$i]->getIdEstudiante()."'>".$estudiantes[$i]->getNombre()." ".$estudiantes[$i]->getApellidos()."</option><br>";
                        }
                    ?>
            </select><br><br>
        
        <?php
            if (isset($_POST['gen'])) {
                $evaluaciones = $_POST['Evaluaciones'];
               for ($i=0; $i < $evaluaciones; $i++) { 
                   echo "Nota " . ($i+1) . "<br><br>";
                  echo "<input type='number' name='notas[]' min='1' max='10'><br><br>";
               }
            echo "<input type='submit' value='Ok' name='save'><br><br>";
            echo " <input type='hidden' name='valores' value='" . $evaluaciones . "'>";

            echo  "</form>";
            }
        ?>
        <?php
            if (isset($_POST['save'])) {
                 $evaluaciones = $_POST['valores'];
                 $tipo= $_POST['cmbEstudiante'];
                 $notas = $_POST['notas'];
                 //$tip = $tipos[$i]->getTipo();
                echo "<table>
                <tr>
                <th> Estudiante </th>
                <th> Tipo de Evaluaion </th>";
                for ($i=0; $i < $evaluaciones ; $i++) { 
                    echo "<th>Nota " . ($i+1) . "</th>";
                }
                echo "</tr>";
                echo "<tr>
                <td>" . $estudiantes[$i]->getNombre(). "&nbsp;" .$estudiantes[$i]->getApellidos()."</td>";
                //$nombre = $ct->ObtenerTipoxid($tipo);
                // for ($i=0; $i < sizeof($tipo); $i++) {
                // echo "<td>".$tipos[$i]->getTipo()."</td>";
                // }
                 for ($i=0; $i < sizeof($notas); $i++) { 
                            echo "<td>";
                            echo $notas[$i];
                            echo "</td>";
                }
                

                
    
            }
            
        ?>

    </article>
</body>
</html>