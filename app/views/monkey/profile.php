<?php
/*
* Header function
*/
$this->get_header('monkey/header');

?>

<div class="container">
  <div class="jumbotron">
    <h1 ><?= _e($this->profile['username']) ?></h1>
    <a href="<?= base_url() ?>/monkey/edit/<?= $this->profile['id'] ?>" class="btn btn-primary">Edit Account</a>
    <a href="#" id="rmac" class="btn btn-warning">Remove Account</a>

    <div class="profile_tabs">
    <!-- Nav tabs -->
    <ul id="Tabs" class="nav nav-tabs" role="tablist">

      <li role="presentation" class="active">
        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
          Profile
        </a>
      </li>
      <li role="presentation">
        <a href="#friends" aria-controls="friends" role="tab" data-toggle="tab">
         <?= _e(f_name($this->profile['username'])) ?>'s  Friends
        </a>
      </li>
      <li role="presentation">
        <a href="#favfriend" aria-controls="favfriend" role="tab" data-toggle="tab">
         <?= _e(f_name($this->profile['username'])) ?>'s  Favourite Friend
        </a>
      </li>
      <li role="presentation">
        <a href="#addfriends" aria-controls="addfriends" role="tab" data-toggle="tab">
         Add  Friends To <?= _e(f_name($this->profile['username'])) ?>
        </a>
      </li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
          <!-- profile pane start -->
      <div role="tabpanel" class="tab-pane active" id="profile">
        <b><i>Email:</i></b><p>
          <a href="mailto:<?= _e($this->profile['email']) ?>">
          <?= _e($this->profile['email']) ?>
        </a></p>
        <b><i>Age:</i></b><p> <?= $this->profile['age'] ?></p>
          <?php if(!empty($this->profile['bio'])){ ?>
            <b><i>Bio:</i></b>
            <p><?= _e($this->profile['bio']) ?></p>
          <?php } ?>
          <input type="hidden"  id="base_url" value="<?= base_url() ?>">
          <input type="hidden"  id="user_id" value="<?= $this->profile['id'] ?>">
          <input type="hidden"  id="csrf_token" value="<?= Csrf::csrf_token(); ?>">
      </div>
          <!-- profile pane ends -->
          <!-- Friend's pane start -->
      <div role="tabpanel" class="tab-pane" id="friends"></div>
          <!-- Friend's pane end -->
          <!-- Fav Friend's pane start -->
      <div role="tabpanel" class="tab-pane" id="favfriend"></div>
          <!-- Fav Friend's pane ends -->
          <!-- Possible Friend's List pane start -->
      <div role="tabpanel" class="tab-pane" id="addfriends"></div>
          <!-- Possible Friend's List pane end -->
    </div>
    <!-- Tab panes  end-->
  </div>
  </div>
</div>

<!--Modal start  here-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  </div>
</div>
<!--Modal end here-->
<?php
  $this->get_footer('monkey/footer');
?>
