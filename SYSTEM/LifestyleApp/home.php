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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="signout.php">sign-out </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="home.php">Home </a></li>
                    <li role="presentation"><a href="health.php">Health Status</a></li>
                    <li role="presentation"><a href="diet.php">Diet Plan</a></li>
                    <li role="presentation"><a href="sos.php">SOS contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="jumbo">
        <div class="jumbotron">
            <h1>LifeSTYLE</h1>
            <p id="jumboP">For Diabetic </p>
            <p style="color:white;text-align: left;">Welcome <b><?php session_start(); echo $_SESSION['fname']; ?></b>!</p>
        </div>
    </div>
    <div>
    <div class="container" style="float: none;">
    <h2>Learn about diabetes.</h2>
        <h3 style="margin-left: 25px;">What is diabetes?</h3>
            <div style="margin-left: 50px;">
            <h4>There are three main types of diabetes:</h4><br/>
                <p><b>Type 1 diabetes</b> – Your body does not make insulin. This is a problem because you need insulin to take the sugar (glucose) from the foods you eat and turn it into energy for your body. You need to take insulin every day to live.</p><br/>
                <p><b>Type 2 diabetes </b>– Your body does not make or use insulin well. You may need to take pills or insulin to help control your diabetes. Type 2 is the most common type of diabetes.</p><br/>
                <p><b>Gestational (jest-TAY-shun-al) diabetes </b>– Some women get this kind of diabetes when they are pregnant. Most of the time, it goes away after the baby is born. But even if it goes away, these women and their children have a greater chance of getting diabetes later in life.</p>
            </div>
    </div>
    </div>
    <div style="background-color: yellowgreen; margin-top:100px ;padding: 50px 130px 50px 130px;"> 
       <div class="col-md-8" style="margin-left: 50px;">
        <h2 style=""> Blood Glucose Meter</h2>
        <h4 style="margin-left: 50px;line-height: 50px;">- reviews detail the types of <b>Blood Glucose Meters </b> available in the UK, who they are made by, the range of features each meter brings and how to get one. In addition, you can read user reviews or leave your own review.
        Your healthcare team should be able to advise you on how many times per day you need to check your blood sugar levels.</h4>
       </div>
       <img src="images/Gmeter.jpg" style=" width: 300px;height: 300px;border-radius: 30px;">
    </div>
     <div style="background-color: ; margin-top:100px ;padding: 50px 130px 50px 130px;text-align: center;"> 
       <div  style="margin-left: 50px;">
        <h2 style=""> Trivia: </h2>
        <h4 style="margin-left: 50px;line-height: 50px;">
            If you have type 2 diabetes, you should aim for about 30 minutes of exercise at least five days a week, according to the American Diabetes Association.</h4>
       </div>
    </div>
        <div style="background-color: violet; margin-top:100px ;padding: 50px 130px 50px 130px;"> 
       <div style="margin-left: 50px;">
        <h2 style=""> Blood Glucose Meter</h2>
        <h4 style="margin-left: 50px;line-height: 50px;text-align: center;"><b>Walking:</b><br/>
            “Walking is easy for people to do,” Colberg-Ochs says. “All you need is a good pair of shoes and somewhere to go. Walking is probably one of the most prescribed activities for people with type 2 diabetes.”</h4>
        <div style="text-align: center;"><img src="images/run.jpg" style="border-radius: 30px;"></div>

       </div>
    </div>
    <footer class="navbar-default " style="margin-top: 0px;">
        <div class="row">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <h3><a href="#" id="footer">Life<span>Style </span></a></h3>
                <p id="footerMenu" class="links"><a href="home.php">Home</a><strong> · </strong><a href="health.php">Health Status</a><strong> · </strong><a href="diet.php">Diet Plan</a><strong> · </strong><a href="sos.php">SOS contact</a><strong> </strong></p>
            </div>
            <div class="clearfix visible-sm-block"></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>