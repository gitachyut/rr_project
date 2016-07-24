<?php
/*
* Header function
*/
$this->get_header();
?>
<div class="container">
      <h1>contact page</h1>
      <?= $this->flash_get('fail'); ?>
      <form class="" action="<?= base_url() ?>/contact/form/" method="get">
          <input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
          <input type="text" name="name" value="">
          <input type="text" name="email" value="">
          <input type="submit"  value="submit">
      </form>
      <pre>
      <?=  var_dump($this->data["result"])  ?>
      </pre>
      <?=   $this->data["pagination"]; ?>
</div>
<?php
  $this->get_footer();
?>
