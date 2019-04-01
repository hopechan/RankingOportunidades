<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Detalle Estudiante</title>
</head>
<body>
    <section class="barra">
        <a href=""><img src="../vista/img/logo.png" alt="logo Oportunidades"></a>
    </section>
    <section class="lateral">
        <a href="../index.php"><i class="fas fa-home"></i> Inicio</a>
        <a href="./webEstudiantes.php"><i class="fas fa-user-graduate"></i> Estudiantes</a>
        <a href="./webNotas.php"><i class="fas fa-book-open"></i> Notas</a>
        <a href="./webCertificacion.php"><i class="fas fa-certificate"></i> Certificaciones</a>
    </section>
    <section><br></section>
    <section class="main">
        <?php
            include_once("../controlador/controladorEstudiante.php");
            $id = $_GET['idEstudiante'];
            $ce = new ControladorEst();
            $estudiante = $ce->buscarxId($id);
            $foto = $ce->obtenerFoto($id);
        ?>
        <h3>Detalle Estudiante</h3>
        <hr>
        <section class="datos">
            <table>
                <tr>
                    <td><?echo $estudiante[0]->getNombre()." ".$estudiante[0]->getApellidos()?></td>
                    <td>
                        <?
                            if ($foto == null) {
                                echo "<section class='foto'><img src='./img/default.jpeg'/></section>";
                            } else {
                                echo "<section class='foto'><img src='data:image/jpeg;base64,".base64_encode($foto[0]->getDocumento())."'/></section>";
                            }
                        ?>
                    </td>
                </tr>
                <tr><td><?echo $estudiante[0]->getTelefono()?></td></tr>
                <tr><td><?echo $estudiante[0]->getEmail()?></td></tr>
                <tr><td><?echo $estudiante[0]->getFechaNacimiento()." (".$ce->calcularEdad($estudiante[0]->getFechaNacimiento())." años)"?></td></tr>
                <tr><td><?echo $estudiante[0]->getDireccion()?></td></tr>
            </table>
        </section>
        <form method="post">
            <a href="./editarEstudiante.php?idEstudiante=<?echo $estudiante[0]->getIdEstudiante()?>">Editar</a>
            <a href="../controlador/borrarEstudiante.php?idEstudiante=<?echo $estudiante[0]->getIdEstudiante()?>">Borrar</a>
        </form>
    </section>
</body>
</html>