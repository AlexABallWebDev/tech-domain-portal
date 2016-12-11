<?php
/*
 * Green River Tech Domain Password Reset Portal
 * Copyright (C) 2016 Organized Anarchy
 * MIT License
 */
$config = array(
  "db" => "mysql:host=localhost;dbname=portaldomain",
  "username" => "portaluser",
  "password" => "thepassword"
);

return new PDO($config["db"], $config["username"], $config["password"]);
?>
