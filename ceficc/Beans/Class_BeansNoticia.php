<?php 
class Class_BeansNoticia{
  		private $idnoticia;
		private $codigoNoticia;
        private  $codigoDetalleNoticia;
        private  $tituloNoticia;
        private  $introduccionNoticia;
        private  $mensajeNoticia;
        private  $ubicacionNoticia;
        private  $fotoNoticia;
        private  $urlPaginaNoticia;
        private  $urlHojaXML;
        private  $fechanoticia;
        private  $autornoticia;
		public function __construct()
    {
       
    } 
 public function getIdnoticia() {
        return $this->$idnoticia;
    }
 public function setIdnoticia($idnoticia) {
        $this->id = $idnoticia;
    }

  public function getCodigoNoticia() {
        return $this->codigoNoticia;
    }
  public function setCodigoNoticia($codigoNoticia) {
        $this->codigoNoticia = $codigoNoticia;
    }

  public function getCodigoDetalleNoticia() {
        return $this->codigoDetalleNoticia;
    }
  public function setCodigoDetalleNoticia($codigoDetalleNoticia) {
        $this->codigoDetalleNoticia = $codigoDetalleNoticia;
    }

  public function getTituloNoticia() {
        return $this->tituloNoticia;
    }
  public function setTituloNoticia($tituloNoticia) {
        $this->tituloNoticia = $tituloNoticia;
    }
	
  public function getIntroduccionNoticia() {
        return $this->introduccionNoticia;
    }
  public function setIntroduccionNoticia($introduccionNoticia) {
        $this->introduccionNoticia = $introduccionNoticia;
    }
	
  public function getMensajeNoticia() {
        return $this->mensajeNoticia;
    }
  public function setMensajeNoticia($mensajeNoticia) {
        $this->mensajeNoticia = $mensajeNoticia;
    }

  public function getUbicacionNoticia() {
        return $this->ubicacionNoticia;
    }
  public function setUbicacionNoticia($ubicacionNoticia) {
        $this->ubicacionNoticia = $ubicacionNoticia;
    }
	
	public function getFotoNoticia() {
        return $this->fotoNoticia;
    }
  public function setFotoNoticia($fotoNoticia) {
        $this->fotoNoticia = $fotoNoticia;
    }
	
	public function getUrlPaginaNoticia() {
        return $this->urlPaginaNoticia;
    }
  public function setUrlPaginaNoticia($urlPaginaNoticia) {
        $this->urlPaginaNoticia = $urlPaginaNoticia;
    }
	
	public function getUrlHojaXML() {
        return $this->urlHojaXML;
    }
  public function setUrlHojaXML($urlHojaXML) {
        $this->urlHojaXML = $urlHojaXML;
    }
	
	public function getFechanoticia() {
        return $this->fechanoticia;
    }
  public function setFechanoticia($fechanoticia) {
        $this->fechanoticia = $fechanoticia;
    }
	
	public function getAutornoticia() {
        return $this->autornoticia;
    }
  public function setAutornoticia($autornoticia) {
        $this->autornoticia = $autornoticia;
    }
}
?>