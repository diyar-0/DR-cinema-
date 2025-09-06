<?php
  $conn2 = new mysqli("localhost", "root", "", "movies_db");
   function clears2($clear){
            global $conn2;
            $clear=mysqli_real_escape_string($conn2,htmlspecialchars($clear));
            return $clear;
        }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_film2 = $_POST['name_film2'] ?? '';
    $name_film_ku2 = $_POST['name_film_ku2'] ?? '';
    $synopsis2 = $_POST['synopsis2'] ?? '';
    $genre12 = $_POST['genre12'] ?? '';
    $genre22 = $_POST['genre22'][0] ?? '';
    $genre32 = $_POST['genre32'][0] ?? '';
    $movie_type2 = $_POST['movie_type2'] ?? '';
    $Producing_country2 = $_POST['Producing_country2'] ?? '';
    $Movie_season2 = $_POST['Movie_season2'] ?? '';
    $directed2 = $_POST['directed2'] ?? '';
    $authors = $_POST['authors'] ?? '';
    $language = $_POST['language'] ?? '';
    $subtitle = $_POST['subtitle'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $rating = $_POST['rating'] ?? '';
    $viewer_age = $_POST['viewer_age'] ?? '';
    $actor_count2 = $_POST['actor_count2'] ?? '';
    $release_date٢ = $_POST['release_date٢'] ?? '';
    $trailer_url = $_POST['trailer_url'] ?? '';
    if (
         !empty($_POST['name_film2']) ||
    !empty($_POST['name_film_ku2']) ||
    !empty($_POST['synopsis2']) ||
    !empty($_POST['genre12']) ||
    !empty($_POST['movie_type2']) ||
    !empty($_POST['Producing_country2']) ||
    !empty($_POST['language2']) ||
    !empty($_POST['subtitle2']) ||
    !empty($_POST['duration2']) ||
    !empty($_POST['rating2']) ||
    !empty($_POST['release_date2']) ||
    !empty($_POST['trailer_url2']) ||
    !empty($_FILES['image2']['name'])
    ) {
        
        $name_film2 = clears2($_POST['name_film2']);
        $name_film_ku2 = clears2($_POST['name_film_ku2']);
        $synopsis2 = clears2($_POST['synopsis2']);
        $genre12 = $_POST['genre12'] ?? [];
        $genre22 = $_POST['genre22'] ?? [];
        $genre32 = $_POST['genre32'] ?? [];
        $movie_type2 = clears2($_POST['movie_type2']);
        $Producing_country2 = clears2($_POST['Producing_country2']);
        $language2 = clears2($_POST['language2']);
        $subtitle2 = clears2($_POST['subtitle2']);
        $duration2 = clears2($_POST['duration2'] ?? '');
        $rating2 = clears2($_POST['rating2']);
        $release_date2 = clears2($_POST['release_date2']);
        $viewer_age2 = clears2($_POST['viewer_age2'] ?? '');
        $directed2 = clears2($_POST['directed2']);
        $authors2 = clears2($_POST['authors2']);
        function convertToEmbed($url2)
        {
            if (strpos($url2, 'youtu.be/') !== false) {
                // Format: https://youtu.be/VIDEO_ID
                $videoId2 = explode('youtu.be/', $url2)[1];
            } elseif (strpos($url2, 'youtube.com/watch?v=') !== false) {
                // Format: https://www.youtube.com/watch?v=VIDEO_ID
                parse_str(parse_url($url2, PHP_URL_QUERY), $params2);
                $videoId2 = $params2['v'] ?? '';
            } else {
                // Not a valid YouTube link
                return '';
            }
            return 'https://www.youtube.com/embed/' . $videoId2;
        }
        $trailer_url_raw2 = clears2($_POST['trailer_url2']); // پاککردنەوەی URL
        $trailer_url2 = convertToEmbed($trailer_url_raw2);  // گۆڕینی URL بۆ embed
        $imageTarget2 = "";
        if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
            $imageName2 = basename($_FILES["image2"]["name"]);
            $imageTarget2 = "../upload_image/" . time() . "_img_" . $imageName2;
            move_uploaded_file($_FILES["image2"]["tmp_name"], $imageTarget2);
        } else {
            echo '<div class="alert alert-danger text-center" role="alert"><h5>❌ Error uploading image.</h5></div>';
            exit;
        }
        if ($conn2->connect_error) {
            die("Connection failed: " . $conn2->connect_error);
        }
       $stmt2 = $conn2->prepare("INSERT INTO films_db (
       name_film, name_film_ku, synopsis,
       movie_type, language,
       subtitle,duration, viewer_age,
       release_date, Producing_country, directed,
       authors,`rating`, trailer_url,
        img
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?)");
        $stmt2->bind_param(
            "sssssssssssssss",
            $name_film2,
            $name_film_ku2,
            $synopsis2,
            $movie_type2,
            $language2,
            $subtitle2,
            $duration2,
            $viewer_age2,
            $release_date2,
            $Producing_country2,
            $directed2,
            $authors2,
            $rating2,
            $trailer_url2,
            $imageTarget2
        );
        if ($stmt2->execute()) {
            $film_id = $conn2->insert_id;

            $genre12 = is_array($genre12) ? $genre12 : [$genre12];
            $genre22 = is_array($genre22) ? $genre22 : [$genre22];
            $genre32 = is_array($genre32) ? $genre32 : [$genre32];
            $allgenre2 = array_merge($genre12, $genre22, $genre32);

            if (isset($_POST['actor_count2']) && is_numeric($_POST['actor_count2'])) {
                $actor_count2 = (int) $_POST['actor_count2'];
                for ($i = 1; $i <= $actor_count2; $i++) {
                    $actor_name2 = $conn2->real_escape_string($_POST["actor_name2_$i"] ?? '');
                    $actor_info2 = $conn2->real_escape_string($_POST["actor_info2_$i"] ?? '');
                    $img2 = $_FILES["actor_image2_$i"] ?? null;

                    if ($img2 && $img2['error'] === 0) {
                        $folder = "assets/upload_actors/";
                        if (!is_dir($folder)) mkdir($folder, 0755, true);

                        $fileName = time() . "_" . basename($img2['name']);
                        $path = $folder . $fileName;

                        if (move_uploaded_file($img2['tmp_name'], $path)) {
                            $sql = "INSERT INTO characters (actor_name, actor_info, actor_img, id_film)
                                    VALUES ('$actor_name2', '$actor_info2', '$path', '$film_id')";
                            if (!$conn2->query($sql)) {
                                echo "هەڵە لە ئەکتەر $i: " . $conn2->error . "<br>";
                            }
                        } else {
                            echo "نەتوانرا وێنەی ئەکتەر $i نێردرێت.<br>";
                        }
                    } else {
                        echo "وێنەی ئەکتەر $i هەڵەیە.<br>";
                    }
                }
            }
            if (!empty($allgenre2)) {
                $genreStmt2 = $conn2->prepare("INSERT INTO `genre_film`(`id_film`, `genres`) VALUES (?, ?)");
                foreach ($allgenre2 as $genre_s2) {
                    $genreSafe2 = clears2($genre_s2);
                    $genreStmt2->bind_param("is", $film_id, $genreSafe2);
                    $genreStmt2->execute();
                }
                $genreStmt2->close();
            }
            echo '<div class="alert alert-success text-center" role="alert"><h5>✅ Film uploaded successfully!</h5></div>';
        } else {
            echo '<div class="alert alert-danger text-center" role="alert"><h5>❌ Error: ' . $stmt2->error . '</h5></div>';
        }
        $stmt2->close();
        $conn2->close();
    } else {
        include("../../layout/modal_error_series.php");
    }
}
