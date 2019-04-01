<?php
class Documentos{
    private $idDocumento;
    private $idEstudiante;
    private $nombreDocumento;
    private $documento;
    private $descripcion;

    public function getIdDocumento(){
        return $this->idDocumento;
    }

    public function setIdDocumento($idDocumento){
        $this->idDocumento = $idDocumento;
        return $this;
    }

    public function getIdEstudiante(){
        return $this->idEstudiante;
    }

    public function setIdEstudiante($idEstudiante){
        $this->idEstudiante = $idEstudiante;
        return $this;
    }

    public function getNombreDocumento(){
        return $this->nombreDocumento;
    }

    public function setNombreDocumento($nombreDocumento){
        $this->nombreDocumento = $nombreDocumento;
        return $this;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function setDocumento($documento){
        $this->documento = $documento;
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