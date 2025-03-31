<?php

require_once('../../backend/controllers/user.php');

class SignUp 
{
    public function __construct() {
        
    }

    public static function render() {
        $rootDir = self::getRootDir();
        $document = new DOMDocument("","");
        @$document->loadHTMLFile($rootDir."/assets/views/Signup.html");
        $userIcon =  "http://localhost/Social%20Media/frontend/assets/images/icons/user.webp";
        $document->getElementById("user-profile-icon")->setAttribute("src", $userIcon);
        echo $document->saveHTML();
    }

    public static function createUser($userData) {
        $user = new User($userData['fullName'], $userData['dob'], $userData['email'], $userData['password'], $userData['profilePicture'] ?? '');
        return $user->create();
    }

    protected static function getRootDir() {
        return dirname(dirname(__FILE__)) ."";
    }
}