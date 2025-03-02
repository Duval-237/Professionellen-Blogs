<?php 
  $title_page = "Recherche de '$search' - Technogan";
  $file_css = 'views/layouts/technoganto/style.css';
  // $fichier_js = '<script src="/views/technoganto/script.js"></script>';
?>

<section class="container">
  <div class="width-page content">
    <div class="content-search">
      <?php foreach( $articles as $article ): ?>
      <a href="/<?= $article->slug ?>" class="resultat">
        <div class="imgbx">
          <img src="/uploads/articles/<?= $article->id ?>/<?= $article->img ?>" alt="<?= $article->title ?>">
        </div>
        <div class="resultat-search">
          <h2><?= $article->title ?></h2>
          <ul class="stat-search">
            <li class="item stat-view">
              <span></span>
              <span><?= $article->views ?> <?= WORD_VIEW ?></span>
            </li>
            <li class="item stat-date">
              <span></span>
              <span><?= defined('WORD_VOR') ? WORD_VOR : '' ?> <?= $article->date_update ?> <?= defined('WORD_AGO') ? WORD_AGO : '' ?></span>
            </li>
          </ul>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <section class="content-aside">
      <div class="blog-aside">
        <aside role="complementary" class="newsletter">
          <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 522 521.1">
            <defs><style>.m-1{fill:#0d4370;}.m-1,.m-2{stroke:#0d4370;stroke-miterlimit:10;stroke-width:10px;}.m-2,.m-4{fill:#fff;}.m-3{fill:#007fff;}</style></defs><path class="m-1" d="M-1924.25,2169.3h-165c3.12-2.25,5.87-4.25,9.12-6.5,16.8-12.37,50.2-41.87,73.4-41.5,23.3-.37,56.6,29.13,73.38,41.48C-1930.16,2165.09-1927.41,2167.09-1924.25,2169.3Z" transform="translate(2267.79 -2116.3)"></path><path class="m-1" d="M-2214.79,2260.48v106l-48-34.68v-10.64a47.75,47.75,0,0,1,18.38-37.8C-2235.54,2276.36-2227.16,2269.86-2214.79,2260.48Z" transform="translate(2267.79 -2116.3)"></path><path class="m-1" d="M-1750.79,2321.16v10.53l-48,34.68V2260.46c12.4,9.4,20.8,15.9,29.6,22.9A47.58,47.58,0,0,1-1750.79,2321.16Z" transform="translate(2267.79 -2116.3)"></path><path class="m-2" d="M-1750.79,2331.69V2585.3c0,25.6-21.5,47.1-48,47.1h-416a48,48,0,0,1-48-48V2331.78l48,34.68,1.69,1.23,46.31,33.46,128.93,81.15a58.32,58.32,0,0,0,62.13,0l128.94-81.19,48-34.69Z" transform="translate(2267.79 -2116.3)"></path><path class="m-3" d="M-1846.79,2223.36v184.7l-128.94,81.24a58.32,58.32,0,0,1-62.13,0l-128.93-81.11V2223.36Z" transform="translate(2267.79 -2116.3)"></path><path d="M-1798.79,2223.3v150l-48,34.69V2223.36h-320v184.79l-46.31-33.46-1.69-1.23v-150.1a48,48,0,0,1,48-48h320A48,48,0,0,1-1798.79,2223.3Z" transform="translate(2267.79 -2116.3)"></path><polygon class="m-4" points="335.29 180.5 335.29 204.69 228.51 204.69 228.51 277.27 204.46 277.27 204.46 204.69 176.85 204.69 176.85 180.5 335.29 180.5"></polygon><path class="m-4" d="M-1995.31,2369.52h62.76v24H-1999a30.21,30.21,0,0,1-30.31-30.16v-30.17h79.41v24.05h-55.22a13.42,13.42,0,0,0,0,3.27A9.9,9.9,0,0,0-1995.31,2369.52Z" transform="translate(2267.79 -2116.3)"></path>
          </svg>
          <h3><?= WORD_SUBCRIBE_NEWSLETTER ?></h3>
          <a href="https://chat.whatsapp.com/JFQA1OQXAYF8b8xQrH7aA4" class="whatsapp-button" target="_blank" title="Whatsapp">
            <span class="svg">
              <svg viewBox="0 0 175.216 175.552"><defs><linearGradient id="b1" x1="85.915" x2="86.535" y1="32.567" y2="137.092" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#57d163"/><stop offset="1" stop-color="#23b33a"/></linearGradient><filter id="a" width="1.115" height="1.114" x="-.057" y="-.057" color-interpolation-filters="sRGB"><feGaussianBlur stdDeviation="3.531"/></filter></defs><path fill="#b3b3b3" d="m54.532 138.45 2.235 1.324c9.387 5.571 20.15 8.518 31.126 8.523h.023c33.707 0 61.139-27.426 61.153-61.135.006-16.335-6.349-31.696-17.895-43.251A60.75 60.75 0 0 0 87.94 25.983c-33.733 0-61.166 27.423-61.178 61.13a60.98 60.98 0 0 0 9.349 32.535l1.455 2.312-6.179 22.558zm-40.811 23.544L24.16 123.88c-6.438-11.154-9.825-23.808-9.821-36.772.017-40.556 33.021-73.55 73.578-73.55 19.681.01 38.154 7.669 52.047 21.572s21.537 32.383 21.53 52.037c-.018 40.553-33.027 73.553-73.578 73.553h-.032c-12.313-.005-24.412-3.094-35.159-8.954zm0 0" filter="url(#a)"/><path fill="#fff" d="m12.966 161.238 10.439-38.114a73.42 73.42 0 0 1-9.821-36.772c.017-40.556 33.021-73.55 73.578-73.55 19.681.01 38.154 7.669 52.047 21.572s21.537 32.383 21.53 52.037c-.018 40.553-33.027 73.553-73.578 73.553h-.032c-12.313-.005-24.412-3.094-35.159-8.954z"/><path fill="url(#linearGradient1780)" d="M87.184 25.227c-33.733 0-61.166 27.423-61.178 61.13a60.98 60.98 0 0 0 9.349 32.535l1.455 2.312-6.179 22.559 23.146-6.069 2.235 1.324c9.387 5.571 20.15 8.518 31.126 8.524h.023c33.707 0 61.14-27.426 61.153-61.135a60.75 60.75 0 0 0-17.895-43.251 60.75 60.75 0 0 0-43.235-17.929z"/><path fill="url(#b1)" d="M87.184 25.227c-33.733 0-61.166 27.423-61.178 61.13a60.98 60.98 0 0 0 9.349 32.535l1.455 2.313-6.179 22.558 23.146-6.069 2.235 1.324c9.387 5.571 20.15 8.517 31.126 8.523h.023c33.707 0 61.14-27.426 61.153-61.135a60.75 60.75 0 0 0-17.895-43.251 60.75 60.75 0 0 0-43.235-17.928z"/><path fill="#fff" fill-rule="evenodd" d="M68.772 55.603c-1.378-3.061-2.828-3.123-4.137-3.176l-3.524-.043c-1.226 0-3.218.46-4.902 2.3s-6.435 6.287-6.435 15.332 6.588 17.785 7.506 19.013 12.718 20.381 31.405 27.75c15.529 6.124 18.689 4.906 22.061 4.6s10.877-4.447 12.408-8.74 1.532-7.971 1.073-8.74-1.685-1.226-3.525-2.146-10.877-5.367-12.562-5.981-2.91-.919-4.137.921-4.746 5.979-5.819 7.206-2.144 1.381-3.984.462-7.76-2.861-14.784-9.124c-5.465-4.873-9.154-10.891-10.228-12.73s-.114-2.835.808-3.751c.825-.824 1.838-2.147 2.759-3.22s1.224-1.84 1.836-3.065.307-2.301-.153-3.22-4.032-10.011-5.666-13.647"/></svg>
            </span>
            <span class="text"><?= WORD_JOIN_NEWSLETTER ?></span>
          </a>
          <span><?= TEXT_KEEP_UP_DATE ?></span>
        </aside>
        <aside role="complementary" class="pub">
          <span><?= WORD_ADVERTISING ?></span>
          <a href="#"><img src="/uploads/website/test1.jpg" alt=""></a>
        </aside>
      </div>
    </section>

  </div>
</section>

