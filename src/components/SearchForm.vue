<template>
  <!-- START SEARCH -->
  <div id="home-advanced-search" class="open">
		<br>
		<div id="opensearch"></div> 
		<div class="container">
			<div class="row">
				<div class="col-sm-12">						
					<div class="form-group">		

            <!-- Keyword (Oculto por falta de parametro en json) -->
            <div class="custom-input">
							<input type="text" class="form-control" name="location" placeholder="Palabra Clave" v-model="selected.keyword">
						</div>

            <!-- Type Property -->												
						<span class="custom-dropdown big">
							<select id="search_prop_type" name="search_prop_type" data-placeholder="Tipo de Propiedad" v-model="selected.type" >
								<option value="">Tipo de propiedad</option>
								<option v-for="x in types" :key="x.typepropertyid" :value="x.typepropertyid">{{x.typepropertyspa}}</option>									
							</select>
						</span>
						
            <!-- Type Operation -->
						<span class="custom-dropdown big">
							<select id="search_status" name="search_status" data-placeholder="Operación" v-model="selected.operation">
								<option value="">Operación</option>
								<option value="1">Venta</option>
								<option value="2">Renta</option>
                <option value="3">Renta Vacacional</option>
							</select>
						</span>
						
						<!--<span class="custom-dropdown big">
							<select id="search_bedrooms" name="search_bedrooms" data-placeholder="Recámaras" v-model="selected.bedrooms">
								<option value="">Recámaras</option>
								<option v-for="x in bedrooms" :key="x" :value="x">
									{{ x }}
								</option>
							</select>
						</span>-->
						
						<!--<span class="custom-dropdown big">
							<select id="search_bathrooms" name="search_bathrooms" data-placeholder="Baños" v-model="selected.bathrooms">
								<option value="">Baños</option>
								<option v-for="x in bathrooms" :key="x" :value="x">
									{{ x }}
								</option>	
							</select>
						</span>-->

            <!-- City (Oculto por falta de parametro en json) -->
						<span class="custom-dropdown big">
							<select id="search_location" name="search_location" data-placeholder="Ubicación" v-model="selected.city">
								<option value="">Ubicación</option>
								<option v-for="x in cities" :key="x.city" :value="x.city">
									{{ x.city }}
								</option>										
							</select>
						</span>            

            <!-- Min Price -->
            <div class="custom-input money">
              <money type="text" class="form-control" step="any" name="minprice"  v-model="selected.minPrice" v-bind="moneyMin"></money>
              <!--<select id="search_minprice" name="search_minprice" data-placeholder="Precio Mínimo" v-model="selected.minPrice">                
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
              </select>-->
            </div>
            
            <!-- Max Price -->
            <div class="custom-input money">
              <money type="text" class="form-control" step="any" name="maxprice"  v-model="selected.maxPrice" v-bind="moneyMax"></money>
              <!--<select id="search_maxprice" name="search_maxprice" data-placeholder="Precio Máximo" v-model="selected.maxPrice">
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
              </select>-->
            </div>
					</div>
					
					<button @click="search()" class="btn btn-fullcolor">Buscar</button>
				</div>
			</div>
		</div>
		<div class="container" v-show="isSearching">
			<ip-loader></ip-loader>
		</div>
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
      })
    }
  }
</script>
<style>
  .money>input[type=text],
  .custom-input input[type=text]{
    width: 300px;
  }
</style>