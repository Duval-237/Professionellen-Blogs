<?php
  $title_page = "Add Tags";
  $file_css = 'views/layouts/admin/tags/css/form.css';
  $link_add = "/admin/tags/add";
?>

<section id="form">
  <form action="/admin/tags/add" method="post">
    <div class="inputbx">
      <label for="svg">SVG</label>
      <textarea name="svg" id="svg" placeholder="Entrer le code svg" required></textarea>
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
        <select name="category" id="category" required>
          <option value="" hidden>Select category</option>
          <?php foreach( $categories as $category ): ?>
            <option value="<?= $category->id ?>"><?= $category->name ?></option>
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

