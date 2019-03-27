<?php
    class Estudiante{
        private $idEstudiante;
        private $nombre;
        private $apellidos;
        private $fechaNacimiento;
        private $centroEscolar;

        public function getIdEstudiante(){
            return $this->idEstudiante;
        }

        public function setIdEstudiante($idEstudiante){
            $this->idEstudiante = $idEstudiante;
            return $this;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        public function getApellidos(){
            return $this->apellidos;
        }

        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
            return $this;
        }

        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }

        public function setFechaNacimiento($fechaNacimiento){
            $this->fechaNacimiento = $fechaNacimiento;
            return $this;
        }

        public function getCentroEscolar(){
            return $this->centroEscolar;
        }

        public function setCentroEscolar($centroEscolar){
            $this->centroEscolar = $centroEscolar;
            return $this;
        }
    }
?>