<?php 
    include ('../base/base.php');
    $data = getFooter();
?>
<div id="footer">
			<div id="footer-top" class="container">
				<div class="row">
					<div class="block col-sm-4">
						<!--<a href="index.html"><img src="src/assets/img/logoLarge.png" alt="Diamanta Bienes raices" /></a>-->
						<a href="/"><img src="http://agent.immosystem.com.mx/<?php echo $data['logo'] ?>" alt="<?php echo $data['company'] ?>" /></a>
						<br><br>
						<!--<p>Diamanta</p>-->
					</div>
					<div class="block col-sm-4">
						<h3>Información de Contacto</h3>
						<ul class="footer-contacts">
							<li><i class="fa fa-map-marker"></i><?php echo $data['address1'] ?></li>
							<!--<li><i class="fa fa-phone"></i><a :href="'tel:+52'+phone1">{{phone14}}</a></li>-->
							<li ><i class="fa fa-phone"></i><a href="tel:+52<?php echo $data['phone1'] ?>"><?php echo $data['phone1'] ?></a></li>
							<li ><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $data['reserveemail'] ?>"><?php echo $data['reserveemail'] ?></a></li>
						</ul>
					</div>
					<div class="block col-sm-4">
						<h3>Menú</h3>
						<ul class="footer-links">
							<li><a href="/">Inicio</a></li>
							<li><a href="/nosotros">Nosotros</a></li>
							<li><a href="/propiedades">Propiedades</a></li>
							<!--<li><a href="#">Desarrollos</a></li>-->									
							<li><a href="/contacto">Contacto</a></li>
							<li><a href="/nuestro-equipo">Nuestro equipo</a></li>
							<li><a href="/oferta-tu-propiedad">OFREZCA SU INMUEBLE</a></li>
							<li><a href="http://agent.immosystem.com.mx/" target="_blank">Acceder a IMMO System&copy;</a></li>
						</ul>
					</div>					
				</div>
			</div>
			
			
			<!-- BEGIN COPYRIGHT -->
			<div id="copyright">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<?php echo $data['company'] ?> &copy; 2018 Todos los derechos reservados.  <a href="http://www.immosystem.com.mx/" target="_blank">IMMO System&copy;</a>
							- <a href="/aviso-privacidad" style="padding-top:-100px;font-style:normal; font-size:9px;" href=""> AVISO DE PRIVACIDAD</a>
							
							<!-- BEGIN SOCIAL NETWORKS -->
							<ul class="social-networks" id="footer_social">
								<li><h4><b> Síguenos:</b></h4></li>															
								<li ><a data-toggle="tooltip" data-placement="top" title="Facebook" href="<?php echo $data['fb']?>" target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<li ><a data-toggle="tooltip" data-placement="top" title="Twitter"  href="<?php echo $data['tw']?>"><i class="fa fa-twitter"></i></a>
								 </li>
								<li ><a data-toggle="tooltip" data-placement="top" title="Google Plus" href="<?php echo $data['gmas']?>"><i class="fa fa-google-plus"></i></a>
								</li>
								<li ><a data-toggle="tooltip" data-placement="top" title="Linkedin" href="<?php echo $data['linkedin']?>"><i class="fa fa-linkedin"></i></a>
								</li>
								<li ><a data-toggle="tooltip" data-placement="top" title="Youtube" href="<?php echo $data['youtube']?>"><i class="fa fa-youtube"></i></a>
								</li>
								<li ><a data-toggle="tooltip" data-placement="top" title="Skype" href="" target="_blank"><i class="fa fa-skype"></i></a>
								</li>
								<li ><a data-toggle="tooltip" data-placement="top" title="Pinterest" href="<?php echo $data['pinterest']?>"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
							<!-- END SOCIAL NETWORKS -->
						
						</div>
					</div>
				</div>
			</div>
			<!-- END COPYRIGHT -->
			
</div>
		<!-- END FOOTER -->