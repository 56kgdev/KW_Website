<?php 
    include '/core/base/base.php';
    $data = getFooter();
?>

<!-- BEGIN HEADER -->
<div id="header">
			<div id="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ul id="top-info">
								<!--<li><a :href="'tel:+52'+phone1">Teléfono: {{phone1}}</a></li>
                <li><a :href="'mailto:'+email">Correo eletrónico: {{email}}</a></li>-->

                <li><a :href="'tel:+52'+phone1">Teléfono: <?php echo $data['phone1'] ?></a></li>
                <li><a :href="'mailto:'+email">Correo eletrónico: <?php echo $data['reserveemail'] ?></a></li>
								
							</ul>
							<ul id="top-info2">
								<li > <a href="/aviso-privacidad" >Aviso de Privacidad</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div id="nav-section">
				<div class="container">
					<div class="row" >
						<div class="col-sm-12">
							
							<!--<a href="index.html" class="nav-logo"><img src="src/assets/img/logoLarge.png" alt="Diamanta Bienes Raices" /></a>-->
							<a href="/" class="nav-logo"><img src="http://agent.immosystem.com.mx/<?php echo $data['logo'] ?>" alt="<?php echo $data['company'] ?>" /></a>
							
							<!-- BEGIN MAIN MENU -->
							<nav class="navbar">
								<button id="nav-mobile-btn"><i class="fa fa-bars"></i></button>
								
								<ul class="nav navbar-nav">

									<li><a href="/">Inicio</a></li>
									<li><a href="/nosotros">Nosotros</a></li>
									<li><a href="/propiedades">Propiedades</a></li>
									<!--<li><a href="#">Desarrollos</a></li>-->									
									<li><a href="/contacto">Contacto</a></li>
									<li><a href="/nuestro-equipo">Nuestro equipo</a></li>
									<li><a href="/oferta-tu-propiedad">OFREZCA SU INMUEBLE</a></li>
								</ul>
							
							</nav>
							<!-- END MAIN MENU -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
