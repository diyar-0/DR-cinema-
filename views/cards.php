<?php
include("../includes/config.php");

$limit = 12;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

$genre    = $_GET['genre'] ?? '';
$year     = $_GET['year'] ?? '';
$rating   = $_GET['rating'] ?? '';
$country  = $_GET['country'] ?? '';
$language = $_GET['language'] ?? '';
$typefilm = $_GET['typefilm'] ?? '';

// Prepare WHERE clause and JOIN for genre_film table
$where = "WHERE 1=1 ";
$join  = "LEFT JOIN genre_film g ON f.id = g.id_film";

if ($genre)    $where .= " AND g.genres = '" . $conn->real_escape_string($genre) . "'";
if ($year)     $where .= " AND (f.release_date) = '" . $conn->real_escape_string($year) . "'";
if ($rating)   $where .= " AND f.rating >= '" . $conn->real_escape_string($rating) . "'";
if ($country)  $where .= " AND f.Producing_country = '" . $conn->real_escape_string($country) . "'";
if ($language) $where .= " AND f.language = '" . $conn->real_escape_string($language) . "'";
if ($typefilm) $where .= " AND f.movie_type = '" . $conn->real_escape_string($typefilm) . "'";

// Query films with filters and pagination
$query = "SELECT DISTINCT f.* FROM films_db f $join $where LIMIT $offset, $limit";
$result = $conn->query($query);
$movies = '<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 px-2 py-6 justify-center">';
$movies = '<div class="column-card d-flex flex-wrap gap-2 px-0 py-6 justify-center">';
while ($row = $result->fetch_assoc()) {
    $film_id = htmlspecialchars($row['id']);
    $title = htmlspecialchars($row['name_film']);
    $year_film = $row['release_date'];
    $image_path = htmlspecialchars($row['img']) ?: 'default-poster.jpg';
    $rating_film = htmlspecialchars($row['rating']);
    $country_film = htmlspecialchars($row['Producing_country']);
    $genre_html = '';
    $sql_genre = "SELECT * FROM genre_film WHERE id_film={$film_id}";
    $result_genre = $conn->query($sql_genre);

    while ($row = $result_genre->fetch_assoc()) {
        foreach (explode(',', $row['genres']) as $g) {
            $g = trim($g);
            if ($g) {
                $genre_html .= "
               <span class='year-badge text-gray-100 text-[9px] md:text-[11px] font-medium px-1.5 py-0.5 rounded '>
  " . htmlspecialchars($g) . "</span> ";
            }
        }
    }
    $movies .= "
<style>
    /* Animation Styles */
    @keyframes cardEntrance {
        0% { opacity: 0; transform: scale(0.8) rotate(-2deg); }
        100% { opacity: 1; transform: scale(1) rotate(0); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Card Styles */
    .movie-card2 {
        animation: cardEntrance 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        perspective: 1000px;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        border: 1px solid rgba(0, 173, 181, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        position: relative;
    }
    .movie-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg, 
            rgba(0, 173, 181, 0) 0%, 
            rgba(0, 173, 181, 0.1) 50%, 
            rgba(0, 173, 181, 0) 100%
        );
        transform: rotate(45deg);
        animation: gradientShift 6s infinite linear;
    }
    .movie-card2:hover {
        transform: translateY(-5px) rotateY(5deg);
        box-shadow: 0 12px 40px rgba(0, 173, 181, 0.4);
    }
    // 

    /* Poster Styles */
    .poster-container {
        position: relative;
        overflow: hidden;
                background: transparent !important;
    }
 
    .poster-img {
        transition: transform 0.8s cubic-bezier(0.2, 0.9, 0.4, 1);
    }
    .movie-card2:hover .poster-img {
        transform: scale(1.08);
        
    }

    /* Button Styles */
    .action-btn {
        backdrop-filter: blur(5px);
        background: rgba(0, 0, 0, 0.5);
        transition: all 0.3s ease;
    }
    .action-btn:hover {
        background: rgba(116, 0, 139, 0.7);
        transform: scale(1.1);
    }

    /* Badge Styles */
    .rating-badge {
        // background: linear-gradient(180deg, #00adb5 0%,rgb(0, 89, 109) 100%);
        // text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(0, 172, 181, 0.60);
        }
    .year-badge {
            box-shadow:inset  0px -1px 1px 1px rgb(74, 49, 80);

    border:0px solid black;
        background: rgba(103, 0, 124, 0.45);
    }

    /* Content Styles */
    .movie-content {
        border-top: 1px solid rgba(0, 173, 181, 0.2);
    }
    .movie-title {
    color:whitesmoke;
        position: relative;
        display: inline-block;
    }
    .movie-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #00adb5;
        transition: width 0.3s ease;
    }
    .genre-pill {
        background: rgba(0, 173, 181, 0.15);
        border: 1px solid rgba(0, 173, 181, 0.3);
        transition: all 0.3s ease;
    }
    .genre-pill:hover {
        background: rgba(0, 173, 181, 0.3);
        transform: translateY(-2px);
    }
      /* Base pagination style */
.pagination-container button {
display:flex;
justify-content: center;
  padding: 0.5rem 0.75rem;
  font-size: 14px;
  border-radius: 12px;
  margin: 2px;
  transition: all 0.2s ease-in-out;
}

/* Mobile styles */
@media (max-width: 640px) {
  .pagination-container {
    gap: 4px;
  }

  .pagination-container button {
    padding: 2px 6px !important;
    width:20px !important;
    font-size: 10px;
    border-radius: 8px;
  }
}
</style>
<a href='views/detail.php?postid=$film_id'>
<div class='movie-card2 rounded-xl overflow-hidden flex flex-col relative transform transition-all duration-500 w-[100%] max-w-[180px] sm:max-w-[230px] md:max-w-[250px] mx-auto'>
    <!-- Poster Section -->
    <div class='poster-container w-[100%] relative'>
      <img src='uploads/$image_path' 
     alt='Film Poster' 
     class='w-[195px] max-w-[100%] h-[200px] sm:h-[210px] md:h-[250px] object-cover poster-img mx-0 rounded-t'/>
        <div class='absolute top-2 right-2 flex gap-2 z-10'>
            <!-- Rating -->
            <button class='action-btn rating-badge rounded-full text-[10px] md:text-[13px] px-2 py-1 text-white hover:text-gray-400'>
            <i class='bi bi-star-fill text-warning'></i>
                $rating_film
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class='movie-content text-xs font-bold px-2 py-2 flex flex-col flex-grow'>
        <h5 class='movie-title text-center m-0 text-[13px] md:text-[15px] lg:text-[19px] truncate' style='color:#ffadff;  text-shadow: 1px 1px 3px blue;
        '>$title</h5>
        <hr class='my-2 border-gray-300'>

        <!-- Genres -->
      <div class='flex  gap-1.5 max-w-[180px] text-sm sm:text-base overflow-hidden whitespace-nowrap max- truncate inline'>
     $genre_html 
        </div>
        <!-- Meta Info -->
        <div class='mt-auto pt-2 flex flex-wrap gap-1.5 items-center t text-[8px] text-[8px] md:text-[10px] text-[8px] lg:text-[11px]'>
            <span class='text-gray-300 bg-blue-500 bg-opacity-20 px-1.5 py-0.5 rounded'>$country_film</span>
            <span class='text-gray-300 bg-blue-500 bg-opacity-20 px-1.5 py-0.5 rounded'>$year_film</span>
        </div>
    </div>
</div>
</a>
";
}
$movies .= '</div>';
// Pagination total count
$count_q = "SELECT COUNT(DISTINCT f.id) as total FROM films_db f $join $where";
$total = $conn->query($count_q)->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);

$pagination = '';
if ($total_pages > 1) {
    $pagination .= "<div class='pagination-container flex items-center justify-center gap-2 mt-6 flex-wrap'>";

    // First
    $pagination .= "<button class='pagination-btn px-3 py-2 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-500 text-white text-sm shadow-md hover:scale-105 transition fs-6' data-page='1'>
    <i class='bi bi-chevron-double-left text-[11px] '></i></button>";

    // Previous
    $prev = max(1, $page - 1);
    $pagination .= "<button class='pagination-btn px-2 py-2 rounded-xl bg-gray-700 text-white text-sm shadow-sm hover:bg-gray-600 transition fs-6' data-page='$prev'><i class='bi bi-dash'></i></button>";

    // Page Numbers
    $max_pages_to_show = 4;
    $start = max(1, $page - intval($max_pages_to_show / 2));
    $end = $start + $max_pages_to_show - 1;

    if ($end > $total_pages) {
        $end = $total_pages;
        $start = max(1, $end - $max_pages_to_show + 1);
    }

    for ($i = $start; $i <= $end; $i++) {
        $isActive = ($i == $page);
        $classes = $isActive
            ? "bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-bold shadow-inner"
            : "bg-white text-gray-700 hover:bg-gray-200";
        $pagination .= "<button class='pagination-btn px-3 py-2 rounded-xl text-sm $classes transition' data-page='$i'>$i</button>";
    }

    // Next
    $next = min($total_pages, $page + 1);
    $pagination .= "<button class='pagination-btn px-2 py-2 rounded-xl bg-gray-700 text-white text-sm hover:bg-gray-600 transition fs-6' data-page='$next'>
    <i class='bi bi-plus-lg'></i>
    </button>";

    // Last
    $pagination .= "<button class='pagination-btn px-3 fs-3 py-2 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-500 text-white text-sm shadow-md hover:scale-105 transition' data-page='$total_pages'>
    <i class='bi bi-chevron-double-right text-[11px]'></i></button>";

    $pagination .= "</div>";
}


// Output JSON
echo json_encode([
    'movies' => $movies,
    'pagination' => $pagination
]);
