<center><h3>Total Questions<?php echo totalQuation(); ?></h3></center>
<table border="1" style="text-align: center;">
	<tr>
		<td>Person Name</td>
		<td>Correct Answer</td>
	</tr>
<?php
if(!empty($userResult)){
	foreach ($userResult as $key => $value) {
		echo "<tr><td>$key</td><td>$value</td></tr>";
	}
}
if(!empty($_SESSION["frid"]) || !empty($_SESSION['uid'])){
	unset($_SESSION["frid"]);
	echo "<a href='http://localhost/ravi/question.php'>click here </a>and submite your data and share friends";

}
?>
</table>