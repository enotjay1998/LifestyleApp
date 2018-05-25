<?php 
session_start();
include("conn.php");
$username = $_SESSION['username'];
$sql1 = mysqli_query($con,"select * from health where username = '$username'");
$row1=mysqli_fetch_array($sql1);
$sql = mysqli_query($con,"select * from user where username = '$username'");
$row=mysqli_fetch_array($sql);
?>
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
            <?php if(isset($_GET['update_success']) and ($_GET['update_success']==1)) {?>
                     <script type='text/javascript'>alert('Update success!.');</script>
                    <?php } ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="signout.php">sign-out </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="home.php">Home </a></li>
                    <li class="active" role="presentation"><a href="health.php">Health Status</a></li>
                    <li role="presentation"><a href="diet.php">Diet Plan</a></li>
                    <li role="presentation"><a href="sos.php">SOS contact</a></li>
                </ul>
            </div>      
        </div>
    </nav>
    <div id="jumbo">
        <div class="jumbotron">
            <h1>Health STATUS</h1>
            <p></p>
        </div>
    </div>
    <div style="border: 1px solid; border-radius: 20px; margin:10px 130px 0px 130px;padding: 50px 130px 50px 130px;"> 
    <div style="float: none;text-align: left;">
       <h3 > Blood Sugar Level Mean (before meal)</h3>
       <table class="table" style="border-radius: 20px;border-style: solid;">
           <thead>
               <tr>
                    <th style="background-color: rgba(200,200,255,255);padding: 5px;">Fasting blood sugar Levels</th>
                    <th style="background-color: rgba(200,255,200,255);padding: 5px;">Before meal means</th>
               </tr>
           </thead>
           <tbody>
           <tr style="background-color: rgba(200,200,100,255);padding: 5px;">
              <td>0-70</td>
              <td>Danger. Too low. Get Sugar immediately.</td>
            </tr>
            <tr style="background-color: rgba(200,100,200,255);padding: 5px;">
              <td>70-90</td>
              <td>Possibly low. Get sugar if you feel hungry, nervous, or weak.</td>
            </tr>
            <tr style="background-color: rgba(100,200,200,255);padding: 5px;">
              <td>90-160</td>
              <td>Normal. Ideal range.</td>
            </tr>
            <tr style="background-color: rgba(200,255,100,255);padding: 5px;">
              <td>160-240</td>
              <td>Too high. Work on bringing blood sugar down.</td>
            </tr>
            <tr style="background-color: rgba(200,100,255,255);padding: 5px;">
              <td>240-300</td>
              <td>This is very high and indicates that diabetes is out of control.</td>
            </tr>
            <tr style="background-color: rgba(100,255,200,255);padding: 5px;">
              <td>300-up</td>
              <td>Danger. Call your doctor immediately.</td>
            </tr>
           </tbody>

       </table>
    </div>
        <h4>Name :<b> <?php echo $row['fname'].' '.$row['lname'];?> </b></h4>

        <h4>Diabetes Type: <b> <?php if($row1['diabetesType']!=null){ echo $row1['diabetesType']; }else{echo 'none';}?></b></h4>

        <h4>Last consult with doctor: <b> <?php if($row1['lastConsult']!=null){ echo $row1['lastConsult']; }else{echo 'none';}?> </b></h4>

        <h4>Blood Sugar Level: <b> <?php if($row1['bloodSugar']!=null){ echo $row1['bloodSugar']; }else{echo 'none';}?></b></h4>

        <h4>Last blood sugar check: <b> <?php if($row1['lastBloodCheck']!=null){ echo $row1['lastBloodCheck']; }else{echo 'none';}?></b></h4>
    </div>
    <div style="margin:10px 130px 0px 130px;padding: 10px 130px 50px 130px;">
    <form method="post" action="server.php" style="text-align: left;">
        <label>Diabetes Type: </label>
        <select name="type">
            <option>Type 1</option>
            <option>Type 2</option>
            <option>Type 3</option>
            <option>Gestational Diabetes</option>
            <option>Diabetes LADA</option>
            <option>Diabetes MODY</option>
            <option>Double diabetes</option>
            <option>Steriod-inducer</option>
            <option>Brittle</option>
            <option>Secondary</option>
            <option>Insipidus</option>
            <option>Juvenille</option>
        </select>&nbsp<input type="submit" name="updateType" class="btn btn-default" style="padding: 1px;" value="update" /><br/>

        <label>Last consult with doctor:</label>&nbsp<input type="date" name="consult" />
        <input type="submit" name="updateconsult" class="btn btn-default" style="padding: 1px;" value="update" /><br/>
        <label>Blood Sugar Level:</label>&nbsp<input type="number" name="bloodSugar" maxlength="3" max="300" min="1" />
        <input type="submit" name="updatebloodSugar" class="btn btn-default" style="padding: 1px;" value="update" />
    </form>
    </div>
    <footer class="navbar-default " style="margin-top: 50px;">
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