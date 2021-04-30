<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Type_bon_de_commande;
use App\Bon_Commande\Objet;
use App\Bon_Commande\Ute;
use App\Bon_Commande\Fournisseur;
use App\Bon_Commande\Designation;
use App\Bon_Commande\Lieu_ou_a_lieu_bon_commande;
use App\Bon_Commande\Bon_de_commande;
use App\Bon_Commande\Commander;
use App\User;
use App\Destination;
use App\Affecter;
use App\Projet;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Auth;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->Planche);

      
    	  $tab = array();
        $value= array();
        $id = array();
        $desi= array();
        $list_ute=array();
        //$destination=array();
        $id_array=array();
        

    	//$id_objet=Objet::where('NOM_OBJET',$request->objet)
                  // ->first();
       
       $list_designation=Designation::selectRaw('designations.NOM_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->get();
       
       $list=$list_designation->toArray();

        //$l=0;
      //for ($i=0; $i < $request->nb_d; $i++) { 

        //  $name="destination".$i;



          //$str=$l."";
          

          //$destination=$destination+ array($str => $request->$name);
          //$l++;
      //}
       
      
      
        
       for($i=0;$i<$list_designation->count();$i++){
          $str=$i."";
        $tab =$tab+array($str => $list[$i]['NOM_DESIGNATION_OBJET'] );
       }

       $i=0;
       for($j=0;$j<count($tab);$j++){
        $name=$tab[$j]."";
        $qte=$tab[$j]."qte";
        $d_ute=$tab[$j]."ute";

        $name=delSpace_Return($name);
        $qte=delSpace_Return($qte);
        $d_ute=delSpace_Return($d_ute);

        
         
        //dump($request->$name);
        if(!is_null($request->$name) || $request->$name!=""){


          
          $str=$i."";
          $id_designation=Designation::where('NOM_DESIGNATION_OBJET',$list[$j]['NOM_DESIGNATION_OBJET'])
          ->first();
        

        
        
       
       
       $id=$id+array($str=>$id_designation->ID_DESIGNATION_OBJET);

       $desi+=array($str=>$request->$name);
       
       $value=$value+array($str=>$request->$qte);

       $list_ute+=array($str =>$request->$d_ute);

       $i++;
        
    }

}

//dump($id);
//dump($desi);
//dump($list_ute);
//dump($value);



   $compt=Designation::count();

  $unit= explode(",",$request->unit,$compt) ;



  $id_type=Type_bon_de_commande::where('DESIGNATION_TYPE_COMMANDE',$request->type_commande)->first();
  $id_lieu=Lieu_ou_a_lieu_bon_commande::where('DESIGNATION_LIEU',$request->lieu)->first();
  $frs=Fournisseur::where('NOM_FRS',$request->fournisseur)->first();

  

  $id_utilisateur = User::where('name',Auth::user()->name)->first();

  if(isset($id_utilisateur->id)){
  $id_user=$id_utilisateur->id;
  }else{
    $id_user=0;
  }

  $id_projet=Projet::where('DESIGNATION_PROJET',$request->destination)->first();

  

 
//$com=Bon_de_commande::count()+1;

 $num_bon=Bon_de_commande::where('NUMERO_BON_COMMANDE',$request->num)->get();

  if($num_bon->count()==0){

     Bon_de_commande::create([
         
        'ID_UTILISATEUR'=>$id_user,
        'NUMERO_BON_COMMANDE'=>$request->num, 
        'OBJET'=>$request->objet,
        'ID_PROJET'=>$id_projet->ID_PROJET,
        'ID_TYPE_COMMANDE'=>$id_type->ID_TYPE_COMMANDE,
        'ID_LIEU'=>$id_lieu->ID_LIEU,
        'MATRICULE_FRS'=>$frs->MATRICULE_FRS,
        'ID_BESOIN'=>1,
        'MONTANT_TOTAL'=>$request->montant,
        'COMMENTAIRE'=>$request->commentaire,
        'DATE_COMMANDE'=>date("Y-m-d"),
        'TAUX_AVANCE'=>$request->taux_avance,
        'DELAIS'=>$request->delais,
        'AVANCE_FAIT'=>0,
        'TOTAL_FAIT'=>0
        
        ]);

     for($i=0;$i<count($id);$i++){

     Commander::create([
      
      'NUMERO_BON_COMMANDE'=>$request->num,
      'ID_DESIGNATION_OBJET'=>$id[$i],
      'QTE_COMMANDE'=>$value[$i],
      'PRIX_UNIT'=>$unit[$i],




      ]);
   }

   
   //$c=Destination::count();

   //$nb_eng=0;

   //$l=0;

    //for($i=0;$i<count($destination);$i++){

      //$desti=Destination::where('DESIGNATION_DESTINATION',$destination[$i])->get();

        
        
        //if($desti->count()==0){

          
          //$nb_eng++;
          
          
          //Destination::create([

          //'ID_DESTINATION'=>Destination::count()+$nb_eng,
          //'DESIGNATION_DESTINATION'=>$destination[$i]

        //]);


        //}else{

            
      
      //$id=Destination::Where('DESIGNATION_DESTINATION',$destination[$i])->first();
      
      //$str=$l."";

      
      //$id_array+=array($str=>$id->ID_DESTINATION);
      //$l++;
    
        //}


      

      
    //}

   

    //for($i=0;$i<count($id_array);$i++){
//
  //    Affecter::create([

    //    'NUMERO_BON_COMMANDE'=>$request->num,
      //  'ID_DESTINATION'=>$id_array[$i]


        //]);
    //}

     //for($i=0;$i<$nb_eng;$i++){

      //Affecter::create([

        //'NUMERO_BON_COMMANDE'=>$request->num,
        //'ID_DESTINATION'=>$c+$nb_eng


        //]);
   // }


    //$num=Bon_de_commande::count()+1;

      //$numeroref = substr_replace("000",$com, -strlen($com));

   $pdf= SnappyPdf::loadView('pages.Bon_Commande.commande',[

          'designation'=>$desi,
          'qte'=>$value,
          'ute'=>$list_ute,
          'tete'=>$request->tete,
          'destination'=>$request->destination,
          'objet'=>$request->objet,
          'commentaire'=>$request->commentaire,
          'lieu'=>$request->lieu,
          'fournisseur'=>$request->fournisseur,
          'typ_cmde'=>$request->typ_cmde,
          'taux_avance'=>$request->taux_avance,
          'montant'=>$request->montant,
          'type_commande'=>$request->type_commande,
          'num'=>$request->num,
          'j'=>date('j'),
          'm'=>$request->m,
          'y'=>date('Y')

]);
      return $pdf->download('commande.pdf');

      
        
      }else{

         $pdf= SnappyPdf::loadView('pages.Bon_Commande.commande',[

          'designation'=>$desi,
          'qte'=>$value,
          'ute'=>$list_ute,
          'objet'=>$request->objet,
          'tete'=>$request->tete,
          'destination'=>$request->destination,
          'commentaire'=>$request->commentaire,
          'lieu'=>$request->lieu,
          'fournisseur'=>$request->fournisseur,
          'typ_cmde'=>$request->typ_cmde,
          'taux_avance'=>$request->taux_avance,
          'montant'=>$request->montant,
          'type_commande'=>$request->type_commande,
          'num'=>$request->num,
          'j'=>date('j'),
          'm'=>$request->m,
          'y'=>date('Y')

]);
      return $pdf->download('commande.pdf');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
