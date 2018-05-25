<?php include("conn.php");                
session_start();
$username = $_SESSION['username'];
$sql1 = mysqli_query($con,"select * from health where username = '$username'");
$rowType=mysqli_fetch_array($sql1);
$dietType=$rowType['diabetesType'];
?>
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

                    <?php if(isset($_GET['add_success']) and ($_GET['add_success']==1)) {?>
                     <script type='text/javascript'>alert('Medicine added!.');</script>
                    <?php } ?>
                    <?php if(isset($_GET['Duplicate_number']) and ($_GET['Duplicate_number']==1)) {?>
                     <script type='text/javascript'>alert('Medicine already added.');</script>
                    <?php } ?>
                    <?php if(isset($_GET['delete_success']) and ($_GET['delete_success']==1)) {?>
                     <script type='text/javascript'>alert('Medicine deleted!.');</script>
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
                    <li class="active" role="presentation"><a href="diet.php">Diet Plan</a></li>
                    <li role="presentation"><a href="sos.php">SOS contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="jumbo">
        <div class="jumbotron">
            <h1>Diet PLAN</h1>
        </div>
        <div><h2>Happy <b><?php $day = date('l'); echo $day; ?></b></h2><h2 hidden="" id='clock' style="float: NONE;"></h2></div>
        <div id='main-container' style="width: 100%;">
           
        <?php 
        if($dietType=='Type 1'){
            $tableName='dietType1';
        }
        else{
            $tableName='dietType2';
        }
             $query1="select * from $tableName where todayIs = '$day'"; 
                 $result1=mysqli_query($con, $query1);
                 $row1=mysqli_fetch_array($result1);
        ?>
        <h3 align="center">Today's menu </h3>
            <div id="dietContent" class="col-md-3" style="border-radius: 60px 15px 60px 15px;margin: 60px;text-align: left;">
               <br/><center><h4>Breakfast </h4></center><br/>
               <b><p><?php echo $row1['breakName']; ?></p></b>
                <img src="<?php echo $row1['imgBreak']; ?>" width="300px" height="300px" id="foodimg"  style="border-radius: 50%;"data-toggle="modal" data-target="#breakfast">
                <center><p>(click image to view recipe)</p></center>
            </div>
            <div id="dietContent" class="col-md-3" style="border-radius: 60px 15px 60px 15px;margin: 60px;text-align: left;">
               <br/><center><h4>Lunch </h4></center><br/>
               <b><p><?php echo $row1['lunchName']; ?></p></b>
                <img src="<?php echo $row1['imgLunch']; ?>" width="300px" height="300px" id="foodimg"  style="border-radius: 50%;"data-toggle="modal" data-target="#lunch">
                <center><p>(click image to view recipe)</p></center>
            </div>
            <div id="dietContent" class="col-md-3" style="border-radius: 60px 15px 60px 15px;margin: 60px;text-align: left;">
                <br/><center><h4>Dinner </h4></center><br/>
               <b><p><?php echo $row1['dinnerName']; ?></p></b>
                <img src="<?php echo $row1['imgDinner']; ?>" width="300px" height="300px" id="foodimg" style="border-radius: 50%;"data-toggle="modal" data-target="#dinner">
                <center><p>(click image to view recipe)</p></center>
             </div>  
    </div>
        <center>
        <div style="margin-top: 550px;background-color: skyblue">
        <form id="medInput" action="server.php" method="post" width="100px" style="padding:10px;width: 50%; text-align: center;">
                <label id="input">Medicine Name: </label>
                <input type="text" id="medName" name="medName" class="input"/><br/><br/>
                <label id="input">Frequency of intake</label><br/>
                <input type="radio" id="FreqIntake"  name="FreqIntake" onclick="timeAfterMeals()" value="After Meals" /> After Meals<br/>
                <input type="radio" id="FreqIntake" name="FreqIntake" onclick="timeOnce()"  value="Once a day" /> Once a day<br/>
                <input type="radio" id="FreqIntake" name="FreqIntake" onclick="timeSpecify()" value="Specify Time" /> Specify Time<br/><br/>
                <label id="input">time:</label>
                <p id="timeinput"></p>
                <input type="submit" name="addMed" value="Add +">
        </form>
        </center>
        </div>
         <!--TABLE -->
        <div  class="container" style="margin-bottom: 50px;margin-top: 50px;">
        <div class="table-responsive">
            <table class="table" >
                <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Time of intake</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include("conn.php");
                 $user = $_SESSION['username'];
                 $query="select * from meds where username = '$user' order by medName";
                 $result=mysqli_query($con,$query);
                 $Specify='';
                 $hours='';
                        while($row=mysqli_fetch_array($result))
                    {
                        echo '
                            <tr onclick="myFunction(this)">
                                <td>'.$row['medName'].'</td>
                                <td>'.$Specify.' '.$row['timeIntake'].' '.$hours.'</td>
                                <td>
                                <form method="post" action="server.php">
                                <input type="hidden" name="medName" value="'.$row['medName'].'">
                                   <button class="btn btn-default" type="submit" name="deleteMed">delete</button>
                                </form>
                                </td>
                            </tr>
                        ';
                    }
                ?> 
                </tbody>
            </table>
        </div>
        </div><br/><br/>
            <!--TABLE END-->
<!-- VIEW DIET Breakfast -->

        <div id="breakfast" class="modal fade" role="dialog" align="left">
        <div align="center">
            <div style="padding-bottom:50px; margin:100px 150px 100px 150px;">
              <!--  <button class="btn btn-default" type="button" data-dismiss="modal" >Exit</button> -->
                <div>
                    <header class="modal-title" value="Breakfast"></header>
                </div>
                <div>
                    <div style="background-color: white;padding:20px; width: 800px;text-align: left;border-radius: 20px;line-height: 30px;">
                <a data-dismiss="modal" style="padding-right: 50px; cursor:pointer;width: 800px;">Close</a>
               <br/><center><h4>Breakfast </h4></center><br/>
               <b><p><?php echo $row1['breakName']; ?></p></b>
                <p><?php echo $row1['breakfast']; ?></p>
                <center><img src="<?php echo $row1['imgBreak']; ?>" width="300px" height="300px" id="foodimg"  style="border-radius: 50%;"></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--END Breakfast -->
<!-- VIEW DIET Lunch -->
        <div id="lunch" class="modal fade" role="dialog" align="left">
        <div align="center">
            <div style="padding-bottom:50px; margin:100px 150px 100px 150px;">
              <!--  <button class="btn btn-default" type="button" data-dismiss="modal" >Exit</button> -->
                <div>
                    <header class="modal-title" value="Breakfast"></header>
                </div>
                <div>
                    <div style="background-color: white;padding:20px; width: 800px;text-align: left;border-radius: 20px;line-height: 30px;">
                    <a data-dismiss="modal" style="padding-right: 50px; cursor:pointer;width: 800px;">Close</a>
               <br/><center><h4>Lunch </h4></center><br/>
               <b><p><?php echo $row1['lunchName']; ?></p></b>
                <p><?php echo $row1['lunch']; ?></p>
                <center><img src="<?php echo $row1['imgLunch']; ?>" width="300px" height="300px" id="foodimg"  style="border-radius: 50%;"></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--END Lunch -->
<!-- VIEW DIET Dinner -->
        <div id="dinner" class="modal fade" role="dialog" align="left">
        <div align="center">
            <div style="padding-bottom:50px; margin:100px 150px 100px 150px;">
              <!--  <button class="btn btn-default" type="button" data-dismiss="modal" >Exit</button> -->
                <div>
                    <header class="modal-title" value="Breakfast"></header>
                </div>
                <div>
                    <div style="background-color: white;padding:20px; width: 800px;text-align: left;border-radius: 20px;line-height: 30px;">
                    <a data-dismiss="modal" style="padding-right: 50px; cursor:pointer;width: 800px;">Close</a>
               <br/><center><h4>Dinner </h4></center><br/>
               <b><p><?php echo $row1['dinnerName']; ?></p></b>
                <p><?php echo $row1['dinner']; ?></p>
                <center><img src="<?php echo $row1['imgDinner']; ?>" width="300px" height="300px" id="foodimg"  style="border-radius: 50%;"></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--END Dinner-->
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
    <script>
        function timeAfterMeals(){
            document.getElementById("timeinput").innerHTML = "After Meals<input type='hidden' value='After Meal' id='time' name='time' style='width:50px;'>";
        }
                function timeOnce(){
            document.getElementById("timeinput").innerHTML = "<input type='time' id='time' name='time'>";
        }
                function timeSpecify(){
            document.getElementById("timeinput").innerHTML = "Intake every: <input type='number' max='24' min='1' id='time' name='time' style='width:50px;'>Hour/s";
        }
    </script>
    <script type="text/javascript" src="timer.js"></script>
</body>

</html>