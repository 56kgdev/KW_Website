<template>
    <main>

        <!-- START SECTION TOP -->
        <div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-title">Nosotros</h1>

                        <ul class="breadcrumb">
                            <li><router-link to="/">Inicio </router-link></li>
                            <li><b>Nosotros</b></li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
        <!-- END SECTION TOP -->

        <!-- BEGIN HIGHLIGHT -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="main col-sm-12">
                        <div class="center">
                            <br>
                            <h2 class="section-highlight" data-animation-direction="from-left" data-animation-delay="50">{{company}}</h2>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="darker-text" data-animation-direction="from-left" data-animation-delay="250">
                                        <b>Nuestra Empresa </b>
                                    </h2><br>
                                     <p class="text-darker" data-animation-direction="from-left" data-animation-delay="650">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>                                    
                                    <p class="text-darker" data-animation-direction="from-left" data-animation-delay="650">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>                                                                       
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h2 class="darker-text" data-animation-direction="from-left" data-animation-delay="250">
                                        <b>VISION</b>
                                    </h2><br>
                                     <p class="text-darker" data-animation-direction="from-left" data-animation-delay="650">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h2 class="darker-text" data-animation-direction="from-left" data-animation-delay="250">
                                        <b>MISIÓN</b>
                                    </h2><br>
                                     <p class="text-darker" data-animation-direction="from-left" data-animation-delay="650">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h2 class="darker-text" data-animation-direction="from-left" data-animation-delay="250">
                                        <b>VALORES</b>
                                    </h2><br>
                                     <p class="text-darker" data-animation-direction="from-left" data-animation-delay="650">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                                    </p>
                                </div>
                            </div>
                            <br>                            
                            <br>
                            <router-link to="/contacto" class="btn btn-default-color" data-animation-direction="from-left" data-animation-delay="850">Contáctanos</router-link>
                        </div>
                    </div>
                    <br>               
                </div>
            </div>
        </div>
        <br>
        <!-- END HIGHLIGHT -->         
        <br>																			
    </main>
</template>

<script>
    import immoService from '@/services/immo.js';
    export default {
        name: 'app',
        data(){
            return{
                company:[],
                logo:[]
            }		
        },
        created(){
            window.scrollTo(0,0);
            immoService.getInfoCompany()
                .then(res => {
                    const foDat=res[0]
                    this.logo=foDat.logo
                    this.company=foDat.company
                })
        }
    }
</script>

<style>
    #ampi-logo img {
        margin-top: 50px;
        border-radius: 9px;
        width: 100px;
    }
    #about-img{
        width:60%;
        text-align: center;
        float: right;
    }
    .text-contact{    
        font-size: 16px;
        text-transform: uppercase;
    }
</style>