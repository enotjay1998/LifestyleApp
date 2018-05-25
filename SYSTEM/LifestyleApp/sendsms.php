<?php
require("conn.php");
session_start();
$user = $_SESSION['username'];
  // Authorisation details.
$username = "yusolouie@yahoo.com";
  $hash = "8f0a7e268d8f51e1ffd6393de2a951c4d318ee8419359df434201c40a9dbc38c";

  // Config variables. Consult http://api.txtlocal.com/docs for more info.
  $test = "0";

  // Data for text message. This is the text message data.
  $sender = $_SESSION['fname']; // This is who the message appears to be from.
   // A single number or a comma-seperated list of numbers
  $message = "Patient need urgent help!";
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
   $query="select * from sos where username = '$user' order by name";
                 $result=mysqli_query($con, $query);
                        while($row=mysqli_fetch_array($result))
                    {
                        //echo 'yati!'.'<br/>';
                            $numbers =  $row['contact'];
                            $message = urlencode($message);
                            $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                            $ch = curl_init('http://api.txtlocal.com/send/?');
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $result = curl_exec($ch); // This is the result from the API
                            curl_close($ch);
                             sleep(5);
                             $data = "";
                        }

header("location: sos.php?SOS_sent=1");
?>