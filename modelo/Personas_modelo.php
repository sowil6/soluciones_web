<?php  
  // verificas que si llegue el parámetro que le estas enviando
 if(isset($_REQUEST["condicion"])){
  // si llega la condicion, y es igual a la condicion que necesitas para entrar ejecuta la función y devuelve el resultado
  if($_REQUEST["condicion"] == "delete" ){
	 
     echo delete($_REQUEST["id"]);
     // salimos de la pagina php y devolvemos la respuesta
     exit();
  }else if($_REQUEST["condicion"] == "add" ){
	echo insertar($_REQUEST["persona"]);

	   exit();
	  }
  else{
     echo "otra funcion o respuesta";
     // salimos de la pagina php y devolvemos la respuesta
     exit();
  }
 }

 if (isset($_POST["crv"])){
require_once "./modelo/Conectar.php"; 
 $base = Conectar::conexion();
               
			   
                $nombre = $_POST["Nom"];
                $apellido =$_POST["Ape"];
                $email = $_POST["Ema"];

                $sql = "INSERT INTO usuarios (Nombre,Apellido,Email) VALUES (:nom,:ape,:ema)";

                $Consulta = $base->prepare($sql);

                $Consulta->execute(array(":nom"=>$nombre,":ape"=>$apellido,":ema"=>$email));
header("Location:./vista/Personas_vista.php");
               
            }



 function delete($id){
	   
   
	  //Primero incluimos el archivo Conectar.php.
 echo "DELETE FROM usuarios WHERE id='$id'";      require_once "Conectar.php"; 
 
        //Al ser un metodo statico llamamos directamente a la clase sin instanciar y obtemos la conexion.
        $base = Conectar::conexion();
       
     /*     $id =$_GET["id"];*/
       
        $base->query("DELETE FROM usuarios WHERE id='$id'");
            
        header("Location:./index.php");
return $id." Eliminando registroon___";
 }
 
 
function insertar($persona){
     /*     $id =$_GET["id"];*/
       
return " Eliminando registroon___";
 }
  

 
 
 
?>

        <?php
        
            class Personas_modelo{
                
                private $db;        //En esta variable almacenaremos la conexion.
                
                private $personas; //En esta variable almacenaremos el registro de la tabla.
            
            
                public function Personas_modelo(){ //Constructor.
                    
                    //La sentencia require_once es idéntica a require excepto que PHP verificará si el archivo 
                    //ya ha sido incluido y si es así, no se incluye (require) de nuevo.
                    require_once("./modelo/Conectar.php");
                    
                    //Esta es la forma en la que conectamos con un metodo estatico, primero llamamos a la
                    //clase seguido de su metodo.
                    $this->db = Conectar::conexion();
                    
                    //Hacemos que la variable personas se un array.
                    $this->personas =  array();

                    
                }
                
                public function get_Personas(){
                    
                    //Creamos una consulta donde haremos una peticion de busqueda de toda la tabla datos_usuarios.
                    $consulta = $this->db->query("SELECT * FROM usuarios");
                    
                    //Creamos un bucle donde recorremos la consulta.
                    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
                        //Vamos almacenando en el array personas el contenido de $filas.
                        $this->personas[]=$filas;	
                    }

                    
                    //Devolvemos lo almacenado en el array personas;
                    return $this->personas;
                    
                }

                public function set_Personas(){
                    
                    //Creamos una consulta donde haremos una peticion de busqueda de toda la tabla datos_usuarios.
                    $consulta = $this->db->query("SELECT * FROM usuarios");
                    
                    //Creamos un bucle donde recorremos la consulta.
                    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
                        //Vamos almacenando en el array personas el contenido de $filas.
                        $this->personas[]=$filas;	
                    }
                    
                    //Devolvemos lo almacenado en el array personas;
                    return $this->personas;
                    
                }
            
            }
        
        
        ?>
    