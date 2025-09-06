<?php
header('Content-Type: text/plain; charset=utf-8');
$conn = new mysqli("localhost", "root", "", "movies_db");
if ($conn->connect_error) {
    exit("Error: Database connection failed: " . $conn->connect_error);
}
$film_id = isset($_POST['film_id']) ? (int)$_POST['film_id'] : 0;
$video_url = isset($_POST['video_url']) ? trim($_POST['video_url']) : '';
$season_number = isset($_POST['film_season']) ? (int)$_POST['film_season'] : 0;
$episode_number_raw = isset($_POST['episode_number']) ? trim($_POST['episode_number']) : null;
if ($film_id <= 0) exit("Error: Invalid film ID.");
if (empty($video_url)) exit("Error: Video URL cannot be empty.");
if ($episode_number_raw === null || $episode_number_raw === '') {
    $stmt = $conn->prepare("INSERT INTO films_series (film_id, video_url, season_number, episode_number) VALUES (?, ?, ?, NULL)");
    $stmt->bind_param("isi", $film_id, $video_url, $season_number);
} else {
    if (!ctype_digit($episode_number_raw) || (int)$episode_number_raw <= 0) {
        exit("Error: Invalid episode number.");
    }
    $episode_number = (int)$episode_number_raw;
    $stmt = $conn->prepare("INSERT INTO films_series (film_id, video_url, season_number, episode_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isii", $film_id, $video_url, $season_number, $episode_number);
}
if (!$stmt->execute()) {
    $error = $stmt->error;
    $stmt->close();
    $conn->close();
    exit("Error: Failed to save data. $error");
}
echo "Saved successfully!";
$stmt->close();
$conn->close();
?>
