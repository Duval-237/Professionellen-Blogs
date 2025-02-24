<?php
  $title_page = "Add Author";
  $file_css = 'views/layouts/admin/author/css/form.css';
  $file_js = '<script defer src="/views/layouts/admin/author/js/script.js"></script>';
?>

<section id="form">
  <form action="/admin/author/add" method="post" enctype="multipart/form-data">
    <?php echo $_SESSION[ 'error' ] ?? ''; unset( $_SESSION[ 'error' ] ); ?>
    <label for="file">
      <div class="imgbx">
        <img src="/storage/img/website/uplaod.svg" alt="">
        <span>200 X 200</span>
      </div>
      <input type="file" name="file" id="file" required>
    </label>
    <div class="inputcontent">
      <div class="inputbx">
        <label for="firstname">First name</label>
        <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" required>
      </div>
      <div class="inputbx">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required>
      </div>
    </div>
    <div class="inputbx">
      <label for="lang">language</label>   
      <select name="lang" id="lang">
        <option value="fr">Francais</option>
      </select>
    </div>
    <div class="inputbx">
      <label for="description">Description</label>
      <input name="description" placeholder="Enter your description" id="description" required>
    </div>
    <div class="inputbx">
      <label for="info">Infos</label>
      <textarea name="info" placeholder="Enter information" id="info" required></textarea>
    </div>
    <input type="submit" value="Add">
  </form>
</section>

