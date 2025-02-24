
<div id="addImg" class="">
  <div class="container">
    <form action="" enctype="multipart/form-data" data-id="<?= $articles->id ?? '' ?>">
      <div class="inputbx">
        <label for="img">
          <div class="imgbx">
            <img src="/uploads/website/uplaod.svg">
            <span>720 x 480</span>
          </div>
          <input type="file" name="img" id="img" required>
        </label>
      </div>
      <div class="inputbx">
        <label for="name">Title</label>
        <input type="text" name="title" id="title" placeholder="Enter the title of the image" required>
      </div>
      <button>Uploads</button>
    </form>
  </div>
</div>

