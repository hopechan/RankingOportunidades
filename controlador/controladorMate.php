<?php
require_once("conexion.php");
require_once("../modelo/materia.php");

class ControladorMate{
    /**Clase hecha por Emerson Guerrero */
    public function AgregarMateria(Materia $materia){

        try {
            $con = new Conexion();
            $idmate= $materia -> getIdMateria();
            $materia = $materia -> getMateria();
            $descripcion = $materia ->getDescripcion();
            $sql = "INSERT INTO materia(idMateria, materia, descripcion) VALUES('".$idmate."','".$materia."', '".$descripcion."')";
            $con -> execQueryO($sql);
            $con = null;
        } catch (mysqli_sql_exception $th) {
            throw new MySQLiQueryException($sql,$th ->getMessage(),$th->getCode());

        }
    }

    public function ObtenerMateria(){
        try {
            $con = new Conexion();
            $sql = "SELECT idMateria ,materia, descripcion FROM materia";
            $rs = $con -> execQueryO($sql);
            $tiposDiferent = array();
            //Se creo un objeto tipo con los datos correspondientes y se llena
            while($materia = $rs -> fetch_assoc()){
                $m = new Materia() ;
                $m ->setIdMateria($materia['idMateria']);
                $m ->setMateria($materia['materia']);
                $m ->setDescripcion($materia['descipcion']);
                //se esta almacenando el objeto como una coleccion
                array_push($tiposDiferent, $tipo);

            }
            $con = null;
            return $tiposDiferent;
        } catch (mysqli_sql_exeption $th) {
            throw new MySQLiQueryException($sql, $th ->getMessage(),$th->getCode());
        }
    }
    public function BuscarMateria($id){
        try {
            $con= new Conexion();
            $sql = "SELECT idMateria, materia, descripcion FROM materia WHERE idMateria ='".$id."'";
            $rs = $con -> execQueryO($sql);
            $tiposDiferent = array();
            while($materia = $rs -> fetch_assoc()){
                $tipo = new Materia() ;
                $tipo ->setIdMateria($materia['idMateria']);
                $tipo ->setMateria($materia['materia']);
                $tipo ->setDescripcion($materia['descripcion']);
                array_push($tiposDiferent, $tipo);
            }
            $con = null;
            return $tiposDiferent;
        } catch (mysqli_sql_exception $th) {
            throw new MySQLiQueryException($sql, $th ->getMessage(),$th->getCode());
        }
    }
    public function BorrarMateria($id){
        try {
            $con = new Conexion();
            $sql = "DELETE FROM materia WHERE idMateria = '".$id."' ";
            $rs = $con -> execQueryO($sql);
            echo '<script type="text/javascript">
            alert("Se ha borrado el elemento");
            window.location="../index.php";
            </script>';
            $con = null;
        } catch (mysqli_sql_exception $th ) {
            throw new MySQLiQueryException($sql,$th ->getMessage(), $th->getCode());
        }
    }

    public function ActualizarMate(Materia $id){

        try {
            $con = new Conexion();
            $idMateria= $id->getIdMateria();
            $materia =$id->getMateria();
            $descripcion = $id->getDescripcion();
            $sql = "UPDATE materia SET materia = '".$materia."', descripcion = '".$descripcion."' WHERE idMateria ='".$idMateria."' ";
            $con ->execQueryO($sql);
            $con = null;
            echo '<script type="text/javascript">
            alert("Se ha actualizado el elemento");
            window.location="../index.php";
            </script>';
            $con = null;
        } catch (myaqli_sql_exception $th) {
            throw new MySQLiQueryException($sql,$th ->getMessage(),$th->getCode());
        }
    }
}
?>