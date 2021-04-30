<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>CENTRO S.A.</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{asset('css/commande.css')}}">
@include('flashy::message')


  <script type="text/javascript" src="{{asset('js/Larails.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/helpers.js')}}"></script>

 

</head>
<body>
   

<form action="" method="POST"  onsubmit='return confirm("ETES-VOUS SÛR ?")'>
  {{csrf_field()}}
  @include('Layout.partials._nav')

  @if(session()->has('message'))
<center>

<div class="alert alert-danger" style="width:300px">
  {{session()->get('message')}}
</div>
</center>>
@endif
<div class="eng_obj">
<div class="container">
    <div class="well">


   

        <div class="row">
        <div class="col-md-offset-1 col-md-10">
        <h1 class="title text-center">ATTRIBUTION DE DROIT</h1>

    </div>
     
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="ute">Utilisateur</label> 
              <select id="nom" name="nom" class="form-control">
                <option></option>
                 @if(!$user->isEmpty())
                @foreach($user as $u)
                    <option {{selection($u->name,old('nom'))}}>{{$u->name}}</option>
                @endforeach
                @else
               
                @endif
                
              </select>
              <p>{!!$errors->first('nom','<span class="help-block err">:message</span>')!!}</p>
                </div>
        </div>
        
      </div>

      <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="division">DIVISON</label>
              <select id="division" name="division" class="form-control" onchange="div()">
                <option></option>
                <option>Néant</option>
                 @if(!$division->isEmpty())
                @foreach($division as $d)
                    <option {{selection($d->DESIGNATION_DIVISION,old('division'))}}>{{$d->DESIGNATION_DIVISION}}</option>
                @endforeach
                @else
               
                @endif
                
              </select>
              <p>{!!$errors->first('division','<span class="help-block err">:message</span>')!!}</p>
                </div>
        </div>
      </div>
    <?php $i=0;?>
    <div class="row">
            <div class="col-md-offset-2 col-md-8"> 
            <div class="form-group">
              <label for="role">Rôle</label>
              <select id="role" name="role" class="form-control" required >
                <option></option>
                @if(!$role->isEmpty())
                @foreach($role as $r)
                <?php $i++;?>
                @if($i!=3)
                    <option {{selection($r->DESIGNATION_ROLE,old('role'))}}>{{$r->DESIGNATION_ROLE}}</option>
                @else 
                <option disabled {{selection($r->DESIGNATION_ROLE,old('role'))}}>{{$r->DESIGNATION_ROLE}}</option> 
                @endif  
                @endforeach
                @else
               
                @endif
                
              </select>
              <p>{!!$errors->first('role','<span class="help-block err">:message</span>')!!}</p> 
                </div>
        </div>
      </div>

      
        
      <div class="row">
        <br/>
        <br/>
        <div class="col-md-offset-5 col-md-2">
        <div class="form-group">
           <input type="submit" name="obj_eng" class="btn btn-success " onclick="dis()" value="ENREGISTRER &raquo">
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
 <input type="hidden" id="rep" name="rep" value="defaut">

@include('Layout/partials/_footer')
</form>
</body>
</html>