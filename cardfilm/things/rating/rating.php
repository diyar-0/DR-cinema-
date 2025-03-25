<div class=" w-100 d-flex justify-content-center mt-2 rating-screen">

    <style>
           @media (max-width: 767px) {
        .rating-star-screen{
margin: 0px 18px !important;
}
           }
        /* Container for the rating stars */
        .rating {
            display: inline-block;
            /* font-size: 2rem; */
            direction: rtl;
            /* Display stars from left to right */
            user-select: none;
        }

        /* Each star style */
        .rating>span {
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        /* Highlight stars on hover (all stars to the right) */
        .rating>span:hover,
        .rating>span:hover~span {
            color: gold;
        }

        /* Highlight selected stars */
        .rating .selected {
            color: gold;
        }
    </style>



    <!-- Star Rating Container -->
    <div title="Rating" class="rating d-flex justify-content-around   m-0 p-0" id="rating">

        <span class="mx-2 rating-star-screen" data-value="5"><svg xmlns="http://www.w3.org/2000/svg"
                width="22" height="22" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg></span>
        <span class="mx-2 rating-star-screen" data-value="4"><svg xmlns="http://www.w3.org/2000/svg"
                width="22" height="22" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg></span>
        <span class="mx-2 rating-star-screen" data-value="3"><svg xmlns="http://www.w3.org/2000/svg"
                width="22" height="22" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg></span>
        <span class="mx-2 rating-star-screen" data-value="2"><svg xmlns="http://www.w3.org/2000/svg"
                width="22" height="22" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg></span>
        <span class="mx-2 rating-star-screen" data-value="1"><svg xmlns="http://www.w3.org/2000/svg"
                width="22" height="22" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg></span>

       
    </div>

    <span class="d-none" id="rating-value">0</span>

    <script>
        const ratingEl = document.getElementById('rating');
        const stars = ratingEl.querySelectorAll('span');
        const ratingValueEl = document.getElementById('rating-value');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const rating = this.getAttribute('data-value');
                ratingValueEl.textContent = rating;

                // Update star colors based on selection
                stars.forEach(s => {
                    if (s.getAttribute('data-value') <= rating) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });
            });
        });
    </script>
</div>