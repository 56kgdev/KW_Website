<template lang="html">
  <div id="app">

    <div class="wrapper">

    	<ip-preloader></ip-preloader>

    	<ip-header></ip-header>

      <router-view></router-view>

  	  <ip-footer></ip-footer>
      
    </div>

  </div>
</template>

<script>
  import IpPreloader from '@/components/layout/Preloader.vue'
  import IpHeader from '@/components/layout/Header.vue'
  import IpFooter from '@/components/layout/Footer.vue'

  export default {
    name: 'app',
    components: {
      IpPreloader,
      IpHeader,
      IpFooter
    },
    /*created(){
      document.addEventListener('beforeunload', this.handler())
    },*/
    /*methods:{
      handler(){
        $.ajax({
          url: "http://www.immosystem.com.mx/api/countvisits.php?companyid=174&live=0",
          method: "GET",
          async: false,         
          dataType: "json",
          success: function(respuesta) {
            console.log("success")
          },     
          error:function(){
            console.log("error en envio de datos a Immo");
          }                           
        });
      }
  }*/
    /*beforeDestroy(){
      $.ajax({
            url: "http://www.immosystem.com.mx/api/countvisits.php?companyid=174&live=0",
            method: "GET",
            async: false,         
            dataType: "json",
            success: function(respuesta) {
              console.log("success")
            },     
            error:function(){
              console.log("error en envio de datos a Immo");
            }                           
          });
    }*/

  }
</script>

<style>
  @import './assets/css/main.css';
</style>
