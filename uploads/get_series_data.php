<?php
header('Content-Type: text/html; charset=utf-8');
$conn = new mysqli("localhost", "root", "", "movies_db");
if ($conn->connect_error) {
    exit("Error: Database connection failed: " . $conn->connect_error);
}
$film_id = isset($_POST['film_id']) ? (int)$_POST['film_id'] : 0;

if ($film_id <= 0) {
    echo "<p>Error: Invalid film ID.</p>";
    exit;
}
$sql = "SELECT fs.*, fd.movie_season FROM films_series fs 
        LEFT JOIN films_db fd ON fs.film_id = fd.id 
        WHERE fs.film_id = ? 
        ORDER BY CAST(fs.episode_number AS UNSIGNED)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $film_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // یەکەم ڕیز بخوێنەوە بۆ بەدەستهێنانی movie_season
    $first_row = $result->fetch_assoc();

    echo "<div style='max-height:300px; overflow-y:auto; padding-right:10px;'>";
    echo "<h4>Season " . htmlspecialchars($first_row['movie_season']) . "</h4>";
    echo "<li><strong>Episode:</strong> " . htmlspecialchars($first_row['episode_number']) .
         " | <a href='" . htmlspecialchars($first_row['video_url']) . "' target='_blank'>Watch</a></li>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>Episode:</strong> " . htmlspecialchars($row['episode_number']) .
             " | <a href='" . htmlspecialchars($row['video_url']) . "' target='_blank'>Watch</a></li>";
    }
    echo "</div>";
} else {
    echo "<p>No episodes added yet.</p>";
}
$stmt->close();
$conn->close();
?>
