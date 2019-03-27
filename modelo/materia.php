<?php
class Materia{
    private $idMateria;
    private $materia;

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
}
?>