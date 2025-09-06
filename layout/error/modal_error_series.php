<?php
echo "
<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
<style>
  #iosModal_s {
    display: block;
    background-color: rgba(0, 0, 0, 0.3);
    position: fixed;
    inset: 0;
    z-index: 1055;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
      Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }

  .modal-content {
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.18);
    max-width: 350px;
    position: relative;
    background: #fff;
    text-align: center;
  }

  .modal-icon {
    margin-bottom: 1.2rem;
  }

  h5 {
    margin-top:5px;
    font-weight: 600;
    font-size: 1rem;
    color: #222;
    letter-spacing: 0.03em;
  }

  .modal-footer {
    margin-top: 1.5rem;
    display: flex;
    justify-content: center;
  }

  .btn-ios {
    background-color:rgb(78, 78, 78);
    border: none;
    border-radius: 14px;
    padding: 8px 20px;
    font-weight: 600;
    color:rgb(228, 228, 228);
    transition: background-color 0.2s;
  }

  .btn-ios:hover {
    background-color:rgb(58, 58, 58);
  }
    .cursor_pointer{
            cursor: pointer;
</style>

<!-- Modal -->
<div id=\"iosModal_s\" role=\"dialog\" aria-modal=\"true\" aria-labelledby=\"modalTitle_s\">
  <div class=\"modal-dialog modal-dialog-centered\">
    <div class=\"modal-content w-100 p-4 rounded-4\" role=\"document\">
      <div class=\"modal-body\">

        <!-- Warning Icon -->
        <svg
          class=\"modal-icon m-0 text-danger\"
          xmlns=\"http://www.w3.org/2000/svg\"
          width=\"40\"
          height=\"40\"
          fill=\"none\"
          viewBox=\"0 0 24 24\"
          stroke=\"currentColor\"
          stroke-width=\"2\"
          aria-hidden=\"true\"
        >
          <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z\" />
        </svg>

        <!-- Message -->
        <h5 id=\"modalTitle_s\">تکایە هەموو خانەکان پڕبکەوە</h5>

        <!-- Footer Button -->
        <div class=\"modal-footer\">
          <span class=\"btn-ios w-100 cursor_pointer \" onclick=\"document.getElementById('iosModal_s').style.display = 'none'\">باشە</span>
        </div>

      </div>
    </div>
  </div>
</div>
";
?>
