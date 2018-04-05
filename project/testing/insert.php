<?php
$host= "localhost";
$user = "postgres";
$pass = "7387838949";
$db = "postgres";

$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");
$file_name = "d.png";
$img = fopen($file_name,'r') or die("cannot read image\n");
$data = fread($img, filesize($file_name));

$es_data = pg_escape_bytea($data);
fclose($img);

$query = "insert into images(id,data) values(1,'$es_data')";
pg_query($con,$query);
pg_close($con);
?>