<html>
<head>
<title>Display file from sql</title>
<meta htttp-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>
<?php
$host= "localhost";
	$user = "postgres";
	$pass = "7387838949";
	$db = "postgres";

	$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");
	
	$query = "SELECT id, name FROM upload";
	$result = pg_query($query) or die('Error, query failed');
	if(pg_num_rows($result)==0)
	{
		echo "database is empty<br>";
		
	}
	else
	{
		while(list($id,$name)= pg_fetch_array($result)){
	?>
	<a href="uuuu.php?id=<?php echo urlencode($id);?>
	"><?php echo urlencode($name);?></a><br>
		<?php
		}
	}
	pg_close($con);
	?>
	</body>
	</html>
	