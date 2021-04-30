<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Objet;
use App\Bon_Commande\Ute;
use App\Bon_Commande\Designation;
use App\Http\Requests\ChoixObjetRequest;
use App\Http\Requests\createBonTransfert;
use App\Bon_Commande\Lieu_ou_a_lieu_bon_commande;
use App\Bon_Transfert\Bon_de_transfert;
use App\Projet;
use App\Http\Requests\nb_destinationRequest;
use Flashy;

class BonTransfertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(nb_destinationRequest $request)
    {
         
        return Redirect()->route('BonTransfert.create',[

            'user'=>$request->user,
            'nb_d'=>$request->nb_d

          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choix_objet(){

       $objet=Objet::all();

        return view('pages.Bon_Transfert.choix_objet',compact('objet'));
    }

    public function nb_destinationT(){

       //$objet=Objet::all();

      if(isset($_GET['user'])){

         $user=$_GET['user'];
      }

        return view('pages.Bon_Transfert.nb_destinationT',compact('user'));
    }
    public function create()
    {
      $url=$_SERVER['HTTP_REFERER'];

      

        //if(isset($_GET['user'])){
 
          // $user=$_GET['user'];
        //}
       
      $prj=Projet::all();
      
        //$type_commande=Type_bon_de_commande::all();
        //$objet=Objet::all();
        
        //$id_objet=Objet::where('NOM_OBJET',$request->objet)
                 //  ->first();
       
       $list_designation=Designation::selectRaw('designations.NOM_DESIGNATION_OBJET,utes.DESIGNATION_UTE')
       //->where('ID_OBJET',$id_objet->ID_OBJET)
       ->Where('estSupprimer',0)
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->orderBy('designations.NOM_DESIGNATION_OBJET', 'ASC')
       ->get();

       $lieu=Lieu_ou_a_lieu_bon_commande::all();

       $num=Bon_de_transfert::count()+1;

      $numeroref = substr_replace("000",$num, -strlen($num));

        return view('pages.Bon_Transfert.create',[
                  
                  
                  //'objet'=>$request->objet,
                  'list_designation'=>$list_designation,
                  'url'=>$url,
                  //'user'=>$user,
                  //'nb_d'=>$request->nb_d,
                  'projet'=>$prj,
                  'lieu'=>$lieu,
                  'num'=>$numeroref,
                  'y'=>date('Y')

            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createBonTransfert $request)
    {
      
        $commentaire=nl2br($request->commentaire);

      $list_ute=array();
      $id = array();
      $destination=array();

      $compt=Designation::count();

      $quantite= explode(",",$request->quant,$compt);


    

      
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
      
      //dump($designation_selectionne);
      //dump($value);
      //dump($list_ute);

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
      //$num=Bon_de_transfert::count()+1;

      $numeroref = substr_replace("000",$request->num, -strlen($request->num));


      return view('pages.Bon_Transfert.voir_transfert',[

          'designation'=>$designation_selectionne,
          'qte'=>$quantite,
          'user'=>$request->user,
          'tete'=>$tete,
          'ute'=>$list_ute,
          'objet'=>$request->objet,
          'commentaire'=>$commentaire,
          'lieu'=>$request->lieu,
          'provenance'=>$request->provenance,
          'destination'=>$request->destination,
          'num'=>$numeroref,
          'j'=>date('j'),
          'm'=>$m,
          'y'=>date('Y')


        ]);
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
