    <?php
            //Incluimos los archivos  llama al modelo   
            require_once "./modelo/Personas_modelo.php";
            
            //Instanciamos la clase Personas_modelo.
            $persona= new Personas_modelo();
                        
            //Almacenamos en nuestra variable matriz.... el contenido devuelto por el metodo get_Personas().
            $matrizPersonas = $persona->get_Personas();

            //Llama a la vista
            require_once "./vista/Personas_vista.php";
        
        
        ?>