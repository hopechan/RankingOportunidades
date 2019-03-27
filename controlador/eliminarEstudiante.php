<?php
require_once("../controlador/controladorEstudiante.php");
$id = $_GET['IdEstudiante'];
$ce = new controladorEst();
$ce -> deletestu($id);
?>