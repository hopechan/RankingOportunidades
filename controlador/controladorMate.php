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
            $sql = "INSERT INTO Materia(idMateria, materia) VALUES('".$idmate."','".$materia."')";
            $con -> execQueryO($sql);
            $con = null;
        } catch (mysqli_sql_exception $th) {
            throw new MySQLiQueryException($sql,$th ->getMessage(),$th->getCode());

        }
    }

    public function ObtenerMateria(){
        try {
            $con = new Conexion();
            $sql = "SELECT idMateria ,materia FROM Materia";
            $rs = $con -> execQueryO($sql);
            $tiposDiferent = array();
            //Se creo un objeto tipo con los datos correspondientes y se llena
            while($materia = $rs -> fetch_assoc()){
                $tipo = new Materia() ;
                $tipo ->setIdMateria($materia['idMateria']);
                $tipo ->setMateria($materia['materia']);
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
            $sql = "SELECT idMateria, materia FROM Materia WHERE idMateria ='".$id."'";
            $rs = $con -> execQueryO($sql);
            $tiposDiferent = array();
            while($materia = $rs -> fetch_assoc()){
                $tipo = new Materia() ;
                $tipo ->setIdMateria($materia['idMateria']);
                $tipo ->setMateria($materia['materia']);
                array_push($tiposDiferent, $tipo);
            }
            $con = null;
            return $tiposDiferent;

        } catch (mysqli_sql_exception $th) {
            throw new MySQLiQueryException($sql, $th ->getMessage(),$th->getCode());
            
        }
    }
    public function BorrarMateri($id){
        try {
            $con = new Conexion();
            $sql = "DELETE FROM Materia WHERE idMateria = '".$id."' ";
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
            $sql = "UPDATE Materia SET materia = '".$materia."' WHERE idMateria ='".$idMateria."' ";
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