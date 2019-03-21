
		
		

/////////////////MODULO DEL ARCHIVO PHP
<script type="text/javascript">
function consultaEstudiante(documento_){//en uso
	
	//document.getElementById('inscripciones').style.visibility="visible";
	var documento_=	document.getElementById('documento').value;
	//alert(documento_);
	 var parametros={
		"ejecutar":"consulta_inscritos",
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
				$("#consultaInscritos").html(resp);
				//console.log("programas inscritos= " +resp);
				//$("#inscripciones option:first").attr('selected','selected');
				}
			
			});	
	
	}//fin 	consultaEstudiante	
-->	
/*function llenarComboProgramas(){
	//document.getElementById('inscripciones').style.visibility="visible";
//alert("loa");
	 var parametros={
		"ejecutar":"ComboConsultar_programa"
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
				console.log("programas inscritos= " +resp);
				$("#inscripciones option:first").attr('selected','selected');
				}
			
			});	
	
	}//fin 	llenarComboProgramas
*/	
function consulta(dato){
	alert("sirve "+dato);
	console.log("sirve "+dato)
	}	
<!--function traerDatosEstudiante(id_){//en uso
	//alert("sirve "+id_);
//	document.getElementById('inscripciones').style.visibility="hidden";
var response="";
//var id_= document.getElementById('la_id').innerHTML;
var documento_ = document.getElementById('documento').value;
//alert("sirve "+id_);
/*var programa_ = document.getElementById('programa').value;*/
		//alert("entro "+editando);
        var parametros={
		"ejecutar":"consulta",
		"documento":documento_,
		"id":id_
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


//	document.getElementById('la_mensaje').innerHTML=responsee['$errMensaje'];
//	document.getElementById("btngrabar").innerHTML ="Actualizar";//cambiar el nombre del boton grabar a Actualizar
//	document.getElementById('btn-continuar').style.visibility="hidden";
//document.getElementById('group-row').style.visibility="visible";
campos_enBlaco();
llenar_campos(responsee);



	
				
				}//fin success: function
				
			});//fin ajax
	}//fin function existe documento
-->function campos_enBlaco(){

//	document.getElementById('la_mensaje').text("");

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
document.getElementById('telEmpresa').value="";/**/

	}//fin function campos_enBlaco()

function llenar_campos(response){

//document.getElementById('programa').value=response[0].programa;
document.getElementById('ciudad').value=response[0].ciudad;
document.getElementById('fecha').value=response[0].fecha_inscripcion;
var program=document.getElementById('programa').value=response[0].programa;
$("#programa option:contains("+program+")").prop("selected","selected"); //select por texto

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

	}//fin function llenar_campos(response)</script>


//////////////////FIN MODULO DEL ARCHIVO PHP


$(document).ready(function(){
	alert("entro");
iniciodeInscripcion();
clicInscripcion();

//clicPrograma();
});//fin .ready

function iniciodeInscripcion(){
var f = new Date();
document.getElementById('fecha').value=f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
document.getElementById('contenedor-balloon').style.visibility="hidden";//oculta los alert en globo
document.getElementById('group-row').style.visibility="hidden";//oculta el formulario inferior
{document.getElementById('divRepPassword').style.visibility="hidden";//oculta el div de repetir pasword
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

function traerDatosEstudiante(id_){
//	document.getElementById('inscripciones').style.visibility="hidden";
//alert(id_+"--");
var response="";
//var id_= document.getElementById('la_id').innerHTML;

        var parametros={
		"ejecutar":"get_DatosEstudiante",
		"id":id_
		
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
	//document.getElementById("btngrabar").innerHTML ="Actualizar";//cambiar el nombre del boton grabar a Actualizar
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
	document.getElementById('btn-continuar').style.visibility="hidden";
campos_enBlaco(responsee);
	}
if(responsee['$errMensaje']=="Compruebe su contraseña"){
	
	document.getElementById('divRepPassword').style.visibility="hidden";
	document.getElementById('contenedor-balloon').style.visibility="hidden";
	document.getElementById('box_inscripciones').style.visibility="hidden";
			document.getElementById('group-row').style.visibility="hidden";
				document.getElementById('btn-continuar').style.visibility="visible";
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

//document.getElementById('programa').value=response[0].programa;
document.getElementById('ciudad').value=response[0].ciudad;
document.getElementById('fecha').value=response[0].fecha_inscripcion;

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
var id_= document.getElementById('la_id').innerHTML;
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
"id":id_,			
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
			}
			
				else if(response['$errMensaje']=="grabar"){
	document.getElementById('la_mensaje').innerHTML="Operación de Nueva inscripción exitosa<i class='fa checkGood fa-check'></i>";
			document.getElementById('contenedor-balloon').style.visibility="hidden";	
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

/*PAGINA DE CONSULTA*/
function consultaEstudiante(documento_){//en uso
	
	//document.getElementById('inscripciones').style.visibility="visible";
	var documento_=	document.getElementById('documento').value;
	//alert(documento_);
	 var parametros={
		"ejecutar":"consulta_inscritos",
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
				$("#consultaInscritos").html(resp);//GENERA LA TABLA EN CONSULTA DE INSCRITOS
				//console.log("programas inscritos= " +resp);
				//$("#inscripciones option:first").attr('selected','selected');
				}
			
			});	
	
	}//fin 	consultaEstudiante	

function ConsultaDatosInscritos(id_){//en uso
	alert("sirve "+id_);
//	document.getElementById('inscripciones').style.visibility="hidden";
var response="";
//var id_= document.getElementById('la_id').innerHTML;
var documento_ = document.getElementById('documento').value;
//alert("sirve "+id_);
/*var programa_ = document.getElementById('programa').value;*/
		//alert("entro "+editando);
        var parametros={
		"ejecutar":"consulta",
		"documento":documento_,
		"id":id_
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


//	document.getElementById('la_mensaje').innerHTML=responsee['$errMensaje'];
//	document.getElementById("btngrabar").innerHTML ="Actualizar";//cambiar el nombre del boton grabar a Actualizar
//	document.getElementById('btn-continuar').style.visibility="hidden";
//document.getElementById('group-row').style.visibility="visible";
campos_enBlaco();
llenar_campos(responsee);



	
				
				}//fin success: function
				
			});//fin ajax
	}
	
