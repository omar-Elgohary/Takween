<?php

namespace App\Http\Controllers;

use App\Models\Photo;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos=Photo::where("freelancer_id",auth()->user()->id)->get();

        return view("freelancer.showphotos",compact("photos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    return view("freelancer.addphoto");
    }


    public function store(Request $request)
    {


        $request->validate([
         "photo"=>['required','image',"max:200"],
         "name"=>['required'],
         "description"=>['required'],
         "camerabrand"=>['nullable'],
         "lens"=>['nullable'],
         "sizewidth"=>['required','numeric'],
         "sizeheight"=>['required',"numeric"],
         "sizetype"=>['required'],
         "location"=>['nullable'],
        ]);


        $file_extention = $request->file("photo")->getCLientOriginalExtension();
        $photo_name=time(). ".".$file_extention;
        $request->file("photo")->move(public_path('assets/images/photo/'),$photo_name);
        $photo=Photo::create([
            "name"=>$request->name,
            "freelancer_id"=>auth()->user()->id,
            "description"=>$request->description,
            "camera_brand"=>$request->camerabrand,
            "lens_type"=>$request->lens,
            "size_width"=>$request->sizewidth,
            "size_height"=>$request->sizeheight,
            "size_type"=>$request->sizetype,
            "location"=>$request->location,
            "photo"=>$photo_name
        ]);


        session()->flash('Create' , "created susseccfully");
        return route('freelanc.photo.index');

    }


    public function show(Photo $photo)
    {
        return view("freelancer.photo",compact('photo'));
    }


    public function edit(Photo $photo)
    {
       return view("freelancer.editphoto",compact("photo"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {


        $request->validate([
            "photo"=>['nullable',"image","max:200"],
            "name"=>['required'],
            "description"=>['required'],
            "camerabrand"=>['nullable'],
            "lens"=>['nullable'],
            "sizewidth"=>['required','numeric'],
            "sizeheight"=>['required',"numeric"],
            "sizetype"=>['required'],
            "location"=>['nullable'],
           ]);
           $photo_name=$photo->photo;
        if($request->hasFile("photo")) {

           if($photo->photo!=null){
            File::delete("assets/images/photo/".$photo->photo);
           }
         
            $file_extention=$request->file("photo")->getCLientOriginalExtension();
            $photo_name=time(). ".".$file_extention;
            $request->file("photo")->move(public_path('assets/images/photo/'),$photo_name);

        }

        $photo->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "camera_brand"=>$request->camerabrand,
            "lens_type"=>$request->lens,
            "size_width"=>$request->sizewidth,
            "size_height"=>$request->sizeheight,
            "size_type"=>$request->sizetype,
            "location"=>$request->location,
            "photo"=>$photo_name

        ]);

        return redirect()->route("freelanc.photo.show",compact("photo"));
    }


    public function destroy(Photo $photo)
    {

        File::delete("assets/images/photo/".$photo->photo);
        $photo->delete();

       session()->flash('Delete' , "deleted susseccfully");
       return redirect()->route("freelanc.photo.index");

    }
}
