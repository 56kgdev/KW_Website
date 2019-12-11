<template>
  <main>
	  	<!-- BEGIN PAGE TITLE/BREADCRUMB -->
      	<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">404 Error</h1>
						
						<ul class="breadcrumb">
							<li><router-link to="/">Inicio</router-link></li>
							<li>Error</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE/BREADCRUMB -->		
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content">
			<div class="container">
				<div class="row">
				
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-6">						
						<div class="e404 clearfix">
							<div>
								<strong>404</strong>
								ERROR 
							</div>
							<i class="fa fa-file-text-o"></i>
						</div>					
					</div>	
					<!-- END MAIN CONTENT -->
					
					<!-- BEGIN SIDEBAR -->
					<div class="sidebar col-sm-5 col-md-offset-1">						
						<div id="e404-side">
							<h3>Hey! Esta página no funciona.   :(</h3>							
							<p><br/><br/>Lo sentimos, pero la página que solicitó no se pudo encontrar. Es posible que esta página haya sido movida, eliminada o tal vez haya escrito mal la URL.</p>							
							<p>Por favor, intente de nuevo y asegúrese de haber escrito la URL correctamente.</p>							
							<p class="center"><br/><router-link to="/" class="btn btn-default-color">Regresa al inicio</router-link></p>
						</div>
					</div>
					<!-- END SIDEBAR -->
					
				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
  </main>
</template>
<script>
export default {
    created(){
        window.scrollTo(0,0);
    }
}
</script>
