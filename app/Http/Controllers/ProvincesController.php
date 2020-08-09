<?php
namespace App\Http\Controllers;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProvincesController extends Controller
{

    public function index()
    {
        $provinces = Province::all();

        return view('provinces/index', [
            'provinces' => $provinces ]);
    }

    public function create()
    {
        # code...
        // $provinces =  Province::all();
        return view('provinces/create' );
    }

    public function storeprovinces(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required'
        ]);
        // $prov= DB::table('provinces')->where('nom',$request->nom);  
        //  if( $prov == null)
        //   {
        $provinces = new Province();
        $provinces->nom = $request->nom;    
        $provinces->save();
        //   }
        return redirect('provinces');
    }

     //Dependancy injection (Injection des dependances)
    
     public function edit(Province $provinces)
     {
        $provinces = Province::find($provinces->id);
         return view('provinces/edit', [
             'provinces' => $provinces
         ]);
     }
 
     public function updateprovinces(Request $request, Province $provinces)
     {
         // Validation
         $request->validate([
             'nom' => 'required' ,
            
         ]);
        //  $province= DB::table('provinces')->where('nom',$request->nom);  
        //  if( $province == null)
        //   {
         $provinces->nom = $request->nom;
         $provinces->save();
        //   }
         return redirect('provinces');
     }
 
}