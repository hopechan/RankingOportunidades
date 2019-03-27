a<?php
require_once("conexion.php");
require_once("../modelo/tipo.php");
class ControladorTipo{
    public function agregarTipo(Tipo $t){
        try {
            $conn = new Conexion();
            $idTipo = $t->getIdTipo();
            $tipo = $t->getTipo();
            $sql = "INSERT INTO Tipo(idTipo, tipo) VALUES('".$idTipo."','".$tipo."')";
            $conn->execQueryO($sql);    
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function obtenerTipos(){
        try {
            $conn = new Conexion();
            $sql = "SELECT idTipo, tipo FROM Tipo";
            $rs = $conn->execQueryO($sql);
            $ColeccionTipos = array();
            //Se crea y llena un objeto tipo con los datos correspondientes
            while ($tipo = $rs->fetch_assoc()) {
                $t = new Tipo;
                $t->setIdTipo($tipo['idTipo']);
                $t->setTipo($tipo['tipo']);
                //se agrega el objeto a una coleccion
                array_push($ColeccionTipos, $t);
            }
            $conn = null;
            return $ColeccionTipos;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function buscarTipo($tipo){
        try {
            $conn = new Conexion();
            $sql = "SELECT idTipo, tipo FROM Tipo WHERE tipo LIKE '%".$tipo."%'";
            $rs = $conn->execQueryO($sql);
            $tipoEncontrado = array();
            while ($tipo = $rs->fetch_assoc()) {
                $t = new Tipo();
                $t->setIdTipo($tipo['idTipo']);
                $t->setTipo($tipo['tipo']);
                array_push($ColeccionTipos, $t);
            }
            $conn = null;
            return $tipoEncontrado;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function borrarTipo($idTipo){
        try {
            $conn = new Conexion();
            $id = $_GET['idTipo'];
            $sql = "DELETE FROM Tipo WHERE idTipo = ".$id;
            $conn->execQueryO($sql);
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