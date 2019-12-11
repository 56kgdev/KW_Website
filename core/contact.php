<div>
	<div class="wrapper">
		<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Contacto</h1>						
						<ul class="breadcrumb">
							<li><a href="/">Inicio</a></li>
							<li><b>Contacto</b></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE/BREADCRUMB -->
		
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content contacts">
							
			<div class="container">
				<div class="row">
					
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-6 col-sm-offset-8 center">
						<h2 class="section-title">Contactanos</h2>
						<!--<p class="col-sm-12 center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis purus sed justo egestas dapibus. <strong>Etiam vel sagittis</strong> nisi. Curabitur ac egestas lorem. Sed ut odio iaculis, interdum magna non, mattis dolor. Vestibulum id dignissim elit.</p>-->
						
						<form id="contact-form" method="POST" action="/mail/mailerContact.php">						
							<div class="col-sm-12">
								<input type="text" name="name" placeholder="Nombre *" class="form-control  fromName" required="required"/>
							
								<input type="email" name="email" placeholder="Correo Electronico *" class="form-control  fromEmail" required="required" />
							
								<!--<input type="text" name="Subject" placeholder="Subject" class="form-control  subject" required="required" />-->
								<textarea id="message" name="message" placeholder="Mensaje *" class="form-control " required="required"></textarea> 

								<input type="hidden" name="urlSite" id="urlSite" v-model="urlSite">
								<input type="hidden" name="company" id="company" v-model="company">
								<input type="hidden" name="addressCompany" id="addressCompany" v-model="addressCompany">
								<input type="hidden" name="phoneCompany" id="phoneCompany" v-model="phoneCompany">
								<input type="hidden" name="emailCompany" id="emailCompany" v-model="emailCompany">
								<input type="hidden" name="logoCompany" id="logoCompany" v-model="logoCompany">
							</div>
							
							<div class="center">
								<button type="submit" id="sendMailContact" class="btn btn-default-color btn-lg "><i class="fa fa-envelope"></i> Enviar</button>								
							</div>
							<br>
						</form>
					</div>	
					<!-- END MAIN CONTENT -->
				</div>
			</div>
		</div>
	</div>
</div>