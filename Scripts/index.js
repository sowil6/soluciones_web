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
				//alert(" Proceso terminado");
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
var index_= function(){
	 /*metodos, propiedades privadas*/
    var _private = {};
    
    /*metodos, propiedades publicas*/
    var _public = {};
	  _public.init = function(){
    //  alert("entro");
            index.getDatagrid('',1,10,'');
     
    };
	
_public.getDatagrid = function(criterio,page,regxpag, pagUbicacion) {
	//  alert(regxpag);
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
		"subtema":editando,
		"_criterio":criterio,
		"_pagUbicacion":pagUbicacion,
		"_page":page,
		"_regxpag":regxpag, 
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
  return _public;
};
var index = new index_();
    _public.getDatagrids = function(criterio,page,regxpag){
        var datos = '&_criterio='+criterio+'&_page='+page+'&_regxpag='+regxpag;
        
        $.ajax({
            type: "POST",
            data: datos,
            url:"./manager/manager_noticia.php",
            dataType: 'html',
            success: function(result){
                $('#concainer_datagrid').html(result);
            }
        });
    };
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