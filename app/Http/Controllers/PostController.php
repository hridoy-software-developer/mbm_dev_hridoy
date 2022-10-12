<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class PostController extends Controller
{
    # index
    public function index(){
        return Inertia::render('post/index');
    }

    # list
    public function list(Request $request){
        $result = \App\Models\Post::query();
        if($request->has('field')){
            $result->orderBy($request->field,$request->sort);
        }else{
            $result->orderBy('id','desc');
        }
        
        if($request->has('search')){
            $result->where("title","like","%".$request->search."%");
            $result->orWhere("description","like","%".$request->search."%");
        }

        $result = $result->paginate(5);
        $result->appends(request()->all())->render();

        return response()->json([
            "statusCode" => 200,
            "message"    => "success",
            "isError"    => false,
            "results"    => $result,
        ]);
    }

    # create
    public function create(){
        return Inertia::render('post/create');
    }

    # store
    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:posts,title'
        ]);

        $input = $request->only('title', 'description');

        \App\Models\Post::create($input);
        return redirect('admin/post')->with('success','Post Added Successfully');
    }

    # edit
    public function edit($id){
        $post = \App\Models\Post::where('id',$id)->first() ?? [];
        return Inertia::render('post/edit', ['post' => $post]);
    }

    # update
    public function update(Request $request){
        $request->validate([
            'id' => 'required',
            'title' => 'required'
        ]);

        $input = $request->only('title', 'description');

        \App\Models\Post::where('id',$request->id)->update($input);
        return redirect('admin/post')->with('success','Post Updated Successfully');
    }

    # delete
    public function delete(Request $request){
        \App\Models\Post::where('id',$request->id)->delete();
        return redirect('admin/post')->with('success','Post Delete Successfully');
    }

    # download
    public function download($type){
        if($type == 'csv'){
            $filename = "post-data_" . date('Y-m-d') . ".csv"; 
            $delimiter = ",";

            $result = \App\Models\Post::get();

            $columns = [];
            $data = [];
            $count = 0;

            $result->map(function($row) use (&$data,&$count,&$columns){
                $data[$count] = [];
                $data[$count][0] = $row->title; array_push($columns, 'title');
                $data[$count][1] = $row->description; array_push($columns, 'description');
                $count++;
            });

            $f = fopen('php://memory', 'w');  
            fputcsv($f, $columns, $delimiter); 

            foreach($data as $row){ 
                fputcsv($f, $row, $delimiter); 
            }

            fseek($f, 0); 

            header('Content-Type: text/csv'); 
            header('Content-Disposition: attachment; filename="' . $filename . '";');

            fpassthru($f);
        }
    }
}
