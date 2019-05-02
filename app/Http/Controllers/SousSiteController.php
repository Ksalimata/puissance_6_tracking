<?php

namespace App\Http\Controllers;

use App\SousSite;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequests\storeSousSite;
use App\Http\Requests\updateRequest\updateSousSite;
use DB;

class SousSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SousSites_Sites = DB::table('SousSites')
                            ->join('Sites','Sites.id','Site_id')
                            ->select('SousSites.*','Sites.nom as nom_Site')
                            ->get(); 
        return view('front.SousSite.index',compact('SousSites_Sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Sites = Site::all();
        return view('front.SousSite.create',compact('Sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeSousSite $request)
    {
        
        try
        {
            SousSite::create([
                "nom"=>$request->nom,
                "longitude"=>$request->longitude,
                "latitude"=>$request->latitude,
                "diametre"=>$request->diametre,
                "Site_id"=>$request->Site_id
            ]);

            return redirect()->back()->with('success','SousSite créé avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la création du SousSite '.$e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SousSite  $SousSite
     * @return \Illuminate\Http\Response
     */
    public function show(SousSite $SousSite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SousSite  $SousSite
     * @return \Illuminate\Http\Response
     */
    public function edit(SousSite $SousSite)
    {
        $Sites = Site::all();

        return view('front.SousSite.edit',compact('SousSite','Sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SousSite  $SousSite
     * @return \Illuminate\Http\Response
     */
    public function update(updateSousSite $request, SousSite $SousSite)
    {
        try
        {
            $SousSite->update($request->all());
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
     * @param  \App\SousSite  $SousSite
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousSite $SousSite)
    {
        if($SousSite->delete())
        {
            return redirect()->back()->with('success','SousSite supprimé avec succès');
        }
        else
        {
            return redirect()->back()->with('error','Echec de la suppréssion, veuillez réessayer svp');
        }
    }
}
