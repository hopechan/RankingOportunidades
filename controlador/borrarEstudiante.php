<?php
    include("./controladorEstudiante.php");
    $id = $_GET['idEstudiante'];
    echo $id;
    $ce = new ControladorEst();
    $ce->borrarDocumento($id);
    $ce->deletestu($id);
?>