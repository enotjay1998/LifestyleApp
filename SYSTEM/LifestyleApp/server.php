<?php
require_once("conn.php");
session_start();
//Define the query
		    if (isset($_POST['createAccount'])) {
				$fname=mysqli_real_escape_string($con,$_POST["fname"]);
				$lname=mysqli_real_escape_string($con,$_POST["lname"]);
				$mi=mysqli_real_escape_string($con,$_POST["mi"]);
				$gender=mysqli_real_escape_string($con,$_POST["gender"]);
				$birthday=mysqli_real_escape_string($con,$_POST["birthday"]);
				$username=mysqli_real_escape_string($con,$_POST["username"]);
				$password=mysqli_real_escape_string($con,$_POST["password"]);
				$repassword=mysqli_real_escape_string($con,$_POST["repassword"]);

				if($password == $repassword){
					$result=mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
					if(mysqli_num_rows($result)>=1)
					{
						header('Location: signup.php?username_taken=1');
					}else{
					if($password == $repassword){
								$sql = "INSERT INTO user (fname,lname,mi,birthdate,username,password,gender)
								VALUES ('$fname','$lname','$mi','$birthday','$username','$password','$gender')";

								if (mysqli_query($con, $sql)) {
									mysqli_query($con,"INSERT into health (username) VALUES ('$username');");
									header('Location: Signup.php?signup_success=1');
								} else {
								    echo "Error: " . $sql . "<br>" . mysqli_error($con);
								}
					}else{
						header('Location: signup.php?password_did_not_match=1');

					}
					}
		   		}
		   	}
		   	if (isset($_POST['signin'])) {
		   		$username=mysqli_real_escape_string($con,$_POST["username"]);
				$password=mysqli_real_escape_string($con,$_POST["password"]);
		   		$result=mysqli_query($con,"SELECT * FROM user WHERE username='$username' and password='$password'");
		   			session_start();
					if(mysqli_num_rows($result)==1){
						$row=mysqli_fetch_array($result);
						$fname = $row['fname'];
						$lname = $row['lname'];
						$username = $row['username'];
						$_SESSION['username']= $username;
						$_SESSION['fname']= $fname;
						$_SESSION['lname']= $lname;
						header('Location: home.php?');
					}else{
					header('Location: index.php?login_attempt=1');
					}
		   	}
		   	if (isset($_POST['add'])) {
		   		$name=mysqli_real_escape_string($con,$_POST["name"]);
				$relation=mysqli_real_escape_string($con,$_POST["relation"]);
				$number="+63".mysqli_real_escape_string($con,$_POST["number"]);
				session_start();
				$username=$_SESSION['username'];
					$sql = "INSERT INTO sos(name,relation,contact,username)
					VALUES ('$name','$relation','$number','$username')";

					if (mysqli_query($con, $sql)) {
						header('Location: sos.php?add_success=1');
					} else {
						header('Location: sos.php?error=1');
					}
				}
			if (isset($_POST['delete'])) {
				$name=mysqli_real_escape_string($con,$_POST["name"]);
					$sql = "delete from sos where name = '$name'";

					if (mysqli_query($con, $sql)) {
						header('Location: sos.php?delete_success=1');
					} else {
						header('Location: sos.php?error=1');
					}
				}
			if (isset($_POST['addMed'])) {
		   		$medName=mysqli_real_escape_string($con,$_POST["medName"]);
				$FreqIntake=mysqli_real_escape_string($con,$_POST["FreqIntake"]);
				$time=mysqli_real_escape_string($con,$_POST["time"]);
				session_start();
				$username=$_SESSION['username'];
					$sql = "INSERT INTO meds (medName,FreqIntake,timeIntake,username)
					VALUES ('$medName','$FreqIntake','$time','$username')";

					if (mysqli_query($con, $sql)) {
						header('Location: diet.php?add_success=1');
					} else {
						 echo "Error: " . $sql . "<br>" . mysqli_error($con);
					}
				}
				if (isset($_POST['deleteMed'])) {
					$name=mysqli_real_escape_string($con,$_POST["medName"]);
					$username= $_SESSION['username'];
					$sql = "delete from meds where medName = '$name' AND username = '$username'";

					if (mysqli_query($con, $sql)) {
						header('Location: diet.php?delete_success=1');
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($con);
					}
				}
				if (isset($_POST['sos'])) {
					header('Location: sos.php?Sos_coming_soon=1');
				}
				if (isset($_POST['updateType'])) {
					$diabetesType = mysqli_real_escape_string($con,$_POST['type']);
					$username = $_SESSION['username'];
					mysqli_query($con,"UPDATE health SET diabetesType = '$diabetesType' WHERE username = '$username'" );
					header('Location: health.php?update_success=1');
				}
				if (isset($_POST['updateconsult'])) {
					$lastConsult = mysqli_real_escape_string($con,$_POST['consult']);
					$username = $_SESSION['username'];
					mysqli_query($con,"UPDATE health SET lastConsult = '$lastConsult' WHERE username = '$username'" );
					header('Location: health.php?update_success=1');
				}
				if (isset($_POST['updatebloodSugar'])) {
					$bloodSugar = mysqli_real_escape_string($con,$_POST['bloodSugar']);
					$date = date('m/d/y');
					$username = $_SESSION['username'];
					mysqli_query($con,"UPDATE health SET bloodSugar = '$bloodSugar', lastBloodCheck = '$date' WHERE username = '$username'" );
					header('Location: health.php?update_success=1');
				}
?>