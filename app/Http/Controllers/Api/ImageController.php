<?php

namespace App\Http\Controllers\Api;

use App\Models\UserImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    //
    public function imageStore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
        ]);
        
        $extension = $request->file('image')->extension();
        $imageName = time().'.'.$extension; 

        $user_id = $request->userAccount;
        
        $image_path = $request->image->move(public_path('/images/uploads'), $imageName);
        
        $data = UserImages::create([
            'image_path' =>  $image_path,
            'users_id' => $user_id,
        ]);

        return response($data, Response::HTTP_CREATED);
    }

    public function thisText(Request $request){

        $howMany = $request->howMany;

       $response = Http::get('https://jsonplaceholder.typicode.com/users/'.$howMany);
    
        $jsonData = $response->json();
        return json_encode($jsonData);
    }
}