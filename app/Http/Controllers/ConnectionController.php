<?php

namespace App\Http\Controllers;
use App\models\User;
use App\models\NetworkConnection;
use Auth;

use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_connections=NetworkConnection::where('sender_id',Auth::user()->id)->where('status','Accepted')->orWhere('receiver_id',Auth::user()->id)->where('status','Accepted')->orderBy('id','DESC')->get();
        $requests='';
        foreach($get_connections as $keys=>$values){
            // if($values->sender->id == Auth::user()->id || $values->receiver->id == Auth::user()->id){

            // }else{
                $requests.='<div class="my-2 shadow text-white bg-dark p-1" id="">
                <div class="d-flex justify-content-between">
                  <table class="ms-1">
                    <td class="align-middle">'.$values->sender->name.'</td>
                    <td class="align-middle"> - </td>
                    <td class="align-middle">'.$values->sender->email.'</td>
                    <td class="align-middle">
                  </table>
                  <div>
                    <button style="width: 220px" id="get_connections_in_common_" class="btn btn-primary" type="button"
                      data-bs-toggle="collapse" data-bs-target="#collapse_" aria-expanded="false" aria-controls="collapseExample">
                      Connections in common ()
                    </button>
                    <button id="create_request_btn_" class="btn btn-danger me-1">Remove Connection</button>
                  </div>

                </div>';

            // }


        }
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
