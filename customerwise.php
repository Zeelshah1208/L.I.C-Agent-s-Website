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
  <h2>Customer-wise Details</h2>
  
  <table class="w3-table" border="3px">
    <tr>
      <th>Customer-id</th>
      <th>Name</th>
      
      <th>Table number</th>
	  <th>Policy name</th>
      <th>Starting date</th>
      <th>Premium amount</th>
      

    </tr>
	<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'licagents'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
if(empty($_SESSION))//if the session not yet started 
   session_start();
 $a=  $_SESSION['agencycode'];
$sql = "SELECT custid,custname,tablenumber,policyname,startingdate,premiumamount 
		FROM transaction WHERE agencycode='$a' order by custid";
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			
			
			echo '
				
				
			
				<tr>
				<td>'.$row['custid'].'</td>
				<td>'.$row['custname'].'</td>
				<td>'.$row['tablenumber'].'</td>
				<td>'.$row['policyname'].'</td>
				<td>'.$row['startingdate'].'</td>
				<td>'.$row['premiumamount'].'</td>
				
				
				</tr>
				
					
					
					
					
					';

			$no++;
			
		}
?>
    
  </table>
</div>