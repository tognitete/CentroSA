<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Objet;
use App\Bon_Commande\Ute;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\createObjetFormRequest;

class ObjetController extends Controller
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
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$ute=Ute::all();
        //$ute=$ute->toJson();

        
            $nb=$this->nb;
        $url=$_SERVER['HTTP_REFERER'];
        

        return view('pages.objet.create',[
       
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
    public function store(createObjetFormRequest $request)
    {
        if($request->rep=="non"){
        
            return Redirect('/choix_objet');
        }

        if($request->rep=="oui"){

        Flashy::message('Objet enregistré', '#');
        return Redirect::route('objet.create');

       }
       
       $nb=$request->nb+1;

       $this->nb=$nb;
        //dd($request->rep);

       
       
       $deja=Objet::where('NOM_OBJET',$request->nom_objet);
       if($deja->count()>0){

        Flashy::error(' Cet Objet existe déja ', '#');

        
        return Redirect::route('objet.create');
       } 

      
      
                  
        Objet::create([

        'NOM_OBJET' => $request->nom_objet
        
        ]);
       

       Flashy::message('Objet enregistré', '#');

       return view('pages.objet.create',[

            'nb'=>$this->nb


        ]);
        //return Redirect($request->url);
        

        //if(is_null($request->nb_eng)){
          // $this->nb=$request->nb; 
        //}else{
          //  $this->nb=$request->nb_eng;
        //}

        
        
        //$this->nb=$this->nb-1;
         
        //$ute=Ute::all();
        

        //if(($this->nb!=0)&&($this->nb!=-1)){
           // return view('pages.objet.create',[
             //      'nb'=>$this->nb,
               //    'ute'=>$ute
                                           // ]);
        //}else{
          //  dd('oui');
        //}
        
        

        
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
    public function update(createObjetFormRequest $request, $id)
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
