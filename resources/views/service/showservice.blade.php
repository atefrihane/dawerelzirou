@extends('corps')
       @section('title',$services->titre)
        @section('content')

        <section>
        
        <div class="row">
        <br><br>
            <div class="col l3">
               
            <div class="row">
                         <div class="col s12">
                             <img src="/storage/image/{{$services->user->image}}" alt="" class="responsive-img circle">
                             
                         </div>
                     </div>
                    
                
                     <div class="row">
                         <div class="col s12">
                             
                             <p class="center-align"style="font-family:sans-serif;font-size: 30px;">  {{$services->user->username}}</p>
                         </div>
                     </div>
                      
                      <div class="row">
                          <div class="col s12">
                             <p class="center-align">{{$services->user->description}}</p>
                          </div>
                      </div>



    <div class="row">
                       <div class="col s12 center-align">
                        <!-- Modal Trigger -->
                      
                      
                        
  <a class="waves-effect waves-light btn-large  modal-trigger green" href="/profil/{{$services->user->username}}">Voir son profil</a>


        
                       </div>
                       </div>








                           <div class="row">
                        <div class="col s12 center-align">
                        @if($services->user->id == Auth::user()->id)
                        <a class="waves-effect waves-light btn-large purple" onclick="Materialize.toast('Vous êtes le propriétaire de ce service!', 4000);"><i class="material-icons left">add_shopping_cart</i>Acheter </a>
                        @elseif($achat) 
                       
                        <a class="waves-effect waves-light btn-large purple" onclick="Materialize.toast('Vous avez acheté ce service!', 4000);"><i class="material-icons left">add_shopping_cart</i>Acheter </a>
                     
                        @else
                        <a class="waves-effect waves-light btn-large purple modal-trigger" href="#acheter{{$services->id}}"><i class="material-icons left">add_shopping_cart</i>Acheter </a>
                        @endif
                        </div>
                        </div>


                          <div id="acheter{{$services->id}}" class="modal">
    <div class="modal-content">
      
      <p>Voulez vous acheter le service <span class="purple-text"> "  {{$services->titre}}  "</span> pour <span class="purple-text"> 5DT</span> ?  </p>
<br>
    <form action="/payment/{{$services->id}}" method="POST">
    {{ csrf_field() }}
 
    


    <span>   <input type="submit" class="btn purple hoverable waves effect" value="acheter"></span>
  <span>    <a href="#" class="btn red hoverable waves effect modal-action modal-close" id="non"> Non</a></span>
    </form>

</p>
      <p></p>
    </div>
  
  </div>

   <div class="row">
                            <div class="col s12">
                               <hr style="color: black;margin-top: 20px;">
                            </div>
                        </div>



                                
                                <div class="row">
                            <div class="col s3">
                                  <i class="material-icons">timer</i>
                            </div>
                            <div class="col 9">
                              <span> {{$services->periode}}</span>&nbsp; jours de livraison
                                
                            </div>
                            
                        </div>


<br><br>
                                <div class="row">
                <div class="col s12">
                <p class="center-align" style="font-size:20px;font-weight:500;">  Laisser votre impression..</p>
                </div>
                </div>




                     @php 
                $like_count=0;
                $dislike_count=0;

                $like_statut="grey";
                $dislike_statut="grey";
                @endphp
                @foreach ($services->likes as $like)
                   @php
                   if ($like->like ==1){
                       $like_count++;
                   }
                   else {
                       $dislike_count++;
                   }

                   if($like->like == 1 && $like->user_id==Auth::user()->id){

                       $like_statut="green";
                   }
                   else{

                       $dislike_statut="red";
                   }

                   @endphp



                @endforeach







                              <div class="row">

<div class="col s12 center-align">
@if($services->user->id==Auth::user()->id)
<button type="button"  onclick="Materialize.toast('Vous êtes le propriétaire de ce service!', 4000);" class="like waves-effect waves-light btn-large {{$like_statut}}"> <i class="material-icons left">thumb_up</i><span class="like_count" style="color:white;">{{ $like_count}}</span>
@elseif(!$achat)
<button type="button"  onclick="Materialize.toast('Vous devez acheter le service pour evaluer!', 4000);" class="like waves-effect waves-light btn-large {{$like_statut}}"> <i class="material-icons left">thumb_up</i><span class="like_count" style="color:white;">{{ $like_count}}</span>
@else
<button type="button" data-like="{{$like_statut}}_l" data-serviceid="{{$services->id}}_l" class="like waves-effect waves-light btn-large {{$like_statut}}" onclick="Materialize.toast('Vous aimez  ce service!', 4000);"> <i class="material-icons left">thumb_up</i><span class="like_count" style="color:white;">{{ $like_count}}</span>
@endif

</button>
</div>
</div>




      <br>
                <div class="row">
                <div class="col s12 center-align">
                @if($services->user->id == Auth::user()->id)
                <button type="button"  onclick="Materialize.toast('Vous êtes le propriétaire de ce service!', 4000);" class="like waves-effect waves-light btn-large {{$like_statut}}"> <i class="material-icons left">thumb_down</i><span class="dislike_count" style="color:white;">{{ $dislike_count}}</span>
                @elseif(!$achat)
<button type="button"  onclick="Materialize.toast('Vous devez acheter le service pour evaluer!', 4000);" class="like waves-effect waves-light btn-large {{$like_statut}}"> <i class="material-icons left">thumb_up</i><span class="like_count" style="color:white;">{{ $like_count}}</span>
                @else
                <button type="button"  data-serviceid="{{$services->id}}_d"   class="dislike waves-effect waves-light btn-large {{$dislike_statut}}" onclick="Materialize.toast('Vous aimez pas  ce service!', 4000);"> <i class="material-icons left">thumb_down</i><span class="dislike_count" style="color:white">{{$dislike_count}}</span>
                @endif
                </button>
                </div>
                </div>











                
            </div>
      
      
         
            <div class="col l9">
           
     

           
    <div class="card content">
             
                    <div class="card-image">
                      <img src="/storage/serviceimage/{{$services->serviceimage}}" alt="" class="responsive-img" style="width:100%;">
                      </div>
                     

                          <div class="card-content z-depth-3">
                             <h4 class="center-align purple-text" style="text-transform:uppercase;font-size:25px;">{{$services->titre}}</h4>

                           <p class="flow-text" style="font-size:16px;">{{$services->description}}</p>
                          </div>
                             
                     
                      
                      
                      
                      
                      
                      
                        
                    
                    
                </div>
                
                <div class="card z-depth-3">
                    <div class="card-content">
                       <div class="row">
                           <div class="col s12">
                                 <p class=" purple-text" style="text-transform:uppercase;font-size:25px;"> Instructions pour l'acheteur</p>
                           </div>
                       </div>
                     
                       <div class="row">
                           
                           <div class="col s12">
                               <p>{{$services->instruction}}</p>
                               
                           </div>
                       </div> 
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </section>
    <br><br>
    
    <section style="height: auto;">
   
        <div class="row">
        
        @if(session()->has('achat'))
          
          <div class="card-content" style="width:auto;height:auto;">
          
<div class="card-panel green lighten-4 green-text text-darken-4 center-align"><b>Succés!</b> Vous avez acheté le service <span class="purple-text">{{$services->titre}}</span></div>

</div></div>
@endif
        </div>
        <div class="row">
            <div class="col s12">
                
                <p class="center-align" style="font-size: 30px;">Les commentaires </p>
                
            </div>
            
            <div class="row">
           <div class="col s12">
           @if(session()->has('notif'))

         <div class="card-panel green lighten-4 green-text text-darken-4 center-align"><b>Succés!</b> Commentaire a été ajouté!</div>
 
           </div></div>

           @elseif(session()->has('maj'))
           <div class="card-panel green lighten-4 green-text text-darken-4 center-align"><b>Succés!</b> Commentaire a bien a jour!</div>
 
 </div></div>

          @elseif(session()->has('suppr'))
           <div class="card-panel green lighten-4 green-text text-darken-4 center-align"><b>Succés!</b> Commentaire a été supprimé!</div>
 
 </div></div>

  
           @endif
              </div>
      
          
                
              
                        
                           
         @if($achat)                 
    <form class="col s12"  method="post" action="/services/{{$services->id}}">
    {{ csrf_field() }}
    
                   
                         <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">insert_comment</i>
          <textarea id="textarea1" name="body" class="materialize-textarea"></textarea>
          <label for="textarea1" style="color: black;">Commentaire</label>
        </div>
      </div>     
            
            <div class="row">
                
                <div class="col s12 center-align">
                @if(!$likes)
                <a   class="waves-effect waves-light btn-large purple  hoverable  modal-trigger " href="#" onclick="Materialize.toast('Priere de noter ce service pour commenter!', 4000);">confirmer</a>
                   @else
                    
                <input type="submit" value="confirmer" class="btn-large purple  hoverable">
                @endif
                </div>
            </div>
             
                            
                            
                        </form>
                        @endif
                        
                    </div>
                        
        </div>
           
          
      
    
        
    </section>
 
 <section>

 <div class="row">
            <div class="col s12">
            <p class="center-align" style="font-size:18px;">Nombre de commentaires  ( {{  (count($services->comments))  }}   )</p>
            </div>
            </div>


@if (count($services->comments)>0)

@foreach ($services->comments as $comment)

 
            
<div class="row">
 <div class="col s6 offset-l3">
 <div class="card small" style="height:auto;width:700px;background-color:aqua;">
 <div class="card-content center-align">


<div class="row">
 <div class="col s12">
 <img src="/storage/image/{{$comment->user->image}}" class="responsive-img circle center-align" style="width:50%;" alt="">
</div>
<div class="row">
<div class="col s12">
<br>
@if($likes)
@if($comment->user->id ==$likes->user_id)
@if($likes->like==0)
<p style="font-size:20px;"> {{$comment->user->username}} <span> <i class="material-icons" style="font-size:20px;">thumb_down</i></span></p>
@else
<p style="font-size:20px;"> {{$comment->user->username}} <span><i class="material-icons" style="font-size:20px;">thumb_up</i></span></p>
@endif
@endif
@endif


</div>
</div>
<br>
<div class="row">
<div class="col s12">
<p>{{$comment->body}}</p>
</div>
</div>
@if(auth::user()->id==$comment->user->id)
<br>
<div class="row">
<div class="col s12">
 <span><a class="btn-floating btn-large waves-effect waves-light green modal-trigger tooltipped"  data-position="top" data-tooltip="Modifier ce commentaire"  data-delay="20" data-target="modal3{{$comment->id}}" ><i class="material-icons">update</i></a></span>
 <span><a class="btn-floating btn-large waves-effect waves-light red modal-trigger tooltipped"  data-position="top" data-tooltip="Supprimer ce commentaire"  data-delay="20" data-target="modal4{{$comment->id}}"  ><i class="material-icons">delete</i></a></span>
 </div>


 </div>
 </div>
 </div>
 @endif
 
 </div>
 </div>
 </div>
 
 <div id="modal3{{$comment->id}}" class="modal">
    <div class="modal-content center-align">
      <h4>Modification du commentaire <span class="purple-text">{{$comment->body}}</span></h4>

       <div class="row">
    <form class="col s12" method="post" action="/services/maj/{{$comment->id}}">
    {{csrf_field()}}
      <div class="row">
        <div class="input-field col s12">
        <i class="material-icons prefix">comment</i>
        <textarea id="textarea1" class="materialize-textarea" name="body"></textarea>
          <label for="textarea1">Nouveau commentaire</label>
         
        </div>
        </div>
        <div class="row">
       
        <input type="submit" class="btn-large hoverable waves-effect purple" value="mettre a jour">
 
        </div>
    </form>
  </div>
    </div>
   
  </div>


   <div id="modal4{{$comment->id}}" class="modal">
    <div class="modal-content">
    <div class="row">
    <div class="col s6">
    
    <p>Voulez vous vraiment supprimer ce commentaire <span class="purple-text">" {{$comment->body}} "</span>   ?</p> 
    </div>

    <div class="col s6">
    <form action="/services/suppr/{{$comment->id}}" method="POST">
    {{ csrf_field() }}

    


    <span>   <input type="submit" class="btn purple hoverable waves effect" value="supprimer"></span>
  <span>    <a href="#" class="btn red hoverable waves effect modal-action modal-close" id="non"> Non</a></span>
    </form>
  

    </div>
    </div>
    </div>
  
  </div>

   
 

@endforeach


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
<p style="font-size:30px;"> Aucun Commentaire !</p>
</div>
</div>
<div class="row">
<div class="col s12">
   <p style="font-size:20px">  Soyez le premier à commenter!</p>
</div>
</div>

</div>

</div>

</div>
</div>
  @endif
  
 
 </section>
  
           





        @endsection