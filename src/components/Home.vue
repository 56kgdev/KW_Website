<template>  
    <div> 
        <!--CAROUSEL PRUEBA MD CARDS-->
         <div id="carousel">
             
         </div>
        <!--CAROUSEL PRUEBA-->

        <!-- BEGIN SEARCH -->   
        <ip-search-form @select="setPropertiesFound" align="center"></ip-search-form>             
        <!-- END SEARCH-->  
        <div class="row">
            <div class="col-md-1"></div>
            <div class="post-content offset-col-3 col-md-10" align="center">
                <p class="quote">
                    <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                </p>
            </div>
        </div>                             
        <!-- START PROPERTY LIST -->    
        <section>
            <!--- BEGIN CONTAINER -->    
              
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
                swiperOptionTop: {
                    speed: 700,
                    parallax: true,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    autoplay: {
                        delay: 5000,
                        loop: true
                    },
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
        /*/
         mounted() {
            this.$nextTick(() => {
                const swiperTop = this.$refs.swiperTop.swiper
                const swiperThumbs = this.$refs.swiperThumbs.swiper
                swiperTop.controller.control = swiperThumbs
                swiperThumbs.controller.control = swiperTop
            })
            },
        /*/
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

.swiper-container {
    background-color: #000;
  }
.swiper-slide {
    background-size: contain;
    background-position: center;
}
  .gallery-top {
    height: 100%!important;
    width: 100%;   
  }
  .swiper-slide .title {
    color:#fff;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 40px 60px;
    justify-content: space-around!important;
    font-size: 40px !important;
    line-height: 2!important;
    font-weight: 300;
  }


  
</style>