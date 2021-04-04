<?php
session_start();
include('server.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css\style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master\semantic.min.css">



</head>

<body>
    <div class="ui secondary  menu">
        <a class="item1">
            <img class="logo" src="image\TIPS-logo-Blue.png">
        </a>

        <h1 class="textlog" style="color: #362e7e;">ระบบสารสนเทศสวัสดิการพนักงาน</h1>

    </div>

    <p></p>
    <br><br><br>
    <center>
        <img src="https://www.pinclipart.com/picdir/big/164-1640714_user-symbol-interface-contact-phone-set-add-sign.png" style="width: 150px;">
        <br><br><br>
        <div class="container" style="width: 300px;">
            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="success">
                    <h4 style="color: red;">
                        <?php
                        echo $_SESSION['errors'];
                        unset($_SESSION['errors']);
                        ?>
                    </h4>
                </div>
            <?php endif ?>
            <form class="ui form" action="login_db.php" method="post">
                <div class="inline fields">
                    <div class="ui labeled input" style="width: 40px;">
                        <div class="ui label" style="padding-right: 0px; margin-bottom: 5px;">
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <input type="text" style="margin-left: 0px;" width="30" name="username" placeholder="Username">
                </div>
                <div class="inline fields">
                    <div class="ui labeled input" style="width: 40px;">
                        <div class="ui label" style="padding-right: 0px; margin-bottom: 5px;">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <input type="password" style="margin-left: 0px;border-left-width: 0;" name="password" placeholder="Password">
                </div>
                <br>
                <button class="ui blue button" name="login_user">Login</button>
            </form>
        </div>
    </center>

</body>

</html>