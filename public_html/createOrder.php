<?php

// Header file will use this to set the page title
$PageTitle="Place Order";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/setSelectedStore.js" type="text/javascript"></script>
	<link rel="stylesheet" href="./css/styles.css" />
<?php }


// Header
include_once('./templates/header.php');
include_once('./inc/runDbQuery.php');

$vendorId=$_POST['vendorId'];
$result= runDbQuery("Select VendorName, VendorCode from Vendor Where VendorId=$vendorId");

while($row=$result->fetch_assoc())
{
	$vendorName=htmlspecialchars($row['VendorName']);
	$vendorCode=htmlspecialchars($row['VendorCode']);
}
?>

<!-- Body Content Goes Here -->
<h2 align='center'>Create an Order<br><?php echo"$vendorName<br>($vendorCode)";?></h2>

<h3 align='center'>Select a Store:</h3>
<form id='createOrderForm' name='createOrderForm' method='POST' action='dbScriptCreateOrder.php'>
	<table align='center'>
		<tr>
			<td colspan='2' bgcolor="#FFFFFF">
				<center>
					<select id='storeOptions' onchange='setSelectedStore()'>";
		        		<option>Select store:</option>";
						<?php
						include_once('./dbScriptPopulateStores.php');
						?>
					</select>
				</center>
			</td>
			
		<tr>
			<td colspan='2' bgcolor="#FFFFFF">
				<h3 align='center'>Select Items for Order:</h3>
			</td>
		</tr>
		<tr>
			<td bgcolor="#FFFFFF"><center><h4>Item Description</h4></center></td>
			<td bgcolor="#FFFFFF"><center><h4>Quantity</label></h4></td>
		</tr>
		<?php 
		// include db script for items for sale stores: include_once('dbScriptPopulateItems');
			$result = runDbQuery("Select * From InventoryItem Where VendorId=$vendorId");
			while($row = $result->fetch_assoc())
			{
				$itemId = htmlspecialchars($row["ItemId"]);
				$description = htmlspecialchars($row["Description"]);
				echo"
					<tr>
						<td><label>$description</label></td>							
						<td><input name='$itemId' id='$itemId' type='number' value='0'></td>
					</tr>
				";
			}
		?>
	</table>
	<table align = "center">
		<tr>	
			<td>
				<input type='hidden' name='storeId' id='storeId' value=''>
				<input type='hidden' name='vendorId' id='vendorId' value=<?php echo"'$vendorId'";?>>
				<input type='submit' value='Create Order'>
				<input type='hidden' name='createOrderFlag' value='true'>
			</td>
			<td>
        		<!--<input type='button' name='cancel' id='cancel' value='Home (no changes)' onclick="index.php">-->
				<a href='./index.php' class='button'>Home</a>
			</td>
		</tr>
	</table>
</form>

<?php
// Footer
include_once('./templates/footer.php');