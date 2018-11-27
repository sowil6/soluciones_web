<?php
    
            
            //Primero incluimos el archivo Conectar.php.
            require_once("Conectar.php"); 

            //Al ser un metodo statico llamamos directamente a la clase sin instanciar y obtemos la conexion.
            $base = Conectar::conexion();

            $total_registros=3;
            
            $pagina=1;

            //Esto de aqui abajo es lo mismo que lo de arriba pero esta simplificado en 1 linea todo.    

            $SQL = "SELECT * FROM usuarios";
            $Con_pre = $base->prepare($SQL);
            $Con_pre->execute(array());
            $reg_total = $Con_pre->rowCount();
            $total_paginas = ceil($reg_total/$total_registros);

            if (isset($_GET["pagina"])){

                if ($_GET["pagina"]==1){

                   /* header("Location:index.php"); comentada por mi porque enviaba un error de encabezado header*/

                }  else {

                    $pagina = $_GET["pagina"];

                } 
                }else{
                    $pagina =  1; //Esta variable especifica en que estado se encuentra nuestra pagina.

                }

            $empezar_limit = ($pagina-1)*$total_registros;

$registros = $base->query("SELECT * FROM usuarios LIMIT $empezar_limit,$total_registros")->fetchAll(PDO::FETCH_OBJ);

            if (isset($_POST["crv"])){

                $nombre = $_POST["Nom"];
                $apellido =$_POST["Ape"];
                $email = $_POST["Ema"];

                $sql = "INSERT INTO usuarios (Nombre,Apellido,Email) VALUES (:nom,:ape,:ema)";

                $Consulta = $base->prepare($sql);

                $Consulta->execute(array(":nom"=>$nombre,":ape"=>$apellido,":ema"=>$email));

              /*  header("Location:index.php");*/
            }
    
 
    
    ?>