<!DOCTYPE html>
<html lang="en">
@include('Admin.partials.header')
<body>


<div class="col l9" >
   <br>
    <div class="container">
     <div class="row">
      <h4 style="font-weight:300"> Gestion des Paiements</h4>
        </div>
        <div class="row">
        <span>Nombre des Services achetés : <span class="purple-text">{{count($achats)}}  </span>&nbsp&nbsp&nbsp  </span>

         
        </div>

           <div class="row">
           <div class="col s12">
           @if(session()->has('notif'))

        <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> La catégorie est bien à jour!</div>
           </div></div>

           @elseif(session()->has('add'))
           <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> La nouvelle catégorie a été ajoutée</div>
           </div></div>

           @elseif(session()->has('delete'))
           <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> La  catégorie a été supprimée</div>
           </div></div>
           @endif

      
        <br><br>
        <div class="row">
            <div class="col s12 pull-l2">
             <table>
        <thead>
          <tr>
              <th>Nom du service </th>
           
              <th></th>
          </tr>
        </thead>

        <tbody>
        @foreach ($achats as $achat)
          <tr>
            <td>{{$achat->services->titre}}</td>
          
            <td><a class="btn-floating btn modal-trigger tooltipped waves-effect waves-light green hoverable" data-position="top" data-tooltip="Voir ce service" data-text-color="grey-text" href="#modal1{{$achat->id}}"><i class="material-icons">pageview</i></a></td>
     
          
          </tr>

          
 
          <div id="modal1{{$achat->id}}" class="modal">
    <div class="modal-content center-align">

    <div class="row">
    <div class="col s12">
    <img src="/storage/serviceimage/{{$achat->services->serviceimage}}" alt="" class="circle responsive-img">
    </div>
    </div>


<div class="row">
<div class="col s12">
<h4 class="purple-text">{{$achat->services->titre}}</h4>
</div>
</div>

<div class="row">
<div class="col s12">
<p class="flow-text"> {{$achat->services->description}}</p>
</div>
</div>
<br><br>
<div class="row">
<div class="col s12">
<img src="/storage/image/{{$achat->user->image}}" alt="" class="circle responsive-img" style="width:20%;" >
</div>
</div>
<div class="row">
<div class="col s12">
<p> Acheté par : <span class="purple-text">{{$achat->user->username}}</span></p>
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