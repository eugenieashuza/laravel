<?php
namespace App\Http\Controllers;
use App\Membre;
use App\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MembresController extends Controller
{

    public function index()
    {
        $membres = DB::table('membres')
        ->join('communes', 'communes.id', 'membres.id_commune')
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('membres.id,membres.nom,membres.mail,membres.prenom,membres.sexe,membres.created_at,membres.age,communes.nom as nomc,provinces.nom as nomp'))
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
            'mail' => 'required|unique:membres' ,
            'nom' => 'required|unique:membres' ,
            'prenom' => 'required' ,
            'communes_id' => 'required' ,
            'gender' => 'required',
            'age' => 'required',
            


        ]);

        //  $membre = DB::table('membres')->where('mail',$request->mail);  
        //  if($membre == null)
        // {
               
            $membre = new Membre();
            $membre->nom = $request->nom;
            $membre->prenom = $request->prenom;
            $membre->mail = $request->mail;
            $membre->id_commune = $request->communes_id;
            $membre->age = $request->age;
            $membre->sexe = $request->gender;
            $membre->id_users = 1;
            $membre->save();

        //  }
         return redirect('membres');
    
    }

    public function edit(Membre $membre)
    {
        $communes= Commune::all();
        $membre = Membre::find($membre->id);
        return view('membres/edit', [
            'membre' => $membre ,'communes' => $communes
        ]);
    }

    public function updatemembres(Request $request,Membre $membre)
    {
        // Validation
        $request->validate([
            'mail' => 'required|unique:membres' ,
            'nom' => 'required|unique:membres' ,
            'prenom' => 'required' ,
            'communes_id' => 'required' ,
            'gender' => 'required',
            'age' => 'required',
            


        ]);

        //  $membre = DB::table('membres')->where('mail',$request->mail);  
        //  if($membre == null)
        // {                  
            $membre->nom = $request->nom;
            $membre->prenom = $request->prenom;
            $membre->mail = $request->mail;
            $membre->id_commune = $request->communes_id;
            $membre->age = $request->age;
            $membre->sexe = $request->gender;
            $membre->id_users = 1;
            $membre->save();

        //  }
         return redirect('membres');
    }

    public function search(){
        # code...
        $q = request()->input('q');
       //  dd($q);
       $membres = DB::table('membres')
        ->join('communes', 'communes.id', 'membres.id_commune')
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('membres.id,membres.nom,membres.mail,membres.prenom,membres.sexe,membres.created_at,membres.age,communes.nom as nomc,provinces.nom as nomp'))
        -> where('membres.nom', 'like' ,"%$q%") 
        -> orwhere('membres.prenom', 'like' ,"%$q%") 
        ->get();
     
       return view('membres/index' ,['membres' => $membres ]);
   }


}