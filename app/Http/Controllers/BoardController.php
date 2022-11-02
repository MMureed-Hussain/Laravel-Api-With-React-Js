<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BoardResource;
use App\Models\{Member,User,Listt,Activity,Board,Card,Comment};

class BoardController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::all();
        
        return response()->json([
            "status" => true,
            "message" => "All Activities Show on Board",
            //"data" => new BoardResource ($boards)
            "data" => $boards
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
            'background' => 'required',
            'background_type' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);
        }
        $board = Auth::user()->board()->create($request->all());

    //     $board = Board::create($request_data);
    //     $board->title = $request_data['title'];
    //     $board->background = $request_data['background'];
    //     $board->background_type = $request_data['background_type'];
    //     $board->user_id = $request_data['user_id'];
    //    // $board->user_id=auth()->user()->id;
        // $board->save();

        
        return response()->json([
            "status" => true,
            "message" => "Board Created successfully.",
            "data" => $board
            //"data" => new BoardResource ($board)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , $id)
    {
        $boards=Board::find($id);
        if (!$boards) {
            return response()->json([
                'status' => false,
                'message' => 'Board not found'
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Board is found.",
            "data" => $boards
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
            'background' => 'required',
            'background_type' => 'required',
            'user_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);      
        }

       $boards = Board::create($request_data);
       $board->title = $request_data['title'];
       $board->background = $request_data['background'];
       $board->background_type = $request_data['background_type'];
       $board->user_id = $request_data['user_id'];
       $board->save();
        
        return response()->json([
            "status" => true,
            "message" => "Board updated successfully.",
            "data" => $board
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
        $board = Board::find($id);
        $board->delete();
        return response()->json([
            "status" => true,
            "message" => "Board deleted successfully.",
            "data" => $board
        ]);
    }
}
