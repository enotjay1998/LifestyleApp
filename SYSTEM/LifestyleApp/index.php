<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lifestyle app</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="signup.php">Sign up </a>
                <button class="navbar-toggle collapsed hidden" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav"></ul>
            </div>
        </div>
    </nav>
    <div class="login-card">
        <p id="appname">Lifestyle App For Diabetic</p>
        <form class="form-signin" method="post" action="server.php"><span class="reauth-email"> </span>
            <input class="form-control" type="text" required="" placeholder="Username" autofocus="" name="username" maxlength="15">
            <input class="form-control" type="password" required="" placeholder="Password" name="password" maxlength="20">
            <div class="checkbox">
                <div class="checkbox">
                    <label>
                        <input type="checkbox">Remember me</label>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="signin">Sign in</button>
        </form><a href="#" class="forgot-password">Forgot your password?</a><br/>
                <?php if(isset($_GET['login_attempt']) and ($_GET['login_attempt']==1)) {?>
            <font color="red" class="error">Bad Username or Password. Please try again. <br/></font>
            <?php } ?></div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>