<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\createFournisseurFormRequest;
use App\Bon_Commande\Fournisseur;
use App\Bon_Commande\Bon_de_commande;

class FournisseurController extends Controller
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
        return view('pages.fournisseur.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(isset($_GET['motclef'])){
            dd($_GET['motclef']);
        }
        
        $url=$_SERVER['HTTP_REFERER'];
        $nb=$this->nb;
        return view('pages.fournisseur.create',[
                 
                 'nb'=>$nb,
                 'url'=>$url

            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createFournisseurFormRequest $request)
    {


      if($request->rep=="non"){
        
            return Redirect('/home');
             //dd($request->url); 
        }

        if($request->rep=="oui"){

        Flashy::message('Fournisseur enregistré', '#');
        return Redirect::route('fournisseur.create');

       }

      $deja=Fournisseur::where('NOM_FRS',$request->nom_fournisseur);
       if($deja->count()>0){

        session()->flash('message','Ce Fournisseur existe déja');

        
        return Redirect::route('fournisseur.create');
       } 

       $nb=$request->nb+1;

       $this->nb=$nb;
       
        $matri=$request->nom_fournisseur[0].$request->nom_fournisseur[1];
       
        $compt=Fournisseur::count()+1;
         
         Fournisseur::create([
        'MATRICULE_FRS' =>$matri.$compt,
        'NOM_FRS' => $request->nom_fournisseur,
        'TEL_FRS'=>$request->tel_fournisseur
        ]);

        Flashy::message('Fournisseur enregistré', '#');

        //if(is_null($request->nb_eng)){
          // $this->nb=$request->nb; 
        //}else{
          //  $this->nb=$request->nb_eng;
        //}

        
        
        //$this->nb=$this->nb-1;
        //if(($this->nb!=0)&&($this->nb!=-1)){
          //  return view('pages.fournisseur.create',['nb'=>$this->nb]);
        //}else{
          //  dd('oui');
        //}

       $url=$request->url;
        $nb=$this->nb;
        return view('pages.fournisseur.create',[
                 
                 'nb'=>$nb,
                 'url'=>$url

                 ]);

       // return Redirect::route('fournisseur.create');

       //return Redirect::back();
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
        $frs=Fournisseur::where('MATRICULE_FRS',$id)->first();

        return view('pages.fournisseur.edit',[

            'nom'=>$frs->NOM_FRS,
            'tel'=>$frs->TEL_FRS,
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
    public function update(createFournisseurFormRequest $request, $id)
    {
        $len=strlen($id);

        $matri="";
        for ($i=2; $i <$len ; $i++) { 
            
            $matri=$matri.$id[$i];
        }
        
        $frs=Fournisseur::where('MATRICULE_FRS',$id);
        $bon=Bon_de_commande::where('MATRICULE_FRS',$id);
        
       
        

        $frs->update([
            
            'MATRICULE_FRS'=>$request->nom_fournisseur[0].$request->nom_fournisseur[1].$matri,
            'NOM_FRS'=>$request->nom_fournisseur,
            'TEL_FRS'=>$request->tel_fournisseur   


                   ]);

        $bon->update([

            'MATRICULE_FRS'=>$request->nom_fournisseur[0].$request->nom_fournisseur[1].$matri

                   ]);
        Flashy::message('Modification effectuée');
        return Redirect()->route('fournisseur.index');
    }


    public function destroy_()
    {
      $id=$_GET['id'];

        $frs=Fournisseur::where('MATRICULE_FRS',$id);

        Flashy::error('Fournisseur supprimé');

        $frs->update([
          
          'estSupprimer'=>1

          ]);

        return Redirect()->route('fournisseur.index'); 
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
