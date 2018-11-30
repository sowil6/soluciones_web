  <?php
  
  
 class Conectar{
	 
	
	private $host = 'localhost';
    private $port = '3306';
    private $user = 'root';
    private $pass = '';
    private $motor = 'mysql';
    private $dbname = 'bdcefic';
	  	
		
         public static function conexion() {
			/* echo '<script language="javascript">alert("En Conectar exito");</script>'; */
try{
//		 $con = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->dbname; original
		 $conexion =  new PDO('mysql:host=localhost; dbname=bdcefic', 'root','');
                    
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $conexion->exec("SET CHARACTER SET utf8");
		/*echo '<script language="javascript">alert("En Conectar exito2");</script>'; */
			return $conexion;
		   }
		   catch (Exception $ex)
		    {
                    echo '<script language="javascript">alert("error de conexion '.$ex->getMessage().'");</script>'; 
                    echo "Error:  ". $ex->getFile();
                    echo"<br>";
                  echo "En la Linea: " . $ex->getLine();
      }
 }
}
        
        
        ?>
