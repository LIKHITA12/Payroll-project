<html>
<head>
<style>
 body{
  background-color : AliceBlue;
 }
 .button {
  background-color: dodgerblue; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 3px 1px;
   border-radius: 12px;
  border: 1px solid royalblue;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; 
  transition-duration: 0.4s;
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
div.c {
  font-size: 150%;
}
</style>
</head>
<body>
<center>
<?php
$db = mysqli_connect("localhost", "root", "","register") 
or die("Couldn't select database.");
mysqli_select_db($db,"register");

date_default_timezone_set('Asia/Kolkata');
$logout_time = date("H:i:s");
echo "Logout time : $logout_time";
session_start();
$ld=$_SESSION['login_date'];
$id=$_SESSION['username'];
$lt=$_SESSION['login_time'];
$d=$_SESSION['day'];
function seconds_from_time($time) {
	list($h, $m, $s) = explode(':', $time);
	$t=($h * 3600) + ($m * 60) + $s;
	return $t;
}
$t1=seconds_from_time($logout_time);
$t2=seconds_from_time($lt);
$dif=$t1-$t2;

$sqll = "INSERT INTO login (empid,logindate,logintime,logouttime,difftime,day) VALUES ('$id','$ld','$lt','$logout_time','$dif','$d')";
mysqli_query($db,$sqll) or die(mysqli_error($db)); 
?> 
</form>
	<center>
<form action="login.html"><br>
	Do you want to login again? <br><input type="submit" value="Login" class="button button2">
</form>
</center>
</body>
</html>
