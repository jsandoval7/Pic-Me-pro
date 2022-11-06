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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $extension = $request->file('image')->extension();
        $imageName = time().'.'.$extension; 

        $user_id = 1;
        
        $image_path = $request->image->move(public_path('/images/uploads'), $imageName);
        
        $data = UserImages::create([
            'image_path' =>  $image_path,
            'users_id' => $user_id,
        ]);

        return response($data, Response::HTTP_CREATED);
    }

    public function thisText(){
       $response = Http::get('https://jsonplaceholder.typicode.com/posts');
    
        $jsonData = $response->json();
        return json_encode($jsonData);
    }
}