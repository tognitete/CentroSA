<?php
use App\Bon_Commande\Designation;

if(isset($_GET['rech']) AND !empty($_GET['rech'])){
	$motclef=$_GET['rech'];
  
      $motclef='%'.$motclef.'%';
     
      
  $d=Designation::Where('NOM_DESIGNATION_OBJET','like',$motclef)->get();
}else{
	$d=Designation::all();
}

?>


<html>
<head>
	<title>Recherche</title>
</head>
<body>
	<form method="GET">
		<input type="search" name="rech" id="recherche">
		<input type="submit" value="Valider">
@foreach($d as $desi)
<li>{{$desi->NOM_DESIGNATION_OBJET}}</li>
@endforeach
</form>
</body>
</html>