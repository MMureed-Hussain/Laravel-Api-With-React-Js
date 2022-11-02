<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentResource;
use App\Models\{Member,User,Listt,Activity,Board,Card,Comment};

class CommentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        
        return response()->json([
            "status" => true,
            "message" => "All Comments",
            "data" => $comments
            // "data" => new CommentResource ($comments)
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
            'comment' => 'required',
            'user_id' => 'required',
            'card_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);
        }

        $comment = Comment::create($request_data);
        $comment->comment = $request_data['comment'];
        $comment->user_id = $request_data['user_id'];
        $comment->card_id = $request_data['card_id'];
       // $comment->user_id=auth()->user()->id;
        $comment->save();

        
        return response()->json([
            "status" => true,
            "message" => "Comments created successfully.",
            "data" => new CommentResource ($comment)
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
        $comment=Comment::find($id);
        if (!($comment)) {
            return response()->json([
                'status' => false,
                'message' => 'Comment not found'
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Comment is found.",
            "data" => new CommentResource ($comment)
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
            'comment' => 'required',
            'user_id' => 'required',
            'card_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);      
        }
        $comments = Comment::create($request_data);
        $comments->comment = $request_data['comment'];
        $comments->user_id = $request_data['user_id'];
        $comments->card_id = $request_data['card_id'];
        $comments->save();
        
        return response()->json([
            "status" => true,
            "message" => "Comment updated successfully.",
            "data" => $comments
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
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json([
            "status" => true,
            "message" => "Comment deleted successfully.",
            "data" => $activity
        ]);
    }
}
