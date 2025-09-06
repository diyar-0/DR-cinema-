<?php
include("../includes/config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset(
        $_POST['name_film'],
        $_POST['name_film_ku'],
        $_POST['synopsis'],
        $_POST['genre1'],
        $_POST['movie_type'],
        $_POST['Producing_country'],
        $_POST['language'],
        $_POST['subtitle'],
        $_POST['duration'],
        $_POST['rating'],
        $_POST['release_date'],
        $_POST['trailer_url'],
        $_FILES['image'],
        $_FILES['image2'],
        // $_FILES['video']
    )) {
        if (
            empty($_POST['name_film']) || empty($_POST['name_film_ku']) ||
            empty($_POST['synopsis']) || empty($_POST['genre1']) ||
            empty($_POST['movie_type']) || empty($_POST['Producing_country']) || empty($_POST['language']) ||
            empty($_POST['subtitle'])  || empty($_POST['rating']) ||
            empty($_POST['release_date']) || empty($_POST['trailer_url'])
        ) {
            die(include("../layout/error/modal_error_movies.php"));
        }
        $name_film = clears($_POST['name_film']);
        $name_film_ku = clears($_POST['name_film_ku']);
        $synopsis = clears($_POST['synopsis']);
        $genre1 = $_POST['genre1'] ?? [];
        $genre2 = $_POST['genre2'] ?? [];
        $genre3 = $_POST['genre3'] ?? [];
        $movie_type = clears($_POST['movie_type']);
        $duration = "";
        $viewer_age = clears($_POST['viewer_age'] ?? '');
        $release_date = clears($_POST['release_date']);
        $Producing_country = clears($_POST['Producing_country']);
        $language = clears($_POST['language']);
        $subtitle = clears($_POST['subtitle']);
        $directed = clears($_POST['directed']);
        $authors = clears($_POST['authors']);
        $rating = clears($_POST['rating']);
        $video = "";

        if (strtolower(substr($movie_type, -6)) !== "series") {
            if (empty($video = clears($_POST['video'])) || empty($duration = clears($_POST['duration']))) {
                die(include("../layout/error/modal_error_movies.php"));
            } else {
                $video = clears($_POST['video']);
            }
        }
        function convertToEmbed($url)
        {
            if (strpos($url, 'youtu.be/') !== false) {
                // Format: https://youtu.be/VIDEO_ID
                $videoId = explode('youtu.be/', $url)[1];
            } elseif (strpos($url, 'youtube.com/watch?v=') !== false) {
                // Format: https://www.youtube.com/watch?v=VIDEO_ID
                parse_str(parse_url($url, PHP_URL_QUERY), $params);
                $videoId = $params['v'] ?? '';
            } else {
                // Not a valid YouTube link
                return '';
            }

            return 'https://www.youtube.com/embed/' . $videoId;
        }
        $trailer_url_raw = clears($_POST['trailer_url']); // پاککردنەوەی URL
        $trailer_url = convertToEmbed($trailer_url_raw);  // گۆڕینی URL بۆ embed

        // Handle Movie_season ONLY if movie_type is 'زنجیرە'
        $group_title = "";
        $movie_season = "";
        if ($movie_type === 'Movie Season' || strtolower(substr($movie_type, -6)) === "series") {
            if (!empty($_POST['Movie_season'])) {
                $movie_season = (int)$_POST['Movie_season'];  // ensure it's an integer
            } else {
                echo '<div class="alert alert-danger text-center" role="alert"><h5>❌ Please enter the season number!</h5></div>';
                exit;
            }
            if (!empty($_POST['group_title'])) {
                $group_title = $_POST['group_title'];  // ensure it's an integer
            } else {
                echo '<div class="alert alert-danger text-center" role="alert"><h5>❌ Please fill in the group title!</h5></div>';
                exit;
            }
        }




        $imageTarget = "";
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageName = basename($_FILES["image"]["name"]);
            $imageTarget = "assets/upload_image/" . time() . "_img_" . $imageName;
            move_uploaded_file($_FILES["image"]["tmp_name"], $imageTarget);
        } else {
            echo '<div class="alert alert-danger text-center" role="alert"><h5>❌ Error uploading card image.</h5></div>';
            exit;
        }
          $imageTarget2 = "";
        if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
            $imageName2 = basename($_FILES["image2"]["name"]);
            $imageTarget2 = "assets/upload_image_bg/" . time() . "_img_" . $imageName2;
            move_uploaded_file($_FILES["image2"]["tmp_name"], $imageTarget2);
        } else {
            echo '<div class="alert alert-danger text-center" role="alert"><h5>❌ Error uploading background image .</h5></div>';
            exit;
        }
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO films_db (
    name_film, name_film_ku, synopsis,
    movie_type, movie_season, language, subtitle,
    duration, viewer_age,group_title,release_date, Producing_country, directed, authors,
    `rating`, trailer_url, img,img_bg, vid
) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)");


        $stmt->bind_param(
            "ssssssssissssssssss",
            $name_film,
            $name_film_ku,
            $synopsis,
            $movie_type,
            $movie_season,
            $language,
            $subtitle,
            $duration,
            $viewer_age,
            $group_title,
            $release_date,
            $Producing_country,
            $directed,
            $authors,
            $rating,
            $trailer_url,
            $imageTarget,
            $imageTarget2,
            $video
        );

        if ($stmt->execute()) {
            $film_id = $conn->insert_id;

            $genre1 = is_array($genre1) ? $genre1 : [$genre1];
            $genre2 = is_array($genre2) ? $genre2 : [$genre2];
            $genre3 = is_array($genre3) ? $genre3 : [$genre3];
            $allgenre = array_merge($genre1, $genre2, $genre3);

            if (isset($_POST['actor_count']) && is_numeric($_POST['actor_count'])) {
                $actor_count = (int) $_POST['actor_count'];
                for ($i = 1; $i <= $actor_count; $i++) {
                    $actor_name = $conn->real_escape_string($_POST["actor_name_$i"] ?? '');
                    $actor_info = $conn->real_escape_string($_POST["actor_info_$i"] ?? '');
                    $img = $_FILES["actor_image_$i"] ?? null;

                    if ($img && $img['error'] === 0) {
                        $folder = "assets/upload_actors/";
                        if (!is_dir($folder)) mkdir($folder, 0755, true);

                        $fileName = time() . "_" . basename($img['name']);
                        $path = $folder . $fileName;

                        if (move_uploaded_file($img['tmp_name'], $path)) {
                            $sql = "INSERT INTO characters (actor_name, actor_info, actor_img, id_film)
                                    VALUES ('$actor_name', '$actor_info', '$path', '$film_id')";
                            if (!$conn->query($sql)) {
                                echo "هەڵە لە ئەکتەر $i: " . $conn->error . "<br>";
                            }
                        } else {
                            echo "نەتوانرا وێنەی ئەکتەر $i نێردرێت.<br>";
                        }
                    } else {
                        echo "وێنەی ئەکتەر $i هەڵەیە.<br>";
                    }
                }
            }

            if (!empty($allgenre)) {
                $genreStmt = $conn->prepare("INSERT INTO `genre_film`(`id_film`, `genres`) VALUES (?, ?)");
                foreach ($allgenre as $genre) {
                    $genreSafe = clears($genre);
                    $genreStmt->bind_param("is", $film_id, $genreSafe);
                    $genreStmt->execute();
                }
                $genreStmt->close();
            }


            echo '<div class="alert alert-success text-center" role="alert"><h5>✅ Film uploaded successfully!</h5></div>';
        } else {
            echo '<div class="alert alert-danger text-center" role="alert"><h5>❌ Error: ' . $stmt->error . '</h5></div>';
        }

        $stmt->close();
        $conn->close();
    } else {
        include("../layout/error/modal_error_movies.php");
    }
}
