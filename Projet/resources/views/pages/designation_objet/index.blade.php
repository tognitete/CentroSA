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
                          
                         ->distinct()
                          ->get();

  $list_designation=Designation::selectRaw('designations.NOM_DESIGNATION_OBJET,designations.ID_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->where('designations.estSupprimer',0)
       ->orderBy('designations.NOM_DESIGNATION_OBJET', 'ASC')
       ->get();                        
}

if(isset($_GET['init'])){

   $frs=Fournisseur::selectRaw('fournisseurs.NOM_FRS')
                          
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
        <h1 class="title text-center">ARTICLES</h1>

    </div>
     
        </div>
    <br/><br/><br/>
    <div class=" col-md-offset-7 col-md-2" > <input type="search" style="height:35px" id="rech" name="rech"></div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="submit"class="btn btn-primary " style="height:35px" value="FILTRER" >
    <button class="btn btn-primary" type="submit" name="init" style="height:35px" ><img src="{{asset('images/r.png')}}" style="width:30px"></button>

        <div class="row">
            <div class="col-md-offset-0 col-md-3"> 
            <div class="form-group">
        @if(!$frs->isEmpty())     
             
        <table class="table table-bordered" style="width:200px;color:black" >
                 
       <tr>
       
       
       <th class="blue text-center">FOURNISSEURS</th>
       <th style="width:50px"></th>
       
   </tr>
    
       @foreach($frs as $f)
   <tr>
       
       
       <td class="text-center">{{$f->NOM_FRS}}</td>
       <td><button type="submit" id="{{$f->NOM_FRS}}" onclick="trie('{{$f->NOM_FRS}}')"><img src="{{asset('images/d.png')}}" style="width:45px"></button></td>
       @endforeach
   </tr>

  
      </table>
      @else
      <br/>
      <p>Aucun Resultat</p>
         @endif      
              
            </div>
        </div>
        
        <div class="col-md-offset-1 col-md-8">
          <div class="row">
            <div class="col-md-12"> 
               
          <table class="table table-condensed" style="color:black" name="tableau" style="width:1000px" >
  <tr>
       
       <th class="blue"style="width:200px" >Designation</th>
       <th class="blue" style="width:130px">UTE</th>
       <th class="blue" style="width:200px">Modification</th>
       <th class="blue" style="width:200px">Suppression</th>
       <!--<th class="blue">Prix Unit.</th>-->
       
   </tr>
       @if(!$list_designation->isEmpty())
       <?php $i=0 ?>
       @foreach($list_designation as $des)
       <?php $i++ ?>
   <tr>
       
       <td><a href="/infosArticles?art={{$des->NOM_DESIGNATION_OBJET}}" style="color:black">{{$des->NOM_DESIGNATION_OBJET}}</a></td>
       <td>{{$des->DESIGNATION_UTE}}</td>
       @if(AuthorizedRole(Auth::user()->name,2))  
       <td><a href="{{route('DesignationObjet.edit',$des->ID_DESIGNATION_OBJET)}}" class="btn btn-primary">Modifier</a></td>
       @else
       <td><a href="{{route('DesignationObjet.edit',$des->ID_DESIGNATION_OBJET)}}" disabled onclick="event.preventDefault()" class="btn btn-primary">Modifier</a></td>
       @endif
        @if(AuthorizedRole(Auth::user()->name,2))
       <td><a href="/desi_destroy?id={{$des->ID_DESIGNATION_OBJET}}" onclick="sup()" class="btn btn-danger">Supprimer</a></td>
       @else
       <td><a href="/desi_destroy?id={{$des->ID_DESIGNATION_OBJET}}" disabled onclick="event.preventDefault()" class="btn btn-danger">Supprimer</a></td>
       @endif
      
       
   </tr>

      @endforeach

      @else
        <td>Aucun Résultat</td>

       @endif
 
          </table>
            </div>
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