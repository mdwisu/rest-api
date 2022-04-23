function searchMovie() {
  $('#movie-list').html('');

  $.ajax({
    url: 'http://omdbapi.com',
    type: 'get',
    dataType: 'json',
    data: {
      apikey: 'd96184ce',
      s: $('#search-input').val(),
    },
    success: function (result) {
      if (result.Response == 'True') {
        let movies = result.Search;

        $.each(movies, function (indexInArray, valueOfElement) {
          $('#movie-list').append(`
                    <div class=col-md-4>
                        <div class="card">
                        <img src="`+ valueOfElement.Poster +`" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">`+ valueOfElement.Title +`</h5>
                            <h6 class="card-subtitle mb-2 text-muted">`+ valueOfElement.Year +`</h6>
                            <a href="#" class="card-link see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="`+valueOfElement.imdbID+`">See Detail</a>
                            </div>
                        </div>
                    </div>
                    `);
        });
        $('#search-input').val('');
      } else {
        $('#movie-list').html(
          `
                <div class"col">
                    <h1 class="text-center">` +
            result.Error +
            `</h1>
                </div>
                `
        );
      }
    },
  });
};

$('#search-button').click(function (e) {
  searchMovie();
});

$('#search-input').keyup(function (e) { 
    if (e.keyCode === 13) {
        searchMovie();
    }
});

$('#movie-list').on('click','.see-detail', function () { 
    $.ajax({
        url: 'http://omdbapi.com',
        dataType: 'json',
        type: 'get',
        data: {
            'apikey': 'd96184ce',
            'i': $(this).data('id')
        },
        success: function (movie) {
            if (movie.Response === "True") {
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-sm-12">
                        <img src="`+movie.Poster+`" class="img-fluid card-img-top">
                        </div>
                        <div class="col-sm-12">
                        <div class="row">
                        <div class="col-sm-6>
                            <ul class="list-group">
                                <li class="list-group-item"><h3>`+movie.Title+`</h3></li>
                                </ul>
                                </div
                                <div class="col-sm-6>
                                <li class="list-group-item">Releazed : `+movie.Released+`</li>
                                <li class="list-group-item">Releazed : `+movie.Genre+`</li>
                                <li class="list-group-item">Genre : `+movie.Genre+`</li>
                                <li class="list-group-item">Director : `+movie.Director+`</li>
                                <li class="list-group-item">Actors : `+movie.Actors+`</li>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                            `);

            }
        }
    });
});
