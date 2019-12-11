<template>
	<div class="wrapper">
    <!-- BEGIN PAGE TITLE/BREADCRUMB -->
		<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Ofrezca Su Inmueble</h1>
						
						<ul class="breadcrumb">
							<li><router-link to="/">Inicio</router-link></li>
							<li><b>Ofrezca Su Inmueble</b></li>
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
						<h2 class="section-title">Ofrezca Su Inmueble</h2>						
												
						<form id="offerProp-form" method="POST" v-on:submit.prevent="sendEmail" autocomplete="on">
							<div class="form-group">
                <div class="col-sm-12"> 
                  
                  <input type="text" id="name" name="name" placeholder="Nombre *" class="form-control  fromName" required="required" v-model="name"/>
                  
                  <input type="email"  id="email" name="email" placeholder="Correo Electronico *" class="form-control  fromEmail" required="required" v-model="email" />

                  <input type="tel"  id="phone" name="phone" placeholder="Telefono *" class="form-control  fromPhone" required="required" v-model="phone"/>                  
                  <br>

                  <label for="property-type" style="float:left;">Tipo de inmueble que desea ofrecer. <sup>*</sup></label>
                  <select name="property-type" id="property-type" required="required" class="form-control" data-placeholder="Status" v-model="typeProp">
                    <option value="Casa" selected>Casa</option>
                    <option value="Departamento">Departamento</option>
                    <option value="Rancho, hacienda, villa y quinta">Rancho, hacienda, villa y quinta</option>
                    <option value="Terreno">Terreno</option>
                    <option value="Edificio">Edificio</option>
                    <option value="Oficina">Oficina</option>
                    <option value="Bodega">Bodega</option>
                  </select>
                  <br>

                  <label for="contact-type" style="float:left;">Desea que ... <sup>*</sup></label>
                  <select name="contact-type" id="contact-type" required="required" class="form-control " v-model="contactType">
                    <option value="Correo electrónico" selected>Le escriban</option>
                    <option value="Llamada">Le llamen</option>                  
                    <option value="Visita">Lo visiten</option>                  
                  </select>

                  <br>                  
                  <textarea id="message" name="message" placeholder="Mensaje *" class="form-control " required="required" v-model="message"></textarea>
                </div> 								
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
          logoCompany:'',
        /* Fin de datos para correo electronico */
        //Datos extra
        typeProp:'Casa',
        contactType:'Correo electrónico'
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
          url: "https://www.immosystem.com.mx/api/mailWeb/mailerOfferProp.php",
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
            logoCompany: tis.logoCompany,
            //datos extra
            contactType:tis.contactType,
            typeProp:tis.typeProp
          },
          success: function(response) {
            console.log("se envió correctamente");
            $("#sendMailContact").css({ display: "none" });
            $("#sendMailContactSuccess").css({ display: "block" });
            tis.resetForm(tis);            
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
      resetForm(tis) {
        $("#name").attr("disabled", "disabled");
        $("#email").attr("disabled", "disabled");
        $("#phone").attr("disabled", "disabled");
        $("#message").attr("disabled", "disabled");
        $("#property-type").attr("disabled", "disabled");
        $("#contact-type").attr("disabled", "disabled");      

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
