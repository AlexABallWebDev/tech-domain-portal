<?php
$config = array(
   "db" => "mysql:host=localhost;dbname=portaldomain",
   "username" => "portaluser",
   "password" => "thepassword"
);

return new PDO($config["db"], $config["username"], $config["password"]);
?>
