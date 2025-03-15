<?php

//solution step 1 - to stop adware
// function sanitizeOutput($output) {
//     $output = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $output);  // Remove any <script> tags
//     $output = preg_replace('/on\w+="[^"]*"/', '', $output);   // Remove any onclick attributes
//     $output = preg_replace('/<div\s+style=(["\'])[^"\']*position:\s*fixed[^"\']*\1[^>]*>.*?<\/div>/is', '', $output); // Remove any fixed position divs 
    
//     return $output;
// }


// ob_start(); // Start output buffering

function injectAd() { // Simulating adware behavior
    $ad = "<div style='position:fixed; bottom:10px; right:10px; background-color:yellow; padding:10px; z-index:9999;'>";
    $ad .= "<h3>Congratulations!!!!🎉</h3>";
    $ad .= "<p>Click here to claim your prize!</p>";
    $ad .= "</div>";
    return $ad;
}

// Simulating a pop-up ad
$popupScript = "<script>
    setInterval(function() {
        alert(\"You've won a free iPhone! Click OK to claim!\");
    }, 30000);
</script>";
?>

<style>
    :host {
      --bright-blue: oklch(51.01% 0.274 263.83);
      --electric-violet: oklch(53.18% 0.28 296.97);
      --french-violet: oklch(47.66% 0.246 305.88);
      --vivid-pink: oklch(69.02% 0.277 332.77);
      --hot-red: oklch(61.42% 0.238 15.34);
      --orange-red: oklch(63.32% 0.24 31.68);
  
      --gray-900: oklch(19.37% 0.006 300.98);
      --gray-700: oklch(36.98% 0.014 302.71);
      --gray-400: oklch(70.9% 0.015 304.04);
  
      --red-to-pink-to-purple-vertical-gradient: linear-gradient(
        180deg,
        var(--orange-red) 0%,
        var(--vivid-pink) 50%,
        var(--electric-violet) 100%
      );
  
      --red-to-pink-to-purple-horizontal-gradient: linear-gradient(
        90deg,
        var(--orange-red) 0%,
        var(--vivid-pink) 50%,
        var(--electric-violet) 100%
      );
  
      --pill-accent: var(--bright-blue);
  
      font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji",
        "Segoe UI Symbol";
      box-sizing: border-box;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    .sequential-layout {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
  }
  
    h1 {
      font-size: 3.125rem;
      color: var(--gray-900);
      font-weight: 500;
      line-height: 100%;
      letter-spacing: -0.125rem;
      margin: 0;
      font-family: "Inter Tight", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji",
        "Segoe UI Symbol";
    }
  
    p {
      margin: 0;
      color: var(--gray-700);
    }
  
   
    .wicys-logo {
      max-width: 20.2rem;
    }
  
    .content {
      display: flex;
      justify-content: space-around;
      width: 100%;
      max-width: 700px;
      margin-bottom: 3rem;
    }
  
    .content h1 {
      margin-top: 1.75rem;
    }
  
    .content p {
      margin-top: 1.5rem;
    }
  
    .divider {
    height: 1px;
    width: 100%;
    background: var(--red-to-pink-to-purple-horizontal-gradient);
    margin: 1.5rem 0;
  }

  
  .pill-group {
        display: flex;
        flex-direction: row;
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 1.5rem;
    }

    .pill {
        display: flex;
        align-items: center;
        --pill-accent: var(--bright-blue);
        background: color-mix(in srgb, var(--pill-accent) 5%, transparent);
        color: var(--pill-accent);
        padding-inline: 0.75rem;
        padding-block: 0.375rem;
        border-radius: 2.75rem;
        border: 0;
        transition: background 0.3s ease;
        font-family: var(--inter-font);
        font-size: 0.875rem;
        font-style: normal;
        font-weight: 500;
        line-height: 1.4rem;
        letter-spacing: -0.00875rem;
        text-decoration: none;
    }

    .pill:hover {
        background: color-mix(in srgb, var(--pill-accent) 15%, transparent);
    }

    .pill-group .pill:nth-child(1) {
        --pill-accent: var(--bright-blue);
    }
    .pill-group .pill:nth-child(2) {
        --pill-accent: var(--french-violet);
    }
    .pill-group .pill:nth-child(3) {
        --pill-accent: var(--hot-red);
    }
  
   
    main {
    width: 100%;
    min-height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1rem;
    box-sizing: inherit;
    position: relative;
  }
    
  </style>
  <html>
    <head>
   <!-- Soultion step 2 - Implement Content Security Policy -->
   <!-- <meta http-equiv="Content-Security-Policy" 
          content="default-src 'self'; script-src 'self'; style-src 'self';"> -->
</head>
<body>
<main class="main">
<div class="content sequential-layout"  >
    <div class="left-side">
      <a href="https://wicys.org" target="_blank">
        <img src="wicysLogo.PNG" class="wicys-logo">
    </a>
      <h1>Congratulations on registering as a WiCyS Member!!</h1>
      <p>As a member of WiCyS, you have access to all the resources and opportunities provided by your network. From community groups to career fairs, scholarships to speaking opportunities, and much much more – check out all the benefits below and see what’s waiting for you!🎉</p>
    </div>
       
    <?php 
    echo injectAd(); 
    echo $popupScript;
    ?>

<?php
////Soultion step 3 - Uncomment to trigger santization
// $finalOutput = sanitizeOutput(ob_get_clean());// Get the buffered content and sanitize it
// echo $finalOutput;// Output the sanitized content
?>
</main>
</body>
</html>
