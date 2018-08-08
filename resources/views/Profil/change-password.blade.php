@extends('corps')
       @section('title','Changement mot de passe')
        @section('content')
<section>
        <div class="row">
    <div class="col s12 l3 ">
        
        
     <div class="card small" style="height: auto;width: auto;">
        <div class="card-content center-align" style="background-color: #3498db;">
           <a href="/profil/edit" style="color: #fff;font-size: 16px;"> Edition du profil</a>
          
         </div>
   
        <div class="card-content center-align" style="background-color: #2980b9;
" >
           
           <a href="/profil/changepassword" style="color: #fff;font-size: 16px;"> Changement du mot de passe</a>
        </div>
         
         
            
             
       
     </div>
        
        
    </div>
    <br><br>
    
    <div class="col s12 l9 l1">
     
        <div class="card" style="width:auto;height: auto;">
           <div class="card-content center-align" style="background-color: #2980b9;">
              
              <h5 style="color: #fff;text-transform: uppercase;"> Changement Du Mot de Passe </h5>
               
           </div>
           <div class="card-content">
               <div class="row">
                   <div class="col s12">
                       
                         <p style="font-size: 17px;">   Pour des raisons de sécurité, vous avez la possibilité de changer votre mot de passe quand bon vous semble. </p>
                   </div>
               </div>

               <div class="row">
           <div class="col s12">
           @if(session()->has('notif'))

        <div class="card-panel green lighten-4 green-text text-darken-4"><b>Succés!</b> Votre mot de passe est bien à jour !</div>
           </div></div>
           
           
          @endif

         @if(session()->has('erreur'))

<div class="card-panel red lighten-4 red-text text-darken-4"><b>Oups!</b>&nbsp Erreur de mot de passe, Prière de verifier à nouveau!</div>
   </div></div>

   @endif
   
   

        
          
               
               
               
               <div class="row">
    <form class="col s12" action="/profil/changepassword"  method="post">
    {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
         <i class="material-icons prefix">lock_open</i>
          <input id="icon_prefix" type="password" name="oldpassword"  class="validate">
          <label for="icon_prefix" style="color: black;"> Mot de passe actuel</label>
        </div>
        
        
         <div class="input-field col s12">
         <i class="material-icons prefix">lock_open</i>
          <input id="icon_prefix" type="password" name="newpassword" class="validate">
          <label for="icon_prefix" style="color: black;">Nouveau Mot de Passe</label>
        </div>
      
      </div>
      
      <div class="row">
          <div class="col s12 center-align">
              <input type="submit" value="Modifier le mot de passe" class="btn-large" style="background-color:#2980b9; ">
          </div>
      </div>
    </form>
  </div>
            
               
               
        

 </div>
        </div>
    </div>
    </div>
    </section>
        
        @endsection