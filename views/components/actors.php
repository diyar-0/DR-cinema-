   <?php
    $sql_actor = "SELECT * FROM characters WHERE `id_film`={$row_card['id']}";
    $result_actor = $conn->query($sql_actor);


    ?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
     <meta charset="UTF-8">
     <title>Image Row Scroll</title>
     <script src="https://cdn.tailwindcss.com"></script>
   </head>

   <body class="bg-white p-6">

     <div class="relative w-[83%] mx-auto">
       <!-- Scroll left button (hidden by default) -->
       <button
         class="hidden scroll-left absolute left-[-40px] top-1/2 -translate-y-1/2 bg-white border border-gray-300 rounded-full w-[30px] h-[30px] flex items-center justify-center z-20"
         onclick="scrollImages('left')">
         &#8592;
       </button>
       <!-- Image Row -->
       <div id="imageRow" class="flex overflow-x-auto scroll-smooth no-scrollbar">

         <?php
          if ($result_actor && $result_actor->num_rows > 0) {
            while ($row_actor = $result_actor->fetch_assoc())
              
             { ?>
             <div class="flex flex-col items-center mr-2 shrink-0">
               <img src="../uploads/<?php echo $row_actor['actor_img']; ?>" alt="" class="w-[70px] h-[70px] object-cover rounded-2 mb-1">
               <div class="text-gray-300 text-xs"><?php echo $row_actor['actor_name']; ?></div>
             </div>
           <?php }
          } else { ?><div class="text-gray-300 text-xs  px-0 m-0 text-danger">No actors are recorded</div><?php } ?>
       </div>

       <!-- Scroll right button (hidden by default) -->
       <button
         class="hidden scroll-right absolute right-[-40px] top-1/2 -translate-y-1/2 bg-white border border-gray-300 rounded-full w-[30px] h-[30px] flex items-center justify-center z-20"
         onclick="scrollImages('right')">
         &#8594;
       </button>
     </div>

     <!-- Hide scrollbar -->
     <style>
       .no-scrollbar::-webkit-scrollbar {
         display: none;
       }

       .no-scrollbar {
         -ms-overflow-style: none;
         scrollbar-width: none;
       }
     </style>

     <script>
       const imageRow = document.getElementById("imageRow");
       const leftBtn = document.querySelector(".scroll-left");
       const rightBtn = document.querySelector(".scroll-right");

       function updateButtons() {
         // Check if overflow exists
         const isOverflowing = imageRow.scrollWidth > imageRow.clientWidth;
         if (isOverflowing) {
           leftBtn.classList.remove("hidden");
           rightBtn.classList.remove("hidden");
         } else {
           leftBtn.classList.add("hidden");
           rightBtn.classList.add("hidden");
         }
       }

       function scrollImages(direction) {
         const scrollAmount = 80;
         imageRow.scrollBy({
           left: direction === 'left' ? -scrollAmount : scrollAmount,
           behavior: 'smooth'
         });
       }

       // Run on load and resize
       window.addEventListener('load', updateButtons);
       window.addEventListener('resize', updateButtons);
     </script>

   </body>

   </html>