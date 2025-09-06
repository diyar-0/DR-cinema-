<?php
$conn = new mysqli("localhost", "root", "", "movies_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['report_id'])) {
    $id = intval($_POST['report_id']);
    $sql = "UPDATE report_comment 
            SET answer_admin = 'Sorry, your report has been rejected', 
                allowed_report = 1 
            WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>✅ Allowed Comment successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>❌ Error: " . $conn->error . "</div>";
    }
}
?>
