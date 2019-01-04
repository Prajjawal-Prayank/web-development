<html>

<script src="add.js"  type="text/javascript"></script>


<?php
session_start();
$_SESSION['time']=1;			//the $_SESSION[] variable is global as well as CASE INSENSITIVE  !!!!
$c=0;
$d=0;
$db= mysqli_connect('localhost','root','','registration');
$username='';

if(isset($_POST['reg'])){
	$username=($_POST['username']);
	$pass1=($_POST['pass1']);
	$pass2=($_POST['pass2']);


if($pass1 != $pass2){
	$c=1;
}


//if such name is already present in the database  
	$q="SELECT * FROM users WHERE username='$username' ";
	$result=mysqli_query($db, $q);       									
if( mysqli_num_rows($result) == 1 )    
{
	$d=1;
	echo "<script>";
	echo "alert('This username is already taken.Try a different one.');";
	echo "</script>";

}



//for storing in database
if(($c)==0  && $d==0) {    //when the two passwords match
	 $password=md5($pass1);//this is for encrypting the password
	 $new_username=md5($username); //since case senitive issues arose via login
	$sql ="INSERT INTO users (username , password) VALUES ('$new_username' , '$password')";
	mysqli_query($db,$sql);
	header("location:  just_test.php");
}
}
?>

<body oncontextmenu="return false" background="">
	<div id="aa">


	<pre>
	<h1 ><b><i><u>THIS   IS   THE    REGISTRATION   PAGE</b></u></I></H1><style>
					h1{color:red; font-family: "monotype corsiva";}</style>
<form method="POST" action="registration.php">
<div class="ab">
<div>
<b>Enter Username</b>      <input id="a50" type="text" name="username" required placeholder="Username"  value="<?php echo $username; ?>"  ><br><br><br><br>
</div>
<div>
<b>Enter Password </b>     <input id="a51" type="password" placeholder="Password" name="pass1" required><br><br><br><br>
</div>
<div>
<b>Re-enter Password</b>   <input id="a52" type="password" placeholder="Password" name="pass2" required><br><br><br><br>
</div>
<div>
<button type="submit" name="reg" onclick="myFunction(form)">register</button></div >
<div id="last">Already have an account? <a href="login.php">LOG IN</A></div>
<div>
</form>


</pre></div>
<style type="text/css">
html,body{
	height:100%;
	margin: 0;
	padding: 0;
}
.ab{
	margin-left: 10;
	font-size: 13;
}
#a50,#a51,#a52{
	opacity: 0.5;
}
#a50:hover,#a51:hover,#a52:hover{            /* changes the looks only when mouse-over */
	opacity: .95;
}

#last{
	color:magenta;
}
#aa{
	width: 100%;
	height:100%;
	max-height: 100%;
	margin: 0;
	padding: 0;
	background-image: url('http://localhost/example/Pics/iron man11.jpg');
	background-size:100% 100%;
	background-repeat: no-repeat;
}
</style>
</body>
</html>