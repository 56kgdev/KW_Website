var idCompany='246';
const config = {
  companyId:idCompany,
  /*Url's para propiedades
    apiUrl: Informacion para homePage
    singleUrl: Informacion para descripcion de propiedad
    allPropUrl:  Informacion de todas las propiedades
  */
  apiUrl: 'http://www.immosystem.com.mx/api/properties.php?company='+idCompany+'&home=true',
  singleUrl: 'http://www.immosystem.com.mx/api/properties.php?property=',
  allPropUrl: 'http://www.immosystem.com.mx/api/properties.php?company='+idCompany,

  /*url's para desarrollos
    allDevsUrl: lista de todos los desarrollos (para tarjetas)
    devsInfoUrl: Informacion para descripcion de desarrollo
  */
  allDevsUrl:'http://www.immosystem.com.mx/api/developments.php?company='+idCompany+'&developments=true',
  devsInfoUrl:'http://www.immosystem.com.mx/api/developments.php?folio=',
  propsListDevsAdd:'&p=true',

  
  /*  

    NUEVOS JSON 

  */
    //ciudades
    selectCities:'https://www.immosystem.com.mx/appImmov2/immoApp2.php?&d=0&m=cities&folio='+idCompany,
    
    //Tipos de Propiedades
    selectTypeProperties:'https://www.immosystem.com.mx/appImmov2/immoApp2.php?&d=0&m=typeProperties&folio='+idCompany,

    //Compañia Info
    infoCompany: 'https://www.immosystem.com.mx/api/footer.php?company='+idCompany,
    
    //Buscador
    //http://www.immosystem.com.mx/appImmov2/immoApp2.php?d=0&m=findProperty&folio=
    //searchProps:'http://www.immosystem.com.mx/appImmov2/immoApp2.php?d=0&m=searchP&folio='+idCompany,
    searchProps:'https://www.immosystem.com.mx/api/searchproperties.php?company='+idCompany,

    //Propiedades Info
      //todas las propiedades
        allProps:'https://www.immosystem.com.mx/api/properties.php?company='+idCompany,
      // Descripcion de la propiedad
        detailProps: 'https://www.immosystem.com.mx/api/properties.php?property=',
      //Metadatos por propiedad
        metaDatProps:'https://www.immosystem.com.mx/api/metatags.php?folio=',

    //Desarrollos Info
      //todos los desarrollos
        allDevs:'https://www.immosystem.com.mx/api/developments.php?company='+idCompany+'&developments=true',
      //Descripcion del desarrollo
        detailDevs:'https://www.immosystem.com.mx/api/developments.php?folio=',

    //HomePage Info
      //Propiedades destacadas
        destProps:'https://www.immosystem.com.mx/api/destacadas.php?company='+idCompany,
      //Propiedades de slider
        sliderProps:'https://www.immosystem.com.mx/api/slider.php?company='+idCompany+'&home=true',
      //Propiedades aleatorias
        randomProps:'https://www.immosystem.com.mx/api/properties.php?company='+idCompany+'&home=true',
      //Agentes de la compañia
        agents:'https://www.immosystem.com.mx/appImmov2/immoApp2.php?d=0&m=getAgents&folio='+idCompany,
       //Geolocation
       geolocation: "https://maps.googleapis.com/maps/api/geocode/json?latlng=",
       
       //ViewsProperty   
       ViewsProperty:"https://www.immosystem.com.mx/appImmov2/immoApp2.php?d=0&m=viewsProperty&origincode=7952&ip=0"
}

export default config