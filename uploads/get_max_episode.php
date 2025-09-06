<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "movies_db");
if ($conn->connect_error) {
    echo json_encode(['exists' => false, 'error' => 'DB connection failed']);
    exit;
}
$film_id = isset($_POST['film_id']) ? (int)$_POST['film_id'] : 0;
$episode_number = isset($_POST['episode_number']) ? (int)$_POST['episode_number'] : 0;

if ($film_id <= 0 || $episode_number <= 0) {
    echo json_encode(['exists' => false, 'error' => 'Invalid input']);
    exit;
}

$stmt = $conn->prepare("SELECT COUNT(*) AS count FROM films_series WHERE film_id = ? AND episode_number = ?");
$stmt->bind_param("ii", $film_id, $episode_number);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row && $row['count'] > 0) {
    echo json_encode(['exists' => true]); // episode already exists
} else {
    echo json_encode(['exists' => false]); // episode number is available
}

$stmt->close();
$conn->close();
