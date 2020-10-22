<?php
namespace App\Http\Controllers;
use App\Province;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProvincesController extends Controller
{

    public function index()
    {
        $provinces =  Province::all();
         //$provinces = DB::table('provinces');
         //->Paginate(7);

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
            'nom' => 'required|unique:provinces|string| min:2'
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
             'nom' => 'required' ,  
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

    public function createPDF() {
        // retreive all records from db
        $data = Province::all();
  
        // share data to view
        view()->share('province',$data);
        $pdf = PDF::loadView('provinces/pdf_view', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file_provinces.pdf');
      }
   
// ...
// public function getPostPdf (Post $post)
// {
//     // L'instance PDF avec une vue : resources/views/posts/show.blade.php
//     $pdf = PDF::loadView('posts.show', compact('post'));

//       // Lancement du téléchargement du fichier PDF
//       return $pdf->download(\Str::slug($post->title).".pdf");
//       return PDF::loadView('posts.show', compact('post'))
//       ->setPaper('a4', 'landscape')
//       ->setWarnings(false)
//       ->save(public_path("storage/documents/fichier.pdf"))
//       ->stream();

//     }
 
}