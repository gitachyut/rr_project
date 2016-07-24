<?php
/*
* Header function
*/
$this->get_header();
var_dump($_GET);
?>
<div class="container">
      <h1>contact page</h1>
      <form class="" action="<?= base_url() ?>/contact/form/" method="post">
          <input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
          <input type="text" name="name" value="">
          <input type="text" name="email" value="">
          <input type="submit"  value="submit">
      </form>
      <?=  $this->data["result"][0]["name"]  ?>
      <form class="" action="<?= base_url() ?>/contact/xyz/" method="post">
          <input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
          <input type="text" name="name" value="">
          <input type="text" name="email" value="">
          <input type="submit"  value="submit">
      </form>
      <?=   $this->data["pagination"]; ?>
</div>
<?php
  $this->get_footer();
?>
