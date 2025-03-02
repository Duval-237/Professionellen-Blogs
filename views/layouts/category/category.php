<?php
$title_page = "$categorie->name | Technogan";
$file_css = 'views/layouts/category/css/category.css';
$file_js = '<script defer src="/views/layouts/category/script.js"></script>';  

$description_page = $categorie->description;

$slug = [
  'fr' => "Catégorie",
  'en' => "Category",
  'de' => "Kategorie",
  'es' => "Catégorie",
  'zh' => "Catégorie"
];
?>

<section id="header" style="--clr:<?= $categorie->color ?>;--clr-transparent:<?= $categorie->color ?>c2;" data-category="<?= str_replace( ' ', '-', $categorie->name ) ?>">
  <div class="category">
    <h1><?= $categorie->name ?></h1>
    <p class="description"><?= $categorie->description ?></p>
  </div>
</section>

<section id="articles" style="--clr:<?= $categorie->color ?>;--clr-transparent:<?= $categorie->color ?>c2;" data-category = "<?= CATEGORY ?>">

  <div class="content-tags">
    <ul class="menu-tags width-page">
      <li class="item">
        <a href="/<?= CATEGORY ?>" title="<?= CATEGORY ?>" class="return"> 
          <span class="svg">
            <svg viewBox="0 0 576 512"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"></path></svg>
          </span>
        </a>
      </li>
      <?php $uri =  $_SERVER[ 'REDIRECT_URL' ] ; ?>
      <li class="item">
        <a href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $categorie->name  ) ?>" 
        class="<?php if ( $uri == '/'. CATEGORY . '/' . str_replace( ' ', '-', $categorie->name  ) ) echo "enable" ?> tags"
        data-tags="">
          <span class="svg"></span>
          <span>Tous</span>
        </a>
      </li>
      <?php foreach( $tags as $tag ): ?>
      <li class="item">
        <a 
        href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $categorie->name  ) ?>/<?= str_replace( ' ', '-', $tag->name ) ?>" 
        class="<?php if ( $uri == '/'. CATEGORY . '/' . str_replace( ' ', '-', $categorie->name  ) . '/' . $tag->name ) echo "enable" ?> tags"
        data-tags="<?= $tag->name ?>"> 
          <span class="svg"><?= $tag->svg ?></span>
          <span><?= $tag->name ?></span>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="container-articles  width-page">
    <?php foreach( $articles as $article ): ?>
    <article class="article" style="--clr:<?= $article->color ?>; --clr-transparent:<?= $article->color ?>c2;">
      <a href="/<?= $article->slug ?>" class="box-img">
        <img src="/uploads/articles/<?= $article->id ?>/<?= $article->img ?>" loading="lazy" alt="<?= $article->title ?>">
      </a>
      <a 
      href="/<?= CATEGORY ?>/<?= str_replace( ' ', '-', $categorie->name ) ?>/<?= $article->tags ?>" 
      class="categorie-article" ><span><?= str_replace( ' ', '-', $article->tags ) ?></span></a>
      <a href="/<?= $article->slug ?>" class="box-title">
        <p><?= $article->title ?></p>
      </a>
    </article>
    <?php endforeach; ?>
  </div>

</section>


