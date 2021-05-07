<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

   public function edit($id){
       //eedit

       $user = User::find($id);

       return view('edit-user')->with(['user' => $user]);
   }

   public function update(Request $request, $id){

    //Validate
    $validate = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);


    //Update
    $user = User::find($id);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $user->save();

    if($user->save()){
        return redirect('home')->with('status', 'Profile Successfully Updated');
    }

   }
}
