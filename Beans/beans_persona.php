<?php 
class beans_persona{
  		private $idpersona;
        private $password;
		private $rep_password;
        private $nombre_usuario;
        private $documento;
		private $nombre;
        private $apellido;
        private $email;
        private $ciudad;
        private $direccion;
        private $lugar_nacido;
        private $fecha_nacido;
        private $edad;
        private $sexo;
        private $telefono_fijo;
        private $telefono_Cel;
        private $fotoPersona;
		
		private $mensaje;

        
 public function getIdpersona() {
        return $this->idpersona;
    }
 public function setIdpersona($idpersona) {
        $this->idpersona = $idpersona;
    }


 public function getPassword() {
        return $this->password;
    }
 public function setPassword($password) {
        $this->password = $password;
    }

public function getRep_password() {
        return $this->rep_password;
    }
 public function setRep_password($rep_password) {
        $this->rep_password = $rep_password;
    }

 public function getNombre_usuario() {
        return $this->nombre_usuario;
    }
 public function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = nombre_usuario;
    }




 public function getDocumento() {
        return $this->documento;
    }
 public function setDocumento($documento) {
        $this->documento = $documento;
    }



	
 public function getNombre() {
        return $this->nombre;
    }
 public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
	
 public function getApellido() {
        return $this->apellido;
    }
 public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
	
public function getEmail() {
        return $this->email;
    }
 public function setEmail($email) {
        $this->email= $email;
    }

public function getCiudad() {
        return $this->ciudad;
    }
 public function setCiudad($ciudad) {
        $this->ciudad= $ciudad;
    }

public function getDireccion() {
        return $this->direccion;
    }
 public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

public function getLugar_nacido() {
        return $this->lugar_nacido;
    }
 public function setLugar_nacido($lugar_nacido) {
        $this->lugar_nacido = $lugar_nacido;
    }	

public function getFecha_nacido() {
        return $this->fecha_nacido;
    }
 public function setFecha_nacido($fecha_nacido) {
        $this->fecha_nacido = $fecha_nacido;
    }

public function getEdad() {
        return $this->edad;
    }
 public function setEdad($edad) {
        $this->edad = $edad;
    }

public function getSexo() {
        return $this->sexo;
    }
 public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

public function getTelefono_fijo() {
        return $this->telefono_fijo;
    }
 public function setTelefono_fijo($telefono_fijo) {
        $this->telefono_fijo = $telefono_fijo;
    }

public function getTelefono_Cel() {
        return $this->telefono_Cel;
    }
 public function setTelefono_Cel($telefono_Cel) {
        $this->telefono_Cel = $telefono_Cel;
    }

public function getFotoPersona() {
        return $this->fotoPersona;
    }
 public function setFotoPersona($fotoPersona) {
        $this->fotoPersona = $fotoPersona;
    }
	
	public function getMensaje() {
        return $this->mensaje;
    }
 public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }


    }
	?>