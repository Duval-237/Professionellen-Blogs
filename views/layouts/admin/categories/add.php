<?php
  $title_page = "Add Categories";
  $file_css = 'views/layouts/admin/categories/css/form.css';
  $file_js = '<script defer src="/views/layouts/admin/categories/js/script.js"></script>';
?>

<section id="form">
  <form action="/admin/categories/add" method="POST">
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
        <label for="code">Color</label>
        <div class="dbinput">    
          <input type="color" id="color" value="#000000">
          <input type="text" name="code" id="code" placeholder="#000000" maxlength="7">
        </div>
      </div>
    </div>
    <div class="inputbx">
      <label for="name">News Category</label>
      <input type="text" name="name" id="name" placeholder="Write the name of categories" required>
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

