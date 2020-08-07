<?php
namespace App\Http\Controllers;
use App\Cooperative;
use Illuminate\Http\Request;

class CooperativesController extends Controller
{

    public function index()
    {
        $cooperatives = Cooperative::all();

        return view('cooperatives/index', [
            'Cooperatives' => $cooperatives
        ]);
    }

     public function create()
     {
         # code...
        return view('cooperatives/create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'cat_name' => 'required'
        ]);

        $cooperatives = new Cooperative();
       // $cooperatives->cat_name = $request->cat_name;

        $cooperatives->save();
        return redirect('cooperatives');
    }

    //Dependancy injection (Injection des dependances)
    
    public function edit(Cooperative $cooperatives)
    {
        $cooperatives = Cooperatives::find($cooperatives->id);
        return view('cooperatives/edit', [
            'cooperatives' => $cooperatives
        ]);
    }

    public function update(Request $request, Cooperative $cooperatives)
    {
        // Validation
        $request->validate([
            'cat_name' => 'required'
        ]);

         $cooperatives->cat_name = $request->cat_name;
         $cooperatives->save();
        return redirect('cooperatives');
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
