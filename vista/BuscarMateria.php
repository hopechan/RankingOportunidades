<link rel="stylesheet" href="./css/style.css">
<?php
include_once('../controlador/controladorMate.php');
$ctr = new ControladorMate();
$salida='';
if(isset($_GET['busqueda'])){
    $buscar = $_GET['busqueda'];

    echo"<table class='tablaFondo'>";
    echo"<tr class='bordes'>";
    echo "<th class='thbordes thMate'> Materia</th>";
    echo"</tr>";
    echo"<tr class='bordes'>";
    echo "<td class='tdbordes'>";
    $encontrado = $ctr -> BusquedadeMateria($buscar);
    for ($i=0; $i <sizeof($encontrado); $i++) { 
        $salida .="<section>".$encontrado[$i]->getMateria()."</section>";
    }
    
    echo "$salida";
    echo"</td>";
    echo"</tr>";
    echo"</table>";
}
?>