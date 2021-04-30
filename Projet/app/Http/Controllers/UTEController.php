<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Ute;
use Illuminate\Support\Facades\Redirect;
use MercurySeries\Flashy\Flashy;
use App\Http\Requests\createUTEFormRequest;

class UTEController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nb=$this->nb;
        $url=$_SERVER['HTTP_REFERER'];

        return view('pages.UTE.create',[

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
    public function store(createUTEFormRequest $request)
    {
         if($request->rep=="non"){
        
            return Redirect()->route('DesignationObjet.create');
             //dd($request->url); 
        }

        if($request->rep=="oui"){

        Flashy::message('UTE enregistré', '#');
        return Redirect::route('ute.create');

       }


        $deja=Ute::where('DESIGNATION_UTE',$request->designation_ute);
       if($deja->count()>0){

        session()->flash('message','Cette UTE existe déja');

        
        return Redirect::route('ute.create');
       } 

       $nb=$request->nb+1;

       $this->nb=$nb;

        Ute::create([
        
        'DESIGNATION_UTE' => $request->designation_ute,
        
        ]);
        Flashy::message('UTE enregistrée', '#');


        //if(is_null($request->nb_eng)){
          // $this->nb=$request->nb; 
        //}else{
          //  $this->nb=$request->nb_eng;
        //}

        
        
        //$this->nb=$this->nb-1;
        //if(($this->nb!=0)&&($this->nb!=-1)){
          //  return view('pages.ute.create',['nb'=>$this->nb]);
        //}else{
          //  dd('oui');
        //}

        //return Redirect($request->url);

        $nb=$this->nb;
        $url=$request->url;

        return view('pages.UTE.create',[

          'nb'=>$nb,
          'url'=>$url

            ]);


        //return Redirect::route('objet.create');
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
    public function update(createUTEFormRequest $request, $id)
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
