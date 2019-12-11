<template>        
    <div>    
        <!-- START HOME -->    
        <div id="props-carousel" class="carousel slide" data-ride="carousel">
    
             <!--BEGIN WRAPPER FOR SLIDES    -->
            <div class="carousel-inner">
                <div v-for="(n,i) in sliderInfo" :index="i" :property="n" :key="n.propertyid" :style="'background-image:url('+sliderInfo[i].largephoto+');height:100%'" class="item image-slider-contain" :class=" {'active':(i==0)}">    
                <!--<img :src="sliderInfo[i].largephoto" :alt="sliderInfo[i].nameproperty">-->
                    <div class="carousel-caption">    
                        <div class="carousel-shade">    
                            <div id="nameProperty" class="caption sfr slider-title" style="cursor:pointer;" @click="goToProperty(sliderInfo[i].propertyid, sliderInfo[i].nameproperty)">{{ sliderInfo[i].nameproperty }}</div>    
                            <div id="infoProperty" class="caption sfl slider-subtitle">{{ sliderInfo[i].neighbourhood }}, {{ sliderInfo[i].city }}</div> <br>
                            <a id="buttonProperty" style="cursor:pointer;" @click="goToProperty(sliderInfo[i].propertyid, sliderInfo[i].nameproperty)" class="caption sfb btn btn-default btn-lg" data-x="75" data-y="260" data-speed="800" data-easing="easeOutBack" data-start="1600"    
                                data-end="9800" data-endspeed="500" data-endeasing="easeInSine">Leer Mas</a>    
                        </div>            
                    </div>    
                </div>    
            </div>
            <!-- END WRAPPER FOR SLIDES -->

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
        <!-- END SEARCH-->  


        <div class="row">
            <div class="col-md-1"></div>
            <div class="post-content offset-col-3 col-md-10" align="center">
                <p class="quote">
                    <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit,  </span>
                     sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>                             
    
        <!-- START PROPERTY LIST -->    
        <section>
            <!--- BEGIN CONTAINER -->    
            <div class="container">    
                <!--- BEGIN ROW -->
                <div class="row">    
                    <div class="section-title text-center wow zoomIn">    
                        <h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">Principales Propiedades</h1>    
                        <div class="grid-style1 clearfix">
                            <ip-property v-for="p in homeProperties" :key="p.propertyid" :property="p"></ip-property>    
                        </div>                       
                    </div>            
                </div>    
                <!--- END ROW -->    
            </div>    
            <!--- END CONTAINER -->    
        </section>    
        <!-- END  PROPERTY LIST -->
    
    </div>
</template>

<script>
    import immoService from '@/services/immo.js'    
    import IpSlide from '@/components/Slide.vue'    
    import IpProperty from '@/components/Property.vue'    
    import IpDestcProp from '@/components/PropertyDestc.vue'    
    import RlLoader from '@/components/shared/Loader.vue'    
    import IpSearch from '@/components/Search.vue'    
    import IpSearchForm from '@/components/SearchForm.vue'    
    import {
    
        Carousel,
    
        Slide
    
    } from 'vue-carousel';
    
    export default {
    
        name: 'app',
    
        components: {
    
            IpSlide,
    
            IpProperty,
    
            IpDestcProp,
    
            RlLoader,
    
            IpSearch,
    
            IpSearchForm,
    
            Carousel,
    
            Slide
    
        },
    
        data() {
    
            return {    
                sliderInfo: [],    
                sliderLargephotoFirst: '',    
                sliderCityFirst: '',    
                sliderNameFirst: '',    
                sliderIdFirst: '',    
                photos: [],    
                sliderNameProp: [],    
                sliderCity: [],    
                sliderNeighbourhood: [],        
                selectedType: '0',    
                selectedOperation: '0',    
                selectedCity: '0',            
                sliderProperties: [],   
                homeProperties:[], 
                recentProperties: [],    
                lastProperty: [],            
                isLoading: false,    
                isSearching: false,            
                searchCompleted: false,            
                propertiesFound: {},            
                propsDestc: []            
            }
    
        },
    
        created() {    
            this.isLoading = false    
            immoService.getSliderHome()    
                .then(res => {            
                    const sliderInfo = res    
                    this.sliderInfo = sliderInfo    
                    this.sliderLargephotoFirst = sliderInfo.largephoto    
                    this.sliderNameFirst = sliderInfo.nameproperty    
                    this.sliderCityFirst = sliderInfo.city    
                    this.sliderIdFirst = sliderInfo.propertyid    
                    this.photos = sliderInfo.largephoto    
                    this.sliderNameProp = sliderInfo.nameproperty    
                    this.sliderCity = sliderInfo.city    
                    this.sliderNeighbourhood = sliderInfo.neighbourhood            
                    this.isLoading = true                              
                })
    
    
    
            immoService.getPropsHome()
    
                .then(res => {
    
                    this.homeProperties = res                    
    
                    this.text = res.property
    
                    this.isLoading = false
    
                    this.lastProperty = this.recentProperties[0]        
    
                    this.isLoading = true
    
                })
    
            /*immoService.getDestPropsHome()
    
                .then(res => {
    
                    this.propsDestc = res
                    console.log("destacadas",res)
    
                })*/
    
        },
    
        methods: {
    
            setPropertiesFound(properties) {    
                this.propertiesFound = properties                
                this.$router.push({ name: "search", params: { properties } });    
            },
    
            goToProperty(id, name) {
                let namePropFilt = immoService.normalize(name);
                this.$router.push({    
                    name: 'property',    
                    params: {    
                        id: id,    
                        namePropFilt: namePropFilt    
                    }    
                });    
            }    
        }
    }
</script>

<style>
    .image-slider-contain{
        background-position-x: center;
        background-position-y: center;
        background-size: contain;

    }
    @media (max-width: 768px) {
    
        .btn-responsive {
    
            padding: 2px 4px;
    
            font-size: 80%;
    
            line-height: 1;
    
            border-radius: 3px;
    
        }
        .carousel-caption {            
            top: 15% ;       
            width: 85%; 
        }
        .carousel-inner>.item>img{
            height: 75vh;
        }
        .carousel-inner {
            height: 70vh !important; 
        }
    }
    @media (min-width: 769px) {
    
        .btn-responsive {
    
            padding: 4px 9px;
    
            font-size: 90%;
    
            line-height: 1.2;
    
        }
        
    
    }
    .carousel-caption {
    
        width: 70%;
    
        text-align: left;
    
        top: 25% ;
    
        left: 10% !important;
    
        bottom: inherit;
    
    }
    .carousel-shade {
    
        background-color: transparent;
    
        border-top: 1px solid transparent;
    
        border-bottom: 1px solid transparent;
    
    }     
    .carousel-caption h3 {
    
        padding: 0;
    
        margin: 0;
    
        font-size: 3vw;
    
        border-bottom: 1px solid white;
    
    }         
    .carousel-caption p {
    
        font-size: 1.1vw;
    
    }
    .caption-slide1 button {
    
        background-color: #4a5677;
    
        white-space: normal;
    
        margin-top: 1vw;
    
    }
    .carousel-control {
    
        width: 0;
    
    }
    .carousel-control .icon-prev,
    
    .carousel-control .icon-next {
    
        background-color: rgba(0, 0, 0, 0.5);
    
        color: white;
    
        margin-top: -50px;
    
        font-size: 24px;
    
        height: 50px;
    
        width: 50px;
    
        line-height: 50px;
    
        text-align: center;
    
        border-radius: 4px;
    
    }
    .carousel-control .icon-prev:hover,
    
    .carousel-control .icon-next:hover {
    
        background-color: #4a5677;
    
    }
    .carousel-control .icon-prev {
    
        left: 10px;
    
        margin-left: 0;
    
    }
    .carousel-control .icon-next {
    
        right: 10px;
    
        margin-right: 0;
    
    }
    .carousel-control .icon-prev:before,
    
    .carousel-control .icon-next:before {
    
        content: '';
    
    }
    .carousel-control.left,
    
    .carousel-control.right {
    
        background-image: none;
    
        filter: none;
    
    }
    .carousel-shade a {
    
        color: #4a5677;
        font-weight: 900;
        border-color: #4a5677;
    
    }
    #nameProperty {
    
        animation-duration: 3.5s;
    
        animation-name: slidein;
    
    }
    #infoProperty {
    
        animation-duration: 1.5s;
    
        animation-name: slidein;
    
    }
    #buttonProperty {
    
        float: right;
    
        animation-duration: 2.5s;
    
        animation-name: slidein1;
    
    }
    @keyframes slidein {
    
        from {
    
            margin-left: 100%;
    
            width: 100%
    
        }
    
        to {
    
            margin-left: 0%;
    
            width: 100%;
    
        }
    
    }    
    @keyframes slidein1 {
    
        from {
    
            margin-left: 100%;
    
            width: auto;
    
        }
    
        to {
    
            margin-left: 0%;
    
            width: auto;
    
        }
    
    }
</style>