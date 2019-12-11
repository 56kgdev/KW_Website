<template>
    <!-- START SEARCH -->
    <div id="searchPropDetail" class="form-group">
                
        <div class="col-sm-12">

            <!-- Keyword (Oculto por falta de parametro en json) -->
            <div class="custom-input">
				<input type="text" class="form-control" name="location" placeholder="Palabra Clave" v-model="selected.keyword">
			</div>  
            
             <!-- Type Property -->		
            <span class="custom-dropdown big">                    				
                <select class="col-sm-12"  name="search_prop_type" data-placeholder="Tipo de Propiedad" v-model="selected.type" >
                    <option value="">Tipo de propiedad</option>
                    <option v-for="x in types" :key="x.typepropertyid" :value="x.typepropertyid">{{x.typepropertyspa}}</option>
                </select>
            </span>	

            <!-- Type Operation -->
            <span class="custom-dropdown big">
                <select class="col-sm-12" name="search_status" data-placeholder="Operación" v-model="selected.operation">
                    <option value="">Operación</option>
                    <option value="1">Venta</option>
                    <option value="2">Renta</option>
                    <option value="3">Renta Vacacional</option>
				</select>
			</span>

            <!-- City (Oculto por falta de parametro en json) -->
           <!-- <span class="custom-dropdown big">
                <select class="col-sm-12"  name="search_location" data-placeholder="Ubicación" v-model="selected.city">
                    <option value="">Ubicación</option>
                    <option v-for="x in cities" :key="x" :value="x">
                        {{ x }}
                    </option>	
                </select>
            </span>   -->         

            <!-- Min Price -->
            <!--<span class="custom-dropdown big">
              <select class="col-sm-12"  name="search_minprice" data-placeholder="Precio Mínimo"  v-model="selected.minPrice">                
                <option value="">Min</option>
                <option value="500000">$500,000</option>
                <option value="700000">$700,000</option>
                <option value="900000">$900,000</option>
                <option value="1000000">$1,000,000</option>
                <option value="3000000">$3,000,000</option>
                <option value="5000000">$5,000,000</option>
                <option value="7000000">$7,000,000</option>
                <option value="9000000">$9,000,000</option>
                <option value="1000000">$10,000,000 +</option>
              </select>
            </span>-->
            
            <!-- Max Price -->
            <!--<span class="custom-dropdown big">
              <select class="col-sm-12"  name="search_maxprice" data-placeholder="Precio Máximo" v-model="selected.maxPrice">
                <option value="">Max</option>                
                <option value="500000">$500,000</option>
                <option value="700000">$700,000</option>
                <option value="900000">$900,000</option>
                <option value="1000000">$1,000,000</option>
                <option value="3000000">$3,000,000</option>
                <option value="5000000">$5,000,000</option>
                <option value="7000000">$7,000,000</option>
                <option value="9000000">$9,000,000</option>
                <option value="1000000">$10,000,000 +</option>
              </select>
            </span>	 -->

                     						
        </div>										
        <!--<div class="col-md-12">
            <div  style="float:left;">
                <span class="custom-dropdown-mini ">
                    <select class="col-md-10"   name="search_bedrooms" data-placeholder="Recámaras" v-model="selected.bedrooms">
                        <option value="">Recámaras</option>
                        <option v-for="x in bedrooms" :key="x" :value="x">
                            {{ x }}
                        </option>
                    </select>
                </span>
                
            </div>
            <div>
                <span class="custom-dropdown-mini">
                    <select class="col-md-10"  name="search_bathrooms" data-placeholder="Baños" v-model="selected.bathrooms">
                        <option value="">Baños</option>
                        <option v-for="x in bathrooms" :key="x" :value="x">
                            {{ x }}
                        </option>	
                    </select>
                </span>
            </div>
        </div>-->
        
        <p>&nbsp;</p>
        <p class="center">
            <button @click="search()" class="btn btn-default-color">Buscar</button>
        </p>
    </div>	
    <!-- END  SEARCH -->
</template>

<script>
  import immoService from '@/services/immo.js'
  import IpLoader from '@/components/shared/Loader.vue'
  import numeral from 'numeral'
  import {Money} from 'v-money'

  export default {
    data () {
      return {
        cities: [],
        types: [],
        bedrooms: [],
        bathrooms: [],
        prices: [],
        currencies: [],
        selected: {
          city: '',
          type: '',
          bedrooms: '',
          bathrooms: '',
          minPrice: '',
          maxPrice: '',
          currency: '',
          keyword:'',
          operation: ''
        },
         moneyMin:{
          thousand:',',
          prefix:'Min: $',
          precision:0,
          masked:false
        },
        moneyMax:{
          thousand:',',
          prefix:'Max: $',
          precision:0,
          masked:false
        },
        isSearching: false
      }
    },

    components: {
      IpLoader,
      Money
    },

    filters: {
      format: function (value) {
        return numeral(value).format('0,0')
      }
    },

    methods: {
      search () {
        this.isSearching = true
        immoService.searchProp(this.selected)
            .then(res => {                
                this.$emit('select', res)
                this.isSearching = false
            });      
        /*immoService.search(this.selected)
          .then(res => {
            this.$emit('select', res)
            this.isSearching = false
          })*/
      }
    },

    created () {
        immoService.getSelectCity()
			.then(res=>{
				this.cities=res
				
            });
        immoService.getSelectTypeProps()
			.then(res=>{
				this.types=res
			});
        
        immoService.getSearchData()
            .then(res => {       
                //this.types = res.types
                this.bedrooms = res.bedrooms.sort((a,b)=>a-b)
                this.bathrooms = res.bathrooms.sort((a,b)=>a-b)
                this.prices = res.prices
                this.currencies = res.currencies
                this.selected.currency = this.currencies[0]
            });
    }
  }
</script>