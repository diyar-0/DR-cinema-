<!-- <section class="py-12 px-2 bg-gray-900 bg-opacity-50"> -->
    <div class="p-0">
        <div class="flex items-center justify-between m-0 px-4 md:px-2 my-1">
            <h2 class="m-0 px-2 text-lg md:text-2xl lg:text-3xl font-bold text-white">The likes</h2>
            <?php
            $movie_type = $row_card['movie_type'];
            $film_id = $row_card['id'];
            $sql_similar = "SELECT * FROM films_db WHERE movie_type='$movie_type' AND id != $film_id";
            $result_similar = $conn->query($sql_similar);
            ?>
            <?php if ($result_similar && $result_similar->num_rows > 5): ?>
                <a href="#" id="viewAll" class="text-blue-400 hover:text-blue-300 flex items-center">
                    View All <i class="fas fa-chevron-right ml-2 text-sm"></i>
                </a>
            <?php endif; ?>
        </div>

        <div class="flex px-3 flex-wrap gap-1 justify-center sm:justify-start">
            <?php
            $film_index = 0;

            if ($result_similar && $result_similar->num_rows > 0) {
                while ($row_similar = $result_similar->fetch_assoc()) {
                    $film_index++;
                    $sim_id = htmlspecialchars($row_similar['id']);
                    $sim_name = htmlspecialchars($row_similar['name_film']);
                    $sim_img = htmlspecialchars($row_similar['img']);
                    $sim_year = htmlspecialchars($row_similar['release_date']);
                    $sim_rating = htmlspecialchars($row_similar['rating']);

                    // $sql_genres = "SELECT * FROM genre_film WHERE id_film=$sim_id";
                    // $result_genres = $conn->query($sql_genres);
                    // $genres_html = '';
                    // if ($result_genres && $result_genres->num_rows > 0) {
                    //     while ($row_g = $result_genres->fetch_assoc()) {
                    //         $genres = explode(',', $row_g['genres']);
                    //         foreach ($genres as $g) {
                    //             $g = trim($g);
                    //             if (!empty($g)) {
                    //                 $genres_html .= "<span class='inline-block bg-gray-800 text-blue-400 text-xs rounded-full m-1'>" . htmlspecialchars($g) . "</span>";
                    //             }
                    //         }
                    //     }
                    // }

                    $hideClass = $film_index > 5 ? 'hidden more-film' : '';
            ?>

<a href="detail.php?postid=<?php echo $sim_id ?>"
                    class="group relative w-[45%] mx-1 my-2 sm:w-[200px] md:w-[180px] bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl transition-transform transform hover:-translate-y-1 <?php echo $hideClass ?>">

                    <img src="../uploads/<?php echo $sim_img ?>" alt="<?php echo $sim_name ?>" class="w-full h-48 object-cover">

                    <!-- ID overlay on hover -->
                    <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-white text-xl font-bold"><?php echo $sim_id; ?></span>
                    </div>

                    <div class="p-2">
                        <h3 class="text-white text-sm font-semibold truncate"><?php echo $sim_name ?></h3>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-1">
                            <span><?php echo $sim_year ?></span>
                            <span class="text-yellow-400"><i class="fas fa-star"></i> <?php echo $sim_rating ?>/10</span>
                        </div>
                    </div>
                </a>
            <?php
                }
            } else {
                echo "<p class='text-gray-400'>No similar films found.</p>";
            }
            ?>
        </div>
    </div>
<!-- </section> -->

<!-- JavaScript for toggle -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let viewAllBtn = document.getElementById("viewAll");
        let isExpanded = false;

        if (viewAllBtn) {
            viewAllBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const hiddenCards = document.querySelectorAll(".more-film");

                if (!isExpanded) {
                    hiddenCards.forEach(card => card.classList.remove("hidden"));
                    viewAllBtn.innerHTML = `Show Less <i class="fas fa-chevron-up ml-2 text-sm"></i>`;
                    isExpanded = true;
                } else {
                    hiddenCards.forEach(card => card.classList.add("hidden"));
                    viewAllBtn.innerHTML = `View All <i class="fas fa-chevron-right ml-2 text-sm"></i>`;
                    isExpanded = false;
                }
            });
        }
    });
</script>