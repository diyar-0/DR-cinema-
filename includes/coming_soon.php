<?php
$host = "localhost";       // ناوی سێرڤەرەکەت
$user = "root";            // یوزەری بنکەی داتا
$password = "";            // وشەی نهێنی (خاڵی ئەگەر هیچ نەدراوە)
$dbname = "movies_db";     // ناوی بنکەی داتا

$conn = new mysqli($host, $user, $password, $dbname);

// چاککردنەوەی هەڵە
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}
$sql_coming_soon = "SELECT * FROM coming_soon"; // گۆڕینی ناوی خشتەکەت بەپێی خۆت
$result_coming_soon = $conn->query($sql_coming_soon);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <?php
    if ($result_coming_soon->num_rows > 0) {
    ?>
        <!-- Upcoming Releases -->
        <section class="py-0 bg-gray-900 bg-opacity-50">
            <div class="max-w-7xl mx-auto px-4 py-4 rounded-3 sm:px-6 lg:px-8">
                            <h2 class="text-2xl md:text-3xl font-bold text-white mb-8">Coming Soon</h2>
                <?php
                while ($row_coming_soon = $result_coming_soon->fetch_assoc()) {

                    $title = htmlspecialchars($row_coming_soon['title']);
                    $img = htmlspecialchars($row_coming_soon['img']);
                    $genre1 = htmlspecialchars($row_coming_soon['genre1']);
                    $genre2 = htmlspecialchars($row_coming_soon['genre2']);
                    $genre3 = htmlspecialchars($row_coming_soon['genre3']);
                    $synopsis = htmlspecialchars($row_coming_soon['synopsis']);
                    $country = htmlspecialchars($row_coming_soon['country']);
                    $date = htmlspecialchars($row_coming_soon['date']);

                ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
                        <!-- Card Start -->
                        <div class="bg-dark rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                            <img src="upload_comingsoon/<?php echo $img ?>" alt="Movie Image" class="w-full h-[250px] object-cover">
                            <div class="p-3 space-y-1">
                                <h2 class="text-xl font-bold text-white"><?php echo $title ?></h2>
                                <div class="flex flex-wrap gap-2 text-sm">
                                    <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded-full"><?php echo $genre1 ?></span>
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full"><?php echo $genre2 ?></span>
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full"><?php echo $genre3 ?></span>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-200 mt-2">
                                    <span> <i class="bi bi-globe2"></i> <?php echo " ". $country ." "?> </span>
                                    <span> <i class="bi bi-calendar-event text-info "></i>  <?php echo " ". $date ." " ?> </span>
                                </div>
                                <div id="synopsisContainer" class="text-sm text-gray-400 relative">
                                    <p id="synopsisText" class="line-clamp-3 mb-0 transition-all duration-300 ease-in-out">
                                        <?php echo $synopsis  ?>
                                    </p>
                                    <button id="toggleBtn" class="text-purple-400 mt-0 focus:outline-none">More</button>
                                </div>
                            </div>
                        </div>
                        <!-- Card End -->
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php
    }
    ?>

</body>

</html>
<script>
    const btn = document.getElementById("toggleBtn");
    const synopsis = document.getElementById("synopsisText");

    btn.addEventListener("click", () => {
        synopsis.classList.toggle("line-clamp-3");
        if (synopsis.classList.contains("line-clamp-3")) {
            btn.textContent = "More";
        } else {
            btn.textContent = "Less";
        }
    });
</script>