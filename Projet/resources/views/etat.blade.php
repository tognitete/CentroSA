@extends('Layout.default')

@section('content')


  @include('Layout.partials._nav')
 
<form action="" method="GET">
  {{csrf_field()}}

<div class="eng_obj">
<div class="container">
    <div class="well">


      
      
        <div class="row">
        <div class=" col-md-12">
        <h1 class="title text-center">AFFICHAGE</h1>

    </div>
     
        </div>
    <br/><br/><br/>
   
 
      <div class="row">
          <div class="  col-md-4" style="height:200px">
            
         <div style="border: 2px solid #1c75c8;height:220px;padding: 3px; background-color:rgb(196,196,196); -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;" id="banniere" onmouseover="dwn(1)" onmouseout="outdwn(1)">

<span class="title">BC N&deg</span><span class="orange">1</span><br/><br/>
<span class="title">Materiaux Commande:</span>
<span class="orange">tuyaux</span>
<br/><br/>
<span class="title">Montant Total:</span><span class="orange">12500000</span><br/><br/>
<span class="title">Avance:</span> <span class="orange">0%</span> soit <input type="text" disabled="disabled" value="0"><br/><br/>

<span class="title">observations:</span><span class="orange">oui</span>
<div id="1" class="description">
          Telechargement...
          <input type="submit" class="btn btn-primary dwn" value="Telecharger">
</div>
</div>
<br/><br/><br/>
        </div>
        <div class="  col-md-4" style="height:200px">
            
         <div style="border: 2px solid #1c75c8;height:220px;padding: 3px; background-color: rgb(241,221,152); -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;" id="banniere" onmouseover="dwn(2)" onmouseout="outdwn(2)">

<span class="title">BC N&deg</span><span class="orange">1</span><br/><br/>
<span class="title">Materiaux Commande:</span>
<span class="orange">tuyaux</span>
<br/><br/>
<span class="title">Montant Total:</span><span class="orange">12500000</span><br/><br/>
<span class="title">Avance:</span> <span class="orange">0%</span> soit <input type="text" disabled="disabled" value="0"><br/><br/>

<span class="title">observations:</span><span class="orange">oui</span>
<div id="2" class="description">
          Telechargement...
          <input type="submit" class="btn btn-primary dwn" value="Telecharger">
</div>
</div>
<br/><br/><br/>
        </div>
        <div class="  col-md-4" style="height:200px">
            
         <div style="border: 2px solid #1c75c8;height:220px;padding: 3px; background-color:rgb(0,133,133); -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;" id="banniere" onmouseover="dwn(3)" onmouseout="outdwn(3)">

<span class="title">BC N&deg</span><span class="orange">1</span><br/><br/>
<span class="title">Materiaux Commande:</span>
<span class="orange">tuyaux</span>
<br/><br/>
<span class="title">Montant Total:</span><span class="orange">12500000</span><br/><br/>
<span class="title">Avance:</span> <span class="orange">0%</span> soit <input type="text" disabled="disabled" value="0"><br/><br/>

<span class="title">observations:</span><span class="orange">oui</span>
<div id="3" class="description">
          Telechargement...
          <input type="submit" class="btn btn-primary dwn" value="Telecharger">
</div>
</div>
<br/><br/><br/>
        </div>

         <div class="  col-md-4" style="height:200px">
            
         <div style="border: 2px solid #1c75c8;height:220px;padding: 3px; background-color:rgb(0,133,133); -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;" id="banniere" onmouseover="dwn(3)" onmouseout="outdwn(3)">

<span class="title">BC N&deg</span><span class="orange">1</span><br/><br/>
<span class="title">Materiaux Commande:</span>
<span class="orange">tuyaux</span>
<br/><br/>
<span class="title">Montant Total:</span><span class="orange">12500000</span><br/><br/>
<span class="title">Avance:</span> <span class="orange">0%</span> soit <input type="text" disabled="disabled" value="0"><br/><br/>

<span class="title">observations:</span><span class="orange">oui</span>
<div id="3" class="description">
          Telechargement...
          <input type="submit" class="btn btn-primary dwn" value="Telecharger">
</div>
</div>
<br/><br/><br/>
        </div> <div class="  col-md-4" style="height:200px">
            
         <div style="border: 2px solid #1c75c8;height:220px;padding: 3px; background-color:rgb(0,133,133); -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;" id="banniere" onmouseover="dwn(3)" onmouseout="outdwn(3)">

<span class="title">BC N&deg</span><span class="orange">1</span><br/><br/>
<span class="title">Materiaux Commande:</span>
<span class="orange">tuyaux</span>
<br/><br/>
<span class="title">Montant Total:</span><span class="orange">12500000</span><br/><br/>
<span class="title">Avance:</span> <span class="orange">0%</span> soit <input type="text" disabled="disabled" value="0"><br/><br/>

<span class="title">observations:</span><span class="orange">oui</span>
<div id="3" class="description">
          Telechargement...
          <input type="submit" class="btn btn-primary dwn" value="Telecharger">
</div>
</div>
<br/><br/><br/>
        </div> <div class="  col-md-4" style="height:200px">
            
         <div style="border: 2px solid #1c75c8;height:220px;padding: 3px; background-color:rgb(0,133,133); -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;" id="banniere" onmouseover="dwn(3)" onmouseout="outdwn(3)">

<span class="title">BC N&deg</span><span class="orange">1</span><br/><br/>
<span class="title">Materiaux Commande:</span>
<span class="orange">tuyaux</span>
<br/><br/>
<span class="title">Montant Total:</span><span class="orange">12500000</span><br/><br/>
<span class="title">Avance:</span> <span class="orange">0%</span> soit <input type="text" disabled="disabled" value="0"><br/><br/>

<span class="title">observations:</span><span class="orange">oui</span>
<div id="3" class="description">
          Telechargement...
          <input type="submit" class="btn btn-primary dwn" value="Telecharger">
</div>
</div>
<br/><br/><br/>
        </div>


          <div class="col-md-1">
                         
             
           
        
        
            <div class="row">
            <div class="col-md-offset-2 col-md-5  col-md-push-2 "> 
            <div class="form-group">
             
            </div>
        </div>
        <div class="col-md-offset-2 col-md-3">
            <br/>
          
          </div>
        
    </div>
       
    <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-push-2"> 
            <div class="form-group">
             
                </div>
        </div>
      </div>
      
      <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-push-2"> 
            <div class="form-group">
             
                </div>
        </div>
      </div>
      
            <div class="row">
            <div class="col-md-offset-2 col-md-5  col-md-push-2 "> 
            <div class="form-group">
              
            </div>
        </div>
        <div class="col-md-offset-2 col-md-3">
            <br/>
           

          </div>
        
    </div>
   
    <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-push-2"> 
            <div class="form-group">
             
        </div>
      </div>
        </div>
         
</div>
</div>
<br/><br/><br/><br/><br/><br/>

      

      
      <div class="row">
        <br/>
        <div class="col-md-offset-0 col-md-2">
        <a href="javascript:history.go(-1);">Annuler</a>
      </div>
    </div>

   
        
        
           
           
          
      </div>
    </div>
</div>
@include('Layout/partials/_footer')
</form>

@stop


