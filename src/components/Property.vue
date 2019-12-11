<template>
  <!--- BEGIN COL -->
  <div class="item col-md-4" data-animation-direction="from-bottom" data-animation-delay="200">
    <div class="image">
      <a style="cursor:pointer;" @click="goToProperty(property.propertyid, property.nameproperty)">
        <h3>{{ property.nameproperty }}</h3>
        <span class="location"><b> {{ property.neighbourhood }}, {{ property.city}}</b></span>
      </a>
      <img :src="property.smallphoto" class="img-responsive" alt=""/>
    </div>
    <div class="price" v-if="property.price >0">
      <i class="fa fa-home"></i>En venta
      <span style="color:#fff;">${{ property.price | format }} {{ property.currenname }}</span>
    </div>
    <div class="price"  v-else-if="property.pricepermonth>0">
      <i class="fa fa-home"></i>En renta
      <span style="color:#fff;">${{ property.pricepermonth | format}} {{ property.currennamePerMonth}}</span>
    </div>
    <div class="price" v-else-if="property.holiday_price!=0">
      <i class="fa fa-home"></i>Renta vacacional
      <span style="color:#fff;">${{ property.holiday_price | format}} {{ property.vacation_rental_currency}}</span>
    </div>

    <ul class="amenities">
      <li v-if="property.m2c != 0"><i class="fa fa-object-group"></i> {{ property.m2c | format }} m<sup>2</sup></li>
      <li v-else-if="property.mlot != 0"><i class="fa fa-object-group"></i> {{ property.mlot | format }} m<sup>2</sup></li>
      <li v-if="property.bedrooms!='0'"><i class="fa fa-bed"></i> {{ property.bedrooms }}</li>
      <li v-if="property.bathrooms!='0'" ><i class="fa fa-bath"></i> {{ property.bathrooms }}</li>
      <li v-if="property.m2c == 0 && property.mlot == 0 && property.bedrooms =='0' && property.bathrooms=='0'" >
        <i class="fa fa-home"></i> {{ property.typepropertyspa }}
      </li>
    </ul>
  </div>
  <!--- END COL -->
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
  @media (max-width: 991px) {
    #contain_tarjet_property{
      width:70%;
    }
  }
   @media (max-width: 520px) {
    #contain_tarjet_property{
      width:100%;
    }
  }
</style>