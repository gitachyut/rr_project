<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=   @$this->data["meta_title"]; ?></title>
    <meta name="Description" content="<?=   @$this->data["meta_desc"]; ?>">
  </head>
  <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?= base_url() ?>/css/styles.css" media="screen" title="no title" charset="utf-8">
  <body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url(); ?>">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

          <form class="navbar-form navbar-left" action="<?= base_url(); ?>/monkey/search" method="GET">
            <input type="hidden" name="csrf_token" value="<?= Csrf::csrf_token(); ?>">
            <div class="form-group">
              <input class="form-control" placeholder="Name or Email" name="search" type="text">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
          </form>

          <ul class="nav navbar-nav navbar-right">


            <li><a href="<?= base_url(); ?>/monkey/all/">List All Monkeys</a></li>



          </ul>
        </div>
      </div>
    </nav>
