<?php$id = $_GET['id'];
$link = mysql_connect('localhost:3306','root','7387838949') or die(mysql_error());
	$db = mysql_select_db('blu96',$link);
	$sql = "SELECT * FROM upload WHERE id=5";
	$result = mysql_query("$sql");
	$row = mysql_fetch_assoc($result);
	mysql_close($link);
	header("Content-type: image/jpeg");
	echo $row;
	?>