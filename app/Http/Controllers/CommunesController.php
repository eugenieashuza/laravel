<?php
namespace App\Http\Controllers;
use App\Province;
use App\Commune;
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
        ->get();
        // return view('communes/index',compact('$communes'))->withuser($commune); 
         return view('communes/index', ['communes' => $communes ]); 

    }

    public function create()
    {
        # code...
        $provinces = Province::all();
        return view('communes/create' , [ 'provinces' =>  $provinces ] );
    }

    public function storecommunes(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|unique:communes' ,
            'id_province' => 'required'

        ]);
        // $commune= DB::table('communes')->where('nom',$request->nom);  
        // if( $commune == null)
        //  {
        $communes = new Commune();
        $communes->nom = $request->nom;
        $communes->id_province = $request->id_province;
        $communes->save();
        //  }
        return redirect('communes');
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
             'nom' => 'required|unique:communes' ,
             'id_province' => 'required'
         ]);
        //  $commune= DB::table('communes')->where('nom',$request->nom);  
        //  if( $commune == null)
        //   {
         $commune->nom = $request->nom;
         $commune->id_province = $request->id_province;
         $commune->save();
        //   }
         return redirect('communes');
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
        ->get();
    //   $communes = Commune::where('nom', 'like' ,"%$q%")   
    //     // ->orwhere()
    //     ->paginate(6);

        // return view('communes.search')->with('communes' => $communes);
        return view('communes/index' ,['communes' => $communes]);
    }
 
}