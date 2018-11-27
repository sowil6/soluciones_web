<?php 
class BeansNoticia{
  		private $idpersona;
		private $nombre;
        private $apellido;
        private $email;
		
 public function getIdpersona() {
        return $this->$idpersona;
    }
 public function setIdpersona($idpersona) {
        $this->idpersona = $idpersona;
    }
	
 public function getNombre() {
        return $this->$nombre;
    }
 public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
	
 public function getApellido() {
        return $this->$apellido;
    }
 public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
	
public function getEmail() {
        return $this->$email;
    }
 public function setEmail($email) {
        $this->email= $email;
    }
	
	
	
    }
	?>