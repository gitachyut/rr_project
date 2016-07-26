<?php
/*
* Header function
*/
$this->get_header();

?>
<div class="container">
  <div class="jumbotron">
    <h1><?= $this->profile['username'] ?></h1>
    <p><?= $this->profile['email'] ?></p>
    <p>Age:- <?= $this->profile['age'] ?></p>
    <a href="#" class="btn btn-primary">Add To Friend List</a>
  </div>
</div>
<?php
  $this->get_footer();
?>
