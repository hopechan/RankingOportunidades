<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <?php
      include_once('../controlador/controladorMate.php');
      $ctr = new ControladorMate();
      $listaMate = $ctr -> ObtenerMateria();
      $actualMate = $ctr -> BuscarMateria($mate=$_GET['idMateria']);
      for ($i=0; $i <sizeof($listaMate) ; $i++) { 
          echo"<tr>";
          echo"<td>".$listaMate[$i]->getMateria()."</td>";
          echo"<tr>";

      }
    ?>
</table><br><br>
<hr><br><br>
<form method="post">
      <input type="hidden" name="idMateria" value="<?=$actualMate[0]->getIdMateria();?>">
      <label for="materia">Materia:</label>
      <input type="text" name="materia" value="<?=$actualMate[0]->getMateria();?>">
      <input type="submit" name="listo" value="generar">

</form>

<?php
    include_once('../modelo/materia.php');
    if (isset($_POST['listo'])) {
        $idMateria = $_POST['idMateria'];
        $materia =$_POST['materia'];
        $mate= new Materia();
            $mate ->setIdMateria($idMateria);
            $mate ->setMateria($materia);
            $ctr ->ActualizarMate($mate);
        
    }
?>
</body>
</html>

