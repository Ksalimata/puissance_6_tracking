<?php

namespace App\Http\Controllers;

use App\Pointage;
use App\Employe;
use Illuminate\Http\Request;
use App\Http\Requests\updateRequest\updatePointage;
use App\Http\Requests\StoreRequests\storePointage;
use DB;


class PointageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pointages_employes = DB::table('pointages')
                            ->join('employes','employes.id','employe_id')
                            ->select('pointages.*','employes.nom','employes.prenom')
                            ->get(); 
        return view('front.pointage.index',compact('pointages_employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = Employe::all();
        return view('front.pointage.create',compact('employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePointage $request)
    {
        
        try
        {
            Pointage::create([
                "heure"=>$request->heure,
                "longitude"=>$request->longitude,
                "latitude"=>$request->latitude,
                "date_pointage"=>$request->date_pointage,
                "employe_id"=>$request->employe_id
            ]);

            return redirect()->back()->with('success','pointage créé avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la création du pointage '.$e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pointage  $pointage
     * @return \Illuminate\Http\Response
     */
    public function show(Pointage $pointage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pointage  $pointage
     * @return \Illuminate\Http\Response
     */
    public function edit(Pointage $pointage)
    {
        $employes = Employe::all();

        return view('front.pointage.edit',compact('pointage','employes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pointage  $pointage
     * @return \Illuminate\Http\Response
     */
    public function update(updatePointage $request, Pointage $pointage)
    {
        try
        {
            $pointage->update($request->all());
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
     * @param  \App\pointage  $pointage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pointage $pointage)
    {
        if($pointage->delete())
        {
            return redirect()->back()->with('success','pointage supprimé avec succès');
        }
        else
        {
            return redirect()->back()->with('error','Echec de la suppréssion, veuillez réessayer svp');
        }
    }
}
