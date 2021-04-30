
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
        <h2 class="title text-center">BON DE COMMANDE CONCERNANT LE FOURNISSEUR <span class="orange">{{$nom}}</span></h2>

    </div>
     
        </div>
    <br/><br/><br/>
    

        <div class="row">
            <div class="col-md-offset-1 col-md-8"> 
            <div class="form-group">
        @if(!$bon->isEmpty())     
             
        <table class="table table-bordered" style="width:800px;color:black" >
                 
       <tr>
       
       
       <th class="blue text-center"><h4>BON DE COMMANDES </h4></th>
       <th class="blue text-center"><h4>DATE COMMANDE </h4></th>
       <th class="blue text-center"><h4>DATE PAIEMENT </h4></th>
       <th class="blue text-center"><h4>MONTANT</h4></th>
       <th style="width:50px"></th>
       
   </tr>
    
       @foreach($bon as $b)
   <tr>
       
       
       <td class="text-center"><h3> <span class="blue">N&deg<span><span class="orange">{{$b->NUMERO_BON_COMMANDE}}</h3></span></td>
       <td class="text-center blue"><h3>{{Fdate($b->DATE_COMMANDE)}}</h3></td>
       <td class="text-center orange"><h3>{{DateFacture($b->DATE_COMMANDE,$b->DELAIS)}}</h3></td>
       <td class="text-center blue"><h3>{{FactMoney($b->MONTANT_TOTAL)}}</h3></td>
       <td><a href="{{route('BonCommande.show',$b->NUMERO_BON_COMMANDE)}}"><img src="{{asset('images/d.png')}}" style="width:50px"></a></td>
       @endforeach
   </tr>

  
      </table>
      @else
      <br/>
      <p>PAS DE BON DE COMMANDE POUR CE FOURNISSEUR</p>
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