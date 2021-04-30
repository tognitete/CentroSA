<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Utilisateur</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/animate-custom.css')}}" />
    

@include('flashy::message')
</head>
<body>
@if(session()->has('message'))
<center>

<div class="alert alert-danger" style="width:250px">
  {{session()->get('message')}}
</div>
</center>>
@endif
        <div class="container" style="margin-top:80px">
            <!-- Codrops top bar -->
            
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" method="POST" autocomplete="on">
                             {{csrf_field()}} 
                                <h1>AJOUT D'UTILISATEUR</h1> 
                                <p> 
                                    <label for="utilisateur" class="uname"  ><span class="fa fa-users"></span>  Utilisateur</label>
                                    <input id="utilisateur" name="utilisateur"  type="text" value="{{old('utilisateur')}}" >
                                    <p>{!!$errors->first('utilisateur','<span class="help-block err">:message</span>')!!}</p>
                                </p>
                                <p> 
                                    <label for="mdp" class="youpasswd" ><span class="fa fa-key"></span>  Mot de Passe</label>
                                    <input id="mdp" name="mdp"  type="password">
                                    <p>{!!$errors->first('mdp','<span class="help-block err">:message</span>')!!}</p> 
                                </p>
                                <p> 
                                    <label for="cmdp" class="youpasswd" ><span class="fa fa-key"></span>   Confirmation de Mot de Passe </label>
                                    <input id="cmdp" name="cmdp"  type="password">
                                    <p>{!!$errors->first('cmdp','<span class="help-block err">:message</span>')!!}</p> 
                                </p>
                                
                            
                                <p class="login button"> 
                                    
                                    <input type="submit" value="AJOUTER"> 
                                    
                                
                                    
								</p>

                                <br/><br/>

                                <p class="orange"> 
                                    
                                    <a class="orange" href="{{route('home')}}">QUITTER</a> 
                                    
                                
                                    
                                </p>
                                

                            </form>
                        </div>

                        
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>