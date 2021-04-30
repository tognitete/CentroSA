<!DOCTYPE html>
<html>
<head>
	<title>CENTRO S.A.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<meta name="csrf-token" content="{{csrf_token()}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="{{asset('css/commande.css')}}">


</head>
<body class="body">

@yield('content')

 <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
      

<script src="//code.jquery.com/jquery.js"></script>

@include('flashy::message')

<script src="//code.jquery.com/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('js/helpers.js')}}"></script>

<script type="text/javascript" src="{{asset('js/commande.js')}}"></script>



<script type="text/javascript" src="{{asset('js/Larails.js')}}"></script>

</body>
</html>