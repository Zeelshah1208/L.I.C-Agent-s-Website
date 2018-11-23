<!DOCTYPE html>
<html>
<head>
<style>
#form1{
	//visibility:hidden;
	display:none;
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
	document.getElementById("form1").style.display="block";
}
	function hide1(){
	document.getElementById("form1").style.display="none";
	
}
</script>



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

  
</style>
</head>

<body style="background-color:#ffffcc; background-attachment: fixed;
 background-repeat: no-repeat; background-size: cover;">

<div class="w3-container">
  <h2>Details of transcations</h2>
  
  <table class="w3-table" border="3px">
    <tr>
      <th>Customer id</th>
      <th>Customer name</th>
      <th>Policy name</th>
      <th>Table number</th>
      <th>Starting date</th>
      <th>Policy amount</th>
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

<div>
  <form method="POST" action="transactionadd.php">

  <table style="width:200px" align = "center" >
   <tr>


   <td> <label for="custid">Customer-id</label></td>
    <td><input type="text"  name="custid" required></td>

    </tr>

    <tr>

   <td> <label for="custname">Customer Name</label></td>
    <td><input type="text"  name="custname" required></td>

    <tr>

   <tr>
   <td> <label for="policyname">Policy name</label></td>
  <td> <input type="text"  name="policyname" required></td>

  </tr>

  <tr>

    <td><label for="tablenumber">Table number</label></td>
   <td><input type="text"  name="tablenumber" required></td>
   </tr>

   <tr>

    <td><label for="starting date">Starting date</label></td>
   <td><input type="date"  name="startingdate" required></td>
   </tr>

   <tr>

   <td> <label for="policynumber">Policy amount</label></td>
   <td><input type="number"  name="policynumber" required></td>

   </tr>

   <tr>


   <td>  <label for="term">Term</label></td>
  <td> <input type="text"  name="term" required></td>

  </tr>

  <tr>

 <td><label for="modeofpayment">Mode of payment</label></td>
  <td> <select name="modeofpayment">
  <option value="yly">Yearly</option>
  <option value="hly">Half Yearly</option>
  <option value="qly">Quarterly</option>
</select></td>

  </tr>

  

   <tr>

   <td> <label for="dateofmaturity">Date of maturity</label></td>
  <td> <input type="date"  name="dateofmaturity" required></td>

  </tr>

  <tr>


  <td>  <label for="height">Height</label></td>
   <td><input type="text"  name="height" required></td>

   </tr>

   <tr>


   <td> <label for="weight">Weight</label></td>
  <td> <input type="text"  name="weight"required ></td>
  </tr>

  <tr>

    <td><label for="medicaltest">Medical test</label></td>
   <td><input type="text"  name="medicaltest"required ></td>
   </tr>
<tr>

<td><input type="submit" value="Submit"></td>

</tr>
  </form>
</div>




  

</table>
</form>
<button id="hide" style="margin-left:15px;" onclick="hide1()">Hide</button> 
 </div>

 

</body>
</html>