<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Menu Plusieurs niveaux</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 
 
    
    <style>
      .dropdown-submenu{position:relative;}
      .dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
      .dropdown-submenu:hover>.dropdown-menu{display:block;}
      .dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
      .dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}
      .blue{color:#1D38FC}
      .green{color:#0EC929}
      .red{color:#FF0000}
      .orange{color:#ffe100}
    </style>
    
  </head>
  <body>
  
  
      <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-md hidden-lg" href="#">Menu</a>
          <img src="/images/logo.png" style="width:100px;margin-left:50px" alt="logo de CENTRO" class="img-rounded">
        </div>
        
        <div class="collapse navbar-collapse" id="main-menu" style="margin-bottom: 0px;">

          <ul class="nav navbar-nav">

            <li class="dropdown"> 

              <a data-toggle="dropdown" href="#">Achat&Approvisonnement<b class="caret"></b></a>
                <ul class="dropdown-menu jqueryFadeIn">
                  <li class="dropdown-submenu">
                  <a data-toggle="dropdown"tabindex="-1" href="#"><span class="fa fa-cogs"></span> Param&eacute;trage</a>
                    <ul class="dropdown-menu">
                      <li class="dropdown-header">Enregistrement</li>
                      <li><a href="#"><span class="fa fa-plus-square red"></span>Objet</a></li>  
                      <li><a href="#"><span class="fa fa-plus-square red"></span>Designation d'Objet</a></li>
                      <li><a href="#"><span class="fa fa-plus-square red"></span>Fournisseur</a></li>
                      <li><a href="#"><span class="fa fa-plus-square red"></span> Lieu</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-submenu">
                  <a data-toggle="dropdown"tabindex="-1" href="#"><span class="fa fa-cogs"></span> Bon</a>
                    <ul class="dropdown-menu">
                      
                      <li><a href="#"><span class="fa fa-bar-chart-o"></span>Bon de Commande</a></li>  
                      <li><a href="#"><span class="glyphicon glyphicon-user"></span>Bon de Transfert</a></li>
                      
                    </ul>
                  </li>
                  <li class="dropdown-submenu">
                  <a data-toggle="dropdown"tabindex="-1" href="#"><span class="fa fa-cogs"></span> Liste</a>
                    <ul class="dropdown-menu">
                      
                      <li><a href="#"><span class="fa fa-bar-chart-o"></span>Objet</a></li>  
                      <li><a href="#"><span class="glyphicon glyphicon-user"></span>Fournisseur</a></li>
                      
                    </ul>
                  </li>
                </ul>
            </li>
            
            <li class="dropdown"> 
              <a data-toggle="dropdown" href="#">Comptabilite<b class="caret"></b></a>
              <ul class="dropdown-menu jqueryFadeIn">
                
                      
                <!--<li class="divider"></li>-->
                
               
                <li class="dropdown-submenu">
                  <a data-toggle="dropdown"tabindex="-1" href="#"><span class="fa fa-cogs"></span> Param&eacute;trage</a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><span class="fa fa-bar-chart-o"></span> Mise à jour du bon</a></li>  
                      
                                        
                    </ul>
                </li>
                <li class="dropdown-submenu">
                  <a data-toggle="dropdown"tabindex="-1" href="#"><span class="fa fa-cogs"></span> Liste</a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><span class="fa fa-bar-chart-o"></span> Facture</a></li>  
                                       
                    </ul>
                </li>
              </ul>
            </li>      
            
            <li class="dropdown"> 
              <a data-toggle="dropdown" href="#">Logistique<b class="caret"></b></a>
              <ul class="dropdown-menu jqueryFadeIn">
                <li class="dropdown-header">Produits</li>
                <li><a href="#"><span class="fa fa-bank blue"></span> Liste des produits</a></li>
                <li><a href="#"><span class="fa fa-plus-square red"></span> Cr&eacute;er un produit</a></li>
                <li class="dropdown-header">Nomenclature</li>
                <li><a href="#"><span class="fa fa-bank blue"></span> Liste des nomenclatures</a></li>
                <li><a href="#"><span class="fa fa-plus-square red"></span> Cr&eacute;er une nomenclatures</a></li>
              </ul>
            </li>
            
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#about" class="white">Deconnexion</a></li>
            </ul>
        </div>
      </nav>
      
      
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>     
    <script>
    $(function() {
      // Affichage du sous menu en douceur
      jQuery('ul.nav li.dropdown').hover(function() {
        jQuery(this).find('.jqueryFadeIn').stop(true, true).delay(200).fadeIn();
      }, function() {
        jQuery(this).find('.jqueryFadeIn').stop(true, true).delay(200).fadeOut();
      });

    });   
    </script>
  </body>
</html>