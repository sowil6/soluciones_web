   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./Styles/bootstrap3.3.5.min.css"> <!---->
<link rel="stylesheet" type="text/css" href="./Styles/css_Estudiante.css">

<script type="text/javascript" src="./Scripts/jquery.min.js" charset="utf-8"></script>
<script src="./Scripts/jquery-ui/external/jquery/jquery.js"></script>
<script src="./Scripts/inscripcion-1.js"></script>
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


<!--Globo mensaje-->
 <div class="contenedor-balloon" id="contenedor-balloon">
 <div class="balloon" id="balloon" >
    </div> 
    <div class="triangulo-balloon" >
      </div> 
      </div> 
<div class="contenedor_consulta"><!--contenedor_consulta-->

<!--fin_globo mensaje-->
<!--<div class="row row_form_arriba">fila arriba primer bloque-->
<!--GRUPO DE FILAS-->
  <fieldset  class="group-row-pass" id="group-row-pass">
   <legend class="leyenda_mensaje" id="leyenda_mensaje"><label class="la_mensaje" id="la_mensaje">CONSULTA DE INSCRITOS  <i class='fa iconnewInscripcion fa-eye'></i></label> </legend>

<!--<div class="row">-->
<table  class="table " >
 <thead class="thead-dark">
    <tr>
      <td>Documento de identidad</td>
      <td>Nombre</td>
      <td>Programa</td>
      <td>Estado del estudiante</td>
      <td>Estado de Certificación</td>
      <td>  <label class="la_id" id="la_id" ></label><!--style="display:none"-->
</td>
    </tr> </thead>
     <tbody>
    <tr>
      <td> <input  class="documentoConsulta" type="text" id="documento_consulta" name="documento"  onkeyup="Boton_consultaEstudiante();return false;"><!--// return false Evitar ejecutar el submit del formulario.-->
</td>
      <td><input  class="nombre_consulta" type="text" id="nombre_consulta" name="nombre_consulta"  onkeyup="Boton_consultaEstudiante()" ></td>
      <td>  <select class="comboconsulta_inscripcion" name="comboconsulta_inscripcion" id="comboconsulta_inscripcion" onChange="Boton_consultaEstudiante()" href="javascript:;" >
  <option></option>
     <?php foreach ($comboProgramas as $key => $value) { ?>
<option><?php echo $value['nombrePrograma']; ?></option>
<?php }
?>
   </select></td>
      <td><select class="estado_estudiante" name="estado_estudiante" id="estado_estudiante_consulta" onChange="Boton_consultaEstudiante()" href="javascript:;"  >
     <option  disabled selected></option>
     <option></option>
     <option>Activo</option>
     <option>Inscrito</option>
     <option>Matriculado</option>
     <option>Sesante</option>
   </select></td>
      <td><select class="estado_certificacion" name="estado_certificacion" id="estado_certificacion_consulta" onChange="Boton_consultaEstudiante()" href="javascript:;"  >
     <option  disabled selected></option>
     <option></option>
     <option>Firmado</option>
     <option>Inscrito</option>
     <option>Matriculado</option>
     <option>Sesante</option>
   </select></td>
      <td>      <button type="button" class="btn btn-success btn-continuar"  id="btn-continuar"	href="javascript:;" onClick="Boton_consultaEstudiante();return false;">Consultar</button>
<button type="button" class="btn btn-success btn-continuar"  id="btn-continuar"	href="javascript:;" onClick="Boton_Prueba();return false;">Prueba</button>
<button type="button" class="btn btn-success"  id="btnNuevo" title=""	href="javascript:;" 	onClick="Boton_ReporteConsultaPDF();">Reporte Pdf</button>

</td>
    </tr>
  </tbody>
</table>
    
     

 <!--</div>fin_fila-->
</fieldset><!--FIN GRUPO DE FILAS group-row-pass--> 
<!--nuevo-->
<!--</div>fin arriba primer bloque-->

<!--nuevo-->
<!--FORMULARIO BAJO-->
<div class="row row_form_bajo"><!--inicio segundo bloque-->
 <div class="col-sm-4">
 <div class="tabla_consultaInscritos" id="consultaInscritos"><!--Contenedor que aloja la tabla de consulta de inscritos-->

</div>
</div>

<div class="col-sm-8">
  <div class="form-consulta" id="group-row">
<!--fila-->
<div class="row ">
 <div class="col-sm-4">

                  <i class="fa icon-asterisco fa-asterisk"></i>  <label class="la_programa">Estudio Seleccionado:</label>   

        <select class="programa" name="programa" id="programa" href="javascript:;" >
    <option value="" disabled selected>Seleccione un Programa</option>
   
      <?php foreach ($comboProgramas as $key => $value) { ?>
<option><?php echo $value['nombrePrograma']; ?></option>
<?php }
?>
   </select> 
 
  
   
   
</div>
 <div class="col-sm-4 der"> 
<label class="la_documento">Nº Documento: </label> 
 <input  class="documento" type="text" id="documento" name="documento" value="" onkeyup="Exist_Estudio();return false;"><!--// return false Evitar ejecutar el submit del formulario.-->
  </div>


   <div class="col-sm-4 der">        
        <label class="la_fecha">Fecha de Inscripción:</label>
        <input  class="fecha" disabled="true" type="text" id="fecha" name="fecha">
        
        </div>
   </div>
<!--fin_fila-->
<!--fila-->
<div class="row ">
 <div class="col-sm-6 izq">
 <i class="fa icon-asterisco fa-asterisk"></i><label>JORNADA:</label>
     <input type="radio" class="jornada" name="jornada" id="jornada1"  checked="true" value="Mañana">Mañana
     <input type="radio" class="jornada" name="jornada" id="jornada2" value="Tarde">Tarde
     <input type="radio" class="jornada" name="jornada" id="jornada3" value="Noche">Noche
     <input type="radio" class="jornada" name="jornada" id="jornada4" value="Sabados">Sabados
</div>
     <div class="col-sm-6 der">
       <i class="fa icon-asterisco fa-asterisk"></i><label class="la_nombre">Nombre:</label> 
<input  class="nombre" type="text" id="nombre" name="nombre">
        
         </div>
</div>
<!--fin_fila-->

<!--fila-->
<div class="row"> 
     
       <div class="col-sm-6 izq">
       <label class="la_edad">Edad:</label> 
        <input  class="edad" type="text" id="edad" name="edad" value="33">
        
               
      <i class="fa icon-asterisco fa-asterisk"></i> <label class="la_sexo">SEXO:</label>
     <input type="radio" class="sexo" name="gender"  id="sexo1" value="Hombre">Hombre
     <input type="radio" class="sexo" name="gender" id="sexo2" checked="true" value="Mujer">Mujer
     <input type="radio" class="sexo" name="gender" id="sexo3" value="Otro">Otro
        </div>
        <div class="col-sm-6 der">
     <i class="fa icon-asterisco fa-asterisk"></i>  <label class="la_ciudad">Ciudad:</label> 
        <input  class="ciudad" type="text" id="ciudad" name="ciudad" value="555555557313233">
        
         </div>
        </div>
<!--fin_fila-->

      
<!--fila-->
<div class="row"> 
      <div class="col-sm-6 izq">
     <i class="fa icon-asterisco fa-asterisk"></i>  <label class="la_lugarNacido">Lugar de Nacimiento:</label> 
        <input  class="lugarNacido" type="text" id="lugarNacido" name="lugarNacido" value="55555557313233" >
        
         </div>
        <div class="col-sm-6 der">        
   <i class="fa icon-asterisco fa-asterisk"></i>    <label class="la_fechaNacido">Fecha de Nacimiento:</label> 
        <input  class="fechaNacido" type="text" id="fechaNacido"  name="fechaNacido" value="55555557313233">
        
        </div>
        </div>
<!--fin_fila--> 
<!--fila-->
<div class="row izq">
  <div class="col-sm-6 izq">
       <label class="la_direccion">Dirección:</label>   
    </div>
  <div class="col-sm-6">     
        <input class="direccion" type="text" id="direccion" name="direccion" value="3455555557313233">
      
       
    </div>      
        </div>
<!--fin_fila-->

 <!--fila-->
 <div class="row izq">
  <div class="col-sm-6 izq">
       <label class="la_email">Correo Electrónico:</label>   
   <input class="email" type="text" id="email" name="email" value="sobeyda@hotmail.com"> 
   </div>
 
  <div class="col-sm-6 der" >     
       <label class="la_telFijo">Telefono: Fijo:</label>   
   <input class="telFijo" type="text" id="telFijo" name="telFijo" value="5557313233">  
   
       <label class="la_telCelular">Celular:</label>   
   <input class="telCelular" type="text" id="telCelular" name="telCelular" value="555557313233"> 
   
   </div>
     </div>      
 <!--fin_fila-->
 
 <!--fila-->
 <div class="row"> 
      <div class="col-sm-6 izq">
     <label class="izq">SI EL ESTUDIANTE ES EMPLEADO:</label>   
     </div>
      </div>
 <!--fin_fila-->
 
 <!--fila-->
 <div class="row"> 
      <div class="col-sm-6 izq">
       <label class="la_empresa">Empresa:</label> 
        <input  class="empresa" type="text" id="empresa" name="empresa">
        
         </div>
        <div class="col-sm-6 der">        
        <label class="la_cargo">Cargo:</label>
        <input  class="cargo" type="text" id="cargo" name="cargo">
        
        </div>
        </div>
 <!--fin_fila-->
     
 <!--fila-->
 <div class="row izq">
  <div class="col-sm-6 izq">
       <label class="la_dirEmpresa">Direccion de la Empresa:</label>   
    </div>
  <div class="col-sm-6">     
        <input class="dirEmpresa" type="text" id="dirEmpresa" name="direcdirEmpresa">
      
       
    </div>      
        </div>
 <!--fin_fila-->
    
 <!--fila-->
 <div class="row izq">
  <div class="col-sm-6 izq">
       <label class="la_telEmpresa">Telefono de la Empresa:</label>   
       <input class="telEmpresa" type="text" id="telEmpresa" name="telEmpresa">
      
       
    </div>      
        </div>
 <!--fin_fila-->

<div class="row">
<div class="col-sm-4 "><!--inicio_columna-->
</br>
<div class="row">
<div class="div_estado">
<label class="la_estado_estudiante">Estado del Estudiante:</label>   
 
 <select class="estado_estudiante" name="estado_estudiante" id="estado_estudiante" href="javascript:;"  >
     <option  disabled selected>Estado del Estudiante</option>
     <option>Activo</option>
     <option>Inscrito</option>
     <option>Matriculado</option>
     <option>Sesante</option>
   </select>
   </div>
   </div>
   
   <div class="row">
<button type="button" class="btn btn-success izq"  id="btngrabar"	href="javascript:;" 	onClick="grabar();return false;">Enviar</button>
<button type="button" class="btn btn-danger der"  id="btnNuevo"	href="javascript:;" 	onClick="eliminar();">Eliminar</button>
<button type="button" class="btn btn-success"  id="btnNuevo" title=""	href="javascript:;" 	onClick="generapdf();">Generar Pdf</button>

 	 </div> 
    </div><!--fin_columna-->
  <div class="col-sm-4 "><!--inicio_columna-->
</br>
<div class="row">
<div class="div_estado_certificacion">
<label class="la_estado_estudiante">Estado de la Certificacion:</label>   
 
 <select class="estado_certificacion" name="estado_certificacion" id="estado_certificacion" href="javascript:;"  >
     <option  disabled selected>Estado de la Certificación</option>
     <option>Firmado</option>
     <option>Inscrito</option>
     <option>Matriculado</option>
     <option>Sesante</option>
   </select>
   
<div class="form-group">   
<i class="fa icon-asterisco fa-asterisk"></i>    <label class="la_fecha_certificacion">Fecha de Certificacion:</label> 
        <input  class="fecha_certificacion" type="date" id="fecha_certificacion"  name="fechaNacido" >
   </div>
   </div>
   </div>

    </div><!--fin_columna-->

   <div class="col-sm-4 "><!--inicio_columna-->
      
  <fieldset  class="field_obser" id="group-row-pass">
   <legend class="leyenda_mensaje" id="leyenda_mensaje"><label class="la_mensaje" id="la_mensaje">Observaciones:<i class='fa iconnewInscripcion fa-eye'></i></label> </legend>

<textarea class="observacion"  type="text" id="observacion" name="telEmpresa"></textarea>
    </fieldset><!--FIN GRUPO DE FILAS group-row-pass-->   
   	</div><!--fin_columna-->
		</div>
        
        </div>

  </div> <!--FIN FORM CONSULTA-->

 </div><!--fin form_bajo-->
<!--FIN FORMULARIO BAJO-->

</div><!--fin contenedor_consulta-->


