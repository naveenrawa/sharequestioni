<?php
include('common_function.php');

$conn = dbconnect();
$getId='';
if(!empty($_SESSION["frid"])){
	$text=isset($_SESSION['uid'])?$_SESSION['uid']:'';
	$url=shareUrl($text);
	echo "copy url and share your friends:- ".$url."<br>";
}
if(!empty($_GET['id'])){
	$select="select user_id from student_report";
	$selquery=mysqli_query($conn,$select);
	if($select && mysqli_num_rows($selquery)>0){
		while ($rows=mysqli_fetch_assoc($selquery)) {
			if($_GET['id']==encrypt_decrypt($rows['user_id'])){
				$getId=$rows['user_id'];
				break;
			}
		}
	}
}
$userName=$correctAns=$reviewUser=$mainUserData=array();
$selquery=mysqli_query($conn,"select qu_id,student_answer,user_id from student_report where user_id=$getId and review_id=0");
if($selquery && mysqli_num_rows($selquery)>0){
	while ($rows=mysqli_fetch_assoc($selquery)) {
		$mainUserData[]=$rows;
	}
}

$selquery=mysqli_query($conn,"select qu_id,student_answer,user_id from student_report where review_id=$getId");
if($selquery && mysqli_num_rows($selquery)>0){
	while ($rows=mysqli_fetch_assoc($selquery)) {
		$reviewUser[]=$rows;
	}
}
foreach ($reviewUser as $key => $value) {
		if(!empty($value['qu_id']) && !empty($value['student_answer']) && !empty($value['user_id'])){
			$getFunValue=matchdata($value['qu_id'],$value['student_answer'],$value['user_id'],$mainUserData);
			if($getFunValue!='error'){
				$correctAns[]=$getFunValue;
			}
		}
}
$userResult=array();
foreach ($correctAns as $key => $value) {
	$uname=getUserName($value);
	if($uname){
		$userResult[]=$uname;
	}
	
}
$userResult=array_count_values($userResult);
//dd($userResult);
if(!empty($userResult)){
	include("fedback.php");
}
?>