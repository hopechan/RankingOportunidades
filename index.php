<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./vista/img/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="./vista/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>RANKING OPORTUNIDADES</title>
</head>
<body>
    <section class="barra">
        <a href=""><img src="./vista/img/logo.png" alt="logo Oportunidades"></a>
    </section>
    <section class="lateral">
        <a href="index.php" class="active"><i class="fas fa-home"></i> Inicio</a>
        <a href="./vista/webEstudiantes.php"><i class="fas fa-user-graduate"></i> Estudiantes</a>
        <a href="./vista/webNotas.php"><i class="fas fa-book-open"></i> Notas</a>
        <a href="./vista/webMateria.php"><i class="fas fa-certificate"></i> Materias</a>
        <a href="./vista/webCertificacion.php"><i class="fas fa-book"></i> Certificaciones</a>
        <a href="#"><i class="fas fa-cog"></i> Configuraciones</a>
    </section>
    <section class="main">
        <canvas id="grafico" width="1600" height="900"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
        <script src="./vista/js/grafico.js"></script>
    </section>
</body>
</html>