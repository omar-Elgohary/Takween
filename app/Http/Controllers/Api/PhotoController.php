<?php
namespace App\Http\Controllers\Api;
use App\Models\photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiResponseTrait;

class photoController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $photos = Photo::get();
        return $this->returnData(200, 'Photos Returned Successfully', $photos);
    }


    public function store(Request $request)
    {
        try {
            $file_extention = $request->file("photo")->getCLientOriginalExtension();
            $photo_name = time(). "." .$file_extention;
            $request->file("photo")->move(public_path('assets/images/photo/'), $photo_name);

            $photo = Photo::create([
                "name" => $request->name,
                "freelancer_id" => auth()->user()->id,
                "description" => $request->description,
                "camera_brand" => $request->camera_brand,
                "lens_type" => $request->lens_type,
                "size_width" => $request->size_width,
                "size_height" =>$request->size_height,
                "size_type" => $request->size_type,
                "location" => $request->location,
                "photo" => $photo_name,
            ]);
            return $this->returnData(201, 'Photo Created Successfully', $photo);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Photo Created Failed');
        }
    }


    public function show($id)
    {
        $photo = Photo::find($id);
        if(!$photo){
            return $this->returnError('404', 'Photo Not Found');
        }
        return $this->returnData(200, 'Photo Returned Successfully', $photo);
    }


    public function update(Request $request, $id)
    {
        try {
            $photo = Photo::find($id);
            if(!$photo)
                return $this->returnError('404', 'Photo Not Found');

            $photo->update($request->all());
            return $this->returnData(200, 'Photo Updated Successfully', $photo);
        }catch(\Exception $e){
            return $this->returnError('404', 'Photo Not Found');
        }
    }


    public function destroy($id)
    {
        try {
        $photo = Photo::find($id)->delete();
        if(!$photo){
            return $this->returnError('404', 'Photo Not Found');
        }
            return $this->returnSuccess(200, 'Photo Deleted Successfully');
        }catch(\Exception $e){
            echo $e;
            return $this->returnError('404', 'Photo Not Found');
        }
    }
}
