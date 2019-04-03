<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./vista/img/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="./vista/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Materias Disponibles</title>
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
    <h3>Todas las Materias</h3>
    <section class="opciones">
        <input class="btnNuevo" type="button" value="Nuevo" onclick="window.location=''">
            <input type="text" name="txtBusqueda"><i class="fas fa-search"></i>
    </section>
    <section class="main">
        <table>
            <tr>
                <th>ID</th>
                <th>Materia</th>
            </tr>
        <?php
            include_once("../controlador/controladorMate.php");
            $ct = new ControladorMate();
            $listaMate = $ct->ObtenerMateria();
            for ($i=0; $i < sizeof($listaMate); $i++) {
                echo "<tr>";
                echo "<td>".$listaMate[$i]->getIdMateria()."</td>";
                echo "<td>".$listaMate[$i]->getMateria()."</td>";
                echo '<td>'.'<a href="../controlador/borrarMate.php?idMateria='.$listaMate[$i]->getIdMateria().'"><input type="submit" value="Borrar" name="btnBorrar"></a></td>';
                echo '<td>'.'<a href="../controlador/actualizaMate.php?idMateria='.$listaMate[$i] ->getIdMateria().'"><input type="submit" value="Actualizar" name="actualizar"></a></td>';
                echo "</tr>";
            }
        ?>
        </table>
    </section>
</body>
</html>