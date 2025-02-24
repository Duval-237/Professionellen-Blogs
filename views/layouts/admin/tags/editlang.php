<?php
  $title_page = "Edit Traduction Tags";
  $file_css = 'views/layouts/admin/tags/css/form.css';
?>

<section id="form">
  <form action="/admin/tags/edit/<?= $id ?>/<?= $lang ?>" method="post">
    <div class="contentbx">
      <div class="inputbx">
        <label>Langue</label>
        <select name="lang" required>
          <?php foreach( $language as $lang ): ?>
            <?php if ( $lang->code !== 'fr' ): ?>
            <?php if ( $tags->lang_code === $lang->code ): ?>
            <option value="<?= $lang->code ?>" selected ><?= $lang->name ?></option>
            <?php else: ?>
            <option value="<?= $lang->code ?>"><?= $lang->name ?></option>
            <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="inputbx">
      <label for="name">News Tags</label>
      <input type="text" name="name" id="name" placeholder="Write the name of tags" value="<?= $tags->name ?>" required>
    </div>
    <div class="inputbx">
      <label for="description">Description</label>
      <textarea name="description" id="description" placeholder="Entrer une description" required><?= $tags->description ?></textarea>
    </div>
    <div class="inputbx">
      <input type="submit" value="Save">
    </div>
  </form>
</section>

