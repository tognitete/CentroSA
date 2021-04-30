<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Bon_de_commande;
use App\Bon_Commande\Commander;
use App\Bon_Commande\Designation;
use App\Bon_Commande\Fournisseur;
use App\Http\Requests\ChoixFrsFormRequest;


class ComptaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bon=Bon_de_commande::selectRaw('bon_de_commandes.NUMERO_BON_COMMANDE,fournisseurs.NOM_FRS')
        //->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
        //->get();
        return view('pages.Compta.index');
    }

    public function choix_frs_paye(){

        $frs=Fournisseur::all();

         $bon=Bon_de_commande::select('OBJET')->distinct()->get();

        return view('pages.Compta.choix_frs_paye',[

            'frs'=>$frs,
            'bon'=>$bon

            ]);
    }

    public function choix_frs_impaye(){

        $frs=Fournisseur::all();

        $bon=Bon_de_commande::select('OBJET')->distinct()->get();

        

        return view('pages.Compta.choix_frs_impaye',[

            'frs'=>$frs,
            'bon'=>$bon

            ]);
    }

    public function post_choix_frs_paye(ChoixFrsFormRequest $request)
    {
        $id_bon=array();

        $tab_desi=array();

        $montant=array();

        $delais=array();

        $avance=array();

        

        $tab_cal=array();

        $observation=array();
        
      $frs=Fournisseur::Where('NOM_FRS',$request->frs)->first();
                     

                      

       if(!is_null($request->objet)){
       $info=Bon_de_commande::Where('MATRICULE_FRS',$frs->MATRICULE_FRS)
                            ->Where('OBJET',$request->objet) 
                            ->Where('TOTAL_FAIT',1)
                            ->get();
       }else{
   
       $info=Bon_de_commande::Where('MATRICULE_FRS',$frs->MATRICULE_FRS)
                            ->Where('TOTAL_FAIT',1)
                            ->get();

       }
       
     $tab_info=$info->toArray();

     

     for($i=0;$i<count($tab_info);$i++){

        $str=$i."";
        $id_bon=$id_bon+array($str => $tab_info[$i]['NUMERO_BON_COMMANDE'] );
     }


    for($j=0;$j<count($id_bon);$j++){
      
      $desi="";
      $com=Commander::Where('NUMERO_BON_COMMANDE',$id_bon[$j])->get();

      $com=$com->toArray();

      

      for($k=0;$k<count($com);$k++){

         $id=Designation::Where('ID_DESIGNATION_OBJET',$com[$k]['ID_DESIGNATION_OBJET'])->first();

         if($desi==""){

            $desi=$id->NOM_DESIGNATION_OBJET;
         }else{

         $desi=$desi.','.$id->NOM_DESIGNATION_OBJET;
     }
      }

        $str=$j."";
        $tab_desi=$tab_desi+array($str =>$desi);
      
    }

   
     for($i=0;$i<count($id_bon);$i++){
     

     $m=Bon_de_commande::Where('NUMERO_BON_COMMANDE',$id_bon[$i])->first();

       $str=$i."";
        $montant=$montant+array($str =>$m->MONTANT_TOTAL);

        $avance=$avance+array($str =>$m->TAUX_AVANCE);

        $delais=$delais+array($str =>$m->DELAIS);

        $observation=$observation+array($str=>$m->COMMENTAIRE);

        $cal=(($m->MONTANT_TOTAL)*($m->TAUX_AVANCE))/(100);

        $tab_cal=$tab_cal+array($str =>$cal);

     }

    
         return view('pages.Compta.paye',[
            
            'num'=>$id_bon,
            'desi'=>$tab_desi,
            'delais'=>$delais,
            'montant'=>$montant,
            'taux'=>$avance,
            'cal'=>$tab_cal,
            'observation'=>$observation,
            'frs'=>$request->frs

            ]);
    }


    public function post_choix_frs_impaye(ChoixFrsFormRequest $request)
    {
        $id_bon=array();

        $tab_desi=array();

        $montant=array();

        $avance=array();

        $delais=array();

        $tab_cal=array();

        $observation=array();
        
      $frs=Fournisseur::Where('NOM_FRS',$request->frs)->first();

      if(!is_null($request->objet)){
       $info=Bon_de_commande::Where('MATRICULE_FRS',$frs->MATRICULE_FRS)
                            ->Where('OBJET',$request->objet) 
                            ->Where('TOTAL_FAIT',0)
                            ->get();
       }else{
   
       $info=Bon_de_commande::Where('MATRICULE_FRS',$frs->MATRICULE_FRS)
                            ->Where('TOTAL_FAIT',0)
                            ->get();

       }
       
     $tab_info=$info->toArray();

     

     for($i=0;$i<count($tab_info);$i++){

        $str=$i."";
        $id_bon=$id_bon+array($str => $tab_info[$i]['NUMERO_BON_COMMANDE'] );
     }


    for($j=0;$j<count($id_bon);$j++){
      
      $desi="";
      $com=Commander::Where('NUMERO_BON_COMMANDE',$id_bon[$j])->get();

      $com=$com->toArray();

      

      for($k=0;$k<count($com);$k++){

         $id=Designation::Where('ID_DESIGNATION_OBJET',$com[$k]['ID_DESIGNATION_OBJET'])->first();

         if($desi==""){

            $desi=$id->NOM_DESIGNATION_OBJET;
         }else{

         $desi=$desi.','.$id->NOM_DESIGNATION_OBJET;
     }
      }


        $str=$j."";
        $tab_desi=$tab_desi+array($str =>$desi);
      
    }

   
     for($i=0;$i<count($id_bon);$i++){
     

     $m=Bon_de_commande::Where('NUMERO_BON_COMMANDE',$id_bon[$i])->first();

       $str=$i."";
        $montant=$montant+array($str =>$m->MONTANT_TOTAL);

        $avance=$avance+array($str =>$m->TAUX_AVANCE);

        $observation=$observation+array($str=>$m->COMMENTAIRE);

        $delais=$delais+array($str =>$m->DELAIS);

        $cal=(($m->MONTANT_TOTAL)*($m->TAUX_AVANCE))/(100);

        $tab_cal=$tab_cal+array($str =>$cal);

     }

    
         return view('pages.Compta.impaye',[
            
            'num'=>$id_bon,
            'desi'=>$tab_desi,
            'montant'=>$montant,
            'taux'=>$avance,
            'delais'=>$delais,
            'cal'=>$tab_cal,
            'observation'=>$observation,
            'frs'=>$request->frs

            ]);
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
        //dump($request->num);
        //dump($request->desi);
        //dump($request->montant);
        //dump($request->avance);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nom)
    {
        

      $matri=Fournisseur::Where('NOM_FRS',$nom)->first();

       $bon=Bon_de_commande::Where('MATRICULE_FRS',$matri->MATRICULE_FRS)
                           ->Where('TOTAL_FAIT',0)
                           ->get();

       return view('pages.Compta.show',[

          "bon"=>$bon,
          "nom"=>$nom

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
