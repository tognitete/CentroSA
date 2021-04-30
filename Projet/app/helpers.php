<?php

use App\Comptabilite\Facture;
use App\User;

if(!function_exists('selection')){

	function selection($v,$value){
		if($v==$value){
			echo 'selected="selected"';
		}
	}
}

if(!function_exists('desactiver')){

	function desactiver($nb){
		if($nb!=0){
			echo 'disabled="disabled"';
		}
	}
}


if(!function_exists('grise')){

	function grise($nb){
		if($nb==0){
			echo 'disabled="disabled"';
		}
	}
}

if(!function_exists('selection_ute')){

	function selection_ute($ute,$value){
		if($ute==$value){
			echo 'selected="selected"';
		}
	}
}

if(!function_exists('Previous')){

	function Previous(){

		header ("Location: $_SERVER[HTTP_REFERER]" );
		}
	}


if(!function_exists('delais')){

	function delais(){
		if(isset($_GET['motclef'])){
       $delais=$_GET['motclef'];

       echo $delais;
        }else{
        	echo "non";
        }

	}
}

if(!function_exists('delSpace_Echo')){

	function delSpace_Echo($value){
		
    $mot=explode(" ",$value,strlen($value)+1);

    $motColler="";

    for($i=0;$i<count($mot);$i++){

       $motColler=$motColler."".$mot[$i];
    }

    echo $motColler;

	}
}

if(!function_exists('delSpace_Return')){

	function delSpace_Return($value){
		
    $mot=explode(" ",$value,strlen($value)+1);

    $motColler="";

    for($i=0;$i<count($mot);$i++){

       $motColler=$motColler."".$mot[$i];
    }

    return $motColler;

	}
}

if(!function_exists('dateFacture')){

	function dateFacture($date,$delais){
		
    $arr = explode("-", $date, 3);
        $j = $arr[2];
        $m= $arr[1];
        $a= $arr[0];
        
     
        $jd=$j+$delais;

        while($jd>30){
            $m++;
            $jd=$jd-30;
        }

        while($m>12){
            $a++;
            $m=$m-12;
        }
        if(($jd>28)&&($m==2)){
            $jd=1;
            $m=3;
        }
      
        
       echo $jd.'/'.$m.'/'.$a;

	}
}
if(!function_exists('Fdate')){

	function Fdate($date){
		
    $arr = explode("-", $date, 3);
        $j = $arr[2];
        $m= $arr[1];
        $a= $arr[0];
        
     
        echo $j.'/'.$m.'/'.$a;

	}
}

if(!function_exists('I_AVANCE')){

    function I_AVANCE($param){
        
    $info=Facture::where('NUMERO_BON_COMMANDE',$param)
                 ->where('ID_CATEGORIE_FACTURE',1)
                 ->first(); 

    if(!is_null($info)){

        echo $info->NUMERO_FACTURE;
    }else{

        echo "---";
    }
    

    }
}

if(!function_exists('I_SOLDE')){

    function I_SOLDE($param){
        
    $info=Facture::where('NUMERO_BON_COMMANDE',$param)
                 ->where('ID_CATEGORIE_FACTURE',2)
                 ->first(); 

    if(!is_null($info)){

        echo $info->NUMERO_FACTURE;
    }else{

        echo "---";
    }
    

    }
}

if(!function_exists('ID_FACT')){

    function ID_FACT($param){
        
    $info=Facture::where('NUMERO_BON_COMMANDE',$param)
                 ->where('ID_CATEGORIE_FACTURE',1)
                 ->first(); 

    if(!is_null($info)){

        return $info->ID_FACTURE;
    }else{

        return "---";
    }
    

    }
}

if(!function_exists('ID_FACT_')){

    function ID_FACT_($param){
        
    $info=Facture::where('NUMERO_BON_COMMANDE',$param)
                 ->where('ID_CATEGORIE_FACTURE',2)
                 ->first(); 

    if(!is_null($info)){

        return $info->ID_FACTURE;
    }else{

        return "---";
    }
    

    }
}

if(!function_exists('FactMoney')){

    function FactMoney($value){
        
    $val= explode(".",$value);

    $length=strlen($val[0]);


    $nb_space=($length/3);

    $nb_space=floor($nb_space);

   
   $pre=substr($val[0],0,($length-($nb_space*3)));

   $resultat=$pre;

   for ($i=0; $i < $nb_space ; $i++) { 
       
   $resultat=$resultat.' '.substr($val[0], (strlen($pre))+($i*3),3);

   }
 
if(isset($val[1])){

    $resultat=$resultat.'.'.$val[1];
}
  echo $resultat;
    

    }
}

if(!function_exists('AuthorizedDivison')){

    function AuthorizedDivison($user,$divison){
        
        $u=User::where('name',$user)->first();

        if(($divison==$u->ID_DIVISION)||($u->ID_DIVISION==0)){

          return true;

        }else{

          return false;
        }
    
   }
 

}

if(!function_exists('AuthorizedRole')){

    function AuthorizedRole($user,$role){
        
        $u=User::where('name',$user)->first();

        if(($role==$u->ID_ROLE)||($u->ID_ROLE==3)){

          return true;

        }else{

          return false;
        }
    
   }
 

}

