<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <h1>
            Tabla de Estudiantes
        </h1>
    </header>
    <article>
        <table>
            <tr>
                <th>Id Estudiante</th>
                <th>Nombre </th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Centro Escolar</th>
                <th>Acción</th>
            </tr>
            <?php
                include_once("../controlador/controladorEstudiante.php");
                $ce = new controladorEst();
                $listaEstudiantes = $ce -> Obtenerest();
                for ($i=0; $i < sizeof($listaEstudiantes) ; $i++) { 
                   echo "<tr>";
                   echo "<td>" . $listaEstudiantes[$i] -> getIdEstudiante() . "</td>";
                   echo "<td>" . $listaEstudiantes[$i] -> getNombre() . "</td>";
                   echo "<td>" . $listaEstudiantes[$i] -> getApellidos() . "</td>";
                   echo "<td>" . $listaEstudiantes[$i] -> getFechaNacimiento() . "</td>";
                   echo "<td>" . $listaEstudiantes[$i] -> getCentroEscolar() . "</td>";
                   echo "<td> <a href='../modelo/eliminarEstudiante.php?IdEstudiante=".$listaEstudiantes[$i] ->getIdEstudiante()."'><input type='submit' name='btnBorrar' value='Borrar' class='box2'></a>";
                   echo "</tr>";
                }  
            ?>
        </table>
        <a href="../index.php">Inicio</a>
    </article>
</body>
</html>