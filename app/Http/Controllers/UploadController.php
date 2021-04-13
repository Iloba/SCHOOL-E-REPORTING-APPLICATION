<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Use Auth
use auth;

//Bring in the User Model
use App\Models\User;

//To Store, Use the Storage Facade
use illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //Upload Function
    public function upload(Request $req){
     
    //Check if File is Actually Being Uploaded
    if($req->hasFile('passport')){
      
        //Get The Original Name of the Image
        $filename = $req->passport->getClientOriginalName();


        //Prefix name with Passport
        $newName = pathinfo($filename, PATHINFO_FILENAME);

        //get Extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        //PrefixedName
        $prefixedName = $newName.'_Passport.'.$extension;

        // dd($prefixedName);

        //Store the Uploaded Image (Store in the Passports Folder with the Original Name and in the Public Disk)
        $req->passport->storeAs('passports', $prefixedName, 'public');

        //Update the User's Profile Photo
        auth::user()->update(['avatar' => $prefixedName]);

        //Check if Upload is Sussessful
        return redirect('home')->with('status', 'Profile Photo Updated');

    }
        //if Not Suussful
        return redirect('home')->with('error', 'Profile Photo Update Failed');
    



    }
}
