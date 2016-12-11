<?php
/*
 * Green River Tech Domain Password Reset Portal
 * Copyright (C) 2016 Organized Anarchy
 * MIT License
 */

require_once ("../constants/verificationStatuses.php");
require_once ('User.php');

class EncryptedUser extends User {

  const SALT = "Tvb6ydR0K8mQsAXLiBJS";

  public function __construct($username, $studentID, $verifiedStatus = VERIFICATION_STATUSES["PENDING"]) {
    parent::__construct($username, $studentID, $verifiedStatus);
  }

  /**
   *Create an EncryptedUser from a standard User object
   *@param User $user standard user object
   *@return EncryptedUser encrypted user object
   */
  public static function getEncrpytedUserFromUser (User $user) {
    $username = $user->getUsername();
    $studentID = hash('sha256', $user->getStudentID() . self::SALT);
    $verifiedStatus = $user->getVerifiedStatus();

    return new EncryptedUser($username, $studentID, $verifiedStatus);
  }

}

//$this->studentID =
