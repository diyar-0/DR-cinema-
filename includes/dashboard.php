<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cinematic Welcome</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="">


  <!-- About Section -->
  <section class="py-20 bg-gray-900 bg-opacity-50 relative overflow-hidden">
    <div class="container mx-auto px-6">
      <div class="flex flex-col lg:flex-row items-center">
        <div class="lg:w-1/2 mb-12 lg:mb-0 lg:pr-12">
          <h2 class="text-3xl md:text-4xl font-bold mb-6 ">About DRcinema</h2>
          <p class="text-lg text-gray-300 mb-6">DRcinema is your ultimate destination for movie lovers. We bring you the latest blockbusters, timeless classics, and everything in between.</p>
          <p class="text-lg text-gray-300 mb-8">With a carefully curated selection of films from around the world, we aim to satisfy every movie enthusiast's taste.</p>

          <div class="flex flex-wrap gap-4">

            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-white mr-3 text-2xl"><i class="fas text-[18px]  md:text-[20px] lg:text-[26px]  fa-photo-film"></i></div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $stmt = $pdo->query("SELECT COUNT(*) AS total FROM films_db");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['total'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">All MOVIES</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-pink-500 mr-3 text-2xl"><i class="fas text-[18px]  md:text-[20px] lg:text-[26px]  fa-film"></i></div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $stmt = $pdo->query("SELECT COUNT(*) AS total FROM films_db WHERE movie_type='Movie' || movie_type='Movie Season' ");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['total'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Movies</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-purple-500 mr-3 text-2xl"><i class="fas fa-layer-group text-[18px] md:text-[20px] lg:text-[26px]"></i>
              </div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $stmt = $pdo->query("SELECT COUNT(*) AS total FROM films_db WHERE RIGHT(LOWER(movie_type), 6) = 'series'");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['total'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Series Movies</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-purple-500 mr-3 text-2xl"><i class="fas text-[18px]  md:text-[20px] lg:text-[26px]  fa-draw-polygon"></i></div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $stmt = $pdo->query("SELECT COUNT(*) AS total FROM films_db WHERE movie_type='Animated'");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['total'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Anime</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-red-500 mr-3 text-2xl"><i class="fas text-[18px]  md:text-[20px] lg:text-[26px]  fs-2 fa-child"></i></div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $stmt = $pdo->query("SELECT COUNT(*) AS total FROM films_db WHERE movie_type='Carton'");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['total'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Cartoon</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-orange-500 mr-3 text-2xl"><i class="fas text-[18px]  md:text-[20px] lg:text-[26px]  fa-theater-masks"></i>
              </div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $stmt = $pdo->query("SELECT COUNT(*) AS total FROM films_db WHERE movie_type='Drama'");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['total'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Drama</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-blue-500 mr-3 text-2xl">
                <i class="fas text-[18px]  md:text-[20px] lg:text-[26px]  fa-video"></i>
              </div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $query_mov = "SELECT COUNT(*) AS movie_type FROM films_db WHERE movie_type = 'Short Film'";
                  $stmt = $pdo->query($query_mov);
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['movie_type'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Short Movies</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-blue-500 mr-3 text-2xl">
<i class="fas fa-star-and-crescent text-[18px] md:text-[20px] lg:text-[26px]"></i>
              </div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $query_religious = "SELECT COUNT(*) AS total_count FROM films_db WHERE movie_type = 'Religious' OR movie_type = 'Religious Season'OR movie_type = 'Religious Series' ";
                  $stmt = $pdo->query($query_religious);
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  ">
                    <?php echo $row['total_count'] . "+"; ?>
                  </span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Religious</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-green-500 mr-3 text-2xl"><i class="bi bi-translate"></i></div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $query_mov = "SELECT COUNT(DISTINCT language) AS language FROM films_db WHERE language IS NOT NULL ";
                  $stmt = $pdo->query($query_mov);
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['language'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Language</p>
              </div>
            </div>
            <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-purple-500 mr-3 text-2xl"><i class="fas text-[18px]  md:text-[20px] lg:text-[26px]  fa-globe"></i></div>
              <div>
                <h3 class="font-bold text-gray-300">
                  <?php
                  $pdo = new PDO("mysql:host=localhost;dbname=movies_db;charset=utf8", "root", "");
                  $query_mov = "SELECT COUNT(DISTINCT Producing_country) AS Producing_country FROM films_db WHERE Producing_country IS NOT NULL ";
                  $stmt = $pdo->query($query_mov);
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <span class="text-[20px]  md:text-[24px] lg:text-[24px]  "><?php echo $row['Producing_country'] . "+"; ?></span>
                </h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Countries</p>
              </div>
            </div>
            <!-- <div class="bg-gray-800 bg-opacity-50 py-0 px-2 rounded-lg flex items-center">
              <div class="text-yellow-500 mr-3 text-2xl"><i class="fas text-[18px]  md:text-[20px] lg:text-[26px]  fa-star"></i></div>
              <div>
                <h3 class="font-bold text-[16px]  md:text-[18px] lg:text-[20px]  text-gray-300">4.9/5</h3>
                <p class="text-gray-400 text-[11px] md:text-[15px] ">Rating</p>
              </div>
            </div> -->
          </div>
        </div>
        <div class="lg:w-1/2 relative">
          <div class="relative">
            <div class="absolute -top-8 -left-8 w-full h-full border-4 border-purple-500 rounded-lg z-0"></div>
            <div class="relative z-10 rounded-lg overflow-hidden">
              <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1025&q=80"
                alt="Movie theater"
                class="w-full h-auto rounded-lg transform hover:scale-105 transition duration-500">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Optional: JS for smooth scroll -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
          e.preventDefault();
          const targetId = this.getAttribute('href');
          if (targetId === '#') return;
          const targetElement = document.querySelector(targetId);
          if (targetElement) {
            window.scrollTo({
              top: targetElement.offsetTop - 80,
              behavior: 'smooth'
            });
          }
        });
      });
    });
  </script>
</body>

</html>