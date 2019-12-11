<?php  
    include include './base/base.php';

    $enlace_actual = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $porciones = explode("/", $enlace_actual );
    $porcion = explode("-", $porciones [3]);
   
    $data=getDataProperty($porcion[1]);
        
?> 
<div>
    <div class="welcome-slider-area">
        <div id="carouselArea" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4000">
            <!--ImageId-->
            <ol class="carousel-indicators carousel-indicators-slider">
                <li data-target="#carouselArea" data-slide-to="0" class="active"></li>
                <?php
                    $count=1;
                    foreach($data['photos'] as &$dat){                                                            
                ?>
                    <li key="<?php echo $count ?>" data-target="#carouselArea" :data-slide-to="<?php echo $count ?>"></li>                    
                <?php $count++;}?>

                
            </ol>
            <div class="carousel-inner text-center single-slide-item-table" role="listbox">
                <!--Items of Slide-->

                <!--First item/Image of Slide-->
                
                <!--Others items/Images of Slide-->
                <?php foreach($data['photos'] as &$photo){ ?>
                    <div :key="photo" :index="i" class="item ">
                        <div class="single-slide-item" style="background-image: url(<?php echo $data['photos'][$photo] ?>)">
                            <div class="single-slide-item-table">
                                <div class="single-slide-item-tablecell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

            </div>

            <a title="prev" class="carousel-control-prev" href="#carouselArea" role="button" data-slide="prev">
					<i class="fa fa-angle-left" style="font-size:70px;"></i>
				</a>
            <a title="next" class="carousel-control-next" href="#carouselArea" role="button" data-slide="next">
					<i class="fa fa-angle-right" style="font-size:70px;"></i>
  			</a>
        </div>
    </div>
    <!-- Start Content -->
    <br>
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="single_property">
                            <h2 class="page-title"><?php echo $data['propiedad'] ?>, <span class="location"><?php echo $data['city'] ?></span></h2>
                            <div class="price" v-if="property.precio>0"><span>$ <?php echo $data['precio'].$data['MonedaVenta']?></span></div>
                            <div class="price" v-if="property.precioM>0"><span>$ <?php echo $data['precioM'].$data['rentaMoneda'] ?> (Renta)</span></div>
                            <div class="price" v-if="property.holiday_price>0"><span>$ <?php echo $data['holiday_price'].$data['vacation_rental_currency'] ?><h5> (PRECIO POR <?php echo $data['rental_period'] ?>)</h5></span></div>
                            <b id="leyendaPrecios">*PRECIOS SUJETOS A CAMBIOS SIN PREVIO AVISO</b>
                            <span class="fbButton">
                                    Compartir : 
                                    <a target="_parent" class="fb-share-button " 
                                        data-href="<?php echo $enlace_actual?>" 
                                        data-layout="button">
                                        COMPARTIR EN FACEBOOK
                                    </a>
                                </span>
                                <br >
                                <br>
                            
                            
                            <div class="property-amenities clearfix" style="padding-left:3%; font-size:15px;">
                                <div class="single_property_price"><span style="float:right;">
										<strong  v-if="property.precio>0">EN VENTA </strong>
										<strong  v-if="property.precio>0 && property.precioM>0">Y </strong> 
										<strong v-if="property.precioM>0">EN RENTA</strong>
										<strong v-if="property.holiday_price>0">RENTA VACACIONAL</strong>
										<br>Folio: #<?php echo $data['folio'] ?></span>
                                </div>
                                <br>
                                <span class="area" v-if="property.mc!=0"><br>Construcción: <strong><?php echo $data['mc'] ?> m<sup>2</sup></strong></span>
                                <span class="parking" v-if="property.ml!=0"><br>Terreno: <strong><?php echo $data['ml'] ?> m<sup>2</sup></strong></span>
                                <span class="baths" v-if="property.baños>0"><br>Baños: <strong><?php echo $data['baños'] ?></strong></span>
                                <span class="beds" v-if="property.recamaras>0"><br>Recámaras: <strong><?php echo $data['recamaras'] ?></strong></span>
                            </div>
                            <br>
                            <h3>Descripción</h3>
                            <div class="tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a title="spanish" data-toggle="tab" href="#Spanish" >
											Español
										</a></li>
                                    <li v-if="property.webEng != 0"><a title="english" data-toggle="tab" href="#English" >
											English
										</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="Spanish" class="tab-pane active">
                                        <div class="description">
                                            <blockquote><?php echo $data['webEsp'] ?></blockquote>
                                        </div>
                                    </div>
                                    <div id="English" class="tab-pane">
                                        <div class="description">
                                            <blockquote><?php echo $data['webEng'] ?></blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a title="interiors" data-toggle="tab" href="#interiors" >
											Interiores
										</a></li>
                                    <li><a title="exteriors" data-toggle="tab" href="#exteriors" >
											Exteriores
										</a></li>
                                    <li><a title="services" data-toggle="tab" href="#services" >
											Servicios
										</a></li>
                                    <li><a title="desvelopments" data-toggle="tab" href="#dev" >
											Desarrollo
										</a></li>
                                    <li><a title="maintenance" data-toggle="tab" href="#maintenance" >
											Mantenimiento
										</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="interiors" class="tab-pane active">
                                        <div class="additional-amenities">
                                            <?php 
                                            $count=0;
                                            foreach($data['interiores']as &$int){?>
                                                <div class="available" index="n" :key="i" >
                                                    <i class="fa fa-check-square"></i> <?php $data['interiores'][$count] ?>
                                                </div>
                                            <?php $count++;}?>
                                        </div>
                                    </div>
                                    <div id="exteriors" class="tab-pane">
                                        <div class="additional-amenities">
                                            <?php 
                                            $count=0;
                                            foreach($data['exterior']as &$ext){?>
                                                <div class="available" index="n" :key="i" >
                                                    <i class="fa fa-check-square"></i> <?php $data['exterior'][$count] ?>
                                                </div>
                                            <?php $count++;}?>                                            
                                        </div>
                                    </div>
                                    <div id="services" class="tab-pane">
                                        <div class="additional-amenities">
                                            <?php 
                                            $count=0;
                                            foreach($data['services']as &$serv){?>
                                                <div class="available" index="n" :key="i" >
                                                    <i class="fa fa-check-square"></i> <?php $data['services'][$count] ?>
                                                </div>
                                            <?php $count++;}?> 
                                        </div>
                                    </div>
                                    <div id="dev" class="tab-pane">
                                        <div class="additional-amenities">
                                            <?php 
                                            $count=0;
                                            foreach($data['development']as &$dev){?>
                                                <div class="available" index="n" :key="i" >
                                                    <i class="fa fa-check-square"></i> <?php $data['development'][$count] ?>
                                                </div>
                                            <?php $count++;}?> 
                                        </div>
                                    </div>
                                    <div id="maintenance" class="tab-pane">
                                        <div class="additional-amenities">
                                            
                                            <?php 
                                            $count=0;
                                            foreach($data['maintenance']as &$maint){?>
                                                <div class="available" index="n" :key="i" >
                                                    <i class="fa fa-check-square"></i> <?php $data['maintenance'][$count] ?>
                                                </div>
                                            <?php $count++;}?> 

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <h3 v-if="property.ver_video!='0'">Video</h3>
							<hr>
							<div v-if="property.ver_video!='0'" class="video-contain">
									
								<iframe src="<?php echo $data['ver_video']?>" frameborder="0"></iframe>
							</div>

							<br>
                            <h3>Agente</h3>
                            <hr>
                            <div class="agent">
                                <div class="row">

                                    <br>
                                    <div class="col-md-7">
                                        <h4><a title="fullname"><?php echo $data['fullname']?></a></h4>
                                        <div class="footer_contact">
                                            <ul>
                                                <li><i class="fa fa-envelope" ></i> <span><a title="mailContact" class="contact-links" href="mailto:<?php echo $data['email']?>" ><?php echo $data['email']?></a></span></li>
                                                <li>
                                                    <span>
                                                        <i class="fa fa-phone" ></i> 
                                                    
                                                        <a><?php echo $data['cellphone']?>
                                                        </a>
                                                        <a class="contact-links" data-toggle="tooltip" data-placement="top" title="Compartir en WhatsApp" :href="'https://api.whatsapp.com/send?text=Buen dia estoy interesado en esta propiedad: '+ruta+'&phone=52'+property.cellphone" target="_parent">
                                                            <i class="fa fa-whatsapp"></i>
                                                        </a>
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="agent-contacts clearfix">
                                            <button id="buttonOpenModal" class="buttonOpenModal btn" @click="openModal()">Contactar</button>
                                            <div class="col-md-8">
                                                <div class="footer_social">
                                                    <ul>
                                                        <li>
                                                            <a data-toggle="tooltip" data-placement="top" title="whatsApp" href="https://api.whatsapp.com/send?text=Buen dia. Estoy interesado en esta propiedad: <?php echo $enlace_actual ?>&phone=52<?php echo $data['cellphone']?>" target="_parent">
                                                             <i class="fa fa-whatsapp"></i>
                                                            </a>
                                                        </li>
                                                        <li v-if="property.fb != '0'"><a  data-toggle="tooltip" data-placement="top" title="Facebook" href="<?php echo $data['fb']?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                                        </li>
                                                        <li v-if="property.tweet != '0' "><a data-toggle="tooltip" data-placement="top" title="Twitter" href="<?php echo $data['tweet']?>"><i class="fa fa-twitter "></i></a>
                                                        </li>
                                                        <li v-if="property.gmas != '0'"><a data-toggle="tooltip" data-placement="top" title="Google Plus" href="<?php echo $data['gmas']?>"><i class="fa fa-google-plus "></i></a>
                                                        </li>
                                                        <li v-if="property.skypeid != '0'"><a data-toggle="tooltip" data-placement="top" title="Skype" href="<?php echo $data['skypeid']?>" target="_blank"><i class="fa fa-skype"></i></a>
                                                        </li>
                                                        <li v-if="property.pinterest != '0'"><a data-toggle="tooltip" data-placement="top" title="Pinterest" href="<?php echo $data['pinterest']?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Start Mail Form -->
                        <div id="mailModal" class="modal">
                            <form id="contactoform" name="contactProp-form" class="modal-content animate" method="POST" action="/mail/mailer.php">
                                <div class="titleContainer">
                                    <span>
												Contactar 
												<span @click="closeMail()" class="close" title="Close Modal">&times;</span>
                                    <hr>
                                    </span>
                                </div>

                                <div class="container">
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control " placeholder="Nombre*" required v-model="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="inputInfo form-control" placeholder="Correo electronico*" required v-model="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Telefono" minlength="10" maxlength="15" required v-model="phone">
                                    </div>
                                    <div class="form-group">
                                        <textarea cols="6" rows="5" id="message" name="message" class="form-control" placeholder="Mensaje*" required v-model="message"></textarea>
                                    </div>
                                    <input type="hidden" name="folioProp" id="folioProp" v-model="folioProp">

                                    <!--  Informacion para mensaje y datos de envio-->
                                    <input type="hidden" name="urlSite" id="urlSite" v-model="urlSite">
                                    <input type="hidden" name="company" id="company" v-model="company">
                                    <input type="hidden" name="agentName" id="agentName" v-model="agentName">
                                    <input type="hidden" name="agentEmail" id="agentEmail" v-model="agentEmail">
                                    <input type="hidden" name="agentPhone" id="agentPhone" v-model="agentPhone">

                                    <!--  Informacion de banner-->
                                    <input type="hidden" name="addressCompany" id="addressCompany" v-model="addressCompany">
                                    <input type="hidden" name="phoneCompany" id="phoneCompany" v-model="phoneCompany">
                                    <input type="hidden" name="emailCompany" id="emailCompany" v-model="emailCompany">
                                    <input type="hidden" name="logoCompany" id="logoCompany" v-model="logoCompany">
                                </div>
                                <span>
											<button type="submit" id="sendMail"  class="sendButton btn btn-block" style="align:center;" >Enviar</button>
											<button type="button" id="sendMail" @click="closeMail()" class="cancelbtn btn btn-block" style="align:center;">Cancel</button>
										</span>

                            </form>
                        </div>
                        <!-- End Maail Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Version actual -->

<div>
    
    <div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <h1 class="page-title">Detalle de la propiedad</h1>    

                    <ul class="breadcrumb">

                        <li><a title="home" href="/">Inicio </a></li>

                        <li><a title="properies" href="/propiedades">Propiedades</a></li>

                        <li><a title="pageDetail" >Detalle de la propiedad</a></li>

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
    
                    <h1 class="property-title"><?php echo $data['propiedad'] ?><small><?php echo $data['city'] ?></small></h1>
    
                    <div class="property-topinfo">

                        <ul class="amenities">

                            <li v-if="property.precio>0"><i class="icon-apartment"></i><b>En venta</b></li>

                            <li v-if="property.precioM>0"><i class="icon-apartment"></i><b>En renta</b></li>

                            <li v-if="property.holiday_price>0"><i class="icon-apartment"></i><b>Renta vacacional</b></li>

                            <li><i class="icon-house"></i><?php echo $data['typepropertyspa'] ?></li>                                                    

                            <li v-if="property.mc != 0" ><i class="icon-area"></i> <strong><?php echo $data['mc'] ?> m<sup>2</sup></strong></li>
                            <li v-else-if="property.ml != 0" ><i class="icon-area"></i> <strong> <?php echo $data['ml'] ?> m<sup>2</sup></strong></li>

                            <li v-if="property.recamaras!='0'"><i class="icon-bedrooms"></i> <strong><?php echo $data['recamaras'] ?></strong></li>

                            <li v-if="property.baños!='0'" ><i class="icon-bathrooms"></i><strong><?php echo $data['baños'] ?></strong></li>

                        </ul>
        
                        <div id="property-id"><b>Folio: #<?php echo $data['folio'] ?></b></div>                                                            

                    </div>

                    <!-- BEGIN PROPERTY DETAIL SLIDERS WRAPPER -->

                    <div id="property-detail-wrapper" class="style1">

                        <div class="price" v-if="property.precio > 0">

                            <i class="fa fa-home"></i>En venta

                            <span>$ <?php echo $data['precio'].$data['MonedaVenta']?></span>
                            <b id="leyendaPrecios">*PRECIOS SUJETOS A CAMBIOS SIN PREVIO AVISO</b>

                        </div>

                        <div class="price" v-else-if="property.precioM>0">

                            <i class="fa fa-home"></i>En renta

                            <span>$<?php echo $data['precioM'].$data['rentaMoneda'] ?></span>
                            
                            <b id="leyendaPrecios">*PRECIOS SUJETOS A CAMBIOS SIN PREVIO AVISO</b>
                        </div>

                        <div class="price" v-else-if="property.holiday_price!=0">

                            <i class="fa fa-home"></i>Renta vacacional

                            <span>$<?php echo $data['holiday_price'].$data['vacation_rental_currency'] ?></span>
                            
                            <b id="leyendaPrecios">*PRECIOS SUJETOS A CAMBIOS SIN PREVIO AVISO</b>
                        </div>                                             

                        <div class="card-carousel">

                            <div class="card-img">
                                
                                <img :src="currentImage" alt="">

                                <div class="actions">

                                    <span click="prevImage" class="prev">

                                        <i class="glyphicon glyphicon-chevron-left"></i>

                                    </span>

                                    <span click="nextImage" class="next">

                                        <i class="glyphicon glyphicon-chevron-right"></i>

                                    </span>

                                </div>
                            </div>

                            <carousel :per-page="4" :navigationEnabled="false" :scrollPerPage="true" :loop="true" :mouse-drag="true" paginationColor="#fff" paginationActiveColor="rgb(37, 60, 134)">
                                
                                <slide v-for="(photo, index) in  photos" :key="photo" :index="index" :class="['thumbnail-image', (activeImage == index) ? 'active' : '']" :data-index="index">

                                    <img :src="photo" @click="activateImage(index)">

                                </slide>

                            </carousel>

                            <!--<div  class="thumbnails ">        																		    
                                </div>-->

                        </div>

                    </div>
    
                    <br>

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

                                        <pre> <?php echo $data['webEsp'] ?></pre> </p>

                                </div>

                            </div>

                            <div id="English" class="tab-pane ">

                                <div class="description">

                                    <p>

                                        <pre> <?php echo $data['webEng'] ?></pre>

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--<p>Cras lobortis, diam et ultricies imperdiet, urna urna pharetra est, vitae euismod lectus dolor nec sapien. Morbi consectetur ut metus quis elementum. Sed condimentum dui at nulla aliquet condimentum. Nullam vitae odio a nibh scelerisque condimentum et consequat sapien.</p>					

                        <p>&nbsp;</p>-->

                    <h1>Amenidades</h1>

                    <hr>

                    <ul class="property-amenities-list col-md-3" v-if="interiors">

                        <li v-for="(int,n) in interiors" :index="n" :key="int">

                            <i class="fa fa-check" ></i> {{ int }}

                        </li>

                    </ul>

                    <ul class="property-amenities-list col-md-3" v-if="exteriors">

                        <li v-for="(ext,n) in exteriors" :index="n" :key="ext">

                            <i class="fa fa-check"></i> {{ ext }}

                        </li>

                    </ul>

                    <ul class="property-amenities-list col-md-3" v-if="dev">

                        <li v-for="(dev,n) in  dev" :index="n" :key="dev">

                            <i class="fa fa-check" ></i> {{ dev }}

                        </li>

                    </ul>

                    <ul class="property-amenities-list col-md-3" v-if="maintenance">

                        <li v-for="(maint,n) in maintenance" :index="n" :key="maint">

                            <i class="fa fa-check" ></i> {{ maint}}

                        </li>

                    </ul>

                    <br>

                    <h1 class="section-title">CARACTERISTICAS DE LA PROPIEDAD</h1>

                    <div style="position:relative;">

                        <ul class="property-features col-md-6">

                            <li v-if="property.direccion ">

                                <i class="icon-sale-sign"></i><?php echo $data['direccion'] ?>

                            </li>

                            <li v-if="property.referenciaEsp">

                                <i class="icon-house-usd"></i><?php echo $data['referenciaEsp'] ?>

                            </li>

                        </ul>

                        <ul class="property-features col-md-6">



                            <li v-if="property.descMuebles">

                                <i class="icon-rooms"></i><?php echo $data['descMuebles'] ?>

                            </li>

                            <li v-if="property.mJardin">

                                <i class="icon-garden"></i>Metros de jardin: <?php echo $data['mJardin'] ?>

                            </li>

                        </ul>

                    </div>

                    <h1 class="section-title">Servicios</h1>

                    <ul class="property-amenities-list col-md-6" v-if="services">

                        <li v-for="(serv,n) in services" :index="n" :key="serv">

                            <i class="fa fa-check"></i> {{ serv }}

                        </li>

                    </ul>

                    <h1 class="section-title" v-if="property.ver_video!='0'">Video</h1>
                
                    <div v-if="property.ver_video!='0'" class="video-contain">															
                        <iframe src="https://www.youtube.com/embed/tv-Uzeh7Dy8" frameborder="0"></iframe>
                    </div>

                    <h1 class="section-title">Información del agente</h1>

                    <!-- BEING AGENT INFORMATION -->

                    <div class="property-agent-info">

                        <div class="agent-detail col-md-4" align="center">

                            <div class="image">

                                <img :alt="<?php echo $data['fullname'] ?>">

                            </div>
    
                            <div class="info">        

                                <header>

                                    <h2><?php echo $data['fullname'] ?></h2>

                                </header>    

                                <ul class="contact-us" align="left">

                                    <li><i class="fa fa-envelope"></i><?php echo $data['email'] ?></li>

                                    <!--<li><i class="fa fa-map-marker"></i> 24th Street, New York, USA</li>-->

                                   <!--li><i class="fa fa-phone"></i> {{ property.cellphone }}</li>-->
                                    <li>
                                                                                                                                       
                                            <i class="fa fa-phone"></i> 												
                                            <?php echo $data['cellphone'] ?>                                              
                                            <a class="contact-links whatsappButtom" data-toggle="tooltip" data-placement="top" title="Compartir en WhatsApp" target="_blank">
                                                <i class="fa fa-whatsapp"></i>
                                            </a>
                                        
                                    </li>

                                </ul>

                                <div class="share-wraper col-sm-12">

                                    <h5><b> Síguenos:</b></h5>

                                    <ul class="social-networks">

                                        <li v-if="property.fb != '0'"><a target="_blank" href="<?php echo $data['fb'] ?> "><i class="fa fa-facebook"></i></a></li>

                                        <li v-if="property.tweet != '0' "><a target="_blank" href="<?php echo $data['tweet'] ?> "><i class="fa fa-twitter"></i></a></li>

                                        <li v-if="property.gmas != '0'"><a target="_blank" href="<?php echo $data['gmas'] ?> "><i class="fa fa-google"></i></a></li>

                                        <li v-if="property.pinterest != '0'"><a target="_blank" href="<?php echo $data['pinterest'] ?> "><i class="fa fa-pinterest"></i></a></li>

                                        <li v-if="property.skypeid != '0'"><a href="<?php echo $data['skypeid'] ?> "><i class="fa fa-skype"></i></a></li>

                                    </ul>
    
                                    <!--<a class="print-button" href="javascript:window.print();">

                                            <i class="fa fa-print"></i>

                                        </a>-->

                                </div>

                                <br>

                                <br>

                            </div>

                        </div>        

                        <form align="center" id="contactoform" name="contactProp-form" class="form-style col-md-8 " method="POST" action="/mail/mailer.php">

                            <h2 align="center">Contacto</h2>

                            <div class="col-sm-12">

                                <input type="text" id="name" name="name" placeholder="Nombre*" class="form-control fromName" required="required" />

                            </div>        

                            <div class="col-sm-12">

                                <input type="email" id="email" name="email" placeholder="Correo Electrónico*" class="form-control fromEmail" required="required" />

                            </div>        

                            <div class="col-sm-12">

                                <input type="tel" id="phone" name="phone" placeholder="Teléfono*" class="form-control required subject" required="required" />

                                <textarea id="message" name="message" placeholder="Mensaje*" class="form-control" required="required"></textarea>

                                <input type="hidden" name="folioProp" id="folioProp" v-model="folioProp">
        
                                <!--  Informacion para mensaje y datos de envio-->

                                <input type="hidden" name="urlSite" id="urlSite" v-model="urlSite">

                                <input type="hidden" name="company" id="company" v-model="company">

                                <input type="hidden" name="agentName" id="agentName" v-model="agentName">

                                <input type="hidden" name="agentEmail" id="agentEmail" v-model="agentEmail">

                                <input type="hidden" name="agentPhone" id="agentPhone" v-model="agentPhone">
        
                                <!--  Informacion de banner-->

                                <input type="hidden" name="addressCompany" id="addressCompany" v-model="addressCompany">

                                <input type="hidden" name="phoneCompany" id="phoneCompany" v-model="phoneCompany">

                                <input type="hidden" name="emailCompany" id="emailCompany" v-model="emailCompany">

                                <input type="hidden" name="logoCompany" id="logoCompany" v-model="logoCompany">

                            </div>
    
                            <div class="center">

                                <button type="submit" id="sendMail" class="btn btn-default-color "><i class="fa fa-envelope"></i>Enviar</button>

                            </div>

                        </form>

                    </div>    
                    <!-- END AGENT INFORMATION -->        
                </div>

                <!-- END MAIN CONTENT -->
        
                <!-- BEGIN SIDEBAR -->

                <div class="sidebar gray col-sm-4">
        
                    <!-- BEGIN ADVANCED SEARCH -->

                    <h2 class="section-title">Buscar propiedades</h2>
    
                    <!--<ip-search-form-prop @select="setPropertiesFound"></ip-search-form-prop>-->
                    

                    <span class="fbButton">
                        Compartir : 
                        <a target="_parent" class="fb-share-button " 
                            :data-href="ruta" 
                            data-layout="button"
                            data-mobile-iframe="true">
                            COMPARTIR EN FACEBOOK
                        </a>
                    </span>    
                </div>    
                <!-- END SIDEBAR -->            
            </div>    
        </div>    
    </div>    
</div>