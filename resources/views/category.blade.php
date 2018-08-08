@extends('corps')
       @section('title','Home')
        @section('content')
        
        
         <section style="height:auto;">
     <div class="parallax-container">
        
        <div class="row">
            <div class="col s12 pull-l2">
                
                <h2 class="center-align " style="margin-top: 100px; color:purple;font-size:40px;"> Trouver le service qui vous convient!! </h2>
                
            </div>
            
                <div class="col s12 pull-l1">
                <div class="container" style="margin-top: 40px;">
             <form action="">
                <input cl type="search" placeholder="Chercher un service" class="browser-default" style="width: 80%;padding: 15px;border: 1px solid black;font-size: 20px;border-radius: 5px 0 0 5px;" >
                <input type="button" value="TROUVER" style="padding: 16px;border:none ;font-size: 20px;background-color: purple; color: white;border-radius: 0 5px 5px 0;cursor: pointer;position: absolute;">
                 
                     
                 
             </form>
                   
                   
                    </div>
                </div>
                
                <div class="col s12 pull-l3">
                    
                    <p class="center-align " style="margin-top: 10px;color:purple;"> Suggestions : Logo,Traduire un article...</p>
                </div>
                  </div>
            
        
         
         
         
         
         
         <div class="parallax">
             
             <img src="/img/search1.jpg" alt="" style="width: 50%; opacity: 0.6; ">
         </div>
     </div>
        
    </section>

    <section style="height:100px;background-color:#2980b9;">

<div class="row">

<div class="col l6 push-s2">

<p style="font-size:25px;text-transform:uppercase;padding-top:4px;font-weight:500;margin-top:20px;color:#fff;"> Tous les microservices</p>
</div>

<div class="col l6 push-s3">

 <label style="color:black;font-size:16px;color:#fff;">Triés par :</label>
  <select class="browser-default" style="border:1px solid black;padding-top:2px;">
  
    <option value="pertinence">Pertinence</option>
    <option value="notes">Notes</option>
    <option value="nouveauté">Nouveauté</option>
  </select>
</div>
</div>
</div>




    </section>
<section style="height:auto;padding-bottom:1px;">

<div class="row">
<div class="col l3">
<div class="card small" style="width:250px;height:auto;">
<div class="card-content center-align" style="background-color:purple">
<p style="font-size!25px;color:#fff;text-transform:uppercase"> Nos categories</p>

</div>
<div class="card-content center-align">
<div class="row">
<div class="col s12">
<div class="collection">

    <a href="/home" class="collection-item"><span class="badge">{{$serv->count()}}</span><span>Tout</span></a>

   
  </div>

</div>
</div>
<div class="row">
<div class="col s12">
@foreach ($categories as $categorie)
<div class="collection">
    <a href="/category/{{$categorie->id}}" class="collection-item"><span class="badge">{{$categorie->services->count()}}</span><span>{{$categorie->nom}}</span></a>

   
  </div>
@endforeach
</div>
</div>

</div>
<div class="card-content center-align" style="background-color:purple;">

<p style="font-size!25px;color:#fff;text-transform:uppercase"> Délais de livraison</p>

</div>
<div class="card-content">
<div class="row">
<div class="col s12 push-l4">
<form action="#">
    <p>
      <input type="checkbox" id="test5" />
      <label for="test5"> 2 Jours</label>
    </p>


     <p>
      <input type="checkbox" id="test6" />
      <label for="test6"> 7 Jours</label>
    </p>


     <p>
      <input type="checkbox" id="test7" />
      <label for="test7"> Tout</label>
    </p>
   
  </form>
</div>
</div>









</div>

</div>




</div>














<div class="col l9">

   



        

@if(count($services)>0)

@foreach ($services as $service)
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
        <p class="truncate" style="font-size:14px;">{{$service->description}}</p>
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
        
            
            </div>

            
          
          </div>
        
            
        </div>
@endforeach





            </div>
            
            </div>

           
            
        </div>
        
        @else

      <div class="col s12">
      <div class="card large">
      <div class="card-content center-align">

    <div class="row">
    <div class="col s12">
    <i style="font-size:200px;"class="material-icons">error</i>
            
    </div>
    <div class="row">
    <div class="col s12">
    <p style="font-size:40px;"> Aucun Service disponible</p>
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