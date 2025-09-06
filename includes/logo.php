<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DR Cinema Logo - Tailwind</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black min-h-screen flex items-center justify-center">
  <!-- DR + SVG + CINEMA لە هەمان باری ئاسۆی -->
  <div class="block items-end justify-end gap-2" translate="no">
    <!-- DR + Clapper -->
    <span class="flex items-center gap-0">
      <span class="text-white font-extrabold leading-none text-2xl md:text-3xl lg:text-3xl">DR</span>

      <!-- Clapper icon -->
      <svg class="w-10 md:w-12  h-10 mt-1 bg-season-icon" viewBox="0 0 120 100" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <rect x="10" y="35" width="80" height="45" rx="6" ry="6" fill="currentColor" />
        <circle cx="30" cy="57" r="5" fill="#0b0b0b" />
        <circle cx="48" cy="57" r="5" fill="#0b0b0b" />
        <circle cx="68" cy="57" r="5" fill="#0b0b0b" />
        <g transform="translate(10,18) rotate(-12)">
          <rect x="0" y="0" width="80" height="18" rx="3" fill="currentColor" />
          <rect x="6" y="2" width="10" height="14" fill="#111827" />
          <rect x="26" y="2" width="10" height="14" fill="#111827" />
          <rect x="46" y="2" width="10" height="14" fill="#111827" />
          <rect x="66" y="2" width="10" height="14" fill="#111827" />
        </g>
      </svg>

    </span>

    <!-- CINEMA بۆ ئاسۆی لەگەڵی -->
    <div class="bg-season-icon -top-2 relative  font-bold text-lg md:text-1xl lg:text-1xl tracking-wider ">CINEMA</div>
  </div>
</body>

</html>