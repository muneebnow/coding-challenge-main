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
        // $get_auth_sender=NetworkConnection::where('sender_id',Auth::user()->id)->where('receiver_id',Auth::user()->id)->orderBy('id','ASC')->get();

        // $get_auth_receiver=NetworkConnection::where('receiver_id',Auth::user()->id)->orderBy('id','ASC')->get();
        // $get_suggestions=[];
        // foreach($get_auth_receiver as $keys=>$values){
        //     $get_suggestions[] = User::where('id','!=',Auth::user()->id)->where('id','!=',$values->sender_id)->first();
        // }
        $get_suggestions=User::where('id','!=',Auth::user()->id)->orderBy('id','ASC')->get();
        $suggestion_listing="";
        foreach($get_suggestions as $keys=>$values){
            $suggestion_listing.='<div class="my-2 shadow  text-white bg-dark p-1" id="">
            <div class="d-flex justify-content-between">
              <table class="ms-1">
                <td class="align-middle">'.$values->name.'</td>
                <td class="align-middle"> - </td>
                <td class="align-middle">'.$values->email.'</td>
                <td class="align-middle">
              </table>
              <div>
                <button id="create_request_btn_" class="btn btn-primary me-1" >Connect</button>
              </div>
            </div>
          </div>';
        }

        $get_requests=NetworkConnection::where('sender_id',Auth::user()->id)->where('status','Pending')->orderBy('id','DESC')->get();
        $get_received=NetworkConnection::where('receiver_id',Auth::user()->id)->where('status','Pending')->orderBy('id','DESC')->get();
        $get_connections=NetworkConnection::where('sender_id',Auth::user()->id)->where('status','Accepted')->orWhere('receiver_id',Auth::user()->id)->where('status','Accepted')->orderBy('id','DESC')->get();
        return view('home',compact('get_suggestions','get_requests','get_received','get_connections','suggestion_listing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_suggestions=User::where('id','!=',Auth::user()->id)->orderBy('id','ASC')->get();
        $suggestion_listing="";
        foreach($get_suggestions as $keys=>$values){
            $suggestion_listing.='<div class="my-2 shadow  text-white bg-dark p-1" id="send_request_to_connect_'.$values->id.'">
            <div class="d-flex justify-content-between">
              <table class="ms-1">
                <td class="align-middle">'.$values->name.'</td>
                <td class="align-middle"> - </td>
                <td class="align-middle">'.$values->email.'</td>
                <td class="align-middle">
              </table>
              <div>
                <button id="create_request_btn_" class="btn btn-primary me-1" onclick="sendRequest('.Auth::user()->id.', '.$values->id.')">Connect</button>
              </div>
            </div>
          </div>';
        }
        return response()->json(['data'=>$suggestion_listing]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $connect=new NetworkConnection();
        $connect->sender_id=Auth::user()->id;
        $connect->receiver_id=$request->receiver_id;
        $connect->save();
        return response()->json(['data'=>$connect->receiver_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

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
