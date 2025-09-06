<?php
include("../includes/config.php");
// total movies
$sql = "SELECT COUNT(*) as total FROM films_db";
$result_all_movies = $conn->query($sql);
$total_movies = "";
if ($result_all_movies->num_rows > 0) {
    $row = $result_all_movies->fetch_assoc();
    $total_movies = $row['total'];
} else {
    $zero = 0;
}
// movies
$sql2 = "SELECT movie_type, COUNT(*) as total  FROM films_db  WHERE movie_type IN (
            'Movie','Drama','Movie Season', 'Movie Series',
            'Animated','Carton','Short Film','Documentary','TV Movie',
            'Music Video','Theatrical Film','Religious','Religious Season',
            'Drama Series','Animated Series','Carton Series','TV Series',
            'Web Series','Religious Series'
         ) 
         GROUP BY movie_type";

$result_movies = $conn->query($sql2);
$type_counts = [
    'Movie'             => 0,
    'Drama'             => 0,
    'Movie Season'      => 0,
    'Animated'          => 0,
    'Carton'            => 0,
    'Short Film'        => 0,
    'Documentary'       => 0,
    'TV Movie'          => 0,
    'Music Video'       => 0,
    'Theatrical Film'   => 0,
    'Religious'         => 0,
    'Religious Season'  => 0,
    'Movie Series'      => 0,
    'Drama Series'      => 0,
    'Animated Series'   => 0,
    'Carton Series'     => 0,
    'TV Series'         => 0,
    'Web Series'        => 0,
    'Religious Series'  => 0
];

if ($result_movies->num_rows > 0) {
    while ($row = $result_movies->fetch_assoc()) {
        $type = $row['movie_type'];
        if (isset($type_counts[$type])) {
            $type_counts[$type] = $row['total'];
        }
    }
}
$movies           = $type_counts['Movie'];
$drama            = $type_counts['Drama'];
$movieseason      = $type_counts['Movie Season'];
$animated         = $type_counts['Animated'];
$carton           = $type_counts['Carton'];
$short_film       = $type_counts['Short Film'];
$documentary      = $type_counts['Documentary'];
$tv_movie         = $type_counts['TV Movie'];
$music_video      = $type_counts['Music Video'];
$theatrical_film  = $type_counts['Theatrical Film'];
$religious        = $type_counts['Religious'];
$religious_season = $type_counts['Religious Season'];
$movie_series     = $type_counts['Movie Series'];
$drama_series     = $type_counts['Drama Series'];
$animated_series  = $type_counts['Animated Series'];
$carton_series    = $type_counts['Carton Series'];
$tv_series        = $type_counts['TV Series'];
$web_series       = $type_counts['Web Series'];
$religious_series = $type_counts['Religious Series'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Movie Dashboard - Logged In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gray-100 text-gray-800 m-0 p-0">

    <div class="max-w-[1400px] mx-auto p-0">

        <header class="bg-[#2c3e50] text-white py-4 rounded-md mb-8 text-center">
            <h1 class="text-2xl font-semibold">Movie Dashboard - Logged In</h1>
        </header>

        <!-- First grid: 2 columns on mobile, 4 on md -->
        <div class="grid grid-cols-2 sm:grid-col-3  md:grid-cols-6 gap-3 lg:gap-7 mb-8">
            <!-- Total Movies -->
            <div class="bg-gray-100 border-l-4 border-gray-700 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl">🎬</div>
                <h2 class="text-gray-700 text-xl font-semibold mt-2">Total Movies</h2>
                <div class="text-4xl font-bold mt-2 text-gray-700">
                    <?php echo $total_movies ?: $zero; ?>
                </div>
            </div>

            <!-- Movies -->
            <div class="bg-red-100 border-l-4 border-red-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-red-600">🎥</div>
                <h2 class="text-red-600 text-xl font-semibold mt-2">Movies</h2>
                <div class="text-4xl font-bold mt-2 text-red-600">
                    <?php echo $movies; ?>
                </div>
            </div>

            <!-- Drama -->
            <div class="bg-green-100 border-l-4 border-green-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-green-600">🎭</div>
                <h2 class="text-green-600 text-xl font-semibold mt-2">Drama</h2>
                <div class="text-4xl font-bold mt-2 text-green-600">
                    <?php echo $drama; ?>
                </div>
            </div>

            <!-- Movie Season -->
            <div class="bg-yellow-100 border-l-4 border-yellow-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-yellow-600">📺</div>
                <h2 class="text-yellow-600 text-xl font-semibold mt-2">Movie Season</h2>
                <div class="text-4xl font-bold mt-2 text-yellow-600">
                    <?php echo $movieseason; ?>
                </div>
            </div>

            <!-- Anime Movies -->
            <div class="bg-purple-100 border-l-4 border-purple-700 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-purple-700">🗾</div>
                <h2 class="text-purple-700 text-xl font-semibold mt-2">Anime Movies</h2>
                <div class="text-4xl font-bold mt-2 text-purple-700">
                    <?php echo $animated; ?>
                </div>
            </div>

            <!-- Cartoon Movies -->
            <div class="bg-blue-100 border-l-4 border-blue-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-blue-600">🧸</div>
                <h2 class="text-blue-600 text-xl font-semibold mt-2">Cartoon Movies</h2>
                <div class="text-4xl font-bold mt-2 text-blue-600">
                    <?php echo $carton; ?>
                </div>
            </div>

            <!-- Short Film -->
            <div class="bg-teal-100 border-l-4 border-teal-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-teal-600">🎞️</div>
                <h2 class="text-teal-600 text-xl font-semibold mt-2">Short Film</h2>
                <div class="text-4xl font-bold mt-2 text-teal-600">
                    <?php echo $short_film; ?>
                </div>
            </div>

            <!-- Documentary -->
            <div class="bg-pink-100 border-l-4 border-pink-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-pink-600">📽️</div>
                <h2 class="text-pink-600 text-xl font-semibold mt-2">Documentary</h2>
                <div class="text-4xl font-bold mt-2 text-pink-600">
                    <?php echo $documentary; ?>
                </div>
            </div>

            <!-- TV Movie -->
            <div class="bg-indigo-100 border-l-4 border-indigo-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-indigo-600">📺</div>
                <h2 class="text-indigo-600 text-xl font-semibold mt-2">TV Movie</h2>
                <div class="text-4xl font-bold mt-2 text-indigo-600">
                    <?php echo $tv_movie; ?>
                </div>
            </div>

            <!-- Music Video -->
            <div class="bg-orange-100 border-l-4 border-orange-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-orange-600">🎵</div>
                <h2 class="text-orange-600 text-xl font-semibold mt-2">Music Video</h2>
                <div class="text-4xl font-bold mt-2 text-orange-600">
                    <?php echo $music_video; ?>
                </div>
            </div>

            <!-- Theatrical Film -->
            <div class="bg-lime-100 border-l-4 border-lime-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-lime-600">🎥</div>
                <h2 class="text-lime-600 text-xl font-semibold mt-2">Theatrical Film</h2>
                <div class="text-4xl font-bold mt-2 text-lime-600">
                    <?php echo $theatrical_film; ?>
                </div>
            </div>

            <!-- Religious -->
            <div class="bg-yellow-200 border-l-4 border-yellow-800 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-yellow-800"> 🕌</div>
                <h2 class="text-yellow-800 text-xl font-semibold mt-2">Religious</h2>
                <div class="text-4xl font-bold mt-2 text-yellow-800">
                    <?php echo $religious; ?>
                </div>
            </div>

            <!-- Religious Season -->
            <div class="bg-yellow-300 border-l-4 border-yellow-900 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-yellow-900">⛪</div>
                <h2 class="text-yellow-900 text-xl font-semibold mt-2">Religious Season</h2>
                <div class="text-4xl font-bold mt-2 text-yellow-900">
                    <?php echo $religious_season; ?>
                </div>
            </div>

            <!-- Movie Series -->
            <div class="bg-red-200 border-l-4 border-red-800 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-red-800">🎬</div>
                <h2 class="text-red-800 text-xl font-semibold mt-2">Movie Series</h2>
                <div class="text-4xl font-bold mt-2 text-red-800">
                    <?php echo $movie_series; ?>
                </div>
            </div>

            <!-- Drama Series -->
            <div class="bg-cyan-100 border-l-4 border-cyan-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-cyan-600">🎭</div>
                <h2 class="text-cyan-600 text-xl font-semibold mt-2">Drama Series</h2>
                <div class="text-4xl font-bold mt-2 text-cyan-600">
                    <?php echo $drama_series; ?>
                </div>
            </div>

            <!-- Anime Series -->
            <div class="bg-pink-200 border-l-4 border-pink-800 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-pink-800">👺</div>
                <h2 class="text-pink-800 text-xl font-semibold mt-2">Anime Series</h2>
                <div class="text-4xl font-bold mt-2 text-pink-800">
                    <?php echo $animated_series; ?>
                </div>
            </div>

            <!-- Cartoon Series -->
            <div class="bg-cyan-200 border-l-4 border-cyan-800 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-cyan-800">🦊</div>
                <h2 class="text-cyan-800 text-xl font-semibold mt-2">Cartoon Series</h2>
                <div class="text-4xl font-bold mt-2 text-cyan-800">
                    <?php echo $carton_series; ?>
                </div>
            </div>

            <!-- TV Series -->
            <div class="bg-orange-200 border-l-4 border-orange-800 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-orange-800">📡</div>
                <h2 class="text-orange-800 text-xl font-semibold mt-2">TV Series</h2>
                <div class="text-4xl font-bold mt-2 text-orange-800">
                    <?php echo $tv_series; ?>
                </div>
            </div>

            <!-- Web Series -->
            <div class="bg-gray-200 border-l-4 border-gray-800 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-gray-800">🌐</div>
                <h2 class="text-gray-800 text-xl font-semibold mt-2">Web Series</h2>
                <div class="text-4xl font-bold mt-2 text-gray-800">
                    <?php echo $web_series; ?>
                </div>
            </div>

            <!-- Religious Series -->
            <div class="bg-white border-l-4 border-gray-800 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl">📚</div>
                <h2 class="text-gray-800 text-xl font-semibold mt-2">Religious Series</h2>
                <div class="text-4xl font-bold mt-2 text-gray-800">
                    <?php echo $religious_series; ?>
                </div>
            </div>

            <!-- Registrants -->
            <div class="bg-yellow-100 border-l-4 border-yellow-600 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-yellow-600">👥</div>
                <h2 class="text-yellow-600 text-xl font-semibold mt-2">Registrants</h2>
                <div class="text-4xl font-bold mt-2 text-yellow-600">
                    <?php

                    $sql = "SELECT COUNT(*) as total_login FROM users";
                    $result_all_login = $conn->query($sql);

                    if ($result_all_login && $result_all_login->num_rows > 0) {
                        $row_user = $result_all_login->fetch_assoc();
                        echo $row_user['total_login'];
                    } else {
                        echo 0;
                    }

                    ?>
                </div>
            </div>

            <?php
            // visitor_counter_ip.php

            $file_count = "data_visit/counter.txt";
            $file_ips = "data_visit/ips.txt";

            // دروستکردنی فایلەکان ئەگەر نییەن
            if (!file_exists($file_count)) {
                file_put_contents($file_count, 0);
            }
            if (!file_exists($file_ips)) {
                file_put_contents($file_ips, "");
            }

            // وەرگرتنی IP ـی سەردانکەر
            $user_ip = $_SERVER['REMOTE_ADDR'];

            // وەرگرتنی IP ـەکان لە فایل
            $ips = file($file_ips, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            // ئەگەر IP ـەکە لە لیست نییە زیاد بکە و ژمارە زیاد بکە
            if (!in_array($user_ip, $ips)) {
                // زیادکردنی IP نوێ
                file_put_contents($file_ips, $user_ip . PHP_EOL, FILE_APPEND);

                // زیادکردنی ژمارەی سەردانەکان
                $count = (int)file_get_contents($file_count);
                $count++;
                file_put_contents($file_count, $count);
            } else {
                // IP هەیە، ژمارەی سەردانەکان بخوێنەوە بێ زیادکردن
                $count = (int)file_get_contents($file_count);
            }
            ?>
            <!-- Visitors -->
            <div class="bg-yellow-200 border-l-4 border-yellow-800 rounded-md shadow-md py-4 px-2 text-center hover:-translate-y-1 transition-transform duration-300">
                <div class="text-5xl text-yellow-800">👣</div>
                <h2 class="text-yellow-800 text-xl font-semibold mt-2">Visitors</h2>
                <div class="text-4xl font-bold mt-2 text-yellow-800">
                    <?php echo $count; ?>
                </div>
            </div>


        </div>

        <!-- Second grid: 1 column on mobile, 3 on md -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <div class="bg-white rounded-md shadow-md p-5">
                <h2 class="text-[#2c3e50] text-xl font-semibold mb-4">Summary</h2>

                <div class="space-y-4">
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Movies:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $movies; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Drama:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $drama; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Movie Season:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $movieseason; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Animated:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $animated; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Carton:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $carton; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Short Film:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $short_film; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Documentary:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $documentary; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">TV Movie:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $tv_movie; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Music Video:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $music_video; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Theatrical Film:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $theatrical_film; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Religious:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $religious; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Religious Season:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $religious_season; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Movie Series:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $movie_series; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Drama Series:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $drama_series; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Animated Series:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $animated_series; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Carton Series:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $carton_series; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">TV Series:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $tv_series; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Web Series:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $web_series; ?></span>
                    </div>
                    <div class="flex justify-between border-b border-dashed border-gray-300 pb-2">
                        <span class="font-bold">Religious Series:</span>
                        <span class="font-bold text-[#2c3e50]"><?php echo $religious_series; ?></span>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t-2 border-[#2c3e50] text-lg font-semibold flex justify-between">
                    <span>Total:</span>
                    <span class="text-[#2c3e50]"><?php echo $total_movies; ?></span>
                </div>
            </div>


            <div class="md:col-span-2 bg-white rounded-md shadow-md p-5">
                <h2 class="text-[#2c3e50] text-xl font-semibold mb-4">Latest Comments</h2>
                <div id="comments-list" class="space-y-6">

                    <div class="border-b pb-1 flex justify-between items-start">
                        <div>
                            <div class="font-bold text-red-600">Ali</div>
                            <div class="mt-1 text-gray-600">The anime series was excellent, I recommend it to everyone.</div>
                            <div class="text-xs text-gray-400 mt-1">2023-05-15</div>
                        </div>
                        <div class="flex">
                            <button data-bs-toggle="modal" data-bs-target="#delete_comment" aria-label="Delete comment" class="w-auto text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#allowed_comment" aria-label="allowed comment" class="w-auto text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- delete -->
    <div class="modal fade" id="delete_comment" aria-hidden="true" aria-labelledby="Togglemodalloginlabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-body text-center py-2 px-0">
                    <?php

                    ?>
                    <h3 class="text-center pt-3 flex items-center justify-center">
                        <i class="bi bi-trash3-fill text-[20px] md:text-[30px] text-danger"></i>
                    </h3>
                    <p class="py-3">Are you sure you want to delete the comment?</p>
                    <div class="modal-footer border-0 justify-content-around">
                        <button class="btn btn-secondary w-40" data-bs-dismiss="modal">No</button>
                        <button class="btn btn-danger w-40" data-bs-dismiss="modal">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- allowed -->
    <div class="modal fade" id="allowed_comment" aria-hidden="true" aria-labelledby="Togglemodalloginlabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-body text-center py-2 px-0">
                    <?php
                     
                    ?>
                    <h3 class="text-center pt-3 flex items-center justify-center">
                        <i class="bi bi-check-circle-fill text-success text-[20px] md:text-[30px]"></i>
                    </h3>

                    <p class="py-3">Are you sure you allow comments?</p>
                    <div class="modal-footer border-0 justify-content-around">
                        <button class="btn btn-secondary w-40" data-bs-dismiss="modal">No</button>
                        <button class="btn btn-success  w-40" data-bs-dismiss="modal">Yes</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>