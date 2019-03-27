<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Tipo</title>
</head>
<body>
    <form method="post">
        <label for="txtTipo">Tipo</label>
        <input type="text" name="txtTipo" required>
        <br><br>
        <input type="submit" value="Guardar" name="btnGuardar">
    </form>
    <?php
        require_once("../controlador/controladorTipo.php");
        require_once("../modelo/tipo.php");
        if (isset($_POST['btnGuardar'])) {
            $tipo = $_POST['txtTipo'];
            $ct = new ControladorTipo();
            $nuevoTipo = new Tipo();
            $nuevoTipo->setIdTipo(null);
            $nuevoTipo->setTipo($tipo);
            $ct->agregarTipo($nuevoTipo);     
            echo '<script type="text/javascript">
            alert("Se ha ingresado el elemento");
            window.location="../index.php";
            </script>';   
        }
    ?>
</body>
</html>