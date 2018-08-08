<!DOCTYPE html>
<html lang="en">
@include('Admin.partials.header')
<body>





 
   

  <div class="col l9" >
   <br>
 
    <div class="container">
     <div class="row">
      <h4 style="font-weight:300"> Gestion des Services</h4>
        </div>
     
        <div class="row">
            Nombre des services sur la plateforme : {{count($services)}}
        </div>
        <br><br>
        <div class="row">
           <div class="col s12">
           @if(session()->has('notif'))

        <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> Le service a été approuvé!</div>
           </div></div>
           
           
          @elseif(session()->has('suppr'))
          
        <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> Le service a été supprimé!</div>
           </div></div>
           @endif
          


        <div class="row">
            <div class="col s12 pull-l2">
             <table>
        <thead>
          <tr>
              <th>Titre </th>
              <th>Description</th>
              <th>Situation</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        @foreach ($services as $service)
          <tr>
            <td>{{$service->titre}}</td>
            <td>{{$service->description}}</td>
            @if($service->flag==0)
            <td>Non approuvé</td>
            @else
            <td>Approuvé</td>
            @endif
            @if($service->flag==0)
            <td><a class="btn-floating btn modal-trigger tooltipped waves-effect waves-light purple hoverable" data-position="top" data-tooltip="Approuver ce service" data-text-color="grey-text" data-target="modal1{{$service->id}}"><i class="material-icons">thumb_up</i></a></td>
            @endif
            <td><a class="btn-floating btn modal-trigger tooltipped waves-effect waves-light green hoverable" data-position="top" data-tooltip="Voir ce service" data-text-color="grey-text" data-target="modal2{{$service->id}}"><i class="material-icons">pageview</i></a></td>
            <td><a class="btn-floating btn modal-trigger tooltipped waves-effect waves-light red hoverable" data-position="top" data-tooltip="Supprimer ce service" data-text-color="grey-text" data-target="modal3{{$service->id}}"><i class="material-icons">delete</i></a></td>
          </tr>

    <div id="modal2{{$service->id}}" class="modal">
    <div class="modal-content center-align">

    <div class="row">
    <div class="col s12">
    <img src="/storage/serviceimage/{{$service->serviceimage}}" alt="" class="circle responsive-img">
    </div>
    </div>


<div class="row">
<div class="col s12">
<h4 class="purple-text">{{$service->titre}}</h4>
</div>
</div>

<div class="row">
<div class="col s12">
<p class="flow-text "> {{$service->description}}</p>
</div>
</div>
<br><br>
<div class="row">
<div class="col s12">
<img src="/storage/image/{{$service->user->image}}" alt="" class="circle responsive-img" style="width:20%;" >
</div>
</div>
<div class="row">
<div class="col s12">
<p> Crée par : <span class="purple-text">{{$service->user->username}}</span></p>
</div>
</div>


   
      
    </div>
   
  </div>





   

    <div id="modal1{{$service->id}}" class="modal">
    <div class="modal-content">
     
    <p>Voulez vous vraiment approuver ce service ?</p>

     <div class="row">                                
    <form class="col s12"   method="post" action="/admin/services/app/{{$service->id}}">
   {{ csrf_field() }}
  


    <span>   <input type="submit" class="btn purple hoverable waves effect" value="Oui"></span>
  <span>    <a href="#" class="btn red hoverable waves effect modal-action modal-close" id="Non"> Non</a></span>
 
      
    
</form> 
</div>                     

    </div>
</div>





       <div id="modal3{{$service->id}}" class="modal">
    <div class="modal-content">
    <div class="row">
    <div class="col s6">
    
    <p>Voulez vous vraiment supprimer ce service " {{$service->titre}}" ?</p> 
    </div>

    <div class="col s6">
    <form action="/admin/services/supp/{{$service->id}}" method="POST">
    {{ csrf_field() }}
    
    


    <span>   <input type="submit" class="btn purple hoverable waves effect" value="supprimer"></span>
  <span>    <a href="#" class="btn red hoverable waves effect modal-action modal-close" id="non"> Non</a></span>
    </form>
  

    </div>
    </div>
    </div>
  
  </div>

     
          @endforeach
        
        </tbody>
      </table>
        </div>
        </div>
</div>
        </div>
    </div>



@include('partials1._javascript')
    
</body>
</html>