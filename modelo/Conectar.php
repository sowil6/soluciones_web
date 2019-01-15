  <?php
  
 class Conectar{
	 
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
       $bd_cfg = require_once './modelo/basedatos.php';
    	$driver=$bd_cfg["driver"];
        $host=$bd_cfg["host"];
        $user=$bd_cfg["user"];
        $pass=$bd_cfg["pass"];
        $database=$bd_cfg["database"];
        $charset=$bd_cfg["charset"];
   
    }

		
public function conexion() {
/*	 $bd_cfg = require_once './modelo/basedatos.php';
    	$this->driver=$bd_cfg["driver"];
        $this->host=$bd_cfg["host"];
        $this->user=$bd_cfg["user"];
        $this->pass=$bd_cfg["pass"];
        $this->database=$bd_cfg["database"];
        $this->charset=$bd_cfg["charset"];*/
try{
	
	 if($this->driver=="mysql" || $this->driver==null){
	 	 $conexion =  new PDO($this->driver.":dbname=".$this->database, $this->user, $this->pass);
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
