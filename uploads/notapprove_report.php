<?php
include "../includes/config.php";  
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $id_com = intval($_POST['id_com']);
    $s = "SELECT comments.*, films_db.id AS film_id_new
          FROM comments
          JOIN films_db ON comments.film_id = films_db.id";
    $result = $conn->query($s);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_comment = $row['id']; // id ی comment
            // update report_comment
            $sql = "UPDATE report_comment 
                    SET answer_admin='Thank you, your report was received. Thank you for letting us know', 
                        allowed_report=1 
                    WHERE id = $id AND id_comment = $id_comment";
            // update comments
            $sql2 = "UPDATE comments 
                     SET allowed= 0 
                     WHERE id=$id_com ";

            if (!($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE)) {
                echo "error: " . $conn->error;
                exit;
            }
        }
        echo "success";
    } else {
        echo "error: no comments found";
    }
}
?>
