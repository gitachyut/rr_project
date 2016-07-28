<?php
/*
* Header function
*/
$this->get_header('monkey/header');

?>
<div class="container-fluid">
  <div class="row">
    <?php if($this->count  == 0){  ?>
      <h3 style="text-align:center;">Sorry Nothing Found!</h3>
    <?php } ?>
    <?php foreach ($this->monkeys as $key => $monkey): ?>
  <div class="col-lg-4">
    <div class="panel panel-primary ">
      <div class="panel-heading">
        <h3 class="panel-title">
        <a href="<?= base_url() ?>/monkey/profile/<?= $monkey['id'] ?>">
          <?= _e($monkey['username']) ?>
        </a>
        </h3>
      </div>
      <div class="panel-body">
        <h5><?= _e($monkey['email']) ?></h5>
        Age: <?= _e($monkey['age']) ?><br>
      </div>
    </div>
  </div>
<?php   endforeach; ?>
    <div class="col-lg-12 pagination-centered">
      <?=  $this->paginate->show(); ?>
    </div>
</div>
</div>


<?php
  $this->get_footer('monkey/footer');
?>
