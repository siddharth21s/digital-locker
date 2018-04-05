<?php
$dsn = 'pgsql:dbname=postgres;host=localhost';
$user = 'postgres';
$password = '7387838949';
try
{
	$dbh = new PDO($dsn,$user,$password);
}
catch(PDOException $e)
{
	die('Connection failed: ' . $e->getMessage());
}
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if($_GET['file'])
{
	$filename=$_GET['file'];
	$data = pg_escape_bytea(file_get_contents($filename));
	try
	{
		$sql="insert into blobstore(doc,blob) values('test',?)";
		$sqlh= $dbh->prepare($sql);
		$sqlh->execute(array($data));
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
	printf("<p>Done</p>");
	}
	if($_GET['id'])
	{
		$res = "select blob from blobstore where id=?";
		$raw= pg_fetch_result($res,'blob');
		//$sqh=$dbh->prepare($sql);
		//$sqh->execute(array($_GET['id']));
		//$data=$sqh->fetchAll(PDO::FETCH_NUM);
		//$data=$data[0][0];
		header('Content-Type: image/png');
		echo pg_unescape_bytea($raw);
		
		//$data=fgets($data);
		//$data=hex2bin($data);
		}