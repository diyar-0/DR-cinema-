<!DOCTYPE html>
<html lang="ku" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .footer {
            background: linear-gradient(135deg, #FF5F6D, #FFC371);
            color: white;
            padding: 50px 0 0;
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            opacity: 0.05;
            pointer-events: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
        }

        .seasons-section {
            text-align: center;
            padding: 30px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            margin-bottom: 40px;
            backdrop-filter: blur(5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(0);
            transition: all 0.5s ease;
        }

        .seasons-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .seasons-title {
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 700;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            display: inline-block;
        }

        .seasons-title::after {
            content: '';
            position: absolute;
            right: 0;
            bottom: -8px;
            width: 50%;
            height: 3px;
            background: white;
            border-radius: 3px;
        }

        .seasons-images {
            display: flex;
            justify-content: center;
            gap: 25px;
        }

        .season-img {
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 3px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .season-img::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: all 0.3s ease;
            border-radius: 50%;
        }

        .season-img:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .season-img:hover::after {
            opacity: 1;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column {
            flex: 1;
            min-width: 220px;
        }

        .footer-column h3 {
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 3px;
            background: white;
            border-radius: 3px;
        }

        .footer-column p,
        .footer-column li {
            margin-bottom: 12px;
            line-height: 1.7;
        }

        .footer-column ul {
            padding: 0px;
            list-style: none;
        }

        .footer-column a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-column a:hover {
            transform: translateX(-5px);
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .social-links a:nth-child(1):hover {

            background: #0f6fffff;
            transform: translateY(-5px);
        }

        .social-links a:nth-child(2):hover {
            background: #1f1f1fff;
            transform: translateY(-5px);
        }

        .social-links a:nth-child(3):hover {
            background: #000000ff;
            transform: translateY(-5px);
        }

        .footer-bottom {
            background: rgba(0, 0, 0, 0.1);
            padding: 25px 0;
            text-align: center;
            position: relative;
        }

        .footer-bottom::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, white, transparent);
        }

        .season-message {
            font-size: 18px;
            font-weight: 600;
            transition: all 0.5s ease;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .summer-theme {
            background: linear-gradient(135deg, #611117ff, #860e0eff);
        }

        .spring-theme {
            background: linear-gradient(135deg, #204e0bff, #467210ff);
        }

        .autumn-theme {
            background: linear-gradient(135deg, #b4950ab4, #83650bd8);
        }

        .winter-theme {
            background: linear-gradient(135deg, #044658ff, #05346eff);
        }

        .summer-text {
            color: #fffacd;
        }

        .spring-text {
            color: #f0fff0;
        }

        .autumn-text {
            color: #fffaf0;
        }

        .winter-text {
            color: #f0f8ff;
        }

        .spring-bg {
            background-color: #00ff001f;
        }

        .summer-bg {
            background-color: #310000ff;
        }

        .autumn-bg {
            background: linear-gradient(135deg, #e7d06b9d, #ffdf7e9f);
        }

        .winter-bg {
            background-color: #001a2eff;
        }

        @media (max-width: 768px) {
            .seasons-images {
                gap: 15px;
            }

            .season-img {
                width: 65px;
                height: 65px;
            }

            .footer-content {
                flex-direction: column;
                gap: 30px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <footer class="footer summer-theme">
        <div class="container">
            <!-- بەشی وێنەی وەرزەکان -->
            <div class="seasons-section">
                <h3 class="seasons-title">Change Seasons</h3>
                <div class="seasons-images">
                    <img src="https://www.shutterstock.com/image-photo/magical-frozen-winter-landscape-snow-600nw-2383498825.jpg" alt="زستان" class="season-img  w-[40px] h-[40px] md:w-[70px] md:h-[70px]" data-season="winter">
                    <img src="https://img.freepik.com/premium-photo/colorful-autumn-landscape_130291-2270.jpg" alt="پاییز" class="season-img  w-[40px] h-[40px] md:w-[70px] md:h-[70px]" data-season="autumn">
                    <img src="https://utulsa.edu/wp-content/uploads/2020/11/Summer.png" alt="هاوین" class="season-img  w-[40px] h-[40px] md:w-[70px] md:h-[70px]" data-season="summer">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/026/769/733/small_2x/nature-floral-background-in-early-summer-colorful-natural-spring-landscape-with-with-flowers-soft-selective-focus-generative-ai-illustration-free-photo.jpg" alt="بەهار" class="season-img w-[40px] h-[40px] md:w-[70px] md:h-[70px]" data-season="spring">
                </div>
            </div>
            <?php
            // گەیاندنی پەیوەندی
            $conn = new mysqli("localhost", "root", "", "movies_db");

            // هەڵگرتنی وێنەکان
            $sql = "SELECT * FROM about";
            $result = $conn->query($sql);

            $row = $result->fetch_assoc();

            ?>

            <!-- ناوەڕۆکی فوتەر -->
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About</h3>
                    <div class="mt-2">
                        <div class="d-flex bg-dark bg-opacity-50 rounded-2 p-2">
                            <!-- وێنەکە -->
                            <img id="myImg" class="w-[70px] h-[70px] rounded-2 object-cover cursor-pointer"
                                <?php
                                $current_file = basename($_SERVER['PHP_SELF']); // ناوی فایلی ئێستا
                                if ($current_file === "index.php") {
                                    echo " src='uploads/" . $row['image'] . "' ";
                                } else {
                                    echo " src='../uploads/" . $row['image'] . "' ";
                                }
                                ?>
                                alt="<?php echo $row['title']; ?>" />

                            <!-- مۆدال -->
                            <div id="myModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50">
                                <div class="relative max-w-[90vw] max-h-[90vh]">
                                    <span id="closeModal" class="absolute top-[40px] right-2 text-white text-3xl cursor-pointer">&times;</span>
                                    <img id="modalImg" src="" alt="" class="max-w-full max-h-[80vh] rounded" />
                                    <p id="modalCaption" class="bg-season-icon text-xl my-1 text-center">Developer " <?php echo $row['title']; ?></p>
                                    <p id="" class="text-gray-300 text-md mt-0 text-center"> <?php echo $row['about_me']; ?></p>
                                </div>
                            </div>

                            <script>
                                const img = document.getElementById('myImg');
                                const modal = document.getElementById('myModal');
                                const modalImg = document.getElementById('modalImg');
                                // const modalCaption = document.getElementById('modalCaption');
                                const closeModal = document.getElementById('closeModal');

                                img.addEventListener('click', () => {
                                    modal.classList.remove('hidden');
                                    modalImg.src = img.src;
                                    // modalCaption.textContent = img.alt;
                                });

                                closeModal.addEventListener('click', () => {
                                    modal.classList.add('hidden');
                                });

                                // دەتوانیت کلیک لە دەرەوەی وێنەی مۆدال هەروەها داخڵ بکەیت بۆ داخستن
                                modal.addEventListener('click', (e) => {
                                    if (e.target === modal) {
                                        modal.classList.add('hidden');
                                    }
                                });
                            </script>
                            <div class="p-2 pb-0">
                                <b class="text-[13px] md:text-[16px]"> <?php echo $row['title']; ?></b>
                                <p class="text-[11px] md:text-[14px]"><?php echo $row['about_me']; ?></p>
                            </div>
                        </div>
                        <div class="social-links flex justify-center">
                            <a href="https://t.me/Diyar_51"><i class="fab fa-telegram-plane"></i></a>
                            <a href="https://github.com/diyarfuad"><i class="fab fa-github"></i></a>
                            <a href="https://www.tiktok.com/@developer.code6"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Services</h3>
                    <ul>
                        <li><a>Web Design</a></li>
                        <li><a>Web Development</a></li>
                        <li><a>Mobile App Development</a></li>
                        <li><a>Online Advertising</a></li>
                        <li><a>Graphic Design</a></li>
                    </ul>
                </div>


                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Erbil, Kurdistan </p>
                    <p><i class="fas fa-phone"></i> +964 750 613 06 78 </p>
                    <p><i class="fas fa-envelope"></i> diyarfuad0@gmail.com </p>
                    <p><i class="bi bi-person-workspace"></i> Freelancer </p>
                </div>

            </div>

            <!-- بەشی خوارەوە -->
            <div class="footer-bottom" id="season-footer">
                <p id="btn" class="season-message summer-text">
                    Summer is here! A perfect time for trips and beach fun.
                </p>
            </div>

        </div>
    </footer>

</body>

</html>