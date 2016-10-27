<?php

echo "
<!DOCTYPE html>
<html>
<head>
	<!-- Appropriate Title and meta tags -->
	<title>Nannos Foods</title>
	<meta http-equiv='Content-Type' content='text/html charset=utf-8' />
	<meta http-equiv='Content-Language' content='en-us' />
	<meta name='description' content='CSC 423 Group Assignment' />
	<meta name='keywords' content='dean mondy, will dean, brian scarbrough, cory easton, mason mascle, marlin mei, csc 423, group project' />
	<meta name='author' content='Dean Mondy, William Dean, Cory Easton, Marlin Mei, Mason Mascle, Brian Scarbrough' />
	<meta name='copyright' content='SUNY Brockport CSC423 2016' />

	<!-- Custom CSS -->
	<link rel='stylesheet' href='./css/styles.css' />
</head>
<body>
	<div class='page-container'>
		<h2>CSC 423 Team 2 - Nanno's Foods</h2>
		<hr/>
		<p>This website should currently implement functionality to register vendors, modify/delete vendors, add/modify/delete store locations, add/modify/delete stocked items, and add/modify/delete customers.</p>
		<table>
			<tr>
				<td><a href='addvendor2.php' class='button'>Add A Vendor</a></td>
				<td><a href='SelectVendorToUpdate.php' class='button'>Update A Vendor</a></td>
				<td><a href='selectItemToUpdate.php' class='button'>Update An Item</a></td>
				<td><a href='SelectLocationToUpdate.php' class='button'>Update A Location</a></td>
				<td><a href='addCustomer.php' class='button'>Add A Customer</a></td>
				<td><a href='SelectCustomerToUpdate.php' class='button'>Update A Customer</a></td>
				<td><a href='additem2.php' class='button'>Add Item</a></td>
							
			</tr>
		</table>
	    <hr/>
	    <footer>Last updated: October 27, 2016</footer>
	</div>
</body>
</html>
";
	
?>

