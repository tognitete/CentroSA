<?php
use App\Bon_Commande\Fournisseur;

if(isset($_GET['rech']) AND !empty($_GET['rech'])){
	$motclef=$_GET['rech'];
  
      $motclef='%'.$motclef.'%';

      $frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS')
                          ->Where('bon_de_commandes.TOTAL_FAIT',0)
                          ->Where('NOM_FRS','like',$motclef)
                          ->join('bon_de_commandes','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                          ->distinct()
                          ->get();
    
    //$frs=Fournisseur::Where('NOM_FRS','like',$motclef)->get();
      
  
}else{
	$frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS')
                          ->Where('bon_de_commandes.TOTAL_FAIT',0)
                          ->join('bon_de_commandes','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                          ->distinct()
                          ->get();
}

?>


@extends('Layout.default')

@section('content')


 
 
<form action="" method="GET">
  @include('Layout.partials._nav')
  {{csrf_field()}}

<div class="eng_obj">
<div class="container" style="width:1000px">
    <div class="well">


      
      
        <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <h1 class="title text-center">FOURNISSEURS</h1>

    </div>
     
        </div>
    <br/><br/><br/>
    <div class=" col-md-offset-7 col-md-2" > <input type="search" style="height:35px" name="rech"></div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="submit"class="btn btn-primary " style="height:35px" value="FILTRER" >
    <button class="btn btn-primary" type="submit" style="height:35px" ><img src="{{asset('images/r.png')}}" style="width:30px"></button>

        <div class="row">
            <div class="col-md-offset-1 col-md-8"> 
            <div class="form-group">
        @if(!$frs->isEmpty())     
             
        <table class="table table-bordered" style="width:800px;color:black" >
                 
       <tr>
       
       
       <th class="blue text-center">FOURNISSEURS</th>
       <th style="width:50px"></th>
       
   </tr>
    
       @foreach($frs as $f)
   <tr>
       
       
       <td class="text-center">{{$f->NOM_FRS}}</td>
       <td><a href="{{route('Compta.show',$f->NOM_FRS)}}"><img src="{{asset('images/d.png')}}" style="width:50px"></a></td>
       @endforeach
   </tr>

  
      </table>
      @else
      <br/>
      <p>Aucun Resultat</p>
         @endif      
              
            </div>
        </div>
        
       <br/>
        
          
        

      </div>
       <br/><br/>
      

      
      <div class="row">
        <br/>
        <div class="col-md-offset-0 col-md-2">
        <a href="javascript:history.go(-1);">Annuler</a>
      </div>
    </div>

   
        
        
           
           
          
      </div>
    </div>
</div>
@include('Layout/partials/_footer')
</form>

@stop