<?php
// Fetch 8 random movies
$stmt = $pdo->prepare("SELECT * FROM films_db ORDER BY RAND() LIMIT 8");
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="relative overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.5)] text-white w-[100%] h-[300px] sm:h-[400px] md:h-[500px] lg:h-[630px]">
        <div class="slider">
            <?php foreach ($movies as $index => $movie): ?>
                <div class="slide">
                    <img class="w-[100%] h-[100%] " src="uploads/<?= htmlspecialchars($movie['img_bg']) ?>" alt="<?= htmlspecialchars($movie['name_film']) ?>">
                    <div class="slide-content px-[20px] md:px-[40px] color-white">
                        <a href="views/detail.php?postid=<?= htmlspecialchars($movie['id']) ?>">
                            <h2 class="text-light" style="text-shadow: 2px 2px 4px black;">
                                <?= htmlspecialchars($movie['name_film']) ?>
                            </h2>
                        </a>
                        <div class="slide-meta">
                            <div class="gap-[15px] w-full md:w-[auto]">
                                <span class="bg-blue-800/60 text-white rounded-md px-2 py-1 text-[11px] md:text-[13px] lg:text-[15px]"><i class="bi  bi-star-fill"></i> <?= htmlspecialchars($movie['rating']) ?></span>
                                <span class="bg-blue-800/60  text-white rounded-md px-2 py-1 text-[11px] md:text-[13px] lg:text-[15px]"><i class="bi  bi-calendar-week"></i><?= htmlspecialchars($movie['release_date']) ?></span>
                                <span class="bg-blue-800/60  text-white rounded-md px-2 py-1 text-[11px] md:text-[13px] lg:text-[15px]">
                                    <i class="bi  bi-globe2"></i> <?= htmlspecialchars($movie['Producing_country']) ?></span>
                            </div>
                            <div>
                                <!-- <i>🎭</i> -->
                                <?php
                                $sql_genres = "SELECT genres FROM genre_film WHERE id_film = ?";
                                $stmt_genres = $pdo->prepare($sql_genres);
                                $stmt_genres->execute([$movie['id']]);

                                while ($row_genres = $stmt_genres->fetch(PDO::FETCH_ASSOC)) {
                                    $genres = explode(',', $row_genres['genres']); // Split by comma
                                    foreach ($genres as $genre) {
                                        $genre = trim($genre); // Remove spaces
                                        if (!empty($genre)) {
                                            echo "<div class='px-2 py-1 bg-amber-600/60  mx-1 rounded-md text-[11px] md:text-[13px] lg:text-[15px]'>" . htmlspecialchars($genre) . "</div>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <p class="slide-description text-[16px] hidden md:block "><?= htmlspecialchars($movie['synopsis']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="btnx bg-season-btn text-season-btn btnx-prev  w-[30px] h-[30px] md:w-[50px] md:h-[50px]">❮</button>
        <button class="btnx bg-season-btn text-season-btn btnx-next  w-[30px] h-[30px] md:w-[50px] md:h-[50px]">❯</button>

        <div class="indicators">
            <?php for ($i = 0; $i < count($movies); $i++): ?>
                <div class="indicator w-[10px] h-[10px]  md:w-[15px] md:h-[15px] <?= $i === 0 ? 'active' : '' ?>"></div>
            <?php endfor; ?>
        </div>
    </div>

    <script src="script/image_slide.js"></script>