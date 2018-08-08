 <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
                
       
    
   
</script>

<script type="text/javascript" src="{{ asset('js/like.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/.js') }}"></script>


<script type="text/javascript">

var url="{{ route('like') }}";

var url_dis="{{ route('dislike') }}";

var token="{{ Session::token() }}";

</script>