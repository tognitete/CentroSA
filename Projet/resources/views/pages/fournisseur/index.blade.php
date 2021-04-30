<?php
use App\Bon_Commande\Fournisseur;

if(isset($_GET['rech']) AND !empty($_GET['rech'])){
  
	$motclef=$_GET['rech'];
  
      $motclef='%'.$motclef.'%';

      $frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS,fournisseurs.MATRICULE_FRS')
                      ->Where('NOM_FRS','like',$motclef)
                      ->Where('estSupprimer',0)
                      ->distinct()
                      ->get();
    
    //$frs=Fournisseur::Where('NOM_FRS','like',$motclef)->get();
      
  
}else{
	$frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS,fournisseurs.MATRICULE_FRS')
                  ->Where('estSupprimer',0)
                  ->distinct()
                  ->get();
}

if(isset($_GET['init'])){

$frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS,fournisseurs.MATRICULE_FRS')
                  ->Where('estSupprimer',0)
                  ->distinct()
                  ->get();

}
?>


@extends('Layout.default')

@section('content')


  @include('Layout.partials._nav')
 
<form action="" method="GET">
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
    <input type="submit"class="btn btn-primary " style="height:35px" value="FILTRER" name="filtrer" >
    <button class="btn btn-primary" type="submit" style="height:35px" name="init" ><img src="{{asset('images/r.png')}}" style="width:30px"></button>

        <div class="row">
            <div class="col-md-offset-1 col-md-8"> 
            <div class="form-group">
        @if(!$frs->isEmpty())     
             
        <table class="table table-condensed" style="width:800px;color:black" >
                 
       <tr>
       
       
       <th class="blue "><h4>FOURNISSEURS</h4></th>
       <th class="blue "><h4>Modification</h4></th>
       <th class="blue"><h4>Suppression</h4></th>
       
       
   </tr>
    
       @foreach($frs as $f)
   <tr>
       
       
       <td><h4>{{$f->NOM_FRS}}</h4></td>
       @if(AuthorizedRole(Auth::user()->name,2))  
       <td><a href="{{route('fournisseur.edit',$f->MATRICULE_FRS)}}" class="btn btn-primary" style="width:150px;"><h4>Modifier</h4></a></td>
       @else
       <td><a href="{{route('fournisseur.edit',$f->MATRICULE_FRS)}}" class="btn btn-primary" disabled onclick="event.preventDefault()" style="width:150px;"><h4>Modifier</h4></a></td>
       @endif
       @if(AuthorizedRole(Auth::user()->name,2))  
       <td><a href="/fournisseur_destroy?id={{$f->MATRICULE_FRS}}" onclick="sup()" class="btn btn-danger" style="width:150px;"><h4>Supprimer</h4></a></td>
       @else
       <td><a href="/fournisseur_destroy?id={{$f->MATRICULE_FRS}}" disabled onclick="event.preventDefault()" class="btn btn-danger" style="width:150px;"><h4>Supprimer</h4></a></td>
       @endif
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