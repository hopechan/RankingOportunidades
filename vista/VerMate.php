<h3>Todas las Materias</h3>
<table>
    <tr>
        <td>ID</td>
        <td>Materia</td>
    </tr>
    <?php
        include_once("../controlador/ControladorMate.php");

        $ct = new ControladorMate();

        $listaMate = $ct->ObtenerMateria();
        for ($i=0; $i < sizeof($listaMate); $i++) {
            echo "<tr>";
            echo "<td>".$listaMate[$i]->getIdMateria()."</td>";
            echo "<td>".$listaMate[$i]->getMateria()."</td>";
            echo '<td>'.'<a href="borrarMate.php?idMateria='.$listaMate[$i]->getIdMateria().'"><input type="submit" value="Borrar" name="btnBorrar"></a></td>';
            echo '<td></td>';
            echo "</tr>";
        }
    ?>
<a href="../index.php">Inicio</a>
