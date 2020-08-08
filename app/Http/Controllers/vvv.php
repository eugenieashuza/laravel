


<?php
// Namespace App\Http\Controllers;
// use App\Client;
// use Illuminate\Http\Request;
//  use Illuminate\Support\Facades\DB;
// class ClientsController extends Controller
// {

//   public function index()
//   {
//     $client = Client::all();
//     return view('clients/index', ['clients'=>$client]);
//   }
//   public function create()
//   {
//       return view('clients/create');
//   }
//   public function storeproprietaire(Request $request)
//   {
//     $request->validate([
//                   'numero_identite' => 'required',
//                   'nom' => 'required',
//                   'prenom' => 'required',
//                   'adresse' => 'required',
//                   'profession' => 'required',
//                   'contact' => 'required'
//                 ]);
//     $client = new Client();
//     $client->numero_identite = $request->numero_identite;
//     $client->nom = $request->nom;
//     $client->prenom = $request->prenom;
//     $client->adresse = $request->adresse;
//     $client->profession = $request->profession;
//     $client->contact = $request->contact;
//     $client->save();
//     $proprietaire = DB::table('clients')->where('numero_identite', $request->numero_identite)->first();
//     return redirect('vehicules/new/'.$proprietaire->id);
//   }

// }














<?php
// Namespace App\Http\Controllers;
// use App\Vehicule;
// use App\Panne;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// class PannesController extends Controller
// {
//   public function index(Vehicule $vehicule)
//   {
//     $vehicule = Vehicule::find($vehicule->id);
//     $pannes = Panne::all()->where('vehicule_id', $vehicule->id);
//     $data = ['pannes'=>$pannes, 'vehicule' => $vehicule];
//     return view('pannes/index', $data);
//   }

//   public function storepanne(Request $request)
//   {
//     $request->validate(['designation' => 'required']);
//     $panne = new Panne();
//     $panne->vehicule_id  = $request->id;
//     $panne->designation = $request->designation;
//     $panne->etatfinal = -1;
//     $panne->save();
//     $panne2 = new Panne();
//     $panne2->vehicule_id  = $request->id;
//     $panne2->designation = $request->designation2;
//     $panne2->etatfinal = -1;
//     if(!empty(rtrim($request->designation2)))
//     $panne2->save();
//     return redirect('pannes/index/'.$request->id);
//   }

//   public function destory(Request $panne)
//   {
//     $panne = Panne::find($panne->id);
//     $vehicule = $panne->vehicule_id;
//     $panne->delete();
//     return redirect('pannes/index/'.$vehicule);
//   }
// }








// <?php
// Namespace App\Http\Controllers;
// use App\Reparation;
// use App\Panne;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// class ReparationsController extends Controller
// {
//   public function index()
//   {
//     $vehicules = DB::table('vehicules')
//                 ->join('clients', 'clients.id', 'vehicules.client_id')
//                 ->join('pannes', 'pannes.vehicule_id', 'vehicules.id')
//                 ->join('reparations', 'reparations.panne_id', 'pannes.id')
//                 ->select(DB::raw('clients.nom, clients.prenom, vehicules.id, vehicules.plaque, vehicules.model, vehicules.marque, vehicules.type, vehicules.created_at'))
//                 ->distinct('vehicules.id')
//                 ->get();
//     return view('reparations/index', ['vehicules'=>$vehicules]);
//   }
//   public function add(Request $vehicule)
//   {
//     $pannes = Panne::all()->where('vehicule_id', $vehicule->id);
//     foreach($pannes as $clef=>$panne)
//     {
//       $reparation = Reparation::all()->where('panne_id', $panne['id']);
//       if(count($reparation) == 0)
//       {
//         $reparationInsertion = new Reparation();
//         $reparationInsertion->panne_id  = $panne['id'];
//         $reparationInsertion->save();
//       }
//     }
//     return $this->index();
//   }

// }









// <?php
// Namespace App\Http\Controllers;
// use App\Client;
// use App\Vehicule;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// class VehiculesController extends Controller
// {
//   public function index()
//   {
//     $vehicules = DB::table('clients')
//                 ->join('vehicules', 'vehicules.client_id', 'clients.id')
//                 ->get();
//     return view('vehicules/index', ['vehicules'=>$vehicules]);
//   }
//   public function new(Client $client)
//   {
//     $client = Client::find($client->id);
//     return view('vehicules/new', ['client' => $client ]);
//   }
//   public function etat(Vehicule $vehicule)
//   {
//     $vehicule = Vehicule::find($vehicule->id);
//     return view('vehicules/etat', ['vehicule' => $vehicule ]);
//   }

//   public function storevehicule(Request $request)
//   {
//     $request->validate([
//                   'proprietaire' => 'required',
//                   'plaque' => 'required',
//                   'marque' => 'required',
//                   'model' => 'required',
//                   'couleur' => 'required',
//                   'type' => 'required'
//                 ]);
//     $vehicule = new Vehicule();
//     $vehicule->client_id  = $request->proprietaire;
//     $vehicule->plaque = $request->plaque;
//     $vehicule->marque = $request->marque;
//     $vehicule->model = $request->model;
//     $vehicule->type = $request->type;
//     $vehicule->recuperer = -1;
//     $vehicule->save();
//     $vehicule = DB::table('vehicules')->where('plaque', $request->plaque)->first();
//     return redirect('pannes/index/'.$vehicule->id);
//   }

// }






// <?php

// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });

// //pour aller a l'acceuil
//  Route::get('/', 'HomeController@index');
//  Route::get('home/acceuil', 'HomeController@acceuil');


//  //le vehicules
// Route::get('vehicules', 'VehiculesController@index');
// Route::get('vehicules/new/{client}', 'VehiculesController@new');
// Route::post('vehicules', 'VehiculesController@storevehicule');
// //Route::get('vehicule/etat/{vehicule}', 'VehiculesController@etat');

// //les client
// Route::get('clients', 'ClientsController@index');
// Route::get('clients/create', 'ClientsController@create');
// Route::post('clients', 'ClientsController@storeproprietaire');

// //pannes
// Route::get('pannes/index/{vehicule}', 'PannesController@index');
// Route::post('pannes', 'PannesController@storepanne');
// Route::post('destorypanne', 'PannesController@destory');

// //reparation
// Route::get('reparations', 'ReparationsController@index');
// Route::post('addreparation', 'ReparationsController@add');

// //participantreparations
// Route::get('participantreparations/index/{vehicule}', 'ParticipantreparationsController@index');




 
