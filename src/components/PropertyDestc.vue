<template>
	<div class="item">
		<div class="image">
			<a ></a>
			<img :src="property.largephoto" :alt="property.nameproperty" />
		</div>

		<div class="price" v-if="property.price >0">
			<i class="fa fa-home"></i>En venta
			<span style="color:#fff;">${{ property.price | format }} {{ property.currenname }}</span>
		</div>
		<div class="price"  v-else-if="property.pricepermonth>0">
			<i class="fa fa-home"></i>En renta
			<span style="color:#fff;">${{ property.pricepermonth | format}} {{ property.currennamePerMonth}}</span>
		</div>
		<div class="price" v-else-if="property.holiday_price !=0">
			<i class="fa fa-home"></i>Renta vacacional
			<span style="color:#fff;">${{ property.holiday_price | format }} {{ property.vacation_rental_currency}}</span>
		</div>

		<div class="info">
			<h3><a @click="goToProperty(property.propertyid, property.nameproperty)">{{ property.nameproperty }}</a></h3>
			<p>{{ property.onlinewebspa | truncate}}</p>
			<a @click="goToProperty(property.propertyid, property.nameproperty)" class="btn btn-default">Leer Más</a>
		</div>
	</div>
</template>

<script>
  import numeral from 'numeral'
	import immoService from '@/services/immo.js'
  export default {
    props: {
      property: { type: Object, required: true }
      
    },

    filters: {
      truncate: function (str) {
        return str.substring(0, 125) + '...'
      },
      format: function (value) {
        return numeral(value).format('0,0')
      }
    },

    methods: {
    	selectProperty () {
        this.$emit('select', this.property.propertyid)
        
    	},

      goToProperty (id,name) {
				let namePropFilt=immoService.normalize(name);

        this.$router.push({ name: 'property', params: {id,namePropFilt}  })
        
      }
    }

  }
</script>

<style scoped>
  img {
    width: 100%;
  }
		@media (max-width: 992px) {
    #contain_tarjet_property{
      width:65%;

		
    }
  }
   @media (max-width: 520px) {
    #contain_tarjet_property{
      width:100%;
    }
	}
	.info a{
		cursor: pointer;
		text-decoration: none;
	}
	.info a:hover{
		color:rgba(0, 0, 0, 0.534);
	}
	.info p{
		font-size:18px;
	}
</style>