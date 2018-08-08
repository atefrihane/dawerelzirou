@extends('corps')
       @section('title','Edition profile ')
       @section('pagespecifictyles')
       <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.14.0/sweetalert2.min.css" rel="stylesheet">
       @endsection
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
    <div class="col s12 l9">
     
        <div class="card" style="width:auto;height: auto;">
           <div class="card-content center-align" style="background-color: #3498db;">
              
              <h5 style="color: #fff;text-transform: uppercase;"> Edition Du Profil</h5>
               
        </div>
          
          
           <div class="card-content">
          
           

           <div class="row">
           <div class="col s12">
           @if(session()->has('notif'))

         <div class="card-panel green lighten-4 green-text text-darken-4 center-align"><b>Succés!</b> Mise à jour reussite!</div>
           </div></div>
           
           
          @endif

           
           
        
           
           
           
          
            <div class="row">
            <form class="col s12"  action="/profil/edit" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

           
        <div class="input-field col l6">
         <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="username" class="validate" value="{{Auth::user()->username}}">
          <label for="icon_prefix" style="color: black;" >Nom d'utilisateur</label>
        
        </div>
               
               <div class="input-field col l6">
         <i class="material-icons prefix">mail</i>
          <input id="icon_prefix" type="text" name="email" class="validate" value="{{Auth::user()->email}}">
          <label for="icon_prefix" style="color: black;" >Email</label>
        
        </div>
                
                
                          <div class="input-field col l6">
                            <i class="material-icons prefix">location_city</i>
    <select name="ville">
      
      <option value="" disabled selected>{{Auth::user()->ville}}</option>
      <option value="Ariana">Ariana</option>
      <option value="Béja">Béja</option>
      <option value="Ben Arous">Ben Arous</option>
      <option value="Bizerte">Bizerte</option>
      <option value="Gabes">Gabes</option>
      <option value="Gafsa">Gafsa</option>
      <option value="Jendouba">Jendouba</option>
      <option value="Kairaouan">Kairaouan</option>
      <option value="Kasserine">Kasserine</option>
      <option value="Kebili">Kebili</option>
      <option value="Kef">Kef</option>
      <option value="Manouba">Manouba</option>
      <option value="Mahdia">Manouba</option>
      <option value="Medenine">Medenine</option>
      <option value="Monastir">Monastir</option>
      <option value="Nabeul">Nabeul</option>
      <option value="Sfax">Sfax</option>
      <option value="SidiBouzid">Sidibouzid</option>
      <option value="Silliana">Silliana</option>
      <option value="Sousse">Sousse</option>
      <option value="Tataouine">Tatatouine</option>
      <option value="Tozeur">Tozeur</option>
      <option value="Tunis">Tunis</option>
      <option value="Zaghouane">Zaghouane</option>
    </select>
    <label>Ville </label>
  </div>
                 <div class="input-field col l6">
         <i class="material-icons prefix">phone</i>
          <input id="icon_prefix" type="tel" name="tel" class="validate" value="{{Auth::user()->tel}}">
          <label for="icon_prefix" style="color: black;" >Telephone</label>
        
        </div>
               
               <div class="input-field col s12">
          <i class="material-icons prefix">description</i>
          <textarea id="textarea1" name="description" class="materialize-textarea"></textarea>
          <label for="textarea1">Description de l'utilisateur</label>
      </div>
      <div class="row">
        <div class="col s12">
            <p> <span style="text-transform: uppercase;font-size: 17px;"> Notation :</span> Décrivez brièvement vous même </p>
        </div>
                     </div>
                </div>
               
                 <div class="col s12">
              
          <div class="file-field input-field" id="input-field">
            <i class="material-icons prefix">photo_camera</i>
      <div class="btn white">
        <span>Importer une photo personnel</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
               
               
                  <div class="input-field col s12">
          <i class="material-icons prefix">description</i>
          <textarea id="textarea1" name="diplomes" class="materialize-textarea"></textarea>
          <label for="textarea1">Certificats & Diplomes</label>
      </div>
       <div class="row">
        <div class="col s12">
            <p> <span style="text-transform: uppercase;font-size: 17px;"> Notation :</span> Si vous disposez de <b>certificats</b> ou <b>diplomes</b> vous pouvez les mentionner ci dessus dans cette barre de description </p>
        </div>
                     </div>
                </div>

                        <div class="input-field col s12">
          <i class="material-icons prefix">language</i>
          <textarea id="textarea1" name="langues" class="materialize-textarea"></textarea>
          <label for="textarea1">Langues</label>
      </div>

       <div class="row">
        <div class="col s12">
            <p> <span style="text-transform: uppercase;font-size: 17px;"> Notation :</span> Si vous disposez des <b>Langues</b> dont vous maitrisez  vous pouvez les mentionner ci dessus dans cette barre de description </p>
        </div>
                     </div>
                </div>
               
                <div class="row">
                <div class="col s12 center-align">

                   
   
                     
                    <input id="click" type="submit" value="Mettre à jour" class="btn-large" style="background-color: #3498db;">
                </div>
                </div>

               
                </form>
                <br>
       
      
       
    </div>
    </div>
        </div>
    </div>
    </section>
    

















        @endsection
      