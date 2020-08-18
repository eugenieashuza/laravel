<?php
namespace App\Http\Controllers;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProvincesController extends Controller
{

    public function index()
    {
        $provinces = DB::table('provinces')->Paginate(2);

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
            'nom' => 'required|unique:provinces'
        ]);
        // $prov= DB::table('provinces')->where('nom',$request->nom);  
        //  if( $prov == null)
        //   {
        $provinces = new Province();
        $provinces->nom = $request->nom;    
        $provinces->save();
        //   }
        return redirect('provinces')->withFlashMessage('Province added Successfully.');
        //->with('Success', 'Insertion avec success');
        // 'year' => ['required', 'numeric', 'min:1950', 'max:' . date('Y')],
        //     'description' => ['required', 'string', 'max:500'],
    }

     //Dependancy injection (Injection des dependances)
    
     public function edit(Province $province)
     {
        $provinces = Province::find($province->id);
         return view('provinces/edit', [
             'provinces' => $provinces
         ]);
     }
 
     public function updateprovinces(Request $request, Province $province)
     {
         // Validation
         $request->validate([
             'nom' => 'required|unique:provinces' ,  
         ]);
       
         $province->nom = $request->nom;
         $province->save();
        
         return redirect('provinces')->withFlashMessage('Province updated Successfully.');;
     }

      public function search(){
         # code...
         $q = request()->input('q');
        //  dd($q);
        $provinces = DB::table('provinces')   
        -> where('nom', 'like' ,"%$q%") 
        ->Paginate(2);
        
    //   $communes = Commune::where('nom', 'like' ,"%$q%")   
    //     // ->orwhere()
    //     ->paginate(6);

        // return view('communes.search')->with('communes' => $communes);
        return view('provinces/index' ,['provinces' => $provinces ]);
    }
 
}