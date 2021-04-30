@extends('Layout.default')

@section('content')


  @include('Layout.partials._nav')
 
<form action="{{route('Rapport.store')}}" method="POST">
  {{csrf_field()}}

<div class="eng_obj">
<div class="container">
    <div class="well">


      
      
        <div class="row">
        <div class=" col-md-12">
        <h1 class="title text-center">COMMANDE DEJA REGLE POUR LE FOURNISSEUR <span class="orange">{{$frs}}</span></h1>

    </div>
     
        </div>
    <br/><br/><br/>
   
 
      <div class="row">
        @if(count($num)!=0)
        @for($i=0;$i<count($num);$i++)
        
          <div class="  col-md-4" style="height:200px">
           
        @if((($i+1)%2)==0)    
         <div style="border: 2px solid #1c75c8;height:220px;padding: 3px; background-color:rgb(196,196,196); -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;" id="banniere" onmouseover="dwn({{$i+1}})" onmouseout="outdwn({{$i+1}})">
        
        @else
        <div style="border: 2px solid #1c75c8;height:220px;padding: 3px; background-color:rgb(241,221,152); -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;" id="banniere" onmouseover="dwn({{$i+1}})" onmouseout="outdwn({{$i+1}})">
        @endif
<span class="title">BC N&deg</span><span class="orange">{{$num[$i]}}</span><br/><br/>
<input type="hidden" name="num" value="{{$num[$i]}}">
<span class="title">Materiaux Commande:</span><span class="orange">{{$desi[$i]}}</span><br/><br/>
<input type="hidden" name="desi" value="{{$desi[$i]}}">
<span class="title">Montant Total:</span><span class="orange">{{FactMoney($montant[$i])}}</span><br/><br/>
<input type="hidden" name="montant" value="{{$montant[$i]}}">
<span class="title">Avance:</span> <span class="orange">{{$taux[$i]}}%</span> soit <input type="text" disabled="disabled" value="{{$cal[$i]}}"><br/><br/>
<input type="hidden" name="avance" value="{{$taux[$i]}}">
<input type="hidden" name="delais" value="{{$delais[$i]}}">
<input type="hidden" name="cal" value="{{$cal[$i]}}">
<input type="hidden" name="statut" value="payer">
@if($observation[$i]!=null)
<span class="title">observations:</span><span class="orange">{!!$observation[$i]!!}</span>
<input type="hidden" name="observation" value="{{$observation[$i]}}">
 @endif
 <div id="{{$i+1}}" class="description">
          Telechargement...
          <input type="submit" class="btn btn-primary dwn" value="Telecharger">
</div>
</div>


        </div>
         @if(($i+1)%3==0)
     
         </div>
         <div class="row">   
      <br/><br/>
   


      @endif
     
 @endfor      

         
    @else

    <h3>Acune commande</h3>

    @endif
        


          
         
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


