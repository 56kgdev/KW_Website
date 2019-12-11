<?php 
    include include './base/base.php';
    $data=getPropsAll();
?>
    <!-- START SECTION TOP -->
    <div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Propiedades</h1>
                    
                    <ul class="breadcrumb">
                        <li><router-link to="/">Inicio</router-link></li>
                        <li><b>Propiedades</b></li>
                    </ul>						
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION TOP -->

	<!-- START PROPERTY -->	
	<div class="content">
		<div class="container">
			<div class="row">
				<div id="property-listing" class="list-style clearfix">
					<div class="row">
					    <br>
                        <br>
                         <?php 
                            foreach($data as &$property){
                                echo $data;
                        ?>
                        <!--<list-props v-for="p in properties" :key="p.propertyid" :property="p"></list-props>-->
                        <div id="contain_tarjet_property" class="item col-md-4">
                            <!-- Set width to 4 columns for grid view mode only -->
                            <div class="image">
                                <a title="<?php echo $property['nameproperty'] ?>">                                            
                                    <span onclick="goToProperty(property.propertyid, property.nameproperty)" class="btn btn-default"><i class="fa fa-file-o"></i> Detalles</span>                                            
                                </a>
                                <img src="<?php echo $property['smallphoto']?>" alt="<?php echo $property['alt']?>"/>
                            </div>

                            <div class="price" v-if="property.price >0">
                                <i class="fa fa-home"></i>En venta
                                <span >$<?php echo $property['price'].' '. $property['currenname']?></span>
                            </div>
                            <div class="price" v-else-if="property.pricepermonth>0">
                                <i class="fa fa-home"></i>En renta
                                <span >$<?php echo $property['pricepermonth'].' '. $property['currennamePerMonth']?></span>
                            </div>
                            <div class="price" v-else-if="property.holiday_price!=0">
                                <i class="fa fa-home"></i>Renta vacacional
                                <span>$<?php echo $property['rental_period']?>:<b> $<?php echo $property['holiday_price'].' '. $property['vacation_rental_currency']?></span>
                            </div>
                            <div class="info">
                                <h3>
                                    <h2 style="color:#fff; cursor:pointer;" v-on:click="goToProperty(property.propertyid, property.nameproperty)">
                                        <?php echo $property['nameproperty'] ?>
                                    </h2>
                                    <small><?php echo $property['neighbourhood'].' '.$property['city']?></small>
                                </h3>
                                <p><?php echo $property['onlinewebspa']?></p>
                                <ul class="amenities">
                                    <li v-if="property.m2c != 0"><i class="icon-area"></i> <?php echo $property['m2c']?> m<sup>2</sup></li>
                                    <li v-else-if="property.mlot != 0"><i class="icon-area"></i> <?php echo $property['mlot']?> m<sup>2</sup></li>
                                    <li v-if="property.bedrooms!='0'" ><i class="icon-bedrooms"></i> <?php echo $property['bedrooms']?></li>
                                    <li v-if="property.bathrooms!='0'" ><i class="icon-bathrooms"></i> <?php echo $property['bathrooms']?></li>
                                </ul>
                            </div>
                        </div>                            
                        <?php }?>
					</div>
				</div>			
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</div>	
	<!-- END  PROPERTY -->