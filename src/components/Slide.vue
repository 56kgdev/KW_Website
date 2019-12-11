<template lang="html">
  <li data-transition="fade" data-slotamount="7">
		<img  src="http://www.agent.immosystem.com.mx/view/companies/132/properties/16683/img/16683-Sala-comedor-L.jpeg" alt="" >
	  <div class="caption sfr slider-title" data-x="70" data-y="120" data-speed="800" data-start="1300" data-easing="easeOutBack"  data-endspeed="700" data-endeasing="easeInSine">Villas Orquidea</div><!--{{sliderNameProp[0]}}  {{sliderCity[0]}}, {{sliderNeighbourhood[0]}}-->
		<div class="caption sfl slider-subtitle" data-x="75" data-y="190" data-speed="800" data-start="1500" data-easing="easeOutBack"  data-endspeed="500" data-endeasing="easeInSine">Cancún</div>
		<a class="caption sfb btn btn-default btn-lg" data-x="75" data-y="260" data-speed="800" data-easing="easeOutBack" data-start="1600"  data-endspeed="500" data-endeasing="easeInSine" @click="goToProperty('16683','Villas Orquidea ')">Ver más</a>
	</li>
</template>

<script>
  import immoService from '@/services/immo.js'
  export default {   
    methods: {
      goToProperty (id,name) {
       let namePropFilt=immoService.normalize(name);
        this.$router.push({ name: 'property', params: {id,namePropFilt}  })
      }
    }
  }
</script>