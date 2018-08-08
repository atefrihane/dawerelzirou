<head>

 <!-- <link rel="stylesheet" href="css/dasheboard.css">-->
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
      <link href="{!! asset('css/materialize.css') !!}" rel="stylesheet" type="text/css">
      <title> Administration</title>
    <style>
    .side-nav{
    top: 65px;
    width: 250px;
}
    </style>
</head>

<div class="navbar-fixed">

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
 
  <li><a href="/admin/logout">Logout</a></li>
</ul>
<div class="nav-wrapper">
<nav class="light-blue lighten-1" role="navigation">
  <div class="nav-wrapper container">
    <a href="/admin" class="brand-logo">Admin Panel</a>
    <ul class="right hide-on-med-and-down">
      <!-- Dropdown Trigger -->
   
     <li><a class="dropdown-button" href="#!" data-activates="dropdown1"> {{Auth::user()->username}}<i class="material-icons right">arrow_drop_down</i></a></li> 
    </ul>
  </div>
</nav>
</div>
</div>


 <div class="row">
    <div class="col l3">

<ul id="slide-out" class="side-nav fixed">
  
   <li class="center">
       <div class="purple darken-2 white-text" style="height: auto;">
           <div class="row">
           <div class="row"></div>
          <img  src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463990208/photo_dkkrxc.png" class="circle responsive-img" />
        
           </div>

           <div class="row">
           <p>Administration</p>
           </div>
       
         
       </div>
       
   </li>
   
   <li><a href="/admin"><i class="material-icons">verified_user</i>Utilisateurs</a></li>
   <li><a href="/admin/services"><i class="material-icons">work</i>Services</a></li>
    <li><a href="/admin/categorie"><i class="material-icons">cloud</i>Catégories</a></li>
    <li><a href="/admin/achat"><i class="material-icons">payment</i>Paiements</a></li>
    <li><div class="divider"></div></li>
   <br>
    <li><a class="subheader"><p style="margin-left:10px;color:purple;">&copy; 2018 DawerElZirou!<p>!</a></li>
   
   
   
</ul>

  </div>