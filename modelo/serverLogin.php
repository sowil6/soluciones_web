<?php 
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";/**/
		if (isset($_GET['ruta'])) {
		$ruta= $_GET['ruta'];
			//$ruta=substr($ruta, 0,-4);
		}
	// connect to database
	$bd_cfg = include RUTA_MODELO.'basedatos.php';
	$driver=$bd_cfg["driver"];
    $host=$bd_cfg["host"];
	$bduser=$bd_cfg["user"];
	$bdpass=$bd_cfg["pass"];
    $database=$bd_cfg["database"];
	$bd = mysqli_connect('localhost', $bduser, $bdpass, $database);
//NUEVO REGISTRO
if (isset($_POST['reg_new'])) {
header('location: registro');
}
//FIN NUEVO REGISTRO
	// REGISTER USER
if (isset($_POST['reg_user'])) {
/*echo '<script language="javascript">alert("Hola en modelo ");</script>';
*/
	/*echo '<script language="javascript">alert("Hola en modelo '.$cod.'");</script>';*/

	if (isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['rpass'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($bd, $_POST['username']);
		$email = mysqli_real_escape_string($bd, $_POST['email']);
		$pass = mysqli_real_escape_string($bd, $_POST['pass']);
		$rpass = mysqli_real_escape_string($bd, $_POST['rpass']);
		$nivel_acceso = mysqli_real_escape_string($bd, $_POST['rol_option']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($pass)) { array_push($errors, "Password is required"); }
		if (empty($nivel_acceso)) { array_push($errors, "nivel de acceso requerido"); }


		if ($pass != $rpass) {
			array_push($errors, "The two passwords do not match");
		}
		
//obtener el numero ultimo registro en la tabla		
$sqlMax="SELECT max(id) AS max_page FROM table_usuario";
$resMas=mysqli_query($bd, $sqlMax);
$idprevio=mysqli_fetch_array($resMas);
$id=$idprevio['max_page']+1;
//validar si el nombre de uusuario existe
$sql="select count(*) as cantidad from table_usuario where username='$username'";
$res=mysqli_query($bd, $sql);
$data=mysqli_fetch_array($res);
if($data["cantidad"]>0){
			array_push($errors, "El nombre de usuario ya existe");
	}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$pass = md5($rpass);//encrypt the password before saving in the database
			$query = "INSERT INTO table_usuario (id,username, nivel_acceso, email, password) 
					  VALUES('$id','$username', '$nivel_acceso','$email', '$pass')";
  			mysqli_query($bd, $query);
			$query ="insert into tabla_personamain (idPersona)  values ('$id')" ;
			mysqli_query($bd, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			
			array_push($errors, "Registro exitoso");
			/*header('location: registro');*/
		}

	}
}
	// FIN REGISTER USER... 
	
	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($bd, $_POST['username']);
		$password = mysqli_real_escape_string($bd, $_POST['password']);
		$username="maira lozano";
		$password = "1";
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {//inicio if (count($errors) == 0
	/*		
			
			$password = md5($password);
			$query = "SELECT * FROM table_usuario WHERE username='$username' AND password='$password'";
			$results = mysqli_query($bd, $query);
			
			
						if (mysqli_num_rows($results) == 1) {//inicio if (mysqli_num_rows
							$_SESSION['username'] = $username;
							$_SESSION['success'] = "You are now logged in";
								
										foreach  ($results as $fila){//recorremos los datos y utilizamos el ide para hacer una consulta en la tabla personamain y obtener el nombre
										$rol = $fila['nivel_acceso'];
										$_SESSION['nivel_acceso'] = $rol;
										}//cierra foreach
									
								
								//si la ruta no tiene enlace, solo toma el mombre de login.php
							//	echo $ruta;
								//die();
											if($ruta=="login.php"){echo "<script> window.location='.'</script>";
											}else{echo "<script> window.location='".$ruta."'</script>";}
							
						}else {
							array_push($errors, "Wrong username/password combination");
						}//fin if (mysqli_num_rows
						
			*/			
			//estas tres lineas con para prueba de login sin consultar a la base de datos
			$_SESSION['nivel_acceso'] = "1";
			$_SESSION['username'] = "maira lozano";
			echo "<script> window.location='.'</script>";			
			}//fin if (count($errors) == 0
	}
	

	

//CERRAR CESION
if (isset($_GET['logout'])) {
			session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['nivel_acceso']);
		$_SESSION['nivel_acceso']=1;
		//unset($_SESSION['success']);
		$ruta=substr($ruta, 0,-4);
//echo $ruta.$_SESSION['nivel_acceso'];
		//die();
	//echo "<script> window.location='".$ruta."'<script>";//se omite esta para que inicie por index y se oculte la opcion
    //Administrativo en la barra de menu
	echo "<script> window.location='.'</script>";//redirecciona a la pagina de inicio
		

	}
	
	
	
?>