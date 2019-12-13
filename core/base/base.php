<?php
    const idComp='company=128';
    //Funcion que decodifica los json
        function getJsons($urlJson){
            $json = file_get_contents($urlJson);
            $array = json_decode($json,true);
            
            return $array;
        }

    //////////////////////////////////
  
    /**** Recuperacion de datos json y envio ****/

    function getMetaData($dataUrl){
        $url ='https://www.immosystem.com.mx/api/metatags.php?'.$dataUrl;
        $res = getJsons($url);              
        return $res['metatags'];
    }

    function getFooter(){
        $url='https://www.immosystem.com.mx/api/footer.php?'.idComp;
        $res=getJsons($url);
        return $res['footer'][0];
    }

    function getPropsHome(){
        $url='https://www.immosystem.com.mx/api/properties.php?'.idComp.'&home=true&limit=6';
        $res=getJsons($url);
        return $res['propiedades'];
    }

    function getDestcProps(){
        $url='https://www.immosystem.com.mx/api/destacadas.php?'.idComp;
        $res=getJsons($url);
        return $res['destacadas'];
    }

    function getPropsAll(){
        $url='https://www.immosystem.com.mx/api/properties.php?'.idComp;
        $res=getJsons($url);
        return $res['propiedades'];
    }

    function getDevsAll(){
        $url='https://www.immosystem.com.mx/api/developments.php?'.idComp;
        $res=getJsons($url);
        return $res['developments'];
    }

    function getDataProperty($idProp){
        $url='https://www.immosystem.com.mx/api/properties.php?property='.$idProp;
        $res=getJsons($url);
        /*if($res['property']['company']==143){
            return $res['property'];
        }else{
            return "error 404";
        }*/
        return $res['property'];
    }
    
?>