<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
      <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  
<link href="{!! asset('css/monstyle.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('css/materialize.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('css/animate.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('css/parsley.css') !!}" rel="stylesheet" type="text/css">
    <title>ADmin-Login|DawerElzirou</title>
</head>
<body>
<nav>
   <div class="nav-wrapper">
     <div class="container"></div>
      <a href="/" class="brand-logo center-align"> DawerElZirou!</a>
   
  
     
    </div> </nav>
  
    <section>
        
        
            
            <div class="parallax-container">
            
         
          <div class="row">
          <div class="col s12 offset-l4">
       <div class="card " style="background: #2980b9; width: 500px; height:480px">
           
           <div class="card-content white-text center-align">
              
              <h1 style="margin-top: -10px;"> <i class="fa fa-user-secret"></i></h1>
              <h4> Admin Authentification</h4>
              
               @if ($errors->has('email'))
                    <div class="alert alert-danger alert-dismissible fade show flash-alert" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $errors->first('email') }}
                    </div>
                @endif
              
             <form action="/admin/login" method="post">
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
      
      <a href="" class="right"> Mot de passe oublié </a>
    </p>
                   <div class="row">
                 <div class="col s12">
                 
                 <input type="submit" class="btn hoverable purple white-text" style="margin-top:30px;" value="connexion">
                 
    </div></div>
                
                
            
                 
                 
             </form>
              
               
           </div>
              </div>
           </div>
              </div>
           


            <div class="parallax">
        
   
            <img src="/img/computer-1185567_1920.jpg"  alt="">
           
           
                </div>
           </div>

    </section>
    
    
        

      <footer style="background-color: #2980b9; padding-bottom:1px;">
       
       <div class="container">
           <div class="row">
               <div class="col s12">
                   
                   <h2 style="font-size:30px;color:#fff;" class="center-align"> Suivez DawerElzirou!</h2>
                    </div>
                    <div class="col s12">
                   <p class="center-align" style="color:#fff;"> Nous sommes  aussi sur les fameux reseaux sociaux !</p>
               </div>
                  <div class="col s12">
                   <ul class="center-align">
                       
                       <li> <a href="" style="color:#fff; font-size:40px;" class="hoverable"> <i class="fab fa-facebook"></i></a></li>
                       <li><a href="" style="color:#fff; font-size:40px;" class="hoverable"> <i class="fab fa-youtube-square"></i></a></li>
                     <li><a href="" style="color:#fff; font-size:40px;" class="hoverable"> <i class="fab fa-instagram"></i></a></li>
                      </ul> </div>
          
              
               
           </div>
           
           
       </div>
        
        
        </footer>
     
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
   <script>
        
         $(document).ready(function(){
      $('.parallax').parallax();
    });
       
    $('.carousel.carousel-slider').carousel({fullWidth: true});
        
        </script>                    
</body>
</html>