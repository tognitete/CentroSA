
@extends('Layout.default')

@section('content')

<form action="{{route('fournisseur.store')}}" method="POST">
  {{csrf_field()}}
  @include('Layout.partials._nav')
<div class="eng_obj">
<div class="container">
    <div class="well">


   <img src="/images/logo.png" style="width:100px;margin-left:-20px" alt="logo de CENTRO" class="img-rounded">

        <div class="row">
        <div class="col-md-offset-2 col-md-10">
        <h1 class="title">ENREGISTRMENT D'UN FOURNISSEUR</h1>

    </div>
     
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="nom_fournisseur">Nom</label>
              <input type="hidden" name="url" value="{{$url}}">
              <input type="text" name="nom_fournisseur" id="nom_fournisseur" class="form-control" placeholder="Nom du fournisseur">
              <p>{!!$errors->first('nom_fournisseur','<span class="help-block err">:message</span>')!!}</p>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="tel_fournisseur">TEL</label>
              <input type="text" name="tel_fournisseur" id="tel_fournisseur" class="form-control" placeholder="Numero de telephone du fournisseur">
              <p>{!!$errors->first('tel_fournisseur','<span class="help-block err">:message</span>')!!}</p> 
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
</div>
@include('Layout/partials/_footer')
</form>
@stop