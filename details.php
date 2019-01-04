<?php 
		session_start();
	if(!isset($_COOKIE['user']) )
	{
		$_SESSION['time']=0;
		unset($_SESSION['name']); 
		header("location: login.php");





}




if(!isset($_SESSION['name']) || $_SESSION['name']==false)	//still don't know what is "|| $_SESSION['name']==false" this for because the code runs fine without 
															//it as well!!!!
{
	header("Location: login.php");
}
$a=$_SESSION['name'];
if(isset($_POST['logout']))
{  
	unset($_SESSION['name']); 
	header("location: login.php");
	 $_SESSION['time']=1;
	 
}
?>
<html>
<body oncontextmenu="return false">
	


<audio  autoplay loop ><source src="http://localhost/example/sound/<?php echo $_SESSION['name']; ?>.mp3"></audio>

<div id="aa">
	Your details are as follows :-
	Your name is <?php 
	echo $_SESSION['name'];
	?>
	<br>

<?php
if(isset($_POST['update']))
{
	$db= mysqli_connect('localhost','root','','registration');
	$user=$_POST['user'];
	$new_user=md5($user);
	$new_a=md5($a);
	$q="UPDATE users SET username='$new_user' WHERE username='$new_a';";
	mysqli_query($db,$q);
	$_SESSION['name']=$user;
	header("location:  details.php");
}

?>

<details><summary>
Want to update your Username??</summary>
      <form method='POST'>
      	Enter new username <input type='text' name='user' placeholder='Username' required>
      	<button type='submit' name='update'>Update</button></form>
</details>




	<form method="POST">
<button type="submit" name="logout">LOG OUT</button>
</form>

</div>
<style type="text/css">
html,body{
	height:100%;
	margin: 0;
	padding: 0;
	
}
#aa{
	width: 100%;
	height:100%;
	max-height: 100%;
	margin: 0;
	padding: 0;
	background-image: url('http://localhost/example/Pics/select/<?php echo $_SESSION['name']; ?>.jpg');
	background-size:100% 100%;
	background-repeat: no-repeat;
}
</style>



	</body>
</html>