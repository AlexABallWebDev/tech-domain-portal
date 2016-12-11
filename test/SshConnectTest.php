<?php
/*
 * Green River Tech Domain Password Reset Portal
 * Copyright (C) 2016 Organized Anarchy
 * MIT License
 */
	error_reporting( E_ALL );
	ini_set('display_errors', 1);

  /**
   * Very simple example test to show that a password can be reset.
   */
	echo "hello world";
  require_once ("../model/SshConnect.php");
	$connection = new SSHConnect();
	$connection->connect();

	//reset user password for bpshonyak to Password01
	$connection->exec('powershell.exe "Set-ADAccountPassword -Identity bpshonyak -Reset -NewPassword (ConvertTo-SecureString -AsPlainText Password01 -Force)"');



?>
