<template>  
    <div> 

       
        <!--CAROUSEL PRUEBA-->
        <div>
            <swiper :options="swiperOption">
                <div class="parallax-bg" slot="parallax-bg" data-swiper-parallax="-23%"></div>

                <swiper-slide v-for="(n,i) in sliderInfo" :index="i" :property="n" :key="n.propertyid" >
                    <div class="title" data-swiper-parallax="-100">{{n.name_desarrollo_spa}}</div>
                    <br>
                    <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                    <div class="text" data-swiper-parallax="-300">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla laoreet justo vitae porttitor porttitor. Suspendisse in sem justo. Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod. Aliquam hendrerit lorem at elit facilisis rutrum. Ut at ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec, tincidunt ut libero. Aenean feugiat non eros quis feugiat.</p>
                    </div>
                </swiper-slide>
                
            </swiper>
        </div>
        
        <!--CAROUSEL PRUEBA-->




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
    import IpSearchForm from '@/components/SearchForm.vue';
    import {Carousel,Slide} from 'vue-carousel';

    import 'swiper/dist/css/swiper.css'

    import { swiper, swiperSlide } from 'vue-awesome-swiper'

    export default {
    
        name: 'app',
    
        components: {
            swiper,
            
            swiperSlide,
    
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
                swiperOption: {
                    speed: 600,
                    parallax: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
          }
        },
               
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
                    console.log(res);          
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

    .swiper-slide {
    font-size: 18px;
    color:#fff;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 40px 60px;
    background-color: transparent!important;
    justify-content: space-around!important;
  }
  .parallax-bg {
    position: absolute;
    left: 0;
    top: 0;
    width: 130%;
    height: 100%;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center;
    background-image: url(https://backgrounddownload.com/wp-content/uploads/2018/09/star-wars-star-background-4.jpg);
  }
  .swiper-slide .title {
    font-size: 41px;
    font-weight: 300;
  }
  .swiper-slide .subtitle {
    font-size: 21px;
  }
  .swiper-slide .text {
    font-size: 14px;
    max-width: 400px;
    line-height: 1.3;
  }
  
  
  
  
  
  
  
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