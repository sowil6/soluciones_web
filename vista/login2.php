<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="./Styles/CSSLogin.css" type="text/css" />
<script src="/https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>

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
                    <a href="inicio.php">ir a Inicio</a>
                </td>
            </tr>
        </table>
        

    </div>
       </form>


<?php
if(isset($_POST['btn1'])){
            $expresion = @"[^\w]";
            $password=$_POST['Password'];
            $userName=$_POST['userName'];
            if ($password != ""||$userName!="")//si no esta en blanco y es nombre continua
                { 
                if (validarSQLInjection($password, $expresion)&validarSQLInjection($userName, $expresion))//Si el caracter es valido continua
                    {echo "<br>";
                 echo 'se digito dato valido'. "\n";
              
                    iniciarsesion($userName,$password);
                
                    }else{
            echo "<br>";
                 echo 'se digito dato INvalido'. "\n";
                
                         }
            }else{
                    header('Location:index.php');echo "<br>";
                    echo 'datos vacios'. "\n";
                }
          
           
}


 function validarSQLInjection($dato, $expresion) {
     if(preg_match($expresion,$dato))
  {
    return true;
  }
  return false;

        }
                
        function  iniciarsesion($usar, $pass){
            try{
                 if (boolVerificarLogin($usar, $pass))
                {echo "<br>";
                     echo 'nombre de usuario y contraseña correctos'. "\n";
//                     header('Location:index.php');
                }else{
                    echo "<br>";
                     echo 'nombre de usuario y contraseña INcorrectos'. "\n";
                    
                }
            } catch (Exception $e){
                
                echo $e;
            }
            
        }
        
        function boolVerificarLogin($usar, $pass){
       include 'conexion.php';
       echo "<br>$usar, $pass";
       echo "<br>select * from usuarios where nombre='" .$usar. "' and password ='".$pass."'";
            
       $resultado= mysqli_query($conexion, "select * from usuarios where nombre='" .$usar . "' and password ='".$pass."'");
          while ($consulta= mysqli_fetch_array($resultado)){
               echo "este es el nombre ".$consulta['nombre'];
               echo "<br>verdadero";
              return true;
              
            }
           
            include 'close_conexion.php'; // include("close_conexion.php");
            
        }

?>