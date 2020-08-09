<?php
namespace App\Http\Controllers;
use App\Membre;
use App\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class MembresController extends Controller
{

    public function index()
    {
        $membres = DB::table('membres')
        ->join('communes', 'communes.id', 'membres.id_commune')
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('membres.id,membres.nom,membres.mail,membres.prenom,membres.sexe,membres.age,communes.nom as nomc,provinces.nom as nomp'))
        ->distinct('membres.id')
        ->get();
    

      return view('membres/index', ['membres'=> $membres]);
    }

     public function create()
     {
         # code...

        $communes= Commune::all();
        return view('membres/create',  ['communes' => $communes]);
    }

    public function storemembres(Request $request)
    {
        // Validation
        $request->validate([
            'mail' => 'required' ,
            'nom' => 'required' ,
            'prenom' => 'required' ,
            'communes_id' => 'required' ,
            'gender' => 'required',
            'age' => 'required',
            


        ]);

         $membre = DB::table('membres')->where('$request->mail');  
         if($membre->mail == null)
        {
               
            $membre = new Membre();
            $membre->nom = $request->nom;
            $membre->prenom = $request->prenom;
            $membre->mail = $request->mail;
            $membre->id_commune = $request->communes_id;
            $membre->age = $request->age;
            $membre->sexe = $request->gender;
            $membre->id_users = 1;
            $membre->save();
         }
    
    }

}