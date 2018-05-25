<?php 
require("conn.php");
session_start();?>
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
                    <?php if(isset($_GET['add_success']) and ($_GET['add_success']==1)) {?> 
                     <script type='text/javascript'>alert('Contact added!.');</script>
                    <?php } ?>
                    <?php if(isset($_GET['Duplicate_number']) and ($_GET['Duplicate_number']==1)) {?>
                     <script type='text/javascript'>alert('Number already added.');</script>
                    <?php } ?>
                    <?php if(isset($_GET['delete_success']) and ($_GET['delete_success']==1)) {?>
                     <script type='text/javascript'>alert('Contact deleted!.');</script>
                    <?php } ?>
                     <?php if(isset($_GET['Sos_coming_soon']) and ($_GET['Sos_coming_soon']==1)) {?>
                     <script type='text/javascript'>alert('Coming soon!.');</script>
                    <?php } ?>
                    <?php if(isset($_GET['SOS_sent']) and ($_GET['SOS_sent']==1)) {?>
                     <script type='text/javascript'>alert('SOS SENT!.');</script>
                    <?php } ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="signout.php">sign-out </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="home.php">Home </a></li>
                    <li role="presentation"><a href="health.php">Health Status</a></li>
                    <li role="presentation"><a href="diet.php">Diet Plan</a></li>
                    <li class="active" role="presentation"><a href="sos.php">SOS contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="jumbo">
        <div class="jumbotron">
            <h2>Sos CONTACT List</h2>
            <p></p>
        </div>
    </div>
    <div class="container" style="margin-bottom: 100px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name </th>
                        <th>Relation </th>
                        <th>Number </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 $user = $_SESSION['username'];
                 $query="select * from sos where username = '$user' order by name";
                 $result=mysqli_query($con, $query);
                        while($row=mysqli_fetch_array($result))
                    {
                        echo '
                            <tr onclick="myFunction(this)">
                                <td>'.$row['name'].'</td>
                                <td>'.$row['relation'].'</td>
                                <td>'.$row['contact'].'</td>
                                <td>
                                <form method="post" action="server.php">
                                <input type="hidden" name="name" value="'.$row['name'].'">
                                   <button class="btn btn-default" type="submit" name="delete">delete</button>
                                </form>
                                </td>
                            </tr>
                        ';
                    }
                ?> 
                </tbody>
            </table>
        </div>
        <div style="margin-bottom: 300px;">
        <form method="post" action="sendsms.php">
            <button class="btn btn-default" type="submit" name="sos" style="float: right;margin:10px;">Send SOS</button>
        </form>
             <form method="post" action="server.php">
                      <label>Name</label><br/>
                      <input type="text" name="name" maxlength="30"><br/>
                      <label>Relation</label><br/>
                      <input type="text" name="relation" maxlength="20"><br/>
                      <label>Number</label><br/>
                      <label>(+63)</label><input type="text" name="number" maxlength="10" placeholder="(ex:9222922746)"><br/><br/>
                      <input style="padding: 1px 1px 1px 1px; font-size: 12px;" type="submit" class="btn btn-default" name="add" value="add contact"/>
                    </form>
        </div>
    </div>
    <footer class="navbar-default " style="margin-top: 300px;">
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