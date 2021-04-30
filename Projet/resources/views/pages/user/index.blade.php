
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
        <h1 class="title text-center">GESTION D'UTILISATEUR</h1>

    </div>
     
        </div>
    <br/><br/><br/>
    

      <div class="row">
            <div class="col-md-offset-1 col-md-2" > 
            <div class="form-group">
            <a href="{{route('user.update')}}" class="btn btn-primary" style="height:100px;width:250px;"><h3 style="height:100px;">MODIFICATION</h3></a>  
           </div>   
        </div>
        
        <div class="col-md-offset-1 col-md-2">
            
           <a href="{{route('user.destroy')}}" class="btn btn-primary" style="height:100px;width:250px;"><h3 style="height:100px;">SUPPRESSION</h3></a>  

          </div>
     
      
        <div class="col-md-offset-1 col-md-2">
            
           <a href="{{route('user.droit')}}" class="btn btn-primary" style="height:100px;width:320px;"><h3 style="height:100px;">ATTRIBUTION DE DROITS</h3></a>  

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