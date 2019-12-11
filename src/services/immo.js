import config from './config.js';

const immoService = {}

//Obtener datos de localización
immoService.getClickLocation=function (){
	return fetch('http://www.geoplugin.net/json.gp')
	.then(res=>res.json())
	.then(res=>{	
		return res;
	})
}

//Enviar datos sobre acceso a propiedad para estadisticas
immoService.sendDataClick=function(propertyData){		
	let url =config.ViewsProperty+'&folio='+config.companyId
		+'&propertyid='+propertyData.propertyId
		+'&url='+propertyData.url		
	console.log("send immo property");
		fetch(url)
		.then(res=>res.json())
		.then(res=>{
			return res.status;
		})	
}

//Obtener informacion general de la compañía
immoService.getInfoCompany = function () {
  return fetch(config.infoCompany)
  	.then(res => res.json())
  	.then(res => res.footer)
	.then(res => {
		let footData = []
		footData.push(res[0]) 
		return footData
	})
}

//Obtener informacion de agentes
immoService.getAgents=function(){
	return fetch(config.agents)
	.then(res=>res.json())
	.then(res=>res.data)
	.then(res=>{		
		let agentsDat=[];
		for(let x in res){
			agentsDat.push(res[x])
		}
		return agentsDat
	})
}

//Obtener la lista de todas las propiedades
immoService.getAllProps = function () {
	return fetch(config.allProps)
		.then(res => res.json())
		.then(res => res.propiedades)
		.then(res => {
			let properties = []			
			let propertiesAgs=[];
			let allProperties =[];

			for (let x in res) {
				
				if(res[x]["city"]=="Aguascalientes"){					
					propertiesAgs.push( res[x] )
				}/*else{
					properties.push( res[x] )
				}*/
							  	
			}
			for (let x in res) {
				
				if(res[x]["city"]!="Aguascalientes"){					
					propertiesAgs.push( res[x] )
				}/*else{
					properties.push( res[x] )
				}*/
							  	
			}

			//allProperties.push(propertiesAgs);
			//allProperties.push(properties);			
			return propertiesAgs
		})
}

//Obtener informacion de propieadades (pagina de descripcion de propiedades)
immoService.getDetPropById = function (id) {
	const url = config.detailProps + id
	text:[]
	propertyDesc:[]
	return fetch(url)
		.then(res => res.json())
		
}

//Obtener metadatos de propieadades (pagina de descripcion de propiedades)
immoService.getMetaData=function(id){
	const url = config.metaDatProps + id
	return fetch(url)
		.then(res => res.json())
}

//Obtener la lista de todos los desarrollos
immoService.getAllDevs = function(){
	return fetch(config.allDevs)
		.then(res => res.json())
		.then(res => res.developments)
		.then(res => {
			let developments = []
			
			for (let x in res) {
				
			  developments.push( res[x] )
			  
			}
								
			return developments
		})
}

//Obtener informacion por desarrollo individual (pagina de descripcion del desarrllo)
immoService.getDetDevsById=function(id){
	const url = config.detailDevs + id
	text:[]
	developmentsDesc:[]
	return fetch(url)
		.then(res => res.json())
}

//Obtener la lista de propiedades destacadas
immoService.getDestPropsHome=function(){
	const url=config.destProps
	return fetch(url)
		.then(res => res.json())
}

//Obtener la lista de propiedades para slider
immoService.getSliderHome = function () {
	return fetch(config.sliderProps)
		.then(res => res.json())
		.then(res => res.slider)
		.then(res => {
			let properties = []

			for (let x in res) {
			  properties.push( res[x] )
			}

			return properties
		})
}

//Obtener la lista de propiedades para mostrar en home
immoService.getPropsHome = function () {
	return fetch(config.randomProps)
		.then(res => res.json())
		.then(res => res.propiedades)
		.then(res => {
			let properties = []

			for (let x in res) {
			  properties.push( res[x] )
			}

			return properties
		})
}

//Obtener datos de los campos para busqueda
immoService.search = function (selected) {
	const response = this.getAllProps()
		.then(res => {
			let properties = []

			for (let x in res) {
				let matched = true
				const property = res[x]
				const data = {}
				const values = {}

				data.city = property.city
				data.type = property.typepropertyspa
				data.beds = property.bedrooms
				data.baths = property.bathrooms
				//data.currency = property.currenname
				//data.currencyPerMonth=property.currennamePerMonth
				//data.sale = property.price
				//data.rent = property.longtermrental

				values.city = (selected.city === '') ? data.city : selected.city
				values.type = (selected.type === '') ? data.type : selected.type
				values.beds = (selected.bedrooms === '') ? data.beds : selected.bedrooms
				values.baths = (selected.bathrooms === '') ? data.baths : selected.bathrooms
				//values.currency = (selected.operation !== 'sale') ? data.currency : selected.currency
				//values.currencyPerMonth = (selected.operation !== 'rent') ? data.currencyPerMonth : selected.currency
				//values.currency = (selected.operation === 'rent') ? data.currencyPerMonth : data.currencyPerMonth
				///values.currencyPerMonth=(selected.currency==='')?data.currencyPerMonth : selected.currency
				//values.sold = (selected.operation === 'sale') ? '1' : '0'
				//values.rent = (selected.operation === 'rent') ? '1' : '0'
					
				for (let val in values) {
					if (values[val] !== data[val])
						matched = false
				}

				if (matched)
					properties.push(property)
			}

			return properties
		})

	return response
}

//Metodo de busqueda en listado de propiedad
immoService.getSearchData = function () {
	const response = this.getAllProps()
		.then(res => {
			let response = {}
			let cities = []
			let types = []
			let prices = []
			let currencies = []
			let bedrooms = []
			let bathrooms = []

			for (let x in res) {
				const property = res[x]

				if (!cities.includes(property.city))
					cities.push(property.city)
					
				if (!types.includes(property.typepropertyspa))
					types.push(property.typepropertyspa)
				
				if (!bedrooms.includes(property.bedrooms))
					bedrooms.push(property.bedrooms)

				if (!bathrooms.includes(property.bathrooms))
					bathrooms.push(property.bathrooms)
				
				if (!prices.includes(property.price))
					prices.push(property.price)

				if (!prices.includes(property.pricepermonth))
					prices.push(property.pricepermonth)
				
				if (!currencies.includes(property.currenname))
					currencies.push(property.currenname)
			}

			prices = setPrices(prices)

			response.cities = cities
			response.types = types
			response.prices = prices
			response.currencies = currencies
			response.bedrooms = bedrooms
			response.bathrooms = bathrooms

			return response
		})
	return response
}

//Metodo de busqueda con json
immoService.searchProp=function (selected){
	
	let url = config.searchProps;	

    if (selected.keyword != '') {
      url += '&kwEsp=' + selected.keyword;
    }
    if (selected.minPrice && selected.minPrice != '') {
      url += '&prMin=' + selected.minPrice;
    }
    if (selected.maxPrice && selected.maxPrice != '') {
      url += '&prMax=' + selected.maxPrice;
    }   
    if (selected.type != '') { //no está en json
      url += '&tProp=' + selected.type;
	}
	if (selected.operation != '') {
		url += '&operation=' + selected.operation;
	}
    if (selected.city != '') {  //no está en json
      url += '&city=' + selected.city;
	}
		 	
	return fetch(url)
		.then(res => res.json())
		.then(res => res.data)
		.then(res => {
			let properties = []
			
			for (let x in res) {
			  properties.push( res[x] )
			}

			return properties
		})
	
}

//Obtener datos de ubicación
immoService.getLocation = function (lat, lng) {
	const url = config.geolocation + lat + ',' + lng;
	return fetch(url)
		.then(res => res.json())
		.then(res => {
			return res.results[0].formatted_address;
		})
}

//Obtener lista de ciudades para formulario de busqueda
immoService.getSelectCity=function(){
	return fetch(config.selectCities)
	.then(res=>res.json())
	.then(res=>res.data)	
	.then(res=>{		
		let cities=[];

		for(let x in res){
			cities.push(res[x])
		}		
		return cities
	})
}

//Obtener lista de typos de propiedad para formulario de busqueda
immoService.getSelectTypeProps=function(){
	return fetch(config.selectTypeProperties)
	.then(res=>res.json())
	.then(res=>res.data)	
	.then(res=>{
	
		let tprops=[];

		for(let x in res){
			tprops.push(res[x])
		}
		
		return tprops
	})
}

//Obtener las propiedades para mostrar en las tarjetas del home ordenadas de forma estatica segun el orden dado
/*immoService.getPropsHome=function(){
	return fetch(config.allPropUrl)
		.then(res => res.json())
		.then(res => res.propiedades)
		.then(res => {
			let properties = []
			let filtProps = []
			
			for(let i in res){
				if(res[i].propertyid==16524){ filtProps[0]=res[i]}
				if(res[i].propertyid==16522){ filtProps[1]=res[i]}
				if(res[i].propertyid==16509) {filtProps[2]=res[i]}
				if(res[i].propertyid==16779) {filtProps[3]=res[i]}
				if(res[i].propertyid==16525) {filtProps[4]=res[i]}

				
			}
			console.log("Propiedades filtradas",filtProps)

			return filtProps
		})
}
*/

immoService.setRecentProperties = function () {
	const response = this.getProperties()
		.then(res => {
			const reverse = res.reverse()
			let properties = []

			for (let i = 0; i < 6; i++) {
				properties.push(reverse[i])
			}

			return properties
		})

	return response
}

const setPrices = (prices)=>{
	let response = []
	
	const lowestPrice = parseInt(prices.sort()[0])
	const highestPrice = parseInt(prices.sort()[prices.length - 1])
	response.push(lowestPrice)
	
	const plus = Math.round((highestPrice - lowestPrice) / 9)
	let basePrice = lowestPrice
	let count = 0
	while (count < 8) {
		basePrice += plus
		
		response.push(basePrice)
		
		count++
	}
	
	response.push(highestPrice)

	return response
}

// Format url
immoService.normalize = (function() {
	var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç", 
		to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
		mapping = {};
	
	  for(var i = 0, j = from.length; i < j; i++ )
		  mapping[ from.charAt( i ) ] = to.charAt( i );
	
	  return function( str ) {
		  var ret = [];
		  for( var i = 0, j = str.length; i < j; i++ ) {
			  var c = str.charAt( i );
			  if( mapping.hasOwnProperty( str.charAt( i ) ) )
				  ret.push( mapping[ c ] );
			  else
				  ret.push( c );
		  }      
		  return ret.join( '' ).replace( /[^-A-Za-z0-9]+/g, '-' ).toLowerCase();
	  }
	
	})()

export default immoService
