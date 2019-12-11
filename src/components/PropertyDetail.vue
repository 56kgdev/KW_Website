<template>
    <ip-search v-if="searchCompleted" :properties="propertiesFound"></ip-search>
    
    <main v-else>
        <!-- BEGIN PAGE TITLE/BREADCRUMB --> 
        <div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">    
            <div class="container">    
                <div class="row">    
                    <div class="col-sm-12">    
                        <h1 class="page-title">Detalle de la propiedad</h1>        
                        <ul class="breadcrumb">    
                            <li><router-link to="/">Inicio </router-link></li>    
                            <li><router-link to="/propiedades">Propiedades</router-link></li>    
                            <li><a >Detalle de la propiedad</a></li>    
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
                    <div class="main col-sm-8 ">   
                        
                        <!-- BEGIN MAIN INFORMATION -->  
                        <h1 class="property-title">{{ property.propiedad }}<small>{{ property.city }}</small></h1>        
                        <div class="property-topinfo">    
                            <ul class="amenities">    
                                <li v-if="property.precio>0"><i class="icon-apartment"></i><b>En venta</b></li>
    
                                <li v-if="property.precioM>0"><i class="icon-apartment"></i><b>En renta</b></li>
    
                                <li v-if="property.holiday_price>0"><i class="icon-apartment"></i><b>Renta vacacional</b></li>
    
                                <li><i class="icon-house"></i>{{property.typepropertyspa}}</li>
    
                                <li v-if="property.mc != 0" ><i class="icon-area"></i> <strong> {{ property.mc }} m<sup>2</sup></strong></li>

                                <li v-else-if="property.ml != 0" ><i class="icon-area"></i> <strong> {{ property.ml }} m<sup>2</sup></strong></li>
    
                                <li v-if="property.recamaras!='0'"><i class="icon-bedrooms"></i> <strong> {{ property.recamaras }}</strong></li>
    
                                <li v-if="property.baños!='0'" ><i class="icon-bathrooms"></i><strong> {{ property.baños }}</strong></li>    
                            </ul>
        
                            <div id="property-id">
                                <b>Folio: #{{property.folio}}</b>
                            </div>
                        </div>
                        <!-- END MAIN INFORMATION -->  
    
                        <!-- BEGIN PROPERTY DETAIL SLIDERS WRAPPER -->    
                        <div id="property-detail-wrapper" class="style1">    
                            <div class="price" v-if="property.precio > 0">    
                                <i class="fa fa-home"></i>En venta    
                                <span style="color:#fff;">${{ property.precio | format }} {{ property.MonedaVenta }}</span>
                                <b id="leyendaPrecios">*PRECIOS SUJETOS A CAMBIOS SIN PREVIO AVISO</b>    
                            </div>
    
                            <div class="price" v-else-if="property.precioM>0">    
                                <i class="fa fa-home"></i>En renta    
                                <span style="color:#fff;">${{ property.precioM | format}} {{ property.rentaMoneda}}</span>                                
                                <b id="leyendaPrecios">*PRECIOS SUJETOS A CAMBIOS SIN PREVIO AVISO</b>
                            </div>
    
                            <div class="price" v-else-if="property.holiday_price!=0">
                                <i class="fa fa-home"></i>Renta vacacional    
                                <span style="color:#fff;">${{ property.holiday_price | format}} {{ property.vacation_rental_currency}}</span>                                
                                <b id="leyendaPrecios">*PRECIOS SUJETOS A CAMBIOS SIN PREVIO AVISO</b>
                            </div>                                                                                 
    
                             <div class="card-carousel">                                       
                                <div class="card-img" :style="'background-image:url('+currentImage+');'">    
                                    <!--<img :src="currentImage" alt="">-->
    
                                    <div class="actions">    
                                        <span @click="prevImage" class="prev">    
                                            <i class="glyphicon glyphicon-chevron-left"></i>        
                                        </span>          
                                         
                                        <span @click="nextImage" class="next">            
                                            <i class="glyphicon glyphicon-chevron-right"></i>            
                                        </span>    
                                    </div>    
                                </div>
    
                                <carousel :per-page="4" :navigationEnabled="false" :scrollPerPage="true" :loop="true" :mouse-drag="true" paginationColor="#000" paginationActiveColor="#f6ce48">    
                                    <slide v-for="(photo, index) in  photos" :key="photo" :index="index" :class="['thumbnail-image', (activeImage == index) ? 'active' : '']" :data-index="index">    
                                        <img :src="photo" @click="activateImage(index)">    
                                    </slide>    
                                </carousel>                                                   
                            </div>    
                        </div>
                        <br>
                         <!-- END PROPERTY DETAIL SLIDERS WRAPPER -->

                        <!-- BEING IMMO CONTENT --> 
                        <h2>Descarga el contenido de esta propiedad</h2>
                        <hr>
                        <div>
                           <h4 style="color:#000;">Banners</h4>
                           <ul class="buttons-content">												
                              <li v-if="property.banner1">												
                                 <a class="button-flyer" target="_blank" :href="property.banner1">
                                    <i class="fa fa-file-image-o"></i> 1 Foto
                                 </a>
                              </li>
                              <li v-if="property.banner3">
                                 <a class="button-flyer" target="_blank" :href="property.banner3">
                                    <i class="fa fa-file-image-o"></i> 3 Fotos
                                 </a>
                              </li>	
                              <li v-if="property.banner4">												
                                 <a class="button-flyer" target="_blank" :href="property.banner4">
                                    <i class="fa fa-file-image-o"></i> 4 Fotos
                                 </a>
                              </li>
                              <li v-if="property.banner6">												
                                 <a class="button-flyer" target="_blank" :href="property.banner6">
                                    <i class="fa fa-file-image-o"></i> 6 Fotos
                                 </a>
                              </li>		
                           </ul>	

                           <br>
                           <h4 v-if="property.flyerEs || property.flyerEn" style="color:#000;">FLYERS</h4>
                           <ul class="buttons-content">												
                              <li v-if="property.flyerEs">												
                                 <a class="button-flyer" target="_blank" :href="property.flyerEs">
                                    <i class="fa fa-file-pdf-o"></i> FLYER ESPAÑOL
                                 </a>
                              </li>
                              <li v-if="property.flyerEn">												
                                 <a class="button-flyer" target="_blank" :href="property.flyerEn">
                                    <i class="fa fa-file-pdf-o"></i> FLYER INGLES
                                 </a>
                              </li>		
                           </ul>			
                        </div>
                        <br>   
                        <br>
                        <!-- END IMMO CONTENT --> 
                        
                        <!-- BEING SHARE IN SOCIAL NETWORK --> 
                        <h2>Comparte en redes sociales</h2>
                        <hr>
                        <div class="social_areaProp">                           
                           <ul>												
                              <li><a class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook" :href="'https://www.facebook.com/sharer/sharer.php?u='+ruta" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"  :href="'https://twitter.com/intent/tweet?text='+ruta" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a class="linkedin" data-toggle="tooltip" data-placement="top" title="Linkedin" :href="'https://www.linkedin.com/sharing/share-offsite/?url='+ruta" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                              <li><a class="gmas" data-toggle="tooltip" data-placement="top" title="Google Plus" :href="'https://plus.google.com/share?url='+ruta" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>							
                              <li><a class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest" :href="'https://www.pinterest.com.mx/pin/create/button/?url='+ruta+'&media='+photos[0]+'&description='+property.webEsp" target="_blank" ><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                              <span class="whatsButton">
                                 <h4>Contáctanos por WhatsApp
                                    <a class="contact-links" data-toggle="tooltip" data-placement="top" title="Contactar en WhatsApp" :href="'https://api.whatsapp.com/send?text=Buen día estoy interesado en esta propiedad: '+ruta+'&phone='+phoneCompany" target="_blank">
                                       <i style="float:none; margin-left:15px;font-size:25px;line-height:40px;" class="fa fa-whatsapp"></i>
                                    </a> 
                                 </h4>										 									
                              </span>	
                           </ul>		                           	
                        </div>
                        <br>  
                        <br>
                        <!-- END SHARE IN SOCIAL NETWORK --> 

                        <!-- BEING DESCRIPTION --> 
                        <h1>Descripción</h1>    
                        <hr>    
                        <div class="tabs">    
                            <ul class="nav nav-tabs">                                    
                                <li v-if="property.webEsp != '0'">    
                                    <a data-toggle="tab" href="#Spanish">    
                                        <b>	Español </b>    
                                    </a>    
                                </li>
    
                                <li v-if="property.webEng != '0'">    
                                    <a data-toggle="tab" href="#English">    
                                        <b>English</b>    
                                    </a>    
                                </li>    
                            </ul>
    
                            <div class="tab-content">    
                                <div id="Spanish" class="tab-pane active">    
                                    <div class="description">    
                                        <p>    
                                            <pre> {{ property.webEsp }}</pre> 
                                        </p>    
                                    </div>    
                                </div>
    
                                <div id="English" class="tab-pane ">    
                                    <div class="description">    
                                        <p>    
                                            <pre> {{ property.webEng }}</pre>    
                                        </p>    
                                    </div>    
                                </div>    
                            </div>    
                        </div>
                        <!-- END DESCRIPTION --> 
                            
                        <!-- BEING AMENITIES INFORMATION --> 
                        <h1>Amenidades</h1>    
                        <hr>
                        <ul class="property-amenities-list col-md-3" v-if="interiors">    
                            <li v-for="(int,n) in interiors" :index="n" :key="int">    
                                <i class="fa fa-check" style="color:#000;"></i> {{ int }}    
                            </li>    
                        </ul>

                        <ul class="property-amenities-list col-md-3" v-if="exteriors">    
                            <li v-for="(ext,n) in exteriors" :index="n" :key="ext">    
                                <i class="fa fa-check" style="color:#000;"></i> {{ ext }}    
                            </li>    
                        </ul>
    
                        <ul class="property-amenities-list col-md-3" v-if="dev">    
                            <li v-for="(dev,n) in  dev" :index="n" :key="dev">    
                                <i class="fa fa-check" style="color:#000;"></i> {{ dev }}    
                            </li>                            
                        </ul>
    
                        <ul class="property-amenities-list col-md-3" v-if="maintenance">    
                            <li v-for="(maint,n) in maintenance" :index="n" :key="maint">    
                                <i class="fa fa-check" style="color:#000;"></i> {{ maint}}
                            </li>
                        </ul>    
                        <br>
                        <!-- END AMENITIES INFORMATION --> 

                        <!-- BEING CHARACTERISTICS INFORMATION --> 
                        <h1 class="section-title">CARACTERISTICAS DE LA PROPIEDAD</h1>    
                        <div style="position:relative;">
                            <ul class="property-features col-md-6">    
                                <li v-if="property.direccion ">    
                                    <i class="icon-sale-sign"></i>{{property.direccion}}    
                                </li>
    
                                <li v-if="property.referenciaEsp">    
                                    <i class="icon-house-usd"></i>{{property.referenciaEsp}}    
                                </li>    
                            </ul>    
                            <ul class="property-features col-md-6">            
                                <li v-if="property.descMuebles">    
                                    <i class="icon-rooms"></i>{{property.descMuebles}}    
                                </li>
    
                                <li v-if="property.mJardin">    
                                    <i class="icon-garden"></i>Metros de jardin: {{property.mJardin}}    
                                </li>    
                            </ul>    
                        </div>
                        <!-- END CHARACTERISTICS INFORMATION --> 
                        
                        <!-- BEING SERVICES INFORMATION -->    
                        <h1 v-if="property.services" class="section-title">Servicios</h1>    
                        <ul class="property-amenities-list col-md-6" v-if="property.services">    
                            <li v-for="(serv,n) in services" :index="n" :key="serv">    
                                <i class="fa fa-check" style="color:#000;"></i> {{ serv }}    
                            </li>    
                        </ul>
                        <!-- END SERVICES INFORMATION -->      

                        <!-- BEING VIDEO-PROPERTY -->    
                        <h1 class="section-title" v-if="property.ver_video!='0'">Video</h1>                    
                        <div v-if="property.ver_video!='0'" class="video-contain">															
                            <iframe :src="property.ver_video" frameborder="0" :data-href="property.ver_video"></iframe>                            
                        </div>                                                                            
                        <!-- END VIDEO-PROPERTY -->                                      
                    </div>    
                    <!-- END MAIN CONTENT -->
            
                    <!-- BEGIN SIDEBAR -->    
                    <div class="sidebar gray col-sm-4">    
                        <!-- BEGIN ADVANCED SEARCH -->    
                        <h2 class="section-title">Buscar propiedades</h2>
                        <ip-search-form-prop @select="setPropertiesFound"></ip-search-form-prop>                                
                    </div>    
                    <!-- END SIDEBAR -->            
                </div>  
                <div class="row">
                    <div class="col-md-10">
                        <!-- BEING AGENT INFORMATION -->    
                    <h1 class="section-title">Información del agente</h1>

                    <div class="property-agent-info">    
                        <div class="agent-detail col-md-6" align="center">                                            
                            <div class="info">        

                                <header >    
                                    <h2 style="text-align: left; font-size: 20pt;">{{ property.fullname }}</h2>
                                </header>    

                                <ul class="contact-us" align="left">

                                    <li><i class="fa fa-envelope"></i>{{property.email}}</li>

                                    <li><i class="fa fa-phone"></i> {{ property.cellphone }}</li>
                                    
                                </ul>

                                <div class="share-wraper col-sm-12">

                                    <h5><b> Síguenos y comparte:</b></h5>

                                    <ul class="social-networks">
                                        <li>
                                            <a style="color:#2ab160;" data-toggle="tooltip" data-placement="top" title="Compartir en WhatsApp" :href="'https://api.whatsapp.com/send?text=Buen día estoy interesado en esta propiedad: '+ruta+'&phone='+agentPhone" target="_blank">
                                                <i class="fa fa-whatsapp"></i>
                                            </a>
                                        </li>

                                        <li v-if="property.fb != '0'"><a class="facebook"  target="_blank" :href="property.fb"><i class="fa fa-facebook"></i></a></li>

                                        <li v-if="property.tweet != '0' "><a class="twitter"  target="_blank" :href="property.tweet"><i class="fa fa-twitter"></i></a></li>

                                        <li v-if="property.gmas != '0'"><a  class="gmas" target="_blank" :href="property.gmas"><i class="fa fa-google"></i></a></li>

                                        <li v-if="property.pinterest != '0'"><a class="pinterest"  target="_blank" :href="property.pinterest"><i class="fa fa-pinterest"></i></a></li>

                                        <li v-if="property.skypeid != '0'"><a  class="twitter" :href="property.skypeid"><i class="fa fa-skype"></i></a></li>    
                                    </ul>                                               
                                </div>    
                                <br>    
                                <br>    
                            </div>    
                        </div>        
                            
                        <form align="center" id="contactoform" name="contactProp-form" v-on:submit.prevent="sendEmail" class="form-style col-md-6 " method="POST" autocomplete="on">

                            <h2 align="center">Contacto</h2>

                            <div class="col-sm-12">    
                                <input type="text" id="name" name="name" placeholder="Nombre*" class="form-control fromName" required="required" v-model="name"/>    
                            </div>            
                            <div class="col-sm-12">    
                                <input type="email" id="email" name="email" placeholder="Correo Electrónico*" class="form-control fromEmail" required="required" v-model="email"/>    
                            </div>            
                            <div class="col-sm-12">    
                                <input type="tel" id="phone" name="phone" placeholder="Teléfono*" class="form-control required subject" required="required" v-model="phone"/>    
                                <textarea id="message" name="message" placeholder="Mensaje*" class="form-control" required="required" v-model="message"></textarea>                                           
                            </div>        
                            <div class="center">    
                                <button type="submit" id="sendMailContact" class="btn btn-default-color "><i class="fa fa-envelope"></i>Enviar</button>
                                <span class="submit button" id="sendMailContactSuccess" disabled > ¡Mensaje enviado correctamente :)!</span>
                                <span class="submit button" id="sendMailContactError" disabled>Ocurrió un error. Por favor recarga la pagina e intenta nuevamente :(</span>
                            </div>    
                        </form>    
                    </div>    
                    <!-- END AGENT INFORMATION -->
                    </div>
                </div>  
            </div>    
        </div>    
    </main>
</template>

<script>
    import immoService from '@/services/immo.js'    
    /*import Carousel from '@/components/carousel/Carousel'*/    
    /*import CarouselSlide from '@/components/carousel/CarouselSlide'*/    
    import numeral from 'numeral'    
    import VueResource from 'vue-resource'    
    import IpSlideProp from '@/components/slideProperty.vue'    
    import Vue from 'vue'    
    import VueCarousel from 'vue-carousel'    
    import IpSearchFormProp from '@/components/SearchFormProp.vue'    
    import IpSearch from '@/components/Search.vue'    
    import RlLoader from '@/components/shared/Loader.vue'    
    import IpProperty from '@/components/Property.vue'  
    import config from '@/services/config.js';    
    import {    
        Carousel,    
        Slide    
    } from 'vue-carousel';
            
    Vue.use(VueCarousel);
    
    export default {
    
        name: 'app',
        components: {    
            IpSlideProp,    
            Carousel,    
            Slide,    
            IpSearchFormProp,    
            IpSearch,    
            RlLoader,    
            IpProperty
        },
    
        data() {            
            return {
                video:'',
                idSocialVideo:'',
                
                property: {},
    
                photos: [],                
    
                interiors: [],
    
                exteriors: [],
    
                services: [],
    
                services1: [],
    
                services2: [],
    
                dev: [],
    
                maintenance: [],
    
                id: [],
    
                descripcion: [],
    
                des: [],
    
                precio: [],                    
    
                precioRenta: [],
    
                precioVenta: [],
        
                /* Datos para correo electronico */
            
                //Datos para informacion por propiedad
    
                urlSite: 'https://ihomecancun.com/',
    
                company: '',

                companyId:'',

                agentId:'',

                agentName: '',

                agentPhone: '',
    
                agentEmail: '',
    
                name: '',
    
                email: '',
    
                phone: '',
    
                message: '',
        
                folioProp: '',        
    
                //Datos para banner de email
    
                logoPrev: '',
        
                addressCompany: '',
    
                phoneCompany: '',
    
                emailCompany: '',
    
                logoCompany: '',   

                /* Fin de datos para correo electronico */
                   
                isLoading: false,
    
                isSearching: false,
    
                selectedType: '0',
    
                selectedOperation: '0',
    
                selectedCity: '0',
    
                searchCompleted: false,
    
                propertiesFound: {},
        
                activeImage: 0
            }
        },
    
        computed: {    
            currentImage() {    
                return this.photos[this.activeImage];    
            }    
        },
    
        created() {
            window.scrollTo(0,0);
            this.isLoading = false
            const id = this.$route.params.id
            let agentId=0;	

			if(this.$route.params.a){
                console.log("con agente")
                agentId=this.$route.params.a;
                this.ruta =this.urlSite+"propiedades-" +	this.$route.params.id + '-' + this.$route.params.a;	
			}else if( this.$route.params.namePropFilt ){
				console.log("con nombre")
                this.ruta=this.urlSite+'propiedad-'+this.$route.params.id+'-'+this.$route.params.namePropFilt;
			}else{
				console.log("sin nombre")
				this.ruta =this.urlSite+"propiedades-" +	this.$route.params.id;	
            }
            let cont = 0;
        
            immoService.getDetPropById(id)    
                .then(res => {                
                    if (res.property.company ==config.companyId) {
                        const property = res.property
                        this.agentName = property.fullname
                        this.agentPhone = property.cellphone.replace(/[-_ .*+?^${}()|[\]\\]/g,'');
                        this.agentId=property.user    
                        this.agentEmail = property.email                                                
                        this.video=property.ver_video
                        this.property = property
                        this.photos = property.photos
                        this.interiors = property.interiores
                        this.exteriors = property.exterior
                        this.services = property.services
                        this.dev = property.development
                        this.maintenance = property.maintenance
                        this.id = property.id
                        /*
                            Formateo del texto*/

                        this.des = property.webEsp
                        this.property.webEsp = property.webEsp.replace("<br/>","\n");
                        this.property.webEsp = this.property.webEsp.replace("<br>","\n");
                        this.property.webEsp = this.property.webEsp.replace("<br>","\n");
                        this.property.webEng = property.webEng.replace("<br/>","\n");
                        this.property.webEng = this.property.webEng.replace("<br>","\n");
                        this.property.webEng = this.property.webEng.replace("<br>","\n");
                        this.folioProp = property.folio;
                        this.isLoading = true

                    } else {
                        this.$router.push({
                            name: '404'
                        })
                    }
                })
                .then(()=>{                    
                    this.idSocialVideo=this.filtVideo(this.video);     
                    this.sendDataPropertyAccess();                           
                })
    
            immoService.getInfoCompany()    
                .then(res => {    
                    const foDat = res[0]    
                    //this.urlSite = foDat.website    
                    this.company = foDat.company    
                    this.addressCompany = foDat.address1    
                    this.phoneCompany = foDat.phone1.replace(/[-_ .*+?^${}()|[\]\\]/g,'');
                    this.emailCompany = foDat.reserveemail    
                    this.logoCompany = foDat.logo    
                    this.isLoading = true    
                }).then(()=>{
                    this.companyId=config.companyId;
                });                
        },
    
        filters: {    
            truncate: function(str) {    
                return str.substring(0, 125) + '...'    
            },    
            format: function(value) {    
                return numeral(value).format('0,0')    
            }    
        },            

        methods: {
            sendDataPropertyAccess(){
                let propData={
                    "company": this.companyId,
                    "propertyId":this.folioProp,
                    "url":this.ruta 
                };
                immoService.sendDataClick(propData)
                /*immoService.getClickLocation()
                .then(res=>{
                    propData.latitude=res.geoplugin_latitude;
                    propData.longitude=res.geoplugin_longitude;
                }).then(()=>{
                    immoService.sendDataClick(propData)
                })*/					
            },   
            filtVideo(url){
                
                var filtUrl=url.replace('https://www.','');                
                var idChar=filtUrl[0];                
                //this.idSocialVideo=idChar;

                return idChar;
            },

            nextImage() {
    
                var active = this.activeImage + 1;
    
                if (active >= this.photos.length) {
    
                    active = 0;
    
                }
    
                this.activateImage(active);
    
            },
    
            // Go backwards on the images array 
    
            // or go at the last image
    
            prevImage() {
    
                var active = this.activeImage - 1;
    
                if (active < 0) {
    
                    active = this.photos.length - 1;
    
                }
    
                this.activateImage(active);
    
            },
    
            activateImage(imageIndex) {
    
                this.activeImage = imageIndex;
    
            },        
    
            setPropertiesFound(properties) {    
                this.propertiesFound = properties    
                //this.searchCompleted = true
                this.$router.push({ name: "search", params: { properties } });    
            },
    
            getAsyncData: function() {    
                var self = this    
                window.setTimeout(function() {    
                    self.title = 'My async title'    
                    self.$emit('updateHead')    
                }, 3000)    
            },                
            sendEmail(){
                var tis = this;
                $.ajax({
                    url: "https://www.immosystem.com.mx/api/mailWeb/mailer.php",
                    type: "post",
                    data: {
                        name:tis.name,
                        email:tis.email,
                        phone:tis.phone,
                        message:tis.message,
                        folioProp: tis.folioProp,
                        urlSite: tis.urlSite,
                        ruta:tis.ruta,
                        company: tis.company,
                        agentName: tis.agentName,
                        agentEmail: tis.agentEmail,
                        agentPhone: tis.agentPhone,
                        addressCompany: tis.addressCompany,
                        phoneCompany: tis.phoneCompany,
                        emailCompany: tis.emailCompany,
                        logoCompany: tis.logoCompany
                    },
                    beforesend: function() {
                        console.log("Procesando para enviar");
                    },
                    success: function(response) {
                        console.log("se envió correctamente");
                        $('#sendMailContact').css({'display': 'none'});
                        $('#sendMailContactSuccess').css({'display': 'block'});
                        tis.resetForm(tis);
                        tis.getPosicion(tis);
                    },
                    error: function() {
                        $('#sendMailContact').css({'display': 'none'});
                        $('#sendMailContactError').css({'display': 'block'});
                        console.log("falló el envio de datos");
                        tis.resetForm(tis);
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
                    console.log("datos de ubicacion: ",lat+','+lng)
                    result(lat, lng);
                }
                function errorLocation() {
                    console.log("No se pudo obtener la ubicacion");
                    lat = '0';
                    lng='0';
                    address='0';
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
                    'https://www.immosystem.com.mx/api/contact.php?companyid='+
                    tis.companyId+
                    '&fullname=' +
                    tis.name +
                    '&email=' +
                    tis.email +
                    '&phone=' +
                    tis.phone +
                    '&message=' +
                    tis.message +
                    //'&num_desarrollo='+
                    '&propertyid='+
                    tis.folioProp+					
                    '&location=' +
                    address +
                    '&contacttype=2&latitude='+
                    lat +
                    '&longitude='+
                    lng+
                    '&soldagentid='+
                    tis.agentId;
                
                $.ajax({
                    url: urls,
                    type:"get",
                    success: function(respuesta) {
                        console.log("coorecto")
                    },     
                    error:function(){
                        console.log("error en envio de datos a Immo");
                    }                           
                });

                return;
            },
            resetForm(tis){
                $("#name").attr("disabled","disabled");
                $("#email").attr("disabled","disabled");
                $("#phone").attr("disabled","disabled");
                $("#message").attr("disabled","disabled");      

                return;
            }
        }    
    }
</script>

<style scoped>

    a {
    
        text-decoration: none;
    
    }
        
    pre {
    
        white-space: pre-wrap;
    
        height: auto;
    
        overflow: hidden;
    
        background: transparent;
    
        border-color: transparent;
    
        color: #000;
    
        font-family: 'Open Sans', sans-serif;
    
        font-size: 15px;
    
        text-align: justify;
    
    }
    .custom-dropdown {
        position: relative !important;
        display: inline-block !important;
        vertical-align: middle !important;
        margin-bottom: 10px !important;/* demo only */
        width: 100%;
    }
    
    .custom-dropdown select {
        background-color: #fff !important;
        color: #74777c !important;
        font-size: inherit !important;
        padding: .5em !important;
        padding-right: 2.5em !important; 
        border: 1px solid #74777c !important;
        margin: 0 !important;
        border-radius: 5px !important;
        text-indent: 0.01px !important;
        text-overflow: '' !important;
        -webkit-appearance: button !important; /* hide default arrow in chrome OSX */
        width:100% !important;
    }
    .custom-input input[type=text]{
        margin-bottom: 10px !important;
    }
     .form-group {
        padding: 15px;
    }
    .custom-input input[type=text],
    input[type=text],    
    input[type=email],    
    input[type=tel],    
    textarea {
    
        width: 100% !important;
    
        height: 60px;
    
        padding: 12px 20px;
    
        margin: 8px 0;
    
        display: inline-block;
    
        border: 1px solid rgba(0, 0, 0, 0.555);
    
        box-sizing: border-box;
    
    }
    
    @media (max-width:530px) {
        .form-group {
            padding-left: 40px;
        }
        .custom-input input[type=text]{
            margin-bottom: 10px;
        }
        
        .custom-input input[type=text],
        input[type=text],
    
        input[type=email],
    
        input[type=tel],
    
        textarea {
    
            width: 100% !important;
    
            height: 60px;
    
            margin: 2px 0;
    
            display: inline-block;
    
            border: 1px solid rgba(0, 0, 0, 0.555);
    
            box-sizing: border-box;
    
        }    
    }
                        
    .card-carousel {
        user-select: none;    
    }
        
    .thumbnails {
    
        display: inline-flex;
    
        justify-content: space-evenly;
    
        flex-direction: row;
    
        width: 100%;
    
    }
    
    .thumbnail-image {
    
        display: flex;
    
        align-items: center;
    
        cursor: pointer;
    
        padding: 2px;
    
    }
    
    .thumbnail-image>img {
    
        width: 100%;
    
        height: 150px;
    
        transition: all 250ms;
    
        opacity: 0.5;
    
    }
    
    .thumbnail-image:hover>img,
    .thumbnail-image.active>img {
    
        opacity: 1;
    
        box-shadow: 2px 2px 6px 1px rgba(0, 0, 0, 0.5);
    
    }
     
    .card-img {
    
        position: relative;
    
        margin-bottom: 15px;
        background-position: center center;
        height: 450px;
        background-size: contain;
    
    }
    
    .card-img>img {
    
         display: block;
    
        margin: 0 auto;
    
        width: 100%;
    
        height: auto;
    
    }

    .actions {
    
        font-size: 2.5em;
    
        height: 40px;
    
        position: absolute;
    
        top: 50%;
    
        margin-top: -20px;
    
        width: 100%;
    
        display: flex;
    
        align-items: center;
    
        justify-content: space-between;
    
        color: #4a5677;
    
    }
    
    .actions>span {
    
        cursor: pointer;
    
        transition: all 250ms;
    
    }

    .actions>span.prev {
    
        margin-left: 5px;
    
    }

    .actions>span.next {
    
        margin-right: 5px;
    
    }
    
    .actions>span:hover {
    
        color: #eee;
    
    }

    .video-contain{
        position: relative;
        width: 100%;
        height: 600px;
    }

    .video-contain>iframe{
        width:100%;
        height:100%;
    }
    
    @media only screen and (max-width: 991px){
      .video-contain{			
         height:400px;
      }	
    }
    
    .whatsappButtom{
        margin-right: 100px !important;        
    }

    .fbButton{
            float:right;
    }
   
    #leyendaPrecios{        
            float: right;
        font-size: 11px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

</style>
