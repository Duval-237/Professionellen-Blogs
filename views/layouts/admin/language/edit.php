<?php
  $title_page = "Edit Language";
  $file_css = 'views/layouts/admin/language/css/form.css';
  $file_js = '<script defer src="/views/layouts/admin/language/js/script.js"></script>';
?>

<section id="form">
  <form action="/admin/language/edit/<?= $lang->id ?>" method="post" enctype="multipart/form-data">
    <?php echo $_SESSION[ 'error' ] ?? ''; unset( $_SESSION[ 'error' ] ); ?>
    <label for="file">
      <div class="imgbx">
        <img src="/uploads/website/<?= $lang->img ?>" alt="">
      </div>
      <span>46 X 28</span>
      <input type="file" name="file" id="file">
    </label>
    <div class="inputbx">
      <input type="text" name="code" value="<?= $lang->code ?>" maxlength="2" placeholder="code" required>
      <input type="text" name="name" value="<?= $lang->name ?>" placeholder="name" required>
    </div>
    <input type="submit" value="Save">
  </form>
</section>

