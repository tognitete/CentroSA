
@extends('Layout.default')

@section('content')

<form action="" method="POST">
  {{csrf_field()}}
  @include('Layout.partials._nav')
<div class="eng_obj">
<div class="container">
    <div class="well">


   <img src="{{asset('images/logo.png')}}" style="width:100px;margin-left:-20px" alt="logo de CENTRO" class="img-rounded">

        <div class="row">
        <div class="">
        <h1 class="title text-center">FACTURE SOLDE</h1>

    </div>
     
        </div>
        @if($now)
        <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="num_facture">Numero Fecture</label>
              <input type="hidden" name="url" value="">
              <input type="text" name="num_facture" id="num_facture" class="form-control" value="{{old('num_facture')}}" placeholder="Numero de la Facture">
              <p>{!!$errors->first('num_facture','<span class="help-block err">:message</span>')!!}</p>
            </div>
        </div>
    </div>

     <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="objet">Objet</label>
              <input type="hidden" name="url" value="">
              <input type="text" name="objet" id="objet" class="form-control" readonly value="{{$objet}}" placeholder="objet">
              <p>{!!$errors->first('objet','<span class="help-block err">:message</span>')!!}</p>
            </div>
        </div>
    </div>

     <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="date_facture">Date Facture</label>
              <input type="hidden" name="url" value="">
              <input type="date" name="date_facture" id="date_facture" class="form-control" value="{{old('date_facture')}}" placeholder="">
              <p>{!!$errors->first('date_facture','<span class="help-block err">:message</span>')!!}</p>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="date_reception">Date Reception Facture</label>
              <input type="date" name="date_reception" id="date_reception" value="{{old('date_reception')}}" class="form-control" placeholder="">
              <p>{!!$errors->first('date_reception','<span class="help-block err">:message</span>')!!}</p> 
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
       @else
       <br/><br/>
      <p><img src="{{asset('images/danger.gif')}}" style="width:55px;margin-left:100px"><span style="font-size:23px" class="orange text-center">Cette Facture ne peut être emise car la livraison date de moins de {{$delais}} jours</span><img src="{{asset('images/danger.gif')}}" style="width:55px"></p>
     <br/><br/>
     <p><span style="font-size:25px" class="orange title">DATE FACTURE:</span><span style="font-size:25px">{{$j}}/{{$m}}/{{$y}}</span></p>
   <div class="row">
        <br/>
        <div class="col-md-offset-5 col-md-2">
        <div class="form-group">
           <a   href="{{route('compta')}}" name="obj_eng" class="btn btn-success "  style="height:50px;width:100px;">OK</a>
           </div>
          </div>
      </div>
      @endif
      <input type="hidden" name="avance" value="{{$avance}}">
      <input type="hidden" name="num" value="{{$num}}">
      <input type="hidden" name="montant" value="{{$montant}}">
      <input type="hidden" name="date" value="{{$date}}">
      <input type="hidden" name="id" value="{{$id}}">
      
      <div class="row">
        <br/>
        <div class="col-md-offset-0 col-md-2">
        <a href="javascript:history.go(-1);">Annuler</a>
      </div>
    </div>
    </div>
</div>
@include('Layout/partials/_footer')
</form>
@stop