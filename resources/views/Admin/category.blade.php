<!DOCTYPE html>
<html lang="en">
@include('Admin.partials.header')
<body>


<div class="col l9" >
   <br>
    <div class="container">
     <div class="row">
      <h4 style="font-weight:300"> Gestion des Catégories</h4>
        </div>
        <div class="row">
        <span>Nombre des Catégories : <span class="purple-text">{{count($categories)}}  </span>&nbsp&nbsp&nbsp  </span>
        <span><a class="btn-floating btn-large modal-trigger tooltipped waves-effect waves-light purple" data-position="top" data-tooltip="Ajouter une nouvelle catégorie" data-text-color="grey-text" href="#modal5"><i class="material-icons">add</i></a></span>
         
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
              <th>Nom de la categorie </th>
           
              <th></th>
          </tr>
        </thead>

        <tbody>
        @foreach ($categories as $cat)
          <tr>
            <td>{{$cat->nom}}</td>
          
            <td><a class="btn-floating btn modal-trigger tooltipped waves-effect waves-light red hoverable" data-position="top" data-tooltip="Supprimer cette catégorie" data-text-color="grey-text" href="#modal1{{$cat->id}}"><i class="material-icons">delete</i></a></td>
            <td><a class="btn-floating btn modal-trigger tooltipped waves-effect waves-light green hoverable" data-position="top" data-tooltip="Modifier cette catégorie" data-text-color="grey-text" href="#modal2{{$cat->id}}"><i class="material-icons">update</i></a></td>
          
          </tr>

          
 



 <div id="modal2{{$cat->id}}" class="modal">
    <div class="modal-content center-align">
    <div class="row">
    <div class="col s12">
    <h4>Mise à jour de <span class="purple-text">{{$cat->nom}}</span></h4>
    </div>
    </div>
    <div class="row">
    <form class="col s12" method="post" action="/admin/categorie/maj/{{$cat->id}}">
    {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">system_update</i>
          <input id="icon_prefix" type="text" class="validate" name="nom">
          <label for="icon_prefix">Entrer le nouveau nom</label>
        </div>
        
        <div class="row">
        <div class="col s12">
        <br><br>
        <button class="btn waves-effect purple hoverable" type="submit" name="action">Mettre à jour
    <i class="material-icons right">send</i>
  </button>
        
        </div>
        </div>
       
      </div>
    </form>
  </div>
    </div>
   
  </div>





















     <div id="modal1{{$cat->id}}" class="modal">
    <div class="modal-content">
    <div class="row">
    <div class="col s12">
    
    <p>Voulez vous vraiment supprimer cette categorie <span class="purple-text">{{$cat->nom}} </span> ?</p> 
    </div>

    <div class="col s6">
    <form action="/admin/categorie/{{$cat->id}}" method="POST">
    {{ csrf_field() }}
    
    


    <span>   <input type="submit" class="btn purple hoverable waves effect" value="supprimer"></span>
  <span>    <a href="#" class="btn red hoverable waves effect modal-action modal-close" id="non"> Non</a></span>
    </form>
  

    </div>
    </div>
    </div>
  
  </div>




  <div id="modal5" class="modal">
    <div class="modal-content center-align">
    <div class="row">
    <div class="col s12">
    <h4>Ajouter une nouvelle <span class="purple-text">Catégorie</span></h4>
    </div>
    </div>
    <div class="row">
    <form class="col s12" method="post" action="/admin/categorie">
    {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">system_update</i>
          <input id="icon_prefix" type="text" class="validate" name="nom">
          <label for="icon_prefix">Entrer le  nom</label>
        </div>
        
        <div class="row">
        <div class="col s12">
        <br><br>
        <button class="btn waves-effect purple hoverable" type="submit" name="action">Ajouter
    <i class="material-icons right">send</i>
  </button>
        
        </div>
        </div>
       
      </div>
    </form>
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