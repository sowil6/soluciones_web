  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./Styles/bootstrap3.3.5.min.css"> <!---->
<link rel="stylesheet" type="text/css" href="./Styles/css_certificado.css">

<script type="text/javascript" src="./Scripts/jquery.min.js" charset="utf-8"></script>
<script src="./Scripts/jquery-ui/external/jquery/jquery.js"></script>
<script src="./Scripts/certificacion.js"></script>
<link rel="stylesheet" type="text/css" href="./Styles/bootstrap3.3.5.min.css"> <!---->



<script type="text/javascript">
$(document).ready(function(){

/*if(document.getElementById('group-row')){document.getElementById('group-row').style.visibility="visible";}//oculta el formulario inferior
*/


//clicPrograma();
});//fin .ready

</script>
<?php
include_once RUTA_MANAGER. "manager_inscripcion.php";
?>
<?php
print_r($_SESSION);
?>

<!--Globo mensaje-->
 <div class="contenedor-balloon" id="contenedor-balloon">
 <div class="balloon" id="balloon" >
    </div> 
    <div class="triangulo-balloon" >
      </div> 
      </div> 
<div class="contenedor_certificados"><!--contenedor_consulta-->

<div class="container">
	<div class="row">
    	<div class="container" id="formContainer">


<!--nuevo////////////////-->
<div id="login">
               <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                                                    <h3 class="text-center text-info">Consulta tus Certificados</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Digite su Documento de Identidad:</label><br>
                                 <input  class="form-control documento" type="text" id="documento" name="documento" value="1"><!--// onkeyup="Boton_consultaEstudiante();return false;" return false Evitar ejecutar el submit del formulario.-->
                           
                            </div>
                          
                            <div class="form-group">
                            <button type="button" class="btn btn-lg btn-primary btn-block btn-continuar"  id="btn-continuar" href="javascript:;" onClick="Boton_consultaEstudiante();return false;">Consultar</button>

                            </div>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div></div>


<!--/////////////FORMULARIO BAJO-->

 <div class="tabla_consultaInscritos" id="consultaInscritos"><!--Contenedor que aloja la tabla de consulta de inscritos-->




 </div><!--fin form_bajo-->
<!--FIN FORMULARIO BAJO-->

</div><!--fin contenedor_consulta-->


