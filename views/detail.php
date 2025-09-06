<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dune: Part Two | CineVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @media screen and (width< 992px) {
            .four-btns {
                height: 100px;
            }
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        .film-tab::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -1px;
            left: 0;
            background-color: #4f6cff;
            transition: width 0.3s ease;
        }

        .film-tab.active::after,
        .film-tab:hover::after {
            width: 100%;
        }

        .rating-star:hover {
            transform: scale(1.2);
        }

        .similar-film:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .video-container {
            aspect-ratio: 16/9;
        }

        .progress-bar {
            height: 4px;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .progress-fill {
            height: 100%;
            background-color: #4f6cff;
            width: 72%;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body id="bg-season">
    <?php
    include("../includes/config.php");
    include("../includes/header.php");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_GET['postid']) && ($postID = $_GET['postid'])) {
        $sql = "SELECT * FROM films_db WHERE `id`=$postID";
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $result = $conn->query($sql);
        } catch (mysqli_sql_exception $e) {
            echo "
            <img src='https://cdni.iconscout.com/illustration/premium/thumb/error-404-illustration-download-in-svg-png-gif-file-formats--not-found-page-webpage-pack-design-development-illustrations-5501655.png' class='text-center mx-auto w-30'>
          ";
            exit();
        }

        if ($result && $result->num_rows > 0) {
            while ($row_card = $result->fetch_assoc()) {
                $film_id = htmlspecialchars($row_card['id']);
                $name_film = htmlspecialchars($row_card['name_film']);
                $name_film_ku = htmlspecialchars($row_card['name_film_ku']);
                $img = preg_replace('#^\.\./#', '', $row_card['img']);
                $img_bg = htmlspecialchars($row_card['img_bg']);
                $duration = htmlspecialchars($row_card['duration']);
                $release_date = htmlspecialchars($row_card['release_date']);
                $viewer_age = htmlspecialchars($row_card['viewer_age']);
                $rating = htmlspecialchars($row_card['rating']);
                $Producing_country = htmlspecialchars($row_card['Producing_country']);
                $language = htmlspecialchars($row_card['language']);
                $subtitle = htmlspecialchars($row_card['subtitle']);
                $synopsis = htmlspecialchars($row_card['synopsis']);
                $directed = htmlspecialchars($row_card['directed']);
                $movie_type = htmlspecialchars($row_card['movie_type']);
                $group_title = htmlspecialchars($row_card['group_title']);
                $authors = htmlspecialchars($row_card['authors']);
                $trailer_url = htmlspecialchars($row_card['trailer_url']);
                include('components/view_movie.php');
    ?>
                <!-- Film Section -->
                <section class="hero-poster -mt-20 pt-20  pb-[50px]" style="background-image: radial-gradient( circle,  rgba(0, 0, 0, 0.73) 0%,  rgba(0, 0, 0, 0.95) 70%), url('../uploads/<?php echo $row_card['img_bg'] ?>'); background-repeat: no-repeat;background-size: cover;width:100%; height:100%;">
                    <div dir="ltr" class="d-flex p-10 px-10 w-100 align-items-center justify-between">
                        <div> <a href="index.php">Home</a>
                            <span class="text-light">/ <?php echo $name_film ?></span>
                        </div>
                        <div>


                            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">Update Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Your modal content goes here...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <!-- Film Poster -->
                            <div class="lg:w-1/3 gap-x-2 flex-shrink-0 col-lg-3 col-md-12 d-md-flex d-lg-block justify-between">
                                <div class="relative  rounded-xl overflow-hidden shadow-2xl">
                                    <img src="../uploads/<?php echo $img ?>" alt="<?php echo $name_film ?>" class="col-12 object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                                </div>

                                <div class="mt-2 col-md-8 col-lg-12">
                                    <!-- Buttons grid: 2 by 2 -->
                                    <div class="grid grid-cols-2 gap-2 four-btns">

                                        <!-- modal Trailer -->
                                        <button class="bg-season-btn text-season-btn d-flex align-items-center justify-content-center rounded-2 px-2 py-2 four-btn"
                                            data-bs-toggle="modal" data-bs-target="#trailerModal">
                                            <i class="fas fa-play me-2"></i> Trailer
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="trailerModal" tabindex="-1" aria-labelledby="trailerModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content bg-dark text-light">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="trailerModalLabel">Film Trailer</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="ratio ratio-16x9">
                                                            <iframe id="myTrailer" width="560" height="315" src="<?php echo $trailer_url ?>" frameborder="0" allowfullscreen></iframe>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var trailerModal = document.getElementById('trailerModal');
                                            // var iframe = trailerModal.querySelector('iframe');
                                            var iframe_trl = document.getElementById('myTrailer');

                                            var trailerSrc = iframe_trl.src;

                                            trailerModal.addEventListener('hidden.bs.modal', function() {
                                                iframe_trl.src = ''; // ڤیدیۆەکە داخە
                                                iframe_trl.src = trailerSrc; // دوبارە دانانی URL بۆ دواتر
                                            });
                                        </script>
                                        <script>
                                            const trailerModal = document.getElementById('trailerModal');
                                            trailerModal.addEventListener('hidden.bs.modal', function() {
                                                const iframe = document.getElementById('trailerVideo');
                                                iframe.src = iframe.src; // Stop video
                                            });
                                        </script>
                                        <!-- modal Trailer -->
                                        <?php include("components/favorite_user.php"); ?>
                                        <!-- ======== Share Button ======== -->
                                        <?php include("components/share.php"); ?>
                                        <!-- modal report -->
                                        <?php include("components/report.php"); ?>
                                        <!-- modal report -->
                                    </div>
                                </div>
                            </div>
                            <!-- Film Info -->
                            <div class="lg:w-2/3">
                                <div class="flex flex-wrap items-center justify-between mb-4 gap-y-3">
                                    <h1 class="fs-4 font-bold DR text-light"><?php echo $name_film ?></h1>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-gray-400 text-sm"><?php echo $row_card['views']; ?> <i class="bi bi-eye ms-1"></i> </span>
                                        <span class="text-gray-400 mx-2">•</span>
                                        <?php
                                        if (!empty($duration)) {
                                        ?>
                                            <span class="text-gray-400 text-sm"><?php echo $duration ?> خولەک</span>
                                            <span class="text-gray-400 mx-2">•</span>
                                        <?php
                                        }
                                        ?>
                                        <span class="text-gray-400 text-sm"><?php echo $release_date ?></span>
                                        <span class="text-gray-400 mx-2">•</span>
                                        <span class="bg-gray-800 text-blue-400 text-xs px-2 py-1 rounded">PG-<?php echo $viewer_age ?></span>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-2 mb-6">
                                    <?php
                                    $sql_genre = "SELECT * FROM genre_film WHERE `id_film`={$row_card['id']}";
                                    $result_genre = $conn->query($sql_genre);

                                    while ($row_genre = $result_genre->fetch_assoc()) {
                                        $genres = explode(',', $row_genre['genres']); // Split the string by comma
                                        foreach ($genres as $genre) {
                                            $genre = trim($genre); // Remove spaces
                                            if (!empty($genre)) {
                                                echo "  <span class='bg-gray-800 text-blue-400 text-xs px-3 py-1 rounded-full'>" . htmlspecialchars($genre) . "</span>";
                                            }
                                        }
                                    }
                                    ?>

                                </div>

                                <div class="mb-8">
                                    <div class="flex items-center space-x-4 mb-4">
                                        <div class="flex items-center">
                                            <span class="text-2xl font-bold text-light">
                                                <?php echo $rating ?>/10
                                            </span>
                                            <span class="bg-warning px-2 py-1 fw-bold m-2 text-dark rounded-3">IMDb</span>
                                        </div>

                                        <div class="w-full bg-gray-800 rounded-full h-2.5">
                                            <div class="bg-season-btn h-2.5 rounded-full"
                                                style="width: <?php echo ($rating / 10) * 100; ?>%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-8">
                                        <h2 class="text-xl font-semibold mb-3 text-blue-500">Synopsis</h2>
                                        <p class="text-gray-300">
                                            <?php echo $synopsis ?> </p>
                                    </div>
                                    <!-- Film Details -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <h3 class="text-lg font-semibold mb-2 text-blue-500">Details</h3>
                                            <div class="space-y-2 text-sm text-gray-300">
                                                <div class="flex">
                                                    <span class="w-32 text-gray-400">Directed</span>

                                                    <?php
                                                    if (($directed == "") || ($directed == "empty")) {
                                                        echo "<span style='color:rgb(187, 0, 0);'>It is not mentioned</span>";
                                                    } else {     ?>
                                                        <span><?php echo $directed ?></span>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="flex">
                                                    <span class="w-32 text-gray-400">The authors</span>
                                                    <?php
                                                    if (($authors == "") || ($authors == "empty")) {
                                                        echo "<span style='color:rgb(187, 0, 0);'>It is not mentioned</span>";
                                                    } else {     ?>
                                                        <span><?php echo $authors ?></span>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                                <div class="flex">
                                                    <span class="w-32 text-gray-400">Country</span>
                                                    <span><?php echo $Producing_country ?></span>
                                                </div>
                                                <div class="flex">
                                                    <span class="w-32 text-gray-400">Language</span>
                                                    <span><?php echo $language ?></span>
                                                </div>
                                                <div class="flex">
                                                    <span class="w-32 text-gray-400">Subtitle</span>
                                                    <?php
                                                    if (($subtitle == "") || ($subtitle == "empty")) {
                                                        echo "<span style='color:rgb(187, 0, 0);'>It is not mentioned</span>";
                                                    } else {
                                                    ?>
                                                        <span><?php echo $subtitle ?></span>
                                                    <?php
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <h3 class="text-lg font-semibold mb-2 ms-4 me-0 text-blue-500 ">Actors</h3>


                                            <div class="row ">
                                                <div class=" p-0">
                                                    <?php include("components/actors.php"); ?>
                                                </div>
                                            </div>
                                            <script>
                                                document.querySelector('.scroll-container').addEventListener('wheel', function(e) {
                                                    e.preventDefault();
                                                    this.scrollLeft += e.deltaY;
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>

                <div class="mt-0 bg-gray-900 bg-opacity-50 py-2">
                    <center class="text-light py-4 m-0 fs-2">Video</center>
                    <?php
                    $movie_type_lower = strtolower($movie_type);

                    if (substr($movie_type_lower, -6) === 'series') {
                        include("components/video_series.php");
                        include("components/video_series_season.php");
                    } else if ($movie_type_lower === "movie season") {
                        include("components/video_season.php");
                        include("components/video_series_season.php");
                    } else {
                        include("components/video_movies.php");
                    }
                    include("components/comment.php");
                    ?>
                    <?php include("components/similar.php"); ?>
                </div>



            <?php }
        } else {
            ?>
            <img src="https://cdni.iconscout.com/illustration/premium/thumb/error-404-illustration-download-in-svg-png-gif-file-formats--not-found-page-webpage-pack-design-development-illustrations-5501655.png" class="text-center mx-auto w-30">
        <?php
            exit();
        }
    } else {
        ?>
        <img src="https://cdni.iconscout.com/illustration/premium/thumb/error-404-illustration-download-in-svg-png-gif-file-formats--not-found-page-webpage-pack-design-development-illustrations-5501655.png" class="text-center mx-auto w-30">
    <?php
        exit();
    }

    include("../includes/footer.php");
    ?>
    <!-- view -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filmID = <?php echo json_encode($film_id); ?>;

            fetch("", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "update_view=" + filmID
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "done") {
                        console.log("✅ View updated.");
                    } else if (data.status === "already_viewed") {
                        console.log("ℹ️ View already counted in this session.");
                    } else {
                        console.warn("⚠️ View update failed.");
                    }
                })
                .catch(err => console.error("AJAX Error:", err));
        });
    </script>
</body>

</html>
<!-- signup & siginin -->
<script src="../script/singin_detail.js"></script>
<!-- like & dislike -->
<script src="../script/like_dislike.js"></script>