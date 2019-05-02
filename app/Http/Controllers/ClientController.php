<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequests\storeClient;
use App\Http\Requests\updateRequest\updateClient;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {

        $clients = Client::all();
        
        return view('front.client.index',compact('clients'));

        }
        catch(\Exception $e)
        {
           return view('front.client.index'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeClient $request)
    {


        DB::beginTransaction();
        try
        {
            
            $client = Client::create([
                "nom"=>$request->nom,
                "telephone"=>$request->telephone,
                "adresse"=>$request->adresse,
                "email"=>$request->email,
                "type_client"=>$request->type_client
            ]);

            $user = User::create([
                "name"=>$request->nom,
                "username"=>$request->username,
                "password"=>bcrypt($request->password),
                "role_id"=>5,
                "client_id"=>$client->id
            ]);

            

            DB::commit();
            
            return redirect()->back()->with('success','Client créé avec succès');
        }
        catch(\Exception $e)
        {
            DB::rollBack();
           return redirect()->back()->with('error',$e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('front.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(updateClient $request, Client $client)
    {

        try
        {
            $client->update($request->all());
            return redirect()->back()->with('success','Mise à jour éffectuée avec succès');

            return response()->json("Mise à jour éffectuée avec succès");
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la mise à jour, veuillez réessayer svp');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if($client->delete())
        {
             return redirect()->back()->with('success','Client supprimé avec succès');
        }
        else
        {
            return redirect()->back()->with('error','Echec de la suppréssion, veuillez réessayer svp');
        }
    }


    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyAll(Request $request)
    {
        $ids= explode(" ", $request->ids);
        try{
         Client::destroy($ids); 
         return redirect()->back()->with('success','Clients supprimé avec succès');  
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Echec de la suppréssion, veuillez réessayer svp');
        }

    }
}
