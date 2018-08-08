@extends('main')
      @section('title','Connexion')
       @section('content')
        <section>
         
            
            
            
            <div class="parallax-container">
            
          <div   id="pos" class="container">
          <div class="row">
          <div class="col s12">
       <div class="card " style="background: #2980b9; width: 500px; height:480px">
           
           <div class="card-content white-text center-align">
              
              <h1 style="margin-top: -10px;"> <i class="fa fa-sign-in-alt"></i></h1>
              <h4> Authentification</h4>
              
             <form action="/login" method="post">
                 {{csrf_field()}}
                  
                <div class="input-field col s12">
          <i class="material-icons prefix">email
</i>
          <input id="icon_prefix" name="email" type="text" class="validate">
          <label for="icon_prefix" style="color:#fff;">E-Mail</label>
        </div>
                 
               <div class="input-field col s12">
        <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" name="password" type="password" class="validate">
          <label for="icon_prefix" style="color:#fff;">Mot de passe</label>
        </div>
                <p>
      <input type="checkbox" class="filled-in" id="filled-in-box" />
      <label for="filled-in-box" >Se rappeler de moi?</label>
      
      <a href="#" class="right"> Mot de passe oublié?</a>
    </p>
<div class="row">
                 <div class="col s12">
                 
                 <input type="submit" class="btn hoverable purple white-text" style="margin-top:10px;" value="connexion">
                 
    </div></div>
                <div class="row">
                 <div class="s12">
                     <p class="center-align" style="margin-top:-10px;"> OU</p>
                    </div></div>
                <div class="row">
                 <div class="col s12">
                   <a href="/register" class="btn green hoverable" style="margin-top:-20px;"> S'inscrire</a>
                    </div> </div>
                
            
                 
                 
             </form>
              
               
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
        
                
                        
                                
                                        
                                                
                                                        
                                                                
                                                                        
 