<?php
$title_page = "Manage Articles";
$file_css = 'views/layouts/admin/articles/css/style.css';
$file_js = '<script src="/views/layouts/admin/articles/js/index.js"></script>';
$link_add = "/admin/articles/add";
// echo uniqid( 'das' );
// mkdir( 'uploads/articles/slug', 0777 );
?>

<section id="articles">
  <div class="tab-articles">
    <ul class="header">
      <li class="item title">Title</li>
      <li class="item title"></li>
      <li class="item">Tags</li>
      <li class="item">Author</li>
      <li class="item">Views</li>
      <li class="item">date</li>
      <li class="item">Actions</li>
      <li class="item">Status</li>
    </ul>
    <?php foreach( $articles as $article ): ?>
    <div class="content" data-id="<?= $article->id ?>" style="--clr:<?= $article->color ?>; --clr-transparent:<?= $article->color ?>c2">
      <span href="#" class="btn-information">
        <svg viewBox="0 0 512 512"><path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 128c17.67 0 32 14.33 32 32c0 17.67-14.33 32-32 32S224 177.7 224 160C224 142.3 238.3 128 256 128zM296 384h-80C202.8 384 192 373.3 192 360s10.75-24 24-24h16v-64H224c-13.25 0-24-10.75-24-24S210.8 224 224 224h32c13.25 0 24 10.75 24 24v88h16c13.25 0 24 10.75 24 24S309.3 384 296 384z"/></svg>
      </span>
      <span class="title"><?= $article->title ?></span>
      <span class="category"><?= $article->tags ?></span>
      <span class="author"><?= "$article->prenom $article->nom" ?></span>
      <div class="views"><?= $article->views ?></div>
      <div class="date"><?= "$article->jour $article->mois $article->annee" ?></div>
      <div class="action">
        <a href="/<?= $article->slug ?>" target="_blank" class="see-article">
          <svg viewBox="0 0 576 512"><path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/></svg>
        </a>
        <a href="/admin/articles/edit/<?= $article->id ?>#content" class="edit">
          <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 511.19 510.38"><path d="M-1941.6,288.8c3-8,4.85-16.68,9.11-23.95,12-20.49,30.55-31.39,54.28-31.56,56.54-.39,113.1-.17,169.65-.09,13.14,0,22.61,9.33,22.44,21.63-.16,12.08-9.61,21-22.58,21q-83.07.06-166.16,0c-15.72,0-24.06,8.25-24.06,23.9q0,146.45,0,292.9c0,15.46,8.24,23.77,23.66,23.77q146.7,0,293.4,0c15,0,23.5-8.55,23.51-23.5q0-83.58,0-167.16c0-15.56,14-25.86,28.21-21,8.94,3,14.36,11,14.4,21.7.08,20.13,0,40.25,0,60.38,0,35.76.11,71.52,0,107.28-.13,31.16-20.21,56.51-49.9,63.31a34,34,0,0,1-7.41.66q-153.43,0-306.87.1c-22.81,0-39.62-10.43-51.38-28.86-4.94-7.75-7-17.35-10.32-26.11Z" transform="translate(1941.6 -147.78)"></path><path d="M-1573.93,216.33l75.09,75.08c-.83.89-1.91,2.11-3.06,3.26q-81,81-161.88,162a23,23,0,0,1-12.45,6.65c-23.14,4.51-46.26,9.17-69.39,13.76-9.65,1.91-16-4-14.09-13.49,4.8-24.28,9.66-48.54,14.74-72.76a16.09,16.09,0,0,1,4.15-7.66q82.42-82.71,165.06-165.19C-1575.09,217.3-1574.34,216.7-1573.93,216.33Z" transform="translate(1941.6 -147.78)"></path><path d="M-1474.94,268.12c-25.53-25.53-50.33-50.32-75.86-75.86,12.47-11.68,24.22-24.83,38.06-35.17,20.51-15.32,49.86-11.06,67.65,7.78,17.58,18.61,19.94,47.81,4,67.65C-1451.38,245.27-1463.67,256.38-1474.94,268.12Z" transform="translate(1941.6 -147.78)"></path></svg>
        </a>
        <a href="/admin/articles/delete/<?= $article->id ?>" class="delete">
          <svg viewBox="0 0 512 512"><path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352"></path><path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
        </a>
      </div>
      <div class="status <?= $article->is_published ? 'enable' : ''; ?>" data-id="<?= $article->id ?>">
        <div class="toggle"><span></span></div>
      </div>
    </div>
    <?php endforeach;  ?>
  </div>
</section>

