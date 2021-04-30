<?php

use App\Bon_Commande\Fournisseur;

if(isset($_GET['motclef'])){
	$motclef=$_GET['motclef'];
	
      $motclef='%'.$motclef.'%';
      
	$rech=Fournisseur::Where('NOM_FRS','like',$motclef)->get();

//$rech=$rech->toArray();
//($rech);
	echo "string";
}else{
	$rech=Fournisseur::all();
	//dump($rech);
}

?>



<html>
<head>
	<title>Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="/css/commande.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
 
 $("#recherche").keyup(function(){
 	
 	var recherche = $(this).val();
 	var data = 'motclef='+ recherche;
 	if(recherche.length>0){
        
 		$.ajax({
 			type: "GET",
 			url:"",
 			data : data,
 			success:function(server_response){

        $("#resultat").html(server_response).show();
 		}
 		});

 		
 	}

 });
});
</script>
</head>
<body>
	<div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-push-2"> 
            <div class="form-group">
            	<div class="search">
	<input type="text" name="recherche" class="text" id="recherche">
</div>
            	</div>
</div>



<div class="" id="resultat"></div>

</body>
</html>