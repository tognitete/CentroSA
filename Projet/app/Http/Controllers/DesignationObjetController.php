<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Objet;
use App\Bon_Commande\Ute;
use App\Bon_Commande\Designation;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\createDesignationFormRequest;

class DesignationObjetController extends Controller
{
    public function __construct()
    {
         $this->nb=0;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('pages.designation_objet.index');
    }

    public function info()
    {
      $art=$_GET['art'];

      $info=Designation::selectRaw('fournisseurs.NOM_FRS,commanders.PRIX_UNIT')
                          ->Where('designations.NOM_DESIGNATION_OBJET',$art)
                          ->join('commanders','designations.ID_DESIGNATION_OBJET','=','commanders.ID_DESIGNATION_OBJET')
                          ->join('bon_de_commandes','commanders.NUMERO_BON_COMMANDE','bon_de_commandes.NUMERO_BON_COMMANDE')
                          ->join('fournisseurs','fournisseurs.MATRICULE_FRS','=','bon_de_commandes.MATRICULE_FRS')
                          ->distinct()
                          ->get();



       return view('pages.designation_objet.info',[

         'art'=>$art,
         'info'=>$info

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // dd($request->url());

       $nb=$this->nb;
       $url=$_SERVER['HTTP_REFERER'];

        $ute=Ute::all();
        //$ute=$ute->toJson();

        
            //$nb=$this->nb;
        
        $objet=Objet::all();

        return view('pages.designation_objet.create',[
                           'objet'=>$objet,
                           'ute'=>$ute,
                           'url'=>$url,
                           'nb'=>$nb
                                                 ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createDesignationFormRequest $request)
    {
        
      

        if($request->rep=="non"){
        
            return Redirect('/home');
             //dd($request->url); 
        }

        if($request->rep=="oui"){

        Flashy::message('Objet enregistré', '#');
        return Redirect::route('DesignationObjet.create');

       }

       
       
       $deja=Designation::where('NOM_DESIGNATION_OBJET',$request->designation_objet);
       if($deja->count()>0){

        
        //Flashy::error(' Cette Designation existe déja ', '#');

        session()->flash('message','Cet Article existe déja');

        
        return Redirect::route('DesignationObjet.create');
       } 
 $nb=$request->nb+1;

       $this->nb=$nb;
       
      $id_ute=Ute::Where('DESIGNATION_UTE',$request->designation_ute)
                   ->first();
     
      

        Designation::create([
        'NOM_DESIGNATION_OBJET' => $request->designation_objet,   
        'ID_UTE' =>$id_ute->ID_UTE,
        
        
        
        ]);
        Flashy::message('Designation enregistré', '#');
        

       // if(is_null($request->nb_eng)){
         //  $this->nb=$request->nb; 
        //}else{
          //  $this->nb=$request->nb_eng;
        //}

        
        
        //$this->nb=$this->nb-1;
         
        //$ute=Ute::all();


          //if(($this->nb!=0)&&($this->nb!=-1)){
          //  return view('pages.objet.create',[
            //       'nb'=>$this->nb,
              //     'ute'=>$ute
               //                             ]);
        //}else{
          //  dd('oui');
        //}
        $nb=$this->nb;
       $url=$request->url;

        $ute=Ute::all();

        $objet=Objet::all();


     return view('pages.designation_objet.create',[
                           'objet'=>$objet,
                           'ute'=>$ute,
                           'url'=>$url,
                           'nb'=>$this->nb
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

        $desi=Designation::where('ID_DESIGNATION_OBJET',$id)->get();

        $tab=$desi->toArray();


       $desi=Designation::where('ID_DESIGNATION_OBJET',$id)->first();

        $lib_ute=Ute::where('ID_UTE',$tab[0]['ID_UTE'])->first();

        $ute=Ute::all();



        return view('pages.designation_objet.edit',[

           'desi'=>$desi->NOM_DESIGNATION_OBJET,
           'ute'=>$ute,
           'lib_ute'=>$lib_ute->DESIGNATION_UTE,
           'id'=>$id


          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createDesignationFormRequest $request, $id)
    {
         $desi=Designation::where('ID_DESIGNATION_OBJET',$id);

         $id_ute=Ute::where('DESIGNATION_UTE',$request->designation_ute)->first();

         

      $desi->update([
         
         'NOM_DESIGNATION_OBJET'=>$request->designation_objet,
         'ID_UTE'=>$id_ute->ID_UTE

        ]);

      Flashy::message('Article modifié'); 

      return view('pages.designation_objet.index');
    }

   public function destroy_()
    {
      $id=$_GET['id'];
        $desi=Designation::where('ID_DESIGNATION_OBJET',$id);

        Flashy::error('Article supprimé');

        $desi->update([
          
          'estSupprimer'=>1

          ]);

        return Redirect()->route('DesignationObjet.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}


