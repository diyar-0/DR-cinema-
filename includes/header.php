<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ku" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>iPhone Style UI</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background: #800080;
    }

    ::-webkit-scrollbar-thumb {
      background: #fefefe;
      border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #8d8d8d;
    }

    * {
      scrollbar-width: thin;
      scrollbar-color: #dadada rgb(87, 0, 109);
    }

    a {
      text-decoration: none !important;
    }

    body {
      /* background: linear-gradient(135deg, rgb(9, 9, 15), rgb(12, 18, 34)); */
      padding-top: 70px;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      transition: all 0.3s ease-in-out;
    }

    .navbar {
      /* height: 65px; */
      background: transparent;
      backdrop-filter: blur(4px);
      /* background-color: rgba(0, 0, 0, 0.64); */
      /* background: linear-gradient(to left, #0f2027, #203a43, #2c5364); */
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
      /* border-bottom: 2px solid #4ecca3; */
      color: #4ecca3;
    }

    .modal-dialog {
      min-height: 80vh;
      overflow-y: auto;
    }

    .navbar-brand img {
      /* height: 30px; */
      margin-right: 10px;
    }

    button {
      border-radius: 9999px !important;
      transition: all 0.3s ease-in-out;
    }

    .modal {
      background-color: rgba(16, 24, 44, 0.78);
    }

    .modal-content {
      border-radius: 28px !important;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3) !important;
    }

    .modal.fade .modal-dialog {
      transform: translateY(100px);
      transition: transform 0.3s ease-out;
    }

    .modal.show .modal-dialog {
      transform: translateY(0);
    }

    @media (max-width: 768px) {
      .nav-item-text {
        display: none;
      }
    }

    .btn-outline-light:hover {
      color: #16213e !important;
      /* background-color: #2c5364 !important; */
    }

    .btn-outline-light:hover i,
    .btn-outline-light:focus i {
      color: #2c5364 !important;
    }

    .title-header {
      color: #2c5364 !important;

    }

    .DR {
      text-shadow: 0 0 1px #ffffff, 0 0 6px #00f, 0 0 0px #00f;

    }

    .DR_FILMS {
      text-shadow: 0 0 1pxrgb(0, 0, 0), 0 0 3pxrgb(0, 0, 0), 0 0 1px #f8f9fa;
      color: rgb(233, 231, 231);
    }

    @media screen and (max-width: 768px) {
      .drop-down-menu-user {
        width: 50px !important;
        background-color: #f8f9fa;
        /* optional: بۆ دیارییەوەی ڕووکاری کە گۆڕا */
      }
    }
  </style>
</head>

<body class=" bg-transparent">
  <!-- Navbar -->
  <nav dir="rtl" id="IDnav" class="bg-nav navbar navbar-expand-lg navbar-dark fixed-top justify-content-between py-0 px-3">
    <div dir="ltr" class="d-flex align-items-center ">
     <?php

    $current_page = basename($_SERVER['PHP_SELF']);
    $path = ($current_page === "index.php") ? "includes/translate.php" : "../includes/translate.php";
    ?>
    <div class="mx-3 mt-2">
        <?php include($path); ?>
    </div>


   
      <?php if (!isset($_SESSION['username'])) { ?>
        <button name="btn_favorite" type="submit" class="bg-season-btn rounded-full btn border border-light btn-sm me-2 hover:color-white" data-bs-toggle="modal"
          data-bs-target="#Togglemodalregister">
          <i class="text-season-btn bi bi-bookmark-fill"></i> <span class="text-season-btn nav-item-text me-2">Favorites</span>
        </button>
      <?php } else { ?>
        <button name="btn_favorite" type="submit" class="bg-season-btn rounded-full btn border border-light  btn-sm me-2" data-bs-toggle="modal"
          data-bs-target="#modalfavorite">
          <i class="text-season-btn bi bi-bookmark-fill"></i> <span class="text-season-btn nav-item-text me-2">Favorites</span>
        </button>
      <?php } ?>
      <div class="dropdown">
        <button class="bg-season-btn text-season-btn rounded-full btn border border-light d-flex items-center gap-2 btn-sm " data-bs-toggle="dropdown">
          <div>
            <?php if (isset($_SESSION['user_id'])): ?>
              <?php
              $picture = $_SESSION['picture'] ?? '';
              $first_letter_name = empty($picture) ? strtoupper(substr($_SESSION['username'], 0, 1)) : '';
              ?>
              <?php if (!empty($picture)): ?>
                <img class="rounded-full w-[20px] h-[20px] bg-gray-800" src="<?php echo $picture ?>" alt="">
              <?php else: ?>
                <div class="rounded-full w-[20px] h-[20px] flex items-center justify-center bg-gray-600 text-white font-bold">
                  <?php echo $first_letter_name; ?>
                </div>
              <?php endif; ?>
          </div>
          <div class="font-semibold text-season-btn text-sm nav-item-text ">
            <?php echo htmlspecialchars($_SESSION['username']); ?>
          </div>
          <div>
            <i class="bi bi-caret-down-fill text-xs"></i>
          </div>
        <?php else: ?>
          <i class="bi bi-person-circle text-md"></i>
          <span class="text-sm nav-item-text">Guest</span>
          <i class="bi bi-caret-down-fill text-xs"></i>
        <?php endif; ?>
        </button>
      
        <ul dir="rtl" class="dropdown-menu drop-down-menu-user dropdown-menu-end bg-transparent  dropdown-menu-dark mt-2 gap-4 border-0  m-0 p-0">
          <?php if (isset($_SESSION['username']) || isset($_SESSION['google_id'])): ?>
            <!-- Logout -->
            <li>
            <li>
              <a href="#"
                class="flex w-[90px] md:w-[110px] flex-row-reverse items-center 
            bg-red-500 text-gray-200 gap-2 md:gap-3 px-2 md:px-3 py-1 md:py-2
            rounded-lg border border-gray-300 transition duration-300
            justify-center md:justify-start text-sm md:text-base"
                data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-in-left text-base md:text-md"></i>
                <span class="font-medium">Logout</span>
              </a>
            </li>
            <!-- Warning -->
            <li>
              <a href="#"
                class="flex w-[90px] md:w-[110px] flex-row-reverse items-center 
           bg-amber-500 text-gray-200 gap-2 md:gap-3 px-2 md:px-3 py-1 md:py-2
            rounded-lg border border-gray-300 transition duration-300
            justify-center md:justify-start text-sm md:text-base"
                data-bs-toggle="modal" data-bs-target="#warningModal">
                <i class="bi bi-exclamation-diamond text-base md:text-md"></i>
                <span class="font-medium">Warning</span>
              </a>
            </li>
            </li>
          <?php else: ?>
            <li>
              <a href="#"
                class="flex items-center justify-between 
          gap-1 md:gap-2 
            px-2 md:px-3 py-1 md:py-2 
            rounded-lg border border-green-600  text-season-btn bg-season-btn
            transition duration-300 w-[120px] md:w-[140px] 
            text-sm md:text-base"
                data-bs-toggle="modal" data-bs-target="#Togglemodalregister">
                <i class="bi bi-box-arrow-in-left text-base md:text-lg"></i>
                <span class="font-medium">Login</span>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <div class="d-flex align-items-center">
      <?php
      if (isset($_SESSION['username'])  && ($_SESSION['user_id'] == true) && (($_SESSION['username']) == "admin")) {
        $current_page = basename($_SERVER['PHP_SELF']);
        $path = ($current_page === "index.php") ? "uploads/upload_movies.php" : "../uploads/upload_movies.php";
      ?>
        <a href="<?php echo $path; ?>" title="Upload Film" class="fs-3 ms-1 fw-bold bg-season-icon ">
          <i class="bi bi-file-earmark-arrow-up"></i></a>
      <?php }
      $current_page = basename($_SERVER['PHP_SELF']);
      $base_path = ($current_page == "index.php") ? "" : "../";
      ?>
      <a dir="ltr" class="navbar-brand p-0 d-flex align-items-start" href="<?= $base_path ?>index.php">
        <!-- <img class="w-[50px] h-[50px] sm:w-[60px] sm:h-[60px] md:w-[70px] md:h-[70px]" src="<?= $base_path ?>logo/drlogo.png" alt=""> -->
        <?php
        include("logo.php");
        ?>
      </a>
      
    </div>
  </nav>
  <!-- register & login  -->
  <div class="modal fade" id="Togglemodalregister" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mb-0 modal-dialog-centered">
      <div class="modal-content bg-transparent border-0 text-white">
        <div class="modal-body text-center p-0">
          <?php
          $current_file = basename($_SERVER['PHP_SELF']); // ناوی فایلی ئێستا
          if ($current_file === "index.php") {
            include("system_login/login_user.php");
          } else {
            include("../system_login/login_user.php");
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white rounded-3 shadow-lg border-0">
        <div class="modal-body text-center py-4 px-4">
          <div class="d-flex justify-content-center mb-3">
            <div class="rounded-circle bg-danger bg-opacity-25 d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
              <i class="bi bi-box-arrow-right text-danger fs-4"></i>
            </div>
          </div>
          <h5 class="fw-bold mb-2 text-danger">Are you sure?</h5>
          <p class="text-muted small">Do you really want to log out of your account?</p>
          <div class="d-flex gap-3 mt-4 justify-content-center w-100">
            <button class="btn rounded-4 btn-outline-light flex-fill px-4" data-bs-dismiss="modal">
              No
            </button>
            <a href="<?php
                      $current_file = basename($_SERVER['PHP_SELF']);
                      $logout_path = ($current_file === 'index.php')
                        ? 'system_login/logout.php'
                        : '../system_login/logout.php';
                      echo $logout_path;
                      ?>"
              class="btn btn-danger rounded-4 flex-fill px-4">
              Yes
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- warning -->
  <div class="modal fade" id="warningModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white rounded-3 shadow-lg border-0">
        <div class="modal-body text-center py-4 px-4">
          <div class="d-flex justify-content-center mb-3">
            <div class="rounded-circle bg-warning bg-opacity-25 d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
              <i class="bi bi-exclamation-diamond  text-warning fs-4"></i>
            </div>
          </div>
          <?php
          $user_id = (int) $_SESSION['user_id'];
          $sql_notfication = "SELECT * FROM report_comment WHERE  id_user_report = $user_id ORDER BY  created_at";
          $result_notfication = $conn->query($sql_notfication);
          if ($result_notfication->num_rows > 0) {
            while ($row = $result_notfication->fetch_assoc()) {
              $id_film_warning = intval($row['id_film']);
          ?>
              <div class="bg-gray-900/70 backdrop-blur-md rounded-3xl shadow-lg p-4 mb-4 border border-gray-800 hover:shadow-2xl transition">
                <!-- ناوەڕۆکی وەڵامی ئەدمین -->
                <div class="fw-semibold text-gray-200 text-[15px] leading-relaxed">
                  <?php
                  $text = trim($row['answer_admin']);
                  $first5 = mb_substr($text, 0, 5, 'UTF-8');

                  $isSorry = (strcasecmp($first5, 'Sorry') === 0);
                  $iconColor = $isSorry ? 'text-danger' : 'text-success';
                  ?>
                  <i class="bi bi-bell-fill <?= $iconColor ?>"></i>
                  <?= htmlspecialchars($row['answer_admin'], ENT_QUOTES, 'UTF-8'); ?>
                </div>

                <!-- بەشی کات و لینکی فیلم -->
                <div class="d-flex mt-3 justify-content-between align-items-center border-t border-gray-700 pt-2">
                  <small class="text-gray-400 text-[12px]">
                    <?php echo date('Y-m-d H:i', strtotime($row['created_at'] ?? 'now')); ?>
                  </small>
                  <?php
                  $current = basename($_SERVER['PHP_SELF']);
                  $linkPath_warning = ($current === "index.php") ? "views/detail.php?postid=$id_film_warning" : "../views/detail.php?postid=$id_film_warning";
                  ?>
                  <a href="<?php echo $linkPath_warning; ?>"
                    class="">
                    پەڕەی فیلم
                  </a>
                </div>
              </div>

            <?php }
          } else {
            ?>
            <div class="text-gray-200">You have not received any notifications!</div>
          <?PHP
          }
          ?>
          <div class="d-flex gap-2 mt-4 justify-content-around">
            <div class="alert p-2 alert-warning w-100" style="cursor: pointer;" data-bs-dismiss="modal">Cancel</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- fav list -->
  <?php
  include("favourite_list.php");
  ?>
  <!-- btn top scroll -->
  <button id="scrollBtn" class="z-50 fixed bottom-[40px] right-[46.8%] sm:right-[48.4%] hidden" onclick="window.scrollTo({top:0,behavior:'smooth'})">
    <i class="bi fs-2 text-light  bi-arrow-up-circle-fill"></i>
  </button>
  <script>
    const scrollBtn = document.getElementById("scrollBtn");

    window.addEventListener("scroll", function() {
      if (window.scrollY > 100) {
        scrollBtn.style.display = "block";
      } else {
        scrollBtn.style.display = "none";
      }
    });
  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Dark Mode Toggle Script -->
  <script>
    const toggleBtn = document.getElementById("darkToggle");
    const icon = toggleBtn.querySelector("i");
    const nav = document.getElementById("IDnav");
    const footer = document.getElementById("IDfooter");

    // باری لە localStorage بخوێنەوە
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
      document.body.classList.toggle("dark-mode", savedTheme === "dark");
      document.documentElement.setAttribute("data-bs-theme", savedTheme);

      if (savedTheme === "dark") {
        icon.classList.remove("bi-sun-fill");
        icon.classList.add("bi-moon-fill");
        nav.classList.remove("bg-nav", "text-dark");
        nav.classList.add("bg-dark", "text-light");
        footer.classList.remove("bg-nav", "text-dark");
        footer.classList.add("bg-dark", "text-light");
      } else {
        icon.classList.remove("bi-moon-fill");
        icon.classList.add("bi-sun-fill");
        nav.classList.remove("bg-dark", "text-light");
        nav.classList.add("bg-nav", "text-dark")
        footer.classList.remove("bg-dark", "text-light");
        footer.classList.add("bg-nav", "text-dark");
      }
    }

    toggleBtn.addEventListener("click", () => {
      const isDark = document.body.classList.toggle("dark-mode");
      const theme = isDark ? "dark" : "light";
      document.documentElement.setAttribute("data-bs-theme", theme);
      localStorage.setItem("theme", theme);

      if (isDark) {
        icon.classList.remove("bi-sun-fill");
        icon.classList.add("bi-moon-fill");
        nav.classList.remove("bg-nav", "text-dark");
        nav.classList.add("bg-dark", "text-light");
        footer.classList.remove("bg-nav", "text-dark");
        footer.classList.add("bg-dark", "text-light");
      } else {
        icon.classList.remove("bi-moon-fill");
        icon.classList.add("bi-sun-fill");
        nav.classList.remove("bg-dark", "text-light");
        nav.classList.add("bg-nav", "text-dark");
        footer.classList.remove("bg-dark", "text-light");
        footer.classList.add("bg-nav", "text-dark");
      }
    });
  </script>
</body>

</html>