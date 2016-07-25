<?php
/*
* Header function
*/
$this->get_header();

?>
<div class="container">


<form class="" action="<?= base_url() ?>/register/addme/" method="post">
<input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
    <fieldset>
      <legend>Register</legend>
      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="name" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="username"
            value="<?= $this->formvalidation->flash->form_value('username') ?>">

        </div>
      </div>
      </div>
        <div class="col-lg-6">
          <?= $this->formvalidation->flash->form_error('username') ?>
          </div>
      </div>
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

      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="age" class="col-lg-2 control-label">Age</label>
        <div class="col-lg-10">
          <input class="form-control" type="number" name="age"
          value="<?= $this->formvalidation->flash->form_value('age') ?>">
        </div>
      </div>
     </div>
        <div class="col-lg-6">
          <?= $this->formvalidation->flash->form_error('age') ?>
          </div>
      </div>

      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="password" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
            <input class="form-control" type="password" name="password"
            value="<?= $this->formvalidation->flash->form_value('password') ?>">

        </div>
      </div>
      </div>
        <div class="col-lg-6">
          <?= $this->formvalidation->flash->form_error('password') ?>
          </div>
      </div>



      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="confirm_password" class="col-lg-2 control-label">Confirm Password</label>
        <div class="col-lg-10">
            <input class="form-control" type="password" name="confirm_password"
            value="<?= $this->formvalidation->flash->form_value('confirm_password') ?>">

        </div>
      </div>
      </div>
        <div class="col-lg-6">
            <?= $this->formvalidation->flash->form_error('confirm_password') ?>
          </div>
      </div>


      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Reset</button>
          <button type="submit" class="btn btn-primary">Register</button>
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
