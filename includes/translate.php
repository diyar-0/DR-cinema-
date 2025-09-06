<!DOCTYPE html>
<html dir="" lang="ckb">
<head>
  <meta charset="UTF-8" />
  <style>
   .goog-logo-link, .goog-te-gadget span, .goog-te-banner-frame { display: none !important; }
    #google_translate_element { display: inline-block; }
    body { top: 0 !important; }
       .goog-logo-link,
    .goog-te-gadget span,
    .goog-te-banner-frame,
    #goog-gt-tt,
    .goog-te-balloon-frame,
    .goog-te-banner,
    .skiptranslate iframe {
      display: none !important;
    }
    .goog-te-gadget-simple {
      border-radius: 50%;
      border: whitesmoke 1px dotted !important;
      background-color: transparent !important;
      width: 30px !important;
      height: 30px !important;
      padding: 0px !important;
      background-image: url('https://png.pngtree.com/png-vector/20230817/ourmid/pngtree-google-translate-translation-icon-vector-png-image_9183337.png');
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      cursor: pointer;
    }
    .goog-te-gadget-icon { display: none !important; }
  </style>
</head>
<body>
  <div id="google_translate_element"></div>

  <script>
    function getPreferredLang() {
      return localStorage.getItem("preferred_translate_lang") || "ckb"; // دێفۆڵت سۆرانی
    }

    function setPreferredLang(lang) {
      localStorage.setItem("preferred_translate_lang", lang);
    }

    function setGoogleCombo(lang) {
      var tries = 0;
      var interval = setInterval(function () {
        var combo = document.querySelector(".goog-te-combo");
        if (combo) {
          if (combo.value !== lang) {
            combo.value = lang;
            combo.dispatchEvent(new Event("change"));
          }
          clearInterval(interval);
        } else if (++tries > 200) {
          clearInterval(interval);
        }
      }, 50);
    }

    // زمانێکی دوایین بخوێنەوە و هەمیشە هەمان زمان بەرز بکەوە
    (function initPersistedLang() {
      var lang = getPreferredLang();
      window.addEventListener("DOMContentLoaded", function(){
        setGoogleCombo(lang);
      });
    })();

    // هەرکات کە select گووگڵ گۆڕدرا → localStorage نوێ بکە
    document.addEventListener("change", function(e){
      if (e.target && e.target.classList.contains("goog-te-combo")) {
        var lang = e.target.value || "ckb";
        setPreferredLang(lang);
      }
    });

    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'auto',
        includedLanguages: 'ckb,ku,en,ar,tr,fa',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
      }, 'google_translate_element');

      // دوای بارکردن هەمان زمان دانێ
      setGoogleCombo(getPreferredLang());
    }
  </script>
  <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
