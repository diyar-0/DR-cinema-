<?php
$sql_movies = "SELECT f.*, s.video_url, s.season_number, s.episode_number
FROM films_db f
JOIN films_series s ON f.id = s.film_id
WHERE RIGHT(f.movie_type, 6) = 'Series' AND f.id = $film_id;";
$result_movies = $conn->query($sql_movies);
?>

<!-- Layout -->
<div class="flex flex-col md:flex-row w-full gap-4 px-4 py-0 rounded-lg">

    <!-- Left: Episode List -->
    <div  class="w-full bg-gray-950 bg-opacity-50  md:w-1/3 text-white rounded-xl p-4 space-y-2 overflow-y-auto max-h-[550px]">
        <h4>Episodes</h4>
        <?php
        $all_episodes = [];
        if ($result_movies->num_rows > 0) {
            while ($row = $result_movies->fetch_assoc()) {
                $url = $row["video_url"];
                $id = basename($url);
                $embed = "https://vidmoly.me/embed-$id.html";
                $ep_num = htmlspecialchars($row["episode_number"]);

                $all_episodes[] = [
                    'embed_url' => $embed,
                    'episode_number' => $ep_num
                ];
            }

            foreach ($all_episodes as $ep) {
                echo "
    <button class='episode-btn w-full text-left px-4 py-2 bg-gradient-to-r from-blue-900 via-purple-800 to-blue-900 rounded-1
           hover:from-purple-900 hover:to-blue-700 text-white font-semibold rounded-xl shadow-lg 
           hover:scale-105 transition-all duration-300 ease-in-out'
        data-embed-url='{$ep['embed_url']}'>
        <span class='inline-block w-6 h-6 bg-white text-dark bg-opacity-20 rounded-full text-center text-sm font-bold mr-2'>
           <div class='mt-[2px]' > {$ep['episode_number']}</div>
        </span>
     Episode
    </button>
    ";
            }
        } else {
            echo "<p>No episodes found.</p>";
        }
        ?>
    </div>

    <!-- Right: Video Player -->
    <div class="w-full md:w-2/3 rounded-xl overflow-hidden relative h-[400px] md:h-[550px]">
        <!-- Loader -->
        <div id="videoLoader" class="absolute inset-0 bg-black bg-opacity-70 flex items-center justify-center z-10 hidden">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-[#1797b8] border-solid"></div>
        </div>

        <!-- Video -->
        <iframe id="videoPlayer" class="w-full h-full relative z-0" src="" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
    </div>
</div>

<!-- JS -->
<script>
    const buttons = document.querySelectorAll('.episode-btn');
    const iframe = document.getElementById('videoPlayer');
    const loader = document.getElementById('videoLoader');

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            const url = btn.getAttribute('data-embed-url');

            loader.classList.remove('hidden'); // show loader
            iframe.src = ""; // reset iframe

            setTimeout(() => {
                iframe.src = url + "?autoplay=1"; // load video
                loader.classList.add('hidden'); // hide loader
            }, 1000);
            if (window.innerWidth < 768) {
                document.getElementById("videoLoader").scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }

        });
    });

    // Auto-load first episode
    <?php if (count($all_episodes) > 0): ?>
        window.addEventListener('DOMContentLoaded', () => {
            loader.classList.remove('hidden');
            setTimeout(() => {
                iframe.src = "<?= $all_episodes[0]['embed_url'] ?>?autoplay=1";
                loader.classList.add('hidden');
            }, 200);
        });
    <?php endif; ?>
</script>