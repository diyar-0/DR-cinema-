<?php
$conn = new mysqli("localhost", "root", "", "movies_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['report_id'])) {
    $id = intval($_POST['report_id']);
    $sql1 = "UPDATE report_comment 
            SET answer_admin = 'Thank you, your report was received', 
                allowed_report = 1 
            WHERE id = $id";
    // UPDATE بۆ comments
    $sql2 = "UPDATE comments
         SET allowed = 0
         WHERE film_id = $id_film_new";
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo "<div class='alert alert-success'>✅ Allowed Report successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>❌ Error: " . $conn->error . "</div>";
    }
}
