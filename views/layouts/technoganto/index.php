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
              <span><?= $article->views ?> . vues</span>
            </li>
            <li class="item stat-date">
              <span></span>
              <span>il y a <?= $article->date_update ?></span>
            </li>
          </ul>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <section class="content-aside">
      <div class="blog-aside">
        <aside role="complementary" class="newsletter">
        <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 522 521.1"><defs><style>.m-1{fill:#0d4370;}.m-1,.m-2{stroke:#0d4370;stroke-miterlimit:10;stroke-width:10px;}.m-2,.m-4{fill:#fff;}.m-3{fill:#007fff;}</style></defs><path class="m-1" d="M-1924.25,2169.3h-165c3.12-2.25,5.87-4.25,9.12-6.5,16.8-12.37,50.2-41.87,73.4-41.5,23.3-.37,56.6,29.13,73.38,41.48C-1930.16,2165.09-1927.41,2167.09-1924.25,2169.3Z" transform="translate(2267.79 -2116.3)"></path><path class="m-1" d="M-2214.79,2260.48v106l-48-34.68v-10.64a47.75,47.75,0,0,1,18.38-37.8C-2235.54,2276.36-2227.16,2269.86-2214.79,2260.48Z" transform="translate(2267.79 -2116.3)"></path><path class="m-1" d="M-1750.79,2321.16v10.53l-48,34.68V2260.46c12.4,9.4,20.8,15.9,29.6,22.9A47.58,47.58,0,0,1-1750.79,2321.16Z" transform="translate(2267.79 -2116.3)"></path><path class="m-2" d="M-1750.79,2331.69V2585.3c0,25.6-21.5,47.1-48,47.1h-416a48,48,0,0,1-48-48V2331.78l48,34.68,1.69,1.23,46.31,33.46,128.93,81.15a58.32,58.32,0,0,0,62.13,0l128.94-81.19,48-34.69Z" transform="translate(2267.79 -2116.3)"></path><path class="m-3" d="M-1846.79,2223.36v184.7l-128.94,81.24a58.32,58.32,0,0,1-62.13,0l-128.93-81.11V2223.36Z" transform="translate(2267.79 -2116.3)"></path><path d="M-1798.79,2223.3v150l-48,34.69V2223.36h-320v184.79l-46.31-33.46-1.69-1.23v-150.1a48,48,0,0,1,48-48h320A48,48,0,0,1-1798.79,2223.3Z" transform="translate(2267.79 -2116.3)"></path><polygon class="m-4" points="335.29 180.5 335.29 204.69 228.51 204.69 228.51 277.27 204.46 277.27 204.46 204.69 176.85 204.69 176.85 180.5 335.29 180.5"></polygon><path class="m-4" d="M-1995.31,2369.52h62.76v24H-1999a30.21,30.21,0,0,1-30.31-30.16v-30.17h79.41v24.05h-55.22a13.42,13.42,0,0,0,0,3.27A9.9,9.9,0,0,0-1995.31,2369.52Z" transform="translate(2267.79 -2116.3)"></path></svg>
          <h3>Abonnez-vous a la <br> newsletter de <br> BlogTuto !</h3>
          <form action="#">
            <input type="text" placeholder="Numero whatsapp">
            <input type="submit" value="Je m'abonne">
          </form>
          <span>Rester a jour sur les dernieres posts</span>
        </aside>
        <aside role="complementary" class="pub">
          <span>Publicite</span>
          <a href="#"><img src="/uploads/website/test1.jpg" alt=""></a>
        </aside>
      </div>
    </section>

  </div>
</section>

