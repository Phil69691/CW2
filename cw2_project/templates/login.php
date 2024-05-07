<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buckinghamshire Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 login-container d-flex align-items-center justify-content-center">
                <img src="img/login_img1.jpg" class="img-fluid" alt="Login Image">
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="container mt-5">
                    <form class="form-signin" name="frmLogin" action="authenticate.php" method="post">
                        <h2 class="mb-3 text-center">Login</h2>
                        <div class="form-group">
                            <label for="txtid">Student ID:</label>
                            <input name="txtid" type="text" id="txtid" class="form-control" placeholder="Enter your student ID" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="txtpwd">Password:</label>
                            <input name="txtpwd" type="password" id="txtpwd" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnlogin">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>