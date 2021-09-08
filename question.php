<?php
include('common_function.php');

if(!empty($_SESSION['uname'])){
//dd($_SESSION);
?>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1"/>
<title>Untitled Document</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="fonts/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style.css?time<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<!-- <script src="text/javascript"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
 <?php
 if(!empty($_SESSION['frid'])){
	$conn = dbconnect();
 	$select=mysqli_query($conn,"select * from users");
 	//echo "<pre>";print_r($_SESSION);echo "<pre>";
	if($select){

		while ($row=mysqli_fetch_assoc($select)) {
			if($_SESSION['frid']==encrypt_decrypt($row['id'])){
			
				//$_SESSION['frid']=$row['id'];
				echo "<h2><center>Know about '".ucfirst($row['name'])."'</center></h2>";
			}
		}
	}
}
 ?>
		<div id="unnmsg">
	
		</div>

		<form method='post' id='OnlineTestForm' name="Onlinetestform">
		<div class="button">
			<input type='hidden' name='offsetvalue' id='offsetvalue' value='0' >
			<button name='FormSubmit' id='FormSubmit'>Submit</button><br><br>
			<button name='SkipForm' id='SkipForm' >Skip</button><br><br>
		</div>
			
		<form>
</body>
</html>
<?php
}else{
		header("location:index.php");
}
?>
<script>
$(document).ready(function(){
	
	var GetValues=$('#offsetvalue').val();
			if(GetValues==0){
			$.ajax({
				type:"POST",
				url:"getquestion.php",
				data:{
					formvalue:GetValues
				},
				success:function(res){
					//alert(res);
					$("#unnmsg").html(res);
					$("#unnmsg input:radio").click(function() {
						
					})
					GetValues++;
					$('#offsetvalue').val(GetValues);
					var finish=$('#finish_value').val();
					if(finish=='finish'){
						 var flag=$('#timer_text').val();
						window.location.href="final_page.php?flag="+flag;
					}
					var redirectpg=$('#redirect_page').val();
					if(redirectpg=='redirect'){
						 var flag=$('#timer_text').val();
							//window.location.href="final_page.php?flag="+flag;
					}
					
					
				}
			});
			}
	
		$('#FormSubmit').click(function(e){
			e.preventDefault();
			ChoseValue='';
			
			if (document.getElementById('answer1').checked) {
			ChoseValue= document.getElementById('answer1').value;
			}
			else if(document.getElementById('answer2').checked) {
			ChoseValue= document.getElementById('answer2').value;
			}
			else if(document.getElementById('answer3') && document.getElementById('answer3').checked) {
			ChoseValue= document.getElementById('answer3').value;
			}
			else if(document.getElementById('answer4') && document.getElementById('answer4').checked) {
			ChoseValue= document.getElementById('answer4').value;
			}
			
			if(ChoseValue!=''){
				Questionid= $('#qid').val();
				
			var GetValues=$('#offsetvalue').val();
			$.ajax({
				type:"POST",
				url:"getquestion.php",
				data:{
					formvalue:GetValues,
					SaveAns:ChoseValue,
					SaveQuid:Questionid
				},
				success:function(res){
					$("#unnmsg").html(res);
					GetValues++;
					
					$('#offsetvalue').val(GetValues);
					var finish=$('#finish_value').val();
					if(finish=='finish'){
						 //var flag=$('#timer_text').val();
							//window.location.href="final_page.php?flag="+flag;
							window.location.href="final_page.php";
					}
					
					var redirectpg=$('#redirect_page').val();
					if(redirectpg=='redirect'){
						 //var flag=$('#timer_text').val();
						//window.location.href="final_page.php?flag="+flag;
						window.location.href="final_page.php";
					}
				}
			});	
			}
			else{
				alert("please select option");
			}
		});
		$('#SkipForm').click(function(e){
			
			e.preventDefault();
			
			var GetValues=$('#offsetvalue').val();
			
			$.ajax({
				type:"POST",
				url:"getquestion.php",
				data:{
					formvalue:GetValues
				},
				success:function(res){
					 						
					$("#unnmsg").html(res);
					GetValues++;
					
					$('#offsetvalue').val(GetValues);
					var finish=$('#finish_value').val();
					if(finish=='finish'){
						 var flag=$('#timer_text').val();
							window.location.href="final_page.php?flag="+flag;
					}
					
					var redirectpg=$('#redirect_page').val();
					if(redirectpg=='redirect'){
						 var flag=$('#timer_text').val();
						window.location.href="final_page.php?flag="+flag;
					}
					
				}
			});
			
						
		});
	});
</script>
