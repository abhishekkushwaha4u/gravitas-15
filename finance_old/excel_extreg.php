<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require 'sql_con_reg.php';
		$d=date('d/m/Y');
		$file_name = "Externals_Registered_$d.xls";
		header( "Content-Type: application/vnd.ms-excel" );
		header( "Content-disposition: attachment; filename=$file_name" );
		
		$sum=0;
		$participants=0;
		$q = "SELECT * FROM `external_registration` WHERE `paid_status` = '1' ";
		$r = mysqli_query($mysqli,$q);
		echo "Id\tName\tRegno\tEvent Name\tAmount\tTeam Size\n\r";
		while($t=mysqli_fetch_array($r))
		{
			$id = $t[0];
			$regno = $t[1];
			$event_id = $t[2];
			$team = $t[3];
			$paid = $t[7];
			$price =$t[4];

			$sum+=$price;
			$participants+=$team;

			$q1 = "SELECT * FROM `events` WHERE `id` = $event_id";
			$r1 = mysqli_query($mysqli,$q1);
			$t1=mysqli_fetch_array($r1);
			$event_name = $t1[1];
			$q2 = "SELECT * FROM `external_participants` WHERE `regno` ='$regno'";
			$r2 = mysqli_query($mysqli,$q2);
			$t2 = mysqli_fetch_array($r2);
			$name = $t2[2];
			echo "$id\t$name\t$regno\t$event_name\t$price\t$team\r\n";
		}
		echo "\n\n Total number of Registrations :\t $participants \nTotal amount collected:\t$sum";
	}
	else
	{
		require 'logout.php';
	}
?>