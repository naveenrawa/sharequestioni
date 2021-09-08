<?php
include("common_function.php");

if(empty($_SESSION['frid'])){
$text=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$url=shareUrl($text);
echo "Copy url and share your friends:-       ".$url;
session_destroy();
}else{
	//unset($_SESSION["frid"]);
	$frid=$_SESSION["frid"];
	header("location:user_result.php?id=$frid");
	//echo "<a href='http://localhost/ravi/question.php'>click here </a>and submite your data and share friends";
}

?>