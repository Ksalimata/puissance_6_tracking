<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequests\storeEmploye;
use App\Http\Requests\updateRequest\updateEmploye;
use DB;
use Storage;

class EmployeController extends Controller
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
            $employes_sites = DB::table('employes')
                            ->join('sites','sites.id','site_id')
                            ->select('employes.*','sites.nom as nom_site')
                            ->get(); 
        return view('front.employe.index',compact('employes_sites'));          
        }
        
        catch (\Exception $e) 
        {
            return view('front.employe.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::all();
        return view('front.employe.create',compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeEmploye $request)
    {
        
        try
        {
            $employe = Employe::create([
                "nom"=>$request->nom,
                "prenom"=>$request->prenom,
                "cni"=>$request->cni,
                "contact"=>$request->contact,
                "date_naissance"=>$request->date_naissance,
                "domicile"=>$request->domicile,
                "heure_debut"=>$request->heure_debut,
                "heure_fin"=>$request->heure_fin,
                "photo"=>$request->photo,
                "empreinte"=>$request->empreinte,
                "typePiece"=>$request->typePiece,
                "site_id"=>$request->site_id
            ]);

            $path = $request->file('photo')->storeAs(
                'profile',$employe->id.'.jpg', 'public'
            );

            $path = $request->file('empreinte')->storeAs(
                'emprunte',$employe->id.'.jpg', 'public'
            );
                       
           return redirect()->back()->with('success','employe créé avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la création du employe '.$e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        $sites = Site::all();

        return view('front.employe.edit',compact('employe','sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(updateEmploye $request, Employe $employe)
    {
        try
        {

            $employe->update($request->all());
            
            //Storage::delete("profile/".$employe->id.".jpg");
            /*$path = $request->file('photo')->storeAs(
                'profile',$request->id.'.jpg', 'public'
            );*/
            if($request->file('photo')!=null)
            {    
                $request->file('photo')->storeAs('profile',$employe->id.'.jpg', 'public');
            }
            return redirect()->back()->with('success','Mise à jour éffectuée avec succès');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Echec de la mise à jour, veuillez réessayer svp '.$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        if($employe->delete())
        {
            return redirect()->back()->with('success','employe supprimé avec succès');
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
         Employe::destroy($ids); 
         return redirect()->back()->with('success','Employe supprimé avec succès');  
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Echec de la suppréssion, veuillez réessayer svp');
        }

    }
}
