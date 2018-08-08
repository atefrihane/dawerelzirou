@extends('corps')
       @section('title','Ajouter un Service ')
        @section('content')


<section>
               
               
               <div class="row">
               <br><br>
                   <div class="col l3">

                   <div class="row">
                   <div class="col s12">
                   <img src="/storage/image/{{Auth::user()->image}}" class="circle responsive-img" style="" alt="">
                   </div>
                   </div>



                    <div class="row">
                   <div class="col s12">
                   <h4 class="center-align"> {{Auth::user()->username}}</h4>
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
                  
                          <br><br>      
                   <div class="col s12 l9">







<div class="card z-depth-3" style="height:auto;width:auto;">
<div class="card-content" style="background-color: #3498db;">
<h4 class="center-align white-text" style="text-transform:uppercase;font-bold:400;font-size:30px;">Ajouter un service</h4>

</div>
<div class="card-content" style="height:auto;width;auto;">
    
<div class="row">
           <div class="col s12">
           @if(session()->has('notif'))

        <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> Votre service necessite la validation de l'administration pour qu'il soit publié!!</div>
           </div></div>
           
           
          @endif

         @if(session()->has('erreur'))

<div class="card-panel red lighten-4 red-text text-darken-4"><b>Oups!</b>&nbsp Erreur de mot de passe, Prière de verifier à nouveau!</div>
   </div></div>

   @endif
           

          
        
                         
       <div class="row">                                
    <form class="col s12" enctype="multipart/form-data" method="post" action="/Services">

  

    {{ csrf_field() }}


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
              <input type="submit" value="Valider le service" class="btn-large green hoverable">
              
          </div>
          
          
      </div>
      <div class="row">
          <div class="col s12">
              
            <p  style="text-transform: uppercase;">Notation importante :</p>
            
          </div>
      </div>
      
      <div class="row">
          <div class="col s12">
              <p style="font-size: 17px;"> - Chaque service desirant etre publié necessite tout d'abord la confirmation de l'administration</p>
          </div>
      </div>
      
    
</form> 
</div>                     

</div>

</div>
















</div>
<div>
                           
                        
    

</section>





        @endsection