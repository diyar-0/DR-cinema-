<?php
session_start();
$conn = new mysqli("localhost", "root", "", "movies_db");

if ($conn->connect_error) {
    die(json_encode(["error" => "DB connection failed"]));
}
$user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

// --- ئەگەر action نەنێردرا → تەنیا هەموو count بخوێنەوە (بۆ load page) ---
if (!isset($_POST['action']) && !isset($_POST['comment_id'])) {
   $sql = "SELECT cr.comment_id,
               SUM(cr.reaction='like') AS likes,
               SUM(cr.reaction='dislike') AS dislikes,
               (SELECT reaction FROM comment_reactions WHERE user_id=? AND comment_id=cr.comment_id) AS userReaction
        FROM comment_reactions cr
        GROUP BY cr.comment_id";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$comments = [];
while($row = $result->fetch_assoc()){
    $comments[$row['comment_id']] = $row;
}

echo json_encode($comments);
    exit;
}

// // --- ئەگەر user login نەبوو ---
// if (!isset($_SESSION['user_id'])) {
//     echo json_encode(["error" => "login_required"]);
//     exit;
// }

$user_id   = intval($_SESSION['user_id']);
$comment_id = intval($_POST['comment_id']);
$action     = $_POST['action']; // like | dislike

// check if user reacted before
$sql = "SELECT * FROM comment_reactions WHERE user_id=? AND comment_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $comment_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if ($row['reaction'] == $action) {
        // same action → remove (unlike / undislike)
        $sql = "DELETE FROM comment_reactions WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $row['id']);
        $stmt->execute();
    } else {
        // different action → update
        $sql = "UPDATE comment_reactions SET reaction=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $action, $row['id']);
        $stmt->execute();
    }
} else {
    // insert new reaction
    $sql = "INSERT INTO comment_reactions (user_id, comment_id, reaction) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $comment_id, $action);
    $stmt->execute();
}

// get updated counts (بۆ comment یەکەی کۆتایی)
$sql = "SELECT 
            SUM(reaction='like') as likes,
            SUM(reaction='dislike') as dislikes
        FROM comment_reactions
        WHERE comment_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $comment_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode($data);
