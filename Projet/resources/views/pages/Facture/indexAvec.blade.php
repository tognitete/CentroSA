
@extends('Layout.default')

@section('content')


  @include('Layout.partials._nav')
 
<form action="" method="GET">
  {{csrf_field()}}

<div class="eng_obj">
<div class="container" style="width:1000px">
    <div class="well">


      
      
        <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <h1 class="title text-center">CHOIX FACTURE</h1>

    </div>
     
        </div>
    <br/><br/><br/>
    

      <div class="row">
            <div class="col-md-offset-1 col-md-1" > 
            <div class="form-group">
              
            <a href="{{route('SFAVANCE',['date'=>$date,'num'=>$num,'montant'=>$montant,'avance'=>$avance,'id'=>$id,'objet'=>$objet])}}" class="btn btn-primary" style="height:100px;width:400px;"><h1 style="height:100px;">FACTURE AVANCE</h1></a>  
           </div>   
        </div>
        <div class="form-group">
        <div class="col-md-offset-4 col-md-2">
            
           <a href="{{route('SFSOLDE',['date'=>$date,'num'=>$num,'montant'=>$montant,'delais'=>$delais,'avance'=>$avance,'id'=>$id,'objet'=>$objet])}}" class="btn btn-primary" style="height:100px;width:400px;"><h1 style="height:100px;">FACTURE DE SOLDE</h1></a>  

          </div>
      </div>
    </div>
       <br/><br/>
      

      
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