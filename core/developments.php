<?php 
    include include './base/base.php';
    $data=getDevsAll();

?>
<div>
		<!-- START SECTION TOP -->
		<section itemprop="section-top" class="section-top" >
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
					<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h2>Desarrollos</h2>
						<ol class="breadcrumb">
						  <li><a title="home" href="/">Inicio</a></li>
						  <li class="active">Desarrollos</li>
						</ol>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</section>	
		<!-- END SECTION TOP -->

		<!-- START PROPERTY -->	
		<section itemprop="section-property" itemid="developments" class="template_property">
			<div class="container">
				<div class="row">

					 <?php 
                        foreach($data as &$property){
                    ?>
					<div class="col-md-4 col-sm-12 col-xs-12">
                        <div id="contain_tarjet_property" class="single_property">
                        <a title="<?php echo $datas['name_desarrollo_spa'] ?>" href="" click="goToProperty(property.propertyid, property.nameproperty)">
                            <img src="<?php echo $property['smallphoto']?>" class="img-responsive" alt="<?php echo $property['alt']?>"/>
                        </a>      
                        <div class="single_property_description text-center">
                            <span><i class="fa fa-object-group"></i>Total de unidades: <?php echo $property['totalUnidades']?></span>
                            
                        </div>
                        <div class="single_property_content">
                            <h4><a title="<?php echo $datas['name_desarrollo_spa'] ?>" href="" click="goToProperty(property.propertyid, property.nameproperty)"><?php echo $property['name_desarrollo_spa']?></a></h4>
                            <p ><?php echo $property['description_web_esp']?></p>
                            <p>Folio <b>#<?php echo $property['num_desarrollo']?></b></p>                            
                        </div>
                        
                        <div class="single_property_price">
                            <p><?php echo $property['neighbourhood'].' '.$property['city']?></p>
                            <p >
                                <span >
                                Precio desde: <b> $<?php echo $property['precio_minimo'].' '. $property['moneda']?></b>
                                </span>                               
                            </p>          
                        </div>
                        </div><!--- END SINGLE PROPERTY -->	
                        <br>
                    </div><!--- END COL -->
                    <?php }?>

											
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END  PROPERTY -->
  </div>