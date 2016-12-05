<?php

  require_once ('SshConnect.php');

  class SSHCommand {

    public static function resetPassword($username, $password) {
      $ssh_connection = new SSHConnect();
      $ssh_connection->connect();

      $command = "powershell.exe \"Set-ADAccountPassword -Identity $username -Reset -NewPassword (ConvertTo-SecureString -AsPlainText $password -Force)\"";

      $ssh_connection->exec($command);
    }

    public static function sendPasswordToEmail($emailAddress, $password) {
      $ssh_connection = new SSHConnect();
      $ssh_connection->connect();

      $command = '#email contents.
                  $to = "' . $emailAddress . '"
                  $subject = "PowerShell Test Email"
                  $body = "Your GRC Tech Domain password has been reset to ' . $password . '"

                  #Location of the password in SecureString form.
                  $passFile = "C:\Users\Administrator\grctechportal-gmail-password.txt"

                  #Get password out of the file in SecureString form.
                  $secPassword = (Get-Content $passFile | ConvertTo-SecureString)

                  #Server information.
                  $from = "grctechportal@gmail.com"
                  $smtpServer = "smtp.gmail.com"
                  $smtpPort = "587"

                  #Gmail account credential.
                  $myCredential=New-Object -TypeName System.Management.Automation.PSCredential `
                   -ArgumentList $from, $secPassword

                  #Actually sends the email.
                  Send-MailMessage -From $from -To $to -Subject $subject `
                  -Body $body -SmtpServer $smtpServer -Port $smtpPort -UseSsl `
                  -Credential $myCredential
                  ';

      $ssh_connection->exec($command);
    }

  }

 ?>
