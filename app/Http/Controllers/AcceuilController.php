<?php
Namespace App\Http\Controllers;
use App\Statistique;
use App\Cooperative;
use App\Acceuil;
use App\Cooperative_membre;
use App\Membre;
use App\Commune;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AcceuilController extends Controller
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

        return view('acceuil/index',['actifs' => $actifs , 'nonactifs' =>  $nonactifs ,'totalcoop' =>  $totalcoop ,
        'totalcom' =>  $totalcom,'totalprov' =>  $totalprov,'totalmembre' =>  $totalmembre ,
        'actif_membres' => $actif_membres , 'nonactif_membres' =>  $nonactif_membres ]);
        
    

        // return view('/index');
    }

}