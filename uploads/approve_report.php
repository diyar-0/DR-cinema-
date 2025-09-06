<?php
include "../includes/config.php"; // لێرەوە پەیوەندیت بە DB بکە
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "UPDATE report_comment 
            SET answer_admin=' Sorry, your report has been rejected ', allowed_report=1 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error: " . $conn->error;
    }
}
?>
