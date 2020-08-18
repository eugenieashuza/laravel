<?php
namespace App\Http\Controllers;
use App\Cooperative_membre;
use App\Cooperative;
use App\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cooperative_membresController extends Controller
{

    public function index()
    {
        $cooperative_membres = DB::table('cooperative_membres')
        ->join('cooperatives', 'cooperatives.id','cooperative_membres.id_cooperative')
        ->join('membres', 'membres.id', 'cooperative_membres.id_membre')                 
        ->select(DB::raw('cooperative_membres.id,cooperative_membres.montant,cooperative_membres.etat_membre,cooperative_membres.categorie_membre,cooperative_membres.date_adesion,cooperatives.nom as nomc,membres.nom as nom'))
        
        //->where('cooperative_membres.etat_membre',1)
        ->Paginate(15);
       // $text=$cooperatives->statut;
       //$contents = Storage::get('$text');
    //    $cooperatives2 = DB::table('cooperative_membres')
    //    ->join('cooperatives', 'cooperatives.id','cooperative_membres.id_cooperative')
    //    ->join('membres', 'membres.id', 'cooperative_membres.id_membre')                 
    //    ->select(DB::raw('cooperative_membres.cooperative_membres.montant,cooperative_membres.etat_membre,cooperative_membres.categorie_membre,cooperative_membres.date_adesion,cooperatives.nom as nomc,membres.nom as nom'))
    //    // ->distinct('cooperatives.id')
    //    ->where('cooperative_membres.etat_membre',0)
    //    ->get();

      return view('cooperative_membres/index', ['cooperative_membres' => $cooperative_membres ]);// 'contents' => $contents]);
    }

     public function create()
     {
         # code...
         $membres = Membre::all();
         $cooperatives = Cooperative::all();
        return view('cooperative_membres/create',  ['membres' =>  $membres , 'cooperatives' =>  $cooperatives ]);
    }

    public function storecooperative_membres(Request $request)
    {
        // Validation
        // $dt = new Da();
        //$dt->format('Y-m-d');
        $request->validate([
            'membre' => 'required' ,
            'montant' => ['required', 'numeric', 'min:1'],
            'date_adesion' =>  ['required', 'numeric', 'max:' .date('d-m-Y')],
            'categorie' => 'required|string',
            'cooperative' => 'required',
            'etat' => 'required' ,
            'sortie' => ['min:date_adesion','max:'.date('d-m-Y')] or null

            
        ]);

        // $cooperative = DB::table('cooperatives')->where('mail',$request->mail);  
        // if($cooperative == null)
        // {
               
        $cooperatives_membre = new Cooperative_membre();
        $cooperatives_membre->date_adesion = $request->date_adesion;
        $cooperatives_membre->montant = $request->montant;
        $cooperatives_membre->etat_membre = $request->etat;
        $cooperatives_membre->categorie_membre = $request->categorie;
        $cooperatives_membre->id_membre = $request->membre;      
        $cooperatives_membre->date_de_sortie = $request->sortie;
        $cooperatives_membre->id_cooperative = $request->cooperative;     
        $cooperatives_membre->save();
        //  }
    
         return redirect('cooperative_membres')->withFlashMessage('Association member to cooperative added Successfully.');;
    }

    // //Dependancy injection (Injection des dependances)
    
     public function edit(Cooperative_membre $cooperative_membre)     
    {
        $membres= Membre::all();
        $cooperatives= Cooperative::all();
        $cooperative_membre = Cooperative_membre::find($cooperative_membre->id);
       return view('cooperative_membres/edit',['cooperative_membre' => $cooperative_membre,'membres' =>  $membres , 'cooperatives' =>  $cooperatives ]);
    }

    public function updatecooperative_membres(Request $request,Cooperative_membre $cooperative_membre)
    {
      // Validation
      $request->validate([
        'membre' => 'required' ,
        'montant' => 'required' ,
        'date_adesion' => 'required' ,
        'categorie' => 'required' ,
        'cooperative' => 'required' ,
        'etat' => 'required'
    ]);       
    $cooperative_membre->date_adesion = $request->date_adesion;
    $cooperative_membre->montant = $request->montant;
    $cooperative_membre->etat_membre = $request->etat;
    $cooperative_membre->categorie_membre = $request->categorie;
    $cooperative_membre->id_membre = $request->membre;
    $cooperative_membre->date_de_sortie = $request->sortie;
    $cooperative_membre->id_cooperative = $request->cooperative;     
    $cooperative_membre->save();
        return redirect('cooperative_membres')->withFlashMessage('Association member to cooperative updated Successfully.');;

    }

    public function search()
    {
        # code...
        $q = request()->input('q');
       //  dd($q);
       $cooperative_membres = DB::table('cooperative_membres')
        ->join('cooperatives', 'cooperatives.id','cooperative_membres.id_cooperative')
        ->join('membres', 'membres.id', 'cooperative_membres.id_membre')                 
        ->select(DB::raw('cooperative_membres.id,cooperative_membres.montant,cooperative_membres.etat_membre,cooperative_membres.categorie_membre,cooperative_membres.date_adesion,cooperatives.nom as nomc,membres.nom as nom'))      
        ->where('nom', 'like' ,"%$q%")   
        ->orwhere('nomc', 'like' ,"%$q%")  
        ->Paginate(15);
 
       return view('cooperative_membres/index',['cooperative_membres' => $cooperative_membres ]);
   }
    
    

}