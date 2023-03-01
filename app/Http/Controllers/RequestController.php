<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('user.requestpublicservice', compact('categories'));
    }


    public function store(Request $request)
    {
        return $request;
        $this->validate($request, [
            'category_id' => 'required',
            'service_id' => 'required',
            'title' => 'required|string',
            'attachment' => 'required',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $data = $request->only('category_id', 'service_id', 'title', 'attachment', 'description', 'due_date');
        if($request->hasFile('attachment')){
            $data['attachment'] = Storage::disk('public')->put('requests', $request->file('attachment'));
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
