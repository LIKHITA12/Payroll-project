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
 </style>
</head>
<body>
<center>
<?php
$db=mysqli_connect('localhost','root','','register')
or die('Error connecting to MySQL server');
mysqli_select_db($db,'register');
$sql="INSERT INTO registration (FirstName,LastName,Gender,Address,phn1,phn2,email,DOB,Marital,SpouseName,sphn,title,empid,password,retrypassword,Supervisor,Department,Location,WorkNum) VALUES('$_POST[fname]','$_POST[lname]','$_POST[Gender]','$_POST[Address]','$_POST[phn1]','$_POST[phn2]','$_POST[email]','$_POST[bday]','$_POST[Marital]','$_POST[sname]','$_POST[sphn]','$_POST[title]','$_POST[empid]','$_POST[pwd1]','$_POST[pwd2]','$_POST[Supervisor]','$_POST[Department]','$_POST[Location]','$_POST[WorkNum]')";
if(!mysqli_query($db,$sql))
{
	die('Error :'. mysqli_error($db));
}
echo "1 record added";
mysqli_close($db);
?>
<form action="login.html">
	Do you want to login ? <input type="submit" value="Login" class="button button2"/>
</form>
</center>
</body>
</html>

