<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conatct page</title>
  </head>
  <body>
      <h1>contat page</h1>
      <form class="" action="<?= base_url() ?>/contact/form/" method="post">
          <input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
          <input type="text" name="name" value="">
          <input type="text" name="email" value="">
          <input type="submit"  value="submit">
      </form>

      <form class="" action="<?= base_url() ?>/contact/xyz/" method="post">
          <input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
          <input type="text" name="name" value="">
          <input type="text" name="email" value="">
          <input type="submit"  value="submit">
      </form>
      <?php
        echo $data["pagination"];
       ?>
  </body>
</html>
