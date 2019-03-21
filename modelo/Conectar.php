
  <?php
  
 class Conectar{
	 
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {


    }
	


		
public function conexion() {
	$bd_cfg = include ("basedatos.php");
	$driver=$bd_cfg["driver"];
    $host=$bd_cfg["host"];
	$bduser=$bd_cfg["user"];
	$bdpass=$bd_cfg["pass"];
    $database=$bd_cfg["database"];
try{
	
	 if($driver=="mysql" || $driver==null){
	 	 $conexion =  new PDO($driver.":dbname=".$database, $bduser, $bdpass);
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $conexion->exec("SET CHARACTER SET utf8");
}
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
