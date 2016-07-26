<?php
/*
* Header function
*/
$this->get_header();

?>
<div class="container-fluid">
  <div class="row">
    <?php if($this->count  == 0){  ?>
      <h3 style="text-align:center;">Sorry Nothing Found!</h3>
    <?php } ?>
    <?php foreach ($this->users as $key => $value) { ?>
  <div class="col-lg-4">
    <div class="panel panel-primary ">
      <div class="panel-heading">
        <h3 class="panel-title">
        <a href="<?= base_url() ?>/user/profile/<?= $value['user_id'] ?>">
          <?= $value['username'] ?>
        </a>
        </h3>
      </div>
      <div class="panel-body">
        <h5><?= $value['email'] ?></h5>
        Age: <?= $value['age'] ?><br>
      </div>
    </div>
  </div>
  <?php   } ?>
    <div class="col-lg-12 pagination-centered">
      <?=  $this->paginate->show(); ?>
    </div>
</div>
</div>


<?php
  $this->get_footer();
?>
