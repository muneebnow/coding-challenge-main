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
    public function index(Request $request)
    {
        $get_connections=NetworkConnection::where('sender_id',Auth::user()->id)->where('status','Accepted')->orWhere('receiver_id',Auth::user()->id)->where('status','Accepted')->orderBy('id','DESC')->paginate(10);
        $requests='';
        foreach($get_connections as $keys=>$values){

            if($values->sender->id == Auth::user()->id ){

            }else{
                $user1Id = Auth::user()->id; // Replace with the first user's ID
                $user2Id = $values->sender->id; // Replace with the second user's ID

                $user1 = User::findOrFail($user1Id);
                $user2 = User::findOrFail($user2Id);

                $mutualFriends = $user1->sentConnections()
                ->whereIn('receiver_id', $user2->sentConnections()->pluck('sender_id'))
                ->pluck('receiver_id')
                ->toArray();

                $requests.='<div class="my-2 shadow text-white bg-dark p-1" id="connection_div_'.$values->sender->id.'">
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
                      Connections in common ('.count($mutualFriends).')
                    </button>
                    <button id="create_request_btn_" class="btn btn-danger me-1" onclick="removeConnection('.$values->sender->id.', '.Auth::user()->id.')">Remove Connection</button>
                  </div>

                </div>
                <div class="collapse" id="collapse_">

                <div id="content_" class="p-2">
                {{-- Display data here --}}
                <x-connection_in_common />
                </div>
                <div id="connections_in_common_skeletons_">
                {{-- Paste the loading skeletons here via Jquery before the ajax to get the connections in common --}}
                </div>
                <div class="d-flex justify-content-center w-100 py-2">
                <button class="btn btn-sm btn-primary" id="load_more_connections_in_common_">Load
                    more</button>
                </div>
            </div>
            </div><input type="hidden" class="page_no" value="'.$request->page_no.'">';

            }

            if($values->receiver->id == Auth::user()->id ){

            }else{
                $user1Id = Auth::user()->id; // Replace with the first user's ID
            $user2Id = $values->receiver->id; // Replace with the second user's ID
            // dd($user2Id,'receiver');

            $user1 = User::findOrFail($user1Id);
            $user2 = User::findOrFail($user2Id);

            $mutualFriends = $user1->receivedConnections()
            ->whereIn('receiver_id', $user2->receivedConnections()->pluck('sender_id'))
            ->pluck('receiver_id')
            ->toArray();



                $requests.='<div class="my-2 shadow text-white bg-dark p-1" id="connection_div_'.$values->receiver->id.'">
                <div class="d-flex justify-content-between">
                  <table class="ms-1">
                    <td class="align-middle">'.$values->receiver->name.'</td>
                    <td class="align-middle"> - </td>
                    <td class="align-middle">'.$values->receiver->email.'</td>
                    <td class="align-middle">
                  </table>
                  <div>
                    <button style="width: 220px" id="get_connections_in_common_" class="btn btn-primary" type="button"
                      data-bs-toggle="collapse" data-bs-target="#collapse_" aria-expanded="false" aria-controls="collapseExample">
                      Connections in common ('.count($mutualFriends).')
                    </button>
                    <button id="create_request_btn_" class="btn btn-danger me-1" onclick="removeConnection('.$values->receiver->id.', '.Auth::user()->id.')">Remove Connection</button>
                  </div>
                  <div class="collapse" id="collapse_">

                    <div id="content_" class="p-2">
                    {{-- Display data here --}}
                    <x-connection_in_common />
                    </div>
                    <div id="connections_in_common_skeletons_">
                    {{-- Paste the loading skeletons here via Jquery before the ajax to get the connections in common --}}
                    </div>
                    <div class="d-flex justify-content-center w-100 py-2">
                    <button class="btn btn-sm btn-primary" id="load_more_connections_in_common_">Load
                        more</button>
                    </div>
                </div>
                </div><input type="hidden" class="page_no" value="'.$request->page_no.'">';

            }



        }
        $requests.=' <div class="d-flex justify-content-center mt-2 py-3 {{--d-none--}}" id="load_more_btn_parent_connections">
            <button class="btn btn-primary" onclick="return getConnections();" id="load_more_btn_connections" >Load more</button>
          </div>
          ';
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
    public function destroy(Request $request)
    {
        $remove_connection=NetworkConnection::where('sender_id',$request->requestId)->where('receiver_id',$request->userId)->where('status','Accepted')->orWhere('receiver_id',$request->requestId)->where('sender_id',$request->userId)->where('status','Accepted')->delete();
        return response()->json(['data'=>$request->userId]);
    }
}
