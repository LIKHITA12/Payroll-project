<html>
<head>
<style>
body {
	background-image: url(pet.jpeg);
	background-repeat: no-repeat;
	 background-attachment: fixed;
}

div.transbox {
   margin: 50px;
   height: 500px;
   width : 1000px;
   background: rgba(240,240,240,0.875);
   border-radius: 25px;
  border: 3px ;
  border-style: outset;
}

h1 {
  font-family: monospace;
  font-size: 45px;
  color: black;
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

</style>

</head>

<body>
<center>
<div class="transbox">
 <h1>SALARY CALCULATION</h1><br>
 

<form action="" method="post">
 Enter your EMPLOYEEID : <input type="text" name="EmployeeID" placeholder="EmployeeID" required>
  <br><br><br><input type="submit" value="Submit" name="sub" class="button button2">
</form>


<?php
if($_POST["EmployeeID"]!= '')
{  if(isset($_POST["sub"]))
  {   
      echo "<h3 style='font-family=Berlin Sans FB'> <center><br>Employee Salary Details : <br><br></h3>";
	  $db = mysqli_connect("localhost","root","")
      or die("Cannot connnect to the database");
      mysqli_select_db($db,"register");

      $id = htmlentities($_POST['EmployeeID']);
      $total = 0;
      $sql1 = "SELECT * FROM login WHERE empid='$id'";
	  $sql2 = "SELECT title FROM registration WHERE empid='$id'";
	  $result = mysqli_query($db,$sql1);
	  $result2 = mysqli_query($db,$sql2);
	  
	  echo "   EmpID : ".$id;
	  echo "<br>";
	  
	  while($row1 = $result2->fetch_assoc())
		{
			$r = $row1['title'];
			break;
		}
		
	  echo "   Employee Position : ".$row1['title'];
      echo "<br>";
      while($row = $result->fetch_assoc())
		{
			$total=$total+$row["difftime"];
		}

	  $inhr=$total/3600;

      echo "   Total time worked : $inhr <br>";

	  $sql="SELECT sal FROM salary WHERE title='$r'";
	  $result1 = mysqli_query($db,$sql);

      echo "   Total salary is : Rs  ";

      while($row = $result1->fetch_assoc())
		{
			echo ceil($row["sal"] * $inhr);
			break;
		}
	echo "</center></div>";	
  }
}
else
{
	echo "<center>";
	echo '<br><h3 style="color:red;">Please fill the employeeID!!</h3>';
	echo "</center>";
}	
?>

</center>

</body>
</html>

