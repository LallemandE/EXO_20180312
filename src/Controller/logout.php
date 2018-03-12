<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
  </head>
  <body>
    <h1>Do your really want to logout ?</h1>
	<div>var dump</div><div>
<?php
var_dump($_POST);

?>
	</div>

	<br>
    <form method="post">
      <input type="submit" name="logout" value="Logout">
      <input type="reset" name="Cancel" value="Cancel">
    </form>
  </body>
</html>