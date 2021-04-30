<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserFormRequest;
use App\Http\Requests\AttributeDroitFormRequest;
use App\User;
use App\Role;
use App\Division;
use Auth;
use Flashy; 
use Session;
use Crypt;

class UserController extends Controller
{
     public function index()
    {
        return view('pages.user.index');
    }

     public function destroy()
    {

        $user=User::Where('estSupprimer',0)->get();
        return view('pages.user.destroy',[
           
           'user'=>$user

            ]);
    }

    public function postDestroy(UpdateUserFormRequest $request)
    {
        $user=User::Where('name',$request->nom);

                $user->update([
          
                'estSupprimer'=>1

                ]);
         session()->flash('message','Utilisateur supprimé');       

          return back();      
    }
     public function update()
    {
        $user=User::Where('estSupprimer',0)->get();
        return view('pages.user.update',[
           
           'user'=>$user

            ]);
    }

    public function postUpdate(UpdateUserFormRequest $request)
    {
        
    if((strlen($request->mdp)>0)||(strlen($request->cmdp)>0)){
        
         if(strlen($request->mdp)<8){

        session()->flash('message','Aucune modification effectuée. Le mot de passe doit contenir au moins 8 caractères');
 
        return back(); 
         }

       
         if($request->mdp!=$request->cmdp){

        session()->flash('message','Aucune modification effectuée. Les mots de passes doivent être identiques');
        
        return back(); 

        }
    }

        if(is_null($request->n_nom)&&(is_null($request->mdp))){

         Flashy::message('Aucune modification effectuée', '#');

         session()->flash('message','Aucune modification effectuée');

         return back(); 
           
        }else{
            if(is_null($request->n_nom)){

                $user=User::Where('name',$request->nom);

                $user->update([
          
                'password'=>bcrypt($request->mdp)

                ]);

                Flashy::success(' modification effectuée', '#');
                session()->flash('message','modification effectuée');

                return redirect('/Users/Modification'); 

            }

            if(is_null($request->mdp)){

                $user=User::Where('name',$request->nom);

                $user->update([
          
                'name'=>$request->n_nom

                ]);

                Flashy::success(' modification effectuée', '#'); 
                session()->flash('message','modification effectuée');

                 return redirect('/Users/Modification'); 

                
            }

            if(!is_null($request->n_nom)&&(!is_null($request->mdp))){

                $user=User::Where('name',$request->nom);

                $user->update([
          
                'name'=>$request->n_nom,
                'password'=>bcrypt($request->mdp)

                ]);

                Flashy::success(' modification effectuée', '#'); 
                session()->flash('message','modification effectuée');

                 return redirect('/Users/Modification'); 
 
            }

           
        }
    }

     public function droit()
    {
        $user=User::Where('estSupprimer',0)->get();

        $division=Division::all();

        $role=Role::all();
        return view('pages.user.droit',[
           
           'user'=>$user,
           'division'=>$division,
           'role'=>$role

            ]);
    }

     public function postDroit(AttributeDroitFormRequest $request)
    {
        if(is_null($request->role)){

            $role="SUPER-ADMINISTRATEUR";
        }else{

            $role=$request->role;
        }



        $user=User::Where('name',$request->nom);

        $id_role=Role::where('DESIGNATION_ROLE',$role)->first();

        $id_division=Division::where('DESIGNATION_DIVISION',$request->division)->first();

       

         if(is_null($id_division['ID_DIVISION'])){

           $div=0;
         }else{

            $div=$id_division['ID_DIVISION'];
         }   

                $user->update([
          
                'ID_ROLE'=>$id_role['ID_ROLE'],
                'ID_DIVISION'=>$div

                ]);

          session()->flash('message','Droit Attriué');      

         return back();       
    }

    public function logout(Request $request)
    {
        
       Auth::logout();

       Session::forget('key');

    return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }


   
}
