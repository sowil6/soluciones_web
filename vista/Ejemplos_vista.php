<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="./Styles/dataGrid.css" rel="stylesheet">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        
        <script src="./Scripts/jquery.min.js"></script>
 
        <script src="./Scripts/jquery-3.3.1.js"></script>
        <link rel="stylesheet" type="text/css" href="./Styles/css_Estudiante.css">
       <script>
       function prueba(){

        var parametros={
		"ejecutar":"publicar"
		
        };
		$.ajax({
			data: parametros,
			url:"./manager/manager_pruebas.php",
			type:"post",
			beforeSend: function(){
				$("#resultado").html("Procesando, espere por favor");
				},
			success: function (response){
				$("#resultado").html(response+" termino");
				}
				
			});
	}

       
       </script>
    </head>
    <body>
    '  <svg height="400" width="800">';
echo'   <polygon points="0,0 0,400 500,400 200,0"  />';
echo'   <p class="textoTituloSlide">'. $cancion->Titulo.' </p>' ;
echo'   <p class="TextoIntroSlide">'. $cancion->introduccionNoticia.'</p>' ;
echo'   <span class="TextoMensajeSlide">'. $cancion->mensajeNoticia.'</span>' ;
echo' </svg>';
        <button id="btnGrid" type="button">Datagrid</button>
      <input type="button" class="btn btn-success" href="javascript:;" onClick="prueba();return false;" value="Edit"/>

          <br><br>
        <div id="resultado">Resultado 0</div>
    </body>
    <script>
        index.init();
    </script>
</html>

