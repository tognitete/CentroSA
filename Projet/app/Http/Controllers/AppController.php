<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AppFormRequest;
use App\Http\Requests\CreateUserFormRequest;
use Illuminate\Support\Facades\Redirect;
use MercurySeries\Flashy\Flashy;
use App\Bon_Commande\Designation;
use App\User;
use Hash;

class AppController extends Controller
{
   

     public function __construct()
    {
         $this->user="";
         $this->nb=0;
    }
    public function login(){

         //$cryp=Hash::make('secret');
        //if( Hash::check('secret',$cryp)){

         //   dd('oui');
       // }else{
         //   dd('non');
        //}

        return view('login');
    }


    public function Acueil(){


        $user=session()->get('user');

        if(isset($_GET['user'])){

        if(is_null($user)){

            $user=$_GET['user'];
        }
         }
        return view('welcome',[

           'user'=>$user,
            ]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $pwd=Utilisateur::Where('NOM_UTILISATEUR',$request->utilisateur)->first();


       $utilisateur=Utilisateur::Where('NOM_UTILISATEUR',$request->utilisateur)
                               ->get();
         if(($utilisateur->count()>0)&&(Hash::check($request->mdp,$pwd->MOTDEPASSE))){

            $this->user=$request->utilisateur;

            return view('welcome',[
              'user'=>$request->utilisateur,

                ]);
         }else{  

          Flashy::error('Utilisateur ou mot de passe incorrects'); 

           return back();
         
     }
    }

    public function search()
    {
     // $d=Designation::all();
        return view('recherche');
    }

    //public function enter(AppFormRequest $request)
    //{
      //  if($request->besoin == 'BESOIN APPRO'){

        //     return Redirect()->route('BesoinAppro.index');
        //}
        //if($request->besoin == 'BESOIN LOGISTIQUE'){

          //  return view('pages.BESOIN_LOGISTIQUE.index');
    //}
//}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(session()->get('user'));
        

        

        return view('pages.App.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserFormRequest $request)
    {
        //dd(Hash::make($request->mdp));

        
        
        $deja=User::where('name',$request->utilisateur);
       if($deja->count()>0){

        
        //Flashy::error(' Cette Designation existe déja ', '#');

        session()->flash('message','Cet Utilisateur existe déja');

        
        return Redirect('/Users');
       } 

        $count=User::count();

        $count++;

        User::create([

          
          'name'=>$request->utilisateur,
          'password'=>bcrypt($request->mdp)



            ]);
     //Flashy::message('Utilisateur Créé');

        session()->flash('message','Cet Utilisateur a été enrégistré');

       
        return back();


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
