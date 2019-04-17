<?php
class Materia{
    private $idMateria;
    private $materia;
    private $descripcion;

    public function getIdMateria(){
        return $this->idMateria;
    }

    public function setIdMateria($idMateria){
        $this->idMateria = $idMateria;
        return $this;
    }

    public function getMateria(){
        return $this->materia;
    }

    public function setMateria($materia){
        $this->materia = $materia;
        return $this;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;

        return $this;
    }
}
?>
