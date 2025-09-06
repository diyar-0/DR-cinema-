<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "movies_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['img'])) {
    $title = $_POST['title'];
    $synopsis = $_POST['synopsis'];
    $genre1 = $_POST['genre1'];
    $genre2 = $_POST['genre2'];
    $genre3 = $_POST['genre3'];
    $country = $_POST['country'];
    $date = $_POST['date'];

    $img = $_FILES['img'];
    $img_name = uniqid() . '_' . basename($img['name']);
    $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($img_ext, $allowed_ext)) {
        $upload_path = 'upload_comingsoon/' . $img_name;

        if (move_uploaded_file($img['tmp_name'], $upload_path)) {
            $stmt = $conn->prepare("INSERT INTO coming_soon 
                (title, synopsis, genre1, genre2, genre3, country, date, img) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("ssssssss", $title, $synopsis, $genre1, $genre2, $genre3, $country, $date, $img_name);

            if ($stmt->execute()) {
                echo "✅ Data submitted successfully!";
            } else {
                echo "❌ Failed to insert data: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "❌ Failed to move uploaded image.";
        }
    } else {
        echo "❌ Invalid image format. Allowed: JPG, JPEG, PNG, WEBP.";
    }
} else {
    echo "❌ Invalid request or image not uploaded.";
}
?>
