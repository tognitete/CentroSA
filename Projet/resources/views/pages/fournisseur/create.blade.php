
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


  
 
@if($nb>0)
  <script>

  $( function() {
     
   
      

       $("#dialog-confirm" ).dialog({

      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
       "NON": function() {
          $( this ).dialog( "close" );
          document.getElementById('rep').value="non";
          document.getElementById('nom_fournisseur').value="#";
          document.getElementById('tel_fournisseur').value="#";
          $("#form").submit();
        },
        "OUI ": function() {
          $( this ).dialog( "close" );
          document.getElementById('rep').value="oui";
          document.getElementById('nom_fournisseur').value="#";
          document.getElementById('tel_fournisseur').value="#";
          $("#form").submit();
        }
      }
    });

  });
 
  </script>
</head>
<body>
   <div id="dialog-confirm" title="ENREGISTREMENT">
  <P class="g">VOTRE ENREGISTREMENT A ETE EFFECTUE</p>
  <p style="color:black"><span class="ui-icon ui-icon-alert yellow" style="float:left; margin:12px 12px 20px 0;"></span><span>VOULEZ-VOUS EFFECTUER UN AUTRE ENREGISTREMENT?</span></p>
</div>

@else
</head>
<body>
@endif

<form action="{{route('fournisseur.store')}}" method="POST" id="form">
  {{csrf_field()}}
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


   <img src="{{asset('images/logo.png')}}" style="width:100px;margin-left:-20px" alt="logo de CENTRO" class="img-rounded">

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
              <input type="text" name="tel_fournisseur" id="tel_fournisseur" onkeypress="return valid_number(event)" class="form-control" placeholder="Numero de telephone du fournisseur">
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
        <a href="javascript:history.go(-1);">Annuler</a>
      </div>
    </div>
    </div>
</div>
 <input type="hidden" id="rep" name="rep" value="defaut">
<input type="hidden" name="nb" value="{{$nb}}">
@include('Layout/partials/_footer')
</form>
</body>
</html>