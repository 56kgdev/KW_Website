import Home from '@/components/Home.vue'
import About from '@/components/About.vue'
import Properties from '@/components/Properties.vue'
import PropertyDetail from '@/components/PropertyDetail.vue'
import Contact from '@/components/Contact.vue'
import Search from '@/components/Search.vue'
import notFound from '@/components/404.vue'
import AvisoPrivacidad from '@/components/AvisoPrivacidad.vue'
import OfferProperty from '@/components/OfferProperty.vue'
import AgentsList from '@/components/AgentsList.vue'
	
const routes = [
	{ path: '/', component: Home, name: 'home' },
  	{ path: '/nosotros', component: About, name: 'about' },
	{ path: '/propiedades', component: Properties, name: 'properties' },
	{ path: '/busqueda', component: Search, name: 'search' },
	{ path: '/propiedad-:id-:namePropFilt', component: PropertyDetail, name: 'property' },
	{

		path:'/propiedades-:id',		
		component:PropertyDetail,
		name:'propertyOnlyId',	
		children: [
			{
				path: '/propiedades-:id-:a?',
				name: 'named_id',
				component: PropertyDetail, 
				name: 'propertyAgent'
			}		
		] 
	},
	{ path: '/contacto', component: Contact, name: 'contact' },
	{ path: '/nuestro-equipo', component: AgentsList, name: 'agents' },
	{ path: '/aviso-privacidad', component: AvisoPrivacidad, name: 'avisoprivacidad' },
	{ path: '/oferta-tu-propiedad', component:OfferProperty, name:'offerProperty'},
	{ path: '/404', component:notFound, name:'404'},	
	{ path: '*', redirect: '/404'}
]

export default routes