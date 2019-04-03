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
    <article>   
        <table width="1000px">
            <tr>
                <th colspan="4">
                    Agregar Nota 
                </th>
            </tr>
            <tr>
                <td colspan="2">
                <form method="post" class="estilo">
                    Seleccione el numero de evaluaciones:
                </td> 
                <td>
                    <input type="number" name="Evaluaciones" min="1" max="4"> &nbsp;
                    <input type="submit" value="Generar" name="gen">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Elija un tipo de evaluación:  <br>
                    <select name="cmbTipo" class="estilo">
                        <option value="A">-Ninguna</option>
                        <?php
                            require_once("../controlador/controladorTipo.php");
                            $ct = new ControladorTipo();
                            $tipos= $ct -> obtenerTipos();
                            for ($e=0; $e <sizeof($tipos) ; $e++) { 
                            echo "<option value='".$tipos[$e]->getIdTipo()."'>".$tipos[$e]->getTipo()."</option><br><br>";
                            }
                        ?>
                    </select>
                </td>
                <td colspan="2">
                    Elija un Estudiante:<br>
                        <select name="cmbEstudiante" class="estilo">
                                <option value="E">-Ninguno</option>
                                <?php
                                    require_once("../controlador/controladorEstudiante.php");
                                    $ce = new ControladorEst();
                                    $estudiantes= $ce ->Obtenerest();
                                    for ($i=0; $i <sizeof($estudiantes) ; $i++) { 
                                        echo "<option value='".$estudiantes[$i]->getIdEstudiante()."'>".$estudiantes[$i]->getNombre()." ".$estudiantes[$i]->getApellidos()."</option><br>";
                                    }
                                ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Elija una materia: &nbsp;&nbsp; 
                    <select name="cmbMateria">
                        <option value="M">-Ninguna</option>
                        <?php
                            require_once("../controlador/controladorMate.php");
                            $cm = new controladorMate();
                            $materia = $cm->ObtenerMateria();
                            for ($mat=0; $mat < sizeof($materia) ; $mat++) { 
                               echo "<option value='" . $materia[$mat]->getIdMateria() . "'>" . $materia[$mat]->getMateria() . "</option>";
                            }
                        ?>
                    </select>
                </td>
                <td colspan="2">
                    Elije una año: &nbsp;&nbsp;
                    <select name="cmbAnio">
                        <option value="N">-Ninguno</option>
                        <option value="1">Year 1</option>
                        <option value="2">Year 2</option>
                        <option value="3">Year 3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php
                        if (isset($_POST['gen'])) {
                            $evaluaciones = $_POST['Evaluaciones'];
                        for ($a=0; $a < $evaluaciones; $a++) { 
                            echo "Nota " . ($a+1) . "&nbsp;&nbsp;";
                            echo "<input type='number' name='notas[]' min='1' max='10'>&nbsp;&nbsp;";
                        }
                        echo "<input type='submit' value='Ok' name='save'><br><br>";
                        echo " <input type='hidden' name='valores' value='" . $evaluaciones . "'>";
                        }
                    ?>
                </td>
            </tr>
            </form>
        </table><br><br>
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
                echo "<td>" . $nombre[0]->getTipo() . "</td>";
                 for ($u=0; $u < sizeof($notas); $u++) { 
                            echo "<td>";
                            echo $notas[$u];
                            echo "</td>";
                }
                echo "</tr></table><br><br>";
                echo "¿Son los datos correctos?<br>";
                echo '<form method="post"><br>
                    <input type="submit" value="Si" name="si">&nbsp;
                    <input type="submit" value="No" name="no"><br>
                    </form>';
            }
            if (isset($_POST['si'])) {
                // $valores = $_POST['notas'];
                // $valores = $_POST['nf'];
                include_once("../controlador/controladorNota.php");
                $cn = new ControladorNota();
                
                for ($n=0; $n < sizeof($notas); $n++) { 
                    $nota = new Nota();
                    $nota->setIdNota(null);
                    $nota->setIdEstudiante($estudiantes[0]->getIdEstudiante());
                    $nota->setIdMateria($materia[0]->getIdMateria());
                    $nota->setIdTipo($tipos[0]->getIdTipo());
                    $nota->setNota($notas[$n]);
                    $nota->setPeriodo("Periodo" . $n+1);
                    $nota->setAnio($_POST['cmbAnio']);
                    $nota->setPorcentaje(0.25);
                    $cn ->agregarNota($nota);
                }
                // echo "<script type='text/javascript' languaje='javascript'>
                //     alert('Registro agregado con exito!');
                //     window.location='agregarNota.php';
                //     </script>";
            }
        ?>
        
    </article>
</body>
</html>
