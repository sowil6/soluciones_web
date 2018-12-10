<!doctype html>
<html><!-- InstanceBegin template="/Templates/PlantillaUnaColumna.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">
<?php include(RUTA_INCLUDE."head_include.php")?>
<!-- InstanceBeginEditable name="doctitle" -->
<!-- InstanceEndEditable -->
  
<!--<link href="../Styles/bootstrapCSS/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../Scripts/jquery-css-transform.js" type="text/javascript"></script>-->
 


<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>
<div class="tpl-snow">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<body expr:class=';"loading" + data:blog.mobileClass';>
<div class="containerCeficc">
  <header>
  
  <?php include(RUTA_INCLUDE."cabecera.php")?>
   </header>

  <!-- InstanceBeginEditable name="EditRegionUnaColumna" -->
 
	
	
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->

<link href="./Styles/cssTextEditor.css" rel="stylesheet" type="text/css" /><!--Estas dos link solo funcionan ubicnadolos aqui, permiten mostrar los botones del editor-->
 <link href="./Styles/jquery-te-1.4.0.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./Scripts/jquery.min.js" charset="utf-8"></script>
<script src="./Scripts/jquery-te-1.4.0.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="./Styles/bootstrap.min.css"> <!---->
<link rel="stylesheet" type="text/css" href="./Styles/cssNoticia.css">
  <script>
$(document).ready(function(){
  
/*$("#titulo").jqte({});
$(".intro").jqte({});
$(".contenido").jqte({});*/
 
$(".jqte_editor").on("paste", function(e) {
    e.preventDefault();
    var text =  e.originalEvent.clipboardData.getData('text');   
   // insert copied data @ the cursor location
   document.execCommand("insertText", false, text);
});
});
function nombreImagen(){
	var imgpath=document.getElementById("crs_imgPrevia").src;
var previwfilename=(imgpath.split("/")).pop()
var filename=previwfilename.replace(/%20/g, ' ');
return filename;	
	}

function grabar(cod, det, boton){

//$('.titulo').jqteVal("text that goes into editor"); //Setter
var accion;
var subtema;

var titu=$('.titulo').jqteVal();
var intro=$('.intro').jqteVal();
var conte=$('.contenido').jqteVal();
//alert("entro en grabar " +titu);

var valor7= document.getElementById('imgnombre').value;
var opt = document.getElementById('IDopcion').value;

var editando=	document.getElementById('subtemas').value;
	if(boton=="Grabar"){
		accion="grabar"; <!--uno es Grabar -->	
			
		}else{
			accion="actualizar"; <!--dos es actualizar -->			
			}
//alert("entro en grabar " +boton);
        var parametros={
		"cod": cod,
		"detCod": det,
		"titulo": titu,
		"intro": intro,
		"contenido": conte,
		"imagen": valor7,
		"ejecutar":accion,
		"option": opt,
		"subtema":editando
       		};
		$.ajax({
			data: parametros,
			url:"./manager/manager_noticia.php",
			type:"post",
			beforeSend: function(){
				$("#resultado").html("Procesando, espere por favor");
				
				},
			success: function (response){
				$("#resultado").html(" Proceso terminado");
			if(editando=="Subtemas"){opcionSelect();}else{TraerSubtemas();}
				console.log(response);
				}
				
			});

	}
   
function edit(codi){
	if(codi==null){
	codi=12;	
	}
		var opt = document.getElementById('IDopcion').value;
if(opt==2){

document.getElementById('subtemas').style.visibility="visible";
	}else{
		document.getElementById('subtemas').style.visibility="hidden";
		}
 //alert("edit*"+codi+"*");
//cn el codigo consultamos el registro en la base de datos y llenamos el formulario
var parametros={"ejecutar":"editar",
"cod":codi  };
			$.ajax({
			type:"POST",
			url:"./manager/manager_noticia.php",
			//dataType:'json',//se omite el tipo de datos y en el resultado se parsea con JSON.parse el resultado
			data:parametros,
			beforeSend: function(){
				$("#resultado").html("Espere por favor");
				},
			success: function (result){
				$("#resultado").html("Proceso exitoso");
			var response= JSON.parse(result);	
			console.log(response);

console.log(response[0].codigoNoticia);

document.getElementById("btngrabar").value ="Actualizar";//cambiar el nombre del boton grabar a Actualizar

document.getElementById("cod").value =response[0].codigoNoticia;
document.getElementById("detCod").value =response[0].codigoDetalleNoticia;

$('.titulo').jqteVal(response[0].tituloNoticia); //Setter



$('.intro').jqteVal(response[0].introduccion_Noticia); //Setter



$('.contenido').jqteVal(response[0].mensajeNoticia); //Setter


 var img = document.getElementById('crs_imgPrevia');
	img.src= "./Img/"+response[0].fotoNoticia;

document.getElementById('imgnombre').value=response[0].fotoNoticia;
document.getElementById('pagXML').value=response[0].xmlHojaNoticia;
document.getElementById('pagURL').value=response[0].urlPaginaNoticia;
/*
*/

		},
			fail: function(){
				$("#resultado").html("hubo un error");
				console.log("hubo un error");
				},	
			});
				//alert("opcion en el final");
	}

function nuevo(){
	//alert("entro");
	
	//alert("si");
	//opcion para evaluar si se esta agregndo subtemas o no
var editando=	document.getElementById('subtemas');
	if(editando.value=="Subtemas"){
		document.getElementById("cod").value="";	//solo si no esta editando, pone en blanco el valor del campo codigo
	document.getElementById("detCod").value = "";
	}	
	document.getElementById("btngrabar").value ="Grabar";//cambiar el nombre del boton grabar a Actualizar
	
	var img = document.getElementById('crs_imgPrevia');
	img.src = './ImgSistema/noHaSeleccionadoImagen.jpg';
	

		$('.titulo').jqteVal(""); //Setter
		$('.intro').jqteVal(""); //Setter
		$('.contenido').jqteVal(""); //Setter
	
	
/*	
	document.getElementById("option").value = "";
*/
 
	
		
	//actDesactivaJqte();
	}

function init() {
		//alert("en init");
	$(document).ready(function () {
		  HTMLfoto_OVideo = "<img id='crs_imgPrevia'  src='./ImgSistema/noHaSeleccionadoImagen.jpg' width='100%' height='100%' alt='' />";
  document.getElementById("demo").innerHTML = HTMLfoto_OVideo;
		});
		
		
  var inputFile = document.getElementById('foto');
  inputFile.addEventListener('change', mostrarImagen, false);
  
}

function mostrarImagen(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
  reader.onload = function(event) {
  HTMLfoto_OVideo = "<embed id='crs_imgPrevia' src='./ImgSistema/noHaSeleccionadoImagen.jpg' />";
  
  
  document.getElementById("demo").innerHTML = HTMLfoto_OVideo;
 var img = document.getElementById('crs_imgPrevia');
	img.src= event.target.result;
	uploadimagen();
  }
  reader.readAsDataURL(file);
}

function uploadimagen(){
	//alert("entro");
var parametros	= new FormData($("#formimagen")[0]);
$.ajax({
	data: parametros,
	url:"./manager/manager_noticia.php",
	type:"POST",
	contentType:false,
	processData:false,
	beforeSend: function(){
		//alert("no se enviaron los datos");
		console.log("no se enviaron los datos");
		},
		success: function(response){
document.getElementById('imgnombre').value=response;;
			console.log("*"+response+"*");
			//alert(response);
			}
	});	
	}
	
window.addEventListener('load', init, false);//lo utiliza mostrar imagen

function publicar(){
	var subtema;
	var codigoDetalle = document.getElementById('detCod').value;
	var editando=	document.getElementById('subtemas').value;

	
		var opt = document.getElementById('IDopcion').value;
		//alert("entro "+editando);
        var parametros={
		"ejecutar":"publicar",
		"detCod":codigoDetalle,
		"option": opt,
		"subtema":editando
        };
		$.ajax({
			data: parametros,
			url:"./manager/manager_noticia.php",
			type:"post",
			beforeSend: function(){
				//$("#resultado").html("Procesando, espere por favor");
				},
			success: function (response){
				$("#resultado").html(response+" termino");
				}
				
			});
	}
	
function opcionSelect() {
	//nuevo();
	//var cod = document.getElementById('cod').value;
	var opt = document.getElementById('IDopcion').value;
if(opt==2&&cod!=0){

document.getElementById('subtemas').style.visibility="visible";
	}else{
		document.getElementById('subtemas').style.visibility="hidden";
		}
var editando=	document.getElementById('subtemas').value;
	/*alert(opt);*/
	 var parametros={
		"ejecutar":"selectoption",
		"option": opt,
		"_criterio":'',
		"subtema":editando,
		"_page":1,
		"_regxpag":10
        };
		$.ajax({
			type:"POST",
			data: parametros,
			url:"./manager/manager_noticia.php",
			dataType: 'html',
			beforeSend: function(){
				$("#conctainer_datagrid").html("Procesando, espere por favor");
				},
			success: function (resp){
				$("#conctainer_datagrid").html(resp+" termino");
				console.log(resp);
				}
				 
				
			});
				//alert("opcion en el final");
	}
		
function editarSubtemas(){
	//UN AJAX QUE HACE UN SELECT AL GRID SUPERIOR
	//UN SEGUNDO AJAX EN LA FUNCION TRAER SUBTEMAS QUE MUESTRA EL SEGUNDO GRID
var subtema;	
document.getElementById("btngrabar").value ="Grabar";
document.getElementById('subtemas').style.visibility="visible";
var editando=	document.getElementById('subtemas');
	
	if(editando.value=="Subtemas"){ //si hace clic en el boton editar subtemas, se cambia el nombre de Terminar edicion
// y llena el primer GRID consultando por el codigo	
		document.getElementById('subtemas').value="Salir de Subtemas";
		
	var opt = document.getElementById('IDopcion').disabled=true;
subtema="si"
var opt = document.getElementById('IDopcion').value;
var cod = document.getElementById('cod').value;
var codigoDetalle= document.getElementById('detCod').value=cod;

//alert(codigoDetalle);
	/*alert(opt);*/
	 var parametros={
		"ejecutar":"selectoption",
		"option": opt,
		"cod":cod,
		"subtema":subtema,
		"_page":1,
		"_regxpag":10
        };
		$.ajax({
			type:"POST",
			data: parametros,
			url:"./manager/manager_noticia.php",
			dataType: 'html',
			beforeSend: function(){
				$("#conctainer_datagrid").html("Procesando, espere por favor");
				},
			success: function (resp){
				$("#conctainer_datagrid").html(resp+" termino");
				console.log(resp);
				/*if(opt==2){
				
				}*/
				TraerSubtemas();
				}
				 
				
			});	
		
		}else{
			//si otra vez presiono el boton Editar subtema
			document.getElementById('subtemas').value="Subtemas";//se le cambia el valor del nombre al boton
	 document.getElementById('IDopcion').disabled=false;
	 $("#divsubtemas_datagrid").html(" termino");
				opcionSelect();
			}
		
	

	}//fin editar subtemas
	
function TraerSubtemas(){
var codigoDetalle = document.getElementById('detCod').value;
	
var cod = document.getElementById('cod').value;
	/*alert(opt);*/
	var opt = document.getElementById('IDopcion').value;
	 var parametros={
		"ejecutar":"verGridSubtemas",
		"subtema":'si',
		"option": opt,
		"detCod":codigoDetalle,
		"_page":1,
		"_regxpag":10
        };
		$.ajax({
			type:"POST",
			data: parametros,
			url:"./manager/manager_noticia.php",
			dataType: 'html',
			beforeSend: function(){
				$("#divsubtemas_datagrid").html("Procesando, espere por favor");
				},
			success: function (resp){
				$("#divsubtemas_datagrid").html(resp+" termino");
				console.log(resp);
				}
			
			});	
		
	}//fin TraerSubtemas

function eliminar(){
var editando=	document.getElementById('subtemas').value;
var cod = document.getElementById('cod').value;
	 var parametros={
		"ejecutar":"eliminar",
		"subtema":editando,
		"cod":cod
	        };
		$.ajax({
			type:"POST",
			data: parametros,
			url:"./manager/manager_noticia.php",
			dataType: 'html',
			beforeSend: function(){
				$("#divsubtemas_datagrid").html("Procesando, espere por favor");
				},
			success: function (resp){
				$("#divsubtemas_datagrid").html(resp+" termino");
				nuevo();
if(editando=="Subtemas"){opcionSelect();}else{TraerSubtemas();}

				console.log(resp);
				}
			
			});	
		
	}//fin Eliminar


</script>




  <article class="contentUnaColumna">
    <form method="post" class="formimagen" name="formimagen" id="formimagen" enctype="multipart/form-data"  >

       <div class="DivContenedorNoticia">
     
<div id="divIzqEditorNoticia">
   <div class="divBotones">
      <input type="button" 	class="btn btn-success" href="javascript:;"		onClick="grabar($('#cod').val(),$('#detCod').val(),$('#btngrabar').val());return false;" value="Grabar" id="btngrabar"   />  
      <input type="button" 	class="btn btn-success" href="javascript:;" 	onClick="publicar();return false;" 		value="Publicar"/>   
      <button type="button" class="btn btn-danger" 	href="javascript:;" 	onClick="eliminar();return false;">Eliminar</button>
      <input type="button" 	class="btn btn-success" href="javascript:;" 	onClick="nuevo();return false;" 		value="Nuevo"/>
<!--      <input type="button" 	class="btn btn-success" href="javascript:;" 	onClick="edit();return false;" 			value="Edit"/>
-->      <input type="button" 	class="btn btn-success" href="javascript:;"		onClick="editarSubtemas();return false;"	id="subtemas"  value="Subtemas" style="visibility:hidden" />
	 <!-- <button class="status">Toggle jQTE</button>-->
   </div>
 <div class="div_noticias"> 
 <table class="TablaCitaInputUp">
 <tr>
 <td>
   <select class="DropDownListNoticias" name="option" id="IDopcion" href="javascript:;" onChange="opcionSelect();return false;" >
     <option value="" disabled selected>Seleccione un Item para Editar su contenido</option>
     <option value="1">1. Informativo</option>
     <option value="2">2. Menu Oferta Academica</option>
     <option value="4">4. Pagina Inicio Contenido Superior</option>
     <option value="5">5. Pagina Inicio Contenido Bajo</option>
     <option value="6">6. Pagina Institucional Mision</option>
     <option value="7">7. Pagina Institucional Vision</option>
     <option value="8">8. Pagina Institucional Valores</option>
     <option value="9">9. Pagina Institucional Principios</option>
     <option value="10">10. Pagina Institucional Sistema de Calidad</option>
    
   </select></td>
  <td>Codigo:
    <input  class="anchoControl" name="codname" value="0" id="cod" type="text"  style="width:50px" />
        Detalle Codigo:
        <input  class="anchoControl" name="detCod"  value="0" id="detCod" type="text" style="width:50px" />Resultado: <span id="resultado"> 0</span></td></tr>
  <tr>
    <td><div id="divImagenPrevia"> <span  id="demo" > No hay Imagen Seleccionada</span></div></td>
    <td>url:
   <input  type="text" id="pagURL" name="pagURL" style="width:40%">
   xml:
   <input  type="text" id="pagXML" name="pagXML" style="width:40%">Titulo:
      
      <textarea   rows="3" class="titulo"   name="titulo"  id="titulo"  ></textarea> 
      
      <input  type="hidden" id="HiddenTitulo">
  <input type="file"   id="foto"  name="foto" size="20" style="width:70%"> <input  type="text" id="imgnombre" name="paramfile" style="width:29%"></td>
  </tr>
 </table>
 Introduccion:
              <textarea  rows="3" class="intro"  name="intro" id="intro" ></textarea></td>
 
 Texto de Contenido:
              <textarea   rows="3" class="contenido"   name="contenido" id="contenido" ></textarea></td>
 </div> 
         </div>
       
        <div id="divDerEditorNoticia">
         <div id="conctainer_datagrid">Resultado: <span id="resultado"> 0</span></div>
         <div id="divsubtemas_datagrid">Resultado Subtemas: <span id="resultado"> 0</span></div>
        </div>
         </div>
</form> 
 
 
  </article>
   <!--  <script src="../Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>-->


 <script language="javascript" type="text/javascript">
 $("#titulo").jqte();
$(".intro").jqte();
$(".contenido").jqte();
<!-- $(".titulo").jqte({format: false});-->


/* $(document).ready(function(){
  $(".titulo").jqte({
        blur: function () {
        document.getElementById('HiddenTitulo').value = document.getElementById('titulo').value;    }
    });
 	});*/
 
/*$(".textEditorTitulo").jqte();
 

// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.titulo').jqte({"status" : jqteStatus})
	});*/

/*
   $(".textEditorIntroduccion").jqte({
        blur: function () {
        document.getElementById('HiddenTitulo2').value = document.getElementById('TexBoxTitulo').value;    }
    });*/

/*
    $(".textEditorContenidoNoticia").jqte({
        blur: function () {
        document.getElementById('HiddenTitulo3').value = document.getElementById('TexBoxTitulo').value;    }
    })
  */

</script>  

  <!-- InstanceEndEditable --><!-- end .content -->

  <footer>
     <?php include(RUTA_INCLUDE."footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>