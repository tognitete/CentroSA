
@extends('Layout.default')

@section('content')


  @include('Layout.partials._nav')
 
<form action="" method="POST">
  {{csrf_field()}}

<div class="eng_obj">
<div class="container" style="width:1000px">
    <div class="well">


      
      
        <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <h1 class="title text-center">FACTURE</h1>

    </div>
     
        </div>

     <br/><br/>
     
     <div class="row">
          <div class=" col-md-offset-2 col-md-6" style="width:700px">
        <div style="border: 2px solid #1c75c8; padding: 3px; background-color: #c5ddf6; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;">
        <p><h4><span class="title">FACTURE N&deg:</span><span class="orange">{{$num}}</h4></span><p><br/><br/>
        <p><h4><span class="title">FOURNISSEUR:</span><span class="orange">{{$nom}}</h4></span><p><br/><br/>
        <p><h4><span class="title">Objet:</span><span class="orange">{{$objet}}</h4></span><p><br/><br/>
        <p><h4><span class="title">MONTANT AVANCE:</span ><span class="orange">{{FactMoney($avance)}}</h4></span></p><br/><br/> 
        <p><h4><span class="title">DATE FACTURATION:</span ><span class="orange">{{$j}}/{{$m}}/{{$y}}</h4></span></p><br/><br/> 
        </div>
      </div>
    <br/><br/><br/>
    
     </div>
 

     
       <br/><br/>
      
<div class="row">
  <div class="col-md-offset-5 col-md-2">
        <br/><a   href="{{route('compta')}}" name="obj_eng" class="btn btn-success "  style="height:50px;width:100px;">OK</a>
        <div class="col-md-offset-5 col-md-2">
        <div class="form-group">
           
           </div>
          </div>
      </div>
    </div>
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