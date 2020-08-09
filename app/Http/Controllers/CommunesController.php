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
        return view('communes/index', [
            'communes' => $communes ]);
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
            'nom' => 'required' ,
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
    
     public function edit(Commune $communes)
     {
        $provinces =  Province::all();
        $communes = Commune::find($communes->id);
         return view('communes/edit', [
             'communes' => $communes , ' provinces' =>  $provinces
         ]);
     }
 
     public function updatecommunes(Request $request, Commune $communes)
     {
         // Validation
         $request->validate([
             'nom' => 'required' ,
             'id_province' => 'required'
         ]);
        //  $commune= DB::table('communes')->where('nom',$request->nom);  
        //  if( $commune == null)
        //   {
         $communes->nom = $request->nom;
         $communes->id_province = $request->id_province;
         $communes->save();
        //   }
         return redirect('communes');
     }
 
}