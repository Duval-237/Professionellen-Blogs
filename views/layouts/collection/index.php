<?php
$title_page =  "Collection | Technogan";
$file_css = 'views/layouts/collection/style.css';

$slug = [
  'fr' => "Collection",
  'en' => "Collection",
  'de' => "Collection",
  'es' => "Collection"
];
?>
<section id="collection" class="width-page">
  <h1>
    <span>Mes Collections(<?= count( $collection ) < 10 ? '0' . count( $collection ) : count( $collection ) ?>)</span>
  </h1>

  <div class="container-article">
    <?php foreach( $collection as $article ): ?>
    <article class="article" style="--clr:<?= $article->color ?>; --clr-transparent:<?= $article->color ?>c2;">
      <a href="/<?= $article->slug ?>" class="box-img">
        <img src="/uploads/articles/<?= $article->id ?>/<?= $article->img ?>" loading="lazy" alt="<?= $article->title ?>">
      </a>
      <a href="/Catégorie/<?= str_replace( ' ', '-', $article->name )  ?>" class="categorie-article"><span>#<?= $article->name ?></span></a>
      <a href="/<?= $article->slug ?>" class="box-title">
        <p><?= $article->title ?></p>
      </a>
      <div class="bottom">
        <div class="save add-collection">
          <span class="svg">
            <svg viewBox="0 0 384 511.95"><defs><style>.cls{fill:#ffbf00;}</style></defs><path class="cls" d="M-2.76-645.79v431.9c0,24.7-26.8,39.2-48.1,27.63l-143.9-83.93-143.88,83.94a32,32,0,0,1-48.12-27.64v-431.9a48,48,0,0,1,48-48h288A48,48,0,0,1-2.76-645.79Z" transform="translate(386.76 693.79)"></path></svg>
          </span>
        </div>
      </div>
    </article>
    <?php endforeach; ?>

    <!-- <article class="article" style="--clr:#fe7802; --clr-transparent:#fe7802c2;">
      <a href="/Comment_debloquer_la_monetisation_TikTok_dans_les_pays_non-eligible" class="box-img">
        <img src="/uploads/articles/eec93f06dff8d5e462d4c8ecde5f6e85/Comment_debloquer_la_monetisation_TikTok_dans_les_pays_non-eligible.png" loading="lazy" alt="Comment Debloquer la Monetisation TikTok dans les Pays Non-Eligible">
      </a>
      <a href="/Catégorie/Technologie/php" class="categorie-article"><span>php</span></a>
      <a href="/Comment_debloquer_la_monetisation_TikTok_dans_les_pays_non-eligible" class="box-title">
        <p>Comment Debloquer la Monetisation TikTok dans les Pays Non-Eligible</p>
      </a>
      <div class="bottom">
        <div class="save add-collection">
          <span class="svg">
            <svg viewBox="0 0 384 511.95"><defs><style>.cls{fill:#ffbf00;}</style></defs><path class="cls" d="M-2.76-645.79v431.9c0,24.7-26.8,39.2-48.1,27.63l-143.9-83.93-143.88,83.94a32,32,0,0,1-48.12-27.64v-431.9a48,48,0,0,1,48-48h288A48,48,0,0,1-2.76-645.79Z" transform="translate(386.76 693.79)"></path></svg>
          </span>
        </div>
      </div>
    </article> -->

  </div>


</section>

