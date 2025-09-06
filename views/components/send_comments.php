<?php
// session_start(); // سێشن هەڵبگرە

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies_db";

// بەستنی DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// دڵنیا بوونەوەی سێشن
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$name_user = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$picture = isset($_SESSION['picture']) ? $_SESSION['picture'] : "";
// فیلم ID بۆ نموونە (ئەتوانیت بە گێڕەکان بخەوە)
// $films_id = 1;

// AJAX POST — نێردنی کۆمێنت
if (isset($_POST['comment'])) {
  $comment = trim($_POST['comment']);



  if (!empty($comment) && $films_id) {
    $sql = "INSERT INTO comments (comment,name_user, user_id, film_id,picture) VALUES (?,?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiis", $comment, $name_user, $user_id, $films_id,$picture);
    $stmt->execute();
    $stmt->close();
    echo "success";
  } else {
    echo "empty_comment";
  }
  exit;
}

// $conn->close();
?>

<div style="height: auto" class="rounded-0  p-2 mt-2 mx-0 d-flex flex-column col-lg-12">
  <div class="w-100">
    <!-- <div class="text-light">
      <div class="d-flex align-items-center justify-content-between mb-1">
        <?php if (isset($_SESSION['username']) && $_SESSION['username']) { ?>
          <div class="d-flex align-items-center">
            <i class="bi bi-person-circle fs-4"></i>
            <span class="font-semibold mx-2 text-white"><?php echo $_SESSION['username']; ?></span>
          </div>
        <?php } ?>
        </span>
      </div>
    </div> -->
    <!-- <form id="commentForm"> -->
    <div class="d-flex gap-x-3">
      <textarea id="comment" rows="1"
        class="bg-dark border border-primary rounded-2 p-2 text-info
         w-[80%] md:w-[90%] 
         text-sm md:text-base"
        placeholder="Leave a comment here !"></textarea>
      <button id="send_comment" type="submit"
        class="bg-season-btn rounded-1 px-3 py-2 m-0 mt-0 flex items-center justify-center gap-2
         w-[20%] md:w-[10%]">
         <i class="bi bi-send-fill text-season-btn"></i>
        <b class="text-season-btn text-sm md:text-base">Send</b>
      </button>
    </div>
    <div id="msg" class="w-100 text-light "></div>
  </div>
</div>
<script>
  $(document).ready(function() {
    const isLoggedIn = <?php echo $user_id ? 'true' : 'false'; ?>;

    $('#send_comment').on('click', function(e) {
      e.preventDefault();

      if (!isLoggedIn) {
        $('#msg').text('You must login !').removeClass().addClass('alert alert-danger text-center mb-0 mt-3  py-1');
        return;
      }

      var comment = $('#comment').val().trim();

      if (comment === "") {
        $('#msg').text('Please fill in the field !').removeClass().addClass('alert text-center alert-danger mb-0 mt-3 py-1');
        return;
      }

      $.ajax({
        url: '', // فایل PHP
        type: 'POST',
        data: {
          comment: comment
        },
        success: function(response) {
          $('#msg').text('Comment submission was successful').removeClass().addClass('alert mb-0 text-center mt-1 alert-success py-1');
          $('#comment').val(''); // خاڵی کردنەوەی textarea
        },
        error: function() {
          $('#msg').text('Error sending data').removeClass().addClass('alert mb-0 text-center alert-danger py-1 mt-1');;
        }
      });
    });
  });
</script>