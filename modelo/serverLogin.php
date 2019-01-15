<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";/**/

	// connect to database
	/**/
	$bd_cfg = require_once './modelo/basedatos.php';
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

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($pass)) { array_push($errors, "Password is required"); }

		if ($pass != $rpass) {
			array_push($errors, "The two passwords do not match");
		}
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
			$query = "INSERT INTO table_usuario (username, acceso, password) 
					  VALUES('$username', '$email', '$pass')";
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

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM table_usuario WHERE username='$username' AND password='$password'";
			$results = mysqli_query($bd, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: logeado');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>