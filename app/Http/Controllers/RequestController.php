<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('user.requestpublicservice', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'service_id' => 'required',
            'title' => 'required|string',
            'attachment' => 'required|mimes:pdf',
            'description' => 'required',
            'due_date' => 'required|date',
        ],[
            'category_id.required' => 'Category is required',
            'service_id.required' => 'Service is required',
            'title.required' => 'Request Title is required',
            'title.mimes' => 'Request Title must be pdf',
            'attachment.required' => 'Request Attachment is required',
            'description.required' => 'Description is required',
            'due_date.required' => 'Due Date is required',
        ]);

        $data = $request->only('category_id', 'service_id', 'title', 'attachment', 'description', 'due_date');
        $data['user_id'] = Auth::User()->id;
        if($request->hasFile('attachment')){
            // $data['attachment'] = Storage::disk('public')->put('attachments', $request->file('attachment'));
        }
        Requests::create($data);
        return back();
    }


    public function getCategoryServices($id)
    {
        $services = DB::table("services")->where("category_id" , $id)->pluck("service_en" , "id");
        return json_encode($services);
    }
}
