@extends('main')
 @section('title','Inscription')
 @section('content')
  
  <section>
          <div class="parallax-container">
              
           
                  <div class="container">
                  <div class="row">
                  <div class="col s12 offset-l1">
                  <div class="card" style="width: 800px;background: #2980b9; height:450px;width:auto;">
                      
                      <div class="card-content white-text center-align">
                         
                          <h1 style="margin-top:-10px;"> <i class="fa fa-user-plus"></i> </h1>
                            <h4 style="margin-top:-20px;"> Inscription</h4>
                
                            
                            
  <div class="row">
    <form class="col s12" action="/register" method="post">
{{csrf_field()}}
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input name="username" id="icon_prefix"  type="text" class="validate">
          <label for="icon_prefix" style="color:#fff;">Nom d'utilisateur</label>
        </div>
     <div class="input-field col s6">
        <i class="material-icons prefix">email
</i>
          <input  name="email" id="icon_prefix"  type="email" class="validate">
          <label for="icon_prefix" style="color:#fff;" data-error="INVALIDE" data-success="VALIDE">Adresse Email</label>
        </div>
        
         
                           <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input  name="tel" id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone" style="color:#fff;">Telephone</label>
        </div>
                        
          
    
    <div class="input-field col s6">
   
     <select name="ville">
    
       
      <option value="" disabled selected>Choissisez votre ville</option>
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
    
      <label style="color:#fff;">Ville </label>
  </div>
     
         <div class="input-field col s6">
        <i class="material-icons prefix">lock</i>
       <input  type="password" name="password"  class="validate" required="">
          <label for="icon_prefix" style="color:#fff;">Mot de passe</label>
        </div>
                         
                               
                              <div class="input-field col s6">
        <i class="material-icons prefix">lock</i>
         <input type="password" name="password_confirmation"  class="validate">
          <label for="icon_prefix" style="color:#fff;">Confirmer</label>
          
        </div>
                         
     
      <div class="input-field col s12">
                        
                        <input type="submit" class="btn-large green" value="s'inscrire" style="margin-top:-7px;">
                    </div>
     
     
      </div>
    </form>
  </div>
                          
                          
                      </div>
                  </div>
              </div>
              </div>
              </div>
              
              <div class="parallax">
              <img src="/img/bg.jpeg"  alt="" style="width:100%;" class="responsive-img">
              </div>
              
      </div>
</section>
            
           
    
                
               
        
 


@endsection