<?php
    include_once("../controlador/controladorEstudiante.php");
    $ce = new ControladorEst();
    $salida = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $resultado = $ce->buscarEstudiante($busqueda);
        //echo $resultado;
        for ($i=0; $i < sizeof($resultado); $i++) {
            $foto = $ce->obtenerFoto($resultado[$i]->getIdEstudiante());
            $salida .= "<section class='estudiante' id='estudiante'>";
            if ($foto == null) {
                $salida .= "<section class='foto'><img src='./img/default.jpeg'/></section>";
            } else {
                $salida .= "<section class='foto'><img src='data:image/jpeg;base64,".base64_encode($foto[0]->getDocumento())."'/></section>";
            }
            $salida .= "<section class='nombre'>".$resultado[$i]->getNombre()." ".$resultado[$i]->getApellidos()."</section>";
            $salida .= '<section class="ver"><a href="./verEstudiante.php?idEstudiante='.$resultado[$i]->getIdEstudiante().'">Ver</a></section>';
            $salida .= "</section>";
        }
        echo $salida;
    }
?>