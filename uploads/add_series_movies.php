<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Live Movie Search + Sidebar</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/add_series_movies.css">
</head>
<body>
<h2 class="mb-2"><i class="bi bi-search"></i> Live Search Series</h2>
<input type="text" id="search" placeholder="Search Series...">
<div id="movie-list" style="display:flex; flex-wrap:wrap;"></div>
<!-- Sidebar Form -->
<div class="sidebar-form" id="sidebarForm">
  <div class=" w-full justify-between items-center">
      <button id="closeSidebar" class="text-xl btn btn-outline-danger border-danger cursor-pointer"> <i class="bi bi-x-circle-fill me-1"></i> Close</button>
      <div>
        <h3 id="filmName" class="text-lg font-semibold">Film Name</h3>
        <span id="filmseason"></span>
      </div>
  </div>
  <img style="width: 100%; height:300px; object-fit: cover; " id="filmImage" src="" alt="Film Image">

  <div id="messageBox"></div>

  <form id="editForm" method="post" action="save_series_video.php">
    <input type="hidden" name="film_id" value="">
    <input type="hidden" name="film_season" value="">
    <label for="videoLink">Video URL or Upload</label>
    <input type="text" id="videoLink" name="video_url" placeholder="Enter video URL...">
    <div id="seriesGroup" style="display:none;">
      <label for="seriesNumber">Episode Number</label>
      <input type="number" id="seriesNumber" name="episode_number" min="1" placeholder="Enter episode number">
    </div>
    <button type="submit" class="btn btn-success"><i class="bi bi-upload me-1"></i> Save</button>
  </form>
  <div id="seriesDataContainer" style="margin-top: 15px;"></div>
</div>

<script>
$(document).ready(function() {

  function loadMovies(query = "") {
    $.ajax({
      url: 'search_movies.php',
      method: 'POST',
      data: { search: query },
      success: function(data) {
        $('#movie-list').html(data);
        attachClickHandlers();
      },
      error: function() {
        $('#movie-list').html('<p style="color:red;">Failed to load movies.</p>');
      }
    });
  }

  function attachClickHandlers() {
    $('.movie-card').on('click', function () {
      const name = $(this).data('name');
      const image = $(this).data('image');
      const type = $(this).data('type');
      const idFilm = $(this).data('id');
      const season = $(this).data('season');

      $('#filmName').text(name);
      $('#filmImage').attr('src', image);
      $('#editForm input[name="film_id"]').val(idFilm);
      $('#editForm input[name="film_season"]').val(season);

      if (type && type.endsWith('Series')) {
        $('#seriesGroup').show();
      } else {
        $('#seriesGroup').hide();
        $('#seriesNumber').val('');
      }

      $('#messageBox').hide().removeClass('error success').text('');
      $('#sidebarForm').addClass('active');

      loadSeriesData(idFilm);
    });
  }

  function loadSeriesData(filmId) {
    $.ajax({
      url: 'get_series_data.php',
      method: 'POST',
      data: { film_id: filmId },
      success: function(response) {
        $('#seriesDataContainer').html(response);
      },
      error: function() {
        $('#seriesDataContainer').html('<p style="color:red;">Could not load series data.</p>');
      }
    });
  }

  loadMovies();

  $('#search').on('input', function() {
    loadMovies($(this).val());
  });

  $(document).on('click', function (e) {
    if (!$(e.target).closest('.sidebar-form, .movie-card').length) {
      $('#sidebarForm').removeClass('active');
      $('#messageBox').hide().removeClass('error success').text('');
    }
  });

  $('#closeSidebar').on('click', function () {
    $('#sidebarForm').removeClass('active');
    $('#messageBox').hide().removeClass('error success').text('');
  });


  $(document).ready(function () {
    $('#seriesNumber').on('input', function () {
      const episodeNumber = $(this).val();
      const filmId = $('input[name="film_id"]').val();

      if (!filmId || !episodeNumber) return;

      $.ajax({
        url: 'get_max_episode.php',
        method: 'POST',
        dataType: 'json',
        data: {
          film_id: filmId,
          episode_number: episodeNumber
        },
        success: function (response) {
          if (response.exists) {
            $('#seriesNumber')[0].setCustomValidity('⚠️ Episode number already exists for this film.');
          } else {
            $('#seriesNumber')[0].setCustomValidity('');
          }
        },
        error: function () {
          $('#seriesNumber')[0].setCustomValidity('⚠️ Error checking episode number.');
        }
      });
    });
  });



  $('#editForm').on('submit', function(e) {
    e.preventDefault();

    const videoLink = $('#videoLink').val().trim();
    const seriesNumber = $('#seriesNumber').val().trim();
    const idFilm = $('#editForm input[name="film_id"]').val();
    const film_season__ = $('#editForm input[name="film_season"]').val();

    if (!idFilm) {
      showMessage('No film selected!', 'error');
      return;
    }
    if (videoLink === "") {
      showMessage('Video URL cannot be empty.', 'error');
      return;
    }

    if ($('#seriesGroup').is(':visible')) {
      const num = parseInt(seriesNumber);
      if (isNaN(num) || num < 1) {
        showMessage('Episode number must be a positive integer.', 'error');
        return;
      }
    }

    $.ajax({
      url: 'save_series_video.php',
      method: 'POST',
      data: {
        film_season: film_season__,
        film_id: idFilm,
        video_url: videoLink,
        episode_number: seriesNumber === '' ? null : seriesNumber
      },
      success: function(response) {
        if(response.toLowerCase().includes('error')) {
          showMessage(response, 'error');
        } else {
          showMessage(response, 'success');
          loadSeriesData(idFilm);

          setTimeout(() => {
            $('#sidebarForm').removeClass('active');
            $('#editForm')[0].reset();
            $('#messageBox').hide();
            $('#seriesDataContainer').html('');
          }, 1500);
        }
      },
      error: function() {
        showMessage('Error: Could not contact server.', 'error');
      }
    });
  });

  function showMessage(msg, type) {
    $('#messageBox').text(msg).removeClass('error success').addClass(type).show();
  }

});
</script>

</body>
</html>
