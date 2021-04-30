<?php
use App\User;

if(isset($_GET['rech']) AND !empty($_GET['rech'])){
  
	$motclef=$_GET['rech'];
  
      $motclef='%'.$motclef.'%';

      $user=User::selectRaw('users.NAME,users.PASSWORD')
                      ->Where('users.NAME','like',$motclef)
                      ->Where('estSupprimer',0)
                      ->distinct()
                      ->get();
    
    //$frs=Fournisseur::Where('NOM_FRS','like',$motclef)->get();
      
  
}else{
	$user=User::selectRaw('users.NAME,users.PASSWORD')
                  ->Where('estSupprimer',0)
                  ->distinct()
                  ->get();
}

if(isset($_GET['init'])){

$user=User::selectRaw('users.NAME,users.PASSWORD')
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
    <button class="btn btn-primary" type="submit" style="height:35px" name="init" ><img src="/images/r.png" style="width:30px"></button>

        <div class="row">
            <div class="col-md-offset-1 col-md-8"> 
            <div class="form-group">
        @if(!$user->isEmpty())     
             
        <table class="table table-condensed" style="width:800px;color:black" >
                 
       <tr>
       
       
       <th class="blue "><h4>UTILISATEUR</h4></th>
       <th class="blue "><h4>MOT DE PASSE</h4></th>
       
       
       
   </tr>
    
       @foreach($user as $u)
   <tr>
       
       
       <td><h4>{{$u->NAME}}</h4></td>


       <td><h4>{{$u->PASSWORD}}</h4></td>
        
      
      
       
       
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