<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conatct page</title>
  </head>
  <body>
      <h1>contat page</h1>
      <?php
        echo "<pre>";
        //var_dump( $data );
        foreach ($data as $key => $value) {
          echo $value['name'];
        }
       ?>
  </body>
</html>
