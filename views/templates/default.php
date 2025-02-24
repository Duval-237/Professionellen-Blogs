<?php

  // Recupere la premiere lettre de l'email, ou du pseudo
  function getFirstLetter() {
    if ( $_SESSION[ 'user' ][ 'pseudo' ] == '' OR substr( $_SESSION[ 'user' ][ 'pseudo' ], 0, 4 ) == 'User' ) 
     echo substr( $_SESSION[ 'user' ][ 'email' ], 0, 1 );
    else
     echo substr( $_SESSION[ 'user' ][ 'pseudo' ], 0, 1 );
  }

?>

<!DOCTYPE html>
<html lang="<?= $_SESSION[ 'language' ] ?>">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://technogan.com/uploads/website/technogan.ico" type="image/x-icon">
    <title><?= $title_page ?? 'Technogan' ?></title>
    <meta name="title" content="<?= $title_page ?? TITLE_HEADER ?>">
    <meta name="description" content="<?= $description_page ?? DESCRIPTION_HEADER ?>">
    <meta name="author" content="<?= $author_page ?? ''?>">
    <meta name="date" content="<?= $date_page ?? ''?>">
    <meta name="generator" content="Technogan 1.0" >
    <meta name="theme-color" content="#007fff" >
    <meta property="og:type" content="article">
    <meta property="og:image" content="http://technogan.com/uploads/articles/<?= $img_page ?? '' ?>">
    <meta property="og:title" content="<?= $title_page ?? TITLE_HEADER ?>">
    <meta property="og:description" content="<?= $description_page ?? DESCRIPTION_HEADER ?>">
    <meta property="og:url" content="http://<?= $url_page ?? $_SERVER[ 'HTTP_HOST' ] ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Technogan1">
    <meta name="twitter:creator" content="@Technogan1">
    <meta name="twitter:image" content="http://technogan.com/uploads/articles/<?= $img_page ?? '' ?>">
    <meta name="twitter:title" content="<?= $title_page ?? TITLE_HEADER ?>">
    <meta name="twitter:description" content="<?= $description_page ?? DESCRIPTION_HEADER ?>">
    <meta name="twitter:url" content="http://technogan.com/">
    <link rel="alternate" hreflang="fr" href="http://technogan.com/<?= $slug_fr ?? '' ?>">
    <link rel="alternate" hreflang="en" href="http://en.technogan.com/<?= $slug_en ?? '' ?>">
    <link rel="alternate" hreflang="de" href="http://de.technogan.com/<?= $slug_de ?? '' ?>">
    <link rel="alternate" hreflang="es" href="http://es.technogan.com/<?= $slug_es ?? '' ?>">
    <link rel="alternate" hreflang="zh" href="http://zh.technogan.com/<?= $slug_zh ?? '' ?>">
    <!-- [if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif] -->
    <link rel="stylesheet" href="/views/templates/css/style.css">
    <link rel="stylesheet" href="/views/templates/css/default.css">
    <link rel="stylesheet" href="/<?= $file_css ?? '' ?>">
    <?= @$file_css2 ?>
  </head>
  <body role="document" class="<?= @$_SESSION[ 'theme' ] ?>">
    <div id="container-search">
      <form action="/technoganTo">
        <span class="btn-back">
          <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"/></svg>
        </span>
        <input type="search" name="search" class="search-input" value="<?= $search ?? '' ?>" placeholder="<?= WORD_SEARCH ?>..." autocomplete="off" required>
        <div class="btn-reset">
          <svg viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
        </div>
      </form>
      <ul class="text-search-mobile">
        <!--
        <li>
          <a href="/technoganTo?search=comment">
            <span class="svg">
                  <svg viewBox="0 0 254.77 263.68"><defs><style>.cls-search-1,.cls-search-2{fill:none;stroke-width:25px;}.cls-search-1{stroke-miterlimit:10;}.cls-search-2{stroke-linejoin:round;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-search-1" cx="108.26" cy="108.26" r="95.76"></circle><path class="cls-search-2" d="M176.45,175.73l65.82,75.45Z"></path></g></g></svg>
            </span>
            <span>comment jouer au paintball</span>
            <span class="svg">
              <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"></path></svg>
            </span>
          </a>
        </li>
        <li>
          <a href="/technoganTo?search=comment">
            <span class="svg">
                  <svg viewBox="0 0 254.77 263.68"><defs><style>.cls-search-1,.cls-search-2{fill:none;stroke-width:25px;}.cls-search-1{stroke-miterlimit:10;}.cls-search-2{stroke-linejoin:round;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-search-1" cx="108.26" cy="108.26" r="95.76"></circle><path class="cls-search-2" d="M176.45,175.73l65.82,75.45Z"></path></g></g></svg>
            </span>
            <span>comment debloquer la monetisation tiktok</span>
            <span class="svg">
              <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"></path></svg>
            </span>
          </a>
        </li>
        <li>
          <a href="/technoganTo?search=comment">
            <span class="svg">
              <svg viewBox="0 0 254.77 263.68"><defs><style>.cls-search-1,.cls-search-2{fill:none;stroke-width:25px;}.cls-search-1{stroke-miterlimit:10;}.cls-search-2{stroke-linejoin:round;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-search-1" cx="108.26" cy="108.26" r="95.76"></circle><path class="cls-search-2" d="M176.45,175.73l65.82,75.45Z"></path></g></g></svg>
            </span>
            <span>comment devenir riche</span>
            <span class="svg">
              <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"></path></svg>
            </span>
          </a>
        </li>
        -->
      </ul>
    </div>

    <header class="container-header">
      <div class="width-page header">

        <button type="button" class="btn-menu-mobile" title="menu">
          <span></span><span></span><span></span>
        </button>

        <a href="/" class="brand" title="Technogan">
          <svg data-name="Calque 1"  viewBox="0 0 1597.67 193.82"><defs><style>.cls-2{fill:#007fff;}</style></defs><path class="cls-1" d="M1800.33,903.09v193.82h-60.42l-85.24-113.45v113.45h-99.31l-43-85.79L1469,1096.91H1283.59a60.27,60.27,0,0,1-60.42-60.43V963.8a60.33,60.33,0,0,1,60.42-60.71h115.72v48.46h-111a25,25,0,0,0-12.4,6.83,20.16,20.16,0,0,0-4.56,12.83v57.58a19.77,19.77,0,0,0,19.66,20h77.53v-24.53h-51.31V976.05h99.49v117.69L1484.85,958l-5-11.46-21.73-43.46H1512l.3.28,26.79,53.87,67.4,134.27V903.09h48.16v.28l97.49,129.41V903.09Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M536.64,1096.91h-142A60.52,60.52,0,0,1,334,1036.48V976.05H458.05v48.17H382.42c-.52,2.2,0,6.56,0,6.56a19.82,19.82,0,0,0,19.66,18h90.74v-.3S501.63,1092.41,536.64,1096.91Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M537.6,903.09c-35,4.5-43.81,48.45-43.81,48.45H306.14v145.37H258V951.54H202.67V903.09Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M548,971.21v57.58a19.84,19.84,0,0,0,20,20H676.24v48.16h-116a60.46,60.46,0,0,1-60.43-60.43V963.8a60.52,60.52,0,0,1,60.43-60.71h116v48.45H569.53c-9.29.54-16.71,6.84-16.71,6.84A18.9,18.9,0,0,0,548,971.21Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M1083.32,1096.91H963.55l-85.2-113.44v113.44H830.17v-72.69H733v72.69H684.51V903.09H733v73h97.2v-73h48.16v.28h0l97.45,129.4V903.09h107.52A60.44,60.44,0,0,0,1024,952.34v95.51A60.46,60.46,0,0,0,1083.32,1096.91Z" transform="translate(-202.67 -903.09)"/><path class="cls-2" d="M1168.56,971.21v57.58a19.84,19.84,0,0,1-20,20H1091a20,20,0,0,1-20-20V971.21a20.4,20.4,0,0,1,4.84-12.83s9.68-6.39,18.34-6.84h54.35A19.78,19.78,0,0,1,1168.56,971.21Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M1213.73,960.61c0,.51,0,1,0,1.38a60.5,60.5,0,0,0-60.4-58.9h96.55C1217.79,919.8,1214.07,950.65,1213.73,960.61Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M1249.84,1096.91h-96.55a60.45,60.45,0,0,0,60.44-60.43C1215.19,1089.62,1249.84,1096.91,1249.84,1096.91Z" transform="translate(-202.67 -903.09)"/></svg>
        </a>

        <button type="button" class="btn-search" title="search">
          <span class="svg-search">
            <svg viewBox="0 0 512 512"><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
          </span>
        </button>
        
        <form action="/technoganTo" class="header-search" method="GET">
          <input type="text" name="search" class="search-input" value="<?= $search ?? '' ?>" placeholder="<?= WORD_SEARCH ?>..." autocomplete="off" required>
          <button type="submit" title="search">
            <svg viewBox="0 0 254.77 263.68">
              <defs><style>.cls-search-1,.cls-search-2{fill:none;stroke-width:25px;}.cls-search-1{stroke-miterlimit:10;}.cls-search-2{stroke-linejoin:round;}</style></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><circle class="cls-search-1" cx="108.26" cy="108.26" r="95.76"></circle><path class="cls-search-2" d="M176.45,175.73l65.82,75.45Z"></path></g></g>
            </svg>
          </button>
          <ul class="text-search">
          </ul>
        </form>
        
        <nav class="navbar">
          <ul>
            <li class="item scroll" style="--i:0;">
              <a href="/" title="<?= WORD_HOME ?>">
                <span>Home</span>
                <span>
                  <svg viewBox="0 0 576 512"><path d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"/></svg>
                </span>
              </a>
            </li>
            <li class="item scroll" style="--i:1;">
              <a href="" title="<?= WORD_RANDOM ?>" class="random">
                <span>Random</span>
                <span>
                  <svg viewBox="0 0 512 512"><path d="M424.1 287c-15.13-15.12-40.1-4.426-40.1 16.97V352H336L153.6 108.8C147.6 100.8 138.1 96 128 96H32C14.31 96 0 110.3 0 128s14.31 32 32 32h80l182.4 243.2C300.4 411.3 309.9 416 320 416h63.97v47.94c0 21.39 25.86 32.12 40.99 17l79.1-79.98c9.387-9.387 9.387-24.59 0-33.97L424.1 287zM336 160h47.97v48.03c0 21.39 25.87 32.09 40.1 16.97l79.1-79.98c9.387-9.391 9.385-24.59-.0013-33.97l-79.1-79.98c-15.13-15.12-40.99-4.391-40.99 17V96H320c-10.06 0-19.56 4.75-25.59 12.81L254 162.7L293.1 216L336 160zM112 352H32c-17.69 0-32 14.31-32 32s14.31 32 32 32h96c10.06 0 19.56-4.75 25.59-12.81l40.4-53.87L154 296L112 352z"/></svg>
                </span>
              </a>
            </li>
            <li class="item scroll" style="--i:2;">
              <a href="/<?= CATEGORY ?>" title="<?= WORD_CATEGORY ?>">
                <span>Categories</span>
                <span>
                  <svg viewBox="0 0 576 512"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg>
                </span>
              </a>
            </li>
            <li class="item scroll all-language" title="Language" style="--i:3">
              <span>Langue</span>
              <span>
                <svg viewBox="0 0 640 512" style="width: 25px;"><path d="M448 164C459 164 468 172.1 468 184V188H528C539 188 548 196.1 548 208C548 219 539 228 528 228H526L524.4 232.5C515.5 256.1 501.9 279.1 484.7 297.9C485.6 298.4 486.5 298.1 487.4 299.5L506.3 310.8C515.8 316.5 518.8 328.8 513.1 338.3C507.5 347.8 495.2 350.8 485.7 345.1L466.8 333.8C462.4 331.1 457.1 328.3 453.7 325.3C443.2 332.8 431.8 339.3 419.8 344.7L416.1 346.3C406 350.8 394.2 346.2 389.7 336.1C385.2 326 389.8 314.2 399.9 309.7L403.5 308.1C409.9 305.2 416.1 301.1 422 298.3L409.9 286.1C402 278.3 402 265.7 409.9 257.9C417.7 250 430.3 250 438.1 257.9L452.7 272.4L453.3 272.1C465.7 259.9 475.8 244.7 483.1 227.1H376C364.1 227.1 356 219 356 207.1C356 196.1 364.1 187.1 376 187.1H428V183.1C428 172.1 436.1 163.1 448 163.1L448 164zM160 233.2L179 276H140.1L160 233.2zM0 128C0 92.65 28.65 64 64 64H576C611.3 64 640 92.65 640 128V384C640 419.3 611.3 448 576 448H64C28.65 448 0 419.3 0 384V128zM320 384H576V128H320V384zM178.3 175.9C175.1 168.7 167.9 164 160 164C152.1 164 144.9 168.7 141.7 175.9L77.72 319.9C73.24 329.1 77.78 341.8 87.88 346.3C97.97 350.8 109.8 346.2 114.3 336.1L123.2 315.1H196.8L205.7 336.1C210.2 346.2 222 350.8 232.1 346.3C242.2 341.8 246.8 329.1 242.3 319.9L178.3 175.9z"/></svg>
              </span>
            </li>
            <?php if ( !isset( $_SESSION[ 'user' ] ) ): ?>
            <li class="item scroll connexion" title="Connexion" style="--i:4;">
              <span>Connexion</span>
              <span>
                <svg viewBox="0 0 512 512"><path d="M416 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c17.67 0 32 14.33 32 32v256c0 17.67-14.33 32-32 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c53.02 0 96-42.98 96-96V128C512 74.98 469 32 416 32zM342.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L242.8 224H32C14.31 224 0 238.3 0 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C355.1 266.1 355.1 245.9 342.6 233.4z"/></svg>
              </span>
            </li>
            <li class="item btn-theme">
              <span class="btn-dark-mode" title="Sombre">
                <svg viewBox="0 0 512 512"><path d="M32 256c0-123.8 100.3-224 223.8-224c11.36 0 29.7 1.668 40.9 3.746c9.616 1.777 11.75 14.63 3.279 19.44C245 86.5 211.2 144.6 211.2 207.8c0 109.7 99.71 193 208.3 172.3c9.561-1.805 16.28 9.324 10.11 16.95C387.9 448.6 324.8 480 255.8 480C132.1 480 32 379.6 32 256z"/></svg>
              </span>
              <span class="btn-light-mode" title="Clair">
                <svg viewBox="0 0 512 512"><path d="M256 159.1c-53.02 0-95.1 42.98-95.1 95.1S202.1 351.1 256 351.1s95.1-42.98 95.1-95.1S309 159.1 256 159.1zM509.3 347L446.1 255.1l63.15-91.01c6.332-9.125 1.104-21.74-9.826-23.72l-109-19.7l-19.7-109c-1.975-10.93-14.59-16.16-23.72-9.824L256 65.89L164.1 2.736c-9.125-6.332-21.74-1.107-23.72 9.824L121.6 121.6L12.56 141.3C1.633 143.2-3.596 155.9 2.736 164.1L65.89 256l-63.15 91.01c-6.332 9.125-1.105 21.74 9.824 23.72l109 19.7l19.7 109c1.975 10.93 14.59 16.16 23.72 9.824L256 446.1l91.01 63.15c9.127 6.334 21.75 1.107 23.72-9.822l19.7-109l109-19.7C510.4 368.8 515.6 356.1 509.3 347zM256 383.1c-70.69 0-127.1-57.31-127.1-127.1c0-70.69 57.31-127.1 127.1-127.1s127.1 57.3 127.1 127.1C383.1 326.7 326.7 383.1 256 383.1z"/></svg>
              </span>
            </li>
            <?php else: ?>
            <li class="item profil">
              <div class="img-profil" style="--clr:#<?=  $_SESSION[ 'user' ][ 'color' ] ?? '007fff' ?>">
                <?= getFirstLetter(); ?>
              </div>
              <ul class="menu-profil enabl">
                <li class="info">
                  <div class="bximg" style="--clr:#<?=  $_SESSION[ 'user' ][ 'color' ] ?? '007fff' ?>">
                    <?= getFirstLetter(); ?>
                  </div>
                  <span class="name"><?= $_SESSION[ 'user' ][ 'pseudo' ] ?></span>
                  <span class="email"><?=  $_SESSION[ 'user' ][ 'email' ] ?></span>
                </li>
                <li>
                  <a href="">
                    <span class="svg">
                      <svg viewBox="0 0 448 512"><path d="M272 304h-96C78.8 304 0 382.8 0 480c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32C448 382.8 369.2 304 272 304zM48.99 464C56.89 400.9 110.8 352 176 352h96c65.16 0 119.1 48.95 127 112H48.99zM224 256c70.69 0 128-57.31 128-128c0-70.69-57.31-128-128-128S96 57.31 96 128C96 198.7 153.3 256 224 256zM224 48c44.11 0 80 35.89 80 80c0 44.11-35.89 80-80 80S144 172.1 144 128C144 83.89 179.9 48 224 48z"/></svg>
                    </span>
                    <span class="text">Account</span>
                  </a>
                </li>
                <li>
                  <a href="/Collection">
                    <span class="svg">
                      <svg viewBox="0 0 384 512" style="width:11px"><path d="M336 0h-288C21.49 0 0 21.49 0 48v431.9c0 24.7 26.79 40.08 48.12 27.64L192 423.6l143.9 83.93C357.2 519.1 384 504.6 384 479.9V48C384 21.49 362.5 0 336 0zM336 452L192 368l-144 84V54C48 50.63 50.63 48 53.1 48h276C333.4 48 336 50.63 336 54V452z"></path></svg>
                    </span>
                    <span class="text">Collection</span>
                  </a>
                </li>
                <li class="btn-dark-mode">
                    <span class="svg">
                      <svg viewBox="0 0 512 512"><path d="M32 256c0-123.8 100.3-224 223.8-224c11.36 0 29.7 1.668 40.9 3.746c9.616 1.777 11.75 14.63 3.279 19.44C245 86.5 211.2 144.6 211.2 207.8c0 109.7 99.71 193 208.3 172.3c9.561-1.805 16.28 9.324 10.11 16.95C387.9 448.6 324.8 480 255.8 480C132.1 480 32 379.6 32 256z"></path></svg>
                    </span>
                    <span class="text">Dark Mode</span>
                </li>
                <li class="btn-light-mode">
                    <span class="svg">
                      <svg viewBox="0 0 512 512"><path d="M256 159.1c-53.02 0-95.1 42.98-95.1 95.1S202.1 351.1 256 351.1s95.1-42.98 95.1-95.1S309 159.1 256 159.1zM509.3 347L446.1 255.1l63.15-91.01c6.332-9.125 1.104-21.74-9.826-23.72l-109-19.7l-19.7-109c-1.975-10.93-14.59-16.16-23.72-9.824L256 65.89L164.1 2.736c-9.125-6.332-21.74-1.107-23.72 9.824L121.6 121.6L12.56 141.3C1.633 143.2-3.596 155.9 2.736 164.1L65.89 256l-63.15 91.01c-6.332 9.125-1.105 21.74 9.824 23.72l109 19.7l19.7 109c1.975 10.93 14.59 16.16 23.72 9.824L256 446.1l91.01 63.15c9.127 6.334 21.75 1.107 23.72-9.822l19.7-109l109-19.7C510.4 368.8 515.6 356.1 509.3 347zM256 383.1c-70.69 0-127.1-57.31-127.1-127.1c0-70.69 57.31-127.1 127.1-127.1s127.1 57.3 127.1 127.1C383.1 326.7 326.7 383.1 256 383.1z"></path></svg>
                    </span>
                    <span class="text">Light Mode</span>
                </li>
                <li class="sign-out">
                  <a href="">  
                    <span class="svg">
                      <svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg>
                    </span>
                    <span class="text">Deconnexion</span>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>
            
          </ul>
        </nav>
      </div>

      <nav class="mini-menu">
        <ul class="navigation">
          <li class="item"><a href="/" title="<?= WORD_HOME ?>">
            <svg viewBox="0 0 576 512"><path d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"></path></svg></a>
          </li>»
          <li class="item"><a href="/<?= CATEGORY ?>"><?= CATEGORY ?></a></li>»
          <li class="item"><a href="/<?= CATEGORY ?>/<?= @$articles->category ?>"><?= @$articles->category ?></a></li>»
          <li class="item"><a href="/<?= CATEGORY ?>/<?= @$articles->category ?>/<?= @$articles->tags ?>"><?= @$articles->tags ?></a></li>»
          <li class="item"><a href="/<?= @$articles->slug ?? '' ?>"><?= @$articles->title ?></a></li>
        </ul>
      </nav>
      
    </header>

    <main role="main">
      <?= $content ?? '' ?>
    </main>

    <footer class="container-footer">
      <div class="width-page footer">
        <nav class="navbar footer-top">
        </nav>
        <div class="footer-middle">
          <div class="box-footer-middle Support">
            <h2 class="title-footer-middle">
              <span>Support</span>
              <span class="svg-down-footer">
                <svg viewBox="0 0 384 512"><path d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z"/></svg>
              </span>
            </h2>
            <ul>
              <li><a href="">~ Auteur</a></li>
              <li><a href="">~ Condition d'utilisation</a></li>
              <li><a href="">~ A propos</a></li>
              <li><a href="">~ Politique de confidentialite</a></li>
              <li><a href="">~ Services</a></li>
              <li><a href="">~ Contact</a></li>
            </ul>
          </div>
          <div class="box-footer-middle Contact Us">
            <h2 class="title-footer-middle">
              <span>Categories</span>
              <span class="svg-down-footer"><svg viewBox="0 0 384 512"><path d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z"/></svg></span>
            </h2>
            <ul>
              <?php
                $categoryModels = new \Core\Models\Category();
                $categories = $categoryModels->findAllCategory();
                foreach( $categories as $category ):
              ?>
              <li><a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $category->name ) ?>" title="<?= $category->name ?>">~ <?= $category->name ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="box-footer-middle social-media">
            <h2>Reseau sociaux</h2>
            <ul>
              <li class="item facebook" style="--clr:#1877f2;">
                <a href="" title="Facebook">
                  <svg viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
                </a>
              </li>
              <li class="item whatsapp" style="--clr:#00c200;">
                <a href="" title="Whatsapp">
                  <svg viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                </a>
              </li>
              <li class="item twitter" style="--clr:#000;">
                <a href="" title="X">
                  <svg viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                </a>
              </li>
              <li class="item instagram" style="--clr:linear-gradient(30deg,#f38334,#da2e7d 50%,#6b54c6);">
                <a href="" title="Instagram">
                  <svg viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                </a>
              </li>
              <li class="item linkedin" style="--clr:#0a66c2;">
                <a href="" title="Linkedin">
                  <svg viewBox="0 0 448 512"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                </a>
              </li>
            </ul>
            <?php if ( !isset( $_SESSION[ 'user' ] ) ): ?>
            <div class="footer-connexion">
              <p>Obtener un access exclusive</p>
              <button type="button" title="Connexion" class="connexion">Connexion</button>
            </div>   
            <?php endif; ?>         
          </div>
          <div class="box-footer-middle newsletter">
            <h2>Newsletter</h2>
            <div>
              
              <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 522 521.1"><defs><style>.m-1{fill:#0d4370;}.m-1,.m-2{stroke:#0d4370;stroke-miterlimit:10;stroke-width:10px;}.m-2,.m-4{fill:#fff;}.m-3{fill:#007fff;}</style></defs><path class="m-1" d="M-1924.25,2169.3h-165c3.12-2.25,5.87-4.25,9.12-6.5,16.8-12.37,50.2-41.87,73.4-41.5,23.3-.37,56.6,29.13,73.38,41.48C-1930.16,2165.09-1927.41,2167.09-1924.25,2169.3Z" transform="translate(2267.79 -2116.3)"/><path class="m-1" d="M-2214.79,2260.48v106l-48-34.68v-10.64a47.75,47.75,0,0,1,18.38-37.8C-2235.54,2276.36-2227.16,2269.86-2214.79,2260.48Z" transform="translate(2267.79 -2116.3)"/><path class="m-1" d="M-1750.79,2321.16v10.53l-48,34.68V2260.46c12.4,9.4,20.8,15.9,29.6,22.9A47.58,47.58,0,0,1-1750.79,2321.16Z" transform="translate(2267.79 -2116.3)"/><path class="m-2" d="M-1750.79,2331.69V2585.3c0,25.6-21.5,47.1-48,47.1h-416a48,48,0,0,1-48-48V2331.78l48,34.68,1.69,1.23,46.31,33.46,128.93,81.15a58.32,58.32,0,0,0,62.13,0l128.94-81.19,48-34.69Z" transform="translate(2267.79 -2116.3)"/><path class="m-3" d="M-1846.79,2223.36v184.7l-128.94,81.24a58.32,58.32,0,0,1-62.13,0l-128.93-81.11V2223.36Z" transform="translate(2267.79 -2116.3)"/><path d="M-1798.79,2223.3v150l-48,34.69V2223.36h-320v184.79l-46.31-33.46-1.69-1.23v-150.1a48,48,0,0,1,48-48h320A48,48,0,0,1-1798.79,2223.3Z" transform="translate(2267.79 -2116.3)"/><polygon class="m-4" points="335.29 180.5 335.29 204.69 228.51 204.69 228.51 277.27 204.46 277.27 204.46 204.69 176.85 204.69 176.85 180.5 335.29 180.5"/><path class="m-4" d="M-1995.31,2369.52h62.76v24H-1999a30.21,30.21,0,0,1-30.31-30.16v-30.17h79.41v24.05h-55.22a13.42,13.42,0,0,0,0,3.27A9.9,9.9,0,0,0-1995.31,2369.52Z" transform="translate(2267.79 -2116.3)"/></svg>
              <span>Abonnez-vous a la <br> newsletter de Technogan !</span>
            </div>
            <form action="#">
              <input type="text" name="" placeholder="Numero Whatsapp">
              <button type="submit" role="button" aria-label="envoyer" title="envoyer">
                <svg viewBox="0 0 512 512"><path d="M511.6 36.86l-64 415.1c-1.5 9.734-7.375 18.22-15.97 23.05c-4.844 2.719-10.27 4.097-15.68 4.097c-4.188 0-8.319-.8154-12.29-2.472l-122.6-51.1l-50.86 76.29C226.3 508.5 219.8 512 212.8 512C201.3 512 192 502.7 192 491.2v-96.18c0-7.115 2.372-14.03 6.742-19.64L416 96l-293.7 264.3L19.69 317.5C8.438 312.8 .8125 302.2 .0625 289.1s5.469-23.72 16.06-29.77l448-255.1c10.69-6.109 23.88-5.547 34 1.406S513.5 24.72 511.6 36.86z"></path></svg>
              </button>
            </form>
            <p>Rester a jour sur les dernieres posts</p>
          </div>
        </div>
        <div class="footer-bottom">
          <svg viewBox="0 0 1597.67 193.82"><defs></defs><path d="M1800.33,903.09v193.82h-60.42l-85.24-113.45v113.45h-99.31l-43-85.79L1469,1096.91H1283.59a60.27,60.27,0,0,1-60.42-60.43V963.8a60.33,60.33,0,0,1,60.42-60.71h115.72v48.46h-111a25,25,0,0,0-12.4,6.83,20.16,20.16,0,0,0-4.56,12.83v57.58a19.77,19.77,0,0,0,19.66,20h77.53v-24.53h-51.31V976.05h99.49v117.69L1484.85,958l-5-11.46-21.73-43.46H1512l.3.28,26.79,53.87,67.4,134.27V903.09h48.16v.28l97.49,129.41V903.09Z" transform="translate(-202.67 -903.09)"/><path d="M536.64,1096.91h-142A60.52,60.52,0,0,1,334,1036.48V976.05H458.05v48.17H382.42c-.52,2.2,0,6.56,0,6.56a19.82,19.82,0,0,0,19.66,18h90.74v-.3S501.63,1092.41,536.64,1096.91Z" transform="translate(-202.67 -903.09)"/><path d="M537.6,903.09c-35,4.5-43.81,48.45-43.81,48.45H306.14v145.37H258V951.54H202.67V903.09Z" transform="translate(-202.67 -903.09)"/><path d="M548,971.21v57.58a19.84,19.84,0,0,0,20,20H676.24v48.16h-116a60.46,60.46,0,0,1-60.43-60.43V963.8a60.52,60.52,0,0,1,60.43-60.71h116v48.45H569.53c-9.29.54-16.71,6.84-16.71,6.84A18.9,18.9,0,0,0,548,971.21Z" transform="translate(-202.67 -903.09)"/><path d="M1083.32,1096.91H963.55l-85.2-113.44v113.44H830.17v-72.69H733v72.69H684.51V903.09H733v73h97.2v-73h48.16v.28h0l97.45,129.4V903.09h107.52A60.44,60.44,0,0,0,1024,952.34v95.51A60.46,60.46,0,0,0,1083.32,1096.91Z" transform="translate(-202.67 -903.09)"/><path d="M1168.56,971.21v57.58a19.84,19.84,0,0,1-20,20H1091a20,20,0,0,1-20-20V971.21a20.4,20.4,0,0,1,4.84-12.83s9.68-6.39,18.34-6.84h54.35A19.78,19.78,0,0,1,1168.56,971.21Z" transform="translate(-202.67 -903.09)"/><path d="M1213.73,960.61c0,.51,0,1,0,1.38a60.5,60.5,0,0,0-60.4-58.9h96.55C1217.79,919.8,1214.07,950.65,1213.73,960.61Z" transform="translate(-202.67 -903.09)"/><path d="M1249.84,1096.91h-96.55a60.45,60.45,0,0,0,60.44-60.43C1215.19,1089.62,1249.84,1096.91,1249.84,1096.91Z" transform="translate(-202.67 -903.09)"/></svg>
          <p>Copyright © 2025-2026 Tout droits réservés</p>
          <div class="btn-language all-language">
            <span>
              <svg viewBox="0 0 640 512" style="width: 25px;"><path d="M448 164C459 164 468 172.1 468 184V188H528C539 188 548 196.1 548 208C548 219 539 228 528 228H526L524.4 232.5C515.5 256.1 501.9 279.1 484.7 297.9C485.6 298.4 486.5 298.1 487.4 299.5L506.3 310.8C515.8 316.5 518.8 328.8 513.1 338.3C507.5 347.8 495.2 350.8 485.7 345.1L466.8 333.8C462.4 331.1 457.1 328.3 453.7 325.3C443.2 332.8 431.8 339.3 419.8 344.7L416.1 346.3C406 350.8 394.2 346.2 389.7 336.1C385.2 326 389.8 314.2 399.9 309.7L403.5 308.1C409.9 305.2 416.1 301.1 422 298.3L409.9 286.1C402 278.3 402 265.7 409.9 257.9C417.7 250 430.3 250 438.1 257.9L452.7 272.4L453.3 272.1C465.7 259.9 475.8 244.7 483.1 227.1H376C364.1 227.1 356 219 356 207.1C356 196.1 364.1 187.1 376 187.1H428V183.1C428 172.1 436.1 163.1 448 163.1L448 164zM160 233.2L179 276H140.1L160 233.2zM0 128C0 92.65 28.65 64 64 64H576C611.3 64 640 92.65 640 128V384C640 419.3 611.3 448 576 448H64C28.65 448 0 419.3 0 384V128zM320 384H576V128H320V384zM178.3 175.9C175.1 168.7 167.9 164 160 164C152.1 164 144.9 168.7 141.7 175.9L77.72 319.9C73.24 329.1 77.78 341.8 87.88 346.3C97.97 350.8 109.8 346.2 114.3 336.1L123.2 315.1H196.8L205.7 336.1C210.2 346.2 222 350.8 232.1 346.3C242.2 341.8 246.8 329.1 242.3 319.9L178.3 175.9z"></path></svg>
            </span>
            <span>Francais</span>
          </div>
        </div>
        <div class="projet">
          <span>Projets de l'entreprise Blue firma :</span>
          <a href="#">Technogan</a>
          <a href="#">Malicc</a>
        </div>
      </div>
    </footer>

    <div id="menu-mobile" class="">
      <nav role="navigation" class="navbar-mobile">
        <div class="navbar-mobile-top">
          <div class="menu">
            <div class="carre4">
              <span></span><span></span>
              <span></span><span></span>
            </div>
            <span>Menu</span>
          </div>
          <div class="navbar-mobile-close">
            <span></span><span></span>
          </div>
        </div>
        <ul class="navbar-mobile-mittle">
        <?php if ( isset( $_SESSION[ 'user' ] ) ): ?>
          <li class="item profil">
            <div class="bximg" style="--clr:#<?=  $_SESSION[ 'user' ][ 'color' ] ?? '007fff' ?>">
              <?php
                echo $_SESSION[ 'user' ][ 'pseudo' ] == '' ?
                  substr( $_SESSION[ 'user' ][ 'email' ], 0, 1 ) : 
                    substr( $_SESSION[ 'user' ][ 'pseudo' ], 0, 1 ); ?>
            </div>
            <div class="info">
              <span class="name"><?= 'User' . $_SESSION[ 'user' ][ 'id' ] ?></span>
              <span class="email"><?=  $_SESSION[ 'user' ][ 'email' ] ?></span>
            </div>
          </li>
          <li class="item">
            <a href="">
              <span class="navbar-mobile-svg">
                <svg viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
              </span>
              <span class="navbar-mobile-text">Account</span>
            </a>
          </li>
          <li class="item">
            <a href="/Collection">
              <span class="navbar-mobile-svg">
                <svg viewBox="0 0 384 511.95" style="width:11px" ><defs></defs><path d="M-2.76-645.79v431.9c0,24.7-26.8,39.2-48.1,27.63l-143.9-83.93-143.88,83.94a32,32,0,0,1-48.12-27.64v-431.9a48,48,0,0,1,48-48h288A48,48,0,0,1-2.76-645.79Z" transform="translate(386.76 693.79)"></path></svg>
              </span>
              <span class="navbar-mobile-text">Collection</span>
            </a>
          </li>
          <li class="item btn-dark-mode border">
            <span class="navbar-mobile-svg"> 
              <svg viewBox="0 0 512 512"><path d="M32 256c0-123.8 100.3-224 223.8-224c11.36 0 29.7 1.668 40.9 3.746c9.616 1.777 11.75 14.63 3.279 19.44C245 86.5 211.2 144.6 211.2 207.8c0 109.7 99.71 193 208.3 172.3c9.561-1.805 16.28 9.324 10.11 16.95C387.9 448.6 324.8 480 255.8 480C132.1 480 32 379.6 32 256z"/></svg>
            </span>
            <span class="navbar-mobile-text">Dark Mode</span>
          </li> 
          <li class="item btn-light-mode border">
            <span class="navbar-mobile-svg">
              <svg viewBox="0 0 512 512"><path d="M256 159.1c-53.02 0-95.1 42.98-95.1 95.1S202.1 351.1 256 351.1s95.1-42.98 95.1-95.1S309 159.1 256 159.1zM509.3 347L446.1 255.1l63.15-91.01c6.332-9.125 1.104-21.74-9.826-23.72l-109-19.7l-19.7-109c-1.975-10.93-14.59-16.16-23.72-9.824L256 65.89L164.1 2.736c-9.125-6.332-21.74-1.107-23.72 9.824L121.6 121.6L12.56 141.3C1.633 143.2-3.596 155.9 2.736 164.1L65.89 256l-63.15 91.01c-6.332 9.125-1.105 21.74 9.824 23.72l109 19.7l19.7 109c1.975 10.93 14.59 16.16 23.72 9.824L256 446.1l91.01 63.15c9.127 6.334 21.75 1.107 23.72-9.822l19.7-109l109-19.7C510.4 368.8 515.6 356.1 509.3 347zM256 383.1c-70.69 0-127.1-57.31-127.1-127.1c0-70.69 57.31-127.1 127.1-127.1s127.1 57.3 127.1 127.1C383.1 326.7 326.7 383.1 256 383.1z"/></svg>
            </span>
            <span class="navbar-mobile-text">Light Mode</span>
          </li>
          <?php endif ?>
          <li class="item">
            <a href="/">
              <span class="navbar-mobile-svg">
                <svg viewBox="0 0 576 512"><path d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"/></svg>
              </span>
              <span class="navbar-mobile-text"><?= WORD_HOME ?></span>
              <div class="angle angle-right">
                <svg viewBox="0 0 384 512"><path d="M374.6 246.6C368.4 252.9 360.2 256 352 256s-16.38-3.125-22.62-9.375L224 141.3V448c0 17.69-14.33 31.1-31.1 31.1S160 465.7 160 448V141.3L54.63 246.6c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160C387.1 213.9 387.1 234.1 374.6 246.6z"></path></svg>
              </div>
            </a>
          </li>
          <li class="item">
            <a href="" class="random">
              <span class="navbar-mobile-svg">
                <svg viewBox="0 0 512 512"><path d="M424.1 287c-15.13-15.12-40.1-4.426-40.1 16.97V352H336L153.6 108.8C147.6 100.8 138.1 96 128 96H32C14.31 96 0 110.3 0 128s14.31 32 32 32h80l182.4 243.2C300.4 411.3 309.9 416 320 416h63.97v47.94c0 21.39 25.86 32.12 40.99 17l79.1-79.98c9.387-9.387 9.387-24.59 0-33.97L424.1 287zM336 160h47.97v48.03c0 21.39 25.87 32.09 40.1 16.97l79.1-79.98c9.387-9.391 9.385-24.59-.0013-33.97l-79.1-79.98c-15.13-15.12-40.99-4.391-40.99 17V96H320c-10.06 0-19.56 4.75-25.59 12.81L254 162.7L293.1 216L336 160zM112 352H32c-17.69 0-32 14.31-32 32s14.31 32 32 32h96c10.06 0 19.56-4.75 25.59-12.81l40.4-53.87L154 296L112 352z"/></svg>
              </span>
              <span class="navbar-mobile-text"><?= WORD_RANDOM ?></span>
              <div class="angle angle-right">
                <svg viewBox="0 0 384 512"><path d="M374.6 246.6C368.4 252.9 360.2 256 352 256s-16.38-3.125-22.62-9.375L224 141.3V448c0 17.69-14.33 31.1-31.1 31.1S160 465.7 160 448V141.3L54.63 246.6c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160C387.1 213.9 387.1 234.1 374.6 246.6z"></path></svg>
              </div>
            </a>
          </li>
          <li class="item">
            <a href="/<?= CATEGORY ?>">
              <span class="navbar-mobile-svg">
                <svg viewBox="0 0 576 512"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg>
              </span>
              <span class="navbar-mobile-text"><?= WORD_CATEGORY ?></span>
              <div class="angle angle-right">
                <svg viewBox="0 0 384 512"><path d="M374.6 246.6C368.4 252.9 360.2 256 352 256s-16.38-3.125-22.62-9.375L224 141.3V448c0 17.69-14.33 31.1-31.1 31.1S160 465.7 160 448V141.3L54.63 246.6c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160C387.1 213.9 387.1 234.1 374.6 246.6z"></path></svg>
              </div>
            </a>
          </li>
          <li class="item all-language">
            <span class="navbar-mobile-svg">
              <svg viewBox="0 0 640 512" style="width: 20px;"><path d="M448 164C459 164 468 172.1 468 184V188H528C539 188 548 196.1 548 208C548 219 539 228 528 228H526L524.4 232.5C515.5 256.1 501.9 279.1 484.7 297.9C485.6 298.4 486.5 298.1 487.4 299.5L506.3 310.8C515.8 316.5 518.8 328.8 513.1 338.3C507.5 347.8 495.2 350.8 485.7 345.1L466.8 333.8C462.4 331.1 457.1 328.3 453.7 325.3C443.2 332.8 431.8 339.3 419.8 344.7L416.1 346.3C406 350.8 394.2 346.2 389.7 336.1C385.2 326 389.8 314.2 399.9 309.7L403.5 308.1C409.9 305.2 416.1 301.1 422 298.3L409.9 286.1C402 278.3 402 265.7 409.9 257.9C417.7 250 430.3 250 438.1 257.9L452.7 272.4L453.3 272.1C465.7 259.9 475.8 244.7 483.1 227.1H376C364.1 227.1 356 219 356 207.1C356 196.1 364.1 187.1 376 187.1H428V183.1C428 172.1 436.1 163.1 448 163.1L448 164zM160 233.2L179 276H140.1L160 233.2zM0 128C0 92.65 28.65 64 64 64H576C611.3 64 640 92.65 640 128V384C640 419.3 611.3 448 576 448H64C28.65 448 0 419.3 0 384V128zM320 384H576V128H320V384zM178.3 175.9C175.1 168.7 167.9 164 160 164C152.1 164 144.9 168.7 141.7 175.9L77.72 319.9C73.24 329.1 77.78 341.8 87.88 346.3C97.97 350.8 109.8 346.2 114.3 336.1L123.2 315.1H196.8L205.7 336.1C210.2 346.2 222 350.8 232.1 346.3C242.2 341.8 246.8 329.1 242.3 319.9L178.3 175.9z"></path></svg>
            </span>
            <span class="navbar-mobile-text">Langue</span>
          </li>
          <!-- <li class="item">
            <a href="">
              <span class="navbar-mobile-svg">
                <svg viewBox="0 0 590.26 524.36"><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path d="M336.65,524.34h-10q-129.56,0-259.12,0C28.79,524.26,0,495.37,0,456.71q0-194.52,0-389C0,37.09,19.19,10.44,46.85,3.12a86.75,86.75,0,0,1,21.78-3Q197.08-.16,325.5,0c34.4,0,61.14,22.35,67,56.09a70.09,70.09,0,0,1,1,11.93c.07,43.73,0,87.45.13,131.18,0,3.33-1,4.63-4.13,5.68-56,18.37-95.44,54.55-116.33,109.84-9.61,25.41-12.53,52.05-10.09,79.19,4.73,52.68,29.35,94.26,70.69,126.5,1.07.83,2.11,1.68,3.16,2.52ZM196.44,163.88H307.76c1.62,0,3.25,0,4.86-.12,9-.58,14.79-6.39,15.27-15.31.5-9.18-4.66-15.67-13.69-17.1a40.72,40.72,0,0,0-6.33-.5q-111.31,0-222.64,0a38.33,38.33,0,0,0-6.33.51c-8.19,1.36-13.18,7.11-13.59,15.48a15.67,15.67,0,0,0,12.36,16.5,34.26,34.26,0,0,0,7.45.52Q140.79,163.9,196.44,163.88Zm-32.17,65.45H85.59c-1.38,0-2.75,0-4.12.09-12.51.84-19.28,11.48-14.76,23.14,2.6,6.7,8.33,9.82,18.08,9.82q78.68,0,157.37,0a49.5,49.5,0,0,0,7.09-.49c7.43-1.1,12.32-6.79,13.13-15.08a15.38,15.38,0,0,0-10.58-16.25,32.11,32.11,0,0,0-8.85-1.17C216.73,229.29,190.5,229.32,164.27,229.33Zm-33,131.44c16.11,0,32.22,0,48.32,0,8.35,0,14.13-4.08,16.31-11.18,3.58-11.63-3.89-21.8-16.28-21.85-21.6-.1-43.2,0-64.8,0-10.74,0-21.48-.12-32.22,0-12.09.17-19.23,9.21-16.6,20.75,1.8,7.93,7.74,12.23,17.32,12.28C99.27,360.83,115.25,360.78,131.23,360.77Z"/><path d="M442,524.33c-80.4.45-147.7-66.13-146.69-149.09A147.33,147.33,0,0,1,443.57,229.5c82.21.46,147.62,67.56,146.68,148.81C589.31,460.07,523.34,525.13,442,524.33Zm17.27-116.4h-.14c0-10.74.26-21.48-.08-32.2-.27-8.47-5.71-14.3-13.93-14.89a145.18,145.18,0,0,0-21,0c-8.52.62-13.85,6.88-14.15,15.55s4.72,15.3,12.93,16.64c2.52.41,3.31,1.26,3.3,3.76q-.15,21.35,0,42.69c0,2.33-.75,3.33-3.05,3.68-6.09.91-10.27,4.28-12.22,10.18-3.72,11.23,3.14,21.64,15.09,22.11,11.09.44,22.23.33,33.34,0,9.38-.26,15.43-6.18,16.16-15s-4.24-15.5-13.37-17.35c-2.32-.47-3-1.44-3-3.73C459.33,428.9,459.26,418.41,459.26,407.93ZM442.79,278.64a24.8,24.8,0,0,0-24.63,24.6c-.09,13.3,11.23,24.63,24.61,24.62a24.61,24.61,0,0,0,0-49.22Z"/></g></g></svg>
              </span>
              <span class="navbar-mobile-text">A propros</span>
              <div class="angle angle-right">
                <svg viewBox="0 0 384 512"><path d="M374.6 246.6C368.4 252.9 360.2 256 352 256s-16.38-3.125-22.62-9.375L224 141.3V448c0 17.69-14.33 31.1-31.1 31.1S160 465.7 160 448V141.3L54.63 246.6c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160C387.1 213.9 387.1 234.1 374.6 246.6z"></path></svg>
              </div>
            </a>
          </li> -->
          <?php if ( !isset( $_SESSION[ 'user' ] ) ): ?>
          <li class="item btn-dark-mode">
            <span class="navbar-mobile-svg"> 
              <svg viewBox="0 0 512 512"><path d="M32 256c0-123.8 100.3-224 223.8-224c11.36 0 29.7 1.668 40.9 3.746c9.616 1.777 11.75 14.63 3.279 19.44C245 86.5 211.2 144.6 211.2 207.8c0 109.7 99.71 193 208.3 172.3c9.561-1.805 16.28 9.324 10.11 16.95C387.9 448.6 324.8 480 255.8 480C132.1 480 32 379.6 32 256z"/></svg>
            </span>
            <span class="navbar-mobile-text">Dark Mode</span>
          </li> 
          <li class="item btn-light-mode">
            <span class="navbar-mobile-svg">
              <svg viewBox="0 0 512 512"><path d="M256 159.1c-53.02 0-95.1 42.98-95.1 95.1S202.1 351.1 256 351.1s95.1-42.98 95.1-95.1S309 159.1 256 159.1zM509.3 347L446.1 255.1l63.15-91.01c6.332-9.125 1.104-21.74-9.826-23.72l-109-19.7l-19.7-109c-1.975-10.93-14.59-16.16-23.72-9.824L256 65.89L164.1 2.736c-9.125-6.332-21.74-1.107-23.72 9.824L121.6 121.6L12.56 141.3C1.633 143.2-3.596 155.9 2.736 164.1L65.89 256l-63.15 91.01c-6.332 9.125-1.105 21.74 9.824 23.72l109 19.7l19.7 109c1.975 10.93 14.59 16.16 23.72 9.824L256 446.1l91.01 63.15c9.127 6.334 21.75 1.107 23.72-9.822l19.7-109l109-19.7C510.4 368.8 515.6 356.1 509.3 347zM256 383.1c-70.69 0-127.1-57.31-127.1-127.1c0-70.69 57.31-127.1 127.1-127.1s127.1 57.3 127.1 127.1C383.1 326.7 326.7 383.1 256 383.1z"/></svg>
            </span>
            <span class="navbar-mobile-text">Light Mode</span>
          </li>
          <li class="item connexion">
            <span class="navbar-mobile-svg">
              <svg viewBox="0 0 512 512"><path d="M416 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c17.67 0 32 14.33 32 32v256c0 17.67-14.33 32-32 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c53.02 0 96-42.98 96-96V128C512 74.98 469 32 416 32zM342.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L242.8 224H32C14.31 224 0 238.3 0 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C355.1 266.1 355.1 245.9 342.6 233.4z"/></svg>
            </span>
            <span class="navbar-mobile-text">Connexion</span>
          </li>
          <?php else: ?>
          <li class="item sign-out">
            <span class="navbar-mobile-svg">
              <svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg>
            </span>
            <span class="navbar-mobile-text">Deconnexion</span>
          </li>
          <?php endif ?>
        </ul>
      </nav>
    </div>

    <div id="auto-top">
      <svg viewBox="0 0 384 512"><path d="M374.6 246.6C368.4 252.9 360.2 256 352 256s-16.38-3.125-22.62-9.375L224 141.3V448c0 17.69-14.33 31.1-31.1 31.1S160 465.7 160 448V141.3L54.63 246.6c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160C387.1 213.9 387.1 234.1 374.6 246.6z"/></svg>
    </div>

    <div id="select-language">
      <div class="box-select">
        <div class="btn-close">
          <svg viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
        </div>
        <img src="/uploads/website/world_language.png" alt="">
        <ul class="languages">
          <?php
            $lang = $_SESSION[ 'language' ] ?? 'fr';
          ?>
          <li class="item <?= $lang == 'en' ? 'enable' : ''; ?>" data-lang="en">
            <a href="http://en.technogan.com/<?= $slug[ 'en' ] ?? '' ?>">
              <img src="/uploads/website/en.png" alt="">
              <span>English</span>
            </a>
          </li>
          <li class="item <?= $lang == 'de' ? 'enable' : ''; ?>" data-lang="de">
            <a href="http://de.technogan.com/<?= $slug[ 'de' ] ?? '' ?>">
              <img src="/uploads/website/de.png" alt="">
              <span>Deutsch</span>
            </a>
          </li>
          <li class="item <?= $lang == 'fr' ? 'enable' : ''; ?>" data-lang="fr">
            <a href="http://technogan.com/<?= $slug[ 'fr' ] ?? '' ?>">
              <img src="/uploads/website/fr.png" alt="">
              <span>Français</span>
            </a>
          </li>
          <li class="item <?= $lang == 'es' ? 'enable' : ''; ?>" data-lang="es">
            <a href="http://es.technogan.com/<?= $slug[ 'es' ] ?? '' ?>">
              <img src="/uploads/website/es.png" alt="">
              <span>Español</span>
            </a>
          </li>
          <li class="item <?= $lang == 'zh' ? 'enable' : ''; ?>" data-lang="zh">
            <a href="http://zh.technogan.com/<?= $slug[ 'zh' ] ?? '' ?>">
              <img src="/uploads/website/zh.png" alt="">
              <span>中国人</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <?php if ( !isset( $_SESSION[ 'user' ] ) ): ?>
    <div id="connexion" class="enable">
      <div class="container-connexion">
        <?php
          $article_random = new \Core\models\Article;
          $articles_random = $article_random->randomPost( 1 );
        ?>
        <a href="/<?= $articles_random[ 0 ]->slug ?>" class="content bx1" title="<?= $articles_random[ 0 ]->title ?>">
          <div class="logo">
            <svg data-name="Calque 1"  viewBox="0 0 1597.67 193.82"><defs><style>.cls-2{fill:#007fff;}</style></defs><path class="cls-1" d="M1800.33,903.09v193.82h-60.42l-85.24-113.45v113.45h-99.31l-43-85.79L1469,1096.91H1283.59a60.27,60.27,0,0,1-60.42-60.43V963.8a60.33,60.33,0,0,1,60.42-60.71h115.72v48.46h-111a25,25,0,0,0-12.4,6.83,20.16,20.16,0,0,0-4.56,12.83v57.58a19.77,19.77,0,0,0,19.66,20h77.53v-24.53h-51.31V976.05h99.49v117.69L1484.85,958l-5-11.46-21.73-43.46H1512l.3.28,26.79,53.87,67.4,134.27V903.09h48.16v.28l97.49,129.41V903.09Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M536.64,1096.91h-142A60.52,60.52,0,0,1,334,1036.48V976.05H458.05v48.17H382.42c-.52,2.2,0,6.56,0,6.56a19.82,19.82,0,0,0,19.66,18h90.74v-.3S501.63,1092.41,536.64,1096.91Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M537.6,903.09c-35,4.5-43.81,48.45-43.81,48.45H306.14v145.37H258V951.54H202.67V903.09Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M548,971.21v57.58a19.84,19.84,0,0,0,20,20H676.24v48.16h-116a60.46,60.46,0,0,1-60.43-60.43V963.8a60.52,60.52,0,0,1,60.43-60.71h116v48.45H569.53c-9.29.54-16.71,6.84-16.71,6.84A18.9,18.9,0,0,0,548,971.21Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M1083.32,1096.91H963.55l-85.2-113.44v113.44H830.17v-72.69H733v72.69H684.51V903.09H733v73h97.2v-73h48.16v.28h0l97.45,129.4V903.09h107.52A60.44,60.44,0,0,0,1024,952.34v95.51A60.46,60.46,0,0,0,1083.32,1096.91Z" transform="translate(-202.67 -903.09)"/><path class="cls-2" d="M1168.56,971.21v57.58a19.84,19.84,0,0,1-20,20H1091a20,20,0,0,1-20-20V971.21a20.4,20.4,0,0,1,4.84-12.83s9.68-6.39,18.34-6.84h54.35A19.78,19.78,0,0,1,1168.56,971.21Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M1213.73,960.61c0,.51,0,1,0,1.38a60.5,60.5,0,0,0-60.4-58.9h96.55C1217.79,919.8,1214.07,950.65,1213.73,960.61Z" transform="translate(-202.67 -903.09)"/><path class="cls-1" d="M1249.84,1096.91h-96.55a60.45,60.45,0,0,0,60.44-60.43C1215.19,1089.62,1249.84,1096.91,1249.84,1096.91Z" transform="translate(-202.67 -903.09)"/></svg>
          </div>
          <img src="http://technogan.com/uploads/articles/<?= $articles_random[ 0 ]->id ?>/<?= $articles_random[ 0 ]->img ?>" alt="">
          <div class="description-articles">
            <div class="title"> <?= $articles_random[ 0 ]->title ?> </div>
            <div class="author">
              <div class="bximg">
                <img src="/uploads/author/<?= $articles_random[ 0 ]->img_author ?>">
              </div>
              <div class="info-author">
                <div class="name"><?= $articles_random[ 0 ]->first_name ?> <?= $articles_random[ 0 ]->author_name ?></div>
                <div class="role"><?= $articles_random[ 0 ]->author_description ?></div>
              </div>
            </div>
          </div>
        </a>
        <div class="content bx2 login">
          <div class="head">
            <button type="button" class="return" title="Retour">
              <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"/></svg>
            </button>
            <div class="brand">
              <svg data-name="Calque 1" viewBox="0 0 1597.67 193.82"><defs><style>.cls-2{fill:#007fff;}</style></defs><path class="cls-1" d="M1800.33,903.09v193.82h-60.42l-85.24-113.45v113.45h-99.31l-43-85.79L1469,1096.91H1283.59a60.27,60.27,0,0,1-60.42-60.43V963.8a60.33,60.33,0,0,1,60.42-60.71h115.72v48.46h-111a25,25,0,0,0-12.4,6.83,20.16,20.16,0,0,0-4.56,12.83v57.58a19.77,19.77,0,0,0,19.66,20h77.53v-24.53h-51.31V976.05h99.49v117.69L1484.85,958l-5-11.46-21.73-43.46H1512l.3.28,26.79,53.87,67.4,134.27V903.09h48.16v.28l97.49,129.41V903.09Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M536.64,1096.91h-142A60.52,60.52,0,0,1,334,1036.48V976.05H458.05v48.17H382.42c-.52,2.2,0,6.56,0,6.56a19.82,19.82,0,0,0,19.66,18h90.74v-.3S501.63,1092.41,536.64,1096.91Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M537.6,903.09c-35,4.5-43.81,48.45-43.81,48.45H306.14v145.37H258V951.54H202.67V903.09Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M548,971.21v57.58a19.84,19.84,0,0,0,20,20H676.24v48.16h-116a60.46,60.46,0,0,1-60.43-60.43V963.8a60.52,60.52,0,0,1,60.43-60.71h116v48.45H569.53c-9.29.54-16.71,6.84-16.71,6.84A18.9,18.9,0,0,0,548,971.21Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1083.32,1096.91H963.55l-85.2-113.44v113.44H830.17v-72.69H733v72.69H684.51V903.09H733v73h97.2v-73h48.16v.28h0l97.45,129.4V903.09h107.52A60.44,60.44,0,0,0,1024,952.34v95.51A60.46,60.46,0,0,0,1083.32,1096.91Z" transform="translate(-202.67 -903.09)"></path><path class="cls-2" d="M1168.56,971.21v57.58a19.84,19.84,0,0,1-20,20H1091a20,20,0,0,1-20-20V971.21a20.4,20.4,0,0,1,4.84-12.83s9.68-6.39,18.34-6.84h54.35A19.78,19.78,0,0,1,1168.56,971.21Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1213.73,960.61c0,.51,0,1,0,1.38a60.5,60.5,0,0,0-60.4-58.9h96.55C1217.79,919.8,1214.07,950.65,1213.73,960.61Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1249.84,1096.91h-96.55a60.45,60.45,0,0,0,60.44-60.43C1215.19,1089.62,1249.84,1096.91,1249.84,1096.91Z" transform="translate(-202.67 -903.09)"></path></svg>
            </div>
            <button type="button" class="close" title="Fermer">
              <svg viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg>
            </button>
          </div>
          <div class="description">
            <h2>Welcome Back</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, consequatur!</p>
          </div>
          <div class="errorbx">
            <span class="svg"></span>
            <span class="text">Champs invalide</span>
          </div>
          <form id="formLogin">
            <div class="boxinput">
              <span class="svg">
                <svg viewBox="0 0 512 512"><path d="M0 128C0 92.65 28.65 64 64 64H448C483.3 64 512 92.65 512 128V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V128zM48 128V150.1L220.5 291.7C241.1 308.7 270.9 308.7 291.5 291.7L464 150.1V127.1C464 119.2 456.8 111.1 448 111.1H64C55.16 111.1 48 119.2 48 127.1L48 128zM48 212.2V384C48 392.8 55.16 400 64 400H448C456.8 400 464 392.8 464 384V212.2L322 328.8C283.6 360.3 228.4 360.3 189.1 328.8L48 212.2z"/></svg>
              </span>
              <div class="inputbx">
                <label for="email">Email Address</label>
                <input type="text" id="email-login" name="email" placeholder="youremail@example.com" required>
              </div>
            </div>
            <div class="boxinput">
              <span class="svg">
                <svg viewBox="0 0 448 512"><path d="M1518,452.92h-16v-48a144,144,0,0,0-288,0v48h-16a64,64,0,0,0-64,64v192a64,64,0,0,0,64,64h320a64.06,64.06,0,0,0,64-64v-192A64.06,64.06,0,0,0,1518,452.92Zm-240-48a80,80,0,0,1,160,0v48H1278Zm241.55,288.8a26.2,26.2,0,0,1-26.2,26.2h-270.7a26.2,26.2,0,0,1-26.19-26.2V532.12a26.2,26.2,0,0,1,26.19-26.2h270.7a26.2,26.2,0,0,1,26.2,26.2Z" transform="translate(-1133.99 -260.92)"/></svg>
              </span>
              <div class="inputbx">
                <label for="password">PASSWORD</label>
                <input type="password" id="password-login" name="password" placeholder="Enter your password" required>
              </div>
            </div>
            <button type="button" class="pssd-forget" title="forget password">Forget password</button>
            <div class="buttonbx">
              <input type="submit" class="btn-login" value="Login now">
              <button type="button" class="btn-create" title="create account">Create account</button>
            </div>
          </form>
          <div class="login-with">
            <span>Ou continuer avec</span>
            <ul>
              <li>
                <a href="#" title="Google">
                  <svg viewBox="0 0 488 512"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
                </a>
              </li>
              <li>
                <a href="#" title="Iphone">
                  <svg viewBox="0 0 384 512"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>
                </a>
              </li>
              <li>
                <a href="#" title="Facebook">
                  <svg viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="content bx2 sign-up">
          <div class="head">
            <button type="button" class="return" title="Retour">
              <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"/></svg>
            </button>
            <div class="brand">
              <svg data-name="Calque 1" viewBox="0 0 1597.67 193.82"><defs><style>.cls-2{fill:#007fff;}</style></defs><path class="cls-1" d="M1800.33,903.09v193.82h-60.42l-85.24-113.45v113.45h-99.31l-43-85.79L1469,1096.91H1283.59a60.27,60.27,0,0,1-60.42-60.43V963.8a60.33,60.33,0,0,1,60.42-60.71h115.72v48.46h-111a25,25,0,0,0-12.4,6.83,20.16,20.16,0,0,0-4.56,12.83v57.58a19.77,19.77,0,0,0,19.66,20h77.53v-24.53h-51.31V976.05h99.49v117.69L1484.85,958l-5-11.46-21.73-43.46H1512l.3.28,26.79,53.87,67.4,134.27V903.09h48.16v.28l97.49,129.41V903.09Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M536.64,1096.91h-142A60.52,60.52,0,0,1,334,1036.48V976.05H458.05v48.17H382.42c-.52,2.2,0,6.56,0,6.56a19.82,19.82,0,0,0,19.66,18h90.74v-.3S501.63,1092.41,536.64,1096.91Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M537.6,903.09c-35,4.5-43.81,48.45-43.81,48.45H306.14v145.37H258V951.54H202.67V903.09Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M548,971.21v57.58a19.84,19.84,0,0,0,20,20H676.24v48.16h-116a60.46,60.46,0,0,1-60.43-60.43V963.8a60.52,60.52,0,0,1,60.43-60.71h116v48.45H569.53c-9.29.54-16.71,6.84-16.71,6.84A18.9,18.9,0,0,0,548,971.21Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1083.32,1096.91H963.55l-85.2-113.44v113.44H830.17v-72.69H733v72.69H684.51V903.09H733v73h97.2v-73h48.16v.28h0l97.45,129.4V903.09h107.52A60.44,60.44,0,0,0,1024,952.34v95.51A60.46,60.46,0,0,0,1083.32,1096.91Z" transform="translate(-202.67 -903.09)"></path><path class="cls-2" d="M1168.56,971.21v57.58a19.84,19.84,0,0,1-20,20H1091a20,20,0,0,1-20-20V971.21a20.4,20.4,0,0,1,4.84-12.83s9.68-6.39,18.34-6.84h54.35A19.78,19.78,0,0,1,1168.56,971.21Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1213.73,960.61c0,.51,0,1,0,1.38a60.5,60.5,0,0,0-60.4-58.9h96.55C1217.79,919.8,1214.07,950.65,1213.73,960.61Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1249.84,1096.91h-96.55a60.45,60.45,0,0,0,60.44-60.43C1215.19,1089.62,1249.84,1096.91,1249.84,1096.91Z" transform="translate(-202.67 -903.09)"></path></svg>
            </div>
            <button type="button" class="close" title="Fermer">
              <svg viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg>
            </button>
          </div>
          <div class="description">
            <h2>Creation du compte</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, consequatur!</p>
          </div>
          <div class="errorbx">
            <span class="svg"></span>
            <span class="text">Champs invalide</span>
          </div>
          <form action="#">
            <div class="boxinput">
              <span class="svg">
                <svg viewBox="0 0 512 512"><path d="M0 128C0 92.65 28.65 64 64 64H448C483.3 64 512 92.65 512 128V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V128zM48 128V150.1L220.5 291.7C241.1 308.7 270.9 308.7 291.5 291.7L464 150.1V127.1C464 119.2 456.8 111.1 448 111.1H64C55.16 111.1 48 119.2 48 127.1L48 128zM48 212.2V384C48 392.8 55.16 400 64 400H448C456.8 400 464 392.8 464 384V212.2L322 328.8C283.6 360.3 228.4 360.3 189.1 328.8L48 212.2z"/></svg>
              </span>
              <div class="inputbx">
                <label for="email">Email Address</label>
                <input type="text" id="email-sign-in" placeholder="youremail@example.com" required>
              </div>
            </div>
            <div class="boxinput">
              <span class="svg">
                <svg viewBox="0 0 448 512"><path d="M1518,452.92h-16v-48a144,144,0,0,0-288,0v48h-16a64,64,0,0,0-64,64v192a64,64,0,0,0,64,64h320a64.06,64.06,0,0,0,64-64v-192A64.06,64.06,0,0,0,1518,452.92Zm-240-48a80,80,0,0,1,160,0v48H1278Zm241.55,288.8a26.2,26.2,0,0,1-26.2,26.2h-270.7a26.2,26.2,0,0,1-26.19-26.2V532.12a26.2,26.2,0,0,1,26.19-26.2h270.7a26.2,26.2,0,0,1,26.2,26.2Z" transform="translate(-1133.99 -260.92)"/></svg>
              </span>
              <div class="inputbx">
                <label for="password">PASSWORD</label>
                <input type="password" id="password-sign-in" placeholder="Enter your password" required>
              </div>
            </div>
            <div class="buttonbx">
              <input type="submit" class="btn-sign-in" value="Continuer">
            </div>
          </form>
          <div class="login-with">
            <span>Ou continuer avec</span>
            <ul>
              <li>
                <a href="#" title="Google">
                  <svg viewBox="0 0 488 512"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
                </a>
              </li>
              <li>
                <a href="#" title="Iphone">
                  <svg viewBox="0 0 384 512"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>
                </a>
              </li>
              <li>
                <a href="#" title="Facebook">
                  <svg viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="content bx2 reset-password">
          <div class="head">
            <button type="button" class="return" title="Retour">
              <svg viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"/></svg>
            </button>
            <div class="brand">
              <svg data-name="Calque 1" viewBox="0 0 1597.67 193.82"><defs><style>.cls-2{fill:#007fff;}</style></defs><path class="cls-1" d="M1800.33,903.09v193.82h-60.42l-85.24-113.45v113.45h-99.31l-43-85.79L1469,1096.91H1283.59a60.27,60.27,0,0,1-60.42-60.43V963.8a60.33,60.33,0,0,1,60.42-60.71h115.72v48.46h-111a25,25,0,0,0-12.4,6.83,20.16,20.16,0,0,0-4.56,12.83v57.58a19.77,19.77,0,0,0,19.66,20h77.53v-24.53h-51.31V976.05h99.49v117.69L1484.85,958l-5-11.46-21.73-43.46H1512l.3.28,26.79,53.87,67.4,134.27V903.09h48.16v.28l97.49,129.41V903.09Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M536.64,1096.91h-142A60.52,60.52,0,0,1,334,1036.48V976.05H458.05v48.17H382.42c-.52,2.2,0,6.56,0,6.56a19.82,19.82,0,0,0,19.66,18h90.74v-.3S501.63,1092.41,536.64,1096.91Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M537.6,903.09c-35,4.5-43.81,48.45-43.81,48.45H306.14v145.37H258V951.54H202.67V903.09Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M548,971.21v57.58a19.84,19.84,0,0,0,20,20H676.24v48.16h-116a60.46,60.46,0,0,1-60.43-60.43V963.8a60.52,60.52,0,0,1,60.43-60.71h116v48.45H569.53c-9.29.54-16.71,6.84-16.71,6.84A18.9,18.9,0,0,0,548,971.21Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1083.32,1096.91H963.55l-85.2-113.44v113.44H830.17v-72.69H733v72.69H684.51V903.09H733v73h97.2v-73h48.16v.28h0l97.45,129.4V903.09h107.52A60.44,60.44,0,0,0,1024,952.34v95.51A60.46,60.46,0,0,0,1083.32,1096.91Z" transform="translate(-202.67 -903.09)"></path><path class="cls-2" d="M1168.56,971.21v57.58a19.84,19.84,0,0,1-20,20H1091a20,20,0,0,1-20-20V971.21a20.4,20.4,0,0,1,4.84-12.83s9.68-6.39,18.34-6.84h54.35A19.78,19.78,0,0,1,1168.56,971.21Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1213.73,960.61c0,.51,0,1,0,1.38a60.5,60.5,0,0,0-60.4-58.9h96.55C1217.79,919.8,1214.07,950.65,1213.73,960.61Z" transform="translate(-202.67 -903.09)"></path><path class="cls-1" d="M1249.84,1096.91h-96.55a60.45,60.45,0,0,0,60.44-60.43C1215.19,1089.62,1249.84,1096.91,1249.84,1096.91Z" transform="translate(-202.67 -903.09)"></path></svg>
            </div>
            <button type="button" class="close" title="Fermer">
              <svg viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg>
            </button>
          </div>
          <div class="description">
            <h2>Réinitialisez le Mot de Passe</h2>
            <p>Veuillez saisir votre adresse e-mail afin de recevoir un lien pour renitialiser votre mot de passe</p>
          </div>
          <div class="errorbx">
            <span class="svg"></span>
            <span class="text">Adresse Email invalide</span>
          </div>
          <form action="#">
            <div class="boxinput">
              <span class="svg">
                <svg viewBox="0 0 512 512"><path d="M0 128C0 92.65 28.65 64 64 64H448C483.3 64 512 92.65 512 128V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V128zM48 128V150.1L220.5 291.7C241.1 308.7 270.9 308.7 291.5 291.7L464 150.1V127.1C464 119.2 456.8 111.1 448 111.1H64C55.16 111.1 48 119.2 48 127.1L48 128zM48 212.2V384C48 392.8 55.16 400 64 400H448C456.8 400 464 392.8 464 384V212.2L322 328.8C283.6 360.3 228.4 360.3 189.1 328.8L48 212.2z"/></svg>
              </span>
              <div class="inputbx">
                <label for="email">Email Address</label>
                <input type="text" id="email" placeholder="youremail@example.com" required>
              </div>
            </div>
            <div class="buttonbx">
              <input type="submit" value="Réinitialisez">
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <div id="pop-up-newsletter" class="enable">
      <div class="button-close">
        <svg viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
      </div>
      <svg viewBox="0 0 522 521.1">
        <defs><style>.m-1{fill:#0d4370;}.m-1,.m-2{stroke:#0d4370;stroke-miterlimit:10;stroke-width:10px;}.m-2,.m-4{fill:#fff;}.m-3{fill:#007fff;}</style></defs><path class="m-1" d="M-1924.25,2169.3h-165c3.12-2.25,5.87-4.25,9.12-6.5,16.8-12.37,50.2-41.87,73.4-41.5,23.3-.37,56.6,29.13,73.38,41.48C-1930.16,2165.09-1927.41,2167.09-1924.25,2169.3Z" transform="translate(2267.79 -2116.3)"></path><path class="m-1" d="M-2214.79,2260.48v106l-48-34.68v-10.64a47.75,47.75,0,0,1,18.38-37.8C-2235.54,2276.36-2227.16,2269.86-2214.79,2260.48Z" transform="translate(2267.79 -2116.3)"></path><path class="m-1" d="M-1750.79,2321.16v10.53l-48,34.68V2260.46c12.4,9.4,20.8,15.9,29.6,22.9A47.58,47.58,0,0,1-1750.79,2321.16Z" transform="translate(2267.79 -2116.3)"></path><path class="m-2" d="M-1750.79,2331.69V2585.3c0,25.6-21.5,47.1-48,47.1h-416a48,48,0,0,1-48-48V2331.78l48,34.68,1.69,1.23,46.31,33.46,128.93,81.15a58.32,58.32,0,0,0,62.13,0l128.94-81.19,48-34.69Z" transform="translate(2267.79 -2116.3)"></path><path class="m-3" d="M-1846.79,2223.36v184.7l-128.94,81.24a58.32,58.32,0,0,1-62.13,0l-128.93-81.11V2223.36Z" transform="translate(2267.79 -2116.3)"></path><path d="M-1798.79,2223.3v150l-48,34.69V2223.36h-320v184.79l-46.31-33.46-1.69-1.23v-150.1a48,48,0,0,1,48-48h320A48,48,0,0,1-1798.79,2223.3Z" transform="translate(2267.79 -2116.3)"></path><polygon class="m-4" points="335.29 180.5 335.29 204.69 228.51 204.69 228.51 277.27 204.46 277.27 204.46 204.69 176.85 204.69 176.85 180.5 335.29 180.5"></polygon><path class="m-4" d="M-1995.31,2369.52h62.76v24H-1999a30.21,30.21,0,0,1-30.31-30.16v-30.17h79.41v24.05h-55.22a13.42,13.42,0,0,0,0,3.27A9.9,9.9,0,0,0-1995.31,2369.52Z" transform="translate(2267.79 -2116.3)"></path>
      </svg>
      <h3>Join The Community</h3>
      <span> Rester a Jour sur les Dernieres Posts</span>
      <form action="#">
        <input type="text" name="" id="" placeholder="Numero Whatsapp" required>
        <button type="submit" title="Subscribe">Je M'abonne</button>
      </form>
    </div>

    <script defer src="/views/templates/js/function.js"></script>
    <script defer src="/views/templates/js/script.js"></script>
    <?= $file_js ?? '' ?>

  </body>
</html>

