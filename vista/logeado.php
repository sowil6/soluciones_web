   <?php  
if (!isset($_SESSION['username'])) {//las paguinas que requieran login, deben llevar este if
		$_SESSION['msg'] = "You must log in first";
		$ruta=substr($ruta, 0,-4);
		header('location: login?ruta='.$ruta);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="./Scripts/jquery.min.js" charset="utf-8"></script>
  <link rel="stylesheet" type="text/css" href="./Styles/bootstrap3.3.5.min.css"> <!---->

	<script type="text/javascript">



$(document).ready(function(){
	$("#inscripciones option:first").attr('selected','selected');
$("#inscripciones").change(function(){
	$("#inscripciones option:selected").each(function() {
	
        id_=$(this).val();
		 nombre_curso=$(this).text();
		
		
		//alert(id_+"--"+nombre_curso)
		 ///solo se consulta en la tabbla estudiante por estos dos parametros

    });//fin .each
	})//fin .change

})

function Exist_Estudio(){

//$("#inscripciones").change(function(){
	$("#inscripciones option:selected").each(function() {
	
        id_=$(this).val();
		 nombre_curso=$(this).text();
		// alert(id_+" --- ---- "+nombre_curso);
	
		
		//alert(id_+"--"+nombre_curso)
		 ///solo se consulta en la tabbla estudiante por estos dos parametros

    });//fin .each
	//})//fin .change
	//$("#inscripciones option:contains(Bajo)").prop("selected","selected");//select por valor
		$("#inscripciones option:contains(Bajo)").prop("selected","selected"); //select por texto

}

</script>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<!--fila-->

<body>
<div class="row">
	<div class="col-sm-5 der"> 
 		  <select class="inscripciones" name="inscripciones" id="inscripciones" href="javascript:;" >
     <option value="" disabled selected>Seleccione un Item para Editar su contenido</option>
     <option value="1">Informativo</option>
     <option value="2">Academica</option>
     <option value="4">Superior</option>
     <option value="5">Bajo</option>
     <option value="6">Convenios</option>
     <option value="7">Mision</option>
     <option value="8">Vision</option>
     <option value="9">Valores</option>
     <option value="10">Principios</option>
     <option value="11">Calidad</option>
   </select>
    </div>
 <div class="col-sm-2 der">
      <button type="button" class="btn btn-success btn-continuar"  id="btn-continuar"	href="javascript:;" 	onClick="Exist_Estudio();return false;">Continuar</button>
     
      </div>


   </div><!--fin_fila-->
		
</body>
</html>