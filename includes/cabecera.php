 <link href="./Styles/css_navidad.css" rel="stylesheet" type="text/css">
<link href="./Styles/CSSEstiloGeneral.css" rel="stylesheet" type="text/css">
 <link href="./Styles/footer-distributed-with-address-and-phones.css" rel="stylesheet">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" > 
<link href="https://use.fontawesome.com/releases/v5.2.0/css/regular.css"  rel="stylesheet" integrity="sha384-zkhEzh7td0PG30vxQk1D9liRKeizzot4eqkJ8gB3/I+mZ1rjgQk+BSt2F6rT2c+I" crossorigin="anonymous">

	
   <link href="./Font/demo-files/demo.css" rel="stylesheet" type="text/css" >
  <link href="./Styles/css_BarraMenu.css" rel="stylesheet" >
<script src="http://code.jquery.com/jquery-latest.js"></script>

<?php function ValidaExtension($sExtension) {

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
           			
        }
?>	<!--<link rel="stylesheet" href="../Styles/menuWeb.css">-->

<!-- <script src="../Scripts/jquery.min.js" type="text/javascript"></script> 
-->

<script type="text/javascript" src="./Scripts/jquery-3.3.1.js"></script><!--Esta linea permite que funcione la barraherrameinte-fixed

-->
  <script type="text/javascript">
            $(document).ready(function () {
                var altura = $('header').offset().top;
              //alert(altura );
             $(window).on('scroll', function () {
               if ($(window).scrollTop() > altura) {
                   $('.divTitulo').addClass('divTitulo-fixed');
                   $('#nav').addClass('nav-fixed');
                   $('.divlogotipo').addClass('divlogotipo-fixed');
                   $('.PTitulo').addClass('PTitulo-fixed');
                   $('.PSubtitulo1').addClass('PSubtitulo1-fixed');
                   $('.menuLogo').addClass('menuLogo-fixed');
                   $('.nav_barraMenu').addClass('nav_barraMenu-fixed');
				   $('.info').addClass('info-fixed');
				   $('.class_menu').addClass('class_menu-fixed');
				     } else {
                   $('.divTitulo').removeClass('divTitulo-fixed');
                   $('#nav').removeClass('nav-fixed');
                   $('.divlogotipo').removeClass('divlogotipo-fixed');
                   $('.PTitulo').removeClass('PTitulo-fixed');
                   $('.PSubtitulo1').removeClass('PSubtitulo1-fixed');
                   $('.PSubtitulo2').removeClass('PSubtitulo2-fixed');
                   $('.menuLogo').removeClass('menuLogo-fixed');
				  $('.nav_barraMenu').removeClass('nav_barraMenu-fixed');
				   $('.info').removeClass('info-fixed');
                    $('.class_menu').removeClass('class_menu-fixed');
               }
           });

       });

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
  

   <div  class="resolucion_">
     Resolución 01-235  Secretaria de Educación de Bolívar</br> 
Resolución 4679 Secretaria de Educación Distrital de Cartagena de Indias</br> 
Personería Jurídica N° 1119 del 2008 Nit 806014830-1 de 2003 </br>    Cartagena – Colombia

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
                   <strong class="mb-none">(PBX) 6411390</strong><br />
                   <strong><small>Hora de Atención 7:00-18:00</small></strong>            
                    </a>
                    
                    </div> 
                  </li>
              <li> 
              <div class="info-Email">
              <span class="fa-stack fa-lg">
  
  <i class="fa fa-circle  fa-stack-2x " style="color:#4495E9"></i>
   <i class="fa fa-envelope  fa-stack-1x " style="color:#a70000"></i>
</span>
                     <a>
                   <strong class="mb-none">info@ceficc.edu.co</strong><br />
                       <strong><small>Solicita Información por Correo</small></strong>
                 </a> </div>   
                  
               </li>
               
           </ul>
          
            </div>
            
</div>
         
   	<menu class="class_menu">
		<div class="btn_menu_bar">
			<a href="#" class="bt-menu"><span class="nombre_icon"> barra de </br>menu tactil</span><span class="icon icon-menu"></span></a>
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
                       <li><a href="estudiante?action=certificado">Certificdo<span class="icon icon-dot"></span></a></li>

					</ul>
				</li>
                
				<li><a href="oferta"><span class="icon icon-pencil2"></span>Oferta Academica  </a></li>
				<li><a href="contacto"><span class="icon icon-mail"></span>Contacto</a></li>
			</ul>
		</nav>
	</menu>  

                      
</div>
     
            <!--</section>-->

