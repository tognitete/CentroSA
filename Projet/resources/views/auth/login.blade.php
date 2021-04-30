<!DOCTYPE html>
<html>
<head>
  <title>CENTRO S.A</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
<meta name="csrf-token" content="{{csrf_token()}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="{{asset('css/commande.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">


</head>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Material Design Login Form -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-5715866801509976"
     data-ad-slot="3213535644"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


<body class="b{{date('N')}}">



<hgroup>
  <h1 class="g2">CONNEXION</h1>
 
</hgroup>
<form action="{{route('login')}}" method="POST">
  {{csrf_field()}}
  <div class="group">
    <input type="text" name="name"><span class="highlight"></span><span class="bar"></span>
    <label>Utilisateur</label>
  </div>
  <div class="group">
    <input type="password" name="password"><span class="highlight"></span><span class="bar"></span>
    <label>Mot de Passe</label>
  </div>
  <button type="submit" class="button buttonBlue">Suivant
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
  </button>

</form>

<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
      

<script src="//code.jquery.com/jquery.js"></script>

@include('flashy::message')

<script src="//code.jquery.com/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('js/commande.js')}}"></script>
<script type="text/javascript" src="{{asset('js/login.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Larails.js')}}"></script>

</body>
</html>

