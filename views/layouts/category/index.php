<?php
$title_page = CATEGORY . " | Technogan";
$file_css = 'views/layouts/category/css/style.css';

$slug = [
  'fr' => "Catégorie",
  'en' => "Category",
  'de' => "Kategorie",
  'es' => "Catégorie",
  'zh' => "Catégorie"
];
?>

<section id="category" class="width-page">
  <h1><?= WORD_EXPLORE_CATEGORY ?></h1>
  <ul class="categories">
    <?php foreach( $categories as $category ): ?>
    <li class="item">
      <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $category->name ) ?>" style="--clr:<?= $category->color ?>; --clr-transparent: <?= $category->color ?>50;">
        <span class="svg-category" ><?= $category->svg ?></span>
        <span class="name-category"><?= $category->name ?></span>
        <div class="description-category"><?= $category->description ?></div>
        <span class="svg-right">
          <svg viewBox="0 0 448 512"><path d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/></svg>
        </span>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</section>

<section id="articles" class="width-page">
  <h1><?= WORD_ALL_ARTICLES ?></h1>
  <div class="post-box-articles">
    <?php foreach( $articles as $article ): ?>
    <article class="article" style="--clr:<?= $article->color ?>; --clr-transparent:<?= $article->color ?>c2;">
      <a href="/<?= $article->slug ?>" class="box-img">
        <img src="/uploads/articles/<?= $article->id ?>/<?= $article->img ?>" loading="lazy" alt="<?= $article->title ?>">
      </a>
      <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $article->name )  ?>" class="categorie-article" ><span><?= $article->name ?></span></a>
      <a href="/<?= $article->slug ?>" class="box-title">
        <p><?= $article->title ?></p>
      </a>
    </article>
    <?php endforeach; ?>
  </div>
</section>

