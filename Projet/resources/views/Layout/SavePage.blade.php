<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>CENTRO S.A</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/css/commande.css">
@include('flashy::message')


  <script type="text/javascript" src="/js/Larails.js"></script>


  
 
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
          document.getElementById('objet').selectedIndex=1;
          document.getElementById('designation_objet').value="#";
          document.getElementById('designation_ute').selectedIndex=1;
          $("#form").submit();
        },
        "OUI ": function() {
          $( this ).dialog( "close" );
          document.getElementById('rep').value="oui";
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
  @yield('container')

</body>
</html>  