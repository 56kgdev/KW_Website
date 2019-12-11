<?php 
    include './base/base.php';
    $data=getPropsHome();
    $destc=getDestcProps();
?>
<div>                
        <!-- START HOME -->    
        <div id="props-carousel" class="carousel slide" data-ride="carousel">
    
            <!-- BEGIN WRAPPER FOR SLIDES -->    
            <div class="carousel-inner">    
                <div class="item active image-slider-contain">    
                    <img :src="sliderInfo[0].largephoto" :alt="sliderInfo[0].nameproperty">        
    
                    <div class="carousel-caption">    
                        <div class="carousel-shade">    
                            <div id="nameProperty" class="caption sfr slider-title">{{ sliderInfo[0].nameproperty }}</div>    
                            <div id="infoProperty" class="caption sfl slider-subtitle">{{ sliderInfo[0].neighbourhood }}, {{ sliderInfo[0].city }}</div> <br>    
                            <a id="buttonProperty" style="cursor:pointer;" @click="goToProperty(sliderInfo[0].propertyid, sliderInfo[0].nameproperty)" class="caption sfb btn btn-default btn-lg" data-x="75" data-y="260" data-speed="800" data-easing="easeOutBack" data-start="1600"    
                                data-end="9800" data-endspeed="500" data-endeasing="easeInSine">Leer Mas</a>                                
                        </div>    
                    </div>    
                </div>        
    
                <div v-for="(n,i) in sliderInfo" :index="i" :property="n" :key="n.propertyid" v-if="i>0" class="item image-slider-contain">    
                    <img :src="sliderInfo[i].largephoto" :alt="sliderInfo[i].nameproperty">
    
                    <div class="carousel-caption">    
                        <div class="carousel-shade">    
                            <div id="nameProperty" class="caption sfr slider-title">{{ sliderInfo[i].nameproperty }}</div>    
                            <div id="infoProperty" class="caption sfl slider-subtitle">{{ sliderInfo[i].neighbourhood }}, {{ sliderInfo[i].city }}</div> <br>    
                            <a id="buttonProperty" style="cursor:pointer;" @click="goToProperty(sliderInfo[i].propertyid, sliderInfo[i].nameproperty)" class="caption sfb btn btn-default btn-lg" data-x="75" data-y="260" data-speed="800" data-easing="easeOutBack" data-start="1600"    
                                data-end="9800" data-endspeed="500" data-endeasing="easeInSine">Leer Mas</a>    
                        </div>            
                    </div>    
                </div>    
            </div>
            <!--  END WRAPPER FOR SLIDES --> 

            <!-- BEGIN LEFT AND RIGHT CONTROLS -->    
            <a class="left carousel-control" role="button" href="#props-carousel" data-slide="prev">    
                <span class="icon-prev"><i aria-hidden="true" class="fa fa-angle-left"></i></span>    
                <span class="sr-only">Previous</span>        
            </a>
    
            <a class="right carousel-control" role="button" href="#props-carousel" data-slide="next">    
                <span class="icon-next"><i aria-hidden="true" class="fa fa-angle-right"></i></span>    
                <span class="sr-only">Next</span>                    
            </a>   

             <!-- BEGIN LEFT AND RIGHT CONTROLS -->
        </div>
        <!-- END  HOME DESIGN -->

        <!-- BEGIN SEARCH -->    
        <ip-search-form @select="setPropertiesFound" align="center"></ip-search-form>        
        <hr>
        <!-- END SEARCH-->                    
    
        <!-- START PROPERTY LIST -->    
        <section>
            <!--- BEGIN CONTAINER -->    
            <div class="container">    
                <!--- BEGIN ROW -->
                <div class="row">    
                    <div class="section-title text-center wow zoomIn">    
                        <h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">Principales Propiedades</h1>    
                        <ip-property v-for="p in sliderProperties" :key="p.propertyid" :property="p"></ip-property>    
                    </div>            
                </div>    
                <!--- END ROW -->    
            </div>    
            <!--- END CONTAINER -->    
        </section>    
        <!-- END  PROPERTY LIST -->
    
    </div>