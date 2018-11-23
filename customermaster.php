

<!DOCTYPE html>


<html>
<head>
<style>
body{
	overflow-x:scroll;
}

input[type=submit] {
    width: 50%;
    background-color: #0066ff;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 200px;

}
#form1{
	//visibility:hidden;
	display:none;
}
.table1 td{
	text-align:right;
	//border-collapse:collapse;
	padding-right:5px;
	
}
.error {color: #FF0000;}
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
function visi(){
	document.getElementById("form1").style.display="block";
}
	function hide1(){
	document.getElementById("form1").style.display="none";
	
}
</script>
</head>
<body style="background-color:#ffffcc; background-attachment: fixed;
 background-repeat: no-repeat; background-size: cover;">



<div class="w3-container">
  <h2>Details of customers</h2>
  
  <table class="w3-table" border="3px">
    <tr>
      <th>Customer-id</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Date of birth</th>
	  <th>Age</th>
      <th>Occupation</th>
      <th>Permanent Address</th>
      <th>City</th>
      <th>Country</th>
      <th>Pincode</th>
      <th>Contact number</th>
      <th>Email</th>
	  <th>Bank name</th>
      <th>Account number</th>
      <th>MIRC code</th>

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
$sql = "SELECT * 
		FROM customermaster WHERE agencycode='$a'";
		
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
				<td>'.$row['custgender'].'</td>
				<td>'.$row['custdob'].'</td>
				<td>'.$row['custage'].'</td>
				<td>'.$row['custoccupation'].'</td>
				<td>'.$row['custaddress'].'</td>
				<td>'.$row['custcity'].'</td>
				<td>'.$row['custcountry'].'</td>
				<td>'.$row['custpincode'].'</td>
				<td>'.$row['custcontactno'].'</td>
				<td>'.$row['custemail'].'</td>
				<td>'.$row['custbankname'].'</td>
				<td>'.$row['custaccno'].'</td>
				<td>'.$row['custmirccode'].'</td>
				
				</tr>
				
					
					
					
					
					';

			$no++;
			
		}
?>
    
  </table>
</div>

<div class="w3-container w3-blue">
  
</div>
<button id="show"onclick="visi()" style="margin:15px">Add new data</button>
<div id="form1">
<form method="POST" action="customeradd.php">
<p><span class="error">* required field</span></p>
<table style="width:200px" align = "center">

<tr>
  <td><label>Customer-id</label><span class="error">*</span></td>
  <td><input  type="text" name="custid" required></td>
  </tr>

  <tr>
  
 <td> <label>Name</label><span class="error">*</span></td>
  <td><input  type="text" name="custname" required></td>
  
  </tr>

  <tr>
 <td> <label>Gender</label><span class="error">*</span></td>
<td>    <input  type="radio" name="custgender" value="male">Male
 <input type="radio" name="custgender" value="female">Female
 </td>
</tr>



  <tr>

  <td><label>Date of birth</label><span class="error">*</span></td>
 <td> <input type="date" name="custdob" required></td>

 </tr>

   

  <tr>

<td>  <label>Occupation</label><span class="error">*</span></td>
 <td> <input  type="text" name="custoccupation" required></td>

  </tr>

  <tr>
  <td><label> Permanent Address</label><span class="error">*</span></td>
<td>  <input  type="text" name="custaddress" required></td>

</tr>

  <tr>
  <td><label>City</label><span class="error">*</span></td>
  <td><input  type="text" name="custcity" required></td>

  </tr>


  <tr>

  <td><label>Country</label><span class="error">*</span></td>
  <td><input  type="text" name="custcountry" required></td>

  </tr>



  <tr>
  <td><label>Pincode</label><span class="error">*</span></td>
 <td> <input  type="text" name="custpincode" required></td>

 </tr>
 <tr>
  
  <td><label>Contact number</label><span class="error">*</span></td>
  <td><input  type="text" name="custcontactno" required></td>

  </tr>

  <tr>
  <td><label>Email</label><span class="error">*</span></td>
 <td> <input  type="text" name="custemail" required></td>
 </tr>

  <tr>
  <td><label>Bank Name</label><span class="error">*</span></td>
 <td> <input type="text" name="custbankname" required></td>

 </tr>

  <tr>

  <td>  <label>Account number</label><span class="error">*</span></td>
  <td><input  type="text" name="custaccno" required></td>
  </tr>

  <tr>


<td>  <label>MIRC Code</label><span class="error">*</span></td>
 <td> <input  type="text" name="custmirccode" required></td>

 </tr>
    
	<tr>
	<td><input type="submit" value="Submit"></td>
  </tr>
  </table>
</form>
 <br>
 <button id="hide" style="margin-left:15px;" onclick="hide1()">Hide</button> 
 </div>

<br>


</body>
</html>