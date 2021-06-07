<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Server Variables</title>
</head>
<body>
<?php 
 echo "server details  <br/>*****************<br/>";
 echo "Server Name : ". $_SERVER['SERVER_NAME']."<br/>";
 echo "Server Address : ". $_SERVER['SERVER_ADDR']."<br/>";
 echo "Server Port : ". $_SERVER['SERVER_PORT']."<br/>";
 
 echo "Document Root : ". $_SERVER['DOCUMENT_ROOT']."<br/>";

 echo "Page Details <br/>***************<br/>";
 echo "PHP Self : ". $_SERVER['PHP_SELF']."<br/>";
 echo "Script filename : ". $_SERVER['SCRIPT_FILENAME']."<br/>";
 echo "<br/>";

 echo "Request Details <br/>************************<br/>";
 echo "REMOTE_ADDR: ". $_SERVER['REMOTE_ADDR'] ."<br />";
 echo "REMOTE_PORT: ". $_SERVER['REMOTE_PORT'] ."<br />";
 echo "REQUEST_URI: ". $_SERVER['REQUEST_URI'] ."<br />";
 echo "QUERY_STRING: ". $_SERVER['QUERY_STRING'] ."<br />";
 echo "REQUEST_METHOD: ". $_SERVER['REQUEST_METHOD'] ."<br />";
 echo "REQUEST_TIME: ". $_SERVER['REQUEST_TIME'] ."<br />";
 echo "HTTP_REFERER: ". $_SERVER['HTTP_REFERER'] ."<br />";
 echo "HTTP_USER_AGENT: ". $_SERVER['HTTP_USER_AGENT'] ."<br />";
?>
</body>
</html>