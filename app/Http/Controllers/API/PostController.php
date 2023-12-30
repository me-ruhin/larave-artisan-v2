<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
   
    public function store(PostRequest $postRequest){
            // validation
            // file upload
            if ($postRequest->hasFile('image')) {
                // $image = $postRequest->file('image');
                // $imageName = time().'.'.$image->getClientOriginalExtension();
                // $image->move(public_path('images'), $imageName);
                $imagePath = $postRequest->file('image')->store('images', 'public');
                return response()->json(['image_url' => asset("/storage/{$imagePath}")]);


            }
        }
    
}
