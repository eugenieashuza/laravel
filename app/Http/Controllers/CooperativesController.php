<?php
namespace App\Http\Controllers;
use App\Cooperative;
use App\Commune;
use PDF;
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
        ->Paginate(15);
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
            'nom' => ['required' , 'string' ,'min:3']
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
        $cooperatives->id_user =  $request->idutil;
       
         
         $cooperatives->save();  
         return redirect('cooperatives')->withFlashMessage('Cooperative added Successfully.');;
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
            'telephone' => 'required|unique:cooperatives',
            'communes_id' => 'required' ,
            'nom' => ['required' , 'string' ,'min:3'] ,
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
        $cooperatives->id_user =  $request->idutil;
        $cooperative->save();      
        return redirect('cooperatives')->withFlashMessage('Cooperative updated Successfully.');

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
        ->Paginate(15);
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

    
    public function createPDF() {
        // retreive all records from db
        $data = DB::table('cooperatives') 
        ->join('communes', 'communes.id', 'cooperatives.id_commune')
         ->join('provinces', 'provinces.id', 'communes.id')                 
         ->select(DB::raw('cooperatives.nom,cooperatives.telephone,cooperatives.mail,cooperatives.etat_cooperative,
         cooperatives.created_at,communes.nom as nomc,provinces.nom as nomp'))
         ->get();
         
        // share data to view
        view()->share('cooperative',$data);
        $pdf = PDF::loadView('cooperatives/recherche/pdf_view', $data);
    
        // download PDF file with download method
        return $pdf->download('pdf_file_cooperatives.pdf');
      }
    

}
