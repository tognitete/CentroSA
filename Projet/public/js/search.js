$(document).ready(function(){
 $("#recherche").keyup(function(){
 	var recherche = $(this).val();
 	var data = 'motclef='+ recherche;
 	if(recherche.length>3){
        
 		$.ajax({
 			type: "GET",
 			url:"/",
 			data : data,
 			success:function(server_response){

        $("#resultat").html(server_response).show();
 		}
 		});

 		
 	}

 });
});