<?php
include("dbquery.php");

$obj= new Query;

if(isset($_POST['save'])) {

	if($obj->registerEmployee($_POST['Firstname'], $_POST['Lastname'],
		$_POST['hourlyWage'], $_POST['yearsWithInstitution'] )=="1") {
		
		echo"<script>alert('Added successfully!')</script>";	
	} else {

		echo"<script>alert('Error in sql query!')</script>";	
	}	
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Final exam please!</title>
</head>
<body>
	<form method="POST">
		<h2>Enter information!</h2>
		FirstName: <input type="text" name="Firstname" placeholder="Firstname"><br>
		Last Name: <input type="text" name="Lastname" placeholder="Lastname"><br>
		HourlyWage <input type="text" name="hourlyWage" placeholder="hourlyWage"><br>
		YearsW.Insti <input type="text" name="yearsWithInstitution" placeholder="Years"><br>
		<input type="submit" name="save" value="Save">
	</form><br><hr><br>














	<h2>Employees worked with company over 2 years(SOLUTION)</h2>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>hourlyWage</th>
			<th>Years</th>
			<th>Operation</th>
		</tr>
	<?php
	// GUHAMAGARA QUERY CODE ZA SELECT HEJURU YA 2 YEARS
	$stmt= $obj->viewEmployeesOver2years();
	while($row=$stmt->FETCH(PDO::FETCH_ASSOC)) {
	?>

	<tr>
		<td><?php echo $row['ID'];?></td>
		<td><?php echo $row['Firstname'];?></td>
		<td><?php echo $row['Lastname'];?></td>
		<td><?php echo $row['hourlyWage'];?></td>
		<td><?php echo $row['yearsWithInstitution'];?></td>
		<td><a href="home.php?ID=<?php echo $row['ID'];?> ">Delete</a></td>
		<?php } ?>
	</tr>
	</table><br><hr><br>













	<h2>All employees</h2>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>hourlyWage</th>
			<th>Years</th>
			<th>Operation</th>
		</tr>
		
	<?php
	// GUHAMAGARA QUERY CODE ZA SELECT YA BYOSE
	$stmt= $obj->viewAllEmployees();
	while($row=$stmt->FETCH(PDO::FETCH_ASSOC)) {
	?>

	<tr>
		<td><?php echo $row['ID'];?></td>
		<td><?php echo $row['Firstname'];?></td>
		<td><?php echo $row['Lastname'];?></td>
		<td><?php echo $row['hourlyWage'];?></td>
		<td><?php echo $row['yearsWithInstitution'];?></td>
		<td><a href="home.php?ID=<?php echo $row['ID'];?> ">Delete</a></td>
		<?php } ?>
	</tr>
	</table>











	<?php
	// GUHAMAGARA QUERY CODE ZO GUSIBA
	if(isset($_GET['ID'])) {
		$delete = $obj->deleteEmployee($_GET['ID']);

		if($delete) {
			header("location:home.php");
		} else {

		}
	}
	?>

</body>
</html>
