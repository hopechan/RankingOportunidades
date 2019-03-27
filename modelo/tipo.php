<?php
class Tipo{
    private $idTipo;
    private $tipo;

    public function getIdTipo(){
        return $this->idTipo;
    }

    public function setIdTipo($idTipo){
        $this->idTipo = $idTipo;
        return $this;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }
}

?>