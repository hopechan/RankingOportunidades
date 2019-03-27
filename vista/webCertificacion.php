<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificaciones</title>
</head>
<body>
    <section>Certificaciones Realizadas</section>
    <section>
        <a href="agregarCertificacion.php">Ingresar Nota</a>
        <table>
            <tr>
                <th>Tipo</th>
                <th>Estudiante</th>
                <th>Nota</th>
                <th>Opciones</th>
            </tr>
            <?php
                include_once("../controlador/controladorCertificacion.php");
                $cc = new ControladorCertificacion();
                $lista = $cc->obtenerCertificacion();
                for ($i=0; $i < sizeof($lista); $i++) { 
                    echo "<tr>";
                    echo "<td>".$lista['tipo']."</td>";
                    echo "<td>".$lista['Estudiante']."</td>";
                    echo "<td>".$lista['Nota']."</td>";
                    echo "<td>Opciones :v</td>";
                    echo "</tr>";
                }           
                ?>
        </table>
    </section>
</body>
</html>