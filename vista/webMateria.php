<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./img/icono.ico" type="image/x-icon">
    <script src="./js/busqueda.js"></script>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Materias</title>
</head>
<body>
    <section class="barra">
        <a href=""><img src="../vista/img/logo.png" alt="logo Oportunidades"></a>
        <i class="fa fa-search"></i>
        <input type="text" name="txtBusqueda" id="txtBusqueda" placeholder="Buscar ..." onkeyup="buscarEstudiante()">
    </section>
    <section class="lateral">
        <a href="../index.php"><i class="fas fa-home"></i> Inicio</a>
        <a href="./webEstudiantes.php"><i class="fas fa-user-graduate"></i> Estudiantes</a>
        <a href="./webNotas.php"><i class="fas fa-book-open"></i> Notas</a>
        <a href="./webMateria.php" class="active"><i class="fas fa-certificate"></i> Materias</a>
        <a href="./webCertificacion.php"><i class="fas fa-book"></i> Certificaciones</a>
        <a href="#"><i class="fas fa-cog"></i> Configuraciones</a>
    </section>
    <section class="main" id="main">
        <hr>
        <section id="resultado"></section>

            <h1 class="h1tipo">Materias Disponibles</h1>

            <section  class="sectiontable">
                <table class="tablaborde">
                    <tr class="bordes">
                        <th class="thbordes thid">ID</th>
                        <th class="thbordes thMate">Materia</th>
                        <th class="thbordes thAc">Acción</th>
                    </tr>
                    <?php
                        include_once("./BuscarMateria.php");
                        include_once("../controlador/controladorMate.php");
                        $ct = new ControladorMate();
                        $listaMate = $ct->ObtenerMateria();
                        for ($i=0; $i < sizeof($listaMate); $i++) {
                            echo "<tr class='trbordes'>";
                            echo "<td class='tdbordes'>".$listaMate[$i]->getIdMateria()."</td>";
                            echo "<td class='tdbordes'>".$listaMate[$i]->getMateria();
                            echo '<td class="tdbordes">'.'<a href="#"><i class="fas fa-times-circle"></i><input type="submit" value="Borrar" name="btnBorrar" class="btncolor"></a>';
                            echo '<a href="#"><i class="fas fa-pencil-alt btnizquierda" ></i><input type="submit" value="Actualizar" name="actualizar" class="btncolor"> </a></td>';
                            echo "</tr>";
                        }
                    ?>
                </table>
    </section>
</body>
</html>