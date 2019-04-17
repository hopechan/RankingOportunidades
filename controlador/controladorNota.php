<?php
include_once("./conexion.php");
include_once("../modelo/nota.php");
class ControladorNota{
    function agregarNota(Nota $n){
        try {
            $conn = new Conexion();
            //se obtiene el contenido del objeto Nota
            $idNota = $n->getIdNota();
            $idEstudiante = $n->getIdEstudiante();
            $idMateria = $n->getIdMateria();
            $idTipo = $n->getIdTipo();
            $nota = $n->getNota();
            $periodo = $n->getPeriodo();
            $anio = $n->getAnio();
            $porcentaje = $n->getPorcentaje();
            $sql = "INSERT INTO Nota(idNota, idEstudiante, idMateria, idTipo, nota, periodo, anio, porcentaje)
                                    VALUES(null, '".$idEstudiante."', '".$idMateria."','".$idTipo."', '".$nota."',
                                    '".$periodo."', '".$anio."','".$porcentaje."')";
            $conn->execQueryO($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    function obtenerNotas(){
        try {
            $conn = new Conexion();
            $sql = "SELECT n.idNota, CONCAT(e.nombre, ' ', e.apellidos) as Estudiante, m.materia, n.nota, n.periodo FROM Nota as n INNER JOIN Estudiante as e on e.idEstudiante = n.idEstudiante INNER JOIN Materia as m ON m.idMateria = n.idMateria";
            $rs = $conn->execQueryO($sql);
            $coleccionNota = array();
            while ($nota = $rs->fetch_assoc()) {
                $n = new Tipo();
                $n->setIdNota($nota['idNota']);
                $n->setIdEstudiante($nota['Estudiante']); //esto devuelve el nombre del alumno
                $n->setMateria($nota['materia']); //esto devuelve la materia
                $n->setNota($nota['nota']);
                $n->setPeriodo($nota['periodo']);
                array_push($coleccionNota, $n);
            }
            $conn = null;
            return $coleccionNota;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    function buscarNota($nota){
        //este metodo busca notas, no encuentra notas por estudiante
        try {
            $conn = new Conexion();
            $sql = "SELECT idNota, idEstudiante, idMateria, idTipo, nota, periodo, anio, porcentaje FROM Nota WHERE tipo LIKE '%".$nota."%'";
            $rs = $conn->execQueryO($sql);
            $notaEncontrada = array();
            while ($nota = $rs->fetch_assoc()) {
                $n = new Nota();
                $n->setIdNota($nota['idNota']);
                $n->setIdEstudiante($nota['idEstudiante']);
                $n->setMateria($nota['idMateria']);
                $n->setIdTipo($nota['idTipo']);
                $n->setNota($nota['nota']);
                $n->setPeriodo($nota['anio']);
                $n->setPorcentaje($nota['porcentaje']);
                array_push($notaEncontrada, $n);
            }
            $conn = null;
            return $notaEncontrada;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    function borrarTipo($idNota){
        try {
            $conn = new Conexion();
            $id = $_GET['idNota'];
            $sql = "DELETE FROM Nota WHERE idNota = ".$id;
            $conn->execQueryO($sql);
            $conn = null;
            echo '<script type="text/javascript">
            alert("Se ha borrado el elemento");
            window.location="../index.php";
            </script>';
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
}
?>