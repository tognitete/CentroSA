function grise(){
	var valeur=document.getElementById('nb_eng').value;
	valeur=valeur+0;
   if(valeur!=0){
   	
		document.getElementById('nb_eng').disabled="true";
	}
}

function grise_(){
  var valeur=document.getElementById('avec').value;
  if(valeur!=0){
    
    document.getElementById('avec').disabled=true;
    
  }else{
    document.getElementById('sans').disabled=true;
  }
}


function precedent(){

	window.history.back();

}
//function degrise(){
//	var val=document.getElementsByName('option');
//	alert(val);
//}

function degrise(){

var b=0;
var checkboxes = document.getElementById("appro").getElementsByTagName("input");
for (var i = 0, iMax = checkboxes.length; i < iMax; ++i) {
   var check = checkboxes[i];
   if (check.type == "checkbox" && check.checked) {
       document.getElementById(check.value).disabled=false;
       document.getElementById(check.value).value="";
       b++;
       
}else if (check.type == "checkbox" && !check.checked){
        document.getElementById(check.value).disabled=true;
   	    document.getElementById(check.value).value="";
        b++;
        document.getElementById(b).disabled=true;
        document.getElementById(b).value="";
        
   }
}
}

function degrise_(){


var checkboxes = document.getElementById("appro").getElementsByTagName("input");
for (var i = 0, iMax = checkboxes.length; i < iMax; ++i) {
   var check = checkboxes[i];
   if (check.type == "checkbox" && check.checked) {
       document.getElementById(check.value).disabled=false;
       document.getElementById(check.value).value="";
}else if (check.type == "checkbox" && !check.checked){
        document.getElementById(check.value).disabled=true;
        document.getElementById(check.value).value="";
        
   }
}
}
function avance(){
  var value=document.getElementById('type_commande').value;


  if(value=="AVEC AVANCE"){
    
    document.getElementById('taux_avance').disabled=false;
    document.getElementById('taux_avance').value="";
  }else{
    document.getElementById('taux_avance').value=0;
    document.getElementById('taux_avance').disabled=true;
  }
}

function dwn(valeur){

  document.getElementById(valeur).style.display="block";
}

function outdwn(valeur){

  document.getElementById(valeur).style.display="none";
}


function key(key1,key2){


var lg=document.getElementById(key2).value.length;


if(lg>0){

  document.getElementById(key1).disabled=false;
}else{

  document.getElementById(key1).disabled=true;
}

}

function out(value){

var desig=document.getElementById('desig').value;

if(desig==""){
desig=value;

document.getElementById('desig').value=desig;

}else{
  desig=desig+","+value;

  document.getElementById('desig').value=desig;
}


}

function sub(value){

 

var checkboxes = document.getElementById("appro").getElementsByTagName("input");
var compt=0;
var un=0;
var b=0;
var ch=0;
for (var i = 0, iMax = checkboxes.length; i < iMax; ++i) {
   var check = checkboxes[i];
   
   if (check.type == "checkbox" && check.checked) {
         b++;
    if((document.getElementById(check.value).value.length>0)&&(document.getElementById(b).value.length>0)){
      
      
     var quant=document.getElementById('quant').value;
     var desig=document.getElementById('desig').value;

        if(quant==""){
           quant=document.getElementById(check.value).value;

            document.getElementById('quant').value=quant;

        }else{
           quant=quant+","+document.getElementById(check.value).value;

            document.getElementById('quant').value=quant;
        }
         
         if(desig==""){
           desig=check.value;

            document.getElementById('desig').value=desig;

        }else{
           desig=desig+","+check.value;

            document.getElementById('desig').value=desig;
        }

         //return true;
    }else{

      compt++;

      
     }
  }else if (check.type == "checkbox"){
    b++;
    ch++;
   }else{

    ch++;
   }
}

if((document.getElementById('quant').value.length<=0)&&(document.getElementById('desig').value.length<=0)&&(document.getElementById('unit').value.length<=0)){

  event.preventDefault();

  alert('Aucun Article sélectioné');
}



for(var i =1; i<=value;i++){



  if(document.getElementById(i).value.length>0){

    
 
 var unit=document.getElementById('unit').value;

        if(unit==""){
           unit=document.getElementById(i).value;

            document.getElementById('unit').value=unit;

        }else{
           unit=unit+","+document.getElementById(i).value;

            document.getElementById('unit').value=unit;
            
        }

  }else if(!document.getElementById(i).disabled){

    un++;
  }
}



if(compt>0){

  if(!confirm("Certains quantités choisis n'ont pas de valeur Continuer ?")){

        event.preventDefault();
      }else{
        document.getElementById('taux_avance').disabled=false;
        return true;
      }
}

if(un>0){

  if(!confirm("Certains prix unit... choisis n'ont pas de valeur Continuer ?")){

        event.preventDefault();
      }else{
        document.getElementById('taux_avance').disabled=false;
        return true;
      }
}
}


function sub_(){

 

var checkboxes = document.getElementById("appro").getElementsByTagName("input");
var compt=0;
var un=0;
var b=0;
for (var i = 0, iMax = checkboxes.length; i < iMax; ++i) {
   var check = checkboxes[i];
   if (check.type == "checkbox" && check.checked) {
     b++;
    if(document.getElementById(check.value).value.length>0){
      
     var quant=document.getElementById('quant').value;
     var desig=document.getElementById('desig').value;

        if(quant==""){
           quant=document.getElementById(check.value).value;

            document.getElementById('quant').value=quant;

        }else{
           quant=quant+","+document.getElementById(check.value).value;

            document.getElementById('quant').value=quant;
        }
         
         if(desig==""){
           desig=check.value;

            document.getElementById('desig').value=desig;



        }else{
           desig=desig+","+check.value;

            document.getElementById('desig').value=desig;
        }

         //return true;
    }else{

      compt++;

      
     }
  }else if (check.type == "checkbox"){
    b++;
}

}




if((document.getElementById('quant').value.length<=0)&&(document.getElementById('desig').value.length<=0)){
  event.preventDefault();

  alert('Aucun Article sélectioné');
}



if(compt>0){

  if(!confirm("Certains quantités choisis n'ont pas de valeur Continuer ?")){

        event.preventDefault();
      }else{
        
        return true;
      }
}
}



function trie(value){

  document.getElementById('rech').value=value;

  
}

function sup(){

  if(!confirm("Etes-vous sûr ?")){

    event.preventDefault();
  }else{

    return "";
  }
  
  
}

function quitte(){

  document.getElementById('quitte').value="oui";
}

function s_user(){

  document.getElementById('n_nom').value=document.getElementById('nom').value;
}
function div(){

  if(document.getElementById('division').selectedIndex==1){

    document.getElementById('role').selectedIndex=3;
    document.getElementById('role').disabled=true;

  }else{

   document.getElementById('role').selectedIndex=0;
    document.getElementById('role').disabled=false;

  }
}

function dis(){

  document.getElementById('role').disabled=false;
}
