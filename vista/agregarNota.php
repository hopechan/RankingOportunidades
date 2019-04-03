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
                    for ($e=0; $e <sizeof($tipos) ; $e++) { 
                       echo "<option value='".$tipos[$e]->getIdTipo()."'>".$tipos[$e]->getTipo()."</option><br><br>";
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
                        for ($i=0; $i <sizeof($estudiantes) ; $i++) { 
                            echo "<option value='".$estudiantes[$i]->getIdEstudiante()."'>".$estudiantes[$i]->getNombre()." ".$estudiantes[$i]->getApellidos()."</option><br>";
                        }
                    ?>
            </select><br><br>
        
        <?php
            if (isset($_POST['gen'])) {
                $evaluaciones = $_POST['Evaluaciones'];
               for ($a=0; $a < $evaluaciones; $a++) { 
                   echo "Nota " . ($a+1) . "<br><br>";
                  echo "<input type='number' name='notas[]' min='1' max='10'><br><br>";
               }
            echo "<input type='submit' value='Ok' name='save'><br><br>";
            echo " <input type='hidden' name='valores' value='" . $evaluaciones . "'>";
            }
        ?>
        </form>
        <?php
            if (isset($_POST['save'])) {
                 $evaluaciones = $_POST['valores'];
                 $id= $_POST['cmbEstudiante'];
                 $notas = $_POST['notas'];
                 $idtipo = $_POST['cmbTipo'];
                echo "<table>
                <tr>
                <th> Estudiante </th>
                <th> Tipo de Evaluaion </th>";
                for ($o=0; $o < $evaluaciones ; $o++) { 
                    echo "<th>Nota " . ($o+1) . "</th>";
                }
                echo "</tr>";
                echo "<tr>";
                $estudiantes = $ce->buscarxId($id);
                echo "<td>" . $estudiantes[0]->getNombre() . "&nbsp;" . $estudiantes[0]->getApellidos() . "</td>";
                $nombre = $ct->ObtenerTipoxid($idtipo);
                // for ($i=0; $i < $nombre; $i++) { 
                //     echo "<td>".$nombre[$i]."</td>";
                //     echo $nombre;
                // }
                echo "<td>" . $nombre[0] . "</td>";
                 for ($u=0; $u < sizeof($notas); $u++) { 
                            echo "<td>";
                            echo $notas[$u];
                            echo "</td>";
                }
            }
            
        ?>

    </article>
</body>
</html>