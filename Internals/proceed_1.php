<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require("sql_con.php");
	$cart=$_POST["cart"];
	$team=$_POST["team"];
	$regno = $_POST["regno"];
	$sum=0;
	?>
	<div class="container row">
	<?php
	echo"<br/><br/><h4>Reg no: $regno </h4><br/><TABLE class='striped card card-content col s6' style='margin-right:2em'><tr><th>Name</th><th>Price(&#8377;)/Participant</th><th>Total Price(&#8377;)</th><th>Team Size</th></tr>";
	if($cart!="")
	{
		$cart_array = explode(",",$cart);
		$team_array = explode(",",$team);
		for($i=0;$i<count($cart_array);$i++)
		{
			$val=0;
			$q = "SELECT * FROM `events` WHERE `id`=$cart_array[$i]";
			$r = mysqli_query($mysqli,$q);
			$t=mysqli_fetch_array($r);
			$val = $t[2]*$team_array[$i]; 
			$sum+=$val;
			echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$val</TD><TD>$team_array[$i]</TD>";
		}
		echo"<TR><TH>Total</TH><TH colspan='2'>&#8377; $sum</TH></TR></TABLE>";
		echo"<b>Payment Mode:</B><div class='input-field'><input type='radio' name='pay' id='pay1' value='0' onclick='payment(this.value)' class='with-gap indigo'><label for='pay1'>Card Payment</label><BR/><input type='radio' name='pay' id='pay2' value='1'  class='with-gap'checked onclick='payment(this.value)'><label for='pay2'>Cash Payment</label><br>";
		echo"<div id='dd'></div><br><div style='float:right'>";
		echo"<button class='btn waves-effect waves-light indigo darken-4' onclick='checkout()' id='proceed_2' name='proceed_2'><i class='material-icons left'>check_circle</i>Checkout </button></div></div>	<div class=' fixed-action-btn' style='bottom: 30px; right: 24px;'>Home<br>
				<a class='red btn-floating btn-large waves-effect modal-trigger z-depth-3' title='Home' href='event_list.php?r=$regno'>
					<i class='large material-icons'>home</i>
				</a>
			</div>";
	}
}
else
	require("logout.php");
?>
</div>

