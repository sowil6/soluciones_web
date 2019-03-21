<?php 
//session_start(); 
 //$rol=0;
//echo "session start()";

if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in firstsa";
		//$ruta=substr($ruta, 0,-4);
	 $_SESSION['nivel_acceso']=1;
	}


//if (isset($_SESSION['username'])) {
	// $rol=$_SESSION['nivel_acceso'];
	//$ruta=substr($ruta, 0,-4);

	/*//INICIO GET MENU
		$menu = get_menu($rol);
				// Flag para el acceso
							$acceso = false;
						
							foreach ( $menu as $link){
								
							  if ( $link == $ruta)
							  {
								$acceso = true;
								echo 	"--".$link."= --la ruta=".$ruta."--</br>";
								echo '</br>'.$rol."</br>".$ruta;
								header("location:".$ruta);
								echo "<script> window.location='sin_acceso'</script>";
							  }
							}
							
							if (!$acceso){
							 
							 echo "<script> window.location='./'</script>";	
							 die('ingreso a </br>'.$rol."</br>".$ruta);					
							}
							
					// FIN GET MENU*/


//}

/*	function get_menu($rol){
/* 		1. Invitado
     	2. Administrador
     	3. Administrativo
     	4. Funcionario
     	5. Estudiante
     	6. Secretaria
     	7. Coordinador
     	8. Comite
     	9. Digitador*/
/*  $menu = array();

  // O haces un swith
if ( $rol == 0 )
  {
    $menu = array( '','/', 'institucional', 'oferta', 'sin_acceso','inicio');
  }

  if ( $rol == 1 )
  {
    $menu = array('','./', 'institucional', 'oferta', 'sin_acceso','inicio');
  }

  if ( $rol === 2 )
  {
     $menu = array( 'registro', 'noticia', 'logeado', 'sin_acceso');
  }
  return $menu; 
  }
*/



	/*if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ./");
	
	}*/

	class include_session{
//getRol se llama desde la cabecera.php linea 219
	public function getRol($rolNum){
switch($rolNum){
			case 1:
				$nombreNivel="Invitado";
			break;
			case 2:
				$nombreNivel="Administrador";
			break;
			case 3:
				$nombreNivel="Administrativo";
			break;
			case 4:
				$nombreNivel="Funcionario";
			break;
			case 5:
				$nombreNivel="Estudiante";
			break;
			case 6:
				$nombreNivel="Secretaria";
			break;
			case 7:
				$nombreNivel="Coordinador";
			break;
			case 8:
				$nombreNivel="Comite";
			break;
			case 9:
				$nombreNivel="Digitador";
			break;
			return $nombreNivel;
			}		
       return $nombreNivel;
	}
		
		}//fin class include_session


?>