<template>
    <main>
        <!-- BEGIN PAGE TITLE/BREADCRUMB -->
		<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Nuestro equipo</h1>
						
						<ul class="breadcrumb">
						    <li><router-link to="/">Inicio </router-link></li>
                            <li><b>Nuestro equipo</b></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE/BREADCRUMB -->
		
        <!-- BEGIN CONTENT WRAPPER -->
		<div class="content">
			<div class="container">
				<div class="row">				
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-12">
						
						<!-- BEGIN AGENTS LISTING -->
                        <br>
                        <h1>Conoce a nuestro gran equipo</h1>
                        <hr>
						<ul id="agencies-results" class="agencies-grid">
							<li v-for="(a,i) in agent" :key="a.fullname" :index="i" class="col-md-3 agentsCustom"><!-- Set width to 6 columns for grid view mode only -->
								<div class="image">
                                    <img v-if="a.image!=0" :src="a.image" :alt="a.fullname" />
                                    <img v-else src="@/assets/images/avatar.png" :alt="a.fullname" />
                                </div>
								<div class="info">
									<h3>{{a.fullname}}</h3>
									
									<p v-if="a.biografia!=0">{{a.biografia}}</p>
									
									<!--<ul class="contact-us">
                                        <li v-if="a.cellphone!=0"><a><i class="fa fa-phone"></i> {{a.cellphone}}</a></li>
										<li v-if="a.email!=0"><a :href="'mailto:'+a.email"><i class="fa fa-envelope"></i> {{a.email}}</a></li>
									</ul>-->


                                    <ul v-if="a.fb!=0 && a.tweet!=0 && a.gmas!=0 && a.linkedin!=0" class="social-networks">
                                        <li v-if="a.fb!=0"><a  href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li v-if="a.tweet!=0"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li v-if="a.gmas!=0"><a href="#"><i class="fa fa-gplus"></i></a></li>
                                        <li v-if="a.linkedin!=0"><a  href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li v-if="a.skypeid!=0"><a  href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>                                    																	
								</div>
							</li>							
						</ul>
						<!-- END AGENTS LISTING -->																	
					</div>	
					<!-- END MAIN CONTENT -->														
				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
    </main>
</template>

<script>
	import immoService from '@/services/immo'
	export default {
		data(){
			return{
				agent:[],
				images:[]
			}
		},
		created(){
			immoService.getAgents()
			.then(res=>{
				this.agent=res;
				
			})
		}
	}
</script>

<style>
    .agentsCustom{
        height: 300px;
    }
    .agentsCustom .image >img{
        width:50%;
    }
</style>