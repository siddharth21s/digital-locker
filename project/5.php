<?php session_start();
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['log']))
		{
			$msg[]="No such User";
		}
		
		if(empty($_POST['pass']))
		{
			$msg[]="Password Incorrect........";
		}
		
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			
			
		
			$host= "localhost";
	$user = "postgres";
	$pass = "7387838949";
	$db = "postgres";

	$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("could not connect to serve\n");
			
			$unm=$_POST['log'];
			
			$q="select * from pro_con_det where email='$unm'";
			
			$res=pg_query($q) or die("wrong query");
			
			$row=pg_fetch_assoc($res);
			
			if(!empty($row))
			{
				if($_POST['pass']==$row['dob'])
				{
					$_SESSION=array();
					$_SESSION['log']=$row['email'];
					$_SESSION['pass']=$row['dob'];
					$_SESSION['status']=true;
						header("location:6.html");
				}
				
				else
				{
					echo 'Incorrect Password....';
				}
			}
			else
			{
				echo 'Invalid User';
			}
		}
	
	}
	else
	{
		header("location:5.html");
	}
			
?>