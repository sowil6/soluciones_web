		<footer class="footer-distributed">

			<div class="footer-left"></div>
<div class="footer-center">
				<h3>CEFICC <br/><span>Corporación de Formación Integral del Caribe</span></h3>
<p>Contáctenos <br/>Direccion: Urbanización 11 de Nobiembre Mz 11 Lote 7</p>
				<div>
					<i class="fa fa-phone"></i>
					<p>oficina 6812539</br>movil (+57 301 2807094) (+57 300 8135952)</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
						<p><a href="mailto:secretaria.general@ceficc.edu.co">secretaria.general@ceficc.edu.co <br />ceficcaribe2020@hotmail.com</a></p>
				
<br/>

					<a href="https://www.facebook.com/profile.php?id=100019469347982&ref=br_rs" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/ceficc" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
					<a href="#" target="_blank"><i class="fa fa-github"></i></a>
				
                </div>
                
                <p class="footer-company-about">
					
					Todos los Derechos Reservados a la Corporación de Formación Integral del Caribe. CEFICC - Cartagena 2017
Sede Principal: Urbanizacion 11 de Noviembre manzana 11 lote 7 Telefono: (035)6812539 - Móvil: 301-2807094
				</p>

				<p class="footer-company-name"></br>Elaborado por: William Lozano Posso </br> Ingeniero Especialista Tel. Cel 315 6691598 - email: sowil6@gmail.com</br> &copy; 2018</p>
			</div>

			<div class="footer-right">
                
             <div><p>Direccion: Urbanización 11 de Nobiembre Mz 11 Lote 7</p>
                <a href="https://goo.gl/maps/9n6rrYjx7GT2" target="_blank"><i class="fa fa-map-marker"></i>
					Ir al Mapa <br/></a>
					
				</div>
<iframe class="mapIframe" src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d62792.24662346992!2d-75.49548803712258!3d10.380576335357665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m5!1s0x8ef62f9c3b25a7a9%3A0x9154a5ab2957747f!2sParque+India+Catalina%2C+C32%2C+Cartagena%2C+Bol%C3%ADvar!3m2!1d10.4256721!2d-75.54424759999999!4m3!3m2!1d10.3795556!2d-75.4648611!5e0!3m2!1ses!2sco!4v1547598647230"  frameborder="0" style="border:0" allowfullscreen></iframe>
				

				
<!--<div class="footer-icons"></div>
-->
			</div>

		</footer>
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
     <style type="text/css">
        
        	
		/*FOOTER*/

#footer .footer-ribbon {
	background: #0088cc;
}

#footer .footer-ribbon:before {
	border-right-color: #005580;
	border-left-color: #005580;
}

#footer.light h1,
#footer.light h2,
#footer.light h3,
#footer.light h4,
#footer.light a {
	color: #0088cc;
}

#footer.color {
	background: #0088cc;
	border-top-color: #0088cc;
}
#footer.color .footer-ribbon {
	background: #006699;
}
#footer.color .footer-ribbon:before {
	border-right-color: #00334d;
}
#footer.color .footer-copyright {
	background: #0077b3;
	border-top-color: #0077b3;
}
 #footer.color-primary {
	background: #0088cc;
	border-top-color: #0088cc;
}
 #footer.color-primary .footer-ribbon {
	background: #006699;
}
 #footer.color-primary .footer-ribbon:before {
	border-right-color: #00334d;
}
 #footer.color-primary .footer-copyright {
	background: #0077b3;
	border-top-color: #0077b3;
}
 #footer.color-secondary {
	background: #e36159;
	border-top-color: #e36159;
}
 #footer.color-secondary .footer-ribbon {
	background: #dc372d;
}
 #footer.color-secondary .footer-ribbon:before {
	border-right-color: #a1231b;
}
 #footer.color-secondary .footer-copyright {
	background: #df4c43;
	border-top-color: #df4c43;
}
 #footer.color-tertiary {
	background: #2baab1;
	border-top-color: #2baab1;
}
 #footer.color-tertiary .footer-ribbon {
	background: #218388;
}
#footer.color-tertiary .footer-ribbon:before {
	border-right-color: #12474a;
}
#footer.color-tertiary .footer-copyright {
	background: #26969c;
	border-top-color: #26969c;
}
 #footer.color-quaternary {
	background: #383f48;
	border-top-color: #383f48;
}
 #footer.color-quaternary .footer-ribbon {
	background: #22262b;
}
 #footer.color-quaternary .footer-ribbon:before {
	border-right-color: #000000;
}
 #footer.color-quaternary .footer-copyright {
	background: #2d323a;
	border-top-color: #2d323a;
}
 #footer.color-dark {
	background: #2e353e;
	border-top-color: #2e353e;
}
 #footer.color-dark .footer-ribbon {
	background: #181c21;
}
 #footer.color-dark .footer-ribbon:before {
	border-right-color: #000000;
}
 #footer.color-dark .footer-copyright {
	background: #23282f;
	border-top-color: #23282f;
}
 #footer.color-light {
	background: #ffffff;
	border-top-color: #ffffff;
}
 #footer.color-light .footer-ribbon {
	background: #e6e6e6;
}
 #footer.color-light .footer-ribbon:before {
	border-right-color: #bfbfbf;
}
 #footer.color-light .footer-copyright {
	background: #f2f2f2;
	border-top-color: #f2f2f2;
}


        
    </style>