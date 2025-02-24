<?php
  $title_page = "Edit Tags";
  $file_css = 'views/layouts/admin/tags/css/form.css';
?>

<section id="form">
  <form action="/admin/tags/edit/<?= $tags->id ?>" method="post">
    <div class="inputbx">
      <label for="svg">SVG</label>
      <textarea name="svg" id="svg" placeholder="Entrer le code svg" required><?= $tags->svg ?></textarea>
    </div>
    <div class="contentbx">
      <div class="inputbx">
        <label>Langue</label>
        <select name="lang" required>
          <option value="fr">Francais</option>
        </select>
      </div>
      <div class="inputbx">
        <label for="category">Category</label>
        <select name="category" id="category">
          <?php foreach( $categories as $category ): ?>
            <?php if ( $tags->id_category == $category->id ): ?>
            <option value="<?= $category->id ?>" selected><?= $category->name ?></option>
            <?php else: ?>
            <option value="<?= $category->id ?>"><?= $category->name ?></option>
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

