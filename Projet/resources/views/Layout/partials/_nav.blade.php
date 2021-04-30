 <style>
      .dropdown-submenu{position:relative;}
      .dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
      .dropdown-submenu:hover>.dropdown-menu{display:block;}
      .dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
      .dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}
      .blue{color:#1D38FC}
      .green{color:#0EC929}
      .red{color:#FF0000}
      
    </style>
 <nav class="navbar">
  <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-md hidden-lg" href="#">Menu</a>
          <img src="{{asset('images/logo.png')}}" style="width:100px;margin-left:-30px;margin-right:40px;" alt="logo de CENTRO" class="img-rounded">
          <!--<a   style="margin-right:64px"class="white" href="{{route('home')}}"><img src="{{asset('images/home.png')}}" style="width:30px"></a>-->
        </div>
        
        <div class="collapse navbar-collapse" id="main-menu" style="margin-bottom: 0px;">
         
          <ul class="nav navbar-nav">

             @if(AuthorizedRole(Auth::user()->name,2))
             <li class="dropdown"> 



              <a data-toggle="dropdown" class="dropdown-toggle white" href="#">Param&eacute;trage<b class="caret"></b></a>
               
                    <ul class="dropdown-menu jqueryFadeIn">
                      
                      <li class="dropdown-submenu">
                        <a data-toggle="dropdown"tabindex="-1" disabled=disabled href="#"><span class="fa fa-plus-square  red"></span> Enregistrement</a>
                    <ul class="dropdown-menu">
                      
                       
                      <li><a href="{{route('DesignationObjet.create')}}"><span class="fa fa-gavel red"></span> Article</a></li>
                      <li><a href="{{route('fournisseur.create')}}"><span class="fa fa-male blue" ></span> Fournisseur</a></li>
                      <li><a href="{{route('projet.create')}}"><span class="fa fa-bank  red"></span> Destination</a></li>
                      <li><a href="{{route('lieu.create')}}"><span class="glyphicon glyphicon-map-marker blue"></span> Lieu</a></li>
                    </ul>
                       </li>
                    @if(AuthorizedRole(Auth::user()->name,3))   
                       <li class="dropdown-submenu">
                  <a data-toggle="dropdown" tabindex="-1" href="#"><span class="fa fa-user blue"></span> Utilisateur</a>
                    <ul class="dropdown-menu">
                      
                      <li><a href="{{route('Users')}}"><span class="fa fa-plus-square  blue"></span > Creer un Utilisateur</a></li>  
                      <!--<li><a href="/Users/Liste"><span class="glyphicon glyphicon-list-alt"></span> Liste</a></li> --> 
                      <li><a href="{{route('user.index')}}"><span class=" fa fa-sitemap red"></span> Gestion d'utilisateur</a></li>  
                      
                      
                    </ul>
                  </li>
                  
                    @endif

                    </ul>
                  
            </li>

            @else

            <li class="dropdown"> 

              <a data-toggle="dropdown" class="dropdown-toggle white" href="#">Param&eacute;trage<b class="caret"></b></a>
               
                    
                  
            </li>

            @endif

            @if(AuthorizedDivison(Auth::user()->name,1))

            <li class="dropdown"> 

              <a data-toggle="dropdown" disabled="disabled" class="dropdown-toggle white" href="#" >DAA<b class="caret"></b></a>
                <ul class="dropdown-menu jqueryFadeIn">
                  
                  <li class="dropdown-submenu">
                  <a data-toggle="dropdown" tabindex="-1" href="#"><span class="fa fa-life-saver"></span> Bon</a>
                    <ul class="dropdown-menu">
                      <?php if(isset($user)){ ?>
                      <li><a href="{{route('BonCommande.create',['user'=>$user])}}"><span class="glyphicon glyphicon-shopping-cart blue"></span > Bon de Commande</a></li> 
                      <?php }else{ ?>
                       <li><a href="{{route('BonCommande.create')}}"><span class="glyphicon glyphicon-shopping-cart blue"></span > Bon de Commande</a></li> 
                       <?php }?>
                       <?php if(isset($user)){ ?>
                      <li><a href="{{route('BonTransfert.create',['user'=>$user])}}"><span class="glyphicon glyphicon-transfer red"></span> Bon de Transfert</a></li>
                      <?php }else{ ?>
                       <li><a href="{{route('BonTransfert.create')}}"><span class="glyphicon glyphicon-transfer red"></span> Bon de Transfert</a></li>
                        <?php }?>
                    </ul>
                  </li>
                  <li class="dropdown-submenu">
                  <a data-toggle="dropdown" class="dropdown-toggle white" tabindex="-1" href="#"><span class="glyphicon glyphicon-list-alt"></span> Liste</a>
                    <ul class="dropdown-menu">
                      
                      <li><a href="{{route('DesignationObjet.index')}}"><span class="fa fa-gavel blue"></span> Article</a></li>  
                      <li><a href="{{route('fournisseur.index')}}"><span class="fa fa-male red" ></span> Fournisseur</a></li>
                      
                    </ul>
                  </li>
                </ul>
            </li>
            @else
           <li class="dropdown"> 

              <a data-toggle="dropdown" disabled="disabled" class="dropdown-toggle white" href="#" >DAA<b class="caret"></b></a>
                
            </li>
            @endif
            
            @if(AuthorizedDivison(Auth::user()->name,2))
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle white" href="#">Comptabilite<b class="caret"></b></a>
              
              <ul class="dropdown-menu jqueryFadeIn">
               <li><a href="{{route('compta')}}"><span class=" fa fa-money green"></span> Regler Facture</a></li> 
                      
                <!--<li class="divider"></li>-->
                
               
                <li class="dropdown-submenu">
                  <a data-toggle="dropdown"tabindex="-1" href="#"><span class="fa fa-barcode"></span> Rapport</a>
                    <ul class="dropdown-menu">
                      <li><a href="{{route('ch.frs.p')}}"><span class="fa fa-spinner fa-pulse blue"></span> PAYER</a></li>  
                      <li><a href="{{route('ch.frs.ip')}}"><span class="fa fa-spinner fa-pulse red"></span> IMPAYER</a></li>  
                      
                                        
                    </ul>
                    
                </li>
                <li class="dropdown-submenu">
                  <a data-toggle="dropdown"tabindex="-1" href="#"><span class="glyphicon glyphicon-list-alt"></span> Liste</a>
                    <ul class="dropdown-menu">
                      <li><a href="{{route('listeFacture')}}"><span class="fa fa-shield red"></span> Facture</a></li>  
                                       
                    </ul>
                </li>
              </ul>
            </li>      
            
            @else

            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle white" href="#">Comptabilite<b class="caret"></b></a>
              
              </li>      

            @endif

            
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle white" href="#">{{ Auth::user()->name }}<b class="caret"></b></a>
              
              <ul class="dropdown-menu jqueryFadeIn">
               <li><a href="{{route('logout')}}">Deconnexion</a></li> 
                      
                <!--<li class="divider"></li>-->
                
               
                
               
              </ul>
            </li>      
            </ul>
        </div>
      </div>
      </nav>
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
      