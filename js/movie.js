searchInput.addEventListener('keyup', function() {
    var searchQuery = searchInput.value.toLowerCase();
    var forms = document.querySelectorAll('.form');

    forms.forEach(form => {
        var movie = form.querySelector('.movie');
        var title = movie.getAttribute('data-title').toLowerCase();  // Convert title to lowercase
        var genre = movie.getAttribute('data-genre').toLowerCase();

        if (title.includes(searchQuery) || genre.includes(searchQuery)) {
        form.style.display = 'block';
        } else {
        form.style.display = 'none';
        }
  });
});