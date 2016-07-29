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
          <a class="pull-right" href="<?= base_url() ?>/monkey/profile/<?= $monkey['id'] ?>">
              <i>View Profile</i>
          </a>
        </h3>
      </div>
      <div class="panel-body">
        <h5><?= _e($monkey['email']) ?></h5>
        <b><i>Age:</i></b> <?= $monkey['age'] ?><br>
        <b><i>Friends:</i></b> <?= $monkey['friendcount'] ?><br>
        <?php if(!is_null($monkey['favfriend']) ){ ?>
          <b><i>Favourite Friend:</i></b>
          <a href="<?= base_url() ?>/monkey/profile/<?= $monkey['favfriend_id'] ?>">
            <?= _e($monkey['favfriend']) ?>
          </a>
          <br><?php } ?>
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
