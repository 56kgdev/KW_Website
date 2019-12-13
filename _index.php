<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Get data from url -->
    <?php 
      include ('./core/base/base.php');
      error_reporting(E_ALL);
      ini_set('display_errors', '1');

      
      $enlace_actual = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      $porciones = explode("/", $enlace_actual );
      $porcion = explode("-", $porciones [3]);
      
      if($porcion[0] == 'propiedad' || $porcion[0] == 'Propiedad'){
        $field= 'propiedad='.$porcion[1];
        $data=getMetaData($field);
        
        $unique=TRUE;
      }elseif($porcion[0] == 'desarrollo' || $porcion[0] == 'Desarrollo') {
        $field= 'desarrollo='.$porcion[1];
        $data=getMetaData($field);
        $unique=TRUE;
      }else{
        $field= 'company=128';//************************************************************** */
        $data=getMetaData($field);
        $unique=FALSE;
      }
      //include 'http://www.immosystem.com.mx/api/metatags.php?'.$field;
    ?>
    <!-- End get data from url -->

    <!-- Genral head -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    
    <!-- Código de instalación CLIENGO para http://immosystem.com.mx/ --> 
    <script>(function(){var ldk=document.createElement('script'); ldk.type='text/javascript'; ldk.async=true; ldk.src='https://s.cliengo.com/weboptimizer/5a6bbfbae4b05c4699cc66e1/5a6bbfbde4b05c4699cc66e9.js' ; var s=document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s);})();</script>
    <!-- End general head-->    

    <!-- Metadatos -->
    <meta property="og:site_name" content="<?php 
      if($data['website']){
        echo $data['website'];
      }
      else{
        echo $data['company'];
    } ?>"/>
    <meta property="og:title"           content="<?php echo $data['title']?>" />
    <meta property="og:image"           content="<?php echo $data['image']?>" />
    <meta property="og:image:alt"       content="<?php echo $data['alt']?>" />
    <meta property="og:description"     content="<?php echo $data['description']?>" />
    <meta itemprop="name"               content="<?php echo $data['title']?>" />
    <meta itemprop="description"        content="<?php echo $data['description']?>" />
    <meta property="og:locale"          content="es_LA"/>
    <meta property="og:type"            content="website">
    <meta name="twitter:site"           content="<?php echo $data['tw']?>"/>
    <meta name="twitter:creator"        content="<?php echo $data['tw']?>"/>
    <meta name="twitter:title"          content="<?php echo $data['title']?>" />
    <meta name="twitter:description"    content="<?php echo $data['description']?>" />
    <meta name="twitter:image"          content="<?php echo $data['image']?>" />
    <meta name="description"            content="<?php echo $data['description']?>" />
    <meta name="twitter:card"           content="summary">
    <meta name="author"                 content="Immo System" />    
    <meta property="og:url"         content="<?php echo $enlace_actual; ?>" >    
    
    <link rel="canonical" href="<?php echo $enlace_actual; ?>"/>
    <!-- End metadatos -->
    
    <!-- Title -->
    <title><?php echo $data['title']?></title>
    <!-- End title -->

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="./favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="./favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicons/favicon-16x16.png">
    <link rel="manifest" href="./favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- End favicons -->    
  </head>


  <body data-spy="scroll" data-offset="80">
  
    <div itemtype="app" id="app">

      <h1 itemprop="title"><?php echo $data['title']?></h1>

      <!-- Header content -->
      <div itemprop="header" id="header"><?php include './core/layouts/header.php'?></div>
      
      <!-- Page content -->
      <div itemprop="content" id="content"><?php
      switch($porcion[0]){
        case 'nosotros':
          include './core/about.php';
        break;
        case 'propiedades':
           include './core/properties.php';
        break;
        case'desarrollos':
          include './core/developments.php';
        break;
        case'contacto':
          include './core/contact.php';
        break;
        case'propiedad':
          include './core/property-detail.php';
        //propertyDetail($porcion[1]);
        break;
        case'aviso-privacidad':
          include './core/aviso-privacidad.php';
        break;

        default:
        include './core/home.php';
        break;
      }               
      ?></div>

      <!-- Footer content -->
      <div itemprop="footer" id="footer"><?php include './core/layouts/footer.php'?></div>
    </div>
    
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your share button code -->
    <div class="dadFace">
      <a target="_parent" align="center" id="fbGeneralButton" class="fb-share-button" 
        data-href="https://<?php echo $_SERVER['HTTP_HOST']; ?>" 
        data-layout="button"
        data-mobile-iframe="true">
      </a>
    </div>
  
    <script src="./dist/build.js"></script>

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
