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

h1 {
  color: royalblue;
  font-family: Gabriola;
  font-size: 55px;
  text-shadow: 2px 0px black;
}
</style>

<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  
  if((h==20)&&(m==55)&&(s==30))
	  alert("Only 30 seconds are there for timeout.");
  
  if((h == 21)&&(m == 00) &&(s == 00))
	 window.location.href= 'timeout.php'; 
 
  document.getElementById('txt').innerHTML =
   "Time : " + h + ":" + m + ":" + s ;
  
  var t = setTimeout(startTime, 500);
  
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</head>
<body onload="startTime()">
<center>
<?php
$db=mysqli_connect("localhost", "root", "","register") 
or die("Couldn't select database.");
mysqli_select_db($db,"register");

$username = $_POST['EmployeeID'];
$password = $_POST['Password'];

date_default_timezone_set('Asia/Kolkata');
$login_date=date("Y/m/d");
$login_time=date("H:i:s");
list($h, $m, $s) = explode(':', $login_time);
$timestamp = strtotime('$login_date');
$day = date('l', $timestamp);

$sql = "SELECT * FROM registration WHERE empid = '$username' AND password = '$password' ";
$result = mysqli_query($db,$sql) or die(mysqli_error($db));
$numrows = mysqli_num_rows($result);
if($numrows > 0)
  { if($day=='Monday' || $day=='Tuesday' || $day=='Wednesday' || $day=='Thursday' || $day=='Friday')
	  { if($h>=9 && $h<=21)
		  {
			  
			  echo '<div id="txt"></div>';
			  $sql1 = "SELECT FirstName FROM registration WHERE empid = '$username' AND password = '$password'";
		      $result1 = mysqli_query($db,$sql);
			  while($row1 = $result1->fetch_assoc())
				{
					echo "<br><br> <b><div class='c'>";
					echo " Welcome ". $row1['FirstName']. " !";
					echo "</b></div><br><br>";
					break;
				}
		
			  echo '<br>Successfully logged in';
			  echo '<br>';
			
			  echo "Login time : $login_time";
			  echo "<br>Date : $login_date<br>Day: $day";
			  if(!session_id()) session_start();
			
			  $_SESSION['login_date'] = $login_date;
				
			  $_SESSION['login_time'] = $login_time;
				
			  $_SESSION['day'] = $day;
       
			  $_SESSION['username'] = $username;
			  
			  echo '<form action="logout.php">';
			  echo '<br>Session complete? <input type="submit" value="Logout" class="button button2">';
			  echo '</form>';
			  
		  }
		else
		{
			echo "<br><h1>Sorry you cannot login !!</h1><br>";
			echo "<h3>Working hours is from 9am to 9pm.</h2>";
		}
	  }
	else 
	  {
		  echo "<h1>It is a holiday.</h1>";
	  }
  }
  else
  {
	  echo 'Invalid EmployeeID or Password !!';
	  echo '<form action="login.html">';
	  echo 'Retry again <input type="submit" value="Login" class="button button2">';
	  echo '</form>';
  }
   ?>
 </center>  
 
</body>
</html>
