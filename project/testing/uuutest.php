<?php
if (isset($_GET['id']))
	{
	$host= "localhost";
	$user = "postgres";
	$pass = "7387838949";
	$db = "postgres";

	$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");
	
	
	$id = $_GET['id'];
	$query = "SELECT name, type, size, content FROM upload WHERE id='$id'";
	$result = pg_query($query) or die('Error, query failed');
	//list($name, $type,$size,$content) = pg_fetch_array($result,'name','type','size','content');
	
	$name = pg_fetch_result($result,'name');
	$type = pg_fetch_result($result,'type');
	$size = pg_fetch_result($result,'size');
	$content = pg_fetch_result($result,'content');
	
	header("Content-lenght: $size");
	header("Content-type: $type");
	header("Content-Disposition: attachment; filename=$name");
	ob_clean();
	flush();
	echo pg_unescape_bytea($content);
	pg_close($con);
	exit;
	}
	?>