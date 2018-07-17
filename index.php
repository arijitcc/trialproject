
<?php require 'db.php';
session_start();
if(isset ($_SESSION['userid'])){header('location: http://localhost/trialproj/home.php');}
$errors = array();

if($_POST)
{
	$username=$_POST['uid'];
	$password=$_POST['pass'];
	if(empty($username)||empty($password))
	{
		if(empty($username))
			$errors[]="Username field required";
		if(empty($password))
			$errors[]="Password field required";
	}
	
	else{
		$sql="SELECT * FROM login WHERE username='$username' AND password='$password'";
		$result=$con->query($sql);
		if($con->error)
			exit( $con->error );
		if($result->num_rows){
		$value=$result->fetch_assoc();
		$user_id=$value['username'];
		
		$_SESSION['userid']=$user_id;
		header('location: http://localhost/trialproj/home.php');
		}
	}
}


?>

<!DOCTYPE html>
<html>


<head>
<link rel="stylesheet" href="style.css">
<h1>Log in screen</h1>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="formlogin">
<div id="logincontainer">
<div id="userid">
<label >User Id</label><input id="uid"  type="text" name="uid">
</div>
<div id="password">
<label >Password</label><input  id= "pass"type="text" name="pass">

</div>
<button class="sub" type="submit">Submit</button>
</div>

</form>

<div class="messages">
		<?php if($errors) {
			foreach ($errors as $key => $value) {
				echo '<div class="msg" role="alert">'.$value.'</div>';										
									}} ?>
		</div>
</body>
</html>