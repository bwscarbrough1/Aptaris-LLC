<?php

// Header file will use this to set the page title
$PageTitle="Nanno's Foods";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<link rel="stylesheet" href="./css/styles.css" />
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<h2>CSC 423 Team 2 - Nanno's Foods</h2>
<hr/>
<p>This website should currently implement functionality to register vendors, modify/delete vendors, add/modify/delete store locations, add/modify/delete stocked items, and add/modify/delete customers.</p>
<table>
	<tr>
		<td><a href='./createNewOrder.php' class='button'>Create An Order</a></td>
	</tr>	
	<tr>
		<td><a href='./addVendor.php' class='button'>Add A Vendor</a></td>
		<td><a href='./addItem.php' class='button'>Add An Item</a></td>
		<td><a href='./addLocation.php' class='button'>Add A Location</a></td>
		<td><a href='./addCustomer.php' class='button'>Add A Customer</a></td>
		<td><a href='./viewOrderLogin.php' class='button'>View a Order</a></td>
	</tr>
	<tr>
		<td><a href='./selectVendorToUpdate.php' class='button'>Update A Vendor</a></td>
		<td><a href='./selectItemToUpdate.php' class='button'>Update An Item</a></td>
		<td><a href='./selectLocationToUpdate.php' class='button'>Update A Location</a></td>
		<td><a href='./selectCustomerToUpdate.php' class='button'>Update A Customer</a></td>
	
	</tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
