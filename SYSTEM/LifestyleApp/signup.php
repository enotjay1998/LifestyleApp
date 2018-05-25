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
                    <?php if(isset($_GET['password_did_not_match']) and ($_GET['password_did_not_match']==1)) {?>
                    <script type='text/javascript'>alert('Password did not match!');</script>
                    <?php } ?>
                    <?php if(isset($_GET['usn_taken']) and ($_GET['usn_taken']==1)) {?>
                    <script type='text/javascript'>alert('USN already exist!');</script>
                    <?php } ?>
                    <?php if(isset($_GET['signup_success']) and ($_GET['signup_success']==1)) {?>
                    <script type='text/javascript'>alert('You have successfully created an account!');</script>
                    <?php } ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php">Login </a>
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
            <p>Sign-up </p>
            <input class="form-control" type="text" placeholder="First Name" autofocus="" required="" name="fname" maxlength="20">
            <input class="form-control" type="text" placeholder="Last Name" required="" name="lname" maxlength="20">
            <input class="form-control" type="text" placeholder="Middle Initial" required="" name="mi" maxlength="1">
            <label>Birthday: </label>
            <input class="form-control" type="date" placeholder="Birthdate" required="" name="birthday"><br/>
            <label>Gender:</label><br/>
            <LABEL>Male</LABEL>&nbsp<input type="radio" name="gender" value="male" required=""><br/>
            <LABEL>Female</LABEL>&nbsp<input type="radio" name="gender" value="female" required=""><br/>
            <input class="form-control" type="text" placeholder="Username" required="" name="username" maxlength="50">
            <input class="form-control" type="password" placeholder="Password" required="" name="password" maxlength="20">
            <input class="form-control" type="password" placeholder="Verify Password" required="" name="repassword" maxlength="20">
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="createAccount">Create account</button>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>