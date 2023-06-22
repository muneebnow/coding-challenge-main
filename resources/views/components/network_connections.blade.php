<div class="row justify-content-center mt-5">
  <div class="col-12">
    <div class="card shadow  text-white bg-dark">
      <div class="card-header">Coding Challenge - Network connections</div>
      <div class="card-body">
        {{-- @dd($get_suggestions) --}}
        <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
          <label class="btn btn-outline-primary" for="btnradio1" id="get_suggestions_btn" onclick="getSuggestions();">Suggestions ({{count($get_suggestions_count)}})</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio2" id="get_sent_requests_btn" onclick="return getRequests('sent');">Sent Requests ({{count($get_requests)}})</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio3" id="get_received_requests_btn" onclick="return getRequests('received');">Received
            Requests({{count($get_received)}})</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio4" id="get_connections_btn" onclick="getConnections()">Connections ({{count($get_connections)}})</label>
        </div>
        <hr>
        <div id="request_sent" class="d-none">

        </div>
        <div id="request_received" class="d-none">

        </div>
        <div id="suggestion" class="d-none">


        </div>
        <div id="connection" class="d-none">

        </div>

      </div>
    </div>
  </div>
</div>



