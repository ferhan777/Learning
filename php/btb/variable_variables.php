<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>variable variables</title>
</head>
<body>
 <?php
  $a = "Ragnarok";
  $b = "Bjorn";
  $c = "Lagartha";
  $d = "Floki";
  $e = "Torvi";

  $characters = ['a','c','e'];
  foreach ($characters as $seat) {
  	echo $$seat."<br/>";
  }
?>
</body>
</html>