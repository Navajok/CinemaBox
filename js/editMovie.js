$(".editbutton").on('click', function(){

    var $movie = $(this).closest('.movie');

    var movieID = $movie.data('movieid');
    var title = $movie.data('title');
    var poster = $movie.data('poster');
    var moviePrice = $movie.data('movieprice');
    var genre = $movie.data('genre');
    var runtime = $movie.data('runtime');
    var plot = $movie.data('plot');

    var queryString = 'movieID=' + encodeURIComponent(movieID) +
                    '&title=' + encodeURIComponent(title) +
                    '&poster=' + encodeURIComponent(poster) +
                    '&moviePrice=' + encodeURIComponent(moviePrice) +
                    '&genre=' + encodeURIComponent(genre) +
                    '&runtime=' + encodeURIComponent(runtime) +
                    '&plot=' + encodeURIComponent(plot);

    window.location.href = 'editMovie.php?' + queryString;
});