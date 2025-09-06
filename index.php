   <!DOCTYPE html>
   <html lang="en">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>DR film</title>
     <link rel="shortcut icon" href="img_films/img_logo/logodrbest.jpg" type="image/x-icon">
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
     <!-- css slide image -->
     <link rel="stylesheet" href="assets/image_slider.css">
   </head>

   <body id="bg-season">
     <?php
      include("includes/header.php");
      ?>

     <!-- slide image -->
      <div class="-mt-20">
        <?php
      include("includes/movies_slide.php");
      ?>
      </div>
     <!-- card -->
     <div class="d-flex flex-column mb-0 mx-0 p-0 bg-gray-950 bg-opacity-50 rounded-0 ">
       <?php
        include("views/card_filter.php");
        ?>
     </div>
     <!-- coming soon -->
     <div class=" pt-0 border-t border-gray-500 px-0 mx-0 ">
       <?php include("includes/coming_soon.php"); ?>
     </div>
     <!-- welcome -->
     <div class=" pt-0 border-t border-gray-500 px-0 mx-0 ">
       <?php
        include("includes/dashboard.php");
        ?>
     </div>
     <!-- footer -->
     <?php
      include("includes/footer.php");
      ?>
   </body>

   </html>
   <script>
     // Signup AJAX
     $("#signupForm").on("submit", function(e) {
       e.preventDefault();
       $.ajax({
         url: "system_login/login_user.php", // ئەو فایلەی سەرەوە
         type: "POST",
         data: $(this).serialize(),
         dataType: "json",
         success: function(res) {
           $("#signupMsg").removeClass("text-green-400 text-red-400");
           if (res.success) {
             $("#signupMsg").addClass("text-green-400").html(res.message);
             $("#signupForm")[0].reset();
           } else {
             $("#signupMsg").addClass("text-red-400").html(res.message);
           }
         }
       });
     });

     // Login AJAX
     $("#loginForm").on("submit", function(e) {
       e.preventDefault();
       $.ajax({
         url: "system_login/login_user.php",
         type: "POST",
         data: $(this).serialize(),
         dataType: "json",
         success: function(res) {
           $("#loginMsg").removeClass("text-green-400 text-red-400");
           if (res.success) {
             $("#loginMsg").addClass("text-green-400").html(res.message);
             setTimeout(() => location.reload(), 1000);
           } else {
             $("#loginMsg").addClass("text-red-400").html(res.message);
           }
         }
       });
     });
   </script>

   <?php include("warning.php"); ?>




   