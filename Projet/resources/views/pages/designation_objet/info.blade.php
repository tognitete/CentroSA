<?php
use App\Bon_Commande\Fournisseur;
use App\Bon_Commande\Designation;
use App\Bon_Commande\Bon_de_Commande;

if(isset($_GET['rech']) AND !empty($_GET['rech'])){
  $motclef=$_GET['rech'];

  $nom_frs=$_GET['rech'];
  
      $motclef='%'.$motclef.'%';

      $f=Fournisseur::Where('NOM_FRS',$nom_frs)->get();

      if($f->count()>0){

      $frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS')
                          ->Where('bon_de_commandes.TOTAL_FAIT',0)
                          ->join('bon_de_commandes','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                          ->distinct()
                          ->get();
    
    //$frs=Fournisseur::Where('NOM_FRS','like',$motclef)->get();

      $list_designation=Fournisseur::selectRaw('designations.NOM_DESIGNATION_OBJET,designations.ID_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
                                   ->Where('fournisseurs.NOM_FRS',$nom_frs)
                                   ->join('bon_de_commandes','bon_de_commandes.MATRICULE_FRS','=','fournisseurs.MATRICULE_FRS')
                                   ->join('commanders','commanders.NUMERO_BON_COMMANDE','=','bon_de_commandes.NUMERO_BON_COMMANDE')
                                   ->join('designations','designations.ID_DESIGNATION_OBJET','=','commanders.ID_DESIGNATION_OBJET')
                                   ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
                                   ->where('designations.estSupprimer',0)
                                   ->orderBy('designations.NOM_DESIGNATION_OBJET', 'ASC')
                                   ->distinct()
                                   ->get();

       //$id_frs=Fournisseur::Where('NOM_FRS',$nom_frs)->first();

       //$num=Bon_de_Commande::where('MATRICULE_FRS',$id_frs->MATRICULE_FRS)->get();

      // $num=$num->toArray();

       //for($i=0;$i<count($num);$i++){

        
       //}
      }else{
         
         $frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS')
                          ->Where('bon_de_commandes.TOTAL_FAIT',0)
                          ->join('bon_de_commandes','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                          ->distinct()
                          ->get();

        $list_designation=Designation::selectRaw('designations.NOM_DESIGNATION_OBJET,designations.ID_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
       ->where('designations.NOM_DESIGNATION_OBJET','like',$motclef)
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->where('designations.estSupprimer',0)
       ->orderBy('designations.NOM_DESIGNATION_OBJET', 'ASC')
       ->get();                        
      }
  
}else{
  $frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS')
                          ->Where('bon_de_commandes.TOTAL_FAIT',0)
                          ->join('bon_de_commandes','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                          ->distinct()
                          ->get();

  $list_designation=Designation::selectRaw('designations.NOM_DESIGNATION_OBJET,designations.ID_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->where('designations.estSupprimer',0)
       ->orderBy('designations.NOM_DESIGNATION_OBJET', 'ASC')
       ->get();                        
}

?>


@extends('Layout.default')

@section('content')


  @include('Layout.partials._nav')
 
<form action="" method="GET">
  {{csrf_field()}}
@include('flashy::message')
<div class="eng_obj">
<div class="container" style="width:1000px">
    <div class="well">


      
      
        <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <h1 class="title text-center">{{$art}}</h1>

    </div>
     
        </div>
    <br/><br/><br/>
    @if(!$info->isEmpty())
     <table class="table table-bordered" style="color:black" >
                 
       <tr>
       
       
       <th class="blue text-center">FOURNISSEURS</th>
       <th class="blue text-center">PRIX_UNIT</th>
       
   </tr>
       
       @foreach($info as $f)
   <tr>
       
       
       <td class="text-center blue">{{$f->NOM_FRS}}</td>
       <td class="text-center orange">{{$f->PRIX_UNIT}}</td>
       @endforeach
   </tr>
 
  
      </table>
    @else
    <h3>Aucune information trouvée</h3>
    @endif
      
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