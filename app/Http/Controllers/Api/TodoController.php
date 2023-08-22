<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Resources\TodoResources;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(new TodoResources(true,'Success get Data',Auth::user()->todos), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'title'=>'required|min:3',
            'description'=>'required|min:3',
            'status'=>'required'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        try {
            $todo=Todo::create(array_merge($request->all(),[
                'slug'=>uniqid(),
                'user_id'=>Auth::user()->id
            ]));
            return response()->json(new TodoResources(true,'success create data',$todo), 200);
        } catch (\Throwable $th) {
            return response()->json(['status'=>true,'message'=>$th->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return response()->json(new TodoResources(true,'Success get Data',$todo), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        // $validation=Validator::make($request->all(),[
        //     'title'=>'required|min:3',
        //     'description'=>'required|min:3',
        //     'status'=>'required'
        // ]);
        // if ($validation->fails()) {
        //     return response()->json($validation->errors(), 422);
        // }
        try {
            $todo=$todo->update($request->all());
            return response()->json(new TodoResources(true,'success update data',$todo), 200);
        } catch (\Throwable $th) {
            return response()->json(['status'=>true,'message'=>$th->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        try {
            $todo->delete();
            return response()->json(['status'=>true,'message'=>'Data was Deleted'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status'=>true,'message'=>$th->getMessage()], 422);
        }
    }
}

