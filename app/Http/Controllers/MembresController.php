<?php
namespace App\Http\Controllers;
use App\Membre;
use App\Commune;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MembresController extends Controller
{

    public function index()
    {
        $communes= Commune::all();
        $membres = DB::table('membres')
        ->join('communes', 'communes.id', 'membres.id_commune')
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('membres.id,membres.nom,membres.mail,membres.prenom,membres.sexe,membres.created_at,membres.age,communes.nom as nomc,provinces.nom as nomp'))
        ->distinct('membres.id')
        ->Paginate(15);
    

      return view('membres/index', ['membres'=> $membres ,'communes' => $communes]);
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
            'prenom' => ['required' ,'string' ,'min:3'],
            'communes_id' => 'required' ,
            'gender' => 'required',
            'age' => ['required','numeric','min:1']
            


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
            $membre->id_users = $request->idutil;
            $membre->save();

        //  }
         return redirect('membres')->withFlashMessage('Member added Successfully.');;
    
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
            'prenom' => ['required' ,'string' ,'min:3'],
            'communes_id' => 'required' ,
            'gender' => 'required',
            'age' => ['required' ,'numeric' ,'min:1'],
            


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
            $membre->id_users = $request->idutil;
            $membre->save();

        //  }
         return redirect('membres')->withFlashMessage('Member updated Successfully.');;
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
        ->Paginate(15);
     
       return view('membres/index' ,['membres' => $membres ]);
   }

   public function createPDF() {
    // retreive all records from db
    $data = DB::table('membres')
    ->join('communes', 'communes.id', 'membres.id_commune')
    ->join('provinces', 'provinces.id', 'communes.id')                 
    ->select(DB::raw('membres.nom,membres.mail,membres.prenom,membres.created_at,
    membres.sexe,membres.age,communes.nom as nomc,provinces.nom as nomp'))
    ->get();
     
    // share data to view
    view()->share('membre',$data);
    $pdf = PDF::loadView('membres/pdf_view', $data);

    // download PDF file with download method
    return $pdf->download('pdf_file_membres.pdf');
  }


}