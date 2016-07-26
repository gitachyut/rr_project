<?php
/*
* Header function
*/
$this->get_header();

?>
<div class="container">
  <div class="jumbotron">
    <h1><?= $this->dashboard['username'] ?></h1>
    <p><?= $this->dashboard['email'] ?></p>
    <p>Age:- <?= $this->dashboard['age'] ?></p>
  </div>
</div>
<?php
  $this->get_footer();
?>
