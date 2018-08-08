<!DOCTYPE html>
<html lang="en">
@include('Admin.partials.header')
<body>






 
   

  <div class="col l9" >
   <br>
    <div class="container">
     <div class="row">
      <h4 style="font-weight:300"> Gestion des utilisateurs</h4>
        </div>
        <div class="row">
            Nombre des utilisateurs inscrits sur la plateforme : {{count($users)}}
        </div>

         <div class="row">
           <div class="col s12">
           @if(session()->has('user'))

        <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> L'utilisateur a été supprimé!</div>
           </div></div>
           @endif
        <br><br>
        <div class="row">
            <div class="col s12 pull-l2">
             <table>
        <thead>
          <tr>
              <th>Nom d'utilisateur </th>
              <th>Email</th>
              <th>Ville</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->ville}}</td>
            <td><a class="btn-floating btn modal-trigger tooltipped waves-effect waves-light red hoverable" data-position="top" data-tooltip="Supprimer cet utilisateur" data-text-color="grey-text" href="#modal1{{$user->id}}"><i class="material-icons">block</i></a></td>
            <td><a class="btn-floating btn modal-trigger tooltipped waves-effect waves-light green hoverable" data-position="top" data-tooltip="Voir son profil" data-text-color="grey-text" href="#modal2{{$user->id}}"><i class="material-icons">pageview</i></a></td>
          
          </tr>

           <div id="modal1{{$user->id}}" class="modal">
    <div class="modal-content">
    <div class="row">
    <div class="col s12">
    
    <p>Voulez vous vraiment supprimer  <span class="purple-text">{{$user->username}} </span> ?</p> 
    </div>

    <div class="col s6">
    <form action="/admin/user/{{$user->id}}" method="POST">
    {{ csrf_field() }}
    
    


    <span>   <input type="submit" class="btn purple hoverable waves effect" value="supprimer"></span>
  <span>    <a href="#" class="btn red hoverable waves effect modal-action modal-close" id="non"> Non</a></span>
    </form>
  

    </div>
    </div>
    </div>
    
  </div>

  <div id="modal2{{$user->id}}" class="modal">
    <div class="modal-content center-align">
    <div class="row">
    <div class="col s12">
    <img src="/storage/image/{{$user->image}}" alt="" class="circle responsive-img">
    </div>
    </div>
    <div class="row">
    <div class="col s12">
    <span class="flow-text">Nom d'utilisateur : </span><span class="purple-text flow-text">{{$user->username}}</span>  
    </div>
    </div>



    <div class="row">
                                 <div class="col s12">
                                     
                                      <ul class="collapsible" data-collapsible="accordion">
    <li>
        <div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">location_city</i> <span style="color: white;">Ville </span></div>
      <div class="collapsible-body"><span>{{$user->ville}}</span></div>
    </li>
    <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">account_box</i> <span style="color: white;">Membre depuis </span></div>
      <div class="collapsible-body"><span>{{$user->created_at}}.</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">description</i> <span style="color: white;">Description</span></div>
      <div class="collapsible-body"><span>{{$user->description}}</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">language</i> <span style="color: white;">Langues</span></div>
      <div class="collapsible-body"><span>{{$user->langues}}.</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">school</i> <span style="color: white;">Certificats </span></div>
      <div class="collapsible-body"><span>{{$user->diplomes}}</span></div>
    </li>
    
  </ul>
                                 </div>
                             </div>
                             
                             <div class="row">
                             <div class="col s12">
                             <span class="flow-text">Nombre des services publiés : </span><span class="flow-text purple-text">{{count($user->services)}}</span>
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