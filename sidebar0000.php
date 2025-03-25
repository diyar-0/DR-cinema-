<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DR Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body id="body-pd">
    <header class="header w-100 align-items-center d-flex justify-content-between" id="header">
        <div class="header_toggle" id="header_toggle">
            <h3><i class='bx bx-menu text-light' id="header-toggle"></i> </h3>
        </div>
        <div class="d-flex  align-items-center">
    
            <div class="mx-2 cursor-pointer" title="Language">
                <div class="dropdown-language" style="float:right;">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="white" clip-rule="evenodd">
                        <path d="M15.246 17c-.927 3.701-2.547 6-3.246 7-.699-1-2.32-3.298-3.246-7h6.492zm7.664 0c-1.558 3.391-4.65 5.933-8.386 6.733 1.315-2.068 2.242-4.362 2.777-6.733h5.609zm-21.82 0h5.609c.539 2.386 1.47 4.678 2.777 6.733-3.736-.8-6.828-3.342-8.386-6.733zm14.55-2h-7.28c-.29-1.985-.29-4.014 0-6h7.281c.288 1.986.288 4.015-.001 6zm-9.299 0h-5.962c-.248-.958-.379-1.964-.379-3s.131-2.041.379-3h5.962c-.263 1.988-.263 4.012 0 6zm17.28 0h-5.963c.265-1.988.265-4.012.001-6h5.962c.247.959.379 1.964.379 3s-.132 2.042-.379 3zm-8.375-8h-6.492c.925-3.702 2.546-6 3.246-7 1.194 1.708 2.444 3.799 3.246 7zm-8.548-.001h-5.609c1.559-3.39 4.651-5.932 8.387-6.733-1.237 1.94-2.214 4.237-2.778 6.733zm16.212 0h-5.609c-.557-2.462-1.513-4.75-2.778-6.733 3.736.801 6.829 3.343 8.387 6.733z" />
                    </svg>
    <div class="dropdown-content-language">
        <a href="#">English</a>
        <a href="#">کوردی</a>
        <a href="#">عربی</a>
    </div>
</div>
            </div>
            <div class="mx-2 cursor-pointer">
                <a class="position-relative" title="Favorite">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M19 24l-7-6-7 6v-24h14v24z" />
                    </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <span>9</span>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </div>
            <style>

.dropdown-language {
  position: relative;
  display: inline-block;
}

.dropdown-content-language {
  display: none;
  position: absolute;
  right: 0;
  background-color:rgb(249, 249, 249);
  min-width: 160px;
  border-radius: 12px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content-language a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content-language a:hover {background-color:rgb(213, 213, 213);
    border-radius: 12px;
}

.dropdown-language:hover .dropdown-content-language {
  display: block;
  
}

.dropdown-language:hover .dropbtn {
  background-color: #3e8e41;
}
</style>









<img class="rounded-circle img_logo ms-2 me-0" width="60px" height="60px" src="img_films/img_logo/skymoon.png" alt="">
        </div>
    </header>
    <div class="l-navbar px-0" id="nav-bar">
        <nav class="nav d-flex flex-column justify-content-between overflow-hidden h-100">
            <div class="bg-nav">
                <!-- Logo -->
                <a class="nav_logo mb-2  ">
                    <div class="header_img p-0 m-0 rounded-circle border border-dark cursor-pointer overflow-hidden d-flex align-items-center justify-content-center" title="Profile" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img_films/img_logo/diyar.jpg" alt="">
                    </div>
                    <b class="text-dark  text-truncate" style="max-width: 140px;">diyarfuad7@gmail.com</b>
                </a>

                <!-- Logo -->
                <div class="nav_list pt-3 border-top border-dark"> <a href="#" class="nav_link mb-2 active-sidebar"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name ms-2">Dashboard</span> </a> <a href="#" class="nav_link mb-2"> <i
                            class='bx bx-user nav_icon'></i> <span class="nav_name ms-2">Users</span> </a> <a href="#"
                        class="nav_link mb-2 "> <i class='bx bx-message-square-detail nav_icon'></i> <span
                            class="nav_name ms-2">Messages</span> </a> <a href="#" class="nav_link mb-2 "> <i
                            class='bx bx-bookmark nav_icon'></i> <span class="nav_name ms-2">Bookmark</span> </a> <a href="#"
                        class="nav_link mb-2 "> <i class='bx bx-folder nav_icon'></i> <span class="nav_name ms-2">Files</span> </a>
                    <a href="#" class="nav_link mb-2 "> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                            class="nav_name ms-2">Stats</span> </a>
                </div>
            </div>
           <div class="d-flex flex-column justify-content-start">
           <a href="#" class="nav_link py-1 ">
                 <i class='bx bx-moon nav_icon'></i>
                <span class="nav_name ms-2">DarkMod</span>
            </a>
            <a href="#" class="nav_link py-1 ">
                 <i class='bx bx-info-circle nav_icon'></i>
                <span class="nav_name ms-2">About</span>
            </a>
            <a href="#" class="nav_link mb-2 py-1">
                 <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name ms-2">SignOut</span>
            </a>
           </div>
        </nav>
    </div>
    <!--Container Main start-->
    <!-- <div class="height-100 div-includes container shadow-none mt-5"> -->
    <div class="div-includes" id="main" >
    <?php
        include 'cardfilm/info_films.php';
        ?>
    </div>
    <!--Container Main end-->
</body>

</html>
<style>
    /* @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"); */
</style>
<script src="script/sidebar.js"></script>