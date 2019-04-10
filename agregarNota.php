<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Notas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <header>
        <section class="barra">
                <a href=""><img src="./img/logo.png" alt="logo Oportunidades"></a>
        </section>
    </header>
    <nav>
        <section class="lateral">
            <a href="index.php"><i class="fas fa-home"></i> Inicio</a>
            <a href="./webEstudiantes.php"><i class="fas fa-user-graduate"></i> Estudiantes</a>
            <a href="./webNotas.php" class="active"><i class="fas fa-book-open"></i> Notas</a>
            <a href="./webMateria.php"><i class="fas fa-certificate"></i> Materias</a>
            <a href="./webCertificacion.php"><i class="fas fa-book"></i> Certificaciones</a>
            <a href="#"><i class="fas fa-cog"></i> Configuraciones</a>
        </section>
    </nav>
    <article>
        <section class="notas desplegables">
        <table width="1000px">
            <tr>
                <th colspan="4">
                    Agregar Nota 
                </th>
            </tr>
                <form method="post" class="estilo">
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
        <?php
            echo "<tr>";
               echo ' <td colspan="4">
                    Nota 1 &nbsp;&nbsp;
                    <input type="number" name="notas[]" min="1" max="10">&nbsp;&nbsp;
                    Nota 2 &nbsp;&nbsp;
                    <input type="number" name="notas[]" min="1" max="10">&nbsp;&nbsp;
                    Nota 3 &nbsp;&nbsp;
                    <input type="number" name="notas[]" min="1" max="10">&nbsp;&nbsp;
                    Nota 4 &nbsp;&nbsp;
                    <input type="number" name="notas[]" min="1" max="10">&nbsp;&nbsp;
                </td>
            </tr> 
        </table><br><br>
        <input type="submit" value="Ok" name="show" class="botones">
        </form>
        </section>
        <br><br>';
        
        if (isset($_POST['show'])) {
            echo "<form method='post'>"; 
           $evaluacion = $_POST['cmbTipo'];
           $alumno =$_POST['cmbEstudiante'];
           $materia = $_POST['cmbMateria'];
           $anio = $_POST['cmbAnio'];
           $notas = $_POST['notas'];
            $ce = new ControladorEst();
            $ct = new ControladorTipo();
           $alum = $ce->buscarxId($alumno);
           $eva = $ct->ObtenerTipoxid($evaluacion);
           echo "<section class='tablaResultados'><table>
                    <tr>
                        <th> Alumno </th>
                        <th> Evaluación </th>
                        <th> Nota 1 </th>
                        <th> Nota 2</th>
                        <th> Nota 3 </th>
                        <th> Nota 4 </th>
                    </tr>
                    <tr>
                        <td>" .$alum[0]->getNombre()."&nbsp;".$alum[0]->getApellidos() ."</td>
                        <td>" .$eva[0]->getTipo() . "</td>";
                        foreach ($notas as $ke => $val) {
                            echo "<td>" . $val. "</td>";
                        }
                echo "</tr></table></section><br><br>";  
                echo "<spam class='botones'>";
                echo "¿Son los datos correctos?<br><br>";
                echo "</spam><section class='botones'>";
                echo "<input type='submit' value='Si' name='yes'>&nbsp;&nbsp;";
                echo "<input type='submit' value='No' name='no'>
                </section>";     
                foreach ($notas as $ke => $val) {
                    echo "<input type='hidden' name='tas[]' value='".$val."'>";    
                }
                echo "<input type='hidden' name='anio' value='" . $anio . "'>";
                echo "<input type='hidden' name='idalum' value='".$alumno."'>";
                echo "</form>";
                //echo  "<input type='hidden' name='id' value='".$estudiantes[0]->getIdEstudiante()."'>";           
        }if (isset($_POST['yes'])) {
            include_once("../controlador/controladorNota.php");
            //$idest= $_POST['id'];
            $calificaciones=$_POST['tas'];
            $year =$_POST['anio'];
            $idalum=$_POST['idalum'];
            //$ce = new ControladorEst();
            $cn = new ControladorNota();
            //$est = $ce->buscarxId($idest);
            for ($i=0; $i < sizeof($calificaciones); $i++) { 
                $nota = new Nota();
                $nota->setIdNota(null);
                $nota->setIdEstudiante($idalum);
                $nota->setIdMateria($materia[0]->getIdMateria());
                $nota->setIdTipo($tipos[0]->getIdTipo());
                $nota->setNota($calificaciones[$i]);
                $nota->setPeriodo("Periodo" . ($i+1));
                $nota->setAnio($year);
                $nota->setPorcentaje(0.25);
                $cn ->agregarNota($nota);
            } 
            echo "<script type='text/javascript' laguaje='javascript'>
                    alert('Registro guardado con Exito!');
                    window.location='./agregarNota.php';
                </script>";  
         }
         if (isset($_POST['no'])) {
            echo "<script type='text/javascript' languaje='javascript'>
                    alert('Los datos han sido borrados, presione aceptar para volver a editar');
                    window.location='./agregarNota.php';
                </script>";
         }
         
        ?>
        </section>
    </article>
</body>
</html>