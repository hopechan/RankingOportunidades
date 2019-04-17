<?php
    include_once("../controlador/controladorTipo.php");
    include_once("../modelo/nota.php");
    include_once("../modelo/tipo.php");

    $ct = new ControladorTipo();
    $busqueda1 =$ct->obtenerId("Centro Escolar");
    echo $busqueda1->getIdTipo();
?>