@extends('corps')
       @section('title','Mon Profile ')
       @section('content')



<section>
               
               
               <div class="row">
                   <br><br>
                   <div class="col s12 l3">
                   <div class="row">
                   <div class="col s12">
                   <img src="/storage/image/{{Auth::user()->image}}" class="circle responsive-img" style="" alt="">
                   </div>
                   </div>



                    <div class="row">
                   <div class="col s12">
                   <h4 class="center-align"> 
                   <span>@</span>{{Auth::user()->username}}</h4>
                   </div>
                   <div class="col s6">
                   </div>
                   </div>


                  <!--- Collapsible -->
                  <div class="row">
                                 <div class="col s12">
                                     
                                      <ul class="collapsible" data-collapsible="accordion">
    <li>
        <div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">location_city</i> <span style="color: white;">Ville </span></div>
      <div class="collapsible-body"><span>{{Auth::user()->ville}}</span></div>
    </li>
    <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">account_box</i> <span style="color: white;">Membre depuis </span></div>
      <div class="collapsible-body"><span>{{Auth::user()->created_at}}.</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">description</i> <span style="color: white;">Description</span></div>
      <div class="collapsible-body"><span>{{Auth::user()->description}}</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">language</i> <span style="color: white;">Langues</span></div>
      <div class="collapsible-body"><span>{{Auth::user()->langues}}.</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">school</i> <span style="color: white;">Certificats </span></div>
      <div class="collapsible-body"><span>{{Auth::user()->diplomes}}</span></div>
    </li>
    
  </ul>
                                 </div>
                             </div>
                             
<!-- end collapsible -->


                                  <div class="row">
                                 <div class="col s12 center-align">
                                  <a href="/profil/edit" class="btn-large purple hoverable" style="width: auto;"> editer votre profil  </a>
                                     
                                 </div>
                             </div>

                       
                       
                       
                       
                       
                       
                       
                       
                       
                               
                               
                                </div>
                            

              @if(count($services)>0)
                   <div class="col l9">
              <br><br>
                   <div class="card z-depth-3" style="width:auto;height:auto;">
    <div class="card-content center-align" style="background-color:#3498db;">
    <h4 class="center-align white-text" style="text-transform:uppercase;font-bold:400;font-size:30px;">Mes services</h4>
    </div>

    <div class="row">
           <div class="col s12">
           @if(session()->has('notif'))

        <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> Votre service a été supprimé!</div>
           </div></div>
           
           
          @endif

         @if(session()->has('mj'))

<div class="card-panel green lighten-4 red-text text-darken-4"><b>Succés!</b>&nbsp Votre service est bien à jour!</div>
   </div></div>

   @endif
   @if(session()->has('erreur'))

<div class="card-panel red lighten-4 red-text text-darken-4"><b>Succés!</b>&nbsp Tout les champs sont obligatoires!</div>
   </div></div>

   @endif
    @foreach ($services as $service)
    <div class="card-content">

    



    <div class="row">
    <div class="col l4">

<div class="card z-depth-2" style="width:auto;height:auto;">
   <div class="card-image">
     <img src="/storage/serviceimage/{{$service->serviceimage}}" style="height:200px;width:100%;opacity:0.8;">
     
   </div>
   <div class="card-content">
   <div class="row">
   <div class="col s12">
   <p class="center-align" style="font-size:14px;color:purple;">
   {{$service->titre}}
   </p>
   </div>
   </div>
<div class="row">
<div class="col s12">
<p class="truncate"style="font-size:14px;">{{$service->description}}</p>
</div>
</div>
<br><br>
<div class="row">
<div class="col s12">
<span style="color:purple;" > Catégorie : </span><span>{{$service->categorie->nom}}</span>
</div>
</div>

 <div class="row">
<div class="col s12">
<span style="color:purple;" > Livraison : </span><span>{{$service->periode}} Jours</span>
</div>
</div>
   
   </div>
   <div class="card-action">

   <div class="row">
   <div class="col s6">
   <img src="/storage/image/{{$service->user->image}}" alt="" class="circle" style="width:100px;height:100px;">
   </div>

   <div class="col s6">
   @if ($service->user->id==Auth::user()->id)
   <a href="/profil"> par {{$service->user->username}}</a>
   @else
   <a href="/profil/{{$service->user->username}}"> par {{$service->user->username}}</a>
   @endif
   </div>
   </div>

   <div class="row">
   <div class="col s12">
   <a href="/Services/{{$service->id}}" class="btn-large purple hoverable waves-effect" style="margin-top:10px;">consulter</a>
   </div>
   </div>

   <div class="row">
   <div class="col s12">

   <span>  <a class="btn-floating btn-large modal-trigger red hoverable  " data-position="left" data-tooltip="Supprimer ce service" data-text-color="grey-text" data-target="modal{{$service->id}}"><i class="material-icons">delete</i></a></span>
            
             <span>  <a  class="btn-floating btn-large modal-trigger tooltipped waves-effect waves-light green hoverable "  data-position="right" data-tooltip="Modifier ce service"  data-delay="20" data-target="modal1{{$service->id}}"  ><i class="material-icons" href="#modal2" id="upd">update</i></a></span>
   

   </div>

   </div>


    <div id="modal1{{$service->id}}" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Modification de <span class="purple-text">{{$service->titre}}</span></h4>
     <br><br>

     <div class="row">                                
    <form class="col s12" enctype="multipart/form-data" method="post" action="/Services/{{$service->id}}">

  

    {{ csrf_field() }}
    @method('PUT')


 <div class="row">
        <div class="input-field col s12" id="input-field">
          <i class="material-icons prefix">title</i>
          <input  id="first_name" type="text" class="validate" name="titre">
          <label for="first_name" style="font-size: 17px;">Titre du service</label>
     </div></div>
        
  
         <div class="row">         
   <div class="input-field col s12" id="input-field">
      <i class="material-icons prefix">room_service</i>
  
    <select name="type">
    
      <option value="" disabled selected>Choissisez le type du service</option>
      @foreach($categories as $categorie)
      <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
      @endforeach
    </select>
    
    <label style="font-size: 17px;">Type du service</label>
             </div></div>

     
           
  <div class="row">
        <div class="input-field col s12" id="input-field">
          <i class="material-icons prefix">description</i>
          <textarea id="textarea" class="materialize-textarea" name="description"></textarea>
          <label for="textarea" style="font-size: 17px;">Description du service</label>
      </div></div>
      
      <div class="row">
          <div class="col 12">
              
          <div class="file-field input-field" id="input-field">
      <div class="btn">
        <span>Importer une photo du service</span>
        <input type="file" name="serviceimage">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
          </div>
          
          
      </div>
      
      
             <div class="row">         
   <div class="input-field col s12 " id="input-field">
   <i class="material-icons prefix" >timer</i>
    <select name="periode">
      <option value="" disabled selected>Choissisez la periode exacte</option>
      <option value="2">2 Jours</option>
      <option value="7">7 Jours</option>
     
    </select>
    <label style="font-size: 17px;" >Periode de la livraison</label>
             </div></div>
             
             
          <div class="row">
        <div class="input-field col s12" id="input-field">
          <i class="material-icons prefix">description</i>
          <textarea id="textarea" class="materialize-textarea" name="instruction"></textarea>
          <label for="textarea" style="font-size: 17px;">Instructions pour l'acheteur</label>
      </div></div>
      
    

      <div class="row">
          <div class="container center-align">
              <input type="submit" value="Mettre à jour le service" class="btn-large green hoverable">
              
          </div>
          
          
      </div>
 
      
    
</form> 
</div>                     

    </div>
 
  </div>











             <div id="modal{{$service->id}}" class="modal">
    <div class="modal-content">
    <div class="row">
    <div class="col s6">
    
    <p>Voulez vous vraiment supprimer ce service " {{$service->titre}}" ?</p> 
    </div>

    <div class="col s6">
    <form action="/Services/{{$service->id}}" method="POST">
    {{ csrf_field() }}
    @method('DELETE')
    


    <span>   <input type="submit" class="btn purple hoverable waves effect" value="supprimer"></span>
  <span>    <a href="#" class="btn red hoverable waves effect modal-action modal-close" id="non"> Non</a></span>
    </form>
  

    </div>
    </div>
    </div>
  
  </div>

   
   </div>

   
 
 </div>

   
</div>
@endforeach

    </div>
    </div>
    
                

                </div>

                
               
                
  
                 @else
<br><br>
<div class="col l9">
<div class="card large z-depth-5">
<div class="card-content center-align">

<div class="row">
<div class="col s12">
<i style="font-size:200px;"class="material-icons">error</i>
      
</div>
<div class="row">
<div class="col s12">
<p style="font-size:30px;"> Vous n'avez aucun service !</p>
</div>
</div>
<div class="row">
<div class="col s12">
   <a href="/Services/create" style="font-size:20px;"> Ajouter un !</a>
</div>
</div>

</div>

</div>

</div>
</div>

       @endif         


     
                </div>
                           
                        
    </section>

    




                       @endsection