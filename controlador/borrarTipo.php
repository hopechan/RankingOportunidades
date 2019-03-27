<?php
    include("controladorTipo.php");
    $id = $_GET['idTipo'];
    $ct = new ControladorTipo();
    $ct->borrarTipo($id);
?>