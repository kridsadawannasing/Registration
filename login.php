<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <?php
    require('db.php');
    session_start();

    if(isset($_POST['username']))
    {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$username);
        
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '".md5($password)."' ";
        
        $result = mysqli_query($con,$query) or dir(mysqli_error());
        $rows = mysqli_num_rows($result);

        if($rows == 1)
        {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        }
        else
        {
            echo "
                <div class = 'form'>
                <h3>Username/Password is incorrect.</h3>
                <br>Click here to <a href='login.php'>Login</a>
            ";
        }
    }
    else {  
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" action="" method="post" name="login">
                            <div class="form-label-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required
                                    autofocus>
                                <label for="inputEmail">Username</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="Sign in">
                            <hr class="my-4">
                            <p class="text-center">Not register yet?</p>
                            <a href="register.php" class="btn btn-lg btn-outline-secondary btn-block text-uppercase"
                                role="button" aria-pressed="true">Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script>

    <?php } ?>
</body>

</html>