<?php
  $title_page = "Edit Traduction Categories";
  $file_css = 'views/layouts/admin/categories/css/form.css';
  $file_js = '<script defer src="/views/layouts/admin/categories/js/script.js"></script>';
?>

<section id="form">
  <form action="/admin/categories/edit/<?= $category->id ?>/<?= $category->lang_code ?>" method="POST">
    <div class="contentbx">
      <div class="inputbx">
        <label>Langue</label>
        <select name="lang" required>
          <option value="" hidden>Select Language</option>
          <?php foreach( $language as $lang ): ?>
            <?php if ( $lang->code !== 'fr' ): ?>
              <?php if ( $category->lang_code === $lang->code ): ?>
              <option value="<?= $lang->code ?>" selected><?= $lang->name ?></option>
              <?php else: ?>
              <option value="<?= $lang->code ?>"><?= $lang->name ?></option>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="inputbx">
      <label for="name">News Category</label>
      <input type="text" name="name" id="name" value="<?= $category->name ?>" placeholder="Write the name of categories" required>
    </div>
    <div class="inputbx">
      <label for="description">Description</label>
      <textarea name="description" id="description" placeholder="Entrer une description" required><?= $category->description ?></textarea>
    </div>
    <div class="inputbx">
      <input type="submit" value="Add">
    </div>
  </form>
</section>

