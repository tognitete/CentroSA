
@extends('Layout.default')

@section('content')

<form action="{{route('objet.store')}}" method="POST" >
  {{csrf_field()}}
<div class="eng_obj">
<div class="container">
    <div class="well">


@include('Layout.partials._nbEnregistrement')


        <div class="row">
        <div class="col-md-offset-3 col-md-10">
        <h1 class="title">ENREGISTRMENT D'UNE CATEGORIE D'ENGIN</h1>

    </div>
     
        </div>

        

    <div class="row">
            <div class="col-md-offset-2 col-md-6"> 
            <div class="form-group">
              <label for="ute">UTE</label>
              <select id="designation_ute" name="designation_ute" class="form-control">
                <option></option>
                @if(!$ute->isEmpty())
                @foreach($ute as $utes)
                    <option {{selection_ute($utes->DESIGNATION_UTE,old('designation_ute'))}}>{{$utes->DESIGNATION_UTE}}</option>
                @endforeach
                @else
               <option>UTE</option>
                @endif
              </select>
              <p>{!!$errors->first('designation_ute','<span class="help-block err">:message</span>')!!}</p>
                </div>
        </div>
        <div class=" col-md-2">
            <br/>
           <a href="{{route('ute.create')}}"  style="height:40px"class="btn btn-primary form-control">Nouvelle UTE?</a>

          </div>
      </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="designation_objet">Deignation</label>
              <input type="text" name="designation_objet" id="designation_objet" class="form-control" value="{{old('designation_objet')? old('designation_objet'):''}}" placeholder="Nom de l'objet">
              <p>{!!$errors->first('designation_objet','<span class="help-block err">:message</span>')!!}</p>
            </div>
        </div>
    </div>
      <div class="row">
        <br/>
        <div class="col-md-offset-5 col-md-2">
        <div class="form-group">
           <input type="submit" name="obj_eng" class="btn btn-success " value="ENREGISTRER &raquo">
           </div>
          </div>
      </div>
      <div class="row">
        <br/>
        <div class="col-md-offset-0 col-md-2">
        <a href="#">Annuler</a>
      </div>
    </div>
</div>
@include('Layout/partials/_footer')
</form>
@stop