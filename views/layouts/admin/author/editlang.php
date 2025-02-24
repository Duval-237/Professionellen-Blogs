<?php
  $title_page = "Edit Traduction Author";
  $file_css = 'views/layouts/admin/author/css/form.css';
?>

<section id="form">
  <form action="/admin/author/edit/<?= $authors->id_author ?>/<?= $authors->lang_code ?>" method="post">
    <?php echo $_SESSION[ 'error' ] ?? ''; unset( $_SESSION[ 'error' ] ); ?>
    <div class="inputbx">
      <label for="lang">language</label>   
      <select name="lang" id="lang">
        <?php foreach( $language as $lang ): ?>
          <?php if ( $lang->code !== 'fr' ): ?>
          <?php if ( $lang->code == $authors->lang_code ): ?>
          <option value="<?= $lang->code ?>" selected><?= $lang->name ?></option>
          <?php else: ?> 
          <option value="<?= $lang->code ?>"><?= $lang->name ?></option>
          <?php endif; ?> 
          <?php endif; ?> 
        <?php endforeach; ?>
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

