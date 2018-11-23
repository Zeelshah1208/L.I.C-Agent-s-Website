<!DOCTYPE html>


<html>
<head>
<style>


input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 200px;

}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
/*$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    });
});*/

</script>
</head>
<body style="background-color:#ffffcc; background-attachment: fixed;
 background-repeat: no-repeat; background-size: cover;">



<div class="w3-container">
  <h2>Premium Due</h2>
  
  <table class="w3-table" border="3px">
    <tr>
      <th>Customer-id</th>
      <th>Name</th>
      
      <th>Contact number</th>
	  <th>Email id</th>
      <th>Premium due month</th>
      <th>Premium amount</th>
      

    </tr>
	<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'licagents'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$currdate = time();
$qry = "select * from transaction t, customermaster c where t.custid = c.custid";
$res = $conn->query($qry);
while ($row = $res->fetch_assoc()) {
	$mon = date("m", strtotime($row['startingdate']));
	$currMon = date("m", $currdate);
	$mod = $row['modeofpayment'];
	$flag = 0;
	$newdate = time();
	if ($mon != $currMon) {
		if ($mod == "hly") {
			$mon = ($mon + 6) % 12;
			$newdate = strtotime('+6 months', strtotime($row['startingdate']));
			$newdate = date('dS-F', $newdate);
		}
		else if ($mod == "qly") {
			$mon1 = ($mon + 3) % 12;
			$mon2 = ($mon + 6) % 12;
			$mon3 = ($mon + 9) % 12;
			if ($mon1 == $currMon) {
				$mon = $mon1;
				$newdate = strtotime('+3 months', strtotime($row['startingdate']));
				$newdate = date('dS-F', $newdate);
			}
			else if ($mon2 == $currMon) {
				$mon = $mon2;
				$newdate = strtotime('+6 months', strtotime($row['startingdate']));
				$newdate = date('dS-F', $newdate);
			}
			else if ($mon3 == $currMon) {
				$mon = $mon3;
				$newdate = strtotime('+9 months', strtotime($row['startingdate']));
				$newdate = date('dS-F', $newdate);
			}
		}
		
		if ($mon == $currMon)
			$flag = 1;
	} else {
		
			$newdate = date('dS-F', strtotime($row['startingdate']));
		$flag = 1;
	}
	
	if ($flag == 1) {
		$cid = $row['custid'];
		
		echo '
				
				
			
				<tr>
				<td>'.$row['custid'].'</td>
				<td>'.$row['custname'].'</td>
				<td>'.$row['custcontactno'].'</td>
				<td>'.$row['custemail'].'</td>
				<td>'.$newdate.'</td>
				<td>'.$row['premiumamount'].'</td>
				
				
				</tr>
				
					
					
					
					
					';
	}
}
?>
    
  </table>
</div>