<!DOCTYPE html>
<html lang="ku">

<head>
    <meta charset="UTF-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

    <!-- FontAwesome (ئەگەر پێویستت بێت) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<link rel="stylesheet" href="css/like.css">
<link rel="stylesheet" href="css/cards.css">
    <style>
        /* سادەکردنی card */
        .movie-card {
            width: 230px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            /* margin: 10px;     */
            font-family: sans-serif;
        }

        .movie-card img {
            width: 100%;
            height: 290px;
            object-fit: cover;
        }

        .movie-info {
            padding: 10px;
        }

        .movie-info h3 {
            margin: 0;
            font-size: 16px;
        }

        .movie-info p {
            margin: 5px 0;
            font-size: 14px;
        }

        #movies-container {
            display: flex;
            flex-wrap: wrap;
            /* gap: 20px; */
            justify-content: center;
        }

        #pagination-container {
            margin: 20px;
            text-align: center;
        }

        #pagination-container button {
            margin: 0 3px;
            padding: 5px 10px;
            cursor: pointer;
        }

        #pagination-container button[style] {
            background-color: #eee;
            font-weight: bold;
        }

        /* Filters container */
        #filters-container {
            margin: 20px;
            text-align: center;
        }

        #filters-container select {
            margin: 0 10px;
            padding: 5px;
        }

        select {
            background-color: #1f2937;
            /* Tailwind bg-gray-800 */
            color: white;
            padding-left: 2.2rem;
            /* space for icon */
            background-repeat: no-repeat;
            background-size: 1.5rem;
            background-position: 0.5rem center;
            border: 1px solid #4b5563;
            /* Tailwind border-gray-600 */
            height: 2.25rem;
            /* Tailwind h-9 */
            font-size: 1rem;
            outline: none;
        }
/* 
        select:nth-child(1) {
            background-image: url("https://cdn-icons-png.flaticon.com/512/1710/1710196.png");
        }

        select:nth-child(2) {
            background-image: url("https://www.freepnglogos.com/uploads/globe-png/blue-globe-transparent-sporetesting-39.png");
        }

        select:nth-child(3) {
            background-image: url("https://cdn3d.iconscout.com/3d/premium/thumb/translate-3d-icon-download-in-png-blend-fbx-gltf-file-formats--translation-language-dictionary-conversation-discussion-vote-pack-network-communication-icons-7475583.png");
        }

        select:nth-child(4) {
            background-image: url("https://www.icons101.com/icon_png/size_512/id_81538/Questiontypeonecorrect.png");
        }

        select:nth-child(5) {
            background-image: url("https://cdn-icons-png.flaticon.com/512/10691/10691802.png");
        }

        select:nth-child(6) {
            background-image: url("https://images.seeklogo.com/logo-png/40/2/imdb-internet-movie-database-logo-png_seeklogo-401602.png");
        } */
    </style>
</head>
<!-- <i class="text-danger material-icons px-2 fs-2">&#xe43a;</i> -->
<body>
    <div id="filters-container">
    <h2 class="text-light mb-3">
        <i class="bi bi-funnel text-[24px] md:text-[30px]"></i>
    Filters</h2>
    <div class="d-flex m-0 p-0 flex-wrap justify-content-center gap-3">

        <?php
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'movies_db');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Query to get unique non-empty values
        $sql = "SELECT DISTINCT genres FROM genre_film 
                WHERE genres IS NOT NULL AND genres != '' 
                ORDER BY genres";
        $result = $conn->query($sql);
        ?>
        <select id="genre" class="filter-dropdown bg-season-btn text-season-btn " >
            <option value="" class="text-gray-300 italic"  >Genre</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $genre = trim($row['genres']);
                    if (!empty($genre) && strtolower($genre) !== 'empty') {
                        echo '<option value="' . htmlspecialchars($genre) . '" class="text-gray-900 font-semibold">'
                            . htmlspecialchars($genre) . '</option>';
                    }
                }
            }
            ?>
        </select>

        <?php
        // Query to get unique non-empty values
        $sql = "SELECT DISTINCT Producing_country FROM films_db 
                WHERE Producing_country IS NOT NULL AND Producing_country != '' 
                ORDER BY Producing_country";
        $result = $conn->query($sql);
        ?>
        <select id="country" class="filter-dropdown bg-season-btn text-season-btn ">
            <option value="">Country</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $Producing_country = trim($row['Producing_country']);
                    if (!empty($Producing_country) && strtolower($Producing_country) !== 'empty') {
                        echo '<option value="' . htmlspecialchars($Producing_country) . '">'
                            . htmlspecialchars($Producing_country) . '</option>';
                    }
                }
            }
            ?>
        </select>

        <?php
        // Query to get unique non-empty values
        $sql = "SELECT DISTINCT language FROM films_db 
                WHERE language IS NOT NULL AND language != '' 
                ORDER BY language";
        $result = $conn->query($sql);
        ?>
        <select id="language" class="filter-dropdown bg-season-btn text-season-btn ">
            <option value="">Language</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $language = trim($row['language']);
                    if (!empty($language) && strtolower($language) !== 'empty') {
                        echo '<option value="' . htmlspecialchars($language) . '">'
                            . htmlspecialchars($language) . '</option>';
                    }
                }
            }
            ?>
        </select>

        <?php
        // Query to get unique non-empty values
        $sql = "SELECT DISTINCT movie_type FROM films_db 
                WHERE movie_type IS NOT NULL AND movie_type != '' 
                ORDER BY movie_type";
        $result = $conn->query($sql);
        ?>
        <select id="typefilm" class="filter-dropdown bg-season-btn text-season-btn ">
            <option value="">Kind</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $movie_type = trim($row['movie_type']);
                    if (!empty($movie_type) && strtolower($movie_type) !== 'empty') {
                        echo '<option value="' . htmlspecialchars($movie_type) . '">'
                            . htmlspecialchars($movie_type) . '</option>';
                    }
                }
            }
            ?>
        </select>

        <select id="year" class="filter-dropdown bg-season-btn text-season-btn ">
            <option value="">Years</option>
            <!-- Generate year options dynamically if needed -->
            <?php
            $current_year = date("Y");
            for ($year = $current_year; $year >= 1900; $year--) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>

        <select id="rating" class="filter-dropdown bg-season-btn text-season-btn  ">
            <option value="">IMDb</option>
            <option value="3">3+</option>
            <option value="4">4+</option>
            <option value="5">5+</option>
            <option value="6">6+</option>
            <option value="7">7+</option>
            <option value="8">8+</option>
            <option value="9">9+</option>
        </select>
    </div>
</div>

<style>
    .filter-dropdown {
        width: 140px;
        padding: 0.75rem 1rem;
        border-radius: 9999px; /* Fully rounded */
        color: white;
        font-weight: 500;
        cursor: pointer;
        border: none;
        outline: none;
        appearance: none;
        background-size: 230% auto;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    .filter-dropdown:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 14px rgba(0, 0, 0, 0.2);
    }
/*     
    .filter-dropdown:focus {
        ring: 4px;
        ring-opacity: 50;
        ring-color: currentColor;
    } */
    
    .filter-dropdown option {
        background: white;
        color: #333;
        padding: 8px;
    }
</style>
    <div id="movies-container">
        <!-- فیلمەکان لێرە نیشان دەدرێن -->
    </div>

    <div id="pagination-container">
        <!-- Pagination buttons لێرە نیشان دەدرێن -->
    </div>
    <script>
        for (let y = new Date().getFullYear(); y >= 1900; y--) {
            $('#year').append(`<option value="${y}">${y}</option>`);
        }
        document.addEventListener('DOMContentLoaded', function() {
            const filters = ['genre', 'year', 'rating', 'country', 'language', 'typefilm'];
            let currentPage = 1;

            // Function بۆ وەرگرتنی هەموو filter value ـەکان
            function getFilters() {
                const params = {};
                filters.forEach(id => {
                    const val = document.getElementById(id).value;
                    if (val) params[id] = val;
                });
                return params;
            }

            // Function بۆ بارکردنی فیلمەکان و pagination لە PHP
            function loadMovies(page = 1) {
                currentPage = page;
                const params = getFilters();
                params.page = page;

                const query = new URLSearchParams(params).toString();

                fetch('views/cards.php?' + query)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('movies-container').innerHTML = data.movies;
                        document.getElementById('pagination-container').innerHTML = data.pagination;

                        // Pagination button handlers
                        document.querySelectorAll('.pagination-btn').forEach(btn => {
                            btn.addEventListener('click', () => {
                                const p = btn.getAttribute('data-page');
                                if (p) {
                                    loadMovies(parseInt(p));
                                    // گەڕانەوە بۆ start_card
                                    document.getElementById('filters-container').scrollIntoView({
                                        behavior: 'smooth'
                                    });
                                }
                            });
                        });
                    })
                    .catch(err => {
                        document.getElementById('movies-container').innerHTML = 'هەڵە لە بارکردنی فیلمەکان.';
                        document.getElementById('pagination-container').innerHTML = '';
                        console.error(err);
                    });
            }

            // هەر کات filter ـەکان گۆڕدران بارکردنەوە دەکاتەوە
            filters.forEach(id => {
                document.getElementById(id).addEventListener('change', () => {
                    loadMovies(1);
                });
            });

            // باری یەکەمە
            loadMovies();
        });
    </script>



</body>

</html>