<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Bon_Commande\Bon_de_commande;
use App\Bon_Commande\Commander;
use App\Bon_Commande\Designation;
use App\Bon_Commande\Fournisseur;
use App\Projet;
use Barryvdh\Snappy\Facades\SnappyPdf;

class RapportController extends Controller
{

    public function paye(){

        $frs=Fournisseur::all();

        return view('pages.Compta.choix_frs_paye',[

            'frs'=>$frs


            ]);
    }

    public function impaye(){

        $frs=Fournisseur::all();

        return view('pages.Compta.choix_frs_impaye',[

            'frs'=>$frs


            ]);
    }
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

        $list_ute=array();
        $prix_unit=array();
        $id=array();

        $quantite=array();

        $compt=Designation::count();
        $desi= explode(",",$request->desi,$compt);

        $l=0;

        for($m=0;$m<count($desi);$m++){

       $list=Designation::selectRaw('utes.DESIGNATION_UTE,designations.ID_DESIGNATION_OBJET')
       ->where('NOM_DESIGNATION_OBJET',$desi[$m])
       ->join('utes','utes.ID_UTE','=','designations.ID_UTE')
       ->first();

        $str=$l."";

        $list_ute=$list_ute+ array($str => $list->DESIGNATION_UTE);
        
        $id=$id+ array($str => $list->ID_DESIGNATION_OBJET);
        $l++;
      }
      $l=0;

        for($m=0;$m<count($id);$m++){

       $list=Commander::selectRaw('commanders.PRIX_UNIT')
       ->where('ID_DESIGNATION_OBJET',$id[$m])
       ->where('NUMERO_BON_COMMANDE',$request->num)
       ->first();

        $str=$l."";
        

        
        $prix_unit=$prix_unit+ array($str => $list->PRIX_UNIT);
        
        $l++;
      }
      

      $l=0;
      $v=0;  
        for ($i=0; $i < count($id) ; $i++) { 
            
            $qte=Commander::where('NUMERO_BON_COMMANDE',$request->num)->where('ID_DESIGNATION_OBJET',$id[$i])->first();

            

             $str=$l."";
             $v+=$qte->QTE_COMMANDE*$prix_unit[$i];

        $quantite=$quantite+ array($str => $qte->QTE_COMMANDE);
        
        $l++;
        }

      
        
          $bon=Bon_de_commande::selectRaw('fournisseurs.NOM_FRS')
                              ->where('NUMERO_BON_COMMANDE',$request->num)
                              ->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                              ->first();

          $id_projet=Bon_de_commande::where('NUMERO_BON_COMMANDE',$request->num)->first();


          $destination=Projet::where('ID_PROJET',$id_projet->ID_PROJET)->first();    

                         
        

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

      
        $pdf= SnappyPdf::loadView('pages.rapport.impaye',[

         'num'=>$request->num,
         'desi'=>$desi,
         'prix'=>$prix_unit,
         'statut'=>$request->statut,
         'delais'=>$request->delais,
         'frs'=>$bon->NOM_FRS,
         'commentaire'=>$request->observation,
         'destination'=>$destination->DESIGNATION_PROJET,
         'avance'=>$request->avance,
         'montant'=>$request->montant,
         'qte'=>$quantite,
         'cal'=>$request->cal,
         'ute'=>$list_ute,
         'jd'=>$j,
         'j'=>date('j'),
         'm'=>$m,
         'y'=>date('Y')


]);
      return $pdf->download('rapport.pdf');

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
