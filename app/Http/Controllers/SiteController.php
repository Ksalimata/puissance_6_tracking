<?php

namespace App\Http\Controllers;

use App\Site;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequests\storeSite;
use App\Http\Requests\updateRequest\updateSite;
use DB;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites_clients = DB::table('sites')
                            ->join('clients','clients.id','client_id')
                            ->select('sites.*','clients.nom as nom_client')
                            ->get(); 
        return view('front.site.index',compact('sites_clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('front.site.create',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeSite $request)
    {
        
        try
        {
            Site::create([
                "nom"=>$request->nom,
                "longitude"=>$request->longitude,
                "latitude"=>$request->latitude,
                "client_id"=>$request->client_id
            ]);

            return redirect()->back()->with('success','site créé avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la création du site '.$e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        $clients = Client::all();

        return view('front.site.edit',compact('site','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(updateSite $request, Site $site)
    {
        try
        {
            $site->update($request->all());
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
     * @param  \App\site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        if($site->delete())
        {
            return redirect()->back()->with('success','site supprimé avec succès');
        }
        else
        {
            return redirect()->back()->with('error','Echec de la suppréssion, veuillez réessayer svp');
        }
    }
}
