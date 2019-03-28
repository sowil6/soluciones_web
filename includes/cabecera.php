<!-- <link href="./Styles/css_navidad.css" rel="stylesheet" type="text/css">
-->
<?php include_once(RUTA_INCLUDE.'include_session.php');?>
<?php 
function ValidaExtension($sExtension) {
            $resul;
            switch ($sExtension)
            {
                case "jpg":
                case "jpeg":
                case "png":
                case "gif":
                case "bmp":
                case "JPG":
                case "JPEG":
                case "PNG":
                case "GIF":
                case "BMP":
				case "pdf":
				case "PDF":
               $resul=TRUE;
				
                break;

                default:
                case "mp4":
                case "avi":
                case "wmv":
				$resul=FALSE;
                    break;
            }
return $resul;
        }?>	

<link href="./Styles/CSSEstiloGeneral.css" rel="stylesheet" type="text/css">
 <link href="./Styles/footer-distributed-with-address-and-phones.css" rel="stylesheet">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" > 
<link href="https://use.fontawesome.com/releases/v5.2.0/css/regular.css"  rel="stylesheet" integrity="sha384-zkhEzh7td0PG30vxQk1D9liRKeizzot4eqkJ8gB3/I+mZ1rjgQk+BSt2F6rT2c+I" crossorigin="anonymous">
  <script src="./Scripts/jquery-1.12.0.js" type="text/javascript"></script><!---->
   <link href="./Font/demo-files/demo.css" rel="stylesheet" type="text/css" ><!--Controla los iconos de la barra de menu-->
  <link href="./Styles/css_BarraMenu.css" rel="stylesheet" >
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link href="./Styles/arbol_navidad.css" rel="stylesheet" type="text/css"><!--dejar activo para que oculte el arbol de navidad-->

<script type="text/javascript" src="./Scripts/jquery-3.3.1.js"></script><!--Esta linea permite que funcione la barraherrameinte-fixed
-->
  <script type="text/javascript">
             $(document).ready(function () {//inicio $(document).ready
				
                var altura = $('.class_menu').offset().top;
              //alert(altura );
             $(window).on('scroll', function () {//inicio $(window).on
              
			   if ($(window).scrollTop() > altura){//inicio if ($(window).scrollTop(
			    
                   $('.divTitulo').addClass('divTitulo-fixed');
                   $('#nav').addClass('nav-fixed');
                   $('.divlogotipo').addClass('divlogotipo-fixed');
                   $('.PTitulo').addClass('PTitulo-fixed');
                   $('.PSubtitulo1').addClass('PSubtitulo1-fixed');
                   $('.menuLogo').addClass('menuLogo-fixed');
                   $('.class_menu').addClass('class_menu-fixed');
				           $('.info').addClass('info-fixed');
				          
				     } 
					 else   {
                   $('.divTitulo').removeClass('divTitulo-fixed');
                   $('#nav').removeClass('nav-fixed');
                   $('.divlogotipo').removeClass('divlogotipo-fixed');
                   $('.PTitulo').removeClass('PTitulo-fixed');
                   $('.PSubtitulo1').removeClass('PSubtitulo1-fixed');
                   $('.PSubtitulo2').removeClass('PSubtitulo2-fixed');
                   $('.menuLogo').removeClass('menuLogo-fixed');
				           $('.class_menu').removeClass('class_menu-fixed');
				           $('.info').removeClass('info-fixed');
                  
               }//fin if ($(window).scrollTop(
			   
           });// fin $(window).on

 var roll= <?php echo $_SESSION['nivel_acceso']; ?>;
 if(roll==1){document.getElementById('Administrativo').style.visibility="hidden";//oculta los alert en globo
}else{
	document.getElementById('Administrativo').style.visibility="visible";//oculta los alert en globo
	}//fin if(roll==1)




       });//fin $(document).ready

             function Confirm() {
                 var confirm_value = document.createElement("INPUT");
                 confirm_value.type = "hidden";
                 confirm_value.name = "confirm_value";
                 if (confirm("Desea elimnar el registro?")) {
                     
                     confirm_value.value = "Yes";
                     alert(confirm_value.value);
                 } else {
                     confirm_value.value = "No";
                     alert(confirm_value.value);
                 }
                 document.forms[0].appendChild(confirm_value);

             }

          </script>
          <script>
 $(document).ready(main);
 
var contador = 1;
 
function main () {
	$('.btn_menu_bar').click(function(){
		if (contador == 1) {
			$('.nav_barraMenu').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('.nav_barraMenu').animate({
				left: '-100%'
			});
		}
	});

	// Mostramos y ocultamos submenus
	$('.submenu').click(function(){
		$(this).children('.children').slideToggle();
	});
}
</script>
<div class="contenedorHeader">
<div class="contenedorAntesMenu">
 <div class="linePista"> </div>
 
<div class="menuLogo" >
 <img src="./ImgSistema/logofront.png"/>
           
      
        </div>    
        <!--LOGIN-->
<div class="login_">  
     <!-- logged in user information -->
			<?php   $rolnombre= new include_session(); $rol_acceso = $rolnombre->getRol($_SESSION['nivel_acceso']); if (isset($_SESSION['username'])) {    ?>
			<a href="login?logout='1'" style="color: red;">logout </a> Welcome <?php echo $_SESSION['username']?><!--." ".$rol_acceso; ?>-->  
              <?php } else { //echo $rol_acceso; este echo es opcional, se puede quitar despues?>
            <a href="login" style="color: red;">login</a>   <!---->
		<?php } ?>
   
         </div> 
        <?php /* if(session_status()==PHP_SESSION_DISABLED){echo '--- deshabilitada --';}else{echo '  -- habilitada -- ';};*/?>
     <?php /* if(session_status()==PHP_SESSION_NONE){echo '---  no xiste --';}else{echo '  -- existe -- ';};*/?>
     <?php  /* if(session_status()==PHP_SESSION_ACTIVE){echo '--- ACTIVA --';}else{echo '  -- INACTIVA -- ';};*/?>
     
<!--FIN LOGIN-->

   <div  class="resolucion_">
     Resolución 01-235  Secretaria de Educación de Bolívar</br> 
Resolución 4679 Secretaria de Educación Distrital de Cartagena de Indias</br> 
Personería Jurídica N° 1119 del 2008 Nit 806014830-1 de 2003 </br>    Cartagena – Colombia

    </div>
    <div class="tpl-snow">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<div class="contenedor_Arbol">
	

<i class="starGira fa fa-star fa-lg fa-spin"></i>
<i class="arbol fa fa-tree fa-lg"></i>

<i class="blink fa fa-star-half fa-lg fa-spin"></i>
<i class="blink2 fa fa-star fa-lg fa-spin"></i>
<i class="blink fa fa-star-half fa-lg fa-spin"></i>
<div class="contenedorEstrellas">

<i class="blink3 fa fa-star fa-lg fa-spin"></i>
<i class="blink4 fa fa-star fa-lg fa-spin"></i>
<i class="blink3 fa fa-star fa-lg fa-spin"></i>
</div>
</div>

<div class="info">

           <ul class="InfoUL">
               <li>
                 <div class="info-Phone">  
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x" fa-lg style="color:#4495E9" ></i>
                  <i class="fa fa-phone fa-stack-1x" fa-lg style="color:#a70000"></i>
               
                  </span>
                      
                <a>
                   <strong class="mb-none">6812539 - (+57) 3012807094</strong><br />
                   <strong>Hora de Atención 7:00-18:00</strong>            
                    </a>
                    
                    </div> 
                  </li>
              <li> 
              <div class="info-Email">
              <span class="fa-stack fa-lg">
  
  <i class="fa fa-circle  fa-stack-2x " style="color:#4495E9"></i>
  <a href="http://webmail.ceficc.edu.co" target="_blank">  <i class="fa fa-envelope  fa-stack-1x " style="color:#a70000"></i></a>
</span>
                    <div class="div-mb-email">
                   <strong class="mb-none">secretaria.general@ceficc.edu.co
                   ceficcaribe2020@hotmail.com</strong><br />
                       <strong class="mb-none">Solicita Información por Correo</strong>
                 </div>
                 </div>   
                  
               </li>
               
           </ul>
          
            </div>


</div>
         
   	<menu class="class_menu">
		<div class="btn_menu_bar">
			<a href="#" class="bt-menu"><span class="icon icon-menu"></span></a>
		</div>
 
		<nav class="nav_barraMenu">
			<ul>
				<li><a href="."><span class="icon icon-home"></span>Inicio</a></li>
				
                <li class="submenu">
					<a href="#"><span class="icon icon-office"></span>Institucional  <span class="icon icon-circle-down"></span></a>
					<ul class="children">
						<li><a href="institucional?refpage=mision">Mision <span class="icon icon-dot"></span></a></li>
						<li><a href="institucional?refpage=vision">Visión <span class="icon icon-dot"></span></a></li>
						<li><a href="institucional?refpage=principios">Principios Institucionales<span class="icon icon-dot"></span></a></li>
                        <li><a href="institucional?refpage=valores">Valores Éticos Institucionales<span class="icon icon-dot"></span></a></li>
                        <li><a href="institucional?refpage=calidad">Sistema de Calidad<span class="icon icon-dot"></span></a></li>
					</ul>
				</li>
                
                	<li class="submenu">
					<a href="#"><span class="icon icon-user-tie"></span>Estudiante  <span class="icon icon-circle-down"></span></a>
					<ul class="children">
						<li><a href="http://www.mansioningles.com" target="_blank">La Mansión del Ingles<span class="icon icon-dot"></span></a></li>
						<li><a href="https://es.duolingo.com" target="_blank">duolingo<span class="icon icon-dot"></span></a></li>
                       <li><a href="estudiante?action=inscripcion">Inscripción<span class="icon icon-dot"></span></a></li>
                      <!----> <li><a href="estudiante?action=certificado">Certificaciones<span class="icon icon-dot"></span></a></li>
                     <li><a href="pruebas" style="display:none" >Pruebas<span class="icon icon-dot"></span></a></li>

					</ul>
				</li>
                
				<li><a href="oferta"><span class="icon icon-pencil2"></span>Oferta Academica  </a></li>
				<li><a href="contacto"><span class="icon icon-mail"></span>Contacto</a></li>
                	<li class="submenu" id="Administrativo" style="visibility:hidden">
					<a href="#"><span class="icon icon-user-tie"></span>Administrativo  <span class="icon icon-circle-down"></span></a>
					<ul class="children">
						<li><a href="registro" >Registro<span class="icon icon-dot"></span></a></li>
						<li><a href="noticia" >Noticias<span class="icon icon-dot"></span></a></li>
                        <li><a href="logeado" >Logeado<span class="icon icon-dot"></span></a></li>
                          <li><a href="consultarinscripcion" >Consultar Inscritos<span class="icon icon-dot"></span></a></li>
					</ul>
				</li>
			</ul>
		</nav>
        <div class="login_">  
     <!-- logged in user information -->
		<?php   $rolnombre= new include_session(); $rol_acceso = $rolnombre->getRol($_SESSION['nivel_acceso']); if (isset($_SESSION['username'])) {    ?>
			<a href="login?logout='1'" style="color: red;">logout </a> Welcome <?php echo $_SESSION['username']?><!--." ".$rol_acceso; ?>-->  
              <?php } else { //echo $rol_acceso; este echo es opcional, se puede quitar despues?>
            <a href="login" style="color: red;">login</a>   <!---->
		<?php } ?>
   
         </div> 
	</menu>  

                      
</div>

            <!--</section>-->

