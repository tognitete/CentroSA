

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
@extends('Layout.default')

@section('content')


  @include('Layout.partials._nav')
<div class="eng_obj">
<div class="container">
  <div class="row">
  <div class="col-md-10" style="width:90%">
    <div class="well">


    

        <div class="row">
        <div class="col-md-offset-1 col-md-10">
          <img src="../images/logo.png" style="width:100px;margin-left:-80px" alt="logo de CENTRO" class="img-rounded">
        <h1 class="title text-center" id="haut">BON DE TRANSFERT N&deg{{$num}}</h1>

    </div>
     
        </div>

        
      <br/><br/><br/>

      
        <br/><br/><br/>

        <div class="row">
          <div class="col-md-7" style="">
            <h1 class="text-center orange title">DESIGNATIONS</h1>
            <form action="" method="GET" id="appro">
              <?php if(isset($user)){?>
              <input type="hidden" id="user" name="user" value="{{$user}}">
              <?php } ?>
              
          <table class="table table-condensed" style="color:black" name="tableau">
  <tr>
       
       <th class="blue">Designation</th>
       <th class="blue">UTE</th>
       <th class=" blue" style="width:50px">Quantite</th>
       <th class="blue">Choix</th>
   </tr>
      @if(!$list_designation->isEmpty())
       <?php $i=0 ?>
       @foreach($list_designation as $des)
       <?php $i++ ?>
   <tr>
       
       <td>{{$des->NOM_DESIGNATION_OBJET}}</td>
       <td>{{$des->DESIGNATION_UTE}}</td>
       <td><input type="text" class="form-control" disabled="disabled" style="width:100px" name="{{$des->NOM_DESIGNATION_OBJET}}" id="{{$des->NOM_DESIGNATION_OBJET}}" onkeypress="return valid_number(event)" ></td>
       <td>
        <label class="checkbox-inline">
       <input type="checkbox" id="option" name="option"  value="{{$des->NOM_DESIGNATION_OBJET}}" onclick="degrise_()">
        </label>
       </td>
   </tr>

      @endforeach

      @else
      
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

      <form action="{{route('BonTransfert.store')}}" method="POST" onsubmit="sub_()" id="appro">
        {{csrf_field()}}
           
          <div class="col-md-5">
            <br/><br/><br/><br/>
             
          <div class="row">
            <div class="col-md-offset-2 col-md-8  col-md-push-2 "> 
            <div class="form-group">
              <label for="objet" class="orange">Objet <span class="blue">*</span></label>
               <input type="text" name="objet" id="objet" class="form-control">
              <p>{!!$errors->first('objet','<span class="help-block err">:message</span>')!!}</p> 
            </div>
        </div>
        
        
    </div>
        
            <div class="row">
            <div class="col-md-offset-2 col-md-5  col-md-push-2 "> 
            <div class="form-group">
              <label for="provenance" class="orange"><DIV>Provenance <span class="blue">*</span></DIV></label>
              <select id="provenance" name="provenance" class="form-control" style="width:167px" >
                <option></option>
                @foreach($projet as $p)
                    <option>{{$p->DESIGNATION_PROJET}}</option>
                @endforeach
              </select>
              <p>{!!$errors->first('provenance','<span class="help-block err">:message</span>')!!}</p>
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
            <a href="{{route('lieu.create')}}"  disabled onclick="event.preventDefault()" style="height:40px;margin-left:9px;font-size:12px"class="btn btn-primary form-control">Nouveau?</a> 
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

<br/><br/><br/>

<div class="row">
        <br/>
        <div class="col-md-offset-5 col-md-2">
        <div class="form-group">
           <input type="submit" name="obj_eng" class="btn btn-success " id="bas"  style="height:50px"value="ENREGISTRER &raquo">
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
<input type="hidden" id="num" name="num" value="{{$num}}">

 <?php if(isset($user)){?>
              <input type="hidden" id="user" name="user" value="{{$user}}">
              <?php } ?>

              <a href="#bas"><img src="../images/bas.png" style="width:100px;position:fixed;" class="pull-right" ></a>
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