<template>
	<main>
		<!-- START SECTION TOP -->
		<section class="section-top" style="background-image: url(assets/img/bg/section-bg.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;">
		<br>
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
					<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h1>Propiedades encontradas: {{ results }}</h1>
						<ol class="breadcrumb">
						  <li><router-link to="/"><i class="fa fa-undo"></i> Inicio</router-link></li>
						  
						</ol>
						
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->

		</section>	
		<br>
		<br>
		<br>
		<hr>
		<!-- END SECTION TOP -->

		<!-- START PROPERTY -->	
		<section class="template_property">
			<div class="container">
				<div class="row"> 
					 <div class="section-title text-center wow zoomIn">                            
                        <div class="grid-style1 clearfix">
                            <ip-property v-for="(p,index) in propertiesFound" :key="p.propertyid" :property="p" :index="index" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index"></ip-property>					
                        </div>                       
                    </div>  					
						<!-- BEGIN PAGINATION -->
							<!--<div class="pagination" aria-label="Page navigation">
								<ul v-show="pag != 1"  id="previous">
									<li>
										<a href="#" aria-label="Previous" @click.prevent="pag -= 1" >
											<i aria-hidden="true" class="fa fa-chevron-left"></i>
										</a>
									</li>
								</ul>
								<ul>
									<li v-for="(n) in NUM_PAGES" :key="n" :id="n" @click.prevent="pag = n" v-bind:class="{'active':(pag==n)}">
										<a aria-hidden="true" href="#">{{n}}</a>
									</li>									
								</ul>
								<ul v-show="pag * NUM_RESULTS / propertiesFound.length < 1" id="next">
									<li>
										<a href="#" aria-label="Next"  @click.prevent="pag += 1" >
											<i aria-hidden="true" class="fa fa-chevron-right"></i>
										</a>
									</li>
								</ul>
							</div>-->
						<!-- END PAGINATION -->					
				</div><!--- END ROW -->
				<v-pagination v-model="pag" :length="NUM_PAGES" :total-visible="7" @next="pag += 1" @prev="pag -= 1"></v-pagination>
				
			</div><!--- END CONTAINER -->
			<br>
			
		</section>
		<!-- END  PROPERTY -->

		<ip-search-form @select="setPropertiesFound"></ip-search-form>
		<hr>
  </main>
</template>

<script>
	import IpProperty from '@/components/Property.vue'
	import IpSearchForm from '@/components/SearchForm.vue'
	import IpLoader from '@/components/shared/Loader.vue'

	export default {
		components: {
			IpProperty,
			IpSearchForm,
			IpLoader
		},

		
		data () {
			return {
				propertiesFound: [],
				pag:1,
				NUM_RESULTS:9,			
				properties: [],
				isLoading: false,
				NUM_PAGES:0,
				paginate:['properties']
			}
		},

		methods: {
			setPropertiesFound (properties) {
				this.propertiesFound = properties
				this.results = properties.length
			}
		},

		created () {		
			this.propertiesFound = this.$route.params.properties;			
			this.results = this.propertiesFound.length;
			this.NUM_PAGES = this.propertiesFound.length/this.NUM_RESULTS;
			this.NUM_PAGES=this.NUM_PAGES.toString();
			this.NUM_PAGES= this.NUM_PAGES.split(".");
			this.NUM_PAGES=eval(this.NUM_PAGES[0]);
			if(this.propertiesFound.length % this.NUM_RESULTS !=0){
				this.NUM_PAGES++;
			}	
			window.scrollTo(0,0);					
		}	
	}
</script>