<?php
/*
* Header function
*/
$this->get_header();
?>
<div class="container">
      <h1>contact page</h1>
      <?= $this->flash->flash_get('fail'); ?>
      <form class="" action="<?= base_url() ?>/contact/form" method="post">
          <input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
          <input type="text" name="name" value="<?= $this->formvalidation->flash->form_value('name') ?>"><br>
          <?= $this->formvalidation->flash->form_error('name') ?><br>
          <input type="text" name="email" value="<?= $this->formvalidation->flash->form_value('email') ?>"><br>
          <?= $this->formvalidation->flash->form_error('email') ?><br>
          <input type="password" name="password" value="<?= $this->formvalidation->flash->form_value('password') ?>"><br>
          <?= $this->formvalidation->flash->form_error('password') ?><br>
          <input type="submit"  value="submit">
      </form>

      <?=   $this->paginate->show(); ?>
</div>
<?php
  $this->get_footer();
?>
