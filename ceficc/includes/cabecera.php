<link rel="shortcut icon" href= "../imgSistema/icono.ico" type="image/x-icon">

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
?>	
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
                   $('.menu').addClass('menu-fixed');
				     } else {
                   $('.divTitulo').removeClass('divTitulo-fixed');
                   $('.divContenedorMenu').removeClass('divContenedorMenu-fixed');
                   $('.divlogotipo').removeClass('divlogotipo-fixed');
                   $('.PTitulo').removeClass('PTitulo-fixed');
                   $('.PSubtitulo1').removeClass('PSubtitulo1-fixed');
                   $('.PSubtitulo2').removeClass('PSubtitulo2-fixed');
                   $('.menuLogo').removeClass('menuLogo-fixed');
				  $('.menu').removeClass('menu-fixed');
                   
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
<div class="contenedorHeader">
<div class="contenedorAntesMenu">
<div class="menuLogo" >
 <img src="../ImgSistema/logofront.png"/>
           
            
        </div>    
  
  
<div class="info">
           <ul class="InfoUL">
               <li>
               
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x" fa-lg style="color:#4495E9" ></i>
                  <i class="fa fa-phone fa-stack-1x" fa-lg style="color:#a70000"></i>
               
                  </span>
                      
                  <div class="info-Email">  <a>
                   <strong class="mb-none">(PBX) 6411390</strong><br />
                   <strong><small>Hora de Atención 7:00-18:00</small></strong>            
                    </a></div> 
                  </li>
              <li> 
              <span class="fa-stack fa-lg">
  
  <i class="fa fa-circle  fa-stack-2x " style="color:#4495E9"></i>
   <i class="fa fa-envelope  fa-stack-1x " style="color:#a70000"></i>
</span>
                   <div class="info-Email">  <a>
                   <strong class="mb-none">info@ceficc.edu.co</strong><br />
                       <strong><small>Solicita Información por Correo</small></strong>
                 </a> </div>   
                  
               </li>
               
           </ul>
          
            </div>
            
            <div id="resolucion" class="resolucion">
     Resolución 01-235  Secretaria de Educación de Bolívar</br> 
Resolución 4679 Secretaria de Educación Distrital de Cartagena de Indias</br> 
Personería Jurídica N° 1119 del 2008 Nit 806014830-1 de 2003 </br>    Cartagena – Colombia

    </div>

</div>
         
  
  <div class="divContenedorMenu">
           <nav class="navMenu">
                                       <ul id="invitado" class="ulNav" >
                                         <li class="current_page_item"><a href="../vista/index.php"><img src="" />INICIO</a></li>
                                         <!--                 <li><a href="/Public/Presentacion.aspx"><img src="/Img/imgMenu/home.png" />Presentacion</a></li>-->
                                         <li><a href="../vista/pageslide.php"><img src="" />INSTITUCIONAL</a>
                                           <div class="subs">
                                             <div class="divCol">
                                               <ul>
                                                 <li><a href="../vista/institucional.php?refpage=mision"><img src="../imgSistema/imgMenu/bub.png" />Misión</a></li>
                                                 <li><a href="../vista/institucional.php?refpage=vision"><img src="../imgSistema/imgMenu/bub.png" />Vision</a></li>
                                                 <li><a href="../vista/institucional.php?refpage=principios"><img src="../imgSistema/imgMenu/bub.png" />Principios Institucionales</a></li>
                                                 <li><a href="../vista/institucional.php?refpage=valores"><img src="../imgSistema/imgMenu/bub.png" />Valores Éticos Institucionales</a></li>
                                                 <li><a href="../vista/institucional.php?refpage=calidad"><img src="../imgSistema/imgMenu/bub.png" />Sistema de Calidad</a></li>
                                                                                                                                                                         
                                                 <!--                              <li><a href="#"><span><img src="/Styles/Menu/imagenMenu/top3.png" /> Sublinks</span></a>
                                   <div class="subs">
                                        <div class="divCol">
                                            <ul>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 41</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 42</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 43</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 44</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 45</a></li>
                                            </ul>
                                        </div>
                                        <div class="divCol">
                                            <ul>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 46</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 47</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 48</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 49</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>-->
                                               </ul>
                                             </div>
                                             <!--                        <div class="divCol">
                            <ul>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 6</a></li>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 7</a></li>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 8</a></li>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 9</a></li>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 10</a></li>
                            </ul>
                        </div>-->
                                           </div>
                                         </li>
                                         <li ><a href="/Public/informativo.aspx"><span><img src="" />ESTUDIANTE</span></a>
                                           <div class="subs">
                                             <div class="divCol">
                                               <ul>
                                                 <li><a href="/Academico/certificados.aspx"><img src="../imgSistema/imgMenu/bub.png" />Certificados</a></li>
                                                 <li><a href="/Academico/inscripcion.aspx"><img src="../imgSistema/imgMenu/bub.png" />Inscripciones</a></li>
                                                 <li><a href="../manager/Personas_controlador.php"><img src="../imgSistema/imgMenu/bub.png" />Lista de Alumnos</a></li>
                                                 <li><a href="http://www.mansioningles.com"target="_blank"><img src="../imgSistema/imgMenu/bub.png" />La Mansión del Ingles</a></li>
                                                 <li><a href="https://es.duolingo.com"target="_blank"><img src="../imgSistema/imgMenu/bub.png" />duolingo</a></li>
                                                 <li><a href="/Academico/Guias_Manuales.aspx"><img src="../imgSistema/imgMenu/bub.png" />Descarga de Manuales Guias</a></li>
                                                 <!--                              <li><a href="#"><span><img src="/Styles/Menu/imagenMenu/top3.png" /> Sublinks</span></a>
                                   <div class="subs">
                                        <div class="divCol">
                                            <ul>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 41</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 42</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 43</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 44</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 45</a></li>
                                            </ul>
                                        </div>
                                        <div class="divCol">
                                            <ul>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 46</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 47</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 48</a></li>
                                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 49</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>-->
                                               </ul>
                                             </div>
                                             <!--                        <div class="divCol">
                            <ul>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 6</a></li>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 7</a></li>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 8</a></li>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 9</a></li>
                                <li><a href="#"><img src="/Img/imgMenu/bub.png" /> Link 10</a></li>
                            </ul>
                        </div>-->
                                           </div>
                                         </li>
                                         <li><a href="../vista/ofertaacademica.php"><span><img src="" />OFERTA ACADEMICA</span></a>
                                           <div class="subs">
                                             <div class="divCol">
                                               <ul>
                                                 <li><a href="../vista/ofertaacademica.php"><img src="../imgSistema/imgMenu/bub.png" /> OFERTA ACADEMICA</a></li>
                                               </ul>
                                             </div>
                                             r
                                           </div>
                                         </li>
                                       </ul>
                                       <ul class="ulNav" id="menuDigitador" >
                                         <li><a href="#"><img src="" />APP-CORPORATIVA</a>
                                           <div class="subs">
                                             <div class="divCol">
                                               <ul>
                                                 <li><a href="../vista/loadimagen_vista.php"><img src="../imgSistema/imgMenu/bub.png" /> Pagina Pruebas</a></li>
                                                 <li><a href="/Academico/inscripcion.aspx"><img src="../imgSistema/imgMenu/bub.png" />Gestión de Estudiantes</a></li>
                                                 <li><a href="../vista/noticia_vista.php"><img src="../imgSistema/imgMenu/bub.png" />Editar Contenidos de la Pagina Web</a></li>
                                               </ul>
                                             </div>
                                           </div>
                                         </li>
                                       </ul>
                                       <ul class="ulNav" id="menuComite">
                                         <!--                    <li><a href="/Comite/ConfiguraNoticia.aspx"><img src="/Img/imgMenu/top3.png" />...</a></li>-->
                                         <!--                    <li><a href="#"><img src="/Img/imgMenu/top4.png" />Reportes</a></li>-->
                                       </ul>
                                       <ul class="ulNav" id="menuAdmin" >
                                         <li><a href="../public/AdminPage/Registro.aspx"><img src="" />ADMINISTRATIVO</a>
                                           <div class="subs">
                                             <div class="divCol">
                                               <ul>
                                                 <li><a href="/AdminPage/Registro.aspx"><img src="" /> Registrar Funcionarios</a></li>
                                                 <li><a href="/Reportes/ReportePersonas.aspx"><img src="../imgSistema/imgMenu/bub.png" />Reportes</a></li>
                                               </ul>
                                             </div>
                                             <div class="divCol">
                                               <ul>
                                                 <li><a href="#"><img src="../imgSistema/imgMenu/bub.png" />Crar Usuarios</a></li>
                                               </ul>
                                             </div>
                                           </div>
                                         </li>
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
