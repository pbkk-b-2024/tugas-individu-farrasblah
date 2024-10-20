<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserImageController extends Controller
{
    public function index(int $id){
        $author = Auth::user()->role === 'author';
        $user = User::findOrfail($id);

        $userImages = UserImage::where('user_id', $id)->get();
        return view('user-image.index', compact('user', 'author', 'userImages'));
    }

    public function store(Request $request, int $id){
        $request->validate([
           'images.*'=> 'required|image|mimes:png,jpg,webp' 
        ]);

        $user = User::findOrFail($id);

        $imageData = [];
        if($files = $request->file('images')){
            foreach($files as $key => $file){

                $extension = $file->getClientOriginalExtension();
                $filename = $key.'-'.time().'.'.$extension;

                $path = "upload/users/";

                $file->move($path, $filename);

                $imageData[] =[
                    'user_id' => $user->id,
                    'image' => $path.$filename,
                ];
            }
        }

        UserImage::insert($imageData);

        return redirect()->back()-> with('status', 'Upload Successfully');
    }

    public function destroy(int $userImageId)
    {
        
        $userImage = UserImage::findOrFail($userImageId);
        if (File::exists($userImage->image)) {
            File::delete($userImage->image);
        }
        $userImage->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
