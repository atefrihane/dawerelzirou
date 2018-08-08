@extends('corps')
       @section('title',$users->username)
       @section('content')



<section>
               
               
               <div class="row">
                   <br><br>
                   <div class="col  l3">
                      
                       <div class="row">
                       <img src="/storage/image/{{$users->image}}" class="circle responsive-img" alt="">
                       </div>
                       <div class="row">
                       <h4 class="center-align"> {{$users->username}}</h4>
                             
                       </div>
                       
                       
                                    
                              
                       <div class="row">
                                 <div class="col s12">
                                     
                                      <ul class="collapsible" data-collapsible="accordion">
    <li>
        <div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">location_city</i> <span style="color: white;">Ville </span></div>
      <div class="collapsible-body"><span>{{$users->ville}}</span></div>
    </li>
    <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">account_box</i> <span style="color: white;">Membre depuis </span></div>
      <div class="collapsible-body"><span>{{$users->created_at}}.</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">description</i> <span style="color: white;">Description</span></div>
      <div class="collapsible-body"><span>{{$users->description}}</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">language</i> <span style="color: white;">Langues</span></div>
      <div class="collapsible-body"><span>{{$users->langues}}.</span></div>
    </li>
    
     <li><div class="collapsible-header" style="background-color: #3498db;"><i class="material-icons" style="color: white;">school</i> <span style="color: white;">Certificats </span></div>
      <div class="collapsible-body"><span>{{$users->diplomes}}</span></div>
    </li>
    
  </ul>
                                 </div>
                             </div>
                             




                                         <div class="row">
                       <div class="col s12 center-align">
                        <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-large  modal-trigger green" href="#modal1{{$users->id}}">Contacter</a>

<!-- Modal Structure -->
<div id="modal1{{$users->id}}" class="modal">
  <div class="modal-content">

   <div class="row">
   <div class="col s12 center-align">
   <img src="/storage/image/{{$users->image}}" alt="" class="responsive-img circle" style="width:20%;">
   </div>
   </div>

   <div class="row">
   <div class="col s12 center-align">
  <span>Contacter</span>&nbsp&nbsp<span style="font-size:18px;color:purple;">{{$users->username}}</span>
   </div>
   </div>
    
    <div class="row">
    <form class="col s12" method="post" action="/profil/{{$users->id}}">

  {{ csrf_field() }}

     <div class="input-field col s12">
          <input  id="first_name" name="sujet" type="text" class="validate">
          <label for="first_name">Sujet</label>
        </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="message"></textarea>
          <label for="textarea1">Message</label>
        </div>
      </div>

       <div class="row">
 <div class="col s12 center-align">
 <input type="submit" class="btn-large purple waves-effect" value="confirmer">
 </div>
 </div>
    </form>
  </div>
  </div>
                           </div>
      </div>
</div>
                       
                       
                       
                               
                               
                                </div>
                            

              @if(count($users->services)>0)
              <br><br>

            
                   <div class="col s12 l9">

                        <div class="row">
           <div class="col s12">
           @if(session()->has('message'))

         <div class="card-panel green lighten-4 green-text text-darken-4 center-align"><b>Succés!</b> message a été envoyé!</div>
           </div></div>
           
           
          @endif
                <div class="card z-depth-3">
                <div class="card-content" style="background-color: #3498db;">
                <h4 class="center-align" style="color: #fff;font-size: 30px;font-weight: 500;text-transform: uppercase;">Ses services</h4>
                
                </div>
            <div class="card-content">
                @foreach($users->services as $service)
                <div class="row">
                <div class="col l4">
                





 <div class="card z-depth-5" style="width:auto;height:auto;">
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
        <p style="font-size:14px;" class="truncate">{{$service->description}}</p>
        </div>
        </div>
<br><br>
        <div class="row">
        <div class="col s12">
        <span style="color:purple;" > Catégorie : </span><span>{{$service->categorie->nom}}</span>
        </div>
        </div>
            
            </div>
            <div class="card-action">

            <div class="row">
            <div class="col s6">
            <img src="/storage/image/{{$service->user->image}}" alt="" class="circle" style="width:100px;height:100px;">
        
            </div>
            

            
            <div class="col s6">
            <a href="/profil/{{$service->user->username}}"> par {{$service->user->username}}</a>
            </div>

            </div>
            

            <div class="row">
            <div class="col s12">
            <a href="/Services/{{$service->id}}" class=" hoverable waves-effect btn-large purple" style="margin-top:10px;"> consulter</a>
            </div>
            </div>
        
            
            </div>

              @if ($service->user_id==Auth::user()->id)
            <div class="row">
                    <div class="col s12 center-align">
                        <span><a href="">Supprimer</a></span>
                        <span><a href="">|</a></span>
                        <span><a href="">Modifier</a></span>
                        
                    </div>
                </div>
                <br>
                

            @endif
          
          </div>
        













                </div>
                @endforeach
                <!--- fin l4 -->

                
                </div>


                </div>

                

                </div>
               
                @else
<br><br>
<div class="col l9">
<div class="card large">
<div class="card-content center-align">

<div class="row">
<div class="col s12">
<i style="font-size:200px;"class="material-icons">error</i>
      
</div>
<div class="row">
<div class="col s12">
<p style="font-size:30px;"> Ce vendeur ne dispose d'aucun service !</p>
</div>
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