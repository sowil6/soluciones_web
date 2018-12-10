<!doctype html>
<html><!-- InstanceBegin template="/Templates/PlantillaUnaColumna.dwt.php" codeOutsideHTMLIsLocked="false" --><head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>CEFIC</title>
<!-- InstanceEndEditable -->
  <?php include(RUTA_INCLUDE."head_include.php")?>
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
<script type="text/javascript">
/*$(document).ready(function () {
	  $('#del').click(function () {
		 alert("delete");
             });
			 
			 })*/
			 
 
  function irFuncion(id) {
        $.ajax({
            type:'POST', //aqui puede ser igual get
            url: './modelo/Personas_modelo.php',//aqui va tu direccion donde esta tu funcion php
            data: {condicion: "delete",id:id},//aqui tus datos
            success:function(resultado){
                //lo que devuelve tu archivo mifuncion.php
				 // imprime "resultado Funcion"
				 alert(resultado);
  
           },
           error:function(resultado){
            //lo que devuelve si falla tu archivo mifuncion.php
           }
         });
    }

		 
			  </script>
  <article class="contentUnaColumna">
  <link rel="stylesheet" type="text/css" href="./Styles/hoja.css">
       <h1>Lista de Registros de Tabla de nombres</h1><br>
        
        
        <form action="./modelo/Personas_modelo.php" method="post">

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Email</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      
    </tr> 
   
    
    <?php
        
        require_once ("./modelo/Paginacion.php");
    
	foreach ($registros as $persona):
    if($persona->nombre!=""){
		?>
   	<tr>
            
        <td><?php echo $persona->id?></td>
        <td><?php echo $persona->nombre ?></td>
        <td><?php echo $persona->apellido ?></td>
        <td><?php echo $persona->email ?></td>
    
      
      <!--Creamos una etiqueta que inserte una URL al boton y le pasaremos como parametro el dato id que corresponda a su 
      base de registro -->

      <td class="bot"><a href="">
              <input type='button' name='del' id='del' value='Borrar' onclick="irFuncion(<?php echo $persona->id?>);"></a></td>
      <td class='bot'><a href="./modelo/editar.php?id=<?php echo $persona->id?> 
                         & nombre=<?php echo $persona->nombre?> 
                         & apellido=<?php echo $persona->apellido?> 
                         & email=<?php echo $persona->email?>">
                         <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>  
    
    <?php
    }
    endforeach;
    ?>

	<tr>
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name='Ema' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='crv' id='crv' value='Insertar' " ></td></tr>    
  </table>
</form>
        <?php

        echo"<br>";
        echo "<table class='Ta_pag'>";

        for ($contador=1;$contador<=$total_paginas;$contador++){

            echo "<td class='Td_pag'>";
            echo "  <a href='?pagina=" . $contador . "'>" . $contador . "</a>  ";
            echo "</td>";

        }
        echo"</table>";

?>

  
  </article>
  <!-- InstanceEndEditable --><!-- end .content -->

  <footer>
     <?php include(RUTA_INCLUDE."footer.php")?>
     </footer>
 </div> <!-- end .container -->
 
</body>
<!-- InstanceEnd --></html>