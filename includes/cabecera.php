<!--<link rel="shortcut icon" href= "./../ImgSistema/icono.ico" type="image/x-icon">-->

  <title>Drop-Down Navigation: Touch-Friendly and Responsive demo by Osvaldas Valutis</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="Demo of Drop-Down Navigation: Touch-Friendly and Responsive" />
  <meta name="robots" content="all">
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="canonical" href="/examples/drop-down-navigation-touch-friendly-and-responsive">
  <link rel="icon" href="../favicon.ico" />
  <link rel="shortcut icon" href= "../ImgSistema/icono.png" type="image/png">
  
  <link rel="stylesheet" href="../main.css" />
  <link rel="stylesheet" href="../Styles/estilos.css">
<script src="doubletaptogo.js"></script>
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
?>	<link rel="stylesheet" href="../Styles/menuWeb.css">
<link href="../Styles/css_navidad.css" rel="stylesheet" type="text/css">
<link href="../Styles/CSSEstiloGeneral.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="../Styles/footer-distributed-with-address-and-phones.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/regular.css" integrity="sha384-zkhEzh7td0PG30vxQk1D9liRKeizzot4eqkJ8gB3/I+mZ1rjgQk+BSt2F6rT2c+I" crossorigin="anonymous">
<!-- <script src="../Scripts/jquery.min.js" type="text/javascript"></script> 
-->

<script type="text/javascript" src="../Scripts/jquery-3.3.1.js"></script><!--Esta linea permite que funcione la barraherrameinte-fixed

-->
  <script type="text/javascript">
            $(document).ready(function () {
                var altura = $('.divContenedorMenu').offset().top;
               //alert(altura );
             $(window).on('scroll', function () {
               if ($(window).scrollTop() > altura) {
                   $('.divTitulo').addClass('divTitulo-fixed');
                   $('.divContenedorMenu').addClass('divContenedorMenu-fixed');
                   $('.divlogotipo').addClass('divlogotipo-fixed');
                   $('.PTitulo').addClass('PTitulo-fixed');
                   $('.PSubtitulo1').addClass('PSubtitulo1-fixed');
                   $('.menuLogo').addClass('menuLogo-fixed');
                   $('.menuWeb').addClass('menuWeb-fixed');
				     } else {
                   $('.divTitulo').removeClass('divTitulo-fixed');
                   $('.divContenedorMenu').removeClass('divContenedorMenu-fixed');
                   $('.divlogotipo').removeClass('divlogotipo-fixed');
                   $('.PTitulo').removeClass('PTitulo-fixed');
                   $('.PSubtitulo1').removeClass('PSubtitulo1-fixed');
                   $('.PSubtitulo2').removeClass('PSubtitulo2-fixed');
                   $('.menuLogo').removeClass('menuLogo-fixed');
				  $('.menuWeb').removeClass('menuWeb-fixed');
				  
                   
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

          
    $('.menuWeb li >ul> li').click(function(){
  $('menuWeb  li >ul> li').show();
  $(this).next().hide();

});   

          

          </script>
          <script>
  $( function()
  {
    $( '#nav li:has(ul)' ).doubleTapToGo();
  });
</script>
<div class="contenedorHeader">
<div class="contenedorAntesMenu">
 <div class="linePista"> </div>
<div class="menuLogo" >
 <img src="../ImgSistema/logofront.png"/>
           
            
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
         
  
  <div class="divContenedorMenu">
 <!--       <input type="checkbox" id="btn-menu">
<label for="btn-menu"> <i class="fa fa-bars fa-1x"></i></label>
  -->


<!--<nav class="menuWeb">
    <ul>
        <li class="menuNivel1" id="menuInicioNivel1"> <a href="inicio">INICIO</a></li>
        <li class="menuNivel1" id="publico"> <a href="#">INSTITUCIONAL</a>
           
            <ul class="ulNav">
               <li><a href="institucional,mision"><img src="../ImgSistema/imgMenu/bub.png" />Misión</a></li>
               <li><a href="institucional,vision"><img src="../ImgSistema/imgMenu/bub.png" />Vision</a></li>
               <li><a href="institucional,principios"><img src="../ImgSistema/imgMenu/bub.png" />Principios Institucionales</a></li>
               <li><a href=".institucional,valores"><img src="../ImgSistema/imgMenu/bub.png" />Valores Éticos Institucionales</a></li>
               <li><a href="institucional,calidad"><img src="../ImgSistema/imgMenu/bub.png" />Sistema de Calidad</a></li>
           </ul>
       </li>

       <li class="menuNivel1"> <a href="">ESTUDIANTE</a>

        <ul class="ulNav">
            <li><a href="http://www.mansioningles.com" target="_blank"><img src="../ImgSistema/imgMenu/bub.png" />La Mansión del Ingles</a></li>
            <li><a href="https://es.duolingo.com" target="_blank"><img src="../ImgSistema/imgMenu/bub.png" />duolingo</a></li>
        </ul>

    </li>

    <li class="menuNivel1" > <a href="">OFERTA ACADEMICA</a>
       <ul class="ulNav">
        <li><a href="ofertaacademica"><img src="../ImgSistema/imgMenu/bub.png" /> OFERTA ACADEMICA</a></li>
    </ul>

</li>

<li  class="menuNivel1" id="li_app_corporativa"> <a href="">APP CORPORATIVA</a>
 <ul class="ulNav">
    <li><a href="../vista/loadimagen_vista.php"><img src="../ImgSistema/imgMenu/bub.png" /> Pagina Pruebas</a></li>
    <li><a href="/Academico/inscripcion.aspx"><img src="../ImgSistema/imgMenu/bub.png" />Gestión de Estudiantes</a></li>
    <li><a href="noticia_vista"><img src="../ImgSistema/imgMenu/bub.png" />Editar Contenidos de la Pagina Web</a></li>
</ul>

</li>

</ul>


</nav>
-->
<nav id="nav" role="navigation">
  <a href="#nav" title="Show navigation">Show navigation</a>
  <a href="#" title="Hide navigation">Hide navigation</a>
  <ul class="clearfix">
    <li class="menuNivel1" id="menuInicioNivel1"> <a href="inicio">Inicio</a></li>
    <li class="menuNivel1" id="publico"> <a href="#">Institucional</a>
      <ul>
     <li><a href="institucional,mision"><img src="../ImgSistema/imgMenu/bub.png" />Misión</a></li>
               <li><a href="institucional,vision"><img src="../ImgSistema/imgMenu/bub.png" />Vision</a></li>
               <li><a href="institucional,principios"><img src="../ImgSistema/imgMenu/bub.png" />Principios Institucionales</a></li>
               <li><a href=".institucional,valores"><img src="../ImgSistema/imgMenu/bub.png" />Valores Éticos Institucionales</a></li>
               <li><a href="institucional,calidad"><img src="../ImgSistema/imgMenu/bub.png" />Sistema de Calidad</a></li>
       </ul>
    </li>
     <li class="menuNivel1" id="publico"> <a href="#">Estudiante</a>
      <ul>
     <li><a href="institucional,mision"><img src="../ImgSistema/imgMenu/bub.png" />Misión</a></li>
            <li><a href="http://www.mansioningles.com" target="_blank"><img src="../ImgSistema/imgMenu/bub.png" />La Mansión del Ingles</a></li>
            <li><a href="https://es.duolingo.com" target="_blank"><img src="../ImgSistema/imgMenu/bub.png" />duolingo</a></li>
       </ul>
    </li>
    <li class="active">
     <a href="">OFERTA ACADEMICA</a>
      <ul>
      <li><a href="ofertaacademica"><img src="../ImgSistema/imgMenu/bub.png" /> OFERTA ACADEMICA</a></li>
      </ul>
    </li>
    <li><a href="?about">About</a></li>
  </ul>
</nav>


 </div>

                         
</div>
     
            <!--</section>-->

                 <script>
        $('.item').hover(
            function () {
                var $this = $(this);
                expand($this);
            },
            function () {
                var $this = $(this);
                collapse($this);
            }
        );
        function expand($elem) {
            var angle = 0;
            var t = setInterval(function () {
                if (angle == 1440) {
                    clearInterval(t);
                    return;
                }
                angle += 40;
                $('.link', $elem).stop().animate({ rotate: '+=-40deg' }, 0);
            }, 10);
            $elem.stop().animate({ width: '360px' }, 1000)//ancho de desplazamiento  numero despues del ancho, velocidad de desplazamiento
            .find('.item_content').fadeIn(400, function () {
                $(this).find('p').stop(true, true).fadeIn(600);
            });
        }
        function collapse($elem) {
            var angle = 1440;
            var t = setInterval(function () {
                if (angle == 0) {
                    clearInterval(t);
                    return;
                }
                angle -= 40;
                $('.link', $elem).stop().animate({ rotate: '+=40deg' }, 0);
            }, 10);
            $elem.stop().animate({ width: '80px' }, 1000)
            .find('.item_content').stop(true, true).fadeOut().find('p').stop(true, true).fadeOut();
        }
    </script>
