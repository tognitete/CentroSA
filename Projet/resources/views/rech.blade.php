<?php

use App\Bon_Commande\Fournisseur;

csrf_field();

if(isset($_GET['query'])){
  $motclef=$_GET['query'];
  
      $motclef='%'.$motclef.'%';
      
  $rech=Fournisseur::Where('NOM_FRS','like',$motclef)->get();
dump($rech);


}else{
  $rech=Fournisseur::all();
  
}

?>

<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
  <form action="" method="">
  <input name="_token" hidden value="7WenswFlpBFrtqW2yzzgBYxfBd2NTSa9VDnDkyLr" />
  <div class="container">
   <br />
   <h2 align="center">Ajax Live Data Search using Jquery PHP MySql</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   @foreach($rech as $r)
   <p>{{$r->Nom_FRS}}</p>
   @endforeach
   <div id="result"></div>
  </div>

 </form> 
 </body>
</html>
<script type="text/javascript">
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"",
   method:"",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>


