<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require 'sql_con.php';

		$id = $_REQUEST['id'];
		$cat =	$_REQUEST['cat']; 	
		$mode = $_SESSION['mode'];
		$cat_1=$cat;

		$i=0;
		$j=0;
		$t_price=0;

		if($cat==11)
			$cat="Advertisements";

		else if($cat==12)
			$cat="Marketing_and_Publicity";

		else if($cat==13)
			$cat="Printing";

		else if($cat==14)
			$cat="Stationaries";

		else if($cat==15)
			$cat="Photos_and_Videos";

		else if($cat==16)
			$cat="Prize_Money";

		else if($cat==17)
			$cat="Stall_Installation";
		
		else if($cat==18)
			$cat="T_Shirt_Purchases";
		
		else if($cat==19)
			$cat="Travel";
		
		else if($cat==20)
			$cat="Workshop";
		
		else if($cat==21)
			$cat="Reimburesement";

		else if($cat==22)
			$cat="Miscellaneous";


		$query_basic = "SELECT * FROM `basic_expenditure_info` where category = $cat_1 AND mode ='3'";
		$result_basic = mysqli_query($mysqli,$query_basic);

		if((mysqli_num_rows($result_basic)>0)&&($id==1))
		{
			$d=date('d/m/Y');
			$file_name = "All_NET_".$cat."_".$d.".xls";
			header( "Content-Type: application/vnd.ms-excel" );
			header( "Content-disposition: attachment; filename=$file_name" );
			echo   'Event Name' . "\t". 'Company Name' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Email-Id' . "\t".'Remarks '."\t". 'Transaction ID' . "\t" . 'Bank Name' . "\t". 'Issue Date' . "\n\n";
			
			while($arr_basic=mysqli_fetch_array($result_basic))
			{
				$unique_id=$arr_basic['unique_id'];

				$sql_cash = "SELECT * FROM  `mode_net_expenditure` WHERE unique_id_basic=$unique_id;";
				$res_cash = mysqli_query($mysqli,$sql_cash);
				
				if((mysqli_num_rows($res_cash)>0)&&($res_cash))
					{
					while($arr_cash=mysqli_fetch_array($res_cash))
					{
						echo $arr_basic['event_name']. "\t".$arr_basic['company_name']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['email_id']. "\t".$arr_basic['remarks']. "\t";
						echo $arr_cash['trans_id']."\t" . $arr_cash['bank_name_net'] ."\t" . $arr_cash['issue_date_net'] ."\n";

						$t_price+=$arr_basic['amount'];
						$i++;
					}
				}
			}

			echo "\n\n Total number of Registrations :\t $i \nTotal amount collected:\t$t_price";
		}
	}
	
	else
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:login_approve.php");
	}
?>