<?php
 //$dsn = 'mysql:host=localhost;dbname=oophp'; //for mysql database
 $dsn = 'sqlite:/var/www/html/pdo/sqlite/oophp.db';
 

 $db = new PDO($dsn,'root','root');//second param username then password

?>