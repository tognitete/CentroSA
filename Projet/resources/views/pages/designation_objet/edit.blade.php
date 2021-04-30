
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>CENTRO S.A.</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{asset('css/commande.css')}}">
@include('flashy::message')


  <script type="text/javascript" src="{{asset('js/Larails.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/helpers.js')}}"></script>

 

</head>

<body>



<form action="{{route('DesignationObjet.update',$id)}}"  method="POST" id="form">
  {{csrf_field()}}

  {{method_field('PUT')}}
@include('Layout.partials._nav')

@if(session()->has('message'))
<center>

<div class="alert alert-danger" style="width:250px">
  {{session()->get('message')}}
</div>
</center>>
@endif

<div class="eng_obj">
<div class="container">
    <div class="well">


<img src="../images/logo.png" style="width:100px;margin-left:-20px" alt="logo de CENTRO" class="img-rounded">


        <div class="row">
        <div class="col-md-offset-1 col-md-10 text-center">
        <h1 class="title">MODIFICATION DE L'ARTICLE <span class="orange">{{$desi}}</span></h1>

    </div>
    
        </div>

        
     <br/><br/>
              
        <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="designation_objet">Deignation</label>
              
              <input type="text" name="designation_objet" id="designation_objet" class="form-control" value="{{old('designation_objet')? old('designation_objet'):$desi}}" placeholder="Designation">
              <p>{!!$errors->first('designation_objet','<span class="help-block err">:message</span>')!!}</p>
            </div>
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

                    <option {{selection_ute($utes->DESIGNATION_UTE,$lib_ute)}}>{{$utes->DESIGNATION_UTE}}</option>
                @endforeach
                @else
               
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
        <br/>
        <div class="col-md-offset-5 col-md-2">
        <div class="form-group">
           <input type="submit" name="obj_eng" class="btn btn-success "  value="MODIFIER &raquo">

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


@include('Layout/partials/_footer')
</form>
</body>
</html>  