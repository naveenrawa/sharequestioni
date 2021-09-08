<?php
include('common_function.php');
?>
<table class="table">
<form method="post" action="">
	<caption>Enter Details</caption>
	<tr><td>Enter your Name</td>
		<td><input type="text" name="uname" required></td>
	</tr>
	<tr><td>Enter your Email</td>
		<td><input type="email" name="email" required></td>
	</tr>
	<tr><td>
	<button name="submit_form">submit</button></td>
	</tr>
</form>
</table>
<?php

$conn = dbconnect();
if(!empty($_POST['uname']) && !empty($_POST['email'])){
	$select="select id from users where name='".$_POST['uname']."' and email='".$_POST['email']."' limit 1";
	$selquery=mysqli_query($conn,$select);
	if($selquery && mysqli_num_rows($selquery)>0){
		$row=mysqli_fetch_assoc($selquery);
		$id=isset($row['id'])?$row['id']:'';
		$conid=encrypt_decrypt($id);
		//$conid=md5($id);
		header("location:user_result.php?id=$conid");
	}else{
	$insert="insert into users set name='".$_POST['uname']."', email='".$_POST['email']."'";
	$query=mysqli_query($conn,$insert);
	if($query){
			if(!isset($_SESSION['uname'])){
			    $_SESSION['uname']=$_POST['uname'];
			    $_SESSION['uid']=mysqli_insert_id($conn);
			    if(!empty($_GET['text'])){
			    	$_SESSION['frid']=$_GET['text'];
			    }
			}
			header("location:question.php");

	}
	}
}
?>