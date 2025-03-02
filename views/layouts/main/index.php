<?php
  $slogan = @SLOGAN !== 'SLOGAN' ? ': ' . SLOGAN : '';
  $title_page = "Technogan$slogan";
  $file_css = 'views/layouts/main/style.css';
?>

<section class="container  home">
  <img src="/uploads/website/home_light.png" alt="">
  <img src="/uploads/website/home_dark.png" alt="">
  <div id="home" class="width-page">
    <h1><?= TEXT_HOME_WELCOME ?></h1>
    <p><?= TEXT_HOME_QUESTION ?></p>
    <div class="container-search">
      <form action="/technoganTo" class="home-search">
        <svg viewBox="0 0 512 512"><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
        <input type="search" name="search" placeholder="<?= WORD_SEARCH ?>..." autocomplete="off" required>
        <input type="submit" value="Go">
      </form>
    </div>
  </div>
</section>

<section class="container">
  <div class="box box-articles1 width-page padding-none">
    <h2>
      <svg viewBox="0 0 448 512">
        <path d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"/>
      </svg>
      <span><?= TEXT_HOME_RECENT ?></span>
    </h2>
    <div class="post-box-articles1">
      <?php foreach ( $recent_post as $article ): ?>
      <article class="article" style="--clr:<?= $article->color ?>; --clr-transparent:<?= $article->color ?>c2;">
        <a href="<?= $article->slug ?>" title="<?= $article->title ?>" class="box-img">
          <img src="/uploads/articles/<?= $article->id ?>/<?= $article->img ?>" loading="lazy" alt="<?= $article->title ?>">
        </a>
        <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $article->name )  ?>" title="<?= $article->name ?>" class="categorie-article">
          <span>#<?= $article->name ?></span>
        </a>
        <a href="/<?= $article->slug ?>" title="<?= $article->title ?>" class="box-title">
          <p><?= $article->title ?></p>
        </a>
      </article>
      <?php endforeach; ?>
      <?php
      /*  
      <article class="article">
        <a href="#" class="box-img">
          <img src="/storage/img/website/test.jpg" loading="lazy"  alt="">
        </a>
        <a href="#" class="categorie-article" style="--clr:#a34df9; --clr-transparent:#a34df930;" ><span>Securite</span></a>
        <a href="#" class="box-title">
          <h3 style="--clr:#a34df9;">Comment etre acceder a la monetisation tiktok : dans les pays non eligible</h3>
        </a>
      </article>
      
      <article class="article">
        <a href="#" class="box-img">
          <img src="/storage/img/website/test.jpg" loading="lazy"  alt="">
        </a>
        <a href="#" class="categorie-article" style="--clr:#ff2d2d; --clr-transparent:#ff2d2d30;"><span>Tutoriels</span></a>
        <a href="#" class="box-title">
          <h3 style="--clr:#ff2d2d;">Comment jouer au paintball</h3>
        </a>
      </article>
      
      <article class="article">
        <a href="#" class="box-img">
          <img src="/storage/img/website/test.jpg" loading="lazy"  alt="">
        </a>
        <a href="#" class="categorie-article" style="--clr:#0da601; --clr-transparent:#0da60130;" ><span>Actualites</span></a>
        <a href="#" class="box-title">
          <h3 style="--clr:#0da601;">Comment etre eligible a la monetisation en afrique avec bloggastuce</h3>
        </a>
      </article>
      
      <article class="article">
        <a href="#" class="box-img">
          <img src="/storage/img/website/test.jpg" loading="lazy"  alt="">
        </a>
        <a href="#" class="categorie-article" style="--clr:#e600c2; --clr-transparent:#e600c230;"><span>Astuces</span></a>
        <a href="#" class="box-title">
          <h3 style="--clr:#e600c2;">Comment jouer au paintball</h3>
        </a>
      </article>
      
      <article class="article">
        <a href="#" class="box-img">
          <img src="/storage/img/website/test.jpg" loading="lazy"  alt="">
        </a>
        <a href="#" class="categorie-article" style="--clr:#a09600; --clr-transparent:#a0960030;" ><span>Bussiness</span></a>
        <a href="#" class="box-title">
          <h3 style="--clr:#a09600;">Comment etre eligible a la monetisation en afrique avec bloggastuce</h3>
        </a>
      </article>*/
      ?>
    </div>
    <h2>
      <svg class="ionicon" viewBox="0 0 512 512">
        <path d="M208 512a24.84 24.84 0 01-23.34-16l-39.84-103.6a16.06 16.06 0 00-9.19-9.19L32 343.34a25 25 0 010-46.68l103.6-39.84a16.06 16.06 0 009.19-9.19L184.66 144a25 25 0 0146.68 0l39.84 103.6a16.06 16.06 0 009.19 9.19l103 39.63a25.49 25.49 0 0116.63 24.1 24.82 24.82 0 01-16 22.82l-103.6 39.84a16.06 16.06 0 00-9.19 9.19L231.34 496A24.84 24.84 0 01208 512zm66.85-254.84zM88 176a14.67 14.67 0 01-13.69-9.4l-16.86-43.84a7.28 7.28 0 00-4.21-4.21L9.4 101.69a14.67 14.67 0 010-27.38l43.84-16.86a7.31 7.31 0 004.21-4.21L74.16 9.79A15 15 0 0186.23.11a14.67 14.67 0 0115.46 9.29l16.86 43.84a7.31 7.31 0 004.21 4.21l43.84 16.86a14.67 14.67 0 010 27.38l-43.84 16.86a7.28 7.28 0 00-4.21 4.21l-16.86 43.84A14.67 14.67 0 0188 176zM400 256a16 16 0 01-14.93-10.26l-22.84-59.37a8 8 0 00-4.6-4.6l-59.37-22.84a16 16 0 010-29.86l59.37-22.84a8 8 0 004.6-4.6l22.67-58.95a16.45 16.45 0 0113.17-10.57 16 16 0 0116.86 10.15l22.84 59.37a8 8 0 004.6 4.6l59.37 22.84a16 16 0 010 29.86l-59.37 22.84a8 8 0 00-4.6 4.6l-22.84 59.37A16 16 0 01400 256z"/>
      </svg>
      <span><?= TEXT_HOME_POPULAR ?></span>
    </h2>
    <div class="post-box-articles1">
      <?php foreach ( $popular_post as $article ): ?>
      <article class="article" style="--clr:<?= $article->color ?>; --clr-transparent:<?= $article->color ?>c2;">
        <a href="<?= $article->slug ?>" title="<?= $article->title ?>" class="box-img">
          <img src="/uploads/articles/<?= $article->id ?>/<?= $article->img ?>" loading="lazy" alt="<?= $article->title ?>">
        </a>
        <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $article->name ) ?>" title="<?= $article->name ?>" class="categorie-article">
          <span>#<?= $article->name ?></span>
        </a>
        <a href="<?= $article->slug ?>" title="<?= $article->title ?>" class="box-title">
          <p><?= $article->title ?></p>
        </a>
      </article>
      <?php endforeach; ?>
  </div>
</section>

<section class="container container-categories">
  <div class="box box-categories width-page">
    <h2>
      <svg viewBox="0 0 576 512">
        <path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/>
      </svg>
      <span><?= WORD_CATEGORY ?></span>
    </h2>
    <ul class="categories">
      <?php foreach ( $categories as $categorie ):?>
        <li>
          <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $categorie->name ) ?>" title="<?= $categorie->name ?>" style="--clr:<?= $categorie->color ?>;">
            <span>
              <?= $categorie->svg ?>
            </span>
            <span><?= $categorie->name ?></span>
          </a>
        </li>
      <?php endforeach;?>
    </ul>
  </div>
</section>

<section class="container container-article2">
  <div class="box box-articles2 width-page">
    <h2>
      <svg viewBox="0 0 512 512">
        <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>
      </svg>
      <span><?= TEXT_MAY_LIKE ?></span>
    </h2>
    <div class="post-box-articles2">
      <?php foreach ( $all_post as $article ): ?>
      <article class="article" style="--clr:<?= $article->color ?>; --clr-transparent:<?= $article->color ?>c2;">
        <a href="<?= $article->slug ?>" title="<?= $article->title ?>" class="box-img">
          <img src="/uploads/articles/<?= $article->id ?>/<?= $article->img ?>" loading="lazy" alt="<?= $article->title ?>">
        </a>
        <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $article->name )  ?>" title="<?= $article->name ?>" class="categorie-article">
          <span>#<?= $article->name ?></span>
        </a>
        <a href="/<?= $article->slug ?>" title="<?= $article->title ?>" class="box-title">
          <p><?= $article->title ?></p>
        </a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

