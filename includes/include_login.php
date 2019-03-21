
<!---->	<link rel="stylesheet" type="text/css" href="./Styles/cssLogin.css"></head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" >

		<?php include('./includes/errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" value="maira" name="username" autocomplete="off" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" value="1" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p><table border="1">
  <tbody>
    <tr>
      <td>usuario&nbsp;</td>
      <td>pass&nbsp;</td>
      <td>rol&nbsp;</td>
      <td>nombre_rol&nbsp;</td>
    </tr>
    <tr>
      <td>sowil&nbsp;</td>
      <td>1&nbsp;</td>
      <td> 1&nbsp;</td>
      <td>Invitado&nbsp;</td>
    </tr>
    <tr>
      <td>maira&nbsp;</td>
      <td>1 &nbsp;</td>
      <td>2&nbsp;</td>
      <td>Administrador&nbsp;</td>
    </tr>
    <tr>
      <td>judit &nbsp;</td>
      <td>1&nbsp;</td>
      <td>6&nbsp;</td>
      <td>Secretaria&nbsp;</td>
    </tr>
  </tbody>
</table>

           </br>
                  			No tienes una cuenta? <a href="registro">Registrese Aquí</a>
		</p>
	</form>
</body>
