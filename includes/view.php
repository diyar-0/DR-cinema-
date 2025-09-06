<?php
include("includes/config.php");

    $update_query = "UPDATE films_db SET views = views + 1 WHERE id = $film_id";
    $conn->query($update_query);

?>
