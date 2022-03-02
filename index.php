<?php
    
session_start();
if(isset($_SESSION['login'])){ 
    header("Location:landing.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['connectErr'] = null;
    $passwordErr = null;
    $emailErr = null;
    $_SESSION['status'] = null;
    if (isset($_POST['password'])){
        if (strlen($_POST['password']) <= 10 && strlen($_POST['password']) >= 6 ) {
            $_SESSION['password'] = $_POST['password'];
            header('location:loginprocess.php');
        } else {
            $passwordErr = 'a password between 6 and 10 caracters is required.';
        }
    }
    if (empty($_POST['email']) OR filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
        $emailErr = 'a correct email is required.';
    } else {
        $_SESSION['email'] = $_POST['email'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://unpkg.com/papercss@1.8.3/dist/paper.min.css">
    <title>Login</title>
</head>
<body>
    <div class="paper flex-center text-center">
        <p>admin credentials = correct@email.com:monmdpcor</p>
        <p>user credentials = email@email.com:test123</p>
        <h3>Login Page :</h3>
        <p class="alert"><?php if (!empty($_SESSION['connectErr'])) {echo $_SESSION['connectErr'];}?></p>
        <form class="row flex-center" action="index.php" method="POST">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Login</button>
        </form>
        <p class="alert"><?php if (!empty($emailErr)) {echo $emailErr;}?></p>
        <p class="alert"><?php if (!empty($passwordErr)) {echo $passwordErr;}?></p>
    </div>

</body>
</html>