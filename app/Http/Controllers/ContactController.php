<?php
namespace App\Http\Controllers;
 
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{
//     public function create()
//     {
//         return view('contact');
//     }
 
//     public function store(ContactRequest $request)
//     {
//         Mail::to('eugenieashuza@gmail.com')
//             ->send(new Contact($request->except('_token')));
 
//         return view('confirm');
//     }
public function formMessageGoogle () {
    return view("emails.contact");
}

// Envoi du mail aux utilisateurs
public function sendMessageGoogle (Request $request) {

    #1. Validation de la requête
    $this->validate($request, [ 'message' => 'bail|required' ]);

    #2. Récupération des utilisateurs
     $users = User::all();

    #3. Envoi du mail
    Mail::to($users)->bcc("eugenieashuza@gmail.com")
                    ->queue(new Contact($request->all()));

    return back()->withText("Message envoyé");
}

} 


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// //Importation des classes pour le mail
// use App\User;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\MessageGoogle;

// class MessageController extends Controller
// {
// 	// Le formulaire du message
	
// }