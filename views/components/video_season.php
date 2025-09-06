<?php

// SQL: گرتنی فیلمەکان کە کۆتایی movie_type ـیان نەک Series ـە و نەک Season ـە
$sql = "SELECT * FROM films_db 
        WHERE movie_type= 'Movie Season'  AND id=$film_id";

$result = $conn->query($sql);

// پشکنینی ئەنجامەکان
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
            // URL from database
            $watch_url = $row["vid"]; // http://vidmoly.me/w/a76u1vprje9s

            // Extract the video ID
            $video_id = basename($watch_url); // a76u1vprje9s

            // Build embed URL
            $embed_url = "https://vidmoly.me/embed-" . $video_id . ".html";
        ?>
                <iframe
    class="video-frame text-center mx-auto m-0 p-0 w-[70%] h-[500px]"
    src="<?php echo $embed_url; ?>"
 
    title="Video player"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    referrerpolicy="strict-origin-when-cross-origin"
    allowfullscreen>
</iframe>


<?php
    }
} else {
    echo "هیچ فیلمێک نەدۆزرایەوە.";
}
?>
