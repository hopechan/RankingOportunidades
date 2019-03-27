<?php
class Nota{
    private $idNota;
    private $idEstudiante;
    private $idMateria;
    private $idTipo;
    private $nota;
    private $periodo;
    private $anio;
    private $porcentaje;

    public function getIdNota(){
        return $this->idNota;
    }

    public function setIdNota($idNota){
        $this->idNota = $idNota;
        return $this;
    }

    public function getIdEstudiante(){
        return $this->idEstudiante;
    }

    public function setIdEstudiante($idEstudiante){
        $this->idEstudiante = $idEstudiante;
        return $this;
    }

    public function getIdMateria(){
        return $this->idMateria;
    }

    public function setIdMateria($idMateria){
        $this->idMateria = $idMateria;

        return $this;
    }

    public function getIdTipo(){
        return $this->idTipo;
    }

    public function setIdTipo($idTipo){
        $this->idTipo = $idTipo;
        return $this;
    }

    public function getNota(){
        return $this->nota;
    }

    public function setNota($nota){
        $this->nota = $nota;
        return $this;
    }

    public function getPeriodo(){
        return $this->periodo;
    }

    public function setPeriodo($periodo){
        $this->periodo = $periodo;
        return $this;
    }

    public function getAnio(){
        return $this->anio;
    }

    public function setAnio($anio){
        $this->anio = $anio;
        return $this;
    }

    public function getPorcentaje(){
        return $this->porcentaje;
    }

    public function setPorcentaje($porcentaje){
        $this->porcentaje = $porcentaje;
        return $this;
    }
}

?>