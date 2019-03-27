<?php
class Certificacion{
    private $idCertificacion;
    private $idTipo;
    private $idEstudiante;
    private $nota;
    
    public function getIdCertificacion(){
        return $this->idCertificacion;
    }

    public function setIdCertificacion($idCertificacion){
        $this->idCertificacion = $idCertificacion;

        return $this;
    }

    public function getIdTipo(){
        return $this->idTipo;
    }

    public function setIdTipo($idTipo){
        $this->idTipo = $idTipo;

        return $this;
    }

    public function getIdEstudiante(){
        return $this->idEstudiante;
    }

    public function setIdEstudiante($idEstudiante){
        $this->idEstudiante = $idEstudiante;

        return $this;
    }

    public function getNota(){
        return $this->nota;
    }

    public function setNota($nota){
        $this->nota = $nota;
        return $this;
    }
}
?>