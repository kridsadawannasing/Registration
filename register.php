<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>
    <?php
        require('db.php');

        if(isset($_REQUEST['username']))
        {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($con,$username);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con,$email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con,$password);
            $trn_date = date("Y-m-d H:i:s");

            $query = "INSERT INTO users (username, password, email, trn_date) 
                        VALUES ('$username', '".md5($password)."', 'email', 'trn_date')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo "<div class='form'>
                        <h3>You are registered successfully!!</h3>
                        <br> Click here to <a href='login.php'>Login</a>
                    </div>";
            } 

          } else {
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="username" class="form-control" placeholder="Username" required
                                    autofocus>
                                <label for="inputUserame">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="email" class="form-control" placeholder="Email address"
                                    required>
                                <label for="inputEmail">Email address</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control" placeholder="Password"
                                    required>
                                <label for="inputPassword">Password</label>
                            </div>
                            <hr>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                type="submit">Register</button>
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