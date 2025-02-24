<?php
  $title_page = "Add Language";
  $file_css = 'views/layouts/admin/language/css/form.css';
  $file_js = '<script defer src="/views/layouts/admin/language/js/script.js"></script>';
?>

<section id="form">
  <form action="/admin/language/add" method="post" enctype="multipart/form-data">
    <?php echo $_SESSION[ 'error' ] ?? ''; unset( $_SESSION[ 'error' ] ); ?>
    <label for="file">
      <div class="imgbx">
        <img src="/uploads/website/uplaod.svg" alt="">
      </div>
      <span>46 X 28</span>
      <input type="file" name="file" id="file" required>
    </label>
    <div class="inputbx">
      <input type="text" name="code" maxlength="2" placeholder="code" required>
      <input type="text" name="name" placeholder="name" required>
    </div>
    <input type="submit" value="Add">
  </form>
</section>

