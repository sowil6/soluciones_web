<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

-->
<?php 

 //define("RUTA_BASE", dirname(realpath(__FILE__))."/");
 //echo "la ruta base es desde include ".RUTA_BASE;
 ?>
<!-- reply | Font Awesome -https://fontawesome.com/icons/reply -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./Styles/bootstrap3.3.5.min.css"> <!---->
<link rel="stylesheet" type="text/css" href="./Styles/css_Estudiante.css">
<!--<script src="./Scripts/inscripcion-1.js"></script>
-->
<script type="text/javascript" src="./Scripts/jquery.min.js" charset="utf-8"></script>

<script type="text/javascript">

$(document).ready(function(){
iniciodeInscripcion();
clicInscripcion();

//clicPrograma();
});//fin .ready

function iniciodeInscripcion(){
var f = new Date();
document.getElementById('fecha').value=f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
document.getElementById('contenedor-balloon').style.visibility="hidden";//oculta los alert en globo
document.getElementById('group-row').style.visibility="hidden";//oculta el formulario inferior
document.getElementById('divRepPassword').style.visibility="hidden";//oculta el div de repetir pasword
//document.getElementById('inscripciones').style.visibility="hidden";
document.getElementById('box_inscripciones').style.visibility="hidden";//oculta la caja de cursos incritos
document.getElementById('btn-continuar').style.visibility="visible";//oculta la caja de cursos incritos

	
	}

function clicInscripcion(){
	$("#inscripciones").change(function(){
	$("#inscripciones option:selected").each(function() {
	
        id_=$(this).val();
		 nombre_curso=$(this).text();
		 document.getElementById('la_id').innerHTML=id_;
		/// si se selecciona Inscribir nuevo curso, se pone en enviar el boton grabar
		// si no se selecciona el Inscribir nuevo Curso, se pone en actualizar el boton grabar
var cantidad=document.getElementById("inscripciones").length;		
if(nombre_curso=="Inscribir un Nuevo Curso"){
			if(cantidad<4){
			document.getElementById("btngrabar").innerHTML ="Enviar";//cambiar el nombre del boton grabar a Actualizar
			document.getElementById('la_mensaje').innerHTML="Estado de nueva inscripcion  <i class='fa fa-user-plus'></i>";
			}//else if(cantidad<4)
			else{
			alert("Solo se Permiten 3 cursos inscritos");	
				}//fin if(cantidad<4)

}else{
						document.getElementById("btngrabar").innerHTML ="Actualizar";//cambiar el nombre del boton grabar a Actualizar
			document.getElementById('la_mensaje').innerHTML="Estado de actualizacion";

}//fin if(nombre_curso==
		  //alert(id_);
  traerDatosEstudiante(id_);//retorna los datos del estudiante por el id del estudiante segun la opcion seleccionada

		////
		
		//alert(id_+"--"+nombre_curso)
		 ///solo se consulta en la tabbla estudiante por estos dos parametros
  });//fin .each
  		$("#programa option:contains("+nombre_curso+")").prop("selected","selected"); //select por texto
		//document.getElementById("btngrabar").innerHTML ="Actualizar";//cambiar el nombre del boton grabar a Actualizar
		//	document.getElementById('la_mensaje').innerHTML="Estado de actualizacion";
	})//fin .change
	
	}

function clicPrograma(){
	$("#programa").change(function(){//al seleccionar un estudio en el combo programas
		document.getElementById("btngrabar").innerHTML ="Enviar";//cambiar el nombre del boton grabar a Actualizar
			document.getElementById('la_mensaje').innerHTML="Estado de nueva inscripcion";
	$("#programa option:selected").each(function() {
		id_=$(this).val();
		var nombre_curso=$(this).text();
//hacemos una iteracion en el combo de programas incritos por el estudiante, para saber si ya registro el estudio que selecciono
	$("#inscripciones > option").each(function() {
	
if(this.text===nombre_curso){
	//si encuentra el programa ya inscrito, el boton enviar cambia a Actualizar.
		document.getElementById("btngrabar").innerHTML ="Actualizar";//cambiar el nombre del boton grabar a Actualizar
		document.getElementById('la_id').innerHTML=$(this).val();
			document.getElementById('la_mensaje').innerHTML="Estado de actualizacion";

	}//fin f(this.text===nombre_curso)
});//fin $("#inscripciones > option").each
        
		
		 ///solo se consulta en la tabbla estudiante por estos dos parametros
//traerDatosEstudiante(id_);
    });//fin .each
	})//fin .change
	}

function traerDatosEstudiante(id_estudiante_){
//	document.getElementById('inscripciones').style.visibility="hidden";
//alert(id_+"--");
var response="";
//var id_= document.getElementById('la_id').innerHTML;

        var parametros={
		"ejecutar":"get_DatosEstudiante",
		"id_estudiante":id_estudiante_
		
		/*"programa": programa_ */
        };
			$.ajax({
			data: parametros,
			url:"./manager/manager_inscripcion.php",
			type:"post",
			beforeSend: function(){
				//$("#resultado").html("Procesando, espere por favor");
				},
			success: function (resultado){
				$("#balloon").html("");
				//alert(" Proceso terminado "+ response);
				Json_response= JSON.parse(resultado);
				//document.getElementById('la_mensaje').innerHTML=result;
				console.log("resultado "+Json_response[0].jornada);
					//console.log("result"+responsee)
document.getElementById('fecha').value=Json_response[0].fecha_inscripcion;
if(Json_response[0].jornada==="Mañana"){$("#jornada1").prop('checked','checked'); }
if(Json_response[0].jornada==="Tarde"){$("#jornada2").prop('checked','checked');}
if(Json_response[0].jornada==="Noche"){ $("#jornada3").prop('checked','checked');}
if(Json_response[0].jornada==="Sabados"){$("#jornada4").prop('checked','checked');}
	/**/

			
				}//fin success: function
				
			});//fin ajax
	}//fin function existe documento
//clic en el boton consultar
function Exist_Estudio(){
//	document.getElementById('inscripciones').style.visibility="hidden";
var response="";
var documento_ = document.getElementById('documento').value;
var password_ = document.getElementById('password').value;
/*var programa_ = document.getElementById('programa').value;*/
		//alert("entro "+editando);
        var parametros={
		"ejecutar":"verificar_documentoyPassword",
		"documento":documento_,
		"password":password_
		/*"programa": programa_ */
        };
			$.ajax({
			data: parametros,
			url:"./manager/manager_inscripcion.php",
			type:"post",
			beforeSend: function(){
				//$("#resultado").html("Procesando, espere por favor");
				},
			success: function (resulta){
				$("#balloon").html("");
				//alert(" Proceso terminado "+ response);
				responsee= JSON.parse(resulta);
				//document.getElementById('la_mensaje').innerHTML=result;
				//console.log("result"+resulta);
				//	console.log("result"+responsee)
	/*document.getElementById('contenedor-balloon').style.visibility="hidden";
	document.getElementById('group-row').style.visibility="hidden";*/

if(responsee['$errMensaje']=="Login Correcto"){
		document.getElementById('divRepPassword').style.visibility="hidden";

	document.getElementById('la_mensaje').innerHTML=responsee['$errMensaje']+"  <i class='fa checkGood fa-check'></i>";
	document.getElementById("btngrabar").innerHTML ="Actualizar";//cambiar el nombre del boton grabar a Actualizar
	document.getElementById('btn-continuar').style.visibility="hidden";
document.getElementById('group-row').style.visibility="visible";
llenar_campos(responsee);
llenarComboProgramas(documento_);

	}
	
if(responsee['$errMensaje']=="Nueva Inscripción"){
		document.getElementById('divRepPassword').style.visibility="visible";

	document.getElementById('contenedor-balloon').style.visibility="hidden";
	document.getElementById('box_inscripciones').style.visibility="hidden";
		document.getElementById('la_mensaje').innerHTML=responsee['$errMensaje']+"  <i class='fa iconnewInscripcion fa-user-plus'></i>";
		document.getElementById('group-row').style.visibility="visible";
		document.getElementById("btngrabar").innerHTML ="Enviar";//cambiar el nombre del boton grabar a Actualizar
	document.getElementById('btn-continuar').style.visibility="visible";
		document.getElementById('la_password').innerHTML="Digite una Contraeña";
campos_enBlaco(responsee);
	}
if(responsee['$errMensaje']=="Digite la contraseña"){
	
	document.getElementById('divRepPassword').style.visibility="hidden";
	document.getElementById('contenedor-balloon').style.visibility="hidden";
	document.getElementById('box_inscripciones').style.visibility="hidden";
			document.getElementById('group-row').style.visibility="hidden";
			document.getElementById('group-row').style.visibility="hidden";
				document.getElementById('la_password').innerHTML="Digite su contraeña";
		document.getElementById('la_mensaje').innerHTML=responsee['$errMensaje']+" <i class='fa checkBad fa-eye'></i>";
campos_enBlaco(responsee);
	}
if(responsee['$errMensaje']=="No ha digitado informacion"){
	document.getElementById('la_password').innerHTML="Digite una Contraeña";
	document.getElementById('btn-continuar').style.visibility="visible";
	document.getElementById('box_inscripciones').style.visibility="hidden";
	/*document.getElementById('divRepPassword').style.visibility="hidden";
	document.getElementById('contenedor-balloon').style.visibility="hidden";
	
			document.getElementById('group-row').style.visibility="hidden";
				document.getElementById('btn-continuar').style.visibility="visible";*/
		document.getElementById('la_mensaje').innerHTML=responsee['$errMensaje']+" <i class='fa checkBad fa-eye'></i>";
campos_enBlaco(responsee);
	}
if(responsee['$errAlert']=='hay_error'){
//alert("hay errores");
	document.getElementById('group-row').style.visibility="hidden";
Object.keys(responsee).forEach(function(key) {;
					console.log("objecto= "+key);
		document.getElementById('contenedor-balloon').style.visibility="visible";
		if(key!="$errAlert" & key!="$errMensaje"){
		document.getElementById("balloon").innerHTML += ('<i class="arbol fa fa-thumb-tack fa-lg"></i> '+responsee[key]+"</br>");
		}
					
			
});//fin Object.keys

	}//fin if(responsee['$errMensaje']=="Compruebe su contraseña")
				
			if(responsee['$errdocumento']){document.getElementById('documento').style.background="rgba(251,161,172,0.32)";documento_=responsee['$errdocumento'];
			}else{document.getElementById('documento').style.background="rgba(202,244,243,0.3)";
				document.getElementById('contenedor-balloon').style.visibility="hidden"
				}
		
				
				}//fin success: function
				
			});//fin ajax
	}//fin function existe documento	
function llenarComboProgramas(documento_){
	//document.getElementById('inscripciones').style.visibility="visible";
		document.getElementById('box_inscripciones').style.visibility="visible";

	var documento_=	document.getElementById('documento').value;
	 var parametros={
		"ejecutar":"programas_inscritos",
		"documento":documento_
	        };
		$.ajax({
			type:"POST",
			data: parametros,
			url:"./manager/manager_inscripcion.php",
			dataType: 'html',
			beforeSend: function(){

				},
			success: function (resp){
				//cursos= JSON.parse(resp);
				$("#inscripciones").html(resp);
				//console.log("programas inscritos= " +resp);
	//$("#inscripciones option:first").attr('selected','selected');
  	//	$("#programa option:contains(Ingles)").prop("selected","selected"); //select por texto

//////////// inicio change

	$("#inscripciones option:selected").each(function() {
	id_=$(this).val();
	var nombre_curso=$(this).text();
	  		$("#programa option:contains("+nombre_curso+")").prop("selected","selected"); //select por texto

 });//fin .each


////////////// fin change

				}//fin succes
			
			});	//fin ajjax
	
	}//fin 	llenarComboProgramas
	
function campos_enBlaco(){

//	document.getElementById('la_mensaje').text("");
document.getElementById('password').value="";
document.getElementById('rep_password').value="";
document.getElementById('programa').value="";
document.getElementById('ciudad').value="";
document.getElementById('fecha').value="";
var f = new Date();
document.getElementById('fecha').value=f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();

$(".la_mensaje").val("");
document.getElementById('nombre').value="";
document.getElementById('edad').value="";
//document.getElementById('sexo').value="";
document.getElementById('lugarNacido').value="";
document.getElementById('fechaNacido').value="";
//alert (fecha_nacido_);
document.getElementById('direccion').value="";
document.getElementById('email').value="";
document.getElementById('telFijo').value="";
document.getElementById('telCelular').value="";
document.getElementById('empresa').value="";
document.getElementById('cargo').value="";
document.getElementById('dirEmpresa').value="";
document.getElementById('telEmpresa').value="";
//document.getElementById('la_mensaje').innerHTML="Digita tu documento de identidad y una contraseña para iniciar tu Formulario de Inscripción  <i class='fa iconnewInscripcion fa-user-plus'></i>";

	}//fin function campos_enBlaco()

function llenar_campos(response){

document.getElementById('programa').value=response[0].programa;
document.getElementById('ciudad').value=response[0].ciudad;
document.getElementById('fecha').value=response[0].fecha_inscripcion;
document.getElementById('la_id').innerHTML=response[0].id_estudiante;

if(response[0].jornada==="Mañana"){$("#jornada1").prop('checked','checked'); }
if(response[0].jornada==="Tarde"){$("#jornada2").prop('checked','checked');}
if(response[0].jornada==="Noche"){ $("#jornada3").prop('checked','checked');}
if(response[0].jornada==="Sabados"){$("#jornada4").prop('checked','checked');}


document.getElementById('nombre').value=response[0].nombre;
document.getElementById('edad').value=response[0].edad;

		if(response[0].sexo=="Hombre"){	$("#sexo1").attr('checked',true);}
		if(response[0].sexo=="Mujer"){	$("#sexo2").attr('checked',true);}
		if(response[0].sexo=="Otro"){	$("#sexo3").attr('checked',true);}

document.getElementById('lugarNacido').value=response[0].lugar_nacido;
document.getElementById('fechaNacido').value=response[0].fecha_nacido;
//alert (fecha_nacido_);
document.getElementById('direccion').value=response[0].direccion;
document.getElementById('email').value=response[0].email;
document.getElementById('telFijo').value=response[0].telefono_fijo;
document.getElementById('telCelular').value=response[0].telefono_Cel;
document.getElementById('empresa').value=response[0].empresa;
document.getElementById('cargo').value=response[0].cargo;
document.getElementById('dirEmpresa').value=response[0].direccion_empresa;
document.getElementById('telEmpresa').value=response[0].telefono_empresa;

	}//fin function llenar_campos(response)

function grabar(){
	var fecha_="";
	//alert("entro");
var response=[];
var id_estudiante_= document.getElementById('la_id').innerHTML;
var documento_ = document.getElementById('documento').value;
var password_ = document.getElementById('password').value;
var rep_password_ = document.getElementById('rep_password').value;

var programa_ = document.getElementById('programa').value;
//alert(programa_);
var ciudad_ = document.getElementById('ciudad').value;
var fecha_ = document.getElementById('fecha').value;
var jornada_ = $(".jornada:checked").val();
var nombre_ = document.getElementById('nombre').value;
var edad_ = document.getElementById('edad').value;
var sexo_ = $(".sexo:checked").val();
var lugar_nacido_ = document.getElementById('lugarNacido').value;
var fecha_nacido_ = document.getElementById('fechaNacido').value;
var direccion_ = document.getElementById('direccion').value;
var email_ = document.getElementById('email').value;
var telefono_fijo_ = document.getElementById('telFijo').value;
var telefono_Cel_ = document.getElementById('telCelular').value;
var empresa_ = document.getElementById('empresa').value;
var cargo_ = document.getElementById('cargo').value;
var direccion_empresa_ = document.getElementById('dirEmpresa').value;
var telefono_empresa_ = document.getElementById('telEmpresa').value;
var documento_estudiante_="";//id_estudiante de programa inscrito tomado del listbox Tus inscripciones
var nombre_curso_="";//curso seleccionado tomado del listbox Tus inscripciones

//alert("entro en grabar " +boton);
var accion=document.getElementById("btngrabar").innerHTML;

//tomamos el valor grabar o actualizar, para obtener el estado del programa incrito que se modificara

/*if(accion=="Actualizar"){
$("#inscripciones option:selected").each(function() {
	
    id_estudio_=$(this).val();
	nombre_curso_=$(this).text();
		//alert(id_estudio+"--"+nombre_curso)
		 });//fin .each
}//fin if(accion="actualizarw")*/

//nota la accin la trae el boton enviar con los valores enviar y actualizar
        var parametros={
"id_estudiante":id_estudiante_,			
/*"id_estudio":	id_estudio_,
"carrera":nombre_curso_,*/
"ejecutar":accion,
"fecha_inscripcion":fecha_,
"documento":documento_,
"password":password_,
"rep_password":rep_password_,
"programa": programa_ ,
"jornada":jornada_ ,
"nombre":nombre_ ,
"edad":edad_ ,
"sexo": sexo_ ,
"ciudad": ciudad_,
"lugar_nacido":lugar_nacido_,
"fecha_nacido": fecha_nacido_ ,
"direccion": direccion_ ,
"email": email_ ,
"telefono_fijo":telefono_fijo_ ,
"telefono_Cel":telefono_Cel_ ,
"empresa": empresa_ ,
"cargo":cargo_ ,
"direccion_empresa": direccion_empresa_ ,
"telefono_empresa": telefono_empresa_ 
			};
			
		$.ajax({
			data: parametros,
			url:"./manager/manager_inscripcion.php",
			type:"post",
			beforeSend: function(){
				$("#baloon").html("Procesando, espere por favor");
				
				},
			success: function (result){
				$("#balloon").html("");
				//alert(" Proceso terminado "+ result);
			response= JSON.parse(result);
			console.log(result);
				if(response['$errMensaje']=="actualizar"){
	document.getElementById('la_mensaje').innerHTML="Operación de Actualización exitosa<i class='fa checkGood fa-check'></i>";
				document.getElementById('contenedor-balloon').style.visibility="hidden";
				//Exist_Estudio();
			}
			
				else if(response['$errMensaje']=="grabar"){
	document.getElementById('la_mensaje').innerHTML="Operación de Nueva inscripción exitosa<i class='fa checkGood fa-check'></i>";
			document.getElementById('contenedor-balloon').style.visibility="hidden";	
			//Exist_Estudio();
			}else{
							document.getElementById('contenedor-balloon').style.visibility="visible";	
document.getElementById('la_mensaje').innerHTML="";
			}

	
		
				
		<!--errores y mensajes-->
if(response['$errdocumento']){document.getElementById('documento').style.background="rgba(251,161,172,0.32)";documento_=response['$errdocumento'];}else{document.getElementById('documento').style.background="rgba(202,244,243,0.3)";}

if(response['$errpassword']){document.getElementById('password').style.background="rgba(251,161,172,0.32)";password_=response['$errpassword'];}else{document.getElementById('password').style.background="rgba(202,244,243,0.3)";}

if(response['$errRep_password']){document.getElementById('rep_password').style.background="rgba(251,161,172,0.32)";rep_password_=response['$errRep_password'];}else{document.getElementById('rep_password').style.background="rgba(202,244,243,0.3)";}


if(response['$errciudad']){document.getElementById('ciudad').style.background="rgba(251,161,172,0.32)";ciudad_=response['$errciudad'];}else{document.getElementById('ciudad').style.background="rgba(202,244,243,0.3)";}

if(response['$errnombre']){document.getElementById('nombre').style.background="rgba(251,161,172,0.32)";nombre_=response['$errnombre'];}else{document.getElementById('nombre').style.background="rgba(202,244,243,0.3)";}

if(response['$errprograma']){document.getElementById('programa').style.background="rgba(251,161,172,0.32)";programa_=response['$errprograma'];}else{document.getElementById('programa').style.background="rgba(202,244,243,0.3)";}

if(response['$erredad']){document.getElementById('edad').style.background="rgba(251,161,172,0.32)";edad_=response['$erredad'];}else{document.getElementById('edad').style.background="rgba(202,244,243,0.3)";}

if(response['$errlugar_nacido']){document.getElementById('lugarNacido').style.background="rgba(251,161,172,0.32)";lugar_nacido_=response['$errlugar_nacido'];}else{document.getElementById('lugarNacido').style.background="rgba(202,244,243,0.3)";}

if(response['$errfecha_nacido']){document.getElementById('fechaNacido').style.background="rgba(251,161,172,0.32)";fecha_nacido_=response['$errfecha_nacido'];}else{document.getElementById('fechaNacido').style.background="rgba(202,244,243,0.3)";}

if(response['$errdireccion']){document.getElementById('direccion').style.background="rgba(251,161,172,0.32)";direccion_=response['$errdireccion'];}else{document.getElementById('direccion').style.background="rgba(202,244,243,0.3)";}

if(response['$erremail']){document.getElementById('email').style.background="rgba(251,161,172,0.32)";email_=response['$erremail'];}else{document.getElementById('email').style.background="rgba(202,244,243,0.3)";}

if(response['$errtelFijo']){document.getElementById('telFijo').style.background="rgba(251,161,172,0.32)";telFijo_=response['$errtelFijo'];}else{document.getElementById('telFijo').style.background="rgba(202,244,243,0.3)";}

if(response['$errtelefono_Cel']){document.getElementById('telCelular').style.background="rgba(251,161,172,0.32)";telefono_Cel_=response['$errtelefono_Cel'];}else{document.getElementById('telCelular').style.background="rgba(202,244,243,0.3)";}

if(response['$errtelefono_empresa']){document.getElementById('telEmpresa').style.background="rgba(251,161,172,0.32)";telefono_empresa_=response['$errtelefono_empresa'];}else{document.getElementById('telEmpresa').style.background="rgba(202,244,243,0.3)";}
/**/
Object.keys(response).forEach(function(key) {
document.getElementById("balloon").innerHTML += ('<i class="arbol fa fa-thumb-tack fa-lg"></i> '+response[key]+"</br>");
});//fin Object.keys

 
    <!--fin errores y mensajes-->
				}//fin succes ajax
				
			});//fin ajax

	}//fin function grabar()

function nuevo(){
	location.reload(true)
/*iniciodeInscripcion();
campos_enBlaco()*/;
	}
	
function Boton_Obtener_html(){
var html= document.getElementById('container').innerHTML;
alert(html);
}

function html_to_pdf(){ //lo activas con un OnClick
	var html= document.getElementById('html_body').innerHTML;
	//alert(html);
location.href="./reportes/print_pdf.php?html="+ html + "&ejecutar=Boton_prueba" ,'_blank';
}


function generapdf(){ //lo activas con un OnClick
	var documento_= document.getElementById('documento').value;
	var id_estudiante_= document.getElementById('la_id').innerHTML;
	if(id_estudiante_!=""){
	//alert(html);
location.href="./reportes/reporte_inscripcion.php?documento="+ documento_+"&id_estudiante="+id_estudiante_ ;
}
}//fin function generapdf

</script>
<?php
$get_datos=array();

include_once RUTA_MANAGER. "manager_inscripcion.php";
?>
<div id="container" class="container">
<div class="container-fluid">
		
<div  id="html_body" class="formBox">
 <form method="post">

    <!--fila-->
 <div class="titulo_inscripcion"> 
  <center>
    <label class="la_titulo"> <h3> CORPORACIÓN EDUCATIVA DE FORMACIÓN INTEGRAL DEL CARIBE  (CEFICC)</h3>           
<!--RESOLUCION N° 01-235 (2013) SECRETARIA DE EDUCACION DE BOLIVAR </br>
RESOLUCION 46-79 SECRETARIA DE EDUCACION DISTRITAL DE CARTAGENA DE INDIAS</br>
RESOLUCION 10099 SECRETARIA DE EDUCACION DISTRITAL DE CARTAGENA DE INDIAS</br>
                        PERSONERIA JURIDICA GOBERNACION DE BOLIVAR N° 1119 DEL 2008 </br>
NIT 806014830-1 DE 2003</br>-->
FORMACION PARA EL TRABAJO Y EL DESARROLLO HUMANO</br>
CARTAGENA – COLOMBIA
<h3>FORMULARIO UNICO DE INSCRIPCION</h3>

</label> </center>
           
      
      
        </div> <!--fin fila-->
           <div id="eresultado">
              </div>


<!--fin_fila-->
<!--Globo mensaje-->
 <div class="contenedor-balloon" id="contenedor-balloon">
 <div class="balloon" id="balloon" >
    </div> 
    <div class="triangulo-balloon" >
      </div> 
      </div> 


<!--fin_globo mensaje-->
<!--GRUPO DE FILAS PASSWORD
  <div class="group-row-pass" id="group-row-pass" >-->
 <fieldset  class="group-row-pass" id="group-row-pass">
 <legend class="leyenda_mensaje" id="leyenda_mensaje"><label class="la_mensaje" id="la_mensaje">Digita tu documento de identidad y una contraseña para iniciar tu Formulario de Inscripción  <i class='fa iconnewInscripcion fa-user-plus'></i></label> </legend>
<!--fila-->
<div class="row">
   <div class="col-sm-5 izq">        
 <i class="fa icon-asterisco fa-asterisk"></i>

</span><label class="la_documento">Numero de Documento:</label> 
 <input  class="documento" type="text" id="documento" name="documento"  onkeyup="Exist_Estudio();return false;"><!--// return false Evitar ejecutar el submit del formulario.-->
  <div>

<i class="fa icon-asterisco fa-asterisk"></i><label class="la_password" id="la_password">Digite una Contraseña:</label> 
<input  class="password" type="password" id="password" name="password" value="" ><!---->
 </div>
<div class="divPepPassword" id="divRepPassword">
 <i class="fa icon-asterisco fa-asterisk"></i><label class="la_rep_password" id="la_rep_password">Repita la Contraseña:</label> 
        <input  class="rep_password" type="password" id="rep_password" name="rep_password" value="" >
</div><!--fin repPassword-->
  </div>
       <div class="col-sm-5" id="box_inscripciones">  
     <!--   <fieldset  class="fieldset_inscripciones" id="box_inscripciones" >inicio fieldset-->
  <legend class="Leyenda_inscripciones"> Tus inscripciones:</legend>        
  <select class="inscripciones" name="inscripciones" id="inscripciones" title="modificar o agregar otro curso a un estudiante ya inscrito" multiple="multiple" href="javascript:;" >
  <option value="" disabled selected>Tus inscripciones</option>
  
 <?php foreach ($errores as $key => $value) { ?>
<!--<option  value="<?php echo $value['id']; ?>"><?php echo $value['programa']; ?></option>
--><?php

 }

?>
 <option value="" disabled selected>Tus inscripciones</option>
   </select>
   <!--  </fieldset><label class="la_mensaje" id="2la_mensaje"></label> fin fieldset-->
     </div> <!--fin_fila-->

      <div class="col-sm-2 der">
      <button type="button" class="btn btn-success btn-continuar" title="Permite continuar la incripción" id="btn-continuar"	href="javascript:;" 	onClick="Exist_Estudio();return false;">Continuar</button>
     
      </div>   <label class="la_id" id="la_id" style="display:none" ></label><!--style="display:none"-->

 </div><!--fin_fila-->

 
 </fieldset>
<!-- </div>FIN GRUPO DE FILAS PASSWORD--> 


<!--GRUPO DE FILAS OCULTAS-->
  <div class="group-row" id="group-row">
<!--fila-->
<div class="row ">
 <div class="col-sm-6 izq">

                  <i class="fa icon-asterisco fa-asterisk"></i>  <label class="la_programa">Estudio Seleccionado:</label>   

        <select class="programa" name="programa" id="programa" href="javascript:;" >
    <option value="" disabled selected>Seleccione un Programa</option>
   
      <?php foreach ($comboProgramas as $key => $value) { ?>
<option><?php echo $value['nombrePrograma']; ?></option>
<?php }
?>
   </select> 
 
  
   
   
</div>
   <div class="col-sm-6 der">        
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
<input  class="nombre" type="text" id="nombre" name="nombre"  value="sobeyda"  >
        
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
<button type="button" class="btn btn-success"  id="btngrabar" title="permite registrar y/o actualizar la inscripcion de estudiante"	href="javascript:;" 	onClick="grabar();return false;">Enviar</button>
<button type="button" class="btn btn-success"  id="btnNuevo" title="permite la incripcion de un nuevo estudiante"	href="javascript:;" 	onClick="nuevo();">Nueva Inscripción</button>
<button type="button" class="btn btn-success"  id="btnNuevo" title=""	href="javascript:;" 	onClick="generapdf();">Generar Pdf</button>




 
		</div>
        
        </div>
<!--FIN GRUPO DE FILAS OCULTAS-->
 </form> 
 </div> 
</div>
</div>/*cierra div container*/
