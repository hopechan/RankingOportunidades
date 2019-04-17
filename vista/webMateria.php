<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="./js/bootstrap.js"></script>
    <title>Ranking Oportunidades</title>
</head>
<body>
<div class="grid-container">
    <div class="menu-icon">
        <i class="fas fa-bars header__menu"></i>
    </div>
    <header class="header">
        <div class="header__search">Buscar...</div>
    </header>
    <aside class="sidenav">

        <div class="sidenav__close-icon">
            <i class="fas fa-times sidenav__brand-close"></i>
        </div>
        <ul class="sidenav__list">
        <li class="sidenav__list-item">Inicio</li>
        <li class="sidenav__list-item">Estudiantes</li>
        <li class="sidenav__list-item">Notas</li>
        <li class="sidenav__list-item">Certificaciones</li>
        <li class="sidenav__list-item">Configuraciones</li>
        </ul>
    </aside>
    <main class="main">
        <div class="main-overview">
            <div class="card text-center tabla">
                <h5 class="card-header" style="width:100%;">Materias</h5>
                <div class="card-text">
                    <table class="table table-sm table-striped" >
                        <thead>
                            <tr>
                                <td scope="col" style="width: 300px">#</td>
                                <td scope="col" style="width: 300px">Materia</td>
                                <td scope="col" style="width: 300px">Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once("../modelo/materia.php");
                                include_once("../controlador/controladorMate.php");
                                $cn = new ControladorMate();
                                $materias = $cn->ObtenerMateria();
                                for ($i=0; $i < sizeof($materias); $i++) {
                                    echo "<tr>";
                                    echo "<th scope='row'>".$materias[$i]->getIdMateria()."</th>";
                                    echo "<td>".$materias[$i]->getMateria()."</td>";
                                    echo "<td>Opciones</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted" style="width:100%;">Paginacion</div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer__copyright">&copy; 2019 FGK</div>
        <div class="footer__signature">Programa Oportunidades</div>
    </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        const menuIconEl = $('.menu-icon');
        const sidenavEl = $('.sidenav');
        const sidenavCloseEl = $('.sidenav__close-icon');

        // Add and remove provided class names
        function toggleClassName(el, className) {
            if (el.hasClass(className)) {
                el.removeClass(className);
            } else {
                el.addClass(className);
            }
        }
        // Open the side nav on click
        menuIconEl.on('click', function() {
            toggleClassName(sidenavEl, 'active');
        });
    // Close the side nav on click
        sidenavCloseEl.on('click', function() {
            toggleClassName(sidenavEl, 'active');
        });
    </script>
</body>
</html>