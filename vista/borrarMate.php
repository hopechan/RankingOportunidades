<?php
require_once('../controlador/controladorMate.php');
$id=$_GET['idMateria'];
$ct= new controladorMate();
$ct -> BorrarMateri($id);
?>