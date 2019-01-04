<?php session_start(); ?> <?php 
if(isset($_SESSION['name']) == true && isset($_COOKIE['user']))  //if logout button is not hit before session timeout, then keep the user logged in
{
	header("location: details.php");
}

if($_SESSION['time']==0 )
{
	$_SESSION['time']=1;   //to ensure that the alert box will only pop up when login page is directed from details page after session has expired
	echo "<script type='text/javascript'>";
		echo "alert('Your session has expired.You must login again');";
		echo "</script>";
}


$db= mysqli_connect('localhost','root','','registration');
$username='';

if(isset($_POST['login'])){
	$username=($_POST['username']);
	$pass=($_POST['pass']);
	
$_SESSION['time']=1;      //to over-rule the error "undefined index:time"
$_SESSION['name']=$username;
$newpass=md5($pass);
$new_username=md5($username);
$q="SELECT * FROM users WHERE username='$new_username' AND password='$newpass'";
$result=mysqli_query($db, $q);        //The mysqli_query() function performs a query against the database.									
if( mysqli_num_rows($result) == 1 )  //mysqli_num_rows($result) returns the no. of rows in the result set
{
	header("location: details.php");     //header redirects to the given location
 } 
else
{
	session_destroy();
	header("location: msg1.php");
	
}


setcookie('user',$username,time()+100 ,"/");//1st parameter->cookie name;2nd is cookie value ;3rd is time in seconds;4th to ensure this cookie is valid everywhere






}
?>




<HTML>
<body oncontextmenu="return false" ><div id="aa">
	<pre>

<h1 ><b><i><u>THIS   IS   THE   LOG IN  PAGE</b></u></I></H1><style>
					h1{color: green ; font-family: "monotype corsiva";}</style>

<form method="POST" action="login.php">
<div class="ab">
<div>
Enter Username      <input id="a50" type="text" name="username" required placeholder="Username" value="<?php echo $username; ?>" ><br><br><br><br>
</div>
<div>
Enter Password      <input id="a51" type="password" placeholder="Password" name="pass" required><br><br><br><br>
</div>	

<div>
<button type="submit" name="login" >LOG IN</button>
Don't have an account yet?<a href="registration.php">Register here</a>
</div>				
</div>
</form>
</pre>
</div>
<style type="text/css">
html,body{
	height:100%;
	margin: 0;
	padding: 0;
	
}
#a50,#a51{
	opacity: 0.5;
}
#a50:hover,#a51:hover{            /* changes the looks only when mouse-over */
	opacity: .95;
}

#aa
{
	width: 100%;
	height:100%;
	max-height: 100%;
	margin: 0;
	padding: 0;
	background-image: url('http://localhost/example/Pics/thor3.jpg');
	background-size:100% 100%;
	background-repeat: no-repeat;
}




</style>


</body>
</html>