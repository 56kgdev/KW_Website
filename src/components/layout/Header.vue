<template>
    <!-- BEGIN HEADER -->
	<header id="header">
		
		<!-- BEGIN TOP-BAR HEADER -->
		<div id="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ul id="top-info">							
							<li><a :href="'tel:+52'+phone1">Teléfono: {{phone1}}</a></li>
							<li><a :href="'mailto:'+email">Correo eletrónico: {{email}}</a></li>							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END TOP-BAR HEADER -->
		
		<!-- BEGIN NAVBAR -->
		<div id="nav-section">
			<div class="container">
				<div class="row" >
					<div class="col-sm-12">
									
						<router-link to="/" class="nav-logo" style="text-align:center;">
							<img v-if="logo !=0" :src="'http://agent.immosystem.com.mx/'+logo" :alt="company" /> 							
							<b v-else> {{company}} </b>	
						</router-link>
						
						<!-- BEGIN MAIN MENU -->
						<nav class="navbar">
							<button id="nav-mobile-btn"><i class="fa fa-bars"></i></button>							
							<ul class="nav navbar-nav">

								<li><router-link to="/">Inicio</router-link></li>
								<li><router-link to="/nosotros">Nosotros</router-link></li>
								<li><router-link to="/propiedades">Propiedades</router-link></li>
								<!--<li><a href="#">Desarrollos</a></li>-->									
								<li><router-link to="/contacto">Contacto</router-link></li>
								<li><router-link to="/nuestro-equipo">Nuestro equipo</router-link></li>
								<!--<li><router-link to="/oferta-tu-propiedad">OFREZCA SU INMUEBLE</router-link></li>-->
								<!--<li><router-link to="/aviso-privacidad">Aviso de privacidad</router-link></li>-->
							</ul>						
						</nav>
						<!-- END MAIN MENU -->						
					</div>
				</div>
			</div>
		</div>
		<!-- BEGIN NAVBAR -->

	</header>
	<!-- END HEADER -->
</template>

<script>
	import immoService from '@/services/immo.js'

	export default {
	name: 'app',
		data(){
			return{
				company:[],
				logo:[],
				phone1:[],
				email:[]
			}	
		},
		created(){
			immoService.getInfoCompany()
				.then(res=>{
					const foDat=res[0]
					this.logo=foDat.logo
					this.phone1=foDat.phone1
					this.email=foDat.reserveemail
					this.company=foDat.company
				});
		}

	}
</script>

<style scoped>  
	.nav-logo>img{
		width: auto;
	}
	.nav-logo{
		padding: 10px
	}
	.nav-logo>b{
		
		color:#000;
		font-size: 20px;
		font-weight: 400;
		margin-top:20px;
	}
</style>