<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Type_bon_de_commande;
use App\Bon_Commande\Objet;
use App\Bon_Commande\Ute;
use App\Bon_Commande\Fournisseur;
use App\Bon_Commande\Designation;
use App\Bon_Commande\Lieu_ou_a_lieu_bon_commande;
use App\Bon_Transfert\Bon_de_transfert;
use App\Bon_Transfert\Choisir_pour;
use App\Bon_Commande\Commander;
use App\Transferer;
use App\Destination;
use App\Utilisateur;
use App\Projet;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Auth;

class PDFTransfertController extends Controller
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
        $tab = array();
        $value= array();
        $id = array();
        $desi= array();
        $list_ute=array();
        $id_array=array();

    	
       
       $list_designation=Designation::selectRaw('designations.NOM_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
       //->where('ID_OBJET',$id_objet->ID_OBJET)
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->get();
       
       $list=$list_designation->toArray();
       
       // $l=0;
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



//$c=Destination::count();

  // $nb_eng=0;

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

            
      
      //$id_destination=Destination::Where('DESIGNATION_DESTINATION',$destination[$i])->first();
      
      //$str=$l."";

      
      //$id_array+=array($str=>$id_destination->ID_DESTINATION);
      //$l++;
    
        //}
      //}

//dump($id);
//dump($desi);
//dump($list_ute);
//dump($value);

 
  $id_lieu=Lieu_ou_a_lieu_bon_commande::where('DESIGNATION_LIEU',$request->lieu)->first();
  //$frs=Fournisseur::where('NOM_FRS',$request->provenance)->first();

  $num_bon=Bon_de_transfert::where('NUMERO_BON_TRANSFERT',$request->num)->get();


 if(!is_null($request->user)){
  $id_utilisateur = User::where('name',Auth::user()->name)->first();

  $user=$id_utilisateur->id;
 }else{
  $user=0;
 }

  $id_projet=Projet::where('DESIGNATION_PROJET',$request->destination)->first();



  if($num_bon->count()==0){


 
     Bon_de_transfert::create([
        'NUMERO_BON_TRANSFERT'=>$request->num,
        'ID_UTILISATEUR'=>$user,
        'ID_PROJET'=>$id_projet->ID_PROJET,
        'OBJET'=>$request->objet,
        'ID_LIEU'=>$id_lieu->ID_LIEU,
        'PROVENANCE_BON_TRANSFERT'=>$request->provenance,
        'ID_BESOIN'=>1,
        'COMMENTAIRE'=>$request->commentaire
        
        
        ]);



     for($i=0;$i<count($id);$i++){

      

     Choisir_pour::create([
      
      'NUMERO_BON_TRANSFERT'=>$request->num,
      'ID_DESIGNATION_OBJET'=>$id[$i],
      'QTE_TRANSFERT'=>$value[$i],




      ]);
   }


  // for($i=0;$i<count($id_array);$i++){

    //  Transferer::create([

      //  'NUMERO_BON_TRANSFERT'=>$request->num,
        //'ID_DESTINATION'=>$id_array[$i]


        //]);
    //}

     //for($i=0;$i<$nb_eng;$i++){

      //Transferer::create([

        //'NUMERO_BON_TRANSFERT'=>$request->num,
        //'ID_DESTINATION'=>$c+$nb_eng


        //]);
    //}
    //$num=Bon_de_transfert::count()+1;

      //$numeroref = substr_replace("000",$num, -strlen($num));

   $pdf= SnappyPdf::loadView('pages.Bon_Transfert.transfert',[

          'designation'=>$desi,
          'qte'=>$value,
          'ute'=>$list_ute,
          'tete'=>$request->tete,
          'objet'=>$request->objet,
          'commentaire'=>$request->commentaire,
          'lieu'=>$request->lieu,
          'provenance'=>$request->provenance,
          'destination'=>$request->destination,
          'num'=>$request->num,
          'j'=>date('j'),
          'm'=>$request->m,
          'y'=>date('Y')

]);
      return $pdf->download('transfert.pdf');
    }else{
      
     
      $pdf= SnappyPdf::loadView('pages.Bon_Transfert.transfert',[

          'designation'=>$desi,
          'qte'=>$value,
          'ute'=>$list_ute,
          'tete'=>$request->tete,
          'objet'=>$request->objet,
          'commentaire'=>$request->commentaire,
          'lieu'=>$request->lieu,
          'provenance'=>$request->provenance,
          'destination'=>$request->destination,
          'num'=>$request->num,
          'j'=>date('j'),
          'm'=>$request->m,
          'y'=>date('Y')

]);
      return $pdf->download('transfert.pdf');
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
