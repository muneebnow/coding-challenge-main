var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(status) {
  $(document).ready(function(){
    if(status =='sent'){
        $('#request_received').attr('class','d-none');
        $('#suggestion').attr('class','d-none');
        $('#connection').attr('class','d-none');
        $('#request_sent').attr('class','d-block');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/sent_requests',
            data:{

            },
            success: function(data) {
                $('#request_received').html("");
                $('#request_sent').html(data.data);
            }
        });


    }else if(status =='received'){
        $('#request_sent').attr('class','d-none');
        $('#suggestion').attr('class','d-none');
        $('#connection').attr('class','d-none');
        $('#request_received').attr('class','d-block');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/received_requests',
            data:{

            },
            success: function(data) {
                $('#request_sent').html("");
                $('#request_received').html(data.data);
            }
        });
    }
  });
}

function getMoreRequests(mode) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnections() {
 $(document).ready(function(){
    $('#request_received').attr('class','d-none');
        $('#suggestion').attr('class','d-none');
        $('#request_sent').attr('class','d-none');
        $('#connection').attr('class','d-block');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/get_connections',
            data:{

            },
            success: function(data) {
                $('#request_received').html("");
                $('#connection').html(data.data);
            }
        });
 });
}

function getMoreConnections() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
  // your code here...
}

function getMoreConnectionsInCommon(userId, connectionId) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getSuggestions() {
  // your code here...
}

function getMoreSuggestions() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function sendRequest(userId, suggestionId) {
  // your code here...
}

function deleteRequest(userId, requestId) {
  // your code here...
}

function acceptRequest(userId, requestId) {
  // your code here...
}

function removeConnection(userId, connectionId) {
  // your code here...
}

$(function () {
  //getSuggestions();
});
