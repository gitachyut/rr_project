<?php
/*
* Header function
*/
$this->get_header();
?>
<div class="container">
<form class="" action="index.html" method="post">

    <fieldset>
      <legend>Register</legend>
      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="name" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
            <input type="text" name="name" value="">

        </div>
      </div>
      </div>
        <div class="col-lg-6">
          <?php // $this->formvalidation->flash->form_error('name') ?>
          </div>
      </div>
      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
          <input type="email" name="email" value="">


        </div>
      </div>
     </div>
        <div class="col-lg-6">
    <!-- Error show -->
          </div>
      </div>

      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="password" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
            <input type="password" name="password" value="">

        </div>
      </div>
      </div>
        <div class="col-lg-6">
          <?php // $this->formvalidation->flash->form_error('name') ?>
          </div>
      </div>



      <div class="row">
      <div class="col-lg-6">
      <div class="form-group">
        <label for="confirm_password" class="col-lg-2 control-label">Confirm Password</label>
        <div class="col-lg-10">
            <input type="password" name="confirm_password" value="">

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
