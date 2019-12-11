<template>
	<main>
		<!-- START SECTION TOP -->
		<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Propiedades</h1>
						
						<ul class="breadcrumb">
							<li><router-link to="/">Inicio</router-link></li>
							<li><b>Propiedades</b></li>
						</ul>						
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION TOP -->

		<!-- START PROPERTY -->	
		<div class="content">
			<div class="container">
				<div class="row">
					<div id="property-listing" class="list-style clearfix col-md-8">
						<div class="row">								
							<br>														
							<list-props v-for="(p,index) in properties" :key="p.propertyid" :property="p" :index="index" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index"></list-props>							
							<v-pagination v-model="pag" :length="NUM_PAGES" :total-visible="7" @next="pag += 1" @prev="pag -= 1"></v-pagination>
							<br>							
						</div>						
					</div>
					<div class="col-md-4">
						<!-- BEGIN ADVANCED SEARCH -->    
                        <h2 class="section-title">Buscar propiedades</h2>
                        <ip-search-form-prop @select="setPropertiesFound"></ip-search-form-prop>
					</div>								
				</div><!--- END ROW -->	
				<br>			
			</div><!--- END CONTAINER -->
		</div>
		<!-- END  PROPERTY -->
  </main>
</template>

<script>	
	import immoService from '@/services/immo.js'
	import IpProperty from '@/components/Property.vue'
	import RlLoader from '@/components/shared/Loader.vue'
	import ListProps from '@/components/PropertyList.vue'
	import IpSearchFormProp from '@/components/SearchFormProp.vue'    
	import IpSearchForm from '@/components/SearchForm.vue'    

	export default {
		name: 'app',
		components: {
			IpProperty,
			RlLoader,
			ListProps,
			IpSearchFormProp,
			IpSearchForm
		},
		data () {
			return {		
				pag:1,
				NUM_RESULTS:6,			
				properties: [],
				isLoading: false,
				NUM_PAGES:0,
				paginate:['properties'],	
				propertiesFound: {}	
			}
		},
		methods:{
			clickCallback(page){		
				console.log(page)
			},
			setPropertiesFound(properties) {    
                this.propertiesFound = properties    
                //this.searchCompleted = true
                this.$router.push({ name: "search", params: { properties } });    
            }
		},
		created () {
			window.scrollTo(0,0);
			this.isLoading = true

			immoService.getAllProps()
				.then(res => {
					this.properties = res
					this.isLoading = false
				})
				.then(()=>{
						this.NUM_PAGES = this.properties.length/this.NUM_RESULTS;
						this.NUM_PAGES=this.NUM_PAGES.toString();
						this.NUM_PAGES= this.NUM_PAGES.split(".");
						this.NUM_PAGES=eval(this.NUM_PAGES[0]);
						if(this.properties.length % this.NUM_RESULTS !=0){
							this.NUM_PAGES++;
						}			
					})						
		}
	}	
</script>

<style>
	.pagination li a{
		color:#132daf !important;
	}
	.pagination .active a {
		border: 1px solid #ddd !important;
		background-color: #f1f3f6 !important;
	}
</style>