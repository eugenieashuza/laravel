<?php
namespace App\Http\Controllers;
use App\Cooperative;
use App\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class CooperativesController extends Controller
{

    public function index()
    {
        $cooperatives = DB::table('cooperatives')
        ->join('communes', 'communes.id', 'cooperatives.id_commune')
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('cooperatives.id,cooperatives.statut,cooperatives.mail,cooperatives.etat_cooperative,cooperatives.created_at,communes.nom as nomc,provinces.nom as nomp'))
        ->distinct('cooperatives.id')
        ->get();
       // $text=$cooperatives->statut;
       //$contents = Storage::get('$text');

      return view('cooperatives/index', ['cooperatives'=>$cooperatives]);// 'contents' => $contents]);
    }

     public function create()
     {
         # code...
         $communes= Commune::all();
        return view('cooperatives/create',  ['communes'=>$communes]);
    }

    public function storecooperatives(Request $request)
    {
        // Validation
        $request->validate([
            'mail' => 'required' ,
            'statut' => 'required' ,
            'phone' => 'required' ,
            'communes_id' => 'required' ,
            'actif' => 'required'
        ]);

        $cooperative = DB::table('cooperatives')->where('$request->mail');  
        if($cooperative->mail == null)
        {
               
        $cooperatives = new Cooperative();
        $cooperatives->telephone = $request->phone;
        $cooperatives->statut = $request->statut;
        $cooperatives->mail = $request->mail;
        $cooperatives->id_commune = $request->communes_id;
        $cooperatives->etat_cooperative = $request->actif;
        $cooperatives->id_user = 1;
        $cooperatives->save();
        }
    //     $path = $request->file('$request->statut')->store(
    //         '$request->statut', 'public'
    //  );
    // asset('storage/avatars/avatar.jpg');
        
        Storage::disk('public')->put('$request->statut', $fileContents);
        // $cooperatives = DB::table('clients')->where('numero_identite', $request->numero_identite)->first();
        //  return redirect('cooperatives/index');
    }

    // //Dependancy injection (Injection des dependances)
    
     public function edit(Cooperative $cooperatives)
    {
        $cooperatives = Cooperatives::find($cooperatives->id);
        return view('cooperatives/edit', [
            'cooperatives' => $cooperatives
        ]);
    }

    public function updatecooperatives(Request $request, Cooperative $cooperatives)
    {
        $cooperatives = DB::table('cooperatives')
                ->join('communes', 'communes.id', 'cooperatives.id_commune')              
                ->select(DB::raw('cooperaatives.mail,cooperaatives.etat_cooperative,cooperatives.created_at'))
                ->distinct('cooperatives.id')
                ->get();
    return view('cooperatives/index', ['cooperatives'=>$cooperatives]);
    }

   /* $factory->define(App\Editeur::class, function (Faker\Generator $faker) {
        return [
            'nom' => $faker->name,
        ];
    });
     
    $factory->define(App\Auteur::class, function (Faker\Generator $faker) {
        return [
            'nom' => $faker->name,
        ];
    });
     
    $factory->define(App\Livre::class, function (Faker\Generator $faker) {
        return [
            'titre' => $faker->sentence(rand(2, 3)),
            'description' => $faker->text,
            'editeur_id' => $faker->numberBetween(1, 40),
        ];
    });*/
}
