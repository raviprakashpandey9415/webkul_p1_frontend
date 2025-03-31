<?php
require 'signup.php';
if (isset($_SESSION['USER_LOGGEDIN']) && $_SESSION['USER_LOGGEDIN'] == true) {

} else {
    $userData = $_POST;
    if (count($userData) > 0 &&
        isset($userData['fullName']) &&
        isset($userData['dob']) &&
        isset($userData['email']) &&
        isset($userData['password']) &&
        isset($userData['conf-password']) &&
        $userData['password'] == $userData['conf-password']) {
            print_r($userData);
            $userCreated = SignUp::createUser($userData);
            if ($userCreated) {
                /**
                 * Session Create
                 * Homepage redirect
                 */
            } else {
                SignUp::render();
            }
    } else {
        SignUp::render();
    }
}