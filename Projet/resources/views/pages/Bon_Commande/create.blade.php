@extends('Layout.default')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 
 $("#delais").keyup(function(){

  
  var recherche = $(this).val();
  var data = 'motclef='+ recherche;
  if(recherche.length>0){

        
    $.ajax({
      type: "GET",
      url:"{{route('fournisseur.create')}}",
      data : data,
      success:function(server_response){

        
    }
    });

    
  }

 });
});
</script>


@section('content')


  @include('Layout.partials._nav')
<div class="eng_obj">
<div class="container">
  <div class="row">
  <div class="col-md-10" style="width:92%">
    <div class="well">


    

        <div class="row">
        <div class="col-md-offset-1 col-md-10">
          <img src="../images/logo.png" style="width:100px;margin-left:-80px" alt="logo de CENTRO" class="img-rounded">
        <h1 class="title text-center" id="haut">BON DE COMMANDE N&deg{{$num}}</h1>


    </div>

     
        </div>
        
      <br/><br/>
      
      
      
      
        <br/><br/><br/>

        <div class="row">
          <div class="col-md-7" style="">
            <h1 class="text-center orange title">DESIGNATIONS</h1>
             <br/><br/><br/>
             <form action="" method="GET" id="appro">
              <?php if(isset($user)){?>
              <input type="hidden" id="user" name="user" value="{{$user}}">
              <?php } ?>
              


          <table class="table table-condensed" style="color:black" name="tableau">
  <tr>
       
       <th class="blue" >Designation</th>
       <th class="blue" style="width:130px">UTE</th>
       <!--<th class="blue">Prix Unit.</th>-->
       <th class="blue">Quantite</th>
       <th class="blue">Prix Unit.</th>
       <th class="blue">Choix</th>
   </tr>
       @if(!$list_designation->isEmpty())
       <?php $i=0 ?>
       @foreach($list_designation as $des)
       <?php $i++ ?>
   <tr>
       
       <td>{{$des->NOM_DESIGNATION_OBJET}}</td>
       <td>{{$des->DESIGNATION_UTE}}</td>
    
       <td><input type="text" class="form-control" disabled="disabled" style="width:100px" name="{{$des->NOM_DESIGNATION_OBJET}}" 
        id="{{$des->NOM_DESIGNATION_OBJET}}" onkeypress="return valid_number(event)" onKeyUp="key({{$i}},'{{$des->NOM_DESIGNATION_OBJET}}')" ></td>
       <td><input type="text" class="form-control" disabled="disabled" style="width:100px" name="{{$i}}" id="{{$i}}" onkeypress="return valid_number(event)"></td>
       <td>
        <label class="checkbox-inline">
       <input type="checkbox" id="option" name="option"  value="{{$des->NOM_DESIGNATION_OBJET}}" onclick="degrise()">
        </label>
       </td>
   </tr>

      @endforeach

      @else
      <?php $i=0 ?>
        <td>Aucun Résultat</td>

       @endif
 
          </table>

          
          <div>
            @if(AuthorizedRole(Auth::user()->name,2))
           <a href="{{route('DesignationObjet.create')}}" class="btn btn-primary btn btn-block" style="width:510px;margin-left:20px">
            Nouvel Article?</a>
            @else
            <a href="{{route('DesignationObjet.create')}}" disabled onclick="event.preventDefault()" class="btn btn-primary btn btn-block" style="width:510px;margin-left:20px">
            Nouvel Article?</a>
            @endif
           </div>

        </div>
          </form> 

          <form action="{{route('BonCommande.store')}}" method="POST" onsubmit="sub({{$i}})" id="appro">
  {{csrf_field()}}
          <div class="col-md-5">
            <br/><br/><br/><br/><br/><br/>
            <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-push-2"> 
            <div class="form-group">
              <label for="objet" class="orange">Objet <span class="blue">*</span></label>
              <input type="text" name="objet" id="objet" class="form-control" >
              <p>{!!$errors->first('objet','<span class="help-block err">:message</span>')!!}</p> 
                </div>
        </div>
      </div>
      
             <div class="row">
            <div class="col-md-offset-2 col-md-8  col-md-push-2"> 
            <div class="form-group">
              <label for="type_commande" class="orange">Type de Commande <span class="blue">*</span></label>
              <select id="type_commande" name="type_commande" class="form-control" style="width:170px" onchange="avance()">
                <option></option>
                 @foreach($type_commande as $t_cmde)
                    <option>{{$t_cmde->DESIGNATION_TYPE_COMMANDE}}</option>
                @endforeach
                </select>
                <p>{!!$errors->first('typ_cmde','<span class="help-block err">:message</span>')!!}</p>
            </div>
           
            </div>
          </div>
           
        <div class="row">
            <div class="col-md-offset-2 col-md-6  col-md-push-2"> 
            <div class="form-group">
              <label class="orange" for="taux_avance">Taux Avance <span class="blue">*</span></label>
               <input type="text" name="taux_avance" required id="taux_avance" onkeypress="return valid_number(event)" value="{{old('taux_avance')? old('taux_avance') :''}}" class="form-control" 
               placeholder="%" disabled="disabled">
               <p>{!!$errors->first('taux_avance','<span class="help-block err">:message</span>')!!}</p>
            </div>
          </div>
        </div>
       
            <div class="row">
            <div class="col-md-offset-2 col-md-5  col-md-push-2 "> 
            <div class="form-group">
              <label for="nom_fournisseur" class="orange">Fournisseur <span class="blue">*</span></label>
              <select id="nom_fournisseur" name="nom_fournisseur" class="form-control" style="width:167px" >
                <option></option>
                @foreach($fournisseur as $frs)
                    <option>{{$frs->NOM_FRS}}</option>
                @endforeach
              </select>
              <p>{!!$errors->first('nom_fournisseur','<span class="help-block err">:message</span>')!!}</p>
            </div>
        </div>
        <div class="col-md-offset-2 col-md-3">
            <br/>
           @if(AuthorizedRole(Auth::user()->name,2))
            <a href="{{route('fournisseur.create')}}"  style="height:40px;margin-left:15px;font-size:12px"class="btn btn-primary form-control" >Nouveau?</a>
          @else
           <a href="{{route('fournisseur.create')}}"  disabled onclick="event.preventDefault()" style="height:40px;margin-left:15px;font-size:12px"class="btn btn-primary form-control" >Nouveau?</a>
          @endif
          </div>
        
    </div>

      <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-push-2"> 
            <div class="form-group">
              <label for="delais" class="orange">Délais <span class="blue">*</span></label>
              <input type="text" name="delais" onkeypress="return valid_number(event)" class="form-control" >
              <p>{!!$errors->first('delais','<span class="help-block err">:message</span>')!!}</p> 
                </div>
        </div>
      


      </div>
   
      

      <div class="row">
            <div class="col-md-offset-2 col-md-5  col-md-push-2 "> 
            <div class="form-group">
              <label for="destination" class="orange"><DIV>Destination <span class="blue">*</span></DIV></label>
              <select id="destination" name="destination" class="form-control" style="width:167px" >
                <option></option>
                @foreach($projet as $p)
                    <option>{{$p->DESIGNATION_PROJET}}</option>
                @endforeach
              </select>
              <p>{!!$errors->first('destination','<span class="help-block err">:message</span>')!!}</p>
            </div>
        </div>
         <div class="col-md-offset-2 col-md-3">
            <br/>
           @if(AuthorizedRole(Auth::user()->name,2))
            <a href="{{route('projet.create')}}"  style="height:40px;margin-left:15px;font-size:12px"class="btn btn-primary form-control" >Nouveau?</a>
          @else
           <a href="{{route('projet.create')}}"  disabled onclick="event.preventDefault()" style="height:40px;margin-left:15px;font-size:12px"class="btn btn-primary form-control" >Nouveau?</a>
          @endif
          </div>
        
    </div>
        

     
     
      
            <div class="row">
            <div class="col-md-offset-2 col-md-5  col-md-push-2 "> 
            <div class="form-group">
              <label for="lieu" class="orange">Lieu <span class="blue">*</span></label>
              <select id="lieu" name="lieu" class="form-control" style="width:167px" >
                <option></option>
                @foreach($lieu as $l)
                    <option>{{$l->DESIGNATION_LIEU}}</option>
                @endforeach
              </select>
              <p>{!!$errors->first('lieu','<span class="help-block err">:message</span>')!!}</p>
            </div>
        </div>
        <div class="col-md-offset-2 col-md-3">
            <br/>
            @if(AuthorizedRole(Auth::user()->name,2))
           <a href="{{route('lieu.create')}}"  style="height:40px;margin-left:9px;font-size:12px"class="btn btn-primary form-control">Nouveau?</a>
            @else
            <a href="{{route('lieu.create')}}"  disabled onclick="event.preventDefault()"  style="height:40px;margin-left:9px;font-size:12px"class="btn btn-primary form-control">Nouveau?</a> 
            @endif
          </div>
            
    </div>
    
    <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-push-2"> 
            <div class="form-group">
              <label for="commentaire" class="orange">Commentaire</label>
              <textarea name="commentaire" id="commentaire" class="form-control" cols="12" rows="4"></textarea>
              <p>{!!$errors->first('commentaire','<span class="help-block err">:message</span>')!!}</p> 
                </div>
        </div>
      </div>
      <br/><br/>
      <p style="font-size:20px"><span class="title orange">NB</span>:les champs marqués <span class="blue"> * </span>sont<span class="orange"> obligatoires </span></p>
        </div>
         
</div>


<div class="row">
        <br/><br/><br/>

        <div class="col-md-offset-5 col-md-2">
        <div class="form-group">
           <input type="submit" name="obj_eng" class="btn btn-success "  id="bas" style="height:50px"value="ENREGISTRER &raquo">
           </div>
          </div>
      </div>
       
      <div class="row">
        <br/>
        <div class="col-md-offset-0 col-md-2">
        <a href="javascript:history.go(-1);">Annuler</a>
      </div>
    </div>
    </div>

</div>
<input type="hidden" id="desig" name="desig">
<input type="hidden" id="quant" name="quant">
<input type="hidden" id="unit" name="unit">
<input type="hidden" id="num" name="num" value="{{$num}}">

 <?php if(isset($user)){?>
              <input type="hidden" id="user" name="user" value="{{$user}}">
              <?php } ?>

              <a href="#bas"><img src="../images/bas.png" style="width:100px;position:fixed" class="pull-right" ></a>
</div>

@include('Layout/partials/_footer')
</form>

</div>
</div>
</div>
</div>




        

     
               
          
        
        

    

</div> 
</div>
</div>    
        
@stop