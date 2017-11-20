/**
 * scripts.js
 *
 * Custom scripts for the Rookie theme.
 */
( function( $ ) {
  $('.comment-metadata time').timeago();

  $(".toogleComment").click(function(event) {
    var commentId = event.currentTarget.dataset.comment;
    console.log(commentId);
    $(".blocComment-"+commentId).slideToggle();
  });

  /*
   * Show slide for given index
   */
  function showSlide(index){

    clearTimeout(window.idto);

    var nextIndex = (index == 2) ? 0 : index + 1;

    var slides = [0, 1, 2];
    for (var i = 0; i < slides.length; i++) {
      if ( $('#dot-'+i).hasClass('active') ) {
        $('#dot-'+i).removeClass('active');
        $('.index-'+i).fadeOut('medium', function() {
          $('.index-'+index).fadeIn('medium');
          $('#dot-'+index).addClass('active');
        });
      }
    }

    window.idto = setTimeout(function(){
      showSlide(nextIndex);
    }, 8000);
  }

  // bind dot buttons
  $("#dot-0" ).click(function() { showSlide(0) });
  $("#dot-1" ).click(function() { showSlide(1) });
  $("#dot-2" ).click(function() { showSlide(2) });

  // init
  showSlide(0);

} )( jQuery );
