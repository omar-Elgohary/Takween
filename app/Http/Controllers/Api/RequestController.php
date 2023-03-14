<?php
namespace App\Http\Controllers\Api;
use App\Models\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiResponseTrait;

class RequestController extends Controller
{
    use ApiResponseTrait;

    public function publicRequests(Request $request)
    {
        try{
            $requests = Requests::where('type', 'public')->orderBy('status')->get();
            return $this->returnData(200, 'Requests Returned Successfully', $requests);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Requests Returned Failed');
        }
    }


    public function privateRequests(Request $request)
    {
        try{
            $requests = Requests::where('type', 'private')->orderBy('status')->get();
            return $this->returnData(200, 'Requests Returned Successfully', $requests);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Requests Returned Failed');
        }
    }


    public function createRequest(Request $request)
    {
        try{
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'category_id' => 'required',
            'service_id' => 'required',
            'title' => 'required|string',
            'attachment' => 'required',
            // 'attachment' => 'required|mimes:pdf,word',
            'description' => 'required',
            'due_date' => 'required|date',
            'type' => [\Illuminate\Validation\Rule::in(['public','private'])]
        ],[
            'category_id.required' => 'Category is required',
            'service_id.required' => 'Service is required',
            'title.required' => 'Request Title is required',
            'title.mimes' => 'Request Title must be pdf',
            'attachment.required' => 'Request Attachment is required',
            'description.required' => 'Description is required',
            'due_date.required' => 'Due Date is required',
        ]);

        if($request->type == 'public'){
            $re= Requests::create([
                'title'=> $request->title,
                'category_id' => $request->category_id,
                'service_id' => $request->service_id,
                'description' => $request->description,
                'due_date' => $request->due_date,
                'user_id' => $user_id,
                'type'=>'public',
            ]);
        }elseif($request->type == 'private'){
            $re= Requests::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'service_id' => $request->service_id,
                'description' => $request->description,
                'due_date' => $request->due_date,
                'freelancer_id' => $freelancer_id,
                'type'=>'private',
            ]);
        }

        $name = explode(".",$request->file("attachment")->getCLientOriginalName())[0];
        $size = number_format($request->file("attachment")->getSize()/ 1024,2);
        $type = $request->file("attachment")->getCLientOriginalExtension();
        $file_extension = $request->file("attachment")->getCLientOriginalExtension();
        $attachment_name=time(). ".".$file_extension;
        $request->file("attachment")->move(public_path('front/upload/files/'),$attachment_name);

        $re->file()->create([
            'name'=> $name,
            'user_id' => auth()->user()->id,
            'type' => $type,
            'url' => $attachment_name,
            'size' => $size,
        ]);
            return $this->returnData(201, 'Request Created Successfully', $request);
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Request Created Failed');
        }
    }


    public function getPublicRequestById(Request $request, $id)
    {
        try{
            $request = Requests::find($id);
            if($request->type == 'public'){
                return $this->returnData(200, 'Request Returned Successfully', $request);
            }else{
                return $this->returnError(404, 'Request Not Found');
            }
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Request Returned Failed');
        }
    }


    public function getPrivateRequestById(Request $request, $id)
    {
        try{
            $request = Requests::find($id);
            if($request->type == 'private'){
                return $this->returnData(200, 'Request Returned Successfully', $request);
            }else{
                return $this->returnError(404, 'Request Not Found');
            }
        }catch(\Exception $e){
            echo $e;
            return $this->returnError(400, 'Request Returned Failed');
        }
    }
}
