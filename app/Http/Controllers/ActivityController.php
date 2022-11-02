<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ActivityResource;
use App\Models\{Member,User,Listt,Activity,Board,Card,Comment};

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        
        return response()->json([
            "status" => true,
            "message" => "All Activities",
            //"data" => $activities
            "data" => ActivityResource::collection ($activities)
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
            'type' => 'required',
            'message' => 'required',
            'user_id' => 'required',
            'board_id' => 'required',
            'card_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);
        }
        $activity = Auth::user()->activities()->create($request->all());
        // $activity = Activity::create($request_data);
        // $activity->type = $request_data['type'];
        // $activity->user_id = $request_data['user_id'];
        // $activity->board_id = $request_data['board_id'];
        // $activity->card_id = $request_data['card_id'];
        // $activity->message = $request_data['message'];
    //    // $activity->user_id=auth()->user()->id;
        $activity->save();

        
        return response()->json([
            "status" => true,
            "message" => "Activity created successfully.",
            "data" => new ActivityResource ($activity)
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
        $activities=Activity::find($id);
        if (!$activities) {
            return response()->json([
                'status' => false,
                'message' => 'Activity not found'
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "Activity is found.",
            "data" => new ActivityResource ($activities)
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
            'type' => 'required',
            'message' => 'required',
            'user_id' => 'required',
            'board_id' => 'required',
            'card_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);      
        }
        $activity = Auth::user()->activities()->create($request->all());
        // $activity = Activity::create($request_data);
        // $activities->type = $request_data['type'];
        // $activities->user_id = $request_data['user_id'];
        // $activities->board_id = $request_data['board_id'];
        // $activities->card_id = $request_data['card_id'];
        // $activities->message = $request_data['message'];
        // $activities->save();
        
        return response()->json([
            "status" => true,
            "message" => "Activity updated successfully.",
            "data" => $activities
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
        $activity = Activity::find($id);
        $activity->delete();
        return response()->json([
            "status" => true,
            "message" => "Activity deleted successfully.",
           // "data" => new ActivityResource ($activity)
            "data" => $activity
            
        ]);
    }
}
