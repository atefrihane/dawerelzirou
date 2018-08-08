<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/








Auth::routes();
Route::get('/', function(){

    return view('index');
});

Route::get('/about', function(){

    return view('about');
});
Route::get('/inbox', 'HomeController@inbox');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/search/nouveau', 'HomeController@nouveau')->name('nouveau');
Route::get('/search/notes', 'HomeController@notes')->name('notes');
Route::post('/payment/{id}','PaymentController@achat')->name('achat');



Route::get('/admin', 'Admin\AdminController@show');
Route::prefix('admin')->group(function(){
    Route::post('/user/{id}', 'Admin\AdminController@destroyuser');
Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('AdminLogin');
Route::post('/login', 'Admin\AdminLoginController@login');
Route::get('/logout', 'Admin\AdminLoginController@logout');
Route::get('/services', 'Admin\AdminController@services');
Route::get('/achat', 'Admin\AdminController@achat');
Route::post('/services/app/{id}', 'Admin\AdminController@approuver');
Route::post('/services/suppr/{id}', 'Admin\AdminController@destroy');


Route::get('/categorie', 'Admin\AdminController@categorie');
Route::post('/categorie/maj/{id}', 'Admin\AdminController@majcat');
Route::post('/categorie/{id}', 'Admin\AdminController@destroycategorie');

Route::post('/categorie', 'Admin\AdminController@addcategorie');
});

Route::prefix('profil')->group(function(){
    Route::get('/changepassword', 'ProfilController@showmp')->name('change-mp');
    Route::post('/changepassword', 'ProfilController@updatepassword');
    Route::get('/edit', 'ProfilController@showedit')->name('edit-profil');
    Route::post('/edit', 'ProfilController@updateprofile');
    Route::get('/','ProfilController@show');
    Route::get('/{username}','ProfilController@showprofile');
    Route::post('/{id}', 'ProfilController@inbox');
  });

    Route::get('/category/{id}', 'HomeController@category');

    Route::get('/Services/achat', 'ServiceController@achat');
   

  

   
/* Les CRUDS des Services */
    Route::resource('Services', 'ServiceController', ['except' => [
        'index'
    ]]);

   

    /* */



    /* Les CRUDS de Categories */
    Route::resource('Categories', 'CategoryController');

    /**/




  
   /* Les Commentaires des services */

   Route::post('/services/{services_id}','CommentsController@store');
   Route::post('/services/maj/{id}','CommentsController@update');
   Route::post('/services/suppr/{id}','CommentsController@destroy');
/**/






 /* L'evaluation des services */
    Route::post('/like','ServiceController@like')->name('like');
    Route::post('/dislike','ServiceController@dislike')->name('dislike');
  /**/

 /* Les Notifications */
   Route::get('/MarkAllSeen','NotificationsController@allseen');
  /**/
