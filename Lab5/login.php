<?php
    require("connect.php");
    if(isset($_POST['SubmitForm']))
    {
        if(isset($_POST['InputEmail']))
        {
            if(isset($_POST['InputPassword']))
            {
                if(preg_match('/\S+@\S+\.\S+/', $_POST['InputEmail']))
                {
                    if(!strcmp("ShaswatChand98", $_POST['InputPassword']))
                    {
                        $_SESSION['email'] = $_POST['InputEmail'];
                        header('location: admin.php');
                    }
                    else
                    {
                    ?>
                        <script>alert("Incorrect Password.")</script>
                    <?php
                    }
                }
                else
                {
                ?>
                    <script>alert("Incorrect Email Address.")</script>
                <?php
                }
            }
        }
    }
?>
<html>

    <head>
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Sports Documentary</title>
    </head>
    
    <body>

        <header>
            <div class="overlay"></div>

            <div class="back-button">
                <a href="index.php"><p>< Back</p></a>
            </div>

            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="photos/football.mp4" type="video/mp4">
            </video>

            <div class="container h-100">
                <div class="d-flex h-100 align-items-center">
                    <div class="form-div w-100 text-white">
                        <center>
                            <form class="login-form" method="POST" action="">
                                <h3>Login</h3>
                                <br>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="InputEmail" id="InputEmail" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="InputPassword" id="InputPassword" placeholder="Password" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="SubmitForm">Submit</button>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </header>

    </body>

</html>