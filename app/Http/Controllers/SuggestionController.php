<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\NetworkConnection;
use Auth;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_auth_sender=NetworkConnection::where('sender_id',Auth::user()->id)->orderBy('id','ASC')->get();

        $get_auth_receiver=NetworkConnection::where('receiver_id',Auth::user()->id)->orderBy('id','ASC')->get();
        $get_suggestions=[];
        foreach($get_auth_receiver as $keys=>$values){
            $get_suggestions[] = User::where('id','!=',Auth::user()->id)->where('id','!=',$values->sender_id)->first();
        }

        $get_requests=NetworkConnection::where('sender_id',Auth::user()->id)->where('status','Pending')->orderBy('id','DESC')->get();
        $get_received=NetworkConnection::where('receiver_id',Auth::user()->id)->where('status','Pending')->orderBy('id','DESC')->get();
        $get_connections=NetworkConnection::where('sender_id',Auth::user()->id)->where('status','Accepted')->orWhere('receiver_id',Auth::user()->id)->where('status','Accepted')->orderBy('id','DESC')->get();
        return view('home',compact('get_suggestions','get_requests','get_received','get_connections'));
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
    public function update(Request $request, $id)
    {
        //
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
