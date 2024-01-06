


<?php
require_once('connection.php');

// Set up your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beantocup";

// Create a new instance of the mysqli class for database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted for the first insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Name'], $_POST['Email'], $_POST['Phone'], $_POST['HomeAddress'], $_POST['Username'], $_POST['Password'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $HomeAddress = $_POST['HomeAddress'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];



    // Prepare and bind for the first insertion
    $customerStmt = $conn->prepare("INSERT INTO costumers (Name, Email,Phone,HomeAddress, Username, Password) VALUES (?, ?, ?, ?,?, ?)");
    $customerStmt->bind_param("ssssss", $Name, $Email,$Phone,$HomeAddress, $Username, $Password);

    // Execute the first insertion statement
    $customerResult = $customerStmt->execute();

    if ($customerResult) {
        echo 'Customer Data Successfully saved.';
    } else {
        echo 'There were errors while saving the Customer data.';
    }

    // Close the first insertion statement
    $customerStmt->close();
}

// Check if the form has been submitted for the second insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input1'], $_POST['input2'], $_POST['datePicker'], $_POST['input3'])) {
    // Collect form data for the second insertion
    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];
    $datePicker = $_POST['datePicker'];
    $input3 = $_POST['input3'];
    // Check if 'Admin' is not null before inserting
    if ($input1 !== null) {
        // Prepare and bind for the second insertion
        $stmt = $conn->prepare("INSERT INTO admintbl (Admin, Username, DateCreated, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $input1, $input2, $datePicker, $input3);

        // Execute the second insertion statement
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the second insertion statement
        $stmt->close();
    } else {
        echo "Error: 'Admin' cannot be null.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addorcostumerName'], $_POST['addorDateOrdered'], $_POST['addorShippingAddress'], $_POST['addorContactNumber'], $_POST['addorEmailAddress'],$_POST['addorPAymentmethod'], $_POST['addorItemsOrdered'], $_POST['addorSize'], $_POST['addorQuantity'], $_POST['addoramount'])) {
    // Collect form data for the second insertion
    $AddorcostumerName = $_POST['addorcostumerName'];
    $AddorDateOrdered = $_POST['addorDateOrdered'];
    $AddorShippingAddress = $_POST['addorShippingAddress'];
    $AddorContactNumber = $_POST['addorContactNumber'];
    $AddorEmailAddress = $_POST['addorEmailAddress'];
    $AddorPAymentmethod = $_POST['addorPAymentmethod'];
    $AddorItemsOrdered = $_POST['addorItemsOrdered'];
    $AddorSize = $_POST['addorSize'];
    $AddorQuantity = $_POST['addorQuantity'];
    $Addoramount = $_POST['addoramount'];

    // Check if 'Admin' is not null before inserting
    if ($AddorcostumerName !== null) {
        // Prepare and bind for the second insertion
        $stmt = $conn->prepare("INSERT INTO ordertbl (CostumerName, DatePlaced, ShippingAddress, ContactNumber, EmailAddress,PaymentMethod, ItemsOrdered, Size, QTY, Amount) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssd", $AddorcostumerName, $AddorDateOrdered, $AddorShippingAddress, $AddorContactNumber, $AddorEmailAddress , $AddorPAymentmethod, $AddorItemsOrdered, $AddorSize,  $AddorQuantity, $Addoramount);

        // Execute the second insertion statement
        if ($stmt->execute() === TRUE) {
            echo "New Ordered created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the second insertion statement
        $stmt->close();
    } else {
        echo "Error: 'Admin' cannot be null.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Name'], $_POST['Email'], $_POST['Emailcon'])) {
    // Collect form data for the second insertion
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $emailcon = $_POST['Emailcon'];
   
    // Check if 'Admin' is not null before inserting
    if ( $name  !== null) {
        // Prepare and bind for the second insertion
        $stmt = $conn->prepare("INSERT INTO message (Name, Email, MessaCont) VALUES (?, ?, ?)");
        $stmt->bind_param("sss",  $name ,  $email, $emailcon);

        // Execute the second insertion statement
        if ($stmt->execute() === TRUE) {
            echo "Message Sent successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the second insertion statement
        $stmt->close();
    } else {
        echo "Error: 'Admin' cannot be null.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['RateName'], $_POST['Rateshop'], $_POST['comments'])) {
    // Collect form data for the second insertion
    $ratename = $_POST['RateName'];
    $rateshop = $_POST['Rateshop'];
    $Comments = $_POST['comments'];
   
    // Check if 'Admin' is not null before inserting
    if ( $ratename  !== null) {
        // Prepare and bind for the second insertion
        $stmt = $conn->prepare("INSERT INTO costumerrate (CosName, Rate, Comments) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $ratename ,  $rateshop, $Comments);

        // Execute the second insertion statement
        if ($stmt->execute() === TRUE) {
            echo "Rate Sent Succesfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the second insertion statement
        $stmt->close();
    } else {
        echo "Error: 'Admin' cannot be null.";
    }
}








if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fullName'], $_POST['dateplace'], $_POST['homeAddress'], $_POST['phone'], $_POST['email'], $_POST['modpay'], $_POST['prodname'], $_POST['size'], $_POST['quantity'], $_POST['total'])){
    // Collect form data for the insertion
    $FullName = $_POST['fullName'];
    $Dateplace = $_POST['dateplace'];
    $HomeAddress = $_POST['homeAddress'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
    $Modpay = $_POST['modpay'];
    $Prodname = $_POST['prodname'];
    $Size = $_POST['size'];
    $Quantity = $_POST['quantity'];
    $Total = $_POST['total'];

    // Check if 'CostumerName' is not null before inserting
    if ($FullName !== null) {
        // Prepare and bind for the insertion
        $stmt = $conn->prepare("INSERT INTO ordertbl (CostumerName, DatePlaced, ShippingAddress, ContactNumber, EmailAddress, PaymentMethod, ItemsOrdered, Size, QTY, Amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Use "sssssssssd" as the bind_param string
        $stmt->bind_param("sssssssssd", $FullName, $Dateplace, $HomeAddress, $Phone, $Email, $Modpay, $Prodname, $Size, $Quantity, $Total);
        
        // Execute the insertion statement
        if ($stmt->execute() === TRUE) {
            echo "Ordered Successfully";
        } else {
            echo "Error executing statement: " . $stmt->error;

            // Log the error
            error_log("Error executing SQL statement: " . $stmt->error);
        }

        // Close the insertion statement
        $stmt->close();
    } else {
        echo "Error: 'CostumerName' cannot be null.";
    }
} 








if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['PlacefullName'], $_POST['Placedateplace'], $_POST['PlacehomeAddress'], $_POST['Placephone'], $_POST['Placeemail'], $_POST['Placemodpay'], $_POST['placeitemsordered'], $_POST['placesize'], $_POST['placeqty'], $_POST['placetotalamount'])){
    // Collect form data for the insertion
    $placeFullName = $_POST['PlacefullName'];
    $placeDateplace = $_POST['Placedateplace'];
    $placeHomeAddress = $_POST['PlacehomeAddress'];
    $placePhone = $_POST['Placephone'];
    $placeEmail = $_POST['Placeemail'];
    $placeModpay = $_POST['Placemodpay'];
    $placeProdname = $_POST['placeitemsordered'];
    $placeSize = $_POST['placesize'];
    $placeQuantity = $_POST['placeqty'];
    $placeTotal = $_POST['placetotalamount'];

    // Check if 'CostumerName' is not null before inserting
    if ($placeFullName !== null) {
        // Prepare and bind for the insertion
        $stmt = $conn->prepare("INSERT INTO ordertbl (CostumerName, DatePlaced, ShippingAddress, ContactNumber, EmailAddress, PaymentMethod, ItemsOrdered, Size, QTY, Amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Use "sssssssssd" as the bind_param string
        $stmt->bind_param("sssssssssd", $placeFullName, $placeDateplace, $placeHomeAddress, $placePhone, $placeEmail, $placeModpay, $placeProdname, $placeSize, $placeQuantity, $placeTotal);
        
        // Execute the insertion statement
        if ($stmt->execute() === TRUE) {
            echo "Ordered Successfully";
        } else {
            echo "Error executing statement: " . $stmt->error;

            // Log the error
            error_log("Error executing SQL statement: " . $stmt->error);
        }

        // Close the insertion statement
        $stmt->close();
    } else {
        echo "Error: 'CostumerName' cannot be null.";
    }
} 








// Close the database connection
$conn->close();
?>
   