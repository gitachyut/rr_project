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
          <label for="inputEmail" class="col-lg-2 control-label">Email</label>
          <div class="col-lg-10">
            <input type="email" class="form-control" id="inputEmail"   name="email"
            value="<?= $this->formvalidation->flash->form_value('email') ?>"
            placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-lg-2 control-label">Password</label>
          <div class="col-lg-10">
            <input type="password" class="form-control" id="inputPassword"
             name="password"
            value="" placeholder="Password">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" value="true"> Remember me
              </label>
            </div>
          </div>
        </div>


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
