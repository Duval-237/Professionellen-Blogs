<?php
  $title_page = "Admin";
  $file_css = 'views/layouts/admin/style.css';
?>

<div class="container">
  <div class="content design">
    <div class="circle"></div>
    <div class="circle"></div>
  </div>
  <div class="content">
    <div class="box-form">
      <h2>Login</h2>
      <span>Please enter your details !</span>
      <?php 
        if ( isset( $_SESSION[ 'error' ] ) ) {
          echo "<div class=\"error\">{$_SESSION[ 'error' ]}</div>";
          unset( $_SESSION[ 'error' ] );
        }
        echo $formulaire;
      ?>
      
      <?php
      /*<form action="/admin" method="post">
        <div class="inputbx">
          <input type="text" name="id" placeholder="ID" required autocomplete="off" value="<?= $_POST[ 'id' ] ?? ''?>">
        </div>
        <div class="inputbx">  
          <input type="passowrd" name="password" placeholder="Passowrd" required autocomplete="off" value="<?= $_POST[ 'password' ] ?? ''?>">
        </div>
        <div class="inputbx">
          <input type="submit" value="Login">
        </div>
      </form> */
      ?>
    </div>
  </div>
</div>

