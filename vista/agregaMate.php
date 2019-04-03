<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Hecho por Emerson Guerrero-->
    <form method="post">
        <table>
        <tr>
        <td>
        <label for="materia">Materia: </label>
				<input type="text" name="materias" id="materia" required autocomplete="off" placeholder="Ej: Matematica"><br><br>
        </td>
        </tr>
        <tr>

        <td>
        <input type="submit" value="Agregar" name="agregar" id="agregar">
        </tr>
        <td>
    </form>


    <?php

    include_once("../controlador/controladorMate.php");
    include_once("../modelo/materia.php");
    if(isset($_POST['agregar'])){

        $mater=$_POST['materias'];

        $con = new ControladorMate();
        $nuevaMate= new Materia();

        $nuevaMate -> setIdMateria(null);
        $nuevaMate -> setMateria($mater);
        $nuevaMate = $con -> AgregarMateria($nuevaMate);
        echo "<script> alert('agregado con exito');</script>";
    }
    ?>
    <a href="../index.php">Inicio</a>
</body>
</html>