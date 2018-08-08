<ul id="dropdown1" class="dropdown-content">
<li><a href="/profil">Profil</a></li>
  <li><a href="/profil/edit"> Parametres</a> </li>
  <li><a href="/logout"> Deonnexion </a></li>

</ul>





<nav>
  <div class="nav-wrapper">
    <a href="/home" class="brand-logo" style="margin-left:10px">DawerElZirou!</a>
    <ul class="right hide-on-med-and-down">
    <li><a href="#" class="dropdown-button"  data-activates="dropdown2" data-constrainwidth="false">  <span class="material-icons" style="color:white;">notifications </span><span class="new badge" id="count">{{count(Auth::user()->unreadNotifications)}}</span><i class="material-icons right">arrow_drop_down</i></a></li>
    <li><a href="/inbox">  <span class="material-icons" style="color:white;">message </span><span class="new badge blue" id="count1">@include('unread')</span><i class="material-icons right"></i></a> </a></li>
      <li><a href="/Services/achat">Achat</a></li>
      <li><a href="/Services/create">Vente</a></li>
  
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{Auth::user()->username}}<i class="material-icons right">arrow_drop_down</i></a></li>
   
    </ul>

  </div>
</nav>



<ul id="dropdown2" class="dropdown-content not" style="width:auto !important">
 @forelse (Auth::user()->notifications as $notification)
<li><a href="" style="width:auto;font-size:15px;color:black;"  class="{{$notification->read_at == null ? 'unread' : ''}} "> 
{!!  $notification->data['data'] !!}




 </a></li>

@empty
<li> <a href="" style="width:auto;font-size:15px;color:black;" > Bienvenue chez DawerElZirou, Vous serez notifié en cas de nouveautés! </a></li>
@endforelse -->
</ul>

    <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/StreamLab/StreamLab.js"></script>



<!--- Comment Notification --  >




<!---->



 <script>
        var message, ShowDiv = $('#dropdown2'), count = $('#count'), c,count1=$('#count1');
        var slh = new StreamLabHtml();
        var sls = new StreamLabSocket({
            appId:"{{ config('stream_lab.app_id') }}",
            channelName:"likedis",
            event:"*"
        });
        sls.socket.onmessage = function(res){
            slh.setData(res);
            if(slh.getSource() === 'messages'){
                c = parseInt(count.html());
                count.html(c+1);
                message  = slh.getMessage();
                ShowDiv.prepend('<li><a href="" class="unread" style="color:black;width:auto;font-size:15px;">'+message+'</a></li>');
            }
        }
        $('.not').on('click' , function(){
     
            $.get('/MarkAllSeen' , function(){

             
                count.html(0);
                $('.unread').each(function(){
                    $(this).removeClass('unread');
                });
        
            });
          
        });
    </script>





    <script>
        var message, ShowDiv = $('#dropdown2'), count = $('#count'), c;
        var slh = new StreamLabHtml();
        var sls = new StreamLabSocket({
            appId:"{{ config('stream_lab.app_id') }}",
            channelName:"addcomment",
            event:"*"
        });
        sls.socket.onmessage = function(res){
            slh.setData(res);
            if(slh.getSource() === 'messages'){
                c = parseInt(count.html());
                count.html(c+1);
                message  = slh.getMessage();
                ShowDiv.prepend('<li><a href="" class="unread" style="color:black;width:auto;font-size:15px;">'+message+'</a></li>');
            }
        }
        $('.not').on('click' , function(){
     
            $.get('/MarkAllSeen' , function(){

             
                count.html(0);
                $('.unread').each(function(){
                    $(this).removeClass('unread');
                });
        
            });
          
        });


    </script>















