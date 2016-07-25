<?php
/*
* Header function
*/
$this->get_header();

?>
<div class="container">


<form class="" action="<?= base_url() ?>/login/checking/" method="post">
<input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
    <fieldset>
      <legend>Login</legend>
      <?=  $this->formvalidation->flash->flash_get('error') ?>

      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
          <input class="form-control" type="email" name="email"
          value="<?= $this->formvalidation->flash->form_value('email') ?>">
        </div>
      </div>
     </div>
        <div class="col-lg-6">
          <?= $this->formvalidation->flash->form_error('email') ?>
          </div>
      </div>

      <div class="row" style="margin-bottom:20px;">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="password" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
            <input class="form-control" type="password" name="password"
            value="">

        </div>
      </div>
      </div>
        <div class="col-lg-6">
          </div>
      </div>
      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Reset</button>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </div>
      </div>
      </div>
    </fieldset>

  </form>



</div>
<?php
  $this->get_footer();
?>
