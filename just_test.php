<?php echo "fur<br>"; ?>   <br>

<?php 
//header("location: Pics/iron man2.jpg"); this line works fine
echo "<script type='text/javascript'>";
echo "alert('done');";
echo "</script>";
echo "you have successfully registered.<br>you can now login";
if(isset($_POST['login']))
{ header("location: login.php");}

?>
<body>
<form method="POST">
<button type="submit" name="login">LOG IN</button>
</form>
<div id="q">time since successful registration <br></div>
<div id="w"> </div>
</body>
<script type="text/javascript">var b=5000;
var c=1;f=1;setInterval(e,1000);				


function a()
{
	window.alert("wohoo"); setInterval(a,b);		//calling the function like this will result in the updation of the the value b every next time
	b-=1000;										//but writing the "setInterval" function outside the function a() didn't

}

function d()
{

	document.write(c +" ");							//prints in a totally different page
	c=c+1;
}
function e()
{

	document.getElementById('w').innerHTML=f;
	f=f+1;
}

</script>