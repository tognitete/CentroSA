<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon_Commande\Lieu_ou_a_lieu_bon_commande;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\createLieuFormRequest;

class LieuController extends Controller
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
        $url=$_SERVER['HTTP_REFERER'];
        $nb=$this->nb;
        return view('pages.lieu.create',[

            
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
    public function store(createLieuFormRequest $request)
    {
       if($request->rep=="non"){
        
            return Redirect('/home');
             //dd($request->url); 
        }

        if($request->rep=="oui"){

        Flashy::message('Lieu enregistré', '#');
        return Redirect::route('Lieu_ou_a_lieu_bon_commande.create');

       }

        $deja=Lieu_ou_a_lieu_bon_commande::where('DESIGNATION_LIEU',$request->designation_lieu);
       if($deja->count()>0){

        session()->flash('message','Ce Lieu est déja enregistré');

        
        return Redirect::route('lieu.create');
       } 

       $nb=$request->nb+1;

       $this->nb=$nb;

        Lieu_ou_a_lieu_bon_commande::create([

            'DESIGNATION_LIEU' => $request->designation_lieu

        ]);
        Flashy::message('Lieu enregistré', '#');


        $url=$request->url;
        $nb=$this->nb;
        return view('pages.lieu.create',[

            
                 'nb'=>$nb,
                 'url'=>$url
            ]);
        //return Redirect($request->url);

       
        //if(is_null($request->nb_eng)){
          // $this->nb=$request->nb; 
        //}else{
          //  $this->nb=$request->nb_eng;
        //}

        
        
        //$this->nb=$this->nb-1;
        //if(($this->nb!=0)&&($this->nb!=-1)){
          //  return view('pages.lieu.create',['nb'=>$this->nb]);
        //}else{
          //  dd('oui');
        //}

        

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createLieuFormRequest $request, $id)
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
