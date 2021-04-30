
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
        <h2 class="title text-center">FACTURE ET BON DE COMMANDE <span class="orange"></span></h2>

    </div>
     
        </div>
    <br/><br/><br/>
    

        <div class="row">
            <div class="col-md-offset-1 col-md-8"> 
            <div class="form-group">
    
             
        <table class="table table-bordered" style="width:800px;color:black" >
                 
       <tr>
       
       
       <th class="blue text-center"><h4>BON DE COMMANDES </h4></th>
       <th class="blue text-center"><h4>FACTURE AVANCE </h4></th>
       <th class="blue text-center"><h4>FACTURE SOLDE </h4></th>
       <th class="blue text-center"><h4>MONTANT<br/>FCFA</h4></th>
       <!--<th style="width:50px"></th>-->
       
   </tr>
    <?php  $i=-1 ?>
      @foreach($bon as $b ) 
      <?php  $i++ ?>
   <tr>
       <td class="text-center blue">{{$b->NUMERO_BON_COMMANDE}}</td>
       <td class="text-center orange"><a href="{{route('Facture.show',ID_FACT($b->NUMERO_BON_COMMANDE))}}" class="orange" style="text-decoration:none">{{I_AVANCE($b->NUMERO_BON_COMMANDE)}}</a></td>
       <td class="text-center orange"><a href="{{route('Facture.show_',['id'=>ID_FACT_($b->NUMERO_BON_COMMANDE)])}}" class="orange" style="text-decoration:none">{{I_SOLDE($b->NUMERO_BON_COMMANDE)}}</a></td>
       <td class="text-center blue">{{FactMoney($montant[$i])}}
       
   </tr>

  @endforeach
      </table>
         
              
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

