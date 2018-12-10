  <?php
  
  
 class Conectar{
	 
	/*private $user = 'root';
    private $pass = '';
	*/
	private $user = 'ceficce1';
    private $pass = 'cefic2018/';
	
	private $host = 'localhost';
    private $port = '3306';
    private $motor = 'mysql';
    private $dbname = 'ceficce1_bd2018';
	  	
		
         public static function conexion() {
		 $user = 'ceficce1';
    $passw = 'cefic2018/';
			/* echo '<script language="javascript">alert("En Conectar exito");</script>'; */
try{
//		 $con = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->dbname; original
	//	 $conexion =  new PDO('mysql:host=localhost; dbname=ceficce1_bd2018', 'root','');
	 	 $conexion =  new PDO('mysql:host=localhost; dbname=ceficce1_bd2018', $user, $passw);
                    
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $conexion->exec("SET CHARACTER SET utf8");
		/*echo '<script language="javascript">alert("En Conectar exito2");</script>'; */
			return $conexion;
		   }
		   catch (Exception $ex)
		    {
				 print "¡Error!: " . $ex->getMessage() . "<br/>";
    die();
                    echo '<script language="javascript">alert("error de conexion '.$ex->getMessage().'");</script>'; 
                    echo "Error:  ". $ex->getFile();
                    echo"<br>";
                  echo "En la Linea: " . $ex->getLine();
      }
 }
}
        
        
        ?>
