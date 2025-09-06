<!-- ======== Share Button ======== -->
<button style="background: linear-gradient(45deg, purple,rgb(42, 0, 139));" class=" d-flex align-items-center justify-content-center  text-white rounded-2 px-2 py-2 four-btn" data-bs-toggle="modal" data-bs-target="#shareModal">
  <i class="fas fa-share-alt me-2"></i> Share
</button>
<!-- ======== Share Modal ======== -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark rounded-3">
      <div class="modal-header">
        <h5 class="modal-title text-light" id="shareModalLabel">Share this link</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

<style>
  .btn-close {
    filter: invert(1);
  }
</style>
      </div>

      <div class="modal-body">
        <!-- Link Input with Copy Icon inside -->
        <div class="input-copy-icon mb-3" style="position: relative;">
          <input
            type="text"
            class="form-control bg-dark text-info"
            id="shareLink"
            value="http://localhost/HTML/info_film.php?postid=<?php echo $film_id; ?>"
            readonly
            style="padding-right: 2.5rem;">
          <i class="fas fa-copy" style="
            position: absolute;
            top: 50%;
            right: 0.75rem;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;"
            onclick="copyLink()"></i>
        </div>

        <!-- Social Media Buttons -->
        <div class="d-flex justify-content-center flex-wrap gap-2">
          <!-- Messenger -->
          <a href="#" class="btn btn-outline-primary" id="facebook-messenger" target="_blank">
            <i class="fab fa-facebook-messenger"></i>
          </a>
          <!-- Telegram -->
          <a href="#" class="btn btn-outline-info" id="telegramShare" target="_blank">
            <i class="fab fa-telegram"></i>
          </a>
          <!-- WhatsApp -->
          <a href="#" class="btn btn-outline-success" id="whatsappShare" target="_blank">
            <i class="fab fa-whatsapp"></i>
          </a>
          <!-- Viber -->
          <a href="#" class="btn btn-outline-purple" id="viberShare" target="_blank" style="border:1px solid #6f42c1; color:#6f42c1;"
            onmouseover="this.style.backgroundColor='#6f42c1'; this.style.color='#fff';"
            onmouseout="this.style.backgroundColor='transparent'; this.style.color='#6f42c1';">
            <i class="fab fa-viber"></i>
          </a>
          <!-- Snapchat -->
          <a href="#" class="btn btn-outline-warning" id="snapchatShare" target="_blank">
            <i class="fab fa-snapchat"></i>
          </a>
          <!-- Twitter (X) -->
          <a href="#" class="btn btn-outline-light" id="twitterShare" target="_blank">
            <i class="fab fa-x-twitter"></i>
          </a>
          <!-- Email -->
          <a href="#" class="btn btn-outline-purple" id="emailShare" target="_blank" style="border:1px solid rgb(255, 72, 0); color:rgb(255, 72, 0);"
            onmouseover="this.style.backgroundColor='rgb(255, 72, 0)'; this.style.color='#fff';"
            onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgb(255, 72, 0)';">
            <i class="fas fa-envelope"></i>
          </a>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- ======== Toast Notification ======== -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
  <div id="copyToast" class="toast align-items-center text-white bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body">Link copied to clipboard!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto"
        data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

<!-- ======== Bootstrap JS ======== -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- ======== Share Script ======== -->
<script>
  function copyLink() {
    var copyText = document.getElementById("shareLink");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile

    navigator.clipboard.writeText(copyText.value)
      .then(() => {
        var toast = new bootstrap.Toast(document.getElementById('copyToast'));
        toast.show();
      })
      .catch(err => {
        console.error('Failed to copy: ', err);
      });
  }

  document.addEventListener("DOMContentLoaded", function() {
    const link = document.getElementById("shareLink").value;

    // Messenger
    document.getElementById("facebook-messenger").href =
      `https://www.facebook.com/dialog/send?link=${encodeURIComponent(link)}&app_id=YOUR_FB_APP_ID&redirect_uri=${encodeURIComponent(link)}`;

    // Telegram
    document.getElementById("telegramShare").href =
      `https://t.me/share/url?url=${encodeURIComponent(link)}`;

    // WhatsApp
    document.getElementById("whatsappShare").href =
      `https://wa.me/?text=${encodeURIComponent(link)}`;

    // Viber
    document.getElementById("viberShare").href =
      `viber://forward?text=${encodeURIComponent(link)}`;

    // Snapchat - Note: Snapchat does not have official web share, so fallback is generic
    document.getElementById("snapchatShare").href =
      `https://www.snapchat.com/scan?attachmentUrl=${encodeURIComponent(link)}`;

    // Twitter (X)
    document.getElementById("twitterShare").href =
      `https://twitter.com/intent/tweet?url=${encodeURIComponent(link)}`;

    // Email
    document.getElementById("emailShare").href =
      `mailto:?subject=Check this out&body=${encodeURIComponent(link)}`;
  });
</script>