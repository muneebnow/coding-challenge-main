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
    $(document).ready(function(){
        $('#request_received').attr('class','d-none');
            $('#suggestion').attr('class','d-block');
            $('#request_sent').attr('class','d-none');
            $('#connection').attr('class','d-none');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/get_suggestions',
                data:{

                },
                success: function(data) {
                    // $('#suggestions').html("");
                    $('#suggestion').html(data.data);
                }
            });
     });
}

function getMoreSuggestions() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function sendRequest(userId, suggestionId) {
    $(document).ready(function(){
        $('#request_received').attr('class','d-none');
            $('#suggestion').attr('class','d-block');
            $('#request_sent').attr('class','d-none');
            $('#connection').attr('class','d-none');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/connect',
                data:{
                    userId:userId,
                    requestId:suggestionId,

                },
                success: function(data) {
                    // $('#request_received').html("");
                    $('#sent_request_div_'+userId).remove();
                }
            });
     });
}

function deleteRequest(userId, requestId) {
    $(document).ready(function(){
        $('#request_received').attr('class','d-none');
            $('#suggestion').attr('class','d-none');
            $('#request_sent').attr('class','d-block');
            $('#connection').attr('class','d-none');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/withdraw_requests',
                data:{
                    userId:userId,
                    requestId:requestId,

                },
                success: function(data) {
                    // $('#request_received').html("");
                    $('#sent_request_div_'+userId).remove();
                }
            });
     });
}

function acceptRequest(userId, requestId) {
    $(document).ready(function(){
        $('#request_received').attr('class','d-block');
            $('#suggestion').attr('class','d-none');
            $('#request_sent').attr('class','d-none');
            $('#connection').attr('class','d-none');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/accept_request',
                data:{
                    userId:userId,
                    requestId:requestId,

                },
                success: function(data) {
                    // $('#request_received').html("");
                    $('#request_div_'+data.data).remove();
                }
            });
     });
}

function removeConnection(userId, requestId) {
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
                url:'/remove_connections',
                data:{
                    userId:userId,
                    requestId:requestId,

                },
                success: function(data) {
                    // $('#request_received').html("");
                    $('#connection_div_'+data.data).remove();
                }
            });
     });
}

$(function () {
  //getSuggestions();
});
