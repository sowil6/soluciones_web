<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>


<?php

    //Primero incluimos el archivo Conectar.php.
    require_once "../modelo/Conectar.php"; 

    //Al ser un metodo statico llamamos directamente a la clase sin instanciar y obtemos la conexion.
    $base = Conectar::conexion();

    if (!isset($_POST["bot_actualizar"])){
        
        $id = $_GET["id"];
        $nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];
        $email = $_GET["email"];
   
    }else{
   
        
        $ide = $_POST["id"];
        $nom = $_POST["nom"];
        $ape = $_POST["ape"];
        $ema = $_POST["ema"];
        
        $sql = "UPDATE usuarios SET nombre=:miNom, apellido=:apelli, email=:emai WHERE id=:miID";
        $Consulta = $base->prepare($sql);
	    $Consulta->execute(array(":miID"=>$ide,":miNom"=>$nom,":apelli"=>$ape,":emai"=>$ema));

        header("Location:../vista/Personas_vista.php");

    }
       
?>

<p>
 
</p>
<p>&nbsp;</p>

<!-- Esta linea de condigo action="?php echo $_SERVER['PHP_SELF']; ?" lo que hace es redirigir la pagina otra vez a la misma y recargarla.-->
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      
          <!-- Utilizando el type="hidden" creamos un cuadro de texto oculto que luego pasaremos como dato de formulario-->
          <input type="hidden" name="id" id="id" value="<?php echo $id?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
          <input type="text" name="nom" id="nom" value="<?php echo $nombre?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
          <input type="text" name="ape" id="ape" value="<?php echo $apellido?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
          <input type="text" name="ema" id="ema" value="<?php echo $email?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>


</body>
</html>