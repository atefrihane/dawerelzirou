 <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
   
   <script>
        
        $(document).ready(function(){
    $('.parallax').parallax();
  });
     
  $('.carousel.carousel-slider').carousel({fullWidth: true});
      
       $(document).ready(function() {
  $('select').material_select();
});
     
$(document).ready(function() {
  $('.modal').modal();
});

  $(document).ready(function(){
    $('.tabs').tabs();
  });
      
              
     
  
 
</script>

   <script>
        
       
       

       

       
         $(document).ready(function() {
    $('.parallax').parallax();
    $('select').material_select();
  
    $('.collapsible').collapsible();
   
  });
       




 
 
       
    
   
</script>


<script>

  $(document).ready(function(){


    $( "#select" ).change(function() {
      var myval =  $("#select").val();
      var url1="{{ route('nouveau') }}";
      var url2="{{ route('notes') }}";
      var url3="{{ route('home') }}";

      
      if (myval=="pertinence"){
        $.ajax({

          type:'get',
          url:url3,
          data:[],
          success:function(data){
            window.location=url3;

          },
          error:function(){

          }

        });


      }
   
      if (myval=="notes"){
        $.ajax({

          type:'get',
          url:url2,
          data:[],
          success:function(data){
            window.location=url2;

          },
          error:function(){

          }

        });


      }



      if (myval=="nouveauté"){
        $.ajax({

          type:'get',
          url:url1,
          data:[],
          success:function(data){
            window.location=url1;

          },
          error:function(){

          }

        });


      }

   
  
});

  });

</script>







<script type="text/javascript" src="{{ asset('js/like.js') }}"></script>




<script type="text/javascript">

var url="{{ route('like') }}";

var url_dis="{{ route('dislike') }}";

var token="{{ Session::token() }}";

</script>



