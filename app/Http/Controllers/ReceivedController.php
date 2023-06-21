<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\NetworkConnection;
use Auth;

class ReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_received=NetworkConnection::where('receiver_id',Auth::user()->id)->where('status','Pending')->orderBy('id','DESC')->get();
        $requests='';
        foreach($get_received as $keys=>$values){
            $requests.='<div class="my-2 shadow text-white bg-dark p-1" id="request_div_'.$values->sender->id.'"><div class="d-flex justify-content-between"><table class="ms-1"> <td class="align-middle">'.$values->sender->name.'</td><td class="align-middle">-</td><td class="align-middle">'.$values->sender->email.'</td><td class="align-middle"></table><div><button id="accept_request_btn_'.$values->sender->id.'" class="btn btn-primary me-1" onclick="acceptRequest('.Auth::user()->id.','.$values->sender->id.')">Accept</button></div></div></div>';
        }
        // dd($requests);
        return response()->json(['data'=>$requests]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $update_status=NetworkConnection::where('sender_id',$request->requestId)->where('receiver_id',$request->userId)->first();
        $update_status->status="Accepted";
        $update_status->save();
        return response()->json(['data'=>$update_status->sender_id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
