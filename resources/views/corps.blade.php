  <!DOCTYPE html>
  <html>
    <head>
     @include('partials1._header')
      
    </head>

    <body>
 
<section> 
  <nav>
    @include('/partials1._nav')
  </nav>
        </section>
  
            @yield('content')
        
         @include('partials1._footer')
  
            @include('partials1._javascript')        
           

           
          

                
    </body>
  </html>  
             