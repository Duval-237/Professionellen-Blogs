<?php
$title_page = "Edit Article";
$file_css = 'views/layouts/admin/articles/css/form.css';
$file_js = '<script src="/views/layouts/admin/articles/js/script.js"></script>';
?>
<?php require_once ROOT . "/views/layouts/admin/articles/uploads.php" ?>
<section id="form">
  <form action="/admin/articles/edit/<?= $id ?>" method="post" enctype="multipart/form-data">
    <div class="inputbx">
      <label for="img_intro">Image</label>
      <label for="img_intro">
        <div class="imgbx">
          <img src="/uploads/articles/<?= $articles->id ?>/<?= $articles->img ?>" style="width: 480px;">
        </div>
        <input type="file" name="miniature" id="img_intro">
      </label>
    </div>
    <div class="inputbx">
      <label for="lang">language</label>
      <select name="lang" id="lang" required>
        <option value="fr">Francais</option>  
      </select>
    </div>
    <div class="inputbx">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" placeholder="Enter the title" value="<?= $articles->title ?>" required>
    </div>
    <div class="inputbx">
      <label for="slug">Slug</label>
      <input type="text" name="slug" id="slug" placeholder="technogan.com/" value="<?= $articles->slug ?>" required>
    </div>
    <div class="inputbx">
      <label for="description">Description</label>
      <textarea name="description" id="description" placeholder="Enter the description" required><?= $articles->description ?></textarea>
    </div>
    <div class="content-category">
      <div class="inputbx">
        <label for="category">Category</label>
        <select name="category" id="category" required>
          <option value="" hidden>Select category</option>
          <?php foreach( $categories as $category ): ?>
            <?php if ( $category->id === $articles->id_category ): ?>
              <option value="<?= $category->id ?>" selected><?= $category->name ?></option>
            <?php else: ?>
              <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="inputbx">
        <label for="tags">Tags</label>
        <select name="tags" id="tags"  data-tags="<?= $articles->id_tags ?>" required>
          <option value="" hidden>Select tags</option>
        </select>
      </div>
    </div>
    <div class="inputbx">
      <label for="author">Author</label>
      <select name="author" id="author" required>
        <option value="" hidden>Select author</option>
        <?php foreach( $authors as $author ): ?>
          <?php if( $author->id === $articles->id_author ): ?>
            <option value="<?= $author->id ?>" selected><?= "$author->first_name $author->name" ?></option>
          <?php else: ?>
            <option value="<?= $author->id ?>"><?= "$author->first_name $author->name" ?></option>
        <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="inputbx">
      <label for="intro">Introduction</label>
      <textarea name="intro" id="intro" placeholder="Enter the introduction" required><?= $articles->intro ?></textarea>
    </div>
    
    <div class="content">
      <div class="buttonbx">
        <div class="btn btn-blog">
          <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 337.76 382.66"><path d="M4351.18,773.87q0-88.71-.05-177.41c0-3.22.78-5.05,3.74-6.75q74.93-43,149.71-86.23c1.15-.67,2.35-1.28,4.17-2.27v4.48q0,86.66.07,173.3c0,3-1,4.6-3.61,6.09q-74.4,42.78-148.68,85.77c-1.59.91-3.07,2-4.6,3Z" transform="translate(-4171.07 -391.21)"/><path d="M4328,773.87c-8.43-5-16.82-10.11-25.31-15q-64.11-37.07-128.27-74c-2.1-1.2-3.32-2.36-3.31-5.11q.14-87.6.07-175.19c0-.86.09-1.72.17-3.26,1.35.71,2.38,1.21,3.37,1.78q75.63,43.65,151.31,87.22c2.43,1.4,2.74,3,2.73,5.42q0,89.1,0,178.18Z" transform="translate(-4171.07 -391.21)"/><path d="M4497.35,481.59l-29.62,17.12q-62.32,36-124.65,72c-1.92,1.11-3.42,1.67-5.72.34q-76.17-44.14-152.46-88.09c-.65-.37-1.26-.78-2.22-1.38,1.19-.75,2.15-1.4,3.15-2q75.43-43.56,150.85-87.15c2-1.18,3.6-1.8,6-.38q75.84,44,151.8,87.73C4495.37,480.25,4496.18,480.83,4497.35,481.59Z" transform="translate(-4171.07 -391.21)"/></svg>
        </div>
        <div class="btn btn-separe"></div>
        <div class="btn btn-bold">
          <svg id="Calque_1" data-name="Calque 1" style="width: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 224.01"><path d="M4291.48,196.13a63.26,63.26,0,0,0,15.45-41.2,64.07,64.07,0,0,0-64-64h-96a16,16,0,0,0,0,32h8v160h-8a16,16,0,0,0,0,32h112a63.81,63.81,0,0,0,32.55-118.81Zm-104.55-73.19h56a32,32,0,0,1,0,64h-56Zm72,160h-72v-64h72c17.65,0,32,14.36,32,31.55S4276.58,282.93,4258.93,282.93Z" transform="translate(-4130.93 -90.93)"/></svg>
        </div>
        <div class="btn btn-italic">
          <svg id="Calque_1" data-name="Calque 1" style="width: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 141.39 164.96"><path d="M4432.33-118.38a11.78,11.78,0,0,1-11.79,11.78h-21.6L4349.86,11.23h23.55a11.78,11.78,0,1,1,0,23.56h-70.69a11.78,11.78,0,1,1,0-23.56h21.6L4373.4-106.6h-23.55a11.78,11.78,0,0,1-11.79-11.78,11.78,11.78,0,0,1,11.79-11.79h70.69A11.79,11.79,0,0,1,4432.33-118.38Z" transform="translate(-4290.93 130.17)"/></svg>
        </div>
        <div class="btn btn-link">
          <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 221.46 221.5"><path d="M2930.64,961.72c-.55,3-1,6.08-1.65,9.08a58.14,58.14,0,0,1-15.91,28.69q-16.64,16.82-33.47,33.46c-7.09,7-18,4.15-20.43-5.26a11.29,11.29,0,0,1,2-9.81,22.45,22.45,0,0,1,2.3-2.57c10.74-10.76,21.52-21.49,32.23-32.26,11.9-12,14.44-29.84,6.27-43.68-12.27-20.8-39.71-24.3-57-7.21-11,10.9-21.91,21.9-32.88,32.84-4.42,4.4-9.78,5.34-14.77,2.67-6.56-3.51-8.7-12.59-3.53-17.9,12.9-13.26,25.41-27.08,39.52-39,26.91-22.69,67.39-16.14,87.17,13.06a58.48,58.48,0,0,1,9.73,26.49c.09.77.27,1.52.41,2.29Z" transform="translate(-2709.18 -897.18)"/><path d="M2765,1118.68c-3.47-.62-7-1-10.38-1.89-22.7-6.3-37.72-20.73-43.47-43.58-5.46-21.72.31-40.94,15.92-57,10.84-11.16,22-22,33-33.05,3.48-3.49,7.57-5,12.4-3.55a11.45,11.45,0,0,1,8.29,8.85,11.28,11.28,0,0,1-2,9.61,23.42,23.42,0,0,1-2.3,2.58c-10.74,10.76-21.53,21.47-32.24,32.27-11.22,11.3-14.1,27.27-7.55,41.2,10.61,22.55,40.11,27.57,58.12,9.8,11.08-10.93,22-22,33-33,4.49-4.47,9.9-5.33,15-2.5a11.92,11.92,0,0,1,3.47,17.72c-.32.39-.63.8-1,1.15-11.9,11.85-23.65,23.85-35.74,35.49-9.61,9.25-21.38,14.15-34.62,15.53a16.54,16.54,0,0,0-1.67.35Z" transform="translate(-2709.18 -897.18)"/><path d="M2785.42,1053.81a12,12,0,0,1-8.66-19.36,20.65,20.65,0,0,1,1.87-2.09l65.72-65.72c4.8-4.81,10.21-5.79,15.44-2.85a11.89,11.89,0,0,1,3.62,17.4,26.7,26.7,0,0,1-2.3,2.57q-32.7,32.73-65.39,65.43C2793,1051.9,2790,1053.79,2785.42,1053.81Z" transform="translate(-2709.18 -897.18)"/></svg>
        </div>
        <div class="btn btn-span">
          <svg viewBox="0 0 448 512"><path d="M416 288C433.7 288 448 302.3 448 320C448 337.7 433.7 352 416 352H32C14.33 352 0 337.7 0 320C0 302.3 14.33 288 32 288H416zM416 160C433.7 160 448 174.3 448 192C448 209.7 433.7 224 416 224H32C14.33 224 0 209.7 0 192C0 174.3 14.33 160 32 160H416z"/></svg>
        </div>
        <div class="btn btn-separe"></div>
        <div class="btn btn-h2">
          <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 569.54 411.69"><path d="M4966.25-477.74c-41.62,4.18-45.46,7.12-45.46,50.62V-224c0,43.49,4.36,46.08,45.46,50.1v17.66H4812.48v-17.66c42-5.22,45.45-6.61,45.45-50.1v-100.3H4703.88V-224c0,43.31,4.52,45.56,44.94,50.1v17.66H4595.57v-17.66c39.9-4.36,45.27-6.61,45.27-50.1V-427.12c0-43.5-4.69-47.12-45.27-50.62V-495.4h153.25v17.66c-40.4,3.65-44.94,7.31-44.94,50.62v77.55h154.05v-77.55c0-43.31-5.4-46.63-45.45-50.62V-495.4h153.77Z" transform="translate(-4595.57 495.4)"/><path d="M5165.11-146c-6,20.6-13.46,46-17.51,62.29H4987.82V-94.22c21.75-21.34,45.52-45.24,65.89-68.32,28.67-32.6,46.13-61.84,46.13-94.7,0-30.45-15.45-49.36-43.7-49.36-25.57,0-43,18.7-55.36,36.6l-11.16-9.55L5014.55-316c13.34-15.49,34.89-24.82,59.69-24.82,39.79,0,72.53,27.11,72.53,71.63,0,32.58-12.29,56.09-52.6,94.58-16.36,15.86-40,38.19-55.61,52.16h71.3c24,0,29.26-1.76,43.81-27.27Z" transform="translate(-4595.57 495.4)"/></svg>
        </div>
        <div class="btn btn-h3">
          <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 563.11 396.55"><path d="M4966.24-1402.22c-41.61,4.18-45.45,7.12-45.45,50.62v203.16c0,43.49,4.36,46.08,45.45,50.1v17.66H4812.48v-17.66c42-5.22,45.45-6.61,45.45-50.1v-100.3H4703.88v100.3c0,43.31,4.52,45.56,44.94,50.1v17.66H4595.57v-17.66c39.9-4.36,45.27-6.61,45.27-50.1V-1351.6c0-43.5-4.69-47.12-45.27-50.62v-17.66h153.25v17.66c-40.4,3.65-44.94,7.31-44.94,50.62V-1274h154.05v-77.55c0-43.31-5.4-46.63-45.45-50.62v-17.66h153.76Z" transform="translate(-4595.57 1419.88)"/><path d="M4998.69-1234.38l19.82-26.3c11.48-13,30.63-24.67,56.45-24.67,40.54,0,64.57,25.19,64.57,55.44,0,11.36-5.53,22.13-13.34,29.44-7,6.62-17.27,13.91-30.33,21.87,40.29,8.36,62.83,31.75,62.83,61.84-.27,65-85.13,93.42-112,93.42-19.82,0-36.71-7-44-13.64-6.43-5.53-8.44-10.23-8.44-15.47.14-7.27,5.67-14.93,10.37-18.29s9.52-3.1,14.48.67c9.61,8.67,27.92,24.62,51.79,24.62,23.63,0,41.12-17.39,41.12-55.62-.14-37.52-28.06-52.1-51.61-52.1a95.25,95.25,0,0,0-24,3.14l-2.84-13.46c36.83-12.27,60.73-26.63,60.73-55,0-24.94-16.18-37.4-36-37.4-21.37,0-36.41,13.45-49.57,31.21Z" transform="translate(-4595.57 1419.88)"/></svg>
        </div>
        <div class="btn btn-paragraph">
          <svg id="Calque_1" data-name="Calque 1" style="width: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 273.89 339.2"><path d="M4739-566.87c39.77,0,70.53,7.12,91.93,21.76,24.08,16.49,38.51,41.36,38.51,76.81,0,75.86-64.55,107.32-118.2,107.66a116.5,116.5,0,0,1-15.11-1l-32.28-8.38v74.63c0,43.83,3.66,45.56,50,50.1v17.66H4595.57v-17.66c41.15-4.7,45.27-6.81,45.27-50.47V-497.88c0-44.75-5.4-48.17-45.27-51.33v-17.66ZM4703.88-390.7c6.27,3.14,18,5.77,31.32,5.77,27.84,0,68.44-15.37,68.44-83.16,0-58.08-33.85-78.67-71.24-78.67-12.42,0-20.32,2.61-23.45,5.59-3.84,3.31-5.07,8.9-5.07,18.92Z" transform="translate(-4595.57 566.87)"/></svg>
        </div>
        <div class="btn btn-citation">
          <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76.1 63.61"><path d="M3330.69,994.25c.15-1.3.27-2.61.45-3.9a48.19,48.19,0,0,1,8-21.26,28.5,28.5,0,0,1,9.66-9.06,16.23,16.23,0,0,1,9.72-2.06,2,2,0,0,1,1.79,2.48c-.58,2.2-1.21,4.38-1.84,6.57a1.84,1.84,0,0,1-1.46,1.43c-4.64.82-7.58,3.85-9.91,7.63a43,43,0,0,0-4.51,10.78.64.64,0,0,0,0,.22,43.43,43.43,0,0,1,4.53-1,18.41,18.41,0,0,1,14.33,4,17.3,17.3,0,0,1,6.37,11.38,17.62,17.62,0,0,1-9.47,18c-7.1,3.44-13.84,2.47-20-2.29-3.48-2.7-5.42-6.54-6.47-10.76-.53-2.13-.74-4.33-1.09-6.5,0-.24-.09-.48-.14-.72Z" transform="translate(-3330.69 -957.87)"/><path d="M3381.38,987.09a41.19,41.19,0,0,1,4.58-1c6.7-.71,12.44,1.27,16.83,6.5a17.22,17.22,0,0,1,4,11.91,17.75,17.75,0,0,1-13.91,16.53,18.36,18.36,0,0,1-15.62-3.8,18.85,18.85,0,0,1-5.84-8.62,36.18,36.18,0,0,1-1.82-14.34,50.18,50.18,0,0,1,4.52-18.34,36.36,36.36,0,0,1,10.17-13.62,18.48,18.48,0,0,1,11-4.4,12.7,12.7,0,0,1,2.3.15,1.92,1.92,0,0,1,1.55,2.39c-.59,2.23-1.23,4.43-1.86,6.65a1.84,1.84,0,0,1-1.49,1.4c-4.55.8-7.46,3.76-9.78,7.46A42.79,42.79,0,0,0,3381.38,987.09Z" transform="translate(-3330.69 -957.87)"/></svg>
        </div>
        <div class="btn btn-code">
          <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 394.36 304.45"><path d="M3955.89,196.54c-1.78,8.3-7,14.26-12.87,20-23,22.78-45.77,45.72-68.67,68.58-10.12,10.1-22.15,12.09-33.59,5.67-13.69-7.69-17.36-26.75-7.47-39a63,63,0,0,1,4.4-4.84q25.57-25.62,51.19-51.21c1-1,1.91-2,3-3.16-1.11-1.17-2-2.19-3-3.17q-26.13-26.15-52.28-52.29c-9.76-9.81-11.64-22.11-5.27-33.34,7.67-13.5,26.63-17.17,38.73-7.45a64.18,64.18,0,0,1,5.14,4.62c22.63,22.58,45.17,45.25,67.87,67.75,5.84,5.78,11,11.77,12.84,20.06Z" transform="translate(-3561.53 -40.55)"/><path d="M3835.4,68.53a69.55,69.55,0,0,1-2.71,9.92Q3781.92,203,3731,327.5c-4.61,11.25-15,18.19-25.63,17.45-12.32-.86-21.4-8.07-24.71-19.67-1.92-6.75-.54-13.16,2-19.47q34-83.05,67.95-166.12,16.52-40.38,33-80.77c4.14-10.16,11.11-16.75,22.32-18.16C3821.38,38.8,3835.21,50.91,3835.4,68.53Z" transform="translate(-3561.53 -40.55)"/><path d="M3624.39,192.73a47.75,47.75,0,0,1,4.26,3.25q26.17,26.1,52.27,52.27c12.6,12.7,11.58,31-2.13,41.22a26.3,26.3,0,0,1-31.51-.59,55.74,55.74,0,0,1-4.31-3.82q-36.09-36-72.14-72.14c-10.13-10.14-12.11-22.56-5.33-33.91a34.7,34.7,0,0,1,5.31-6.55Q3607,136.19,3643.22,100C3656,87.27,3674,88,3684.5,101.51c6.93,8.95,6.95,22.6,0,31.52a59.22,59.22,0,0,1-4.62,5.14q-25.58,25.62-51.2,51.17C3627.67,190.33,3626.46,191.1,3624.39,192.73Z" transform="translate(-3561.53 -40.55)"/></svg>
        </div>
        <div class="btn btn-separe"></div>
        <div class="btn btn-ul">
          <svg viewBox="0 0 512 512"><path d="M16 96C16 69.49 37.49 48 64 48C90.51 48 112 69.49 112 96C112 122.5 90.51 144 64 144C37.49 144 16 122.5 16 96zM480 64C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H192C174.3 128 160 113.7 160 96C160 78.33 174.3 64 192 64H480zM480 224C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H192C174.3 288 160 273.7 160 256C160 238.3 174.3 224 192 224H480zM480 384C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384H480zM16 416C16 389.5 37.49 368 64 368C90.51 368 112 389.5 112 416C112 442.5 90.51 464 64 464C37.49 464 16 442.5 16 416zM112 256C112 282.5 90.51 304 64 304C37.49 304 16 282.5 16 256C16 229.5 37.49 208 64 208C90.51 208 112 229.5 112 256z"/></svg>
        </div>
        <div class="btn btn-ol">
          <svg viewBox="0 0 576 512"><path d="M55.1 56.04C55.1 42.78 66.74 32.04 79.1 32.04H111.1C125.3 32.04 135.1 42.78 135.1 56.04V176H151.1C165.3 176 175.1 186.8 175.1 200C175.1 213.3 165.3 224 151.1 224H71.1C58.74 224 47.1 213.3 47.1 200C47.1 186.8 58.74 176 71.1 176H87.1V80.04H79.1C66.74 80.04 55.1 69.29 55.1 56.04V56.04zM118.7 341.2C112.1 333.8 100.4 334.3 94.65 342.4L83.53 357.9C75.83 368.7 60.84 371.2 50.05 363.5C39.26 355.8 36.77 340.8 44.47 330.1L55.59 314.5C79.33 281.2 127.9 278.8 154.8 309.6C176.1 333.1 175.6 370.5 153.7 394.3L118.8 432H152C165.3 432 176 442.7 176 456C176 469.3 165.3 480 152 480H64C54.47 480 45.84 474.4 42.02 465.6C38.19 456.9 39.9 446.7 46.36 439.7L118.4 361.7C123.7 355.9 123.8 347.1 118.7 341.2L118.7 341.2zM512 64C529.7 64 544 78.33 544 96C544 113.7 529.7 128 512 128H256C238.3 128 224 113.7 224 96C224 78.33 238.3 64 256 64H512zM512 224C529.7 224 544 238.3 544 256C544 273.7 529.7 288 512 288H256C238.3 288 224 273.7 224 256C224 238.3 238.3 224 256 224H512zM512 384C529.7 384 544 398.3 544 416C544 433.7 529.7 448 512 448H256C238.3 448 224 433.7 224 416C224 398.3 238.3 384 256 384H512z"/></svg>
        </div>
        <div class="btn btn-separe"></div>
        <div class="btn btn-img">
          <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 220.91 213.46"><path d="M4014.25-71.63h-78.76c-15.65,0-25.46-9.85-25.46-25.5q0-59.1,0-118.21c0-15.63,9.82-25.42,25.52-25.43q72.06,0,144.12,0c15.48,0,25.41,9.89,25.42,25.27q0,37.17,0,74.33v3.07c-22.77-8.48-44.45-7-64.18,7.41S4012.77-96.22,4014.25-71.63Zm77.49-105.87a7.37,7.37,0,0,0,.29-1.24c0-12.79.12-25.59,0-38.38-.08-6.61-4.41-10.53-11.23-10.53q-73.26,0-146.54,0c-7.12,0-11.3,4.29-11.3,11.45q0,49.66,0,99.31a19.61,19.61,0,0,0,.23,2.15l.74.39a21.34,21.34,0,0,1,1.84-2.44c9.8-9.73,19.55-19.52,29.46-29.13,13-12.57,31.21-12.52,44.26,0l7.3,7c.91-.85,1.66-1.52,2.38-2.23q14.29-14.13,28.59-28.27a45.48,45.48,0,0,1,19.61-11.78C4069.22-184.66,4080.61-183.29,4091.74-177.5Z" transform="translate(-3910.02 240.78)"/><path d="M4078.85-130.15c33.78.44,52.65,24.91,52.07,52.2a51.69,51.69,0,0,1-53.14,50.62c-29.1-.71-51.55-24.67-50.63-54C4028-108.26,4052-130.91,4078.85-130.15ZM4118-78.24a38.81,38.81,0,0,0-38.82-38.95,39.11,39.11,0,0,0-39.19,39,39.15,39.15,0,0,0,39.23,39A39,39,0,0,0,4118-78.24Z" transform="translate(-3910.02 240.78)"/><path d="M3974.61-212.29a24.09,24.09,0,0,1,24.18,24.16,24.07,24.07,0,0,1-24,24,24.27,24.27,0,0,1-24.24-24.18A24.16,24.16,0,0,1,3974.61-212.29Z" transform="translate(-3910.02 240.78)"/><path d="M4084.89-71.63c0,4.23,0,8,0,11.72-.06,4.67-2.55,7.63-6.42,7.73s-6.6-3-6.67-7.77c-.05-3.55,0-7.1-.07-10.65a5.55,5.55,0,0,0-.3-1c-4,0-8.09.12-12.2,0-5-.19-8-4.35-6.46-8.68,1.12-3.06,3.55-4.31,6.66-4.36,3.94,0,7.89,0,12.36,0v-6.09c0-2.23-.09-4.47,0-6.7.23-4,3-6.67,6.52-6.66s6.33,2.72,6.48,6.69c.16,4.13,0,8.27,0,12.76,4.36,0,8.39-.1,12.41,0,5.18.16,8.32,4.42,6.58,8.83-1.19,3-3.66,4.2-6.75,4.23C4093.17-71.61,4089.23-71.63,4084.89-71.63Z" transform="translate(-3910.02 240.78)"/></svg>
        </div>
      </div>
      <textarea name="content" id="content" required><?= $articles->content ?></textarea>
    </div>
    <input type="submit" value="Save">
  </form>
</section>

