<?php 
if(defined('RUTA_BASE')){ include_once RUTA_BEANS."beans_persona.php"; }else{include_once('../Beans/beans_persona.php');}


class beans_estudiante extends beans_persona{
		private $id_estudiante;
  		private $documento_estudiante;
		private $programa;
        private  $carrera;
        private  $sede;
        private  $salon;
        private  $jornada;
        private  $empresa;
        private  $cargo;
        private  $direccion_empresa;
        private  $telefono_empresa;
        private  $fecha_inscripcion;
        private  $fecha_matricula;
	    private  $nombre_acudiente;
	    private  $telefono_acudiente;
	    private  $institucion_donde_proviene;
	    private  $estado_estudiante;
	    private  $observacion;
	    private  $estado_certificacion;
	    private  $fecha_certificacion;


					
public function getId_estudiante() {
        return $this->id_estudiante;
    }
public function setId_estudiante($id_estudiante) {
        $this->id_estudiante = $id_estudiante;
    }
	
	public function getDocumento_estudiante() {
        return $this->documento_estudiante;
    }
public function setDocumento_estudiante($documento_estudiante) {
        $this->documento_estudiante = $documento_estudiante;
    }
public function getPrograma() {
      return $this->programa;
    }
public function setPrograma($programa) {
        $this->programa = $programa;
    }
	
public function getCarrera() {
        return $this->carrera;
    }
public function setCarrera($carrera) {
        $this->carrera = $carrera;
    }
	
public function getSede() {
        return $this->sede;
    }
public function setSede($sede) {
        $this->sede = $sede;
    }
	
public function getSalon() {
        return $this->salon;
    }
public function setSalon($salon) {
        $this->salon = $salon;
    }
	
public function getJornada() {
        return $this->jornada;
    }
public function setJornada($jornada) {
        $this->jornada = $jornada;
    }
	
public function getEmpresa() {
        return $this->empresa;
    }
public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }
	
public function getCargo() {
        return $this->cargo;
    }
public function setCargo($cargo) {
        $this->cargo = $cargo;
    }
	
public function getDireccion_empresa() {
        return $this->direccion_empresa;
    }
public function setDireccion_empresa($direccion_empresa) {
        $this->direccion_empresa = $direccion_empresa;
    }
	
public function getTelefono_empresa() {
        return $this->telefono_empresa;
    }
public function setTelefono_empresa($telefono_empresa) {
        $this->telefono_empresa = $telefono_empresa;
    }
	
public function getFecha_inscripcion() {
        return $this->fecha_inscripcion;
    }
public function setFecha_inscripcion($fecha_inscripcion) {
        $this->fecha_inscripcion = $fecha_inscripcion;
    }
	
public function getFecha_matricula() {
        return $this->fecha_matricula;
    }
public function setFecha_matricula($fecha_matricula) {
        $this->fecha_matricula = $fecha_matricula;
    }
	
public function getNombre_acudiente() {
        return $this->nombre_acudiente;
    }
public function setNombre_acudiente($nombre_acudiente) {
        $this->nombre_acudiente = $nombre_acudiente;
    }

public function getTelefono_acudiente() {
        return $this->telefono_acudiente;
    }
public function setTelefono_acudiente($telefono_acudientea) {
        $this->telefono_acudiente = $telefono_acudiente;
    }
	
public function getInstitucion_donde_proviene() {
        return $this->institucion_donde_proviene;
    }
public function setInstitucion_donde_proviene($institucion_donde_proviene) {
        $this->institucion_donde_proviene = $institucion_donde_proviene;
    }
	    
public function getEstado_estudiante() {
        return $this->estado_estudiante;
    }
public function setEstado_estudiante($estado_estudiante) {
        $this->estado_estudiante = $estado_estudiante;
    }
		

 public function getObservacion() {
        return $this->observacion;
    }
public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }


		 public function getEstado_certificacion() {
        return $this->estado_certificacion;
    }
public function setEstado_certificacion($estado_certificacion) {
        $this->estado_certificacion = $estado_certificacion;
    }
	

 public function getFecha_certificacion() {
        return $this->fecha_certificacion;
    }
public function setFecha_certificacion($fecha_certificacion) {
        $this->fecha_certificacion = $fecha_certificacion;
    }


	
}
?>

