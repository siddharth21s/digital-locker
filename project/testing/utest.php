<html>
<head></head>
<body>
<form method="post" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr>
<td>please select a file</td></tr>
<tr>
<td><input type="hidden" name="MAX_FILE_SIZE" value="16000000">
<input name="userfile" type="file" id="userfile">
</td><td width="80"><input name="upload" type="submit" class="box" id="upload" value="Upload"></td></tr>
</table>
</form>
</body>
</html>
<?php if(isset($_POST['upload'])&& $_FILES['userfile']['size']>0)
{
	$host= "localhost";
	$user = "postgres";
	$pass = "7387838949";
	$db = "postgres";

	$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");
	
	
	$fileName = $_FILES['userfile']['name'];
	$tempName = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	$fileType = (get_magic_quotes_gpc()==0? pg_escape_string($_FILES['userfile']['type']):pg_escape_string(stripslashes($_FILES['userfile'])));
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
		$query = "INSERT INTO upload (name,size,type,content)"."VALUES('$fileName','$fileSize','$fileType','$content')";
		pg_query($query) or die('Error,query failed');
		pg_close($con);
		echo "<script type='text/javascript'>alert('File $fileName uploaded');</script>";
		
	}
	else
	{
		echo "file upload failed";
	}
}
?>