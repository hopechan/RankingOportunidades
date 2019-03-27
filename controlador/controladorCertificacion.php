<?php
    include_once("conexion.php");
    include_once("../modelo/certificacion.php");
    class ControladorCertificacion{
        function agregarCertificacion(Certificacion $c){
            try {
                $conn = new Conexion();
                $idCertificacion = $c->getIdCertificacion();
                $idTipo = $c->getIdTipo();
                $idEstudiante = $c->getIdEstudiante();
                $idNota = $c->getNota();
                $sql = "INSERT INTO Certificacion(IdCertificacion, idTipo, idEstudiante, nota) 
                                                VALUES(null, '".$idTipo."', '".$idEstudiante."', '".$nota."')";
                $conn->execQueryO($sql);
                $conn = null;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function obtenerCertificacion(){
            try {
                $conn = new Conexion();
                $sql = "SELECT c.idCertificacion, t.tipo, CONCAT(e.nombre,' ',e.apellidos) AS Estudiante, c.nota FROM Certificacion as C INNER JOIN Tipo as t ON c.idTipo = t.idTipo INNER JOIN Estudiante as e ON c.idEstudiante = e.idEstudiante";
                $rs = $conn->execQueryO($sql);
                $coleccion = array();
                while ($certificacion = $rs->fetch_assoc()) {
                    $c = new Certificacion();
                    $c->setIdCertificacion($certificacion['idCertificacion']);
                    $c->setIdTipo($certificacion['idTipo']);
                    $c->setIdEstudiante($certificacion['idEstudiante']);
                    $c->setNota($certificacion['nota']);
                    array_push($coleccion, $c);
                }
                $conn = null;
                return $coleccion;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function buscarCertificacion($idCertificacion){
            //este metodo devuelve el id,tipo,alumno,nota
            try {
                $conn = new Conexion();
                $sql = "SELECT c.idCertificacion, t.tipo, CONCAT(e.nombre,' ',e.apellidos) AS Estudiante, c.nota FROM Certificacion as C WHERE c.idCertificacion = '".$idCertificacion."' INNER JOIN Tipo as t ON c.idTipo = t.idTipo INNER JOIN Estudiante as e ON c.idEstudiante = e.idEstudiante";
                $rs = $conn->execQueryO($sql);
                $coleccion = array();
                while ($certificacion = $rs->fetch_assoc()) {
                    $c = new Certificacion();
                    $c->setIdCertificacion($certificacion['idCertificacion']);
                    $c->setIdTipo($certificacion['idTipo']);
                    $c->setIdEstudiante($certificacion['idEstudiante']);
                    $c->setNota($certificacion['nota']);
                    array_push($coleccion, $c);
                }
                $conn = null;
                return $coleccion;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function borrarCertificacion($idCertificacion){
            try {
                $conn = new Conexion();
                $id = $_GET['idCertificacion'];
                $sql = "DELETE FROM Certificacion WHERE idCertificacion =".$id;
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