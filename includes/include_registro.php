	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="./Styles/cssLogin.css"></head>
    <script type="text/javascript" src="./Scripts/jquery.min.js" charset="utf-8"></script>


	<script type="text/javascript">
  $(document).ready(function() {
//	alert("si");

   	$('#registrar').click(function(){
//alert("si");
var email=$('#email').val();
var username=$('#username').val();
var pass=$('#pass').val();
var rpass=$('#rpass').val();
if($.trim(username).length> 0&& $.trim(pass).length> 0 && $.trim(email).length> 0&& $.trim(rpass).length> 0){
//alert(username+"----"+email+"----"+pass+"----"+rpass);
//alert("entro en grabar " +titu);

//alert("entro en grabar " +boton);
        var parametros={
		"email": email,
		"username": username,
		"pass": pass,
		"rpass": rpass
	       		};
		$.ajax({
			data: parametros,
			url:"./modelo/serverLogin.php",
			type:"POST",
			cache:false,
			beforeSend: function(){
				$("#resultado").html("Espere por favor");
				},
			success: function (response){
				$("#resultado").html(" Proceso terminado");
				//alert(" Proceso terminado");
				}
				
			});

	}

  });  
});

    </script>
<div class="registro">
	<div class="header">
		<h2>Registro</h2>
	</div>
	
	<form method="post" action="registro">

		<?php include('./includes/errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" id="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" id="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="pass" name="pass" id="pass" value="1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="rpass" name="rpass"  id="rpass" value="1">
		</div>
         <div class="input-group">
         <select class="DropDownList" name="rol_option"  id="IDopcion" href="javascript:;" onChange="index.init();return false;" >
<!--     <option value="" disabled selected>Seleccione un Item para Editar su contenido</option>
-->  <option value="1">1. Invitado</option>
     <option value="2">2. Administrador</option>
     <option value="3">3. Administrativo</option>
     <option value="4">4. Funcionario</option>
     <option value="5">5. Estudiante</option>
     
     <option value="6">6. Secretaria</option>
     <option value="7">7. Coordinador</option>
     <option value="8">8. Comite</option>
     <option value="9">9. Digitador</option>

   </select><span>
			Tienes una Cuenta? <a href="login">Ingresa Aquí</a>
		</span>
        </div>
        
        
        
		<div class="input-group">
			<button type="submit" id="registrar2"  class="btn" name="reg_user">Register</button>
			<button type="submit" id="registrar2"  class="btn" name="reg_New">Nuevo</button>
		</div>
		
       <!-- <div id="resultado">Resultado: <span id="resultado"> 0</span></div>-->
	</form>

</div>