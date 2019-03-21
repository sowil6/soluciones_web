$(document).ready(function(){
//	alert("entro");
iniciodeInscripcion();
clicInscripcion();

//clicPrograma();
});//fin .ready

function iniciodeInscripcion(){
var f = new Date();
if(document.getElementById('fecha')){document.getElementById('fecha').value=f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();}
if(document.getElementById('contenedor-balloon')){document.getElementById('contenedor-balloon').style.visibility="hidden";}//oculta los alert en globo
/*if(document.getElementById('group-row')){document.getElementById('group-row').style.visibility="hidden";}//oculta el formulario inferior
*/if(document.getElementById('divRepPassword')){document.getElementById('divRepPassword').style.visibility="hidden";}//oculta el div de repetir pasword
if(document.getElementById('box_inscripciones')){document.getElementById('box_inscripciones').style.visibility="hidden";}//oculta la caja de cursos incritos
if(document.getElementById('btn-continuar')){document.getElementById('btn-continuar').style.visibility="visible";}//oculta la caja de cursos incritos

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

//Boton que hace consulta y muestra la tabla
//consulta inscritos like por documento, nombre, programa, estado dele studiante, estado de certificacion
function Boton_consultaEstudiante(){
	var documento_=	document.getElementById('documento_consulta').value;
	var nombre_=	document.getElementById('nombre_consulta').value;
	var programa_ = document.getElementById('comboconsulta_inscripcion').value;
	var estado_estudiante_= document.getElementById('estado_estudiante_consulta').value;
	var estado_certificacion_= document.getElementById('estado_certificacion_consulta').value;

	
	//alert(programa_);
	 var parametros={
		"ejecutar":"consulta_inscritos",
		"documento":documento_,
		"nombre":nombre_,
		"programa":programa_,
		"estado_estudiante":estado_estudiante_,
		"estado_certificacion":estado_certificacion_
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

function Boton_ReporteConsultaPDF(){
	var documento_=	document.getElementById('documento_consulta').value;
	var nombre_=	document.getElementById('nombre_consulta').value;
	var programa_ = document.getElementById('comboconsulta_inscripcion').value;
	var estado_estudiante_= document.getElementById('estado_estudiante_consulta').value;
	var estado_certificacion_= document.getElementById('estado_certificacion_consulta').value;

	//alert(html);
location.href="./reportes/reporte_tablaConsultaInscritos.php?"+
"documento="+documento_+
"&nombre="+nombre_+
"&programa="+programa_+
"&estado_estudiante="+estado_estudiante_+
"&estado_certificacion="+estado_certificacion_+"; target='_blank'" ;

}//fin function Boton_ReporteConsultaPDF	

//consulta del ojito de la tabla
function ConsultaDatosInscritos(id_estudiante_, documento_){//en uso
//	alert("sirve "+id_estudiante_+"  ----"+documento_estudiante_);
document.getElementById('la_id').innerHTML=id_estudiante_;
document.getElementById("btngrabar").innerHTML ="Actualizar";//cambiar el nombre del boton grabar a Actualizar

var response="";

//var documento_ = document.getElementById('documento').value;
//alert("sirve "+id_);
/*var programa_ = document.getElementById('programa').value;*/
		//alert("entro "+editando);
        var parametros={
		"ejecutar":"consulta",
		"documento":documento_,
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
			success: function (resulta){
				$("#balloon").html("");
				//alert(" Proceso terminado "+ response);
				responsee= JSON.parse(resulta);
				//document.getElementById('la_mensaje').innerHTML=result;
				//console.log("result"+resulta);
					console.log("result "+resulta)
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
	
function campos_enBlaco(){

//	document.getElementById('la_mensaje').text("");
if(document.getElementById('password')){document.getElementById('password').value="";}
if(document.getElementById('rep_password')){document.getElementById('rep_password').value="";}
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
if(response[0].ciudad){document.getElementById('ciudad').value=response[0].ciudad;}
if(response[0].documentoIdentidad){document.getElementById('documento').value=response[0].documentoIdentidad;}
if(response[0].fecha_inscripcion){document.getElementById('fecha').value=response[0].fecha_inscripcion;}
if(response[0].programa){var program=document.getElementById('programa').value=response[0].programa;
$("#programa option:contains("+program+")").prop("selected","selected"); //select por texto
}


if(response[0].jornada==="Mañana"){$("#jornada1").prop('checked','checked'); }
if(response[0].jornada==="Tarde"){$("#jornada2").prop('checked','checked');}
if(response[0].jornada==="Noche"){ $("#jornada3").prop('checked','checked');}
if(response[0].jornada==="Sabados"){$("#jornada4").prop('checked','checked');}



if(response[0].nombre){document.getElementById('nombre').value=response[0].nombre;}
if(response[0].edad){document.getElementById('edad').value=response[0].edad;}

		if(response[0].sexo=="Hombre"){	$("#sexo1").attr('checked',true);}
		if(response[0].sexo=="Mujer"){	$("#sexo2").attr('checked',true);}
		if(response[0].sexo=="Otro"){	$("#sexo3").attr('checked',true);}

if(response[0].lugar_nacido){document.getElementById('lugarNacido').value=response[0].lugar_nacido;}
if(response[0].fecha_nacido){document.getElementById('fechaNacido').value=response[0].fecha_nacido;}
//alert (fecha_nacido_);
if(response[0].direccion){document.getElementById('direccion').value=response[0].direccion;}
if(response[0].email){document.getElementById('email').value=response[0].email;}
if(response[0].telefono_fijo){document.getElementById('telFijo').value=response[0].telefono_fijo;}
if(response[0].telefono_Cel){document.getElementById('telCelular').value=response[0].telefono_Cel;}
if(response[0].empresa){document.getElementById('empresa').value=response[0].empresa;}
if(response[0].cargo){document.getElementById('cargo').value=response[0].cargo;}
if(response[0].direccion_empresa){document.getElementById('dirEmpresa').value=response[0].direccion_empresa;}
if(response[0].telefono_empresa){document.getElementById('telEmpresa').value=response[0].telefono_empresa;}

if(response[0].estado_estudiante){document.getElementById('estado_estudiante').value=response[0].estado_estudiante;}
if(response[0].observacion){document.getElementById('observacion').value=response[0].observacion;}

if(response[0].estado_certificacion){document.getElementById('estado_certificacion').value=response[0].estado_certificacion;}
if(response[0].fecha_certificacion){document.getElementById('fecha_certificacion').value=response[0].fecha_certificacion;}





	}//fin function llenar_campos(response)</script>

function grabar(){

	//alert("entro");
var fecha_="";
var response=[];
var documento_="";
var password_ ="";
var rep_password_ ="";
var estado_estudiante_="";
var observacion_ ="";
var estado_certificacion_="";
var fecha_certificacion_ ="";
var id_estudiante_= document.getElementById('la_id').innerHTML;
 if(document.getElementById('documento')){documento_=document.getElementById('documento').value;}
 if(document.getElementById('password')){password_ =document.getElementById('password').value;}
 if(document.getElementById('rep_password')){rep_password_ =document.getElementById('rep_password').value;}

var programa_ = document.getElementById('programa').value;
//alert(programa_);
var ciudad_ = document.getElementById('ciudad').value;
fecha_ = document.getElementById('fecha').value;
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
var accion=document.getElementById("btngrabar").innerHTML;

if(document.getElementById('estado_estudiante')){estado_estudiante_= document.getElementById('estado_estudiante').value;}
if(document.getElementById("observacion")){observacion_ = document.getElementById("observacion").value;}

if(document.getElementById('estado_certificacion')){estado_certificacion_= document.getElementById('estado_certificacion').value;}
if(document.getElementById("fecha_certificacion")){fecha_certificacion_ = document.getElementById("fecha_certificacion").value;}

//alert(estado_estudiante_+" -- "+fecha_certificacion_);
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
"telefono_empresa": telefono_empresa_ , 
"estado_estudiante": estado_estudiante_ ,
"observacion": observacion_ ,
"estado_certificacion": estado_certificacion_ ,
"fecha_certificacion": fecha_certificacion_ 
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
			console.log("resultado "+result+response);
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
	Boton_consultaEstudiante();//actualiza la tabla de incritos
	
		
				
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

function Eliminar(id_estudiante, documento_estudiante , documento_){
//alert(id_+"-----"+id_estudiante_+"   ----  "+documento_);
/*var documento_="";
var id_= document.getElementById('la_id').innerHTML;
if(document.getElementById('documento')){documento_=document.getElementById('documento').value;}
 */

	 var parametros={
		"ejecutar":"eliminar",
		"documento_estudiante":documento_estudiante_,
		"documento":documento_,
		"id_estudiante":id_estudiante_
	        };
		$.ajax({
			type:"POST",
			data: parametros,
			url:"./manager/manager_inscripcion.php",
			dataType: 'html',
			beforeSend: function(){
				//$("#divsubtemas_datagrid").html("Procesando, espere por favor");
				},
			success: function (resp){
		responsee= JSON.parse(resp);
			
Boton_consultaEstudiante();
	//	console.log(resp);
	if(responsee['$errMensaje']=="Se elimino el registro con exito"){
	document.getElementById('la_mensaje').innerHTML=responsee['$errMensaje']+"  <i class='fa checkGood fa-check'></i>";
			}//fin if(responsee['$errMensaje']=
				}
			
			});	
		
	}//fin Eliminar


function Boton_Prueba(){
//alert("-entro----");
/*var documento_="";
var id_= document.getElementById('la_id').innerHTML;
if(document.getElementById('documento')){documento_=document.getElementById('documento').value;}
 */

	 var parametros={
		"ejecutar":"Boton_prueba"
		
	        };
		$.ajax({
			type:"POST",
			data: parametros,
			url:"./manager/manager_inscripcion.php",
			dataType: 'html',
			beforeSend: function(){
				//$("#divsubtemas_datagrid").html("Procesando, espere por favor");
				},
			success: function (resp){
		//responsee= JSON.parse(resp);
			

		console.log(resp);

				}
			
			});	
		
	}//fin Eliminar




function Boton_Prueba2(){
	var estado_estudiante_= document.getElementById('estado_estudiante').value;
alert(estado_estudiante_);
	}
	

function generapdf(){ //lo activas con un OnClick
	var documento_= document.getElementById('documento').value;
	var id_estudiante_= document.getElementById('la_id').innerHTML;
	if(id_estudiante_!=""){
	//alert(html);
location.href="./reportes/reporte_inscripcion.php?documento="+ documento_+"&id_estudiante="+id_estudiante_ ;
}
}//fin function generapdf