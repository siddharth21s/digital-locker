<?php
	
	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['fnm']) || empty($_POST['mnm'])|| empty($_POST['lnm']) || empty($_POST['g']) || empty($_POST['dob']) || empty($_POST['paddress']) || empty($_POST['taddress'])||empty($_POST['email'])|| empty($_POST['mob']) )
		{
			$msg.="<li>Please full fill all requirement";
		}
		
	
		else
		{
	$host= "localhost";
	$user = "postgres";
	$pass = "7387838949";
	$db = "postgres";

	$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");
			
			
			$fnm=$_POST['fnm'];
			$mnm=$_POST['mnm'];
			$lnm=$_POST['lnm'];
			$gender=$_POST['g'];
			$dob=$_POST['dob'];
			$padd=$_POST['paddress'];
			$tadd=$_POST['taddress'];
			$email=$_POST['email'];
			$mob=$_POST['mob'];
			
		

	
	
		
		
			//$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
			//mysql_select_db("shop",$link) or die("Can't Connect to Database...");
			if($db)
			{
			$query="INSERT INTO pro_con_det(fname,mname,lname,gender,dob,padd,tadd,email,mob)"."VALUES('$fnm','$mnm','$lnm','$gender','$dob','$padd','$tadd','$email','$mob')";
			
			pg_query($query) or die("Can't Execute Query...");
			header("location:3.html?ok=1");
			echo "cc";
			pg_close($con);
			}
		}
	}
	else
	{
		header("location:2.html");
	}
?>