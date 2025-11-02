<title>Password Checker</title>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<center>
<div class="top">
<h2> Check to see how well you can type your passwords.</h2>
<h4>Nothing is recorded.</h4>
</div>
</center>
</head>
<?php
$text = "hello";
if (isset($_POST["password"])){
	$password = $_POST["pass1"];
	$confopass = $_POST["pass2"];
	if ($password == $confopass){
	echo "<center><h3 class='matchgood'>Passwords Match! Please wait as we clean up, Thank you!</center></h3>";
	header('refresh: 2');
	}
	else if($password != $confopass){
	echo "<center><h3 class='matchbad'>Passwords Don't match! Please wait as we clean up, Thank you!</center></h3>";
	header('refresh: 2');
	}
	else{}
if (isset($_POST["remember"])){
setcookie("1st","$password",  time() + (86400 * 30), "/");
}
if (isset($_POST["2nd"])){
setcookie("2nd","$confopass", time() + (86400 * 30), "/");
}
//end main isset
}
if (isset($_POST["delete"])){
	setcookie("1st","", time() - (3600), "/");
	setcookie("2nd","", time() - (3600), "/");
	echo "<center><h3 class='cookiesgone'>The pre-filled password cookies are gone, please wait 3 seconds as we finish this process.</center></h3>";
	header('refresh: 3');
}
?>
<html>
<form action="" method="post">
<center>
<input class="pass" type="password" name="pass1" placeholder="Password"  <?php $cookie1 = $_COOKIE["1st"]; if (!isset($cookie1)){} else if(isset($cookie1)){echo "value='$cookie1'";}  ?> required>
<br>
<br>
<br>
<input class="pass" type="password" name="pass2" placeholder="Confirm Password" <?php $cookie2 = $_COOKIE["2nd"]; if (!isset($cookie2)){} else if(isset($cookie2)){echo "value='$cookie2'";}  ?>required>
<br>
<br>
<br>
<input type="checkbox" name="remember" id="remember"><label for="remember">Remember First password</label>
<br>
<br>
<br>
<input type="checkbox" name="2nd" id="remember"><label>Remember Second password</label>
<br>
<br>
<br>
<input class="chkpassbutton" type="submit" name="password" value="Check passwords">
<br>
<br>
</center>
</form>
<form action="" method="post">
<center>
<input type="submit" name="delete" class="delete" value="Delete password cookies">
</center>
</form>
<style>
.pass{
font-family: monospace;
outline: none;
padding: 7px;
border-left: 7px solid blue;
border-top: 0px;
border-right:0px;
border-bottom:0px;
border-radius: 3px;
background-color: lightblue;
}
.top{
font-family:sans-serif;
border-top: 0px;
border-left: 30px solid blue;
border-bottom: 0px;
border-right: 30px solid blue;
background-color: lightblue;
border-radius: 4px;
}
.pass:focus{
border-top: 0px;
border-left: 0px;
border-right: 0px;
border-bottom: 2px solid blue;
background-color: white;
}
.chkpassbutton{
border-top: 0px;
border-right: 0px;
border-bottom: 0px;
border-left: 5px solid red;
background-color: lightgray;
border-radius: 4px;
}
.delete{
border-top: 0px;
border-right: 0px;
border-bottom: 0px;
border-left: 5px solid red;
background-color: lightgray;
border-radius: 4px;
}
.chkpassbutton:hover{
cursor: pointer;
}
.delete:hover{
cursor: pointer;
}
</style>
