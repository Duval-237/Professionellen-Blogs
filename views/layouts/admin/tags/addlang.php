<?php
  $title_page = "Add Traduction Tags";
  $file_css = 'views/layouts/admin/tags/css/form.css';
?>

<section id="form">
  <form action="/admin/tags/add/<?= $id ?>" method="post">
    <div class="contentbx">
      <div class="inputbx">
        <label>Langue</label>
        <select name="lang" required>
          <option value="" hidden>Select Language</option>
          <?php foreach( $language as $lang ): ?>
            <?php if ( $lang->code !== 'fr' ): ?>
            <option value="<?= $lang->code ?>"><?= $lang->name ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="inputbx">
      <label for="name">News Tags</label>
      <input type="text" name="name" id="name" placeholder="Write the name of tags" required>
    </div>
    <div class="inputbx">
      <label for="description">Description</label>
      <textarea name="description" id="description" placeholder="Entrer une description" required></textarea>
    </div>
    <div class="inputbx">
      <input type="submit" value="Add">
    </div>
  </form>
</section>



