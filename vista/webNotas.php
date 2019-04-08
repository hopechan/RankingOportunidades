<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./img/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Notas</title>
</head>
<body>
    <section class="barra">
        <a href=""><img src="../vista/img/logo.png" alt="logo Oportunidades"></a><i class="fa fa-search"></i>
        <input type="text" name="txtBusqueda" id="txtBusqueda" placeholder="Buscar ..." onkeyup="buscarEstudiante()">
    </section>
    <section class="lateral">
        <a href="../index.php"><i class="fas fa-home"></i> Inicio</a>
        <a href="./webEstudiantes.php"><i class="fas fa-user-graduate"></i> Estudiantes</a>
        <a href="./webNotas.php" class="active"><i class="fas fa-book-open"></i> Notas</a>
        <a href="./webMateria.php"><i class="fas fa-certificate"></i> Materias</a>
        <a href="./webCertificacion.php"><i class="fas fa-book"></i> Certificaciones</a>
        <a href="#"><i class="fas fa-cog"></i> Configuraciones</a>
    </section>
</body>
</html>