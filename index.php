<!DOCTYPE html>
<html lang="es">
  <head>
    <script>  
      function createCookie(clave, valor, diasexpiracion) {
        var d = new Date();
        d.setTime(d.getTime() + (diasexpiracion*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = clave + "=" + valor + "; " + expires;
      }

      function verifyCookie(clave) {
        var name = clave + "=";
        var cookie = document.cookie.split(';');
        for(var i=0; i<cookie.length; i++) {
            var c = cookie[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
        }
        return "";
      }

      function checkCookie(clave) {        
        var cookie = verifyCookie(clave);
        if (cookie!="") {
          $.ajax({
            url: "https://www.immosystem.com.mx/api/countvisits.php?companyid=246&concurrent=1",
            method: "GET",
            async: false,         
            dataType: "json",
            success: function(respuesta) {
              console.log("success");
            },
            error:function(){
              console.log("error");s
            }         
          });
        }else{
            createCookie(clave,1,365);
              $.ajax({
              url: "https://www.immosystem.com.mx/api/countvisits.php?companyid=246&unic=1",
              method: "GET",
              async: false,         
              dataType: "json",
              success: function(respuesta) {
                console.log("success")
              },
              error:function() {
                console.log("error");
              }                                
            });
        }
      }
    </script>
    <?php
    /*header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Content-Type: application/xml; charset=utf-8");*/

    //$url           = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    //include "http://www.immosystem.com.mx/api/meta.php?company=204";

    include ("./core/base/base.php");
    $enlace_actual = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $porciones = explode("/", $enlace_actual );
    $porcion = explode("-", $porciones [3]);    

    if($porcion[0] == 'propiedad' || $porcion[0] == 'Propiedad'){
      $field= 'propiedad='.$porcion[1];
      $data=getMetaData($field);  
      ?>
        <meta property="og:image"           content="<?php echo $data['image']?>" />
        <meta property="og:image:alt"       content="<?php echo $data['alt']?>" />
        <meta name="twitter:image"          content="<?php echo $data['image']?>" />
      <?php
      $unique=TRUE;
    }elseif($porcion[0] == 'desarrollo' || $porcion[0] == 'Desarrollo') {
      $field= 'desarrollo='.$porcion[1];
      $data=getMetaData($field);
      ?>
        <meta property="og:image"           content="<?php echo $data['image']?>" />
        <meta property="og:image:alt"       content="<?php echo $data['alt']?>" />
        <meta name="twitter:image"          content="<?php echo $data['image']?>" />
      <?php
      $unique=TRUE;
    }else{
      //
      $field= 'company=246';
      $data=getMetaData($field);
    
      $unique=FALSE;
    }
    ?>
    
    <!-- Metatags -->
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta 
      property="og:site_name" 
      content="
        <?php 
          if($data['website']){
            echo $data['website'];
          }
          else{
            echo $data['company'];
          } 
        ?>"
    />

    <meta property="og:title"           content="<?php echo $data['title']?>" />
    
    <meta property="og:description"     content="<?php echo $data['description']?>" />
    <meta itemprop="name"               content="<?php echo $data['title']?>" />
    <meta itemprop="description"        content="<?php echo $data['description']?>" />
    <meta property="og:locale"          content="es_LA"/>
    <meta property="og:type"            content="website">
    <meta name="twitter:site"           content="<?php echo $data['tw']?>"/>
    <meta name="twitter:creator"        content="<?php echo $data['tw']?>"/>
    <meta name="twitter:title"          content="<?php echo $data['title']?>" />
    <meta name="twitter:description"    content="<?php echo $data['description']?>" />
    
    <meta name="description"            content="<?php echo $data['description']?>" />
    <meta name="twitter:card"           content="summary">
    <meta name="author"                 content="Immo System" />
    <title><?php echo $data['title']?></title>
    <meta property="og:url"         content="<?php echo $enlace_actual; ?>" >
    <link rel="canonical" href="<?php echo $enlace_actual; ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta name="viewport"           content="width=device-width, initial-scale=1">
    <link rel="next"                href="https://ihomecancun.com/nosotros/"/>
    <link rel="next"                href="https://ihomecancun.com/contacto"/>
    <link rel="next"                href="https://ihomecancun.com/propiedades"/>      

    <!-- Google Web Font -->
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,500,900%7COpen+Sans:400,700,400italic" rel="stylesheet" type="text/css" />
    
    <!-- Bootstrap CSS -->
    <link href="./src/assets/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- Revolution Slider CSS settings -->
    <link rel="stylesheet" type="text/css" href="src/assets/rs-plugin/css/settings.css" media="screen" />

    <!-- Template CSS -->
    <link href="./src/assets/css/style.css" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="./src/assets/js/modernizr-2.8.1.min.js"></script>                
       
  </head>

  <!--<body data-spy="scroll" data-offset="80" onload="checkCookie('count')" onunload="beforeExit()">-->
  <body data-spy="scroll" data-offset="80" onload="checkCookie('count')" onunload="beforeExit()">
    <!-- START PRELOADER -->
    <div class="preloader">
      <div class="status">
        <div class="status-mes"></div>
      </div>
    </div>
    <!-- END PRELOADER -->
    <div id="app">
      <!-- Title page -->
      <!--<h1 itemtype="titlePage"><?php// echo $data['title']?></h1>-->
      <!-- Include header content -->
      <div itemtype="header" id="header"><?php include './core/layouts/header.php'?></div>
      <!-- Include content -->
      <div itemtype="contentPage" id="content"><?php
      switch($porcion[0]){
        case 'nosotros':
          include './core/about.php';
        break;
        case 'propiedades':
           include './core/properties.php';
        break;       
        case'contacto':
          include './core/contact.php';
        break;
        case'propiedad':
          include './core/property-detail.php';
        //propertyDetail($porcion[1]);
        break;

        default:
        include './core/home.php';
        break;
      }               
      ?></div>
      <!-- Include footer content -->
      <div itemtype="footer" id="footer"><?php include './core/layouts/footer.php'?></div>
    </div>
      
    <!--Script para antes de salir del navegador-->
    <script language="JavaScript" type="text/javascript">

      //window.onbeforeunload = beforeExit;

      function beforeExit() {        
        $.ajax({
          url: "https://www.immosystem.com.mx/api/countvisits.php?companyid=246&live=0",
          method: "GET",
          async: false,         
          dataType: "json",
          success: function(respuesta) {
            console.log("success")
          },     
          error:function(){
            console.log("error en envio de datos a Immo");
          }                           
        });
        return;
      }
      /*window.addEventListener("beforeunload",function(e){
        var confirmation="--";
          $.ajax({
            url: "http://www.immosystem.com.mx/api/countvisits.php?companyid=204&live=0",
            method: "GET",
            async: false,         
            dataType: "json",
            success: function(respuesta) {
              console.log("success")
            },     
            error:function(){
              console.log("error en envio de datos a Immo");
            }                           
          });

        return confirmation;
      });*/
    </script>
    <!--Termina script-->

    <script src="./dist/build.js"></script>
    <script src="./src/assets/js/jquery-1.12.4.min.js"></script>
    <!-- Libs -->
    <script src="./src/assets/js/common.js"></script>
    <script src="./src/assets/js/owl.carousel.min.js"></script>
    <script src="./src/assets/js/chosen.jquery.min.js"></script>
    <!--<script src="./src/assets/js/infobox.min.js"></script>-->

    <!-- jQuery Revolution Slider -->
    <script type="text/javascript" src="./src/assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>   
    <script type="text/javascript" src="./src/assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- Template Scripts -->
    <script src="./src/assets/js/variables.js"></script>
    <script src="./src/assets/js/scripts.js"></script>

    <!-- Agencies list -->
    <script src="./src/assets/js/agencies.js"></script>  
  </body>
</html>
