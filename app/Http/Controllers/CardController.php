<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CardResource;
use App\Models\{Member,User,Listt,Activity,Board,Card,Comment};

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        return response()->json([
            "status" => true,
            "message" => "Cards data Completly",
            //"data" => new CardResource ($cards)
            "data" => $cards
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
            'position' => 'required',
            'description' => 'required',
            'list_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);
        }
        //$card = Auth::user()->card()->create($request->all());

        $card = Card::create($request_data);
        $card->position = $request_data['position'];
        $card->description = $request_data['description'];
        $card->list_id = $request_data['list_id'];
        //$card->user_id=auth()->user()->id;
        $card->save();

        
        return response()->json([
            "status" => true,
            "message" => "Card Created successfully.",
           // "data" => $card
             "data" => new CardResource ($card)
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
        $card=Listt::find($id);
        if (!$card) {
            return response()->json([
                'status' => false,
                'message' => 'Card not found'
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "Card is found.",
           // "data" => $card
            "data" => new CardResource ($card)
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
            'position' => 'required',
            'description' => 'required',
            'list_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ]);      
        }

       $card = Card::create($request_data);
       $card->position = $request_data['position'];
       $card->description = $request_data['description'];
       $card->list_id = $request_data['list_id'];
       $card->save();

        return response()->json([
            "status" => true,
            "message" => "Card updated successfully.",
            "data" => $card
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
        $card = Card::find($id);
        $card->delete();
        return response()->json([
            "status" => true,
            "message" => "List deleted successfully.",
            "data" => $card
        ]); 
    }
}
