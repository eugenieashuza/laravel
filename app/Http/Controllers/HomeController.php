<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        return view('acceuil/index');

    }
}