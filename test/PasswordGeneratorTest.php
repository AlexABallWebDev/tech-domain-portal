<?php
/*
 * Green River Tech Domain Password Reset Portal
 * Copyright (C) 2016 Organized Anarchy
 * MIT License
 */
use PHPUnit\Framework\TestCase;

require_once ("../utils/PasswordGenerator.php");

/**
 * Class PasswordGeneratorTest
 *
 * Runs tests for the PasswordGenerator class.
 */
class PasswordGeneratorTest extends TestCase {

    /**
     * Asserts that the password generated is of the correct length.
     */
    public function testPasswordLength() {

        $pw = PasswordGenerator::generatePassword(12);

        $this->assertEquals(12, strlen($pw));

    }

}
