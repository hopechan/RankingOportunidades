<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./js/busqueda.js"></script>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Estudiantes</title>
</head>
<body>
    <section class="barra">
        <a href=""><img src="../vista/img/logo.png" alt="logo Oportunidades"></a>
        <section class="opciones">
            <input class="btnNuevo" type="button" value="Nuevo" onclick="window.location='./agregarEstudiante.php'">
            <input type="text" name="txtBusqueda" id="txtBusqueda" onkeyup="buscarEstudiante(this.value)"><i class="fas fa-search"></i>
        </section>
    </section>
    <section class="lateral">
        <a href="../index.php"><i class="fas fa-home"></i> Inicio</a>
        <a href="./webEstudiantes.php"><i class="fas fa-user-graduate"></i> Estudiantes</a>
        <a href="./webNotas.php"><i class="fas fa-book-open"></i> Notas</a>
        <a href="./webCertificacion.php"><i class="fas fa-certificate"></i> Certificaciones</a>
    </section>
    <section><br></section>
    <section class="main" id="main">
        <hr>
        <section id="resultado"></section>
        <?php
            include_once("./buscarEstudiante.php");
            include_once("../controlador/controladorEstudiante.php");
            $ce = new ControladorEst();
            $total = $ce->Obtenerest();
            for ($i=0; $i < sizeof($total); $i++) {
                $foto = $ce->obtenerFoto($total[$i]->getIdEstudiante());
                echo "<section class='estudiante' id='estudiante'>";
                if ($foto == null) {
                    echo "<section class='foto'><img src='./img/default.jpeg'/></section>";
                } else {
                    echo "<section class='foto'><img src='data:image/jpeg;base64,".base64_encode($foto[0]->getDocumento())."'/></section>";
                }
                echo "<section class='nombre'>".$total[$i]->getNombre()." ".$total[$i]->getApellidos()."</section>";
                echo '<section class="ver"><a href="./verEstudiante.php?idEstudiante='.$total[$i]->getIdEstudiante().'">Ver</a></section>';
                echo "</section>";
            }
        ?>
    </section>
</body>
</html>