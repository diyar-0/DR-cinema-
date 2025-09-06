
<?php

$is_favorite = false;

// ✅ چاککردنی دۆخی فەیڤۆریت
if (isset($_SESSION['user_id'])) {
    $user_id = intval($_SESSION['user_id']);

    // پشکنینی ئەگەر ئەم فیلمە فەیڤۆریتکراوە لەلایەن ئەم بەکارهێنەرەوە
    $result = $conn->query("SELECT id FROM favorites WHERE user_id = $user_id AND film_id = $film_id");
    if ($result && $result->num_rows > 0) {
        $is_favorite = true;
    }

    // ✅ گەیاندنی AJAX بۆ like/unlike
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like']) && isset($_POST['film_id'])) {
        header('Content-Type: application/json');
        $film_id = intval($_POST['film_id']);
        $like = intval($_POST['like']);

        if ($like) {
            $conn->query("INSERT IGNORE INTO favorites (user_id, film_id) VALUES ($user_id, $film_id)");
            echo json_encode(['success' => true, 'message' => 'Liked']);
        } else {
            $conn->query("DELETE FROM favorites WHERE user_id = $user_id AND film_id = $film_id");
            echo json_encode(['success' => true, 'message' => 'Unliked']);
        }
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // بەکارهێنەر نەچوە ژوورەوە
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}
?>

<!-- ✅ Style -->
<style>
  #toggleBtn:hover {
    background: linear-gradient(45deg, rgb(42, 0, 139), purple) !important;
  }
</style>

<!-- ✅ HTML -->
  <?php
    if (isset($_SESSION['username'])  && $_SESSION['user_id'] == true) {
    ?>
<button style="background: linear-gradient(45deg, purple,rgb(42, 0, 139)); color:aliceblue;" 
        id="toggleBtn" 
        class="d-flex align-items-center rounded-1 justify-content-center">
  <i class="fas me-1 <?= $is_favorite ? 'fa-check' : 'fa-plus' ?>"></i> Favorite
  <input type="checkbox" 
         id="favCheckbox" 
         data-film-id="<?= $film_id ?>" 
         style="display: none;" 
         <?= $is_favorite ? 'checked' : '' ?> />
</button>
 <?php
    } else { ?>
<button  data-bs-toggle="modal" data-bs-target="#Togglemodalregister222" style="background: linear-gradient(45deg, purple,rgb(42, 0, 139)); color:aliceblue;" 
        id="toggleBtn" 
        class="d-flex align-items-center rounded-1 justify-content-center">
  <i class="fas me-1 fa-plus"></i> Favorite 
</button>
 <div class="modal fade" id="Togglemodalregister222" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
          <div class="modal-body text-center d-flex align-items-center gap-2 py-2 px-4">
            <i class="fas fa-exclamation-triangle text-warning fs-3"></i>
            <h3 class="m-0 p-0 flex-grow-1">You must register to do this</h3>
            <button type="button" class="btn-close mt-1 btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
      </div>
    </div>
   <?php } ?>
<!-- ✅ JavaScript -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggleBtn');
    const icon = toggleBtn.querySelector('i');
    const checkbox = document.getElementById('favCheckbox');

    toggleBtn.addEventListener('click', () => {
      const isLiked = checkbox.checked;
      const filmId = checkbox.getAttribute('data-film-id');

      // گۆڕینی ئایکۆن
      if (isLiked) {
        icon.classList.remove('fa-check');
        icon.classList.add('fa-plus');
      } else {
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-check');
      }

      checkbox.checked = !isLiked;

      // AJAX ناردنی داتا بۆ یەک پەڕەکە
      fetch(window.location.href, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `like=${checkbox.checked ? 1 : 0}&film_id=${filmId}`
      })
      .then(res => res.json())
      .then(data => {
        console.log(data.message);
      })
      .catch(err => console.error('AJAX error:', err));
    });
  });
</script>