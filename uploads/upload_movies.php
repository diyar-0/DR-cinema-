<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Movies & Series</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome & Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>
<body class="bg-dark">
    <?php if (isset($_SESSION['username']) && $_SESSION['user_id'] && $_SESSION['username'] == "admin"): ?>
        <div class="container-fluid bg-dark px-0 vh-100 d-flex flex-column">
            <!-- 🌐 Mobile Dropdown Navigation -->
            <div class="d-block d-md-none p-2 bg-white shadow-sm border-bottom">
                <div class="dropdown w-100">
                    <button class="btn w-100 d-flex justify-content-between align-items-center text-white" style="background-color: #6f42c1;" type="button" id="mobileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span><i class="fas fa-gauge-high me-2"></i>Dashboard</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="mobileDropdown">
                        <li><a style="border-bottom: 1.5px solid #9333EA;" class="dropdown-item  px-3 py-2 border-b mb-1 rounded transition duration-200  hover:bg-purple-600 hover:text-white" href="#" data-tab="dashboard"><i class="fas fa-gauge-high me-2"></i>Dashboard</a></li>
                        <li><a style="border-bottom: 1.5px solid #9333EA;" class="dropdown-item  px-3 py-2 border-b mb-1 rounded transition duration-200  hover:bg-purple-600 hover:text-white" href="#" data-tab="Movies"><i class="fas fa-film me-2"></i>Movieds</a></li>
                        <li><a style="border-bottom: 1.5px solid #9333EA;" class="dropdown-item  px-3 py-2 border-b mb-1 rounded transition duration-200  hover:bg-purple-600 hover:text-white" href="#" data-tab="Series"><i class="fas fa-tv me-2"></i>Series</a></li>
                        <li><a style="border-bottom: 1.5px solid #9333EA;" class="dropdown-item  px-3 py-2 border-b mb-1 rounded transition duration-200  hover:bg-purple-600 hover:text-white" href="#" data-tab="coming_soon"><i class="bi bi-hourglass-split me-2"></i>Coming Soon</a></li>
                        <li>
                            <a style="border-bottom: 1.5px solid #9333EA;"
                                class="dropdown-item px-3 py-2 border-b mb-1 rounded transition duration-200 hover:bg-purple-600 hover:text-white"
                                href="#" data-tab="report">
                                <i class="bi bi-exclamation-triangle me-2"></i>Report
                            </a>
                        </li>
                        <li>
                            <a style="border-bottom: 1.5px solid #9333EA;" class="block transition duration-200 w-full bg-purple-500  hover:bg-purple-600 text-white px-3 py-2 hover:bg-gray-100 rounded" href="../index.php" data-tab="coming_soon">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- 💻 Desktop Tabs -->
            <ul class="nav  nav-tabs d-none d-md-flex bg-white px-2 shadow-sm" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="block transition text-white bg-purple-500 hover:bg-purple-600 duration-200 w-full text-purple-500 px-3 py-2 hover:bg-gray-100 rounded" href="../index.php" data-tab="coming_soon">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-purple-500 active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab">
                        <i class="fas fa-gauge-high me-1"></i> Dashboard
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-purple-500" id="Movies-tab" data-bs-toggle="tab" data-bs-target="#Movies" type="button" role="tab">
                        <i class="fas fa-film me-1"></i> Movies
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-purple-500" id="Series-tab" data-bs-toggle="tab" data-bs-target="#Series" type="button" role="tab">
                        <i class="fas fa-tv me-1"></i> Series
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-purple-500" id="coming_soon-tab" data-bs-toggle="tab" data-bs-target="#coming_soon" type="button" role="tab">
                        <i class="bi bi-hourglass-split me-1"></i> Coming Soon
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-purple-500" id="report-tab" data-bs-toggle="tab" data-bs-target="#report" type="button" role="tab">
                        <i class="bi bi-exclamation-triangle me-1"></i> Report
                    </button>
                </li>
            </ul>
            <!-- 🧩 Tab Content -->
            <div class="tab-content  flex-grow-1 overflow-auto pt-0 p-3 bg-white" id="myTabContent" style="min-height: 0;">
                <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <?php include("dashboard.php"); ?>
                </div>
                <div class="tab-pane fade" id="Movies" role="tabpanel" aria-labelledby="Movies-tab">
                    <?php include("add_movies.php"); ?>
                </div>
                <div class="tab-pane fade" id="Series" role="tabpanel" aria-labelledby="Series-tab">
                    <?php include("add_series_movies.php"); ?>
                </div>
                <div class="tab-pane fade" id="coming_soon" role="tabpanel" aria-labelledby="coming_soon-tab">
                    <?php include("coming_soon.php"); ?>
                </div>
                <div class="tab-pane fade pt-0 mt-0" id="report" role="tabpanel" aria-labelledby="report-tab">
                    <?php include("report.php"); ?>
                </div>
            </div>
        </div>
        <script>
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const selectedTab = this.getAttribute('data-tab');
                    const targetTab = document.querySelector(`#${selectedTab}-tab`);
                    if (targetTab) {
                        new bootstrap.Tab(targetTab).show();
                        document.querySelector('#mobileDropdown span').innerHTML = this.innerHTML;
                    }
                });
            });
        </script>
    <?php else: ?>
        <center>
            <img width="70%" src="https://asia-exstatic.vivoglobal.com/static/img/image/404-PC_31daffa.png" alt="Access Denied">
        </center>
    <?php endif; ?>
</body>

</html>