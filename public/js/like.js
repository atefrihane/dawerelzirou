



$('.like').on('click',function(){

var like_s=$(this).attr('data-like');
var service_id=$(this).attr('data-serviceid');
service_id=service_id.slice(0,-2);
//alert(service_id);

$.ajax({

    type:'POST',
    url:url,
    data:{  like_s:like_s, service_id:service_id ,_token:token  },
    
    success:function(data){
        if(data.is_like==1){

            $('*[data-serviceid="'+service_id+'_l"]').removeClass('grey').addClass('green');
            $('*[data-serviceid="'+service_id+'_d"]').removeClass('red').addClass('grey');

        var c_like= $('*[data-serviceid="'+service_id+'_l"]').find('.like_count').text();
        var new_like=parseInt(c_like)+1;
        $('*[data-serviceid="'+service_id+'_l"]').find('.like_count').text(new_like);
if (data.change_like==1){
    var c_dislike= $('*[data-serviceid="'+service_id+'_d"]').find('.dislike_count').text();
    var new_dislike=parseInt(c_dislike)-1;
    $('*[data-serviceid="'+service_id+'_d"]').find('.dislike_count').text(new_dislike);

}
        }
       else{
            
            $('*[data-serviceid="'+service_id+'_l"]').removeClass('green').addClass('grey');
            var c_like= $('*[data-serviceid="'+service_id+'_l"]').find('.like_count').text();
            var new_like=parseInt(c_like)-1;
            $('*[data-serviceid="'+service_id+'_l"]').find('.like_count').text(new_like);
        }

    }

});
});



























$('.dislike').on('click',function(){

    var like_s=$(this).attr('data-like');
    var service_id=$(this).attr('data-serviceid');
    service_id=service_id.slice(0,-2);
    //alert(service_id);
    
    $.ajax({
    
        type:'POST',
        url:url_dis,
        data:{  like_s:like_s, service_id:service_id ,_token:token  },
        
        success:function(data){
            if(data.is_dislike==1){
    
                $('*[data-serviceid="'+service_id+'_d"]').removeClass('grey').addClass('red');
                $('*[data-serviceid="'+service_id+'_l"]').removeClass('green').addClass('grey');
                var c_dislike= $('*[data-serviceid="'+service_id+'_d"]').find('.dislike_count').text();
                var new_dislike=parseInt(c_dislike)+1;
                $('*[data-serviceid="'+service_id+'_d"]').find('.dislike_count').text(new_dislike);

                if (data.change_dislike==1){
                    var c_like= $('*[data-serviceid="'+service_id+'_l"]').find('.like_count').text();
                    var new_like=parseInt(c_like)-1;
                    $('*[data-serviceid="'+service_id+'_l"]').find('.like_count').text(new_like);
                
                }
            }
           else{
                
                $('*[data-serviceid="'+service_id+'_d"]').removeClass('red').addClass('grey');
                var c_dislike= $('*[data-serviceid="'+service_id+'_d"]').find('.dislike_count').text();
                var new_dislike=parseInt(c_dislike)-1;
                $('*[data-serviceid="'+service_id+'_d"]').find('.dislike_count').text(new_dislike);
            }
    
        }
    
    });
    });












