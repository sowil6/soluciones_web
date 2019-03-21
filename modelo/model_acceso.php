
   <?php 
class model_acceso{
//controla el acceso de los usuarios a las paginas	
public function getRol(){
	
	}
public function getData($rol,$ruta){


 if($ruta='logeado.php' && $rol='sowil6@gmail.com'||$rol='sowil6@gmail'){

header('location:'. $ruta);
}//fin if
else{
	
	//header('location: login');	
	}
	 
		

    }//fin function getData


	}//fin class manager acceso
?>