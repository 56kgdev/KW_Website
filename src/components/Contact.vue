<template>
	<div class="wrapper">
    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
		<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Contacto</h1>
						
						<ul class="breadcrumb">
							<li><router-link to="/">Inicio</router-link></li>
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
						<form id="contact-form" method="POST" v-on:submit.prevent="sendEmail" autocomplete="on">
							<div class="col-sm-12">
								<input type="text" name="name" placeholder="Nombre *" class="form-control  fromName" required="required" v-model="name"/>
							
								<input type="email" name="email" placeholder="Correo Electronico *" class="form-control  fromEmail" required="required" v-model="email" />

								<input type="tel" name="phone" placeholder="Telefono *" class="form-control  fromPhone" required="required" v-model="phone"/>
															
								<textarea id="message" name="message" placeholder="Mensaje *" class="form-control " required="required" v-model="message"></textarea> 								
							</div>							
							<div class="center">
								<button type="submit" id="sendMailContact" class="btn btn-default-color btn-lg "><i class="fa fa-envelope"></i> Enviar</button>
								<input type="submit" class="submit button" id="sendMailContactSuccess" disabled value="¡Mensaje enviado correctamente :)!">
                <input type="submit" class="submit button" id="sendMailContactError" disabled value="Ocurrió un error. Por favor recarga la pagina e intenta nuevamente :(">
							</div>
							<br>
						</form>
					</div>
          <br>	
					<!-- END MAIN CONTENT -->
				</div>
			</div>
		</div>
    <!-- END CONTENT WRAPPER -->
	</div>
</template>

<script>
  import RlLoader from '@/components/shared/Loader.vue'
  import VueResource from 'vue-resource'
  import immoService from '@/services/immo.js'
  import config from '@/services/config.js';
  export default {
    name: 'app',
    components: {
      RlLoader
    },
    data () {
      return {
        isSending: false,
        name: '',
        phone:'',
        email: '',
        message: '',
        /* Datos para correo electronico */          
          //Datos para informacion por mensaje
          urlSite:'https://ihomecancun.com/',
          company:'',		
          companyId:'',

          //Datos para banner de email
          logoPrev:'',
          addressCompany:'',
          phoneCompany:'',
          emailCompany:'',
          logoCompany:''
        /* Fin de datos para correo electronico */      
      }
    },
    created(){
      window.scrollTo(0,0);
      immoService.getInfoCompany()
        .then(res => {
          const foDat=res[0]
          this.urlSite=foDat.website
          this.company=foDat.company
          this.addressCompany=foDat.address1
          this.phoneCompany=foDat.phone1
          this.emailCompany=foDat.reserveemail
          this.logoCompany=foDat.logo
        }).then(()=>{
            this.companyId=config.companyId;
          }); 
    },
    methods: {
      sendEmail() {
        var tis = this;

        $.ajax({
          url: "https://www.immosystem.com.mx/api/mailWeb/mailerContact.php",
          type: "post",
          data: {
            name: tis.name,
            email: tis.email,
            message: tis.message,
            urlSite: tis.urlSite,
            company: tis.company,
            addressCompany: tis.addressCompany,
            phoneCompany: tis.phoneCompany,
            emailCompany: tis.emailCompany,
            logoCompany: tis.logoCompany
          },
          success: function(response) {
            console.log("se envió correctamente");
            $("#sendMailContact").css({ display: "none" });
            $("#sendMailContactSuccess").css({ display: "block" });
            tis.resetForm(tis);
            tis.getPosicion(tis);
          },
          error: function() {
            $("#sendMailContact").css({ display: "none" });
            $("#sendMailContactError").css({ display: "block" });
            tis.resetForm(tis);
            console.log("falló el envio de datos");
          }
        });
        return;
      },
      getPosicion(tis) {
        var lat;
        var lng;
        var address;
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            displayLocationInfo,
            errorLocation
          );
        }
        function displayLocationInfo(position) {
          lng = position.coords.longitude;
          lat = position.coords.latitude;
          result(lat, lng);
        }
        function errorLocation() {
          console.log("No se pudo obtener la ubicacion");
          lat = "0";
          lng = "0";
          address = "0";
          tis.sendDataImmo(lat, lng, address, tis);
        }
        function result(lat, lng, addressClient) {
          immoService.getLocation(lat, lng).then(res => {
            address = res;
            tis.sendDataImmo(lat, lng, address, tis);
          });
        }

        return;
      },
      sendDataImmo(lat, lng, address, tis) {
        var urls =
          "https://www.immosystem.com.mx/api/contact.php?companyid=" +
          tis.companyId +
          "&fullname=" +
          tis.name +
          "&email=" +
          tis.email +
          "&phone=" +
          tis.phone +
          "&message=" +
          tis.message +
          "&location=" +
          address +
          "&contacttype=1&latitude=" +
          lat +
          "&longitude=" +
          lng +
          "&soldagentid=0";

        console.log("enviando para salir", urls);

        $.ajax({
          url: urls,
          type: "get",
          success: function(respuesta) {
            console.log("coorecto");
          },
          error: function() {
            console.log("error en envio de datos a Immo");
          }
        });

        return;
      },
      resetForm(tis) {
        $("#name").attr("disabled", "disabled");
        $("#email").attr("disabled", "disabled");
        $("#phone").attr("disabled", "disabled");
        $("#message").attr("disabled", "disabled");

        return;
      }
    }
  }
</script>

<style scoped>
	a:hover {
		color: inherit;
	}
</style>
