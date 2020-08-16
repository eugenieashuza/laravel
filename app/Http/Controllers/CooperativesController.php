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
        ->select(DB::raw('cooperatives.id,cooperatives.nom,cooperatives.telephone,cooperatives.statut,cooperatives.mail,cooperatives.etat_cooperative,cooperatives.created_at,communes.nom as nomc,provinces.nom as nomp'))
        ->distinct('cooperatives.id')
        ->get();
       // $text=$cooperatives->statut;
       //$contents = Storage::get('$text');
     

      return view('cooperatives/index', ['cooperatives' => $cooperatives  ]);// 'contents' => $contents]);
    }

     public function create()
     {
         # code...
         $communes= Commune::all();
        return view('cooperatives/create',  [ 'communes' => $communes ]);
    }

    public function storecooperatives(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|unique:cooperatives' ,
            'mail' => 'required|unique:cooperatives' ,
            'statut' => 'required|unique:cooperatives' ,
            'telephone' => 'required|unique:cooperatives' ,
            'communes_id' => 'required' ,
            'actif' => 'required' ,
            'nom' => 'required'
        ]);

        $filename = time().'.'.$request->statut->getClientOriginalExtension();
        $request->statut->move('storage/', $filename);        
      
               
        $cooperatives = new Cooperative();
        $cooperatives->statut =  $filename;
        $cooperatives->telephone = $request->telephone;       
        $cooperatives->mail = $request->mail;
        $cooperatives->nom = $request->nom;
        $cooperatives->id_commune = $request->communes_id;
        $cooperatives->etat_cooperative = $request->actif;
        $cooperatives->id_user = 1;
       
         
         $cooperatives->save();  
         return redirect('cooperatives');
    }


    // //Dependancy injection (Injection des dependances)
    
     public function edit(Cooperative $cooperative)
    {
        $cooperative = Cooperative::find($cooperative->id);
        $communes = Commune::all();
        return view('cooperatives/edit', [
            'cooperative' => $cooperative ,'communes' => $communes
        ]);
    }

    public function updatecooperatives(Request $request, Cooperative $cooperative)
    {
        $request->validate([
            'mail' => 'required|unique:cooperatives' ,
            'statut' => 'required|unique:cooperatives' ,
            'telephone' => 'required|unique:cooperatives' ,
            'communes_id' => 'required' ,
            'nom' => 'required' ,
            'actif' => 'required'
        ]);

        $filename = time().'.'.$request->statut->getClientOriginalExtension();
        $request->statut->move('storage/', $filename);        
      

        $cooperative->telephone = $request->telephone;
        $cooperative->statut = $request->statut;
        $cooperative->mail = $request->mail;
        $cooperative->nom = $request->nom;
        $cooperative->id_commune = $request->communes_id;
        $cooperative->etat_cooperative = $request->actif;
        
        $cooperative->save();
        
        return redirect('cooperatives');

    }
    
    public function search()
    {
        # code...
        $q = request()->input('q');
       //  dd($q);
       $cooperatives = DB::table('cooperatives') 
       ->join('communes', 'communes.id', 'cooperatives.id_commune')
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('cooperatives.id,cooperatives.nom,cooperatives.telephone,cooperatives.statut,cooperatives.mail,cooperatives.etat_cooperative,cooperatives.created_at,communes.nom as nomc,provinces.nom as nomp'))
        ->distinct('cooperatives.id')
       -> where('cooperatives.nom', 'like' ,"%$q%")      
       ->get();
       return view('cooperatives/index' ,['cooperatives' => $cooperatives ]);
   }

    public function show($id)
    {
        # code...
        $cooperatives = Cooperative::find($id);
        return view('cooperatives.details',['cooperatives' => $cooperatives]);

    }
    public function download($file)
    {
        # code...
        return response()->download('storage/'.$file);
    }

    

    

}
