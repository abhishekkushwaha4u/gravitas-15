<?php
	session_start();
	if(isset($_SESSION['name_fin']))//session_variable
	{
		  $mode=$_SESSION['mode'];
    	{
				$head = '';
          if(($mode==0)||($mode==55))
          {
            session_unset();
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
            session_destroy();
            header("Location:login_approve.php");
          }
	        if($mode==1)
	        {
	          $head = 'First Approval';
	        }

	        if($mode==2)
	        {
	          $head = "2nd Approval";
	        }

	        if($mode==3)
	        {
	          $head = "3rd Approval";
	        }
	   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>GraVITas'15</title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
<style>
	/* label color */
	.input-field label {
		color: #1a237e;
	}
	/* label focus color */
	.input-field input[type=text]:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	.input-field input[type=text] {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	.input-field input[type=text]:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	label {
		color: #1a237e;
	}
	/* label focus color */
	input[type=text]:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	input[type=text] {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	input[type=text]:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	.input-field input[type=password]:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	.input-field input[type=password] {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	.input-field input[type=password]:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	.input-field textarea:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	.input-field textarea {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	 textarea:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	body {
	display: flex;
	min-height: 100vh;
	flex-direction: column;
}

main {
	flex: 1 0 auto;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

</head>
<body>
<main>
<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
	<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
	<h4 class="header light white-text"><?php echo $head; ?></h4>
	<a class="indigo darken-1 btn waves-effect z-depth-3 right"   title="Logout" href="logout.php">
		<i class="material-icons">power_settings_new</i>
	</a>
	<br />
</header>
<div class="row indigo darken-2" style="width:100%;padding-bottom:0.2em">
<div class="col s12">
	<ul class="tabs indigo darken-2">
		<li class="tab col s2"><a href="#reg" class="white-text waves-effect">Registrations</a></li>
		<li class="tab col s2"><a href="#mod" class="white-text waves-effect">Modes</a></li>
	</ul>
</div>
</div>
<div class='container'>
<div id='reg'>
        <input type = 'radio' class='with-gap' value ='external' name ='mode_registration' id='100' onclick='registrations_verify(this.id)'>
				<label for='100'>External Registration</label>
        <input type = 'radio' class='with-gap' value ='internal' name ='mode_registration' id='101' onclick='registrations_verify(this.id)'>
				<label for='101'>Internal Registration</label>

</div>
<div id='mod'>

				<input type = 'radio' value ='sponsor' class='with-gap' name ='mode_verify' id='0' onclick='verify_method_pay(this.id)'><label for='0'>Sponsor</label>
				<input type = 'radio' value ='accomodation' class='with-gap' name ='mode_verify' id='1' onclick='verify_method_pay(this.id)'><label for='1'>Accomodation</label>
				<input type = 'radio' value ='stall_rent' class='with-gap' name ='mode_verify' id='2' onclick='verify_method_pay(this.id)'><label for='2'>Stall Rent</label>
				<input type = 'radio' value ='shirt_sales' class='with-gap' name ='mode_verify' id='3' onclick='verify_method_pay(this.id)'><label for='3'>T Shirt Sales</label>
				<input type = 'radio' value ='workshop' class='with-gap' name ='mode_verify' id='4' onclick='verify_method_pay(this.id)'><label for='4'>Workshops</label>
				<input type = 'radio' value ='others' class='with-gap' name ='mode_verify' id='5' onclick='verify_method_pay(this.id)'><label for='5'>Others</label>
				</br>
</div>
        <h5 class='header light'>Dowload expenses (xls)</h5>
				<div class='row'>
					<div class='input-field col s8 m5'>
        <select id='branch_revenue' class='browser-default' onchange='notify_me_exel_dwnd(this.value)' name='branch_expenses'>
          <option value='0'>Choose Branch</option>
          <option value='11'>Advertisements</option>
          <option value='12'>Marketing and Publicity</option>
          <option value='13'>Printing</option>
          <option value='14'>Stationaries</option>
          <option value='15'>Photos and Videos</option>
          <option value='16'>Prize Money</option>
          <option value='17'>Stall Installation</option>
          <option value='18'>T-Shirt Purchases</option>
          <option value='19'>Travel</option>
          <option value='20'>Workshop</option>
          <option value='21'>Reimburesement to Merit Students</option>
          <option value='22'>Miscellaneous</option>
        </select>
			</div>
		</div>

        <div id='more_credit_options_verify'></div><br>
			</div>
		</main>
	</body>
	</html>
				<?php
	}
	else//logout
	{
      session_unset();
      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
      session_destroy();
      header("Location:login_approve.php");
	}
?>

<script type="text/javascript">
//display the more options for mode of payement
function verify_method_pay(id)  //approve_home_1.php -> approve_1.php
{
  	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("more_credit_options_verify").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("more_credit_options_verify").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
  xmlhttp.open("GET","approve_1.php?id_verify="+id,true);
  xmlhttp.send();
}

function registrations_verify(id)
{
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          document.getElementById("more_credit_options_verify").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("more_credit_options_verify").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
      }
    }
  xmlhttp.open("GET","reg_approve_1.php?id="+id,true);
  xmlhttp.send();
}

/*Approve cash starts*/

function approve_cash(id) //approve_1.php -> approve_cash.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_approve_option").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
    xmlhttp.open("GET","approve_cash.php?id="+id,true);
    xmlhttp.send();
}

function search_spon(id,cat)  //approve_cash.php->search_name_spon.php
{
    if(id==1)
    {
      	var s = document.getElementById("search_per_name").value;
        if(s!='')
        {
          document.getElementById("search_comp_name").value='';
        }
    }
    if(id==2)
    {
        var s = document.getElementById("search_comp_name").value;
        if(s!='')
        {
          document.getElementById("search_per_name").value='';
        }
    }
    if(s!='')
    {
    	var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
    	{
      	if (xmlhttp.readyState==4 && xmlhttp.status==200)
      	{
        		document.getElementById("search_results_spon").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
  		  }
    	}
      xmlhttp.open("GET","search_name_spon.php?name="+s+"&id="+id+"&cat="+cat,true);
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon").innerHTML="Search results are displayed here";
    }
}

function approve_spon_cash(id_but)  //search_name_spon/approve_cash -> approve_spon_payement
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_payement.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}
/*Approve cash ends*/


/*DD starts from here*/
function approve_dd(id) //approve_1.php -> approve_dd.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_approve_option").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
  xmlhttp.open("GET","approve_dd.php?id="+id,true);
  xmlhttp.send();
}

function search_spon_dd(cat)//approve_dd -> search_name_spon_dd.php
{
   var s = document.getElementById("search_dd_numb").value
    if(s!='')
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("search_results_spon_dd").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon_dd").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
        }
      }

      xmlhttp.open("GET","search_name_spon_dd.php?name="+s+"&cat="+cat,true);
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon_dd").innerHTML="Search results are displayed here";
    }
}

function approve_spon_dd(id_but) //search_name_spon_dd.php/  approve_dd.php -> approve_spon_dd_payement.php
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_dd_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_dd_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_dd_payement.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}
/*Approve DD ends*/


/*Approve Cheque starts*/
function approve_cheque(id) //approve_1.php -> approve_cheque.php
{
	  var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_approve_option").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
    xmlhttp.open("GET","approve_cheque.php?id="+id,true);
    xmlhttp.send();
}



function search_spon_chq(cat)// approve_cheque.php , search_name_spon_chq.php
{
    var s = document.getElementById("search_chq_numb").value
    if(s!='')
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("search_results_spon_chq").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon_chq").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
        }
      }

      xmlhttp.open("GET","search_name_spon_chq.php?name="+s+"&cat="+cat,true);
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon_chq").innerHTML="Search results are displayed here";
    }
}

function approve_spon_chq(id_but) //approve_cheque -> approve_spon_chq_payement.php
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_chq_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_chq_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_chq_payement.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}

/*Approve cheque Ends*/

//NET banking starts
function approve_net(id)
{
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          document.getElementById("select_approve_option").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
      }
    }
    xmlhttp.open("GET","approve_net_banking.php?id="+id,true);
    xmlhttp.send();
}

//NET banking ends


/*EXCEL downloads*/
function download_cash_excel(id,cat)	//Make it as event-wise //approve_cash.php -> excel_cash_dwn.php
{
	//var s = document.getElementById("min").value;
	//var e = document.getElementById("max").value;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_cash_dwn.php?id='+id+'&cat='+cat;
    	}
  	}
  	xmlhttp.open("GET","excel_cash_dwn.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}

function notify_me_exel_dwnd(id)  //approve_1.php -> excel_cat_category.php
{
	Materialize.toast('Starting Download', 4000, 'rounded');
  if(id==0)
    return false;
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location.replace("excel_cat_category.php?id="+id);
      }
    }
    xmlhttp.open("GET","excel_cat_category.php?id="+id,true);
    xmlhttp.send();
}

function download_chq_excel(id,cat) //approve_cheque -> excel_cqh_dwn.php
{
	Materialize.toast('Starting Download', 4000, 'rounded');
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_cqh_dwn.php?id='+id+'&cat='+cat;
    	}
  	}
  	xmlhttp.open("GET","excel_cqh_dwn.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}

function download_dd_excel(id,cat)  //approve_dd.php -> excel_dd_dwn.php
{
	  Materialize.toast('Starting Download', 4000, 'rounded');
	  var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_dd_dwn.php?id='+id+'&cat='+cat;
    	}
  	}
  	xmlhttp.open("GET","excel_dd_dwn.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}

function download_net_excel(id,cat) 
{
    Materialize.toast('Starting Download', 4000, 'rounded');
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            window.location = 'excel_net_dwn.php?id='+id+'&cat='+cat;
        }
    }
    xmlhttp.open("GET","excel_net_dwn.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}

function dwnld_all_approved_cat(id) //approve_1.php -> excel_approved_category_dwnld.php
{
	Materialize.toast('Starting Download', 4000, 'rounded');
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_approved_category_dwnld.php?id='+id;
      }
    }
    xmlhttp.open("GET","excel_approved_category_dwnld.php?id="+id,true);
    xmlhttp.send();
}

function dwnld_all_approved_cat_indiv(id)
{
	Materialize.toast('Starting Download', 4000, 'rounded');
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_approved_category_dwnld_indiv.php?id='+id;
      }
    }
    xmlhttp.open("GET","excel_approved_category_dwnld_indiv.php?id="+id,true);
    xmlhttp.send();
}


function submit_reg_app(cat)//(cat to see int or ext and id to know the count)
{
    var id_reg=document.getElementById('id_reg').value;
    var key=100;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_extreg_approve.php?id='+id_reg+'&key='+key+'&cat='+cat;
      }
    }
    xmlhttp.open("GET","excel_extreg_approve.php?id="+id_reg+"&key="+key+"&cat="+cat,true);
    xmlhttp.send();
}
//Excel sheets done

//INTERNALS AND EXTERNALS APPROVAL
function approve_register(id,cat)//id gives the unique-id of the transaction and cat gives info regarding ext or internal
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_reg_"+id).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_reg_"+id).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_reg_payement.php?id="+id+"&cat="+cat,true);
        xmlhttp.send();
        return true;
    }
    return false;
}

//Reg-ex calls
function isNumber(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
        return true;
}
</script>
