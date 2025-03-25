<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Layout with Bootstrap</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
    <style>
        :root {
            --primary-color: #50a5ff;
            --secondary-color: #2e2e2e;
            --text-color: #fff;
            --border-color: #007bff;
            --shadow-color: rgb(0, 0, 0);
            --bgbody: linear-gradient(135deg, #1f483d, #1f483d);
            --bgcard: rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 991px) {
            .sort {
                font-size: 18px !important;
            }

            h1 {
                /* title top cards */
                font-size: 2rem;
            }

            h4 {
                /* name films */
                padding: 0px;
                margin: 0;
                font-size: 1.3rem;
            }

            /* text card */
            p {
                font-size: 0.8rem;
            }
        }

        /* Use border-box for predictable sizing */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        .sort {
            font-size: 24px;
        }

        .IMDB,
        .txt-card {
            /* font-family: sans-serif !important; */
            font-size: 20px;
        }

        .cards img {
            /* cursor: pointer; */
            transition: 0.2s ease-in;
        }

        img:hover {
            filter: brightness(0.4);
            transform: scale(1.2);
        }

        .card-text2 {
            font-size: 40px;
        }
        body {
            background: var(--text-color);

            * {
                font-size: 18px;
                color: var(--shadow-color);
                font-family: Georgia, 'Times New Roman', Times, serif;
            }

        }

        .txt-random-films {
            font-size: 36px;
        }

        .card-title {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="container mt-5 p-2 ">
        <h1 class="text-center txt-random-films mb-0">Random Films</h1>
        <!-- <hr class="text-primary"> -->
        <nav class="border-bottom-line mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0">
                    <a  href="../index.html">
                        <h6 class="m-0 text-warning">Home </h6>
                    </a>
                </li>
                <li class=" active" aria-current="page">
                   <b class="a m-1">/</b> <b>Films</b>
                </li>
            </ol>
        </nav>
        <style>
            .color-purpel{
                color: #6f42c1;
            }
            .bg-purpel{
                
                background: #6f42c1;
            }
            .a{
                font-size: 18px;
            }
               .breadcrumb-item.active {
      color: red !important; /* Green color */
    }
                    .border-bottom-line2 {
                            border-bottom: 2px solid #6f42c1;

                        }
                        .border-bottom-line {
                            border-bottom: 2px solid #6f42c1;

                        }
                        .box-shadow-white{
                            border: #fff solid 1px;
                            /* box-shadow: 0px 0px 4px white; */
                        }
                    </style>
        <!-- <hr class="text-primary mt-1 hr"> -->

        <!-- Responsive grid row -->
        <div class="row">

            
            <!-- Card 1 -->
            <div class="col-6 col-md-4 col-lg-3 mb-4 ">
                <div class=" cards border-bottom-line2 pb-2 ">
                    <div class="box-shadow-white position-relative rounded overflow-hidden">
                        <a href="#">
                            <img src="img_films/vincenzo.jpg" class="card-img-top object-fit-cover mh-100 w-100"
                            style="height: 26rem;" alt="Prison Break" />
                        </a>
                        <div
                            class="image-text  position-absolute top-0 start-0 w-100 d-flex justify-content-end text-light p-2">
                            <div class="card-text2 d-flex justify-content-between w-100 text-light fw-bolder">
                                <p class=" fw-bolder mt-1 IMDB"><span style="color:yellow;">8.7</span><span
                                        style="font-size:20px;color:yellow;"> ★</span>
                                </p>
                                <p class="fw-bolder "><span class="sort" style="color:yellow;">13</span></p>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body ">
                        <h4 class="card-title mt-1 text-center fw-bolder border-bottom-line2">Vincenzo</h4>
                        <!-- <hr class="m-0 mt-1 border border-primary" /> -->
                        <div class="" style="height: 50px;">
                            <div class="d-flex  px-2 justify-content-between h-100">
                                <div class="m-0 d-flex flex-column">
                                    <p class="m-0 txt-card"><span class="color-purpel">Season:</span> <span>2</span></p>
                                    <p class="m-0 txt-card"><span class="color-purpel">Sort:</span> <span>Action</span>
                                    </p>
                                    <!-- <p class="m-0 txt-card"><span class="color-purpel">Time:</span> <span>42
                                            minute</span></p> -->
                                </div>
                                <div class="d-flex flex-column align-items-end mt-1">
                                    <h6 class="text-secondary">2:45</h6>
                                    <h6 class="color-purpel "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                      </svg>
                                      

                                </div>

                                <!-- <div class="m-0 d-flex align-items-end">
                                    <button title="Trailer" class="btn bg-purpel w-100 h-50"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="black" class="bi bi-play-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                                        </svg>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                        <!-- <hr class="mt-2 border border-primary" /> -->
                    </div>
                </div>
            </div>

      

             
            <!-- Card 1 -->
            <div class="col-6 col-md-4 col-lg-3 mb-4 ">
                <div class=" cards border-bottom-line2 pb-2 ">
                    <div class="position-relative rounded overflow-hidden">
                        <a href="#">
                            <img src="img_films/ironman1.jpg" class="card-img-top object-fit-cover mh-100 w-100"
                            style="height: 26rem;" alt="Prison Break" />
                        </a>
                        <div
                            class="image-text position-absolute top-0 start-0 w-100 d-flex justify-content-end text-light p-2">
                            <div class="card-text2 d-flex justify-content-between w-100 text-light fw-bolder">
                                <p class=" fw-bolder mt-1 IMDB"><span style="color:yellow;">8.7</span><span
                                        style="font-size:20px;color:yellow;"> ★</span>
                                </p>
                                <p class="fw-bolder "><span class="sort" style="color:yellow;">13</span></p>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body ">
                        <h4 class="card-title mt-1 text-center fw-bolder border-bottom-line2">Iron Man</h4>
                        <!-- <hr class="m-0 mt-1 border border-primary" /> -->
                        <div class="" style="height: 80px;">
                            <div class="d-flex  px-2 justify-content-between h-100">
                                <div class="m-0 d-flex flex-column">
                                    <p class="m-0 txt-card"><span class="text-warning">Season:</span> <span>2</span></p>
                                    <p class="m-0 txt-card"><span class="text-warning">Sort:</span> <span>Action</span>
                                    </p>
                                    <p class="m-0 txt-card"><span class="text-warning">Time:</span> <span>42
                                            minute</span></p>
                                </div>
                                <div class="m-0 d-flex align-items-end">
                                    <button title="Trailer" class="btn btn-warning w-100 h-50"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="black" class="bi bi-play-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="mt-2 border border-primary" /> -->
                    </div>
                </div>
            </div>

      




             
            <!-- Card 1 -->
            <div class="col-6 col-md-4 col-lg-3 mb-4 ">
                <div class=" cards border-bottom-line2 pb-2 ">
                    <div class="position-relative rounded overflow-hidden">
                        <a href="#">
                            <img src="img_films/prisonbreake6.jpg" class="card-img-top object-fit-cover mh-100 w-100"
                                style="height: 22rem;" alt="Prison Break" />
                        </a>
                        <div
                            class="image-text position-absolute top-0 start-0 w-100 d-flex justify-content-end text-light p-2">
                            <div class="card-text2 d-flex justify-content-between w-100 text-light fw-bolder">
                                <p class=" fw-bolder mt-1 IMDB"><span style="color:yellow;">8.7</span><span
                                        style="font-size:20px;color:yellow;"> ★</span>
                                </p>
                                <p class="fw-bolder "><span class="sort" style="color:yellow;">13</span></p>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body ">
                        <h4 class="card-title mt-1 text-center fw-bolder border-bottom-line2">Vincenzo</h4>
                        <!-- <hr class="m-0 mt-1 border border-primary" /> -->
                        <div class="" style="height: 80px;">
                            <div class="d-flex  px-2 justify-content-between h-100">
                                <div class="m-0 d-flex flex-column">
                                    <p class="m-0 txt-card"><span class="text-warning">Season:</span> <span>2</span></p>
                                    <p class="m-0 txt-card"><span class="text-warning">Sort:</span> <span>Action</span>
                                    </p>
                                    <p class="m-0 txt-card"><span class="text-warning">Time:</span> <span>42
                                            minute</span></p>
                                </div>
                                <div class="m-0 d-flex align-items-end">
                                    <button title="Trailer" class="btn btn-warning w-100 h-50"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="black" class="bi bi-play-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="mt-2 border border-primary" /> -->
                    </div>
                </div>
            </div>

      




             
            <!-- Card 1 -->
            <div class="col-6 col-md-4 col-lg-3 mb-4 ">
                <div class=" cards border-bottom-line2 pb-2 ">
                    <div class="position-relative rounded overflow-hidden">
                        <a href="#">
                            <img src="img_films/toy2.jpg" class="card-img-top object-fit-cover mh-100 w-100"
                                style="height: 22rem;" alt="Prison Break" />
                        </a>
                        <div
                            class="image-text position-absolute top-0 start-0 w-100 d-flex justify-content-end text-light p-2">
                            <div class="card-text2 d-flex justify-content-between w-100 text-light fw-bolder">
                                <p class=" fw-bolder mt-1 IMDB"><span style="color:yellow;">8.7</span><span
                                        style="font-size:20px;color:yellow;"> ★</span>
                                </p>
                                <p class="fw-bolder "><span class="sort" style="color:yellow;">13</span></p>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body ">
                        <h4 class="card-title mt-1 text-center fw-bolder border-bottom-line2">Vincenzo</h4>
                        <!-- <hr class="m-0 mt-1 border border-primary" /> -->
                        <div class="" style="height: 80px;">
                            <div class="d-flex  px-2 justify-content-between h-100">
                                <div class="m-0 d-flex flex-column">
                                    <p class="m-0 txt-card"><span class="text-warning">Season:</span> <span>2</span></p>
                                    <p class="m-0 txt-card"><span class="text-warning">Sort:</span> <span>Action</span>
                                    </p>
                                    <p class="m-0 txt-card"><span class="text-warning">Time:</span> <span>42
                                            minute</span></p>
                                </div>
                                <div class="m-0 d-flex align-items-end">
                                    <button title="Trailer" class="btn btn-warning w-100 h-50"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="black" class="bi bi-play-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="mt-2 border border-primary" /> -->
                    </div>
                </div>
            </div>

      



             
            <!-- Card 1 -->
            <div class="col-6 col-md-4 col-lg-3 mb-4 ">
                <div class=" cards border-bottom-line2 pb-2 ">
                    <div class="position-relative rounded overflow-hidden">
                        <a href="#">
                            <img src="../img_films/spidermen3.jpg" class="card-img-top object-fit-cover mh-100 w-100"
                                style="height: 22rem;" alt="Prison Break" />
                        </a>
                        <div
                            class="image-text position-absolute top-0 start-0 w-100 d-flex justify-content-end text-light p-2">
                            <div class="card-text2 d-flex justify-content-between w-100 text-light fw-bolder">
                                <p class=" fw-bolder mt-1 IMDB"><span style="color:yellow;">8.7</span><span
                                        style="font-size:20px;color:yellow;"> ★</span>
                                </p>
                                <p class="fw-bolder "><span class="sort" style="color:yellow;">13</span></p>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body ">
                        <h4 class="card-title mt-1 text-center fw-bolder border-bottom-line2">Vincenzo</h4>
                        <!-- <hr class="m-0 mt-1 border border-primary" /> -->
                        <div class="" style="height: 80px;">
                            <div class="d-flex  px-2 justify-content-between h-100">
                                <div class="m-0 d-flex flex-column">
                                    <p class="m-0 txt-card"><span class="text-warning">Season:</span> <span>2</span></p>
                                    <p class="m-0 txt-card"><span class="text-warning">Sort:</span> <span>Action</span>
                                    </p>
                                    <p class="m-0 txt-card"><span class="text-warning">Time:</span> <span>42
                                            minute</span></p>
                                </div>
                                <div class="m-0 d-flex align-items-end">
                                    <button title="Trailer" class="btn btn-warning w-100 h-50"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="black" class="bi bi-play-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="mt-2 border border-primary" /> -->
                    </div>
                </div>
            </div>

      


             
            <!-- Card 1 -->
            <div class="col-6 col-md-4 col-lg-3 mb-4 ">
                <div class=" cards border-bottom-line2 pb-2 ">
                    <div class="position-relative rounded overflow-hidden">
                        <a href="#">
                            <img src="../img_films/moana1.jpg" class="card-img-top object-fit-cover mh-100 w-100"
                                style="height: 22rem;" alt="Prison Break" />
                        </a>
                        <div
                            class="image-text position-absolute top-0 start-0 w-100 d-flex justify-content-end text-light p-2">
                            <div class="card-text2 d-flex justify-content-between w-100 text-light fw-bolder">
                                <p class=" fw-bolder mt-1 IMDB"><span style="color:yellow;">8.7</span><span
                                        style="font-size:20px;color:yellow;"> ★</span>
                                </p>
                                <p class="fw-bolder "><span class="sort" style="color:yellow;">13</span></p>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body ">
                        <h4 class="card-title mt-1 text-center fw-bolder border-bottom-line2">Vincenzo</h4>
                        <!-- <hr class="m-0 mt-1 border border-primary" /> -->
                        <div class="" style="height: 80px;">
                            <div class="d-flex  px-2 justify-content-between h-100">
                                <div class="m-0 d-flex flex-column">
                                    <p class="m-0 txt-card"><span class="text-warning">Season:</span> <span>2</span></p>
                                    <p class="m-0 txt-card"><span class="text-warning">Sort:</span> <span>Action</span>
                                    </p>
                                    <p class="m-0 txt-card"><span class="text-warning">Time:</span> <span>42
                                            minute</span></p>
                                </div>
                                <div class="m-0 d-flex align-items-end">
                                    <button title="Trailer" class="btn btn-warning w-100 h-50"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="black" class="bi bi-play-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="mt-2 border border-primary" /> -->
                    </div>
                </div>
            </div>

      

    

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>