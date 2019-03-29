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
                $nota = $c->getNota();
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
                $sql = "SELECT c.idCertificacion, t.tipo, CONCAT(e.nombre,' ',e.apellidos) AS Estudiante, c.nota FROM Certificacion as c INNER JOIN Tipo as t ON c.idTipo = t.idTipo INNER JOIN Estudiante as e ON c.idEstudiante = e.idEstudiante ORDER BY t.tipo ASC";
                $rs = $conn->execQueryO($sql);
                $coleccion = array();
                while ($certificacion = $rs->fetch_assoc()) {
                    //por la forma en que hize la consulta puse esas cosas ahi :v
                    $c = new Certificacion();
                    $c->setIdCertificacion($certificacion['idCertificacion']);
                    $c->setIdTipo($certificacion['tipo']);
                    $c->setIdEstudiante($certificacion['Estudiante']);
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
                $sql = "SELECT c.idCertificacion, t.tipo, CONCAT(e.nombre,' ',e.apellidos) AS Estudiante, c.nota FROM Certificacion as c INNER JOIN Tipo as t ON c.idTipo = t.idTipo INNER JOIN Estudiante as e ON c.idEstudiante = e.idEstudiante WHERE c.idCertificacion = '".$idCertificacion."'";
                $rs = $conn->execQueryO($sql);
                $coleccion = array();
                while ($certificacion = $rs->fetch_assoc()) {
                    $c = new Certificacion();
                    $c->setIdCertificacion($certificacion['idCertificacion']);
                    $c->setIdTipo($certificacion['tipo']);
                    $c->setIdEstudiante($certificacion['Estudiante']);
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

        function actualizarCertificacion(Certificacion $c){
            try {
                $conn = new Conexion();
                $idCertificacion = $c->getIdCertificacion();
                $idTipo = $c->getIdTipo();
                $idEstudiante = $c->getIdEstudiante();
                $nota = $c->getNota();
                $sql = "UPDATE Certificacion SET idTipo='".$idTipo."', idEstudiante='".$idEstudiante."', nota='".$nota."' WHERE idCertificacion=".$idCertificacion;
                $conn->execQueryO($sql);
                $conn = null;
                echo '<script type="text/javascript">
                    alert("El registro se ha modificado");
                    window.location="../vista/webCertificacion.php";
                    </script>';
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }
    }
?>