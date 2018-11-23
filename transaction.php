<!DOCTYPE html>
<html>
<head>
<style>
#form1{
	visibility:hidden;
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
function visi(){
	document.getElementById("form1").style.visibility="visible";
}
	function hide1(){
	document.getElementById("form1").style.visibility="hidden";
	
}
</script>



<style>
  
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

  
</style>
</head>

<body style="background-image:url('Back To Earth.jpg'); background-attachment: fixed;
 background-repeat: no-repeat; background-size: cover;">

<div class="w3-container">
  <h2>Details of transcations</h2>
  
  <table class="w3-table">
    <tr>
      <th>Customer id</th>
      <th>Customer name</th>
      <th>Policy name</th>
      <th>Table number</th>
      <th>Starting date</th>
      <th>Policy number</th>
      <th>Term</th>
      <th>Mode of payment</th>
      <th>Premium amount</th>
      <th>Date of maturity</th>
      <th>Height</th>
      <th>Weight</th>
      <th>Medicaltest</th>


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

$sql = 'SELECT * 
		FROM transaction';
		
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
				<td>'.$row['policyname'].'</td>
				<td>'.$row['tablenumber'].'</td>
				<td>'.$row['startingdate'].'</td>
				<td>'.$row['policynumber'].'</td>
				<td>'.$row['term'].'</td>
				<td>'.$row['modeofpayment'].'</td>
				<td>'.$row['premiumamount'].'</td>
				<td>'.$row['dateofmaturity'].'</td>
				<td>'.$row['height'].'</td>
				<td>'.$row['weight'].'</td>
				<td>'.$row['medicaltest'].'</td>
								
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
<form class="w3-container"  method="POST" action="transaction.php">

<p>
  <label>Customer id</label>
  <input class="w3-input" type="text" name="custid"></p>
  <p>
  <label>Customer name</label>
  <input class="w3-input" type="text" name="custname"></p>
  <p>
  <label>Policy name</label>
  <input class="w3-input" type="text" name="policyname"></p>
  <p>
  <label>Table number</label>
  <input class="w3-input" type="text" name="tablenumber"></p>

   <p>
  <label>Starting date</label>
  <input class="w3-input" type="date" name="startingdate"></p>

   <p>
  <label>Policy number</label>
  <input class="w3-input" type="text" name="policynumber"></p>


<p>
  <label>Term</label>
  <input class="w3-input" type="text" name="term"></p>

  <p>
  <label>Mode of payment</label>
  <input class="w3-input" type="text" name="modeofpayment"></p>

  <p>
  <label>Premium amount</label>
  <input class="w3-input" type="number" mode="premiumamount"></p>

  <p>
  <label>Date of maturity</label>
  <input class="w3-input" type="date" name="dateofmaturity"></p>

  <p>
  <label>Height</label>
  <input class="w3-input" type="text" name="height"></p>

  <p>
  <label>Weight</label>
  <input class="w3-input" type="text" name="weight"></p>

  <p>
  <label>Medical test</label>
  <input class="w3-input" type="text" name="medicaltest"></p>

  <input type="submit" value="Submit">


</form>
<button id="hide" style="margin-left:15px;" onclick="hide1()">Hide</button> 
 </div>

 

</body>
</html>