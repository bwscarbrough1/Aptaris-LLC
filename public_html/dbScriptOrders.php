<?php

// Header file will use this to set the page title
$PageTitle="Vendor Orders";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
<?php }

// Run the DB Script and output any errors for debugging
if(isset($_POST['submit'])){
    // Always connect to DB
    //$config = include('./inc/config.php');
    //$conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
	
		$addr = 'csdb.brockport.edu';
								$user = 'wdean2';
								$pass = 'csc423?';
								$db = 'fal16_csc423_wdean2';

								$conn = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
								echo("Connected to Database<br>");
	
	
    if($conn->connect_error){
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Error: " . $mysqli->connect_errno . "\n";
        
        exit;
    }

    // Always grab customer info from the form
    $orderId = $_POST['orderId'];
    $vendorId = $_POST['VendorId'];
    $storeId = $_POST['storeId'];
    $datetimeOrder = $_POST['datetimeOrder'];
    $status = $_POST['status'];
    $datetimeFullfillment = $_POST['datetimeFullfillment'];
    

    // Only run the following query if we are inserting
    if(isset($_POST['addOrder'])){
        $query =    "insert into Customer (CustomerId, Name, Address, City, State, ZIP, Phone, Email) ".
                    "values ('$cId', '$name', '$address', '$city', '$state', '$zip', '$phone', '$email')";
   
        $result = $conn->query($query);
        if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        else {
            echo "Customer created successfully" ;
        }
    }

    // Only run the following query if we are updating
    if(isset($_POST['updateOrder'])){
        $query= "update Customer ".
                "set Name='$name', Address='$address', City='$city',State='$state', ZIP='$zip', Phone='$phone', Email='$email' ".
                "where CustomerId='$cId'";

        $result = $conn->query($query);
        if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        else {
            echo "Customer updateded successfully" ;
        }
    }
	// Only run the following query if we are viewing vendors orders
    if(isset($_POST['viewOrders'])){
        
		$password = $_POST['Password'];
		// check to see if vendor id and password are valid
		$vquery= "SELECT * FROM Vendor WHERE VendorId='$vendorId' AND Password='$password'";
		
		$result = $conn->query($vquery);
		
		  if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
		else{
		// if valid proceed to get vendors orders
		$query= "SELECT * FROM Orders WHERE VendorId='$vendorId'";

        $result = $conn->query($query);
        if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
     
    
    // Always close the connection
    

else{
      ?>
    
<table border="2">
  <thead>
    <tr>
      <th>OrderId</th>
      <th>VendorId</th>
      <th>StoreId</th>
      <th>DateTimeOfOrder</th>
	  <th>Status</th>
	  <th>DateTimeOfFullfilment</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      if( mysql_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysql_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['OrderId']}</td><td>{$row['VendorId']}</td><td>{$row['StoreId']}</td><td>{$row['DateTimeOfOrder']}</td><td>{$row['Status']}</td><td>{$row['DateTimeOfFullfilment']}</td></tr>\n";
        }
      }
    
  }
  }
}
$conn->close();
}



// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./addCustomer.php' class='button'>Add A Customer</a></td>
        <td><a href='./selectCustomerToUpdate.php' class='button'>Update A Customer</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
