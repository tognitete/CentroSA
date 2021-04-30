$(document).ready(function(){
 $("#recherche").keyup(function(){
 	var recherche = $(this).val();
 	var data = 'motclef='+ recherche;
 	if(recherche.length>3){

 		$.ajax({
 			type: "GET",
 			url:"C:/Users/TTFiacre/Desktop/Stage/resources/views/search.blade.php",
 			data : data,
 			success:function(server_response){

        $("#resultat").html(server_response).show();
 		}
 		});

 		
 	}

 });
});