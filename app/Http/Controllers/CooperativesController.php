<?php
namespace App\Http\Controllers;
use App\Cooperative;
use Illuminate\Http\Request;

class CooperativesController extends Controller
{

    public function index()
    {
        $cooperatives = Cooperative::all();

        return view('cooperatives/index', [
            'Cooperatives' => $cooperatives
        ]);
    }

     public function create()
     {
         # code...
        return view('cooperatives/create');
    }

  /*  public function store(Request $request)
    {
        // Validation
        $request->validate([
            'cat_name' => 'required'
        ]);

        $category = new Category();
        $category->cat_name = $request->cat_name;

        $category->save();
        return redirect('categories');
    }

    //Dependancy injection (Injection des dependances)
    
    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        return view('categories/edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        // Validation
        $request->validate([
            'cat_name' => 'required'
        ]);

        $category->cat_name = $request->cat_name;
        $category->save();
        return redirect('categories');
    }

    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();
        return redirect('categories');
    }*/
}
