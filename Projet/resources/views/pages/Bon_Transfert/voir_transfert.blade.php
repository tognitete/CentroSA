<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
	
	<!-- Latest compiled and minified CSS -->

  <link rel="stylesheet" href="D:/bootstrap-3.3.7-dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="D:/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body class="bCmde">

<form action="{{route('pdfTransfert.store')}}" method="POST">
   {{csrf_field()}}
<style type="text/css">
@include('pdf.bonCommande')

@include('pdf.bootstrap_theme')

@include('pdf.bootstrap')


</style>

  <div class="">
    <div class="row">
    	<div class="col-xs-2">
    		<br/><br/><br/>
    		<img src="{{asset('images/logo.png')}}" style="width:210px;margin-left:40px;" alt="logo de CENTRO" class="img-rounded">
    	</div>
    	<div class="col-xs-offset-0 col-xs-2" style="width:130px;margin-left:80px;">
    		<br/><br/><br/><br/><br/><br/><br/>
    		Connsortium
            Des Entreprises
            Tropicales    	
            </div>
            <div class="col-xs-2 col-xs-push-6" style="">
              NIF:1000116424<br/>                
              189,Rue Atoeta<br/>
              TOKOIN Doumasséssé<br/>
              B.P:20744 Lomé-TOGO<br/>
              Tél:(00228) 22 22 56 83<br/>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp93 19 75 16<br/>
              Fax:(00228)22 22 62 52<br/>
              E-mail:info@centro.tg<br/>
               &nbsp &nbsp &nbsp &nbsp &nbsp &nbspcentro_tg@yahoo.fr<br/>
              <span style="margin-right:40%;">http://www.centro.tg</span>                  
            </div>
    </div>
    <p style="margin-left:10px;">SOCIETE ANONYME - S.A. au capital social de 636 300 000</p>
    <br/>
    <div class="barre"></div>
    <br/><br/>
    <div class="row">
    	<h3 class="title text-center">BON DE TRANSFERT N&deg{{$num}}/PDG/DAA/CAA{{$tete}}/{{$y}}</h3>
    </div>
    <br/><br/>
    <div class="row">
    	<h3><span class="title" style="margin-left:11%;">OBJET</span> :{{$objet}}</h3>
      <input type="hidden" value="{{$objet}}" name="objet">
    </div>
    <div class="row">
    	<h3><span class="title" style="margin-left:11%;">PROVENANACE</span> :{{$provenance}}</h3>
      <input type="hidden" value="{{$provenance}}" name="provenance">
    </div>
    <div class="row">
    	<h3><span class="title" style="margin-left:11%;">DESTINATION</span> :{{$destination}}</h3>
      <input type="hidden" value="{{$destination}}" name="destination">
    </div>
    <br/><br/>
    <div class="row">
    	<div class="col-xs-offset-1 col-xs-10">
    	<table>
    		<tr>
    			<th class="text-center">DESIGNATION</th>
    			<th class="text-center">UTE</th>
    			<th class="text-center">QUANTITE</th>
    		</tr>
        @for($i=0;$i<count($designation);$i++)
    		<tr>
    			<td class="text-center">{{$designation[$i]}}</td>
          <input type="hidden" value="{{$designation[$i]}}" name="{{delSpace_Echo($designation[$i])}}">
          <td class="text-center">{{$ute[$i]}}</td>
          <input type="hidden" value="{{$ute[$i]}}" name="{{delSpace_Echo($designation[$i])}}ute">
          <td class="text-center">{{$qte[$i]}}</td>
          <input type="hidden" value="{{$qte[$i]}}" name="{{delSpace_Echo($designation[$i])}}qte">
    		</tr>
        @endfor
    	</table>
    </div>

</div>
<br/>
<div class="row">
<div class="col-xs-offset-1 col-xs-6">
@if($commentaire==null || $commentaire=="")
<br/><br/><br/><br/>
@else
{!!$commentaire!!}
@endif
<input type="hidden" value="{{$commentaire}}" name="commentaire">  
</div>
</div>
<div class="row">
	<div class="col-xs-3 col-xs-push-7">
		{{$lieu}}, {{$j}} {{$m}} {{$y}}<br/>
    <input type="hidden" value="{{$lieu}}" name="lieu">
    <input type="hidden" value="{{$tete}}" name="tete">
    <input type="hidden" value="{{$j}}" name="j">
    <input type="hidden" value="{{$m}}" name="m">
    <input type="hidden" value="{{$y}}" name="y">
		Le Président Directeur Général,<br/>
		<br/><br/><br/><br/>
		<h4 class="title">Kpatcha BASSAYI</h4>
	</div>
	</div>
	<br/><br/><br/><br/><br/><br/><br/><br/>
	
  
  
</div>
<div>
<div class="col-md-offset-2 col-md-2">
        <div class="form-group">

           
           <a href="{{route('BonTransfert.create',['user'=>$user])}}" class="btn btn-default" style="height:50px;width:100px">REFAIRE</a>
           </div>
          </div>
<div class="col-md-offset-1 col-md-2">
        <div class="form-group">

           <input type="submit" name="telecharger" class="btn btn-default "  style="height:50px" value="TELECHARGER">
           </div>
          </div>
          <div class="col-md-offset-1 col-md-2">
        <div class="form-group">

           
           <a href="{{route('home')}}" class="btn btn-default" style="height:50px;width:100px">QUITTER</a>
           </div>
          </div>
        </div>
<script src="//code.jquery.com/jquery.js"></script>

<input type="hidden" value="{{$num}}" name="num">
<input type="hidden" id="user" name="user" value="{{$user}}">
@include('flashy::message')



</form>
</body>
</html>