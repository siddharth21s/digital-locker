<?php if(/*isset($_POST['upload'])&&*/!empty($_POST['adcdno']) && $_FILES['adcdimg']['size']>0 && !empty($_POST['ltblno']) && $_FILES['ltblimg']['size']>0 && !empty($_POST['rncdno']) && $_FILES['rncdimg']['size']>0)
{
	$host= "localhost";
	$user = "postgres";
	$pass = "7387838949";
	$db = "postgres";

	$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");
	
	$docno= $_POST['adcdno'];
	$fileName = $_FILES['adcdimg']['name'];
	$tempName = $_FILES['adcdimg']['tmp_name'];
	$fileSize = $_FILES['adcdimg']['size'];
	$fileType = $_FILES['adcdimg']['type'];
	$fileType = (get_magic_quotes_gpc()==0? pg_escape_string($_FILES['adcdimg']['type']):pg_escape_string(stripslashes($_FILES['adcdimg'])));
	$fp = fopen($tempName, 'r');
	$content = fread($fp,filesize($tempName));
	$content = pg_escape_bytea($content);
	fclose($fp);
	if(!get_magic_quotes_gpc())
	{
		$fileName = addslashes($fileName);
	}
	
	if($db)
	{
		$query = "INSERT INTO pro_doc(docno,doc,name,size,type,content)"."VALUES('$docno','Aadharchard','$fileName','$fileSize','$fileType','$content')";
		pg_query($query) or die('Error,query failed');
		//pg_close($con);
		//echo "<script type='text/javascript'>alert('File $fileName uploaded');</script>";
		
	}
	else
	{
		echo "<script type='text/javascript'>alert('Files NOT uploaded PLEASE upload AGAIN');</script>";
		header("location: 3.html");
	}
	
	
	$docno= $_POST['ltblno'];
	$fileName = $_FILES['ltblimg']['name'];
	$tempName = $_FILES['ltblimg']['tmp_name'];
	$fileSize = $_FILES['ltblimg']['size'];
	$fileType = $_FILES['ltblimg']['type'];
	$fileType = (get_magic_quotes_gpc()==0? pg_escape_string($_FILES['ltblimg']['type']):pg_escape_string(stripslashes($_FILES['ltblimg'])));
	$fp = fopen($tempName, 'r');
	$content = fread($fp,filesize($tempName));
	$content = pg_escape_bytea($content);
	fclose($fp);
	if(!get_magic_quotes_gpc())
	{
		$fileName = addslashes($fileName);
	}
	
	if($db)
	{
		$query = "INSERT INTO pro_doc(docno,doc,name,size,type,content)"."VALUES('$docno','Lightbill','$fileName','$fileSize','$fileType','$content')";
		pg_query($query) or die('Error,query failed');
		//pg_close($con);
		//echo "<script type='text/javascript'>alert('File $fileName uploaded');</script>";
		
	}
	else
	{
		echo "<script type='text/javascript'>alert('Files NOT uploaded PLEASE upload AGAIN');</script>";
		header("location: 3.html");
	}
	
	
	$docno= $_POST['rncdno'];
	$fileName = $_FILES['rncdimg']['name'];
	$tempName = $_FILES['rncdimg']['tmp_name'];
	$fileSize = $_FILES['rncdimg']['size'];
	$fileType = $_FILES['rncdimg']['type'];
	$fileType = (get_magic_quotes_gpc()==0? pg_escape_string($_FILES['rncdimg']['type']):pg_escape_string(stripslashes($_FILES['rncdimg'])));
	$fp = fopen($tempName, 'r');
	$content = fread($fp,filesize($tempName));
	$content = pg_escape_bytea($content);
	fclose($fp);
	if(!get_magic_quotes_gpc())
	{
		$fileName = addslashes($fileName);
	}
	
	if($db)
	{
		$query = "INSERT INTO pro_doc(docno,doc,name,size,type,content)"."VALUES('$docno','Rationcard','$fileName','$fileSize','$fileType','$content')";
		pg_query($query) or die('Error,query failed');
		pg_close($con);
		echo "<script type='text/javascript'>alert('Files uploaded');window.location='4.html';</script>";
		
		//header("location: 4.html");
		//pg_close($con);
	}
	else
	{
		echo "<script type='text/javascript'>alert('Files NOT uploaded PLEASE upload AGAIN');</script>";
		header("location: 3.html");
	}
}
?>