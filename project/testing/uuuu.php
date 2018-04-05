<?php
	if (isset($_GET['id']))
	{
	$host= "localhost";
	$user = "postgres";
	$pass = "7387838949";
	$db = "postgres";

	$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");
	
	
	$id = $_GET['id'];
	$query = "SELECT content FROM upload WHERE id='$id'";
	$result = pg_query($query) or die('Error, query failed');
	$raw = pg_fetch_result($result,'content');
	header('Content-type: image/png');
	echo pg_unescape_bytea($raw);
	}
	?>