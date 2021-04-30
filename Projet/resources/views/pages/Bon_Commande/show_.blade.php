@extends('Layout.default')
{{$info->DELAIS}}
@section('content')


  @include('Layout.partials._nav')
 
<form action="" method="GET">
  {{csrf_field()}}

<div class="eng_obj">
<div class="container">
    <div class="well">


      
      
        <div class="row">
        <div class=" col-md-12">
        <h1 class="title text-center">AFFICHAGE DES INFORMATIONS DU BON DE COMMANDE <span class="orange">N&deg{{$num}}</span></h1>

    </div>
     
        </div>
    <br/><br/><br/>
   
 
      <div class="row">
          <div class=" col-md-offset-1 col-md-7" style="">
            
         <div style="border: 2px solid #1c75c8; padding: 3px; background-color: #c5ddf6; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;">
<span class="title">BC N&deg</span><span class="orange"> {{$num}}</span><br/><br/>
<span class="title">Materiaux Commande:</span>
<span class="orange">{{$desi[0]}}</span>
@for($i=1;$i<count($desi);$i++)
;<span class="orange">{{$desi[$i]}}</span>
@endfor
<br/><br/>
<span class="title">Délais:</span><span class="orange"> {{$info->DELAIS}} jours</span><br/><br/>
<span class="title">Date Paiement:</span><span class="orange"> {{dateFacture($info->DATE_COMMANDE,$info->DELAIS)}}</span><br/><br/>
<span class="title">Montant Total:</span><span class="orange"> {{FactMoney($info->MONTANT_TOTAL)}}</span><br/><br/>
<span class="title">Avance:</span> <span class="orange"> {{$info->TAUX_AVANCE}}%</span> soit <input type="text" disabled="disabled" value="{{$cal}}"><br/><br/>
<span class="title">Solde:</span> <span class="orange"> {{FactMoney($info->MONTANT_TOTAL-$cal)}}<br/><br/>
@if($info->COMMENTAIRE!=null)
<span class="title">observations:</span><span class="orange">{!!$info->COMMENTAIRE!!}</span>
@endif
</div>

        </div>
           
          <div class="col-md-1">
                         
              <div class="row">
            <div class=" col-md-8"> 
            <div class="form-group">
              @if(($info->TAUX_AVANCE)!=0)
             <a href="{{route('FACTURE_AVANCE',['date'=>$info->DATE_COMMANDE,'num'=>$num,'montant'=>$info->MONTANT_TOTAL,'avance'=>$cal,'delais'=>$info->DELAIS,'objet'=>$info->OBJET,'id'=>1])}}"  class="btn btn-success"  id="avec" name="avec" style="height:70px"><h4>FACTURE AVEC AVANCE</h4></a>
              @endif
            </div>
           
            </div>
          </div>
           
        <div class="row">
            <div class="col-md-8  "> 
            <div class="form-group">
              @if(($info->TAUX_AVANCE==0))
             <a href="{{route('FACTURE_SANS_AVANCE',['date'=>$info->DATE_COMMANDE,'num'=>$num,'montant'=>$info->MONTANT_TOTAL,'avance'=>$cal,'delais'=>$info->DELAIS,'objet'=>$info->OBJET,'id'=>2])}}"   class="btn btn-success" id="sans" name="sans" style="height:70px"><h4>FACTURE SANS AVANCE</h4></a>
              @endif
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


