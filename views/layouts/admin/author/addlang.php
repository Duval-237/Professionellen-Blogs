<?php
  $title_page = "Add Traduction Author";
  $file_css = 'views/layouts/admin/author/css/form.css';
?>

<section id="form">
  <form action="/admin/author/add/<?= $id ?>" method="post">
    <?php echo $_SESSION[ 'error' ] ?? ''; unset( $_SESSION[ 'error' ] ); ?>
    <div class="inputbx">
      <label for="lang">language</label>   
      <select name="lang" id="lang" required>
        <option value="" hidden>Select Language</option>
        <?php foreach ( $language as $lang ): ?>
          <?php if ( $lang->code !== 'fr' ): ?>
          <option value="<?= $lang->code ?>"><?= $lang->name ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
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
