<?php
$host= "localhost";
$user = "postgres";
$pass = "7387838949";
$db = "postgres";

$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");

$query = "select data from images where id=1";
$res = pg_query($con,$query) or die(pg_last_error($con));

$data = pg_fetch_result($res,'data');
$unes_image= pg_unescape_bytea($data);

$file_name = "d2.png";
$img = fopen($file_name, 'wb') or die("cannot open image\n");
fwrite($img,$unes_image) or die("cannot write image data\n");
fclose($img);

pg_close($con);
?>