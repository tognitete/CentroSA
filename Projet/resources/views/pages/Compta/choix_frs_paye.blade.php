@extends('Layout.default')

@section('content')

<form action="{{route('paye.post')}}" method="POST">
  {{csrf_field()}}
@include('Layout.partials._nav')
<div class="eng_obj">
<div class="container">
    <div class="well">


      
      
        <div class="row">
        <div class="col-md-offset-4 col-md-4">
        <h1 class="title text-center">RAPPORT</h1>

    </div>
     
        </div>

       <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="frs">Fournisseur</label>
             <br/>
             <select id="frs" name="frs" class="form-control">
                <option></option>
                @if(!$frs->isEmpty())
                @foreach($frs as $f)
                    <option>{{$f->NOM_FRS}}</option>
                @endforeach
                @else
               <option></option>v>
           </div>
                @endif
              </select>
            
        <p>{!!$errors->first('frs','<span class="help-block err">:message</span>')!!}</p>
            
        
              
            </div>
          </div>
        </div>
        
        <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="objet">OBJET</label>
             <br/>
             <select id="objet" name="objet" class="form-control">
                <option></option>
                @if(!$bon->isEmpty())
                @foreach($bon as $b)
                    <option>{{$b->OBJET}}</option>
                @endforeach
                @else
               <option></option>
           </div>
                @endif
              </select>
            
        
            
        
              
            </div>
          </div>
        </div>
        <br/>
        <div class="col-md-offset-5 col-md-2">
        <div class="form-group">
           <input type="submit" style="height:42px;" name="obj_eng" class="btn btn-success " value="SUIVANT&raquo">
          
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