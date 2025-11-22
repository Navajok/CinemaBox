$(".deletebutton").on('click', function(){

    var movieID = $(this).closest('.movie').data('movieid');

    window.location.href = 'deleteMovie.php?movieid=' + movieID;
});