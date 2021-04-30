<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Type_bon_de_commande;
use App\Bon_Commande\Objet;
use App\Bon_Commande\Ute;
use App\Bon_Commande\Fournisseur;
use App\Bon_Commande\Commander;
use App\Bon_Commande\Designation;
use App\Bon_Commande\Lieu_ou_a_lieu_bon_commande;
use App\Http\Requests\createBonCommande;
use App\Http\Requests\nb_destinationRequest;
//use PDF;
use Barryvdh\Snappy\Facades\SnappyPdf;
use App\Bon_Commande\Bon_de_commande;
use App\Projet;
use Flashy;
class BonCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(nb_destinationRequest $request)
    {
         
        return Redirect()->route('BonCommande.create',[

            'user'=>$request->user,
            'nb_d'=>$request->nb_d

          ]);
    }


    public function creer(createBonCommande $request)
    {
        dd('oui');
    }




    public function nb_destinationB(){

       //$objet=Objet::all();

      if(isset($_GET['user'])){

         $user=$_GET['user'];
      }

        return view('pages.Bon_Commande.nb_destinationB',compact('user'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  


    public function create()
    {

        $url=$_SERVER['HTTP_REFERER'];

        

        
        
        
        $prj=Projet::all();

      
        

        if(isset($_GET['user'])){
 
           $user=$_GET['user'];
        }

        $type_commande=Type_bon_de_commande::all();
        //$objet=Objet::all();
        
        //$id_objet=Objet::where('NOM_OBJET',$request->objet)
            //       ->first();
       
       $list_designation=Designation::selectRaw('designations.NOM_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
       ->Where('estSupprimer',0)
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->orderBy('designations.NOM_DESIGNATION_OBJET', 'ASC')
       ->get();

       $fournisseur=Fournisseur::all();

       $lieu=Lieu_ou_a_lieu_bon_commande::all();


       $num=Bon_de_commande::count()+1;

      $numeroref = substr_replace("000",$num, -strlen($num));

         if(isset($user)){
        return view('pages.Bon_Commande.create',[
                  
                  'type_commande'=>$type_commande,
                  //'objet'=>$request->objet,
                  'list_designation'=>$list_designation,
                  'url'=>$url,
                  'projet'=>$prj,
                  'fournisseur'=>$fournisseur,
                  'lieu'=>$lieu,
                  'user'=>$user,
                  'num'=>$numeroref,
                  'y'=>date('Y')
                  

            ]);
      }else{
            
             return view('pages.Bon_Commande.create',[
                  
                  'type_commande'=>$type_commande,
                  //'objet'=>$request->objet,
                  'list_designation'=>$list_designation,
                  'url'=>$url,
                  'projet'=>$prj,
                  'fournisseur'=>$fournisseur,
                  'lieu'=>$lieu,
                  //'user'=>$user,
                  'num'=>$numeroref,
                  'y'=>date('Y')
                  

            ]);

      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createBonCommande $request)
    {
      
      $commentaire=nl2br($request->commentaire);

        //$tab = array();
        //$value= array();
        
        //$designation_selectionne= array();
        
        //$tab= $tab+array('2' => "oui2" );
        //$tab=$tab+"1";
        //$tab=$tab+"2";

      //$ph="1,2,3,4,5,6";

       //$arr = explode(",", $ph,23);

       //dd($arr);
       //$id_objet=Objet::where('NOM_OBJET',$request->objet)
                   //->first();
       
       //$list_designation=Designation::selectRaw('designations.NOM_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
       //->where('ID_OBJET',$id_objet->ID_OBJET)
       //->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       //->get();
       
       //$list=$list_designation->toArray();

      
      $list_ute=array();
      $id = array();

      $destination = array();


      $compt=Designation::count();

      $quantite= explode(",",$request->quant,$compt);


     $unit= explode(",",$request->unit,$compt);

     $montant=0;

     for($i=0;$i<count($unit);$i++){

      $montant+=($unit[$i]*$quantite[$i]);
     }

      $un="";
      for($i=0;$i<count($unit);$i++){

        if($un==""){

          $un= $unit[$i];
        }else{

          $un=$un.",".$unit[$i];
        }

      }      
      $designation_selectionne= explode(",",$request->desig,$compt) ;

      //$l=0;
      //for ($i=0; $i <= $request->nb_d; $i++) { 

        //  $name="destination".$i;

         //if(!is_null($request->$name)){

          //$str=$l."";

          //$destination=$destination+ array($str => $request->$name);
          //$l++;
        //}
      //}

  
      

      $l=0;
      $tete="";
      for($m=0;$m<count($designation_selectionne);$m++){
    
       $tete=$tete."/".mb_substr($designation_selectionne[$m],0,2,'UTF-8');

       $list=Designation::selectRaw('utes.DESIGNATION_UTE,designations.ID_DESIGNATION_OBJET')
       ->where('NOM_DESIGNATION_OBJET',$designation_selectionne[$m])
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->first();

        $str=$l."";

        $list_ute=$list_ute+ array($str => $list->DESIGNATION_UTE);
        $id=$id+ array($str => $list->ID_DESIGNATION_OBJET);
        $l++;
      }
      
     $tete=mb_strtoupper($tete,'UTF-8');

    

       $m=date('F');
      $j=date('l');

      if($j=="Monday"){
        $j="Lundi";
      }elseif ($j=="Tuesday") {
        $j="Mardi";
      }elseif ($j=="Wednesday") {
        $j="Mercredi";
      }elseif ($j=="Thursday") {
        $j="Jeudi";
      }elseif ($j=="Friday") {
        $j="Vendredi";
      }elseif ($j=="Saturday") {
        $j="Samedi";
      }elseif ($j=="Sunday") {
        $j="Dimanche";
      }else{

      }

      if($m=="January"){
        $m="Janvier";
      }elseif ($m=="February") {
        $m="Février";
        
      }elseif ($m=="March") {
         $m="Mars";
        
      }elseif ($m=="April") {
         $m="Avril";
        
      }elseif ($m=="May") {
         $m="Mai";
        
      }elseif ($m=="June") {
         $m="Juin";
        
      }elseif ($m=="July") {
         $m="Juillet";
        
      }elseif ($m=="August") {
         $m="Août";
        
      }elseif ($m=="September") {
         $m="Septembre";
        
      }elseif ($m=="October") {
         $m="Octobre";
        
      }elseif ($m=="November") {
         $m="Novembre";
        
      }elseif ($m=="December") {
         $m="Decembre";
        
      }else {
        
      }
      //$num=Bon_de_commande::count()+1;



      $numeroref = substr_replace("000",$request->num, -strlen($request->num));
      
      if(is_null($request->taux_avance)){

        $taux_avance=0;

      }else{
         $taux_avance=$request->taux_avance;

      }

      return view('pages.Bon_Commande.voir_commande',[

          'designation'=>$designation_selectionne,
          'qte'=>$quantite,
          'ute'=>$list_ute,
          'commentaire'=>$commentaire,
          'tete'=>$tete,
          'lieu'=>$request->lieu,
          'objet'=>$request->objet,
          'fournisseur'=>$request->nom_fournisseur,
          'destination'=>$request->destination,
          'typ_cmde'=>$request->typ_cmde,
          'taux_avance'=>$taux_avance,
          'delais'=>$request->delais,
          'montant'=>$montant,
          'type_commande'=>$request->type_commande,
          'user'=>$request->user,
          'unit'=>$un,
          'num'=>$numeroref,
          'j'=>date('j'),
          'm'=>$m,
          'y'=>date('Y')


        ]);

      
      
      //return view('pages.Bon_Commande.commande');
      //dd($designation_selectionne);
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $desi = array();
        $info_bon=Bon_de_commande::Where('NUMERO_BON_COMMANDE',$id)->first();
        
        $designation=Commander::Where('NUMERO_BON_COMMANDE',$id)->get();



        $designation=$designation->toArray();
        
        for($i=0;$i<count($designation);$i++){

            $d=Designation::Where('ID_DESIGNATION_OBJET',$designation[$i]['ID_DESIGNATION_OBJET'])->first();
            $str=$i."";
            $desi=$desi+array($str=>$d->NOM_DESIGNATION_OBJET);

            $cal=(($info_bon->MONTANT_TOTAL)*($info_bon->TAUX_AVANCE))/(100);

            
      }

        return view('pages.Bon_Commande.show_',[

         'info'=>$info_bon,
         'num'=>$id,
         'desi'=>$desi,
         "cal"=>$cal

            ]);
    
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
