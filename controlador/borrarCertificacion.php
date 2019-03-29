<?php
    include("controladorCertificacion.php");
    $id = $_GET['idCertificacion'];
    $cc = new ControladorCertificacion();
    $cc->borrarCertificacion($id);
?>