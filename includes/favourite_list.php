 <!-- مۆدال دلخواز -->
 <div class="modal rounded-0 fade" id="modalfavorite" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog rounded-0 modal-fullscreen">
     <div class="modal-content rounded-0 bg-dark  opacity-75 text-white">
       <div class="modal-body py-4 px-2 position-relative"> <!-- position-relative بۆ پوزیشنی دوگمە -->
         <!-- دوگمەی داخستن لە سەرەوەی راست -->
         <button type="button" class="btn btn-danger rounded-2 position-absolute top-0 end-0 m-3" data-bs-dismiss="modal">
           close </button>
         <h4 class="text-left fw-bold text-light mb-4">
           <i class='bi bi-bookmark-fill'></i> My favorites
         </h4>
         <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
           <?php
            // Database connection
            $host = 'localhost';
            $dbname = 'movies_db';
            $username = 'root';
            $password = ''; // empty password
            try {
              $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $user_id_fv = $_SESSION['user_id'];
              // Fetch favorite movies
              $stmt = $pdo->query("
        SELECT favorites.*, films_db.id, films_db.name_film, films_db.img, films_db.rating, films_db.release_date FROM favorites INNER JOIN films_db ON favorites.film_id = films_db.id WHERE favorites.user_id = $user_id_fv ");

              if ($stmt->rowCount() > 0) {
                while ($row_fv = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $fv_id = htmlspecialchars($row_fv['id']);
                  $fv_name = htmlspecialchars($row_fv['name_film']);
                  $fv_img = htmlspecialchars($row_fv['img']);
                  $fv_year = htmlspecialchars($row_fv['release_date']);
                  $fv_rating = htmlspecialchars($row_fv['rating']);
            ?>
                 <?php
                  $current = basename($_SERVER['PHP_SELF']); // ناوی پەیجی ئێستا دەگێڕێت (مثلا index.php)
                  $linkPath = ($current === "index.php") ? "views/detail.php?postid=$fv_id" : "../views/detail.php?postid=$fv_id";
                  ?>
                 <a href="<?php echo $linkPath; ?>"
                   class="group bg-gray-900 rounded-xl overflow-hidden hover:shadow-lg transition-transform transform hover:-translate-y-1">

                   <?php
                    $current_file = basename($_SERVER['PHP_SELF']);
                    $img_path_prefix = ($current_file === "index.php") ? "uploads/" : "../uploads/";
                    ?>
                   <img src="<?= $img_path_prefix . $fv_img ?>"
                     alt="<?= htmlspecialchars($fv_name) ?>"
                     class="w-full h-[200px] object-cover">

                   <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                     <span class="text-white text-sm font-bold"><?php echo $fv_id; ?></span>
                   </div>

                   <div class="p-2">
                     <h3 class="text-white text-[12px] md:text-[17px] font-semibold truncate"><?php echo $fv_name ?></h3>
                     <div class="flex items-center justify-between text-[11px] md:text-[14px] text-gray-400 mt-1">
                       <span><?php echo $fv_year ?></span>
                       <span class="text-yellow-400 text-[10px] md:text-[12px]"><i class="fas fa-star"></i> <?php echo $fv_rating ?>/10</span>
                     </div>
                   </div>
                 </a>
           <?php
                }
              } else {
                echo '<h6 class="m-0 fw-bold text-light text-center">هیچ دڵخوازێکت تۆمار نەکراوە</h6>';
              }
            } catch (PDOException $e) {
              echo "Database error: " . $e->getMessage();
            }
            ?>
         </div>

       </div>
     </div>
   </div>
 </div>