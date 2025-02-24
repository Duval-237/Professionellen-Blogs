<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://technogan.com/uploads/website/technogan.ico" type="image/x-icon">
    <title><?= $title_page ?></title>
    <link rel="shortcut icon" href="/uploads/website/blogtuto.ico" type="image/x-icon">
    <link rel="stylesheet" href="/views/templates/css/style.css">
    <link rel="stylesheet" href="/views/templates/css/login.css">
    <link rel="stylesheet" href="/<?= $file_css ?? '' ?>">
  </head>
  <body class="<?= @$_SESSION[ 'theme' ] ?>">
    <main>
      <?= $content ?? '' ?>
    </main>
  </body>
</html>

