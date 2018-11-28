<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Pointage;
use App\Message;
use DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPointage(Request $request)
    {

        
        $employes = DB::table('employes')
                            ->join('sites','sites.id','site_id')
                            ->select('employes.*','sites.nom as nom_site','sites.latitude','sites.longitude')
                            ->get();
        foreach ($employes as $employe) {
            //&& ($employe->heure_debut<=date("H:i:s")) && ($employe->heure_fin>=date("H:i:s"))
            if(($employe->cni == $request->cni))
            {
                $pointage = Pointage::create([
                    "heure"=>date('H:i:s'),
                    "longitude"=>$request->longitude,
                    "latitude"=>$request->latitude,
                    "date_pointage"=>date('Y-m-d'),
                    "employe_id"=>$employe->id
                ]);
                return $pointage;
            }
        }
        return "Erreur de pointage";

        //return ($this::measure($employe->latitude, $employe->longitude, $request->latitude, $request->longitude)<=13);
    }

    public function addMessage(Request $request)
    {
        $employes = Employe::all();
        foreach ($employes as $employe) { 
            if(($employe->cni == $request->cni))
            {
                //&& ($employe->heure_debut<=date("H:i:s")) && ($employe->heure_fin>=date("H:i:s"))
                $message = Message::create([
                    "heure"=>date('H:i:s'),
                    "longitude"=>$request->longitude,
                    "latitude"=>$request->latitude,
                    "contenu"=>$request->contenu,
                    "date_message"=>date('Y-m-d'),
                    "employe_id"=>$employe->id
                ]);
                return $message;
            }
        }

        return "erreur";
    }

    public function getTime(Request $request)
    {
    
        /*$employe = Employe::where('cni','=',$request->header('cni'))->first();
        if(($employe->heure_debut<=date("H:i:s")) && ($employe->heure_fin>=date("H:i:s")))
            //return response()->json(["heure_serveur"=>date("H:i:s"),"status_pointage"=>"pointe"]);
            return response()->json(date("H:i:s"));
        else
            return response()->json(["heure_serveur"=>"","status_pointage"=>"non_pointe"]);*/

        return response()->json(date("H:i:s"));
    }

    public function measure(float $lat1, float $lon1, float $lat2, float $lon2){

        $pi = pi();
        
        $R = 6378.137; // Radius of earth in KM
        $dLat = $lat2 * $pi / 180 - $lat1 * $pi / 180;
        $dLon = $lon2 * $pi / 180 - $lon1 * $pi / 180;
        $a = sin($dLat/2) * sin($dLat/2) +
                cos($lat1 * $pi / 180) * cos($lat2 * $pi / 180) *
                        sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $d = $R * $c;
        return $d; // meters*/
    }
}
