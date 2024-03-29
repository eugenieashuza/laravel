<?php
namespace App\Http\Controllers;
use App\Statistique;
use App\Cooperative;
use App\Cooperative_membre;
use App\Membre;
use App\Commune;
use App\Province;
use App\Providers\EventServiceProvider;
// use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StatistiquesController extends Controller
{
    
    
    public function index()
    {
        $totalcoop_membre=DB::table('cooperative_membres')
        ->count();
        $totalmembre = DB::table('membres')
        ->count();
        $totalprov = DB::table('provinces')
        ->count();
        $totalcom = DB::table('communes')
        ->count();
        $totalcommune = Commune::all();
       $totalcoop = DB::table('cooperatives')
       ->count();
        $actif = DB::table('cooperatives')
        ->where('cooperatives.etat_cooperative',1)
        ->count();
        $nonactif = DB::table('cooperatives')
        ->where('cooperatives.etat_cooperative',0)
        ->count();

        $actif_membre = DB::table('cooperative_membres')
        ->where('cooperative_membres.etat_membre',1)
        ->count();
        $nonactif_membre = DB::table('cooperative_membres')
        ->where('cooperative_membres.etat_membre',0)
        ->count();

        // $now = Carbon::now();

        $events_commune = EventServiceProvider::with(['cooperatives', 'communes'])
            // ->whereMonth('start_date', $now->format('m'))
            // ->whereYear('start_date', $now->format('Y'))
            ->get();

        $commune_name = [];      
        $events_count_per_commune = [];
        $events_count_per = 0;
        $commune_colors = "green";
        $commune_color = [];
        // $total_price_paid = [];

        foreach ($events_commune->commune as $event_commune ) {

            if (!in_array($event_commune->communes->nom, $commune_name)) {
                $commune_name[] = $event_commune->communes->nom;  

                foreach ($event_commune->cooperatives as $cooperatives) {
                    if($event_commune->cooperatives->id_commune = $event_commune->communes->id ){
                        $events_count_per = $events_count_per + 1;
                    }
             

              }
              $events_count_per_commune[] =  $events_count_per ;
              $commune_color[] =  $commune_colors;
            }
        }

            

        $actifs = $actif /  $totalcoop;
        $actifs =  $actifs * 100;
        $actifs = round($actifs, 2);

        $nonactifs = $nonactif  /  $totalcoop;
        $nonactifs =  $nonactifs * 100;
        $nonactifs = round($nonactifs, 2);

        $actif_membres =  $actif_membre /  $totalcoop_membre ;
        $actif_membres = $actif_membres * 100;
        $actif_membres = round($actif_membres, 2);

        $nonactif_membres =  $nonactif_membre /  $totalcoop_membre ;
        $nonactif_membres = $nonactif_membres * 100;
        $nonactif_membres = round($nonactif_membres, 2);
       

        $results = DB::table('cooperative_membres')
        ->join('cooperatives', 'cooperatives.id','cooperative_membres.id_cooperative')
        ->join('communes', 'communes.id','cooperatives.id_commune')                 
        ->select(DB::raw('communes.nom as nom ', DB::raw('COUNT(cooperative_membres.id_cooperative) as nbre')) ) 
        ->groupBy('communes.nom','nom');
        return view('statistiques/index',['actifs' => $actifs , 'nonactifs' =>  $nonactifs ,
        'totalcoop' =>  $totalcoop ,'totalcom' =>  $totalcom,'totalprov' =>  $totalprov,
        'totalmembre' =>  $totalmembre ,'actif_membres' => $actif_membres ,
         'nonactif_membres' =>  $nonactif_membres  , 'totalcommune' => $totalcommune ,'results' => $results,
         'commune_name' => json_encode($commune_name),
         'events_count_per_commune' => json_encode($events_count_per_commune),
         'commune_color' => json_encode($commune_color),
         ]);

    }
    public function chart()
    {
        # code...
        // $result = DB::table('cooperative_membres')
        // ->join('cooperatives', 'cooperatives.id','cooperative_membres.id_cooperative')
        // ->join('communes', 'communes.id','cooperatives.id_commune')                 
        // ->select(DB::raw('cooperative_membres.id_cooperative,communes.nom as communenom'))       
        // ->groupBy('communes.nom','communenom')  
        // ->count('cooperative_membres.id_cooperative','nbre'); 

        // // return response()->json($result);
        // return view('chart',['result' => $result]);


    
    }



}