@extends('Layout.default')

@section('content')

<form action="" method="POST">
  {{csrf_field()}}
@include('Layout.partials._nav')
<div class="eng_obj">
<div class="container">
    <div class="well">


      
      
        <div class="row">
        <div class="col-md-offset-4 col-md-4">
        <h1 class="title text-center">DESTINATION</h1>

    </div>
     
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="objet">Nombre de destination</label>
             
             
           <input type="text" name="nb_d" id="nb_d" class="form-control" placeholder="Nombre de destination">   
              
            </div>
        </div>
        
       <br/>
        <div class="col-md-2">
        <div class="form-group">
           <input type="submit" style="height:42px;" name="lieu_eng" class="btn btn-success " value="SUIVANT &raquo">
          
           </div>
          </div>
          
        <div class="row">
            <div class="col-md-offset-2 col-md-6"> 
            <div class="form-group">
              <p>{!!$errors->first('nb_d','<span class="help-block err">:message</span>')!!}</p>
            </div>
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
@if(isset($user))
<input type="hidden" value="{{$user}}">
@endif
@include('Layout/partials/_footer')
</form>

@stop