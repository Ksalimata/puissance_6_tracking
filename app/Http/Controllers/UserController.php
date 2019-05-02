<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_roles = DB::table('users')
                            ->join('roles','roles.id','role_id')
                            ->select('users.*','roles.nom as nom_role')
                            ->get(); 
        return view('front.user.index',compact('users_roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('front.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try
        {
            User::create([
                "name"=>$request->name,
                "username"=>$request->username,
                "password"=>bcrypt($request->password),
                "role_id"=>$request->role_id
            ]);

            return redirect()->back()->with('success','user créé avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la création du user '.$e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('front.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try
        {
            $user->update($request->all());
            return redirect()->back()->with('success','Mise à jour éffectuée avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la mise à jour, veuillez réessayer svp');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete())
        {
            return redirect()->back()->with('success','user supprimé avec succès');
        }
        else
        {
            return redirect()->back()->with('error','Echec de la suppréssion, veuillez réessayer svp');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function editPassword(Request $request)
    {
         try
        {
            $user = Auth::user();
            $user->password = bcrypt($request->get('password'));
            $user->save();
            return redirect()->back()->with('success','Mot de passe modifié avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la mise à jour, veuillez réessayer svp');
        }
       
    }
}
