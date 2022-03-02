<?php

session_start();
require('./assets/classUser.php');

$user = new User("correct@email.com", "monmdpcor", 1);
$user2 = new User("email@email.com", "test123", 0);

$email = $_SESSION['email'];
$password = $_SESSION['password'];

if ($user->get_email() == $email && $user->get_password() == $password) {
    $_SESSION['login'] = $email;
    $_SESSION['status'] = $user->get_role();
    header('location:landing.php');
    $_SESSION['connectErr'] = 'infos correctes';
} else {
    $_SESSION['connectErr'] = 'Email et/ou mot de passe incorrect.';
    header('location:index.php');
}
if ($user2->get_email() == $email && $user2->get_password() == $password) {
    $_SESSION['login'] = $email;
    $_SESSION['status'] = $user2->get_role();
    header('location:landing.php');
    $_SESSION['connectErr'] = 'infos correctes';
} else {
    $_SESSION['connectErr'] = 'Email et/ou mot de passe incorrect.';
    header('location:index.php');
}

?>