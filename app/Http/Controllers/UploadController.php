<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Use Auth
use auth;

//Bring in the User Model
use App\Models\User;

//To Store, Use the Storage Facade
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    //Middleware
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    //Upload Function
    public function upload(Request $req){
     
    //Check if File is Actually Being Uploaded
    if($req->hasFile('passport')){
      
        //Get The Original Name of the Image
        $filename = $req->passport->getClientOriginalName();


        //Delete Previously Uploaded Image
        $this->deleteOldPassport();

        //Get The Image Name without Extension
        $newName = pathinfo($filename, PATHINFO_FILENAME);

        //get Extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        //Add Prefix to name
        $prefixedName = $newName.'_Passport.'.$extension;

        // dd($prefixedName);

        //Store the Uploaded Image (Store in the Passports Folder with the Original Name and in the Public Disk)
        $req->passport->storeAs('passports', $prefixedName, 'public_uploads');

        //Update the User's Profile Photo
        auth::user()->update(['avatar' => $prefixedName]);

        //Check if Upload is Sussessful
        return redirect('home')->with('status', 'Profile Photo Updated');

    }
     //if Not Sucessful
     return redirect('home')->with('error', 'Please Select Photo');
    }

    protected function deleteOldPassport(){
        //Check if user already uploaded an image (Delete Old Image)
        if(auth::user()->avatar){
            Storage::delete('/public/passports/'.auth()->user()->avatar);
        }
    }
}
