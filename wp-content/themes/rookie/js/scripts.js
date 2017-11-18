/**
 * scripts.js
 *
 * Custom scripts for the Rookie theme.
 */
( function( $ ) {
	$('.comment-metadata time').timeago();

	$(".toogleComment").click(function(event) {
		console.log(event);
		var commentId = event.currentTarget.dataset.comment;
		$(".blocComment-"+commentId).slideToggle();
	});

} )( jQuery );
