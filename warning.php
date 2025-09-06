
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content text-center p-4">
      <h2 class="h5">Welcome to the <br><b>DR Cinema</b></h2>
      <p class="mb-3">
        Unofficially this site is working only for testing temporarily, thanks !
      </p>
      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="closeBtn">Close</button>
    </div>
  </div>
</div>
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
