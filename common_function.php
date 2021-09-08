<?php
include('connection.php');
session_start();

function dd($val){
	echo "<pre>";print_r($val);echo "</pre>";die;
	return true;
}
function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'naveenSaRawa'; // user define private key
    $secret_iv = 'naveensaSecret'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function shareUrl($uid){
	$slug=encrypt_decrypt($uid);
	$url="http://localhost/ravi/uname.php?text=".$slug;
	return $url;
}

function matchdata($quid,$student_answer,$user_id,$mainUserData){
	foreach ($mainUserData as $key => $value) {
		if(!empty($value['qu_id'])){
			if($value['qu_id']==$quid && $value['student_answer']==$student_answer){
				return $user_id;
			}
		}
	}
	return "error";

}
function getUserName($id){
	$conn = dbconnect();
	$query=mysqli_query($conn,"select name from users where id=$id limit 1");
	if($query && mysqli_num_rows($query)>0){
		$row=mysqli_fetch_assoc($query);
		if(!empty($row['name'])){
			return $row['name'];
		}
	}
	return false;
}

function totalQuation(){
	$total=0;
	$conn = dbconnect();
	$query=mysqli_query($conn,"select count(id) as total from quiz limit 1");
	if($query){
		$row=mysqli_fetch_assoc($query);
		$total=$row['total'];
	}
	return $total;
}

function checkDuplicate($uid,$qid,$rev_id){
	$conn=dbconnect();
	//echo "select * from student_report where user_id=$uid and qu_id=$qid and review_id=$rev_id";die;
    $query=mysqli_query($conn,"select * from student_report where user_id=$uid and qu_id=$qid and review_id=$rev_id");
    if(mysqli_num_rows($query)>0){
    	return true;
    }
    return false;
}

?>