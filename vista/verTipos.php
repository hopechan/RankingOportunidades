<h3>Tipos Disponibles</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Tipo</th>
    </tr>
    <?php
        include_once("../controlador/controladorTipo.php");
        $ct = new ControladorTipo();
        $listaTipos = $ct->obtenerTipos();
        for ($i=0; $i < sizeof($listaTipos); $i++) {
            echo "<tr>";
            echo "<td>".$listaTipos[$i]->getIdTipo()."</td>";
            echo "<td>".$listaTipos[$i]->getTipo()."</td>";
            //echo '<td>'.'<a href="borrarTipo?idTipo='.$listaTipos[$i]->getIdTipo().'"</a>Borrar</td>';
            //echo '<td><input type="submit" value="Borrar" name="btnBorrar"><a href="../controlador/eliminar.php?"></td>';
            echo "<td><a href='../controlador/borrarTipo.php?&idTipo=".$listaTipos[$i]->getIdTipo()."'>Borrar</a><td>";
            echo "</tr>";
            
        }
    ?>
</table>
<a href="../index.php">Inicio</a>
