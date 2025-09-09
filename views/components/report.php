<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies_db";

// ئەوەی ئەگەر film_id هەیە
$films_id = $film_id; // بگەڕێ بۆ film_id ـەکەت
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['reason'])) {
  $reason = trim($_POST['reason']);

  if(!empty($reason) && !empty($user_id) && !empty($films_id)) {
    $sql = "INSERT INTO reports (film_id, user_id, reason) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $films_id, $user_id, $reason);
    $stmt->execute();
    $stmt->close();
  }
}

// $conn->close();
?>


<!DOCTYPE html>
<html lang="ku">

<head>
  <meta charset="UTF-8" />
  <title>Modal Report with AJAX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark text-light">

  <div class="container m-0 p-0" style="max-width: 480px;">
    <!-- Report Button -->
    <?php
    if (isset($_SESSION['username'])  && $_SESSION['user_id'] == true  )   {
    ?>
      <button style="background: linear-gradient(45deg, purple,rgb(42, 0, 139));" type="button" class=" text-white d-flex align-items-center justify-content-center rounded-3 px-2 py-2 btn w-100"
        data-bs-toggle="modal" data-bs-target="#reportModal">
        <i class="fas fa-flag me-2"></i> Report
      </button>
    <?php
    } else { ?>
      <button style="background: linear-gradient(45deg, purple,rgb(42, 0, 139));" type="button" class="  text-white d-flex align-items-center justify-content-center rounded-3 px-2 py-2 btn w-100 "
        data-bs-toggle="modal" data-bs-target="#must_login">
        <i class="fas fa-flag me-2"></i> Report
      </button>
    <?php } ?>
    <!-- لۆگین login  -->
    <div class="modal fade" id="must_login" tabindex="-1" aria-hidden="true">
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
    <!-- لۆگین login  -->
    <!-- <script>
document.addEventListener('shown.bs.modal', function (event) {
  if (event.target.id === 'Togglemodalregister2') {
    setTimeout(function () {
      const modalEl = document.getElementById('Togglemodalregister2');
      const modalInstance = bootstrap.Modal.getInstance(modalEl);
      modalInstance.hide();
      modalEl.parentNode.removeChild(modalEl);
    }, 4000);
  }
});
</script> -->

  </div>
  <!-- Report Modal -->
  <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title text-light"><i class="fas fa-flag text-danger"></i> Report Film</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

          <div id="alertPlaceholder"></div>

          <form id="reportForm">
            <div class="mb-3">
              <label class="form-label text-light">Reason for Report <span class="text-danger">*</span></label>
              <textarea class="form-control bg-dark text-light" id="reason" placeholder="Write your reason here..." required></textarea>
            </div>
            <button id="send_report" type="submit" class="btn btn-danger w-100">Send Report</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
$(document).ready(function() {
    const isLoggedIn = <?php echo $user_id ? 'true' : 'false'; ?>;

  $('#send_report').on('click', function(e) {
    e.preventDefault(); // ڕێگری لە سەبمیتکردنی فۆرمەکە

    if (!isLoggedIn) {
        $('#msg').text('You must login !').removeClass().addClass('alert alert-danger text-center mt-1 py-1');
        return;
      }
    var reason = $('#reason').val().trim();

  if (reason === "") {
  $('#alertPlaceholder').text('Please fill in the field !').removeClass().addClass('alert text-center alert-danger py-1');
  return;
}

    $.ajax({
      url: '', // فایل PHP
      type: 'POST',
      data: { reason: reason },
      success: function(response) {
        $('#alertPlaceholder').text('Report submission was successful').removeClass().addClass('alert text-center alert-success py-1');
        $('#reason').val(''); // خاڵی کردنەوەی textarea
      },
      error: function() {
        $('#alertPlaceholder').text('Error sending data');
      }
    });
  });
});
</script>

</body>

</html>
<style>
  .not-allowed {
    cursor: not-allowed !important;
  }
</style>