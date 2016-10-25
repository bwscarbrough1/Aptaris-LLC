<?php
echo "
<html>
	<head>
	<title>Update a Customer</title>
		<script type='text/javascript' language='javascript'>
		function setSelectedCustomer()
		{
			var selectedCustomer=	document.getElementById('customerOptions');   

			document.getElementById('customerId').value = selectedCustomer.options[selectedCustomer.selectedIndex].value;
		}

		function addOptionToCustomers(text, value)
		{
			ddl = document.getELementById('CustomerOptions');
			var option = document.createElement('option');
			option.value = value;
			option.text = text;
			ddl.options.add(option);	
		}

		</script>
	</head>
	<body>
		<h2 align='center'>Update a Customer</h1>

		<h3 align='center'>Select a Customer to Update:</h2>
			<form id='selectCustomerForm' name='selectCustomerForm' method='POST' action='UpdateCustomer.php' onsubmit='setSelectedCustomer();'>
				<table align='center'>
					<tr>
						<td>
							<select id='customerOptions'>
								<option>Select a Vendor</option>
								";

								$addr = 'localhost';
								$user = 'wdean2';
								$pass = 'csc423?';
								$db = 'fal16_csc423_wdean2';

								$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
								echo("Connected to Database<br>");

								$query = "Select VendorId, VendorCode, VendorName from Vendor";
								$result = $db->query($query);

								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{

										$vId = $row["VendorId"];
										$vCode = $row["VendorCode"];
										$vName = $row["VendorName"];

										echo"<option value='$vId'>$vCode - $vName</option>";
									}
								}
								else
								{
								    echo "0 results";
								}

								$db->close();
							echo
								"
							</select>
						</td>
						<td>
							<input type='submit' value='Go'>
							<input name='SubmitCheck' type='hidden' value='sent'>
							<input name='vendorId' id='vendorId' type='hidden'>
						</td>
					</tr>
				</table>
			</form>
		<body>
</html>
";
?>