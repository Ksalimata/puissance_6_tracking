<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employe;
use App\pointLocation;
use App\Pointage;
use App\Message;
use App\Site;
use App\Client;
use App\User;
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
                $site = Site::find($employe->site_id);
                
                //$distance = $this->measure($request->latitude, $request->longitude, $site->latitude, $site->longitude, "K");
                $distance = $this->measure($request->latitude, $request->longitude, $site->latitude, $site->longitude);
                
                if(doubleval($distance)<=doubleval($site->diametre))
                {
                    
                    if(($employe->heure_debut<=date("H:i:s")) && ($employe->heure_fin>=date("H:i:s")))
                    {
                        $pointage = Pointage::create([
                            "heure"=>date('H:i:s'),
                            "longitude"=>$request->longitude,
                            "latitude"=>$request->latitude,
                            "date_pointage"=>date('Y-m-d'),
                            "employe_id"=>$employe->id
                        ]);
                        return "Pointage effectué avec succès";
                    }
                    else
                        return "Vous êtes hors de vos heure de travaille, veuillez réessayer à vos heures de travail";
                }
                else
                    return "Vous ne vous trouvez pas sur le site ";
            }
        }
        return "Erreur de pointage, veuillez réessayer";
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
        return "Erreur d'envoie du message";
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

    public function measure($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $earthRadius = 6371;
      // convert from degrees to radians
      $latFrom = deg2rad($latitudeFrom);
      $lonFrom = deg2rad($longitudeFrom);
      $latTo = deg2rad($latitudeTo);
      $lonTo = deg2rad($longitudeTo);
      $latDelta = $latTo - $latFrom;
      $lonDelta = $lonTo - $lonFrom;
      $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
      return $angle * $earthRadius;
    }

    //Permet de verifier la presence d'un point dans un polygone
    public function verifier()
    {
        $pointLocation = new pointLocation();
        $points = array("50 70","70 40","-20 30","100 10","-10 -10","40 -20","110 -20");
        $polygon = array("-50 30","50 70","100 50","80 10","110 -10","110 -30","-20 -50","-30 -40","10 -10","-10 10","-30 -20","-50 30");
        // The last point's coordinates must be the same as the first one's, to "close the loop"
        foreach($points as $key => $point) {
            echo "point " . ($key+1) . " ($point): " . $pointLocation->pointInPolygon($point, $polygon) . "<br>";
        }
    }

    public function retourner_liste_sites_client(Request $request)
    {
        $sites = DB::table('employes')
                ->join('sites','sites.id','site_id')
                ->where("client_id","=",Client::find($request->header('client_id'))->id)
                ->select('sites.*',DB::raw('count(employes.id) as nbre'))
                ->groupBy('site_id')
                ->get();
        return response()->json($sites);
    }

    public function modifier_password(Request $request)
    {
        try
        {
            $clef = str_replace("Bearer ", "", $request->header("Authorization"));

            $user = User::where("api_token","=",$clef)->update([
                "password"=>bcrypt($request->password)
            ]);

            return "Mot de passe modifié avec succès";
        }
        catch(\Exception $e)
        {
            return "Echec de la modification du mot de passe";
        }
    }
}