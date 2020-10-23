<?php
namespace App\Http\Controllers;
use App\Province;
use App\Commune;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommunesController extends Controller
{

    public function index()
    {
        $communes = DB::table('communes')  
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('communes.id,communes.nom,communes.created_at,provinces.nom as province'))
        ->distinct('communes.id')
        ->Paginate(15);
        // return view('communes/index',compact('$communes'))->withuser($commune); 
         return view('communes/index', ['communes' => $communes ]); 

    }

    public function create()
    {
        # code...
        $provinces = Province::all();
        return view('communes/create' , ['provinces' =>  $provinces ] );
    }

    public function storecommunes(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|unique:communes' ,
            'id_province' => 'required|numeric'

        ]);
        // $commune= DB::table('communes')->where('nom',$request->nom);  
        // if( $commune == null)
        //  {
        $communes = new Commune();
        $communes->nom = $request->nom;
        $communes->id_province = $request->id_province;
        $communes->save();
        //  }
        return redirect('communes')->withFlashMessage('Commune added Successfully.');
    }

     //Dependancy injection (Injection des dependances)
    
     public function edit(Commune $commune)
     {
        $provinces =  Province::all();
        $commune = Commune::find($commune->id);
         return view('communes/edit', [
             'commune' => $commune , 'provinces' =>  $provinces
         ]);
     }
 
     public function updatecommunes(Request $request, Commune $commune)
     {
         // Validation
         $request->validate([
             'nom' => 'required|string| min:2',
             'id_province' => 'required|numeric' 
         ]);
        //  $commune= DB::table('communes')->where('nom',$request->nom);  
        //  if( $commune == null)
        //   {
         $commune->nom = $request->nom;
         $commune->id_province = $request->id_province;
         $commune->save();
        //   }
         return redirect('communes')->withFlashMessage('Commune updated Successfully.');
     }
     public function search()
     {
         # code...
         $q = request()->input('q');
        //  dd($q);
        $communes = DB::table('communes')  
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('communes.id,communes.nom,communes.created_at,provinces.nom as province'))  
        -> where('communes.nom', 'like' ,"%$q%") 
        ->Paginate(15);
    //   $communes = Commune::where('nom', 'like' ,"%$q%")   
    //     // ->orwhere()
    //     ->paginate(6);

        // return view('communes.search')->with('communes' => $communes);
        return view('communes/index' ,['communes' => $communes]);
    }

    public function createPDF() {
        // retreive all records from db
        $data = DB::table('communes')  
        ->join('provinces', 'provinces.id', 'communes.id')                 
        ->select(DB::raw('communes.nom,provinces.nom as province')) 
        ->get();
        // share data to view
        view()->share('commune',$data);
        $pdf = PDF::loadView('communes/pdf_view', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file_communes.pdf');
      }
      public function destroycommune(Commune $commune)
      {
          //
          $commune = Commune::find($commune->id);    
            $commune->delete();
           return redirect('communes')->withFlashMessage('Commune deleted Successfully.');
    //     }

      }
}