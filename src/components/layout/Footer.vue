<template>
	<!-- BEGIN FOOTER -->
	<footer id="footer">		
		<!-- BEGIN MAIN FOOTER INFORMATION -->
		<div id="footer-top" class="container">
			<div class="row">
				<br>
				<!-- BEGIN LOGO -->
				<div style="text-align:center;" class="block col-sm-4">					
					<router-link to="/" class="footer-logo">
						<img v-if="logo!=0" :src="'http://agent.immosystem.com.mx/'+logo" :alt="company" />
						<b v-else>{{company}}</b>
					</router-link>
					<br>
					<br>					
				</div>
				<!-- END LOGO-->

				<!-- BEGIN CONTACT INFORMATION -->
				<div class="block col-sm-4">
					<h3>Información de Contacto</h3>
					<ul class="footer-contacts">
						<li v-if="address!='0'"><i class="fa fa-map-marker"></i> {{address}}</li>							
						<li v-if="phone1!='0'"><i class="fa fa-phone"></i><a :href="'tel:+52'+phone1">{{phone1}}</a></li>						
						<li v-if="email!='0'"><i class="fa fa-envelope"></i> <a :href="'mailto:'+email">{{email}}</a></li>
					</ul>
				</div>
				<!-- END CONTACT INFORMATION -->

				<!-- BEGIN MENU PAGES -->
				<div class="block col-sm-4">
					<h3>Menú</h3>
					<ul class="footer-links">
						<li><router-link to="/">Inicio</router-link></li>
						<li><router-link to="/nosotros">Nosotros</router-link></li>
						<li><router-link to="/propiedades">Propiedades</router-link></li>
						<li><router-link to="/contacto">Contacto</router-link></li>
						<li><router-link to="/nuestro-equipo">Nuestro equipo</router-link></li>
						<!--<li><router-link to="/oferta-tu-propiedad">Ofrezca su inmueble</router-link></li>-->
						<!--<li><router-link to="/aviso-privacidad">Aviso de privacidad</router-link></li>-->
						<li><a href="http://agent.immosystem.com.mx/" target="_blank">Acceder a IMMO System<sup>&copy;</sup></a></li>
					</ul>
				</div>	
				<!-- END MENU PAGES -->				
			</div>			

			<!-- BEGIN SOCIAL NETWORKS -->
			<div class="dadFace">				
				<ul class="social-networks" id="footer_social"> 
					<li v-if="fb!='0' || tw!='0' || gmas!='0' || linkedin!='0' || youtube!='0' || skype!='0' || pinterest!='0' "><h4><b> Síguenos:</b></h4></li> <!-- || pinterest!='0' -->
					<li v-if="fb!='0'"><a data-toggle="tooltip" data-placement="top" title="Facebook"  class="facebook" :href="fb" target="_blank"><i class="fa fa-facebook"></i></a>
					</li>
					<li v-if="tw!='0'"><a data-toggle="tooltip" data-placement="top" title="Twitter"  class="twitter" :href="tw"><i class="fa fa-twitter"></i></a>
					</li>
					<li v-if="gmas!='0'"><a data-toggle="tooltip" data-placement="top" title="Google Plus"  class="gmas" :href="gmas"><i class="fa fa-google-plus"></i></a>
					</li>
					<li v-if="linkedin!='0'"><a data-toggle="tooltip" data-placement="top" title="Linkedin"  class="linkedin" :href="linkedin"><i class="fa fa-linkedin"></i></a>
					</li>
					<li v-if="youtube!='0'"><a data-toggle="tooltip" data-placement="top" title="Youtube"  class="pinterest" :href="youtube"><i class="fa fa-youtube"></i></a>
					</li>
					<li v-if="skype != '0'"><a data-toggle="tooltip" data-placement="top" title="Skype"  class="twitter" :href="'skype:'+skype" target="_blank"><i class="fa fa-skype"></i></a>
					</li>
					<li v-if="pinterest != '0'"><a data-toggle="tooltip" data-placement="top" title="Pinterest"  class="pinterest" :href="pinterest" ><i class="fa fa-pinterest"></i></a>
					</li>	
				</ul>				
			</div>
			<br>
			<!-- END SOCIAL NETWORKS -->
		</div>
		<!-- END MAIN FOOTER INFORMATION -->
					
		<!-- BEGIN COPYRIGHT -->
		<div id="copyright">			
			<div class="container">					
				<div class="row">												
					<div class="col-sm-12">
						{{company}} <sup>&copy;</sup>  2019 Todos los derechos reservados.  <a href="https://www.immosystem.com.mx/" target="_blank">IMMO System<sup>&copy;</sup></a>
						<!--<router-link to="/aviso-privacidad" style="padding-top:-100px;font-style:normal; font-size:9px;"> AVISO DE PRIVACIDAD</router-link>-->
						<!-- BEGIN COPYRIGHT SOCIAL NETWORKS -->
						<ul class="social-networks" id="footer_social" style="float:left; padding-right:20px;">
							<li><h3> Comparte: </h3></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://ihomecancun.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Twitter"  class="twitter" href="https://twitter.com/intent/tweet?text=https://ihomecancun.com/"><i class="fa fa-twitter"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Google Plus" class="gmas" href="https://plus.google.com/share?url=https://ihomecancun.com/"><i class="fa fa-google-plus"></i></a></li>
							<li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=https://ihomecancun.com/"><i class="fa fa-linkedin"></i></a></li>						
							<li><a data-toggle="tooltip" data-placement="top" title="Pinterest" class="pinterest" :href="'https://www.pinterest.com.mx/pin/create/button/?url=https://ihomecancun.com/&media=http://agent.immosystem.com.mx/'+logo+'&description=Venta y renta de casas y más : https://ihomecancun.com/'" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						</ul>	
						<!-- END COPYRIGHT SOCIAL NETWORKS -->													
					</div>
				</div>
			</div>
		</div>
		<!-- END COPYRIGHT -->	
	</footer>
	<!-- END FOOTER -->
</template>

<script>
	import immoService from '@/services/immo.js';

	export default {
		name: 'app',
		data(){
			return{
				company:[],
				phone1:[],
				email:[],
				address:[],
				logo:[],
				fb:[],
				tw:[],
				gmas:[],
				linkedin:[],
				pinterest:[],
				skype:[],
				youtube:[]
			}
			
		},
		created(){
			immoService.getInfoCompany()
				.then(res => {
					const foDat=res[0]
					this.company=foDat.company
					this.phone1=foDat.phone1
					this.email=foDat.reserveemail
					this.address=foDat.address1
					this.fb=foDat.fb
					this.tw=foDat.tw
					this.linkedin=foDat.linkedin
					this.pinterest=foDat.pinterest
					this.skype=foDat.skypeid
					this.gmas=foDat.gmas
					this.youtube=foDat.youtube
					this.logo=foDat.logo
				})
		}
	}
</script>

<style scoped>
	.contact-links {
		font-size: inherit;
		text-transform: none;
	}

	.footer-logo img {
		margin-top:20%;
	}
	.footer-logo b {
		color:#000;
		font-size: 20px;
		font-weight: 400
	}

	.footer_contact {
		margin: 10px 0;
	}
</style>
