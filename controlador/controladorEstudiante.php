<?php
    require_once("conexion.php");
    require_once("../modelo/estudiante.php");
    require_once("../modelo/documento.php");

    class ControladorEst {
        public function  Agregarestudiante(Estudiante $e){
            try {
                $conn = new Conexion();
                $idEstudiante = $e->getIdEstudiante();
                $nombre = $e -> getNombre();
                $apellido = $e -> getApellidos();
                $fechanac = $e -> getFechaNacimiento();
                $telefono = $e -> getTelefono();
                $email = $e -> getEmail();
                $direccion = $e -> getDireccion();
                $year = $e -> getYear();
                $centroesc = $e -> getCentroEscolar();
                $sql = "INSERT INTO Estudiante (idEstudiante, nombre, apellidos, fechaNacimiento, telefono, email, direccion, year ,centroEscolar) VALUES ('".$idEstudiante."','".$nombre."','".$apellido."','".$fechanac."','".$telefono."', '".$email."', '".$direccion."', '".$year."', '".$centroesc."')";
                $conn -> execQueryO($sql);
                $conn = null;
            } catch (mysqli_sql_execption $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        public function Obtenerest() {
            try {
                $conn = new Conexion();
                $sql = "SELECT idEstudiante, nombre, apellidos, fechaNacimiento, telefono, email, direccion, year, centroEscolar FROM Estudiante";
                $result = $conn ->execQueryO($sql);
                $coleccionest = array();
                while ($estudiante = $result->fetch_assoc()) {
                    $est = new Estudiante();
                    $est -> setIdEstudiante($estudiante ['idEstudiante']);
                    $est -> setNombre($estudiante['nombre']);
                    $est -> setApellidos($estudiante['apellidos']);
                    $est -> setFechaNacimiento($estudiante['fechaNacimiento']);
                    $est -> setTelefono($estudiante['telefono']);
                    $est -> setEmail($estudiante['email']);
                    $est -> setDireccion($estudiante['direccion']);
                    $est -> setYear($estudiante['year']);
                    $est -> setCentroEscolar($estudiante['centroEscolar']);
                    array_push($coleccionest, $est);
                }
                $conn=null;
                return $coleccionest;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function maxId(){
            try {
                $conn = new Conexion();
                $sql = "SELECT MAX(idEstudiante) FROM Estudiante";
                $result = $conn->execQueryO($sql);
                $resultado = array();
                while ($maximo = $result->fetch_assoc()) {
                    $max = $maximo['MAX(idEstudiante)'];
                }
                return $max;
            } catch (mysqli_sql_execption $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        public function deletestu($idEstudiante){
            try {
                $conn = new Conexion();
                $sql = "DELETE FROM Estudiante WHERE idEstudiante=" .$idEstudiante;
                $conn -> execQueryO($sql);
                $conn = null;
                echo "<script type='text/javascript'>
                alert('Registro eliminado con exito');
                window.location='../vista/webEstudiantes.php';
                </script>
                ";
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function editarEstudiante(Estudiante $e){
            try {
                $conn = new Conexion();
                $nombre = $e->getNombre();
                $apellido = $e->getApellidos();
                $fechaNacimiento = $e->getFechaNacimiento();
                $telefono = $e->getTelefono();
                $email = $e->getEmail();
                $direccion = $e->getDireccion();
                $year = $e->getYear();
                $ce = $e->getCentroEscolar();

                $sql = "UPDATE Estudiante SET nombre = '".$nombre."',
                        apellidos = '".$apellido."', fechaNacimiento = '".$telefono."',
                        email = '".$email."', direccion= '".$direcion."', year = '".$year."',
                        centroEscolar = '".$ce."' WHERE idEstudiante=".$id;
                $conn ->execQueryO($sql);
                echo "<script>alert('Se ha actualizado el registro'); window.location='../vista/webEstudiantes.php'</script>";
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function buscarEstudiante($busqueda){
            try {
                $conn = new Conexion();
                //puse * para probar si funciona esto :v
                $sql = "SELECT * FROM Estudiante WHERE nombre LIKE '%" . $busqueda . "%' OR apellidos LIKE '%" . $busqueda . "%' OR year LIKE '%" . $busqueda . "%' OR centroEscolar LIKE '%" . $busqueda . "%'";
                $rs = $conn->execQueryO($sql);
                $coleccion = array();
                while ($estudiante = $rs->fetch_assoc()) {
                    $est = new Estudiante();
                        $est -> setIdEstudiante($estudiante ['idEstudiante']);
                        $est -> setNombre($estudiante['nombre']);
                        $est -> setApellidos($estudiante['apellidos']);
                        $est -> setFechaNacimiento($estudiante['fechaNacimiento']);
                        $est -> setTelefono($estudiante['telefono']);
                        $est -> setEmail($estudiante['email']);
                        $est -> setDireccion($estudiante['direccion']);
                        $est -> setYear($estudiante['year']);
                        $est -> setCentroEscolar($estudiante['centroEscolar']);
                    array_push($coleccion, $est);
                }
                return $coleccion;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function borrarDocumento($idEstudiante){
            try {
                $conn = new Conexion();
                $sql = "DELETE FROM Documentos WHERE idEstudiante=".$idEstudiante;
                $conn->execQueryO($sql);
                $conn = null;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function calcularEdad($fechaNacimiento){
            $cumpleAnios = new DateTime($fechaNacimiento);
            $hoy = new DateTime();
            $edad = $hoy->diff($cumpleAnios);
            return $edad->y;
        }

        public function buscarxId($id){
            try {
                $conn = new Conexion();
                $sql = "SELECT idEstudiante, nombre, apellidos, fechaNacimiento, telefono, email, direccion, year, centroEscolar FROM Estudiante WHERE idEstudiante=".$id;
                $rs = $conn ->execQueryO($sql);
                $coleccion = array();
                while ($resultado = $rs->fetch_assoc()) {
                    $estudiante = new Estudiante();
                    $estudiante->setIdEstudiante($resultado['idEstudiante']);
                    $estudiante->setNombre($resultado['nombre']);
                    $estudiante->setApellidos($resultado['apellidos']);
                    $estudiante->setFechaNacimiento($resultado['fechaNacimiento']);
                    $estudiante->setTelefono($resultado['telefono']);
                    $estudiante->setEmail($resultado['email']);
                    $estudiante->setDireccion($resultado['direccion']);
                    $estudiante->setYear($resultado['year']);
                    $estudiante->setCentroEscolar($resultado['centroEscolar']);
                    array_push($coleccion, $estudiante);
                }
                return $coleccion;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function obtenerFoto($idEstudiante){
            try {
                $conn = new Conexion();
                $sql = "SELECT idDocumentos, idEstudiante, tipoDocumento, documento, descripcion FROM
                    Documentos WHERE tipoDocumento = 'foto' AND idEstudiante =".$idEstudiante;
                $rs = $conn ->execQueryO($sql);
                $coleccion = array();
                while ($resultado = $rs ->fetch_assoc()) {
                        $d = new Documentos();
                            $d->setIdDocumento($resultado['idDocumentos']);
                            $d->setIdEstudiante($resultado['idEstudiante']);
                            $d->setNombreDocumento($resultado['tipoDocumento']);
                            $d->setDocumento($resultado['documento']);
                            $d->setDescripcion($resultado['descripcion']);
                        array_push($coleccion, $d);
                }
                $conn = null;
                return $coleccion;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        function guardarDocumento(Documentos $d){
            try {
                $conn = new Conexion();
                $idDocumento = $d->getIdDocumento();
                $idEstudiante = $d->getIdEstudiante();
                $tipo = $d->getNombreDocumento();
                $documento = $d->getDocumento();
                $descripcion = $d->getDescripcion();
                $sql = "INSERT INTO Documentos(idDocumentos, idEstudiante, tipoDocumento, documento, descripcion) VALUES ('".$idDocumento."',
                        '".$idEstudiante."', '".$tipo."', '".$documento."', '".$descripcion."')";
                $conn->execQueryO($sql);
                $conn = null;
            } catch (mysqli_sql_exception $e) {
                throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
            }
        }

        public function obtenerRanking(){}
    }
?>