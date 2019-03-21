   <?php  
if (!isset($_SESSION['username'])) {//las paguinas que requieran login, deben llevar este if
		$_SESSION['msg'] = "You must log in first";
		$ruta=substr($ruta, 0,-4);
		header('location: login?ruta='.$ruta);
	}
 ?>
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
<!--<div class="tpl-snow">
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
--><body expr:class=';"loading" + data:blog.mobileClass';>
<div class="containerCeficc">
  <header>
  
  <?php include(RUTA_INCLUDE."cabecera.php")?>
   </header>

  <!-- InstanceBeginEditable name="EditRegionUnaColumna" -->
 
	
	
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->




<script src="./Scripts/jquery-ui/external/jquery/jquery.js"></script>

<link href="./Styles/cssTextEditor.css" rel="stylesheet" type="text/css" /><!--Estas dos link solo funcionan ubicnadolos aqui, permiten mostrar los botones del editor-->
 <link href="./Styles/jquery-te-1.4.0.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./Scripts/jquery.min.js" charset="utf-8"></script>
<script src="./Scripts/jquery-te-1.4.0.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="./Styles/bootstrap3.3.5.min.css"> <!---->
<link rel="stylesheet" type="text/css" href="./Styles/cssNoticia.css">
 <script src="./Scripts/index.js"></script>
  <!-- Latest compiled and minified CSS bootstrap/3.3.2/css/bootstrap.min.css por web carga los iconos glyphicosn-->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
   <!-- 
        Optional theme 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
-->
   <script> index.init();

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
   <select class="DropDownListNoticias" name="option" id="IDopcion" href="javascript:;" onChange="index.init();return false;" >
     <option value="" disabled selected>Seleccione un Item para Editar su contenido</option>
     <option value="1">1. Informativo</option>
     <option value="2">2. Menu Oferta Academica</option>
     <option value="4">4. Pagina Inicio Contenido Superior</option>
     <option value="5">5. Pagina Inicio Contenido Bajo</option>
     <option value="6">6. Pagina Inicio Contenido Convenios</option>
     <option value="7">7. Pagina Institucional Mision</option>
     <option value="8">8. Pagina Institucional Vision</option>
     <option value="9">9. Pagina Institucional Valores</option>
     <option value="10">10. Pagina Institucional Principios</option>
     <option value="11">11. Pagina Institucional Sistema de Calidad</option>
     
    
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
  <div class="row"><!-- inicio fila -->
  
   <div class="col-sm-8"><!-- inicio col-sm 1 -->
  <input type="file"   id="foto"  name="foto" size="20" style="width:70%">
  <input  type="text" id="imgnombre" name="paramfile" style="width:29%">
  
  </div><!-- fin col-sm 1-->
  
<div class="col-sm-2"><!-- inicio col-sm 2 -->
posision:<input  type="text" id="posicion" name="posision" style="width:80%">

  </div><!-- fin col-sm 2 -->
  </div><!-- fin fila -->
  
  
  </td>
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