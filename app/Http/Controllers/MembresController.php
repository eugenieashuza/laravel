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
        $cooperatives = DB::table('membres')
        ->join('communes', 'communes.id', 'membres.id_commune')
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('membres.id,membres.nom,membres.mail,membres.prenom,membres.sexe,membres.age,communes.nom as nomc,provinces.nom as nomp'))
        ->distinct('cooperatives.id')
        ->get();
    

      return view('membres/index', ['membres'=>$membres]);
    }

     public function create()
     {
         # code...
         $membres= Membres::all();
        return view('membres/create',  ['membres'=>$membres]);
    }

    public function storecooperatives(Request $request)
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
            $membre->gender = $request->gender;
            $membre->id_user = 1;
            $membre->save();
        }
    //     $path = $request->file('$request->statut')->store(
    //         '$request->statut', 'public'
    //  );
    // asset('storage/avatars/avatar.jpg');
    }

}