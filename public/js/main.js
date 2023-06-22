const { offset } = require("@popperjs/core");

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
        $('#get_sent_requests_btn').on('click',function(){

            $('#request_sent').html("");
        });
        $('#request_sent').attr('class','d-block');
        var html='<div class="d-flex align-items-center  mb-2  text-white bg-dark p-1 shadow skelton_div" style="height: 45px"> <strong class="ms-1 text-primary">Loading...</strong> <div class="spinner-border ms-auto text-primary me-4" role="status" aria-hidden="true"></div> </div>';
        var html1="";
        for(var i=1; i<=10; i++ ){
            html1+=html;
        }


        $('#request_sent').append(html1);

        if($('input').hasClass('page_no')){
            var page=parseInt($('.page_no:last').val());
        }else{
            var page=1;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/sent_requests?page='+page,
            data:{
                page_no:page + 1,
            },
            success: function(data) {
                $('#load_more_btn_parent_sent').remove();
                $('.skelton_div').remove();
                $('#request_sent').append(data.data);
            }
        });


    }else if(status =='received'){
        $('#request_sent').attr('class','d-none');
        $('#suggestion').attr('class','d-none');
        $('#connection').attr('class','d-none');
        $('#get_received_requests_btn').on('click',function(){

            $('#request_received').html("");
        });
        $('#request_received').attr('class','d-block');
        var html='<div class="d-flex align-items-center  mb-2  text-white bg-dark p-1 shadow skelton_div" style="height: 45px"> <strong class="ms-1 text-primary">Loading...</strong> <div class="spinner-border ms-auto text-primary me-4" role="status" aria-hidden="true"></div> </div>';
        var html1="";
        for(var i=1; i<=10; i++ ){
            html1+=html;
        }


        $('#request_received').append(html1);
        if($('input').hasClass('page_no')){
            var page=parseInt($('.page_no:last').val());
        }else{
            var page=1;
        }
        console.log(page);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/received_requests?page='+page,
            data:{
                page_no:page + 1,
            },
            success: function(data) {
                $('#load_more_btn_parent_received').remove();
                $('.skelton_div').remove();
                $('#request_received').append(data.data);

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
        $('#get_connections_btn').on('click',function(){

            $('#connection').html("");
        });
        $('#connection').attr('class','d-block');

            // 'data' variable contains the HTML content of the file
            var html='<div class="d-flex align-items-center  mb-2  text-white bg-dark p-1 shadow skelton_div" style="height: 45px"> <strong class="ms-1 text-primary">Loading...</strong> <div class="spinner-border ms-auto text-primary me-4" role="status" aria-hidden="true"></div> </div>';
            var html1="";
            for(var i=1; i<=10; i++ ){
                html1+=html;
            }


            $('#connection').append(html1);





        if($('input').hasClass('page_no')){
            var page=parseInt($('.page_no:last').val());
        }else{
            var page=1;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/get_connections?page='+page,
            data:{
                page_no:page + 1
            },
            success: function(data) {
                $('#load_more_btn_parent_connections').remove();
                // $('#load_more_connections_in_common_').remove();
                $('.skelton_div').remove();
                $('#connection').append(data.data);

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
        $('#get_suggestions_btn').on('click',function(){

            $('#suggestion').html("");
        });
            $('#suggestion').attr('class','d-block');
            $('#request_sent').attr('class','d-none');
            $('#connection').attr('class','d-none');
            if($('input').hasClass('page_no')){
                var page=parseInt($('.page_no:last').val());
            }else{
                var page=1;
            }
            var html='<div class="d-flex align-items-center  mb-2  text-white bg-dark p-1 shadow skelton_div" style="height: 45px"> <strong class="ms-1 text-primary">Loading...</strong> <div class="spinner-border ms-auto text-primary me-4" role="status" aria-hidden="true"></div> </div>';
            var html1="";
            for(var i=1; i<=10; i++ ){
                html1+=html;
            }

            $('#suggestion').append(html1);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'GET',
                url:'/home?page='+page,
                data:{
                    page_no:page + 1
                },
                success: function(data) {
                    // $('#suggestions').html("");
                    $('#load_more_btn_parent_suggestions').remove();
                    $('.skelton_div').remove();
                    $('#suggestion').append(data.data);
                }
            });
     });
}

function getMoreSuggestions() {
    $(document).ready(function(){
        $('#request_received').attr('class','d-none');
            $('#suggestion').attr('class','d-block');
            $('#request_sent').attr('class','d-none');
            $('#connection').attr('class','d-none');
            // var offset = 10;
            var page = 1;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/get_suggestions?page='+page,
                data:{


                },
                success: function(data) {
                    // $('#suggestions').html("");
                    $('#suggestion').append(data.data);
                    page++;
                }
            });
     });
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
                    suggestionId:suggestionId,

                },
                success: function(data) {
                    // $('#request_received').html("");
                    $('#send_request_to_connect_'+suggestionId).remove();
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
