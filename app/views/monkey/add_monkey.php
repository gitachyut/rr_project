<?php
/*
* Header function
*/
$this->get_header('monkey/header');

?>
<div class="container">


<form class="form-horizontal" action="<?= base_url() ?>/monkey/AddMonkey/" method="post">
<input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
    <fieldset>
      <legend>Add Monkey</legend>
      <?=  $this->formvalidation->flash->flash_get('error') ?>
      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="name" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="username" placeholder="Name"
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
          <input class="form-control" type="email" name="email" placeholder="Email"
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
          <input class="form-control" type="number" name="age" placeholder="Age"
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
        <label for="textArea" class="col-lg-2 control-label">Bio</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="bio" rows="3" id="textArea"><?= $this->formvalidation->flash->form_value('bio') ?></textarea>
          </div>
      </div>
      </div>
      <div class="col-lg-6">
        <?= $this->formvalidation->flash->form_error('bio') ?>
        </div>

      </div>

      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Reset</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
      </div>
      </div>
    </fieldset>

  </form>


</div>
<?php
  $this->get_footer('monkey/footer');
?>
