<?php
  $title_page = "Manage Categories";
  $file_css = 'views/layouts/admin/categories/css/style.css';
  $link_add = "/admin/categories/add";
?>

<section id="category">
  <ul class="categories">
  <?php foreach ( $categories as $category ): ?>
    <li class="item" style="--clr:<?= $category->color ?>; --clr-transparent: <?= $category->color ?>50;">
      <a href="/admin/categories/view/<?= $category->id ?>">
        <span class="svg-category"><?= $category->svg ?></span>
        <span class="name-category"><?= $category->name ?></span>
        <div class="description-category"><?= $category->description ?></div>
        <div class="date"><?= $category->date ?></div>
      </a>
      <div class="action">
          <a href="/admin/categories/edit/<?= $category->id ?>" class="edit">
            <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 511.19 510.38"><path d="M-1941.6,288.8c3-8,4.85-16.68,9.11-23.95,12-20.49,30.55-31.39,54.28-31.56,56.54-.39,113.1-.17,169.65-.09,13.14,0,22.61,9.33,22.44,21.63-.16,12.08-9.61,21-22.58,21q-83.07.06-166.16,0c-15.72,0-24.06,8.25-24.06,23.9q0,146.45,0,292.9c0,15.46,8.24,23.77,23.66,23.77q146.7,0,293.4,0c15,0,23.5-8.55,23.51-23.5q0-83.58,0-167.16c0-15.56,14-25.86,28.21-21,8.94,3,14.36,11,14.4,21.7.08,20.13,0,40.25,0,60.38,0,35.76.11,71.52,0,107.28-.13,31.16-20.21,56.51-49.9,63.31a34,34,0,0,1-7.41.66q-153.43,0-306.87.1c-22.81,0-39.62-10.43-51.38-28.86-4.94-7.75-7-17.35-10.32-26.11Z" transform="translate(1941.6 -147.78)"></path><path d="M-1573.93,216.33l75.09,75.08c-.83.89-1.91,2.11-3.06,3.26q-81,81-161.88,162a23,23,0,0,1-12.45,6.65c-23.14,4.51-46.26,9.17-69.39,13.76-9.65,1.91-16-4-14.09-13.49,4.8-24.28,9.66-48.54,14.74-72.76a16.09,16.09,0,0,1,4.15-7.66q82.42-82.71,165.06-165.19C-1575.09,217.3-1574.34,216.7-1573.93,216.33Z" transform="translate(1941.6 -147.78)"></path><path d="M-1474.94,268.12c-25.53-25.53-50.33-50.32-75.86-75.86,12.47-11.68,24.22-24.83,38.06-35.17,20.51-15.32,49.86-11.06,67.65,7.78,17.58,18.61,19.94,47.81,4,67.65C-1451.38,245.27-1463.67,256.38-1474.94,268.12Z" transform="translate(1941.6 -147.78)"></path></svg>
          </a>
          <a href="/admin/categories/delete/<?= $category->id ?>" class="delete">
            <svg viewBox="0 0 512 512"><path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352"/><path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </a>
      </div>
    </li>
  <?php endforeach ?>
  </ul>

  <?php
  # Autre Design
  /*
  <!-- <div class="tab-category">
    <ul class="header">
      <li class="item">SVG</li>
      <li class="item">Name</li>
      <li class="item">Description</li>
      <li class="item">Date</li>
      <li class="item">Action</li>
    </ul>
    <?php foreach ( $categories as $category ): ?>
    <div class="content" style="--clr:<?= $category->color ?>; --clr-transparent: <?= $category->color ?>50;">
      <span class="svg"><?= $category->svg ?></span>
      <span class="name"><?= $category->name ?></span>
      <span class="description"><?= $category->description ?></span>
      <span class="date"><?= $category->date ?></span>
      <div class="action">
        <a href="/admin/categories/edit/<?= $category->id ?>" class="edit">
          <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 511.19 510.38"><path d="M-1941.6,288.8c3-8,4.85-16.68,9.11-23.95,12-20.49,30.55-31.39,54.28-31.56,56.54-.39,113.1-.17,169.65-.09,13.14,0,22.61,9.33,22.44,21.63-.16,12.08-9.61,21-22.58,21q-83.07.06-166.16,0c-15.72,0-24.06,8.25-24.06,23.9q0,146.45,0,292.9c0,15.46,8.24,23.77,23.66,23.77q146.7,0,293.4,0c15,0,23.5-8.55,23.51-23.5q0-83.58,0-167.16c0-15.56,14-25.86,28.21-21,8.94,3,14.36,11,14.4,21.7.08,20.13,0,40.25,0,60.38,0,35.76.11,71.52,0,107.28-.13,31.16-20.21,56.51-49.9,63.31a34,34,0,0,1-7.41.66q-153.43,0-306.87.1c-22.81,0-39.62-10.43-51.38-28.86-4.94-7.75-7-17.35-10.32-26.11Z" transform="translate(1941.6 -147.78)"></path><path d="M-1573.93,216.33l75.09,75.08c-.83.89-1.91,2.11-3.06,3.26q-81,81-161.88,162a23,23,0,0,1-12.45,6.65c-23.14,4.51-46.26,9.17-69.39,13.76-9.65,1.91-16-4-14.09-13.49,4.8-24.28,9.66-48.54,14.74-72.76a16.09,16.09,0,0,1,4.15-7.66q82.42-82.71,165.06-165.19C-1575.09,217.3-1574.34,216.7-1573.93,216.33Z" transform="translate(1941.6 -147.78)"></path><path d="M-1474.94,268.12c-25.53-25.53-50.33-50.32-75.86-75.86,12.47-11.68,24.22-24.83,38.06-35.17,20.51-15.32,49.86-11.06,67.65,7.78,17.58,18.61,19.94,47.81,4,67.65C-1451.38,245.27-1463.67,256.38-1474.94,268.12Z" transform="translate(1941.6 -147.78)"></path></svg>
        </a>
        <a href="/admin/categories/delete/<?= $category->id ?>" class="delete">
          <svg viewBox="0 0 512 512"><path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352"/><path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div> -->
  */
  ?>
</section>

