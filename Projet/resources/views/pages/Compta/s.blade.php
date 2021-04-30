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
        <h1 class="title text-center">AFFICHAGE DES INFORMATIONS DU BON DE COMMANDE N&deg{{$num}}</h1>

    </div>
     
        </div>
    <br/><br/><br/>
   

      <div class="row">
          <div class=" col-md-offset-1 col-md-7" style="">
            
         <div style="border: 2px solid #1c75c8; padding: 3px; background-color: #c5ddf6; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;">
<span class="title">BC N&deg</span><span class="orange">{{$num}}</span><br/><br/>
<span class="title">Materiaux Commande:</span>
<span class="orange">{{$desi[0]}}</span>
@for($i=1;$i<count($desi);$i++)
;<span class="orange">{{$desi[$i]}}</span>
@endfor
<br/><br/>
<span class="title">Montant Total:</span><span class="orange">{{FactMoney($info->MONTANT_TOTAL)}}</span><br/><br/>
<span class="title">Avance:</span> <span class="orange">{{$info->TAUX_AVANCE}}%</span> soit <input type="text" disabled="disabled" value=""><br/><br/>
<span class="title">delai:</span><span class="orange">{{$info->DELAIS}}</span>jours<br/><br/>
<span class="title">observations:</span>
</div>

        </div>
           
          <div class="col-md-1">
                         
              <div class="row">
            <div class=" col-md-8"> 
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="avec" value="FACTURE AVEC AVANCE" style="height:70px">
            </div>
           
            </div>
          </div>
           
        <div class="row">
            <div class="col-md-8  "> 
            <div class="form-group">
             <input type="submit" class="btn btn-success" name="avec" value="FACTURE SANS AVANCE" style="height:70px">
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
<br/><br/><br/>

      

      
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


