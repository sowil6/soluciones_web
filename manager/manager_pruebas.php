<?php
echo "entro php";
include_once("./modelo/Conectar.php");
$db = Conectar::conexion();

 // realizamos la consulta para obtener el mayor id insertado
  $sql = "SELECT MAX(codigoNoticia) FROM table_noticia";
  $query = $db->prepare($sql);
  $query->execute();
  $row = $query->fetchColumn();
 echo $row+1;
  // imprimimos el valor obtenido, en este caso el mayor id insertado en una tabla

/*echo '<script language="javascript">alert("Hola en modelo '.$row.'");</script>';*/

$resultado=$row;
return $resultado;
?>