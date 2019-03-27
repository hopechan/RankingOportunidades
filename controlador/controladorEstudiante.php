<?php
    require_once("conexion.php");
    require_once("../modelo/estudiante.php");

    class ControladorEst {
        public function  Agregarestudiante(Estudiante $e){
            try {
                $conn = new Conexion();
                $idEstudiante = $e->getIdEstudiante();
                $nombre = $e -> getNombre();
                $apellido = $e -> getApellidos();
                $fechanac = $e -> getFechaNacimiento();
                $centroesc = $e -> getCentroEscolar();
                $sql = "INSERT INTO estudiante (idEstudiante, nombre, apellidos, fechaNacimiento, centroEscolar) VALUES ('".$idEstudiante."','".$nombre."','".$apellido."','".$fechanac."','".$centroesc."')";
                $conn -> execQueryO($sql);
                $conn = null;

            } catch (mysqli_sql_execption $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
                
            }
        }

        public function Obtenerest() {
            try {
                $conn = new Conexion();
                $sql = "SELECT idEstudiante, nombre, apellidos, fechaNacimiento, centroEscolar FROM estudiante";
                $result = $conn ->execQueryO($sql);
                $coleccionest = array();
                while ($estudiante = $result->fetch_assoc()) {
                    $est = new Estudiante(); 
                    $est -> setIdEstudiante($estudiante ['idEstudiante']);
                    $est -> setNombre($estudiante['nombre']);
                    $est -> setApellido($estudiante['apellido']);
                    $est -> setFechaNacimiento($estudiante['fechaNacimiento']);
                    $est -> setCentroEscolar($estudiante['centroEscolar']);
                    array_push($coleccionest, $est);
                }
                $conn=null;
                return $coleccionest;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        public function deletestu($idEstudiante){
            try {
                $conn = new Conexion();
                $id = $_GET['idEstudiate'];
                $sql = "DELETE FROM estudiante WHERE idEstudiante=" .$id;
                $conn -> execQueryO($sql);
                echo "<script type='text/javascript'>
                alert('Registro eliminado con exito');
                window.location='../vista/verEstudiantes.php';
                </script>
                ";
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }
    }
    
?>