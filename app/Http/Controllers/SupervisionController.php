<?php

namespace App\Http\Controllers;

use App\Supervision;
use App\Employe;
use App\Message;
use App\Pointage;
use App\Site;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use DB;
use Auth;

class SupervisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all();
        $nbre_messages = count($this::listeMessages());
        $nbre_abscents = count($this::listeEmployeNonPointes());
        return view('front.supervision.carte',compact('nbre_abscents','nbre_messages','sites'));
        
    }

    public function afficherTableauListeEmployeNonPointe()
    {
        
        
        $nbre_messages = count($this::listeMessages());
        $nbre_abscents = count($this::listeEmployeNonPointes());
        $listeEmployeNonPointes = $this::listeEmployeNonPointes();
        
        return view('front.supervision.abscents',compact('listeEmployeNonPointes','nbre_abscents','nbre_messages'));
    }

    public function afficherTableauMessages()
    {
        $nbre_messages = count($this::listeMessages());
        $nbre_abscents = count($this::listeEmployeNonPointes());
        $listeMessages = $this::listeMessages();
        Message::where('etat', 0)
          ->update(['etat' => 1]);
        return view('front.supervision.messages',compact('listeMessages','nbre_abscents','nbre_messages'));
    }

    public function listeDesPointagesActuels()
    {
        $listecurrentpointages = new Collection();

        $pointages = DB::table('pointages')
                            ->join('employes','employes.id','employe_id')
                            ->join('sites','sites.id','site_id')
                            ->select('pointages.*','employes.nom','employes.prenom','employes.contact','sites.nom as nom_site')
                            ->get();

        foreach ($pointages as $pointage) {

            if((intval(explode(':', $pointage->heure)[0])==(intval(date('H'))-1)) && (strcmp($pointage->date_pointage,date('Y-m-d'))==0))
                $listecurrentpointages->push($pointage);
        }

        return $listecurrentpointages;
        
    }

    public function listeCurrentPointages()
    {
        return response()->json($this::listeDesPointagesActuels());
    }

    public function listeEmployeNonPointes()
    {

        $listeEmployeNonPointes = new Collection();

        $listecurrentpointages = $this::listeDesPointagesActuels();

        $listeIdPointage = new Collection();

        $employes = DB::table('employes')
                    ->join('sites','sites.id','site_id')
                    ->select('employes.*','sites.nom as nom_site')
                    ->get();

        foreach ($listecurrentpointages as $listecurrentpointage) {
            $listeIdPointage->push($listecurrentpointage->employe_id);
        }

        foreach ($employes as $employe) {
            if(!$listeIdPointage->contains($employe->id))
                $listeEmployeNonPointes->push($employe);
        }

        

        return $listeEmployeNonPointes;
        
        //response()->json($listeEmployeNonPointe);

    }

    

    public function listeSites()
    {
        $sites = DB::table('employes')
                ->join('sites','sites.id','site_id')
                ->select('sites.*',DB::raw('count(employes.id) as nbre'))
                ->groupBy('site_id')
                ->get();
        return response()->json($sites);
    }

    public function listeMessages()
    {
        $listecurrentmessages = new Collection();

        $messages = DB::table('messages')
                            ->join('employes','employes.id','employe_id')
                            ->join('sites','sites.id','site_id')
                            ->where('messages.date_message','=',date('Y-m-d'))
                            ->select('messages.*','employes.nom','employes.prenom','employes.contact','sites.nom as nom_site')
                            ->orderBy('messages.id','desc')
                            ->get();

        foreach ($messages as $message) {

            if((strcmp($message->date_message,date('Y-m-d'))==0))
                $listecurrentmessages->push($message);
        }

        return $listecurrentmessages;
    }
}