<?php
$group_title = $row_card['group_title'];
$film_id = $row_card['id'];
$sql_similar = "SELECT * FROM films_db WHERE group_title='$group_title' AND id != $film_id";
$result_series_season = $conn->query($sql_similar);

if ($result_series_season && $result_series_season->num_rows > 0) {
?>
    <div class="p-0">

        <div class="p-2 border-t border-dark ">
            <h2 class="text-light mx-3 my-0 p-0 text-lg md:text-2xl lg:text-3xl">Seasons</h2>
        </div>
        <div class="flex px-3 flex-wrap gap-1 justify-center sm:justify-start">
            <?php
            while ($row_series_season = $result_series_season->fetch_assoc()) {
                $series_season_id = htmlspecialchars($row_series_season['id']);
                $series_season_name = htmlspecialchars($row_series_season['name_film']);
                $series_season_img = htmlspecialchars($row_series_season['img']);
                $series_season_year = htmlspecialchars($row_series_season['release_date']);
                $series_season_rating = htmlspecialchars($row_series_season['rating']);
            ?>
                <a href="detail.php?postid=<?php echo $series_season_id ?>"
                    class="group relative w-[45%] mx-1 my-2 sm:w-[200px] md:w-[180px] bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl transition-transform transform hover:-translate-y-1">

                    <img src="../uploads/<?php echo $series_season_img ?>" alt="<?php echo $series_season_name ?>" class="w-full h-48 object-cover">

                    <!-- ID overlay on hover -->
                    <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-white text-xl font-bold"><?php echo $series_season_id; ?></span>
                    </div>

                    <div class="p-2">
                        <h3 class="text-white text-sm font-semibold truncate"><?php echo $series_season_name ?></h3>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-1">
                            <span><?php echo $series_season_year ?></span>
                            <span class="text-yellow-400"><i class="fas fa-star"></i> <?php echo $series_season_rating ?>/10</span>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>

<?php
}
?>