<?php
ob_start();
session_start();
?>


<html lang = "en">

<head>
    <title>Please login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet">


</head>

<body>

<h3>Please login</h3>

<div class = "container login-div">

    <form class = "form-signin" role = "form"
          action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
          ?>" method = "post">
        <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
        <input type = "text" class = "form-control"
               name = "username" placeholder = "user"
               required autofocus></br>
        <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
        <br>
        <button class = "btn  btn-primary btn-block" type = "submit"
                name = "login">Login</button>
    </form>
    <div class="div-main">
        <a href = "logout.php" tite = "Logout">Clear session</a>
    </div>
</div>

<div class = "form-inline div-main">

    <?php

    if (isset($_POST['login']) && !empty($_POST['username'])
        && !empty($_POST['password'])) {

        require_once 'users.php';
        if(array_key_exists($_POST['username'], $users) &&
            $users[$_POST['username']] == $_POST['password'])
            {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $_POST['username'];

            echo '<h3>Wellcome '.$_POST['username'].'!</h3>';
            include 'lotto.php';
        }else {
            echo 'Wrong username or password';
        }
    }
    ?>
</div> <!-- /container -->


</body>
</html>