<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Bon_de_commande;
use App\Bon_Commande\Commander;
use App\Bon_Commande\Designation;
use App\Bon_Commande\Fournisseur;
use App\Comptabilite\Facture;
use Illuminate\Support\Facades\Redirect;
use MercurySeries\Flashy\Flashy;
use App\Http\Requests\createFactureAvanceFormRequest;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bon=Bon_de_commande::all();

        $info=$bon->toArray();

        $montant=array();

        for ($i=0; $i <count($info) ; $i++) { 
            
            $str=$i."";
            $montant=$montant+array($str=>$info[$i]['MONTANT_TOTAL']);
        }
        return view('pages.Facture.index',[
           
           'bon'=>$bon,
           'montant'=>$montant,


            ]);
    }

    

    public function confirm(){

        return view('confirm');
    }

     public function indexAvec()
     {

        $date=$_GET['date'];

       
        $num=$_GET['num'];

        $objet=$_GET['objet'];

        $montant=$_GET['montant'];

        $avance=$_GET['avance'];

        $delais=$_GET['delais'];

        $id=$_GET['id'];



        

 return view('pages.Facture.indexAvec',[
    
        

        'date'=>$date,
        'num'=>$num,
        'montant'=>$montant,
        'avance'=>$avance,
        'objet'=>$objet,
        'delais'=>$delais,
        'id'=>$id

    ]);
    

    }

      public function indexSans()
    {
        $num=$_GET['num'];

        $avance=$_GET['avance'];

        $objet=$_GET['objet'];

        $montant=$_GET['montant'];

        $date=$_GET['date'];

        $delais=$_GET['delais'];

        $id=$_GET['id'];

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
      
        
        if(($jd==date('d'))&&($m==date('m'))&&($a==date('Y'))){

            $now=true;
        }else if(($m<=date('m'))&&($a<=date('Y'))){

            $now=true;
        }else{

            $now=false;
        }
        
        return view('pages.Facture.indexSans',[
             
             'num'=>$num,
             'avance'=>$avance,
             'montant'=>$montant,
             'avance'=>$avance,
             'objet'=>$objet,
             'delais'=>$delais,
             'now'=>$now,
             'date'=>$date,
             'j'=>$j,
             'm'=>$m,
             'y'=>date('y'),
             'id'=>$id


            ]);
    }

    public function SAFAVANCE(){

        $num=$_GET['num'];

        $avance=$_GET['avance'];

        $id=$_GET['id'];

        $objet=$_GET['objet'];

        $fait=Bon_de_Commande::where('NUMERO_BON_COMMANDE',$num)->first();



        return view('pages.Facture.SAFAVANCE',[
           
           
           'avance'=>$avance,
           'num'=>$num,
           'objet'=>$objet,
           'id'=>$id,
           'avance_fait'=>$fait->AVANCE_FAIT

            ]);

    }

    public function SFSOLDE(){

         
         $date=$_GET['date'];

        $montant=$_GET['montant'];

        $num=$_GET['num'];

        $objet=$_GET['objet'];

        $avance=$_GET['avance'];

        $delais=$_GET['delais'];

        $id=$_GET['id'];

        $reste=$montant-$avance;

    $fait=Bon_de_Commande::where('NUMERO_BON_COMMANDE',$num)->first();
        

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

        

        if(($m>28)&&($m==2)){
            $jd=1;
            $m=3;
        }
      
        
        if(($jd==date('d'))&&($m==date('m'))&&($a==date('Y'))){

            $now=true;
        }else if(($m<=date('m'))&&($a<=date('Y'))){

            $now=true;
        }else{

            $now=false;
        }

        $d=$j;

        

        return view('pages.Facture.SFSOLDE',[

            'now'=>$now,
             'j'=>$jd,
             'm'=>$m,
             'y'=>date('Y'),
             'd'=>$d,
             'date'=>$date,
             'montant'=>$montant,
             'objet'=>$objet,
             'delais'=>$delais,
             'num'=>$num,
             'avance'=>$avance,
             'reste'=>$reste,
             'id'=>$id,
             'total_fait'=>$fait->TOTAL_FAIT


            ]);

    }

      public function FSOLDE()
    {
        $date=$_GET['date'];

        $montant=$_GET['montant'];

        $num=$_GET['num'];

        $avance=$_GET['avance'];

        $delais=$_GET['delais'];

        $reste=$montant-$avance;

        $nom=Bon_de_commande::selectRaw('fournisseurs.NOM_FRS')
       ->where('Bon_de_commandes.NUMERO_BON_COMMANDE',$num)
       ->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','Bon_de_commandes.MATRICULE_FRS')
       ->first();

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
        if(($jd>28)&&($m=2)){
            $jd=1;
            $m=3;
        }
      
        
        if(($jd==date('d'))&&($m==date('m'))&&($a==date('Y'))){

            $now=true;
        }else if(($m<=date('m'))&&($a<=date('Y'))){

            $now=true;
        }else{

            $now=false;
        }

        $d=$j;

        
        return view('pages.Facture.FSOLDE',[
          
             'now'=>$now,
             'j'=>$j,
             'm'=>$m,
             'y'=>date('Y'),
             'd'=>$d,
             'montant'=>$montant,
             'nom'=>$nom->NOM_FRS,
             'avance'=>$avance,
             'reste'=>$reste


            ]);
    }

    public function AFAVANCE()
    {

         $num=$_GET['num'];

        $avance=$_GET['avance'];



       

        $nom=Bon_de_commande::selectRaw('fournisseurs.NOM_FRS')
       ->where('Bon_de_commandes.NUMERO_BON_COMMANDE',$num)
       ->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','Bon_de_commandes.MATRICULE_FRS')
       ->first();


        return view('pages.Facture.AFAVANCE',[

             'j'=>date('d'),
             'm'=>date('m'),
             'y'=>date('Y'),
             'avance'=>$avance,
             'nom'=>$nom->NOM_FRS

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

    public function store_AVANCE(createFactureAvanceFormRequest  $request)
    {
        if(($request->date_reception>date("Y-m-d"))||($request->date_facture>date("Y-m-d"))){

             $num=$request->num;

          $avance=$request->avance;

          $id=$request->id;

          $fait=Bon_de_Commande::where('OBJET',$request->objet)->first();



         
         Flashy::error('les dates sont incorrectes', '#');

        return view('pages.Facture.SAFAVANCE',[
           
           
           'avance'=>$avance,
           'num'=>$num,
           'objet'=>$request->objet,
           'id'=>$id,
           'avance_fait'=>$fait->AVANCE_FAIT

            ]);


        }
        if($request->date_facture>$request->date_reception){

          $num=$request->num;

          $avance=$request->avance;

          $id=$request->id;

          
          $fait=Bon_de_Commande::where('OBJET',$request->objet)->first();
         
         Flashy::error('les dates sont incorrectes', '#');

        return view('pages.Facture.SAFAVANCE',[
           
           
           'avance'=>$avance,
           'num'=>$num,
           'objet'=>$request->objet,
           'id'=>$id,
           'avance_fait'=>$fait->AVANCE_FAIT

            ]);
        }

        //$arr = explode("/",$request->date_facture, 3);
        //$j1= $arr[2];
        //$m1= $arr[1];
        //$a1= $arr[0];


        //$arr = explode("/", $request->date_reception, 3);
        //$j2= $arr[2];
        //$m2= $arr[1];
        //$a2= $arr[0];

        //if(($j1<=$j2) && ($m1<=$m2) && ($a1<=$a2)){

         //dd('oui');

        //}


        //if(($j<=date('d')) && ($m<=date('m') && ($a<=date('y'))){


        //}

        $num=$request->num_facture;

        $nom=Bon_de_commande::selectRaw('fournisseurs.NOM_FRS')
       ->where('Bon_de_commandes.NUMERO_BON_COMMANDE',$request->num)
       ->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','Bon_de_commandes.MATRICULE_FRS')
       ->first();

       $avance=$request->avance;

      $exis=Facture::where('NUMERO_FACTURE',$request->num_facture)->Where('NUMERO_BON_COMMANDE',$request->num)->get();

       if($exis->count()==0){


       Facture::create([

          'ID_TYPE_FACTURE'=>$request->id,
          'ID_CATEGORIE_FACTURE'=>1,
          'NUMERO_BON_COMMANDE'=>$request->num,
          'NUMERO_FACTURE'=>$request->num_facture,
          'OBJET_FACTURE'=>$request->objet,
          'DATE_FACTURE'=>$request->date_facture,
          'DATE_RECEPTION_FACTURE'=>$request->date_reception



        ]);



      Flashy::message('Facture Enregistree');

      $bon=Bon_de_commande::where('NUMERO_BON_COMMANDE',$request->num);

      $bon->update([
         
         'AVANCE_FAIT'=>1

        ]);

      return view('pages.Facture.AFAVANCE',[

             'j'=>date('d'),
             'm'=>date('m'),
             'y'=>date('Y'),
             'avance'=>$avance,
             'nom'=>$nom->NOM_FRS,
             'num'=>$num,
             'objet'=>$request->objet

            ]);
  }else{
      
       $num=$request->num;

       $avance=$request->avance;
   
    Flashy::error('Cette facture a été déja émise', '#');

        return view('pages.Facture.SAFAVANCE',[
           
           
           'avance'=>$avance,
           'num'=>$num,
           'objet'=>$request->objet,

            ]);


  }
    }

     public function store_SOLDE(Request $request)
    {
       if($request->date_facture>$request->date_reception){

          $num=$request->num;

          $avance=$request->avance;

          $montant=$request->montant;

          $date=$request->date;

          
         

            



       
         
         Flashy::error('les dates sont incorrectes', '#');

        return Redirect::back();


        }
       
        $date=$request->date;

        $montant=$request->montant;

        $num=$request->num_facture;

        $avance=$request->avance;

        $reste=$montant-$avance;

        $nom=Bon_de_commande::selectRaw('fournisseurs.NOM_FRS')
       ->where('Bon_de_commandes.NUMERO_BON_COMMANDE',$request->num)
       ->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','Bon_de_commandes.MATRICULE_FRS')
       ->first();

          if($request->id==2){
            $id=2;
          }else{
            $id=1;
          }

        
        Facture::create([

          'ID_TYPE_FACTURE'=>$id,
          'ID_CATEGORIE_FACTURE'=>2,
          'NUMERO_BON_COMMANDE'=>$request->num,
          'NUMERO_FACTURE'=>$request->num_facture,
          'OBJET_FACTURE'=>$request->objet,
          'DATE_FACTURE'=>$request->date_facture,
          'DATE_RECEPTION_FACTURE'=>$request->date_reception

          ]);

        Flashy::message('Facture Enregistree');

       $bon=Bon_de_commande::where('NUMERO_BON_COMMANDE',$request->num);

      $bon->update([
         
         'TOTAL_FAIT'=>1

        ]);

        return view('pages.Facture.FSOLDE',[


           
             'j'=>date('d'),
             'm'=>date('m'),
             'y'=>date('Y'),
             'montant'=>$montant,
             'nom'=>$nom->NOM_FRS,
             'avance'=>$avance,
             'reste'=>$reste,
             'num'=>$num


            ]);

    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if($id!="---"){
      $num=Facture::where('ID_FACTURE',$id)
                  ->first();


      
    $nom=Bon_de_commande::selectRaw('fournisseurs.NOM_FRS,bon_de_commandes.TAUX_AVANCE,bon_de_commandes.MONTANT_TOTAL')
                         ->where('NUMERO_BON_COMMANDE',$num->NUMERO_BON_COMMANDE)
                         ->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                         ->first();
    //dd($num->NUMERO_BON_COMMANDE);                     

     $cal=(($nom->MONTANT_TOTAL*$nom->TAUX_AVANCE)/100);                    
                  
      return view('pages.Facture.show',[

          'num'=>$num->NUMERO_FACTURE,
          'nom'=>$nom->NOM_FRS,
          'objet'=>$num->OBJET_FACTURE,
          'avance'=>$cal,
          'date'=>substr($num->created_at, 0, 10)
               ]); 
      }else{

       $alert="Pas d'informations";

       return view('pages.Facture.show',[

         'alert'=>$alert
        ]);
      }

    }

     public function show_()
    {
        $id=$_GET['id'];


        if($id!="---"){
      $num=Facture::where('ID_FACTURE',$id)
                  ->first();


      
    $nom=Bon_de_commande::selectRaw('fournisseurs.NOM_FRS,bon_de_commandes.TAUX_AVANCE,bon_de_commandes.MONTANT_TOTAL')
                         ->where('NUMERO_BON_COMMANDE',$num->NUMERO_BON_COMMANDE)
                         ->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                         ->first();
    //dd($num->NUMERO_BON_COMMANDE);                     

     $cal=(($nom->MONTANT_TOTAL*$nom->TAUX_AVANCE)/100);                    
                  
      return view('pages.Facture.show_',[

          'num'=>$num->NUMERO_FACTURE,
          'nom'=>$nom->NOM_FRS,
          'montant'=>$nom->MONTANT_TOTAL,
          'objet'=>$num->OBJET_FACTURE,
          'avance'=>$cal,
          'date'=>substr($num->created_at, 0, 10)
               ]); 
      }else{

       $alert="Pas d'informations";

       return view('pages.Facture.show_',[

         'alert'=>$alert
        ]);
      }
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
