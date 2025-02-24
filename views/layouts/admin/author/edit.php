<?php
  $title_page = "Edit Author";
  $file_css = 'views/layouts/admin/author/css/form.css';
  $file_js = '<script defer src="/views/layouts/admin/author/js/script.js"></script>';

?>

<section id="form">
  <form action="/admin/author/edit/<?= $authors->id ?>" method="post" enctype="multipart/form-data">
    <?php echo $_SESSION[ 'error' ] ?? ''; unset( $_SESSION[ 'error' ] ); ?>
    <label for="file">
      <div class="imgbx">
        <img src="/uploads/author/<?= $authors->img ?>" style="width: 200px; height: 200px" alt="">
      </div>
      <input type="file" name="file" id="file">
    </label>
    <div class="inputcontent">
      <div class="inputbx">
        <label for="firstname">First name</label>
        <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" value="<?= $authors->first_name ?>" required>
      </div>
      <div class="inputbx">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" value="<?= $authors->name ?>" required>
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
      <input name="description" placeholder="Enter your description" value="<?= $authors->description ?>" id="description" required>
    </div>
    <div class="inputbx">
      <label for="info">Infos</label>
      <textarea name="info" placeholder="Enter information" id="info" required><?= $authors->info ?></textarea>
    </div>
    <input type="submit" value="Save">
  </form>
</section>

