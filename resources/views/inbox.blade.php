@extends('corps')
       @section('title','Inbox')
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
        <div class="col l9">

          <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Messages Reçus</a></li>
        <li class="tab col s3"><a class="active" href="#test2">Messages Envoyés</a></li>

      </ul>



       <div id="test1" class="col s12">

 
  @forelse($inbox as $in)
        <ul class="collapsible">
    <li>
      <div class="collapsible-header">
      <div class="row">
      <div class="col s3 center-align">
      <img src="/storage/image/{{$in->user->image}}" class="responsive-img circle center-align" style="width:50%;" alt="">
      <br>
      <p class="purple-text"> {{$in->user->username}}</p>

      </div>

      <div class="col s5">
      <p style="padding-top:20px;"> <span class="purple-text"> Sujet  :</span>&nbsp <span>{{$in->sujet}}</span></p>
      </div>

      <div class="col s3">
      <p style="padding-top:20px;"> <span class="purple-text"> Date de reception  :</span>&nbsp <span>{{$in->created_at}}</span></p>
      </div>
      
      </div>
      </div>
      
      <div class="collapsible-body"><span>{{$in->message}}</span></div>
    </li>
 
  </ul>


  @empty


<div class="col s12">
<div class="card large">
<div class="card-content center-align">

<div class="row">
<div class="col s12">
<i style="font-size:200px;"class="material-icons">error</i>
    
</div>
<div class="row">
<div class="col s12">
<p style="font-size:30px;"> Aucun Message reçu !</p>
</div>
</div>


</div>

</div>

</div>
</div>


  @endforelse
  
       </div>







    <div id="test2" class="col s12">



  @forelse($sender as $in)
        <ul class="collapsible">
    <li>
      <div class="collapsible-header">
      <div class="row">
      <div class="col s3 center-align">
      <img src="/storage/image/{{$in->user->image}}" class="responsive-img circle center-align" style="width:50%;" alt="">
      <br>
      <p class="purple-text"> Vous</p>

      </div>

      <div class="col s5">
      <p style="padding-top:20px;"> <span class="purple-text"> Sujet  :</span>&nbsp <span>{{$in->sujet}}</span></p>
      </div>

      <div class="col s3">
      <p style="padding-top:20px;"> <span class="purple-text"> Date de reception  :</span>&nbsp <span>{{$in->created_at}}</span></p>
      </div>
      
      </div>
      </div>
      
      <div class="collapsible-body">
      <p> Vous avez envoyé ce message à : <span class="purple-text">{{$in->user2->username}} </span></p>
      <br><br>
      
      <span>{{$in->message}}</span></div>
    </li>
 
  </ul>

  @empty


  <div class="col s12">
<div class="card large">
<div class="card-content center-align">

<div class="row">
<div class="col s12">
<i style="font-size:200px;"class="material-icons">error</i>
      
</div>
<div class="row">
<div class="col s12">
<p style="font-size:30px;"> Aucun Message envoyé !</p>
</div>
</div>


</div>

</div>

</div>
</div>

  @endforelse



    </div>
    </div>


     

   
  </div>















       









  
        </div>
        </div>
        



        </section>

        @endsection
        