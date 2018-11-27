<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
 <form  class="form-group" method="POST" id="form1" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="divlogin" >
            <table class="table-group">
            <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
            </tr>
            <tr>
                <td><label for="nombre">Nombre de Usuario</label></td>
                <td>
                    <div class= "div-group">
        
                        <input type="text" name="userName" value="Antonio" class="form-control" id="userName">
    </div>
                </td>
            </tr>
            <tr>
                <td><label for="nombre">Contraseña</label></td>
                <td>
                    <div class= "div-group">
        
                        <input type="text" name="Password"  value="60f796a446e6577892b3cb1886d2a29e4c41226e" class="form-control" id="Password">
    </div>
                </td>
            </tr>
            <tr>
                <td>
                  <center>
        <input type="submit" value="Iniciar sesion" class="btn btn-success" name="btn1"> 
    </center>   </td>
                <td>
                    <br />
                    <asp:Label ID="lblError" runat="server"></asp:Label>
                    <label for="lblError" id="lblError">..</label>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <a href="index.php">ir a Inicio</a>
                </td>
            </tr>
        </table>
        

    </div>
       </form>
</body>
</html>


<?php
//Incluimos los archivos  llama al modelo   
require_once "../manager/hash.php";
			
/* private const int SALT_SIZE = 16;
private const int HASH_ITERATIONS = 50;*/
if(isset($_POST['btn1'])){
	
$hash = new hash;
$hash->password = 'password123';
$hash->createHash();
echo $hash->salt."\n";
echo $hash->hash."\n";
}
/*?>
<?php

// validate a password
$hash->password = 'password123';
$hash->salt = 'cBePBbLWqYzqoxnigbX+uTGHY98AEhMR';
$hash->hash = 'A392DhczIMXkUk0u8cFy2cUSPUgMTdK7';
if( $hash->isValid( ) )
{
    echo "Valid password\n";
}
else
{
    echo "Invalid password\n";
}
?>
*/