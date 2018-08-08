@extends('corps')
       @section('title','Mes Achats')
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
                            

     
<br><br>
<div class="col l9">



                <div class="card z-depth-3">
                <div class="card-content" style="background-color: #3498db;">
                <h4 class="center-align" style="color: #fff;font-size: 30px;font-weight: 500;text-transform: uppercase;">Mes services achetés</h4>
                
                </div>
            <div class="card-content">
            @forelse($services as $service)
                <div class="row">
                <div class="col l4">
                





 <div class="card z-depth-5" style="width:auto;height:auto;">
            <div class="card-image">
              <img src="/storage/serviceimage/{{$service->services->serviceimage}}" style="height:200px;width:100%;opacity:0.8;">
              
            </div>
            <div class="card-content">
            <div class="row">
            <div class="col s12">
            <p class="center-align" style="font-size:14px;color:purple;">
            {{$service->services->titre}}
            </p>
            </div>
            </div>
        <div class="row">
        <div class="col s12">
        <p style="font-size:14px;" class="truncate">{{$service->services->description}}</p>
        </div>
        </div>
<br><br>
        <div class="row">
        <div class="col s12">
          <span style="color:purple;" > Catégorie : </span><span>{{$service->services->categorie->nom}}</span>
        </div>
        </div>
            
            </div>
            <div class="card-action center-align">

            <div class="row">
            <div class="col s6">
            <img src="/storage/image/{{$service->services->user->image}}" alt="" class="circle" style="width:100px;height:100px;">
            </div>
            <div class="col s6">
            <a href="/profil/{{$service->services->user->username}}"> par {{$service->services->user->username}}</a>
            </div>
            </div>

            <div class="row">
            <div class="col s12">
            <a href="/Services/{{$service->services->id}}" class=" hoverable waves-effect btn-large purple" style="margin-top:10px;"> consulter</a>
            </div>
            </div>
        
            
            </div>

         
          
          </div>
        













                </div>
             

                
                </div>


                </div>

                

                </div>

 
@empty
<div class="card large z-depth-5">
<div class="card-content center-align">

<div class="row">
<div class="col s12">
<i style="font-size:200px;"class="material-icons">error</i>
      
</div>
<div class="row">
<div class="col s12">
<p style="font-size:30px;"> Vous n'avez aucun service acheté !</p>
</div>
</div>
<div class="row">
<div class="col s12">
   <a href="/home" style="font-size:20px;" class="btn-large purple hoverable waves-effect"> Acheter un !</a>
</div>
</div>

</div>

</div>

</div>
</div>
@endforelse

         


     
                </div>
                           
                        
    </section>

    




                       @endsection