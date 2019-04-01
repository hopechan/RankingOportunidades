<?php
    class Estudiante{
        private $idEstudiante;
        private $nombre;
        private $apellidos;
        private $fechaNacimiento;
        private $telefono;
        private $email;
        private $direccion;
        private $year;
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

        public function getTelefono(){
            return $this->telefono;
        }

        public function setTelefono($telefono){
            $this->telefono = $telefono;
            return $this;
        }


        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
            return $this;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setDireccion($direccion){
            $this->direccion = $direccion;
            return $this;
        }

        public function getYear(){
            return $this->year;
        }

        public function setYear($year){
            $this->year = $year;
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