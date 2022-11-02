<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ListtResource;
use App\Models\{Member,User,Listt,Activity,Board,Card,Comment};

class ListtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listts = Listt::all();
        return response()->json([
            "status" => true,
            "message" => "All Lists data Show on Board",
            "data" => $listts
            // "data" => new ListtResource ($listts) kfj
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data = $request->all();
        
        $validator = Validator::make($request_data, [
            'title' => 'required',
            'position' => 'required',
            'board_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);
        }
        $listt = Listt::create($request_data);
        $listt->title = $request_data['title'];
        $listt->position = $request_data['position'];
        $listt->board_id = $request_data['board_id'];
        // $listt->user_id=auth()->user()->id;
        $listt->save();

        
        return response()->json([
            "status" => true,
            "message" => "List Created successfully.",
            "data" => new ListtResource ($listt)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lists=Listt::find($id);
        if (!$lists) {
            return response()->json([
                'status' => false,
                'message' => 'List not found'
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "List is found.",
            "data" => new ListtResource ($lists)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request_data = $request->all();
        
        $validator = Validator::make($request_data, [
            'title' => 'required',
            'position' => 'required',
            'board_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);      
        }

       $listt = Listt::create($request_data);
       $listt->title = $request_data['title'];
       $listt->position = $request_data['position'];
       $listt->board_id = $request_data['board_id'];
       $listt->save();
        
        return response()->json([
            "status" => true,
            "message" => "List updated successfully.",
            "data" => $listt
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listt = Listt::find($id);
        $listt->delete();
        return response()->json([
            "status" => true,
            "message" => "List deleted successfully.",
            "data" => $listt
        ]); 
    }
}
