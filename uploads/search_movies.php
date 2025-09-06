<?php
$conn = new mysqli("localhost", "root", "", "movies_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$search = isset($_POST['search']) ? $conn->real_escape_string($_POST['search']) : "";
$sql = "
    SELECT id, name_film, img, movie_type ,movie_season FROM films_db 
    WHERE name_film LIKE '%$search%' AND RIGHT(movie_type, 6) = 'Series'";
$result = $conn->query($sql);
?>
<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 px-2">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="movie-card bg-white rounded-lg shadow p-1 transition hover:scale-105 duration-200" 
                       data-id="' . htmlspecialchars($row["id"]) . '" 
                       data-name="' . htmlspecialchars($row["name_film"]) . '" 
                       data-image="' . htmlspecialchars($row["img"]) . '" 
                       data-type="' . htmlspecialchars($row["movie_type"]) . '" 
                       data-season="' . htmlspecialchars($row["movie_season"]) . '">';
            echo '<img class="w-full h-[200px] object-cover rounded-md" src="' . htmlspecialchars($row["img"]) . '" alt="Movie Image">';
            echo '<h6 class="mt-2 text-sm font-bold truncate">' . htmlspecialchars($row["name_film"]) . '</h6>';
            echo '<p class="text-xs text-gray-600"><strong>Type:</strong> ' . htmlspecialchars($row["movie_type"]) . '</p>';
            echo '<p class="text-xs text-gray-600"><strong>Season:</strong> ' . htmlspecialchars($row["movie_season"]) . '</p>';
            echo '</div>';
        }
    } else {
        echo "<p class='col-span-full text-center text-red-600'>No movies found.</p>";
    }
    ?>
</div>
<?php
$conn->close();
?>
