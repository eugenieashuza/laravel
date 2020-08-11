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
        ->select(DB::raw('cooperatives.id,cooperatives.nom,cooperatives.statut,cooperatives.mail,cooperatives.etat_cooperative,cooperatives.created_at,communes.nom as nomc,provinces.nom as nomp'))
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
            'nom' => 'required' ,
            'mail' => 'required' ,
            'statut' => 'required' ,
            'phone' => 'required' ,
            'communes_id' => 'required' ,
            'actif' => 'required' ,
            'nom' => 'required'
        ]);

        // $cooperative = DB::table('cooperatives')->where('mail',$request->mail);  
        // if($cooperative == null)
        // {
               
        $cooperatives = new Cooperative();
        $cooperatives->telephone = $request->phone;
        $cooperatives->statut = $request->statut;
        $cooperatives->mail = $request->mail;
        $cooperatives->nom = $request->nom;
        $cooperatives->id_commune = $request->communes_id;
        $cooperatives->etat_cooperative = $request->actif;
        $cooperatives->id_user = 1;
        $cooperatives->save();
        //  }
    //     $path = $request->file('$request->statut')->store(
    //         '$request->statut', 'public'
    //  );
    // asset('storage/avatars/avatar.jpg');
    // $contents = file_get_contents(storage_path('logs/laravel-2019-10-14.log'));
        Storage::disk('public')->put('$request->statut', $fileContents);
        // $cooperatives = DB::table('clients')->where('numero_identite', $request->numero_identite)->first();
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
            'mail' => 'required' ,
            'statut' => 'required' ,
            'phone' => 'required' ,
            'communes_id' => 'required' ,
            'nom' => 'required' ,
            'actif' => 'required'
        ]);

        // $cooperative = DB::table('cooperatives')->where('mail',$request->mail);  
        // if($cooperative == null)
        //  {
               
        $cooperative->telephone = $request->phone;
        $cooperative->statut = $request->statut;
        $cooperative->mail = $request->mail;
        $cooperative->nom = $request->nom;
        $cooperative->id_commune = $request->communes_id;
        $cooperative->etat_cooperative = $request->actif;
        
        $cooperative->save();
        
        return redirect('cooperatives');

    }
    public function Count()
    {
        # code...
        $cooperatives = DB::table('cooperatives');
    }

    public function uploadFilePost(Request $request,$files){
        $request->validate([
            'files' => 'required|file|max:50|mimes:jpeg,pdf,txt,odt,png',
        ]);
   
        $fileName = "fileName".time().'.'.request()->fileToUpload->getClientOriginalExtension();
        $request->fileToUpload->storeAs('uploads',$fileName);
   
        return back()
            ->with('success','Fichier envoyé.');
    }

    public function uploadFile(Request $request){
 
        $url = Storage::url('fileToUpload');
        $path = Storage::disk('public')->path('files');
     
        $files_with_size = array();
        $files = Storage::files('uploads');
        foreach ($files as $key => $file) {
          $files_with_size[$key]['name'] = $file;
        }
     
        return view('uploadfile', [
            'files' => $files,
            'url' => $url,
            'path' => $path
          ]);
        }

}
