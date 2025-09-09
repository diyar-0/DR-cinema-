
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content bg-season-btn text-season-btn text-center p-4">
      <h2 class="h5">Welcome to the <br><b>DR Cinema</b></h2>
      <p class="mb-3">
        Unofficially this site is working only for testing temporarily, thanks !
      </p>
              <div class="seasons-section">
                <h3 class="seasons-title">Change Seasons</h3>
                <div class="seasons-images">
                    <img src="https://www.shutterstock.com/image-photo/magical-frozen-winter-landscape-snow-600nw-2383498825.jpg" alt="زستان" class="season-img  w-[40px] h-[30px]" data-season="winter">
                    <img src="https://img.freepik.com/premium-photo/colorful-autumn-landscape_130291-2270.jpg" alt="پاییز" class="season-img  w-[40px] h-[30px]" data-season="autumn">
                    <img src="https://utulsa.edu/wp-content/uploads/2020/11/Summer.png" alt="هاوین" class="season-img  w-[40px] h-[30px]" data-season="summer">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/026/769/733/small_2x/nature-floral-background-in-early-summer-colorful-natural-spring-landscape-with-with-flowers-soft-selective-focus-generative-ai-illustration-free-photo.jpg" alt="بەهار" class="season-img w-[40px] h-[30px]" data-season="spring">
                </div>
            </div>
      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="closeBtn">Close</button>
    </div>
  </div>
</div>
 <script src="script/change_season.js"></script>

<script>
  // دروستکردنی Cookie
  function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
  }

  // خوێندنەوەی Cookie
  function getCookie(name) {
    const cname = name + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i].trim();
      if (c.indexOf(cname) === 0) {
        return c.substring(cname.length, c.length);
      }
    }
    return "";
  }

  // مۆدال نیشان بدە ئەگەر جار یەکەم بێت
  window.addEventListener("load", () => {
    const visited = getCookie("vrcinema_visited");
    if (!visited) {
      const welcomeModal = new bootstrap.Modal(document.getElementById("welcomeModal"));
      welcomeModal.show();
      setCookie("vrcinema_visited", "true", 365); // cookie بۆ ساڵێک
    }
  });
</script>
