<!DOCTYPE html>
<html>
    <head>
        <title>checkout</title>
    </head>
    <body>
        <?php
            session_start();
            $bookId = $_SESSION["BookId"];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require('mysqli_connect.php');
                $errors = [];
        
                if (empty($_POST['firstname'])) {
                    $errors[] = 'Please fill first name';
                } else {
                    $firstname = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
                }
            
                if (empty($_POST['lastname'])) {
                    $errors[] = 'Please fill first name';
                } else {
                    $lastname = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
                }
                if (empty($_POST['address'])) {
                    $errors[] = 'Please put a delivery address';
                } else {
                    $address = mysqli_real_escape_string($dbc, trim($_POST['address']));
                }
                if (empty($_POST['postalcode'])) {
                    $errors[] = 'Please put a delivery address';
                } else {
                    $postalcode = mysqli_real_escape_string($dbc, trim($_POST['postalcode']));
                }
            
                if(!isset( $_POST['paymentoptions'])){
                    echo "NO payment option was selected";
                }else{
                    $paymentoptions = $_POST['paymentoptions'];
                }
            
                if (empty($errors)) {
                    $QInventory = "select * from inventory where BookId = $bookId";
                    $getInventory = @mysqli_query($dbc, $QInventory);
                    if(mysqli_fetch_array($getInventory)["Quantity"] > 0){
                        $QInsertCustomer = "insert into customers (`FirstName`, `LastName`, `Address`, `PostalCode`) values ('$firstname', '$lastname', '$address', '$postalcode')";
                        $RInsertCustomer = @mysqli_query($dbc, $QInsertCustomer);
                        
                        if($RInsertCustomer){
                            $QCustoemr = "select CustomerId from customers where FirstName = '$firstname' and LastName = '$lastname'";
                            $QBook = "select * from book where BookId = '$bookId'";

                            $getCustoemr = @mysqli_query($dbc, $QCustoemr);
                            $getBook = @mysqli_query($dbc, $QBook);

                            $CustomerId = mysqli_fetch_array($getCustoemr)["CustomerId"];
                            $BookPrice = mysqli_fetch_array($getBook)["Price"];

                            $OrderTotal = $BookPrice + $BookPrice*0.13;
                            $dateofOrder = date('YYYY-MM-DD');
                            $QInsertOrder = "insert into orders (`CustomerId`, `ItemId`, `OrderSubTotal`, `OrderTotal`, `OrderDate`) values ('$CustomerId', '$bookId', '$BookPrice', '$OrderTotal', '$dateofOrder')";
                            $RInsertOrder = @mysqli_query($dbc, $QInsertOrder);

                            if($RInsertOrder){
                                $QInventory = "select * from inventory where BookId = $bookId";
                                $getInventory = @mysqli_query($dbc, $QInventory);
                                $quantity = mysqli_fetch_array($getInventory)["Quantity"];
                                $ItemStock  = $quantity-1;
                                $QInventoryUpdate = "update inventory set Quantity = $ItemStock where BookId = $bookId";
                                $RInventoryUpdate = @mysqli_query($dbc, $QInventoryUpdate);
                                $bookTitle = mysqli_fetch_array($getBook)["BookTitle"];
                                echo '<h2>Thank you!</h2>';
                                echo '<h1 style="color:green;">Your Order has been placed</h1>';
                                echo '<h3>Order Details </h3>';
                                echo "<p> Book name:  $bookTitle </br>Payment Method: $paymentoptions</p>";
                            } else {
                                echo '</h1 style="color:red;">Error: Order cannot be placed</h1>';
                            }
                        }
                    } else {
                        echo '<h1>Sorry! This item is out of stock.</h1>';
                    }
                }else {
                    echo '<h1>Error in Inserting customer</h1>';
                }
                    
                mysqli_close($dbc);
                exit();

            } else {
        
                echo '<h1>Error: </h1>
                <p>The following error(s) occurred:<br>';
                foreach ($errors as $msg) {
                    echo ": $msg<br>\n";
                }
                echo '</p><p>Please try again.</p><br>';
        
            } 
            mysqli_close($dbc);
        ?>
        <section class="Orders">
            
        </section>
        
    </body>
</html>