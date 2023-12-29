
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- Your other HTML code -->

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
    
</body>
</html>


<?php
require_once('connection.php');

// Your existing database connection code
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "beantocup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted for updating customers, admins, or news
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Update operation for customers
    if (isset($_POST['SelectCostumer'])) {
        updateCostumer($conn);
    }

    // Update operation for admins
    if (isset($_POST['input1'])) {
        updateAdmin($conn);
    }

    // Update operation for news
    if (isset($_POST['NewsID'])) {
        updateNews($conn);
    }
    if (isset($_POST['MenuID'])) {
        updateMenu($conn);
    }
    if (isset($_POST['uporderID'])) {
        updateorders($conn);
    }
    if (isset($_POST['cosuporderID'])) {
        updatecosorders($conn);
    }


}

// Close the database connection
$conn->close();

function updateCostumer($conn) {
    $SelectedCostumer = $_POST['SelectCostumer'];
    $CostumerEmail = $_POST['CostumerEmail'];
    $CostumerPhone = $_POST['CostumerPhone'];
    $CostumerAddress = $_POST['CostumerAddress'];

    if (!empty($SelectedCostumer)) {
        $stmt = $conn->prepare("UPDATE costumers SET Email=?, Phone=?, HomeAddress=? WHERE Name=?");
        $stmt->bind_param("ssss", $CostumerEmail, $CostumerPhone, $CostumerAddress, $SelectedCostumer);

        if ($stmt->execute()) {
            echo "Costumer record updated successfully";
        } else {
            echo "Error updating costumer record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a costumer to update";
    }
}

function updateAdmin($conn) {
    $updated_admin = $_POST['input1'];
    $updated_username = $_POST['input2'];
    $updated_date = $_POST['datePicker'];
    $updated_password = $_POST['input3'];

    if (!empty($updated_admin)) {
        $sql = "UPDATE admintbl SET Username='$updated_username', Password='$updated_password', DateCreated='$updated_date' WHERE Admin='$updated_admin'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Admin Updated Successfully",
                    }).then(function() {
                        window.location.href = "admindash.php";
                    });
                });
            </script>';
        } else {
            echo "<script>";
            echo "swal('Error', 'Error updating record: " . $conn->error . "', 'error');";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "swal('Error', 'Please select an admin to update', 'error');";
        echo "</script>";
    }
}

function updateNews($conn) {
    $newsid = $_POST['NewsID'];
    $headerofreport = $_POST['HeaderofNews'];
    $dateofreport = $_POST['DateofNews'];
    $bodytext = $_POST['Bodytext'];

    if (!empty($newsid)) {
        $stmt = $conn->prepare("UPDATE shopnews SET Header=?, Date=?, Body=? WHERE NewsID=?");
        $stmt->bind_param("ssss", $headerofreport, $dateofreport, $bodytext, $newsid);

        if ($stmt->execute()) {
            echo "News record updated successfully";
        } else {
            echo "Error updating news record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a news item to update";
    }
}

function updateMenu($conn) {
    $newsid = $_POST['MenuID'];
    $headerofreport = $_POST['MenuName'];
    $dateofreport = $_POST['MenuPrice'];
    $bodytext = $_POST['BodyMenu'];

    if (!empty($newsid)) {
        $stmt = $conn->prepare("UPDATE menu SET Name=?, Price=?, Body=? WHERE MenuID=?");
        $stmt->bind_param("ssss", $headerofreport, $dateofreport, $bodytext, $newsid);

        if ($stmt->execute()) {
            echo "News record updated successfully";
        } else {
            echo "Error updating news record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a news item to update";
    }
}


function  updateorders($conn) {
    $UporderID = $_POST['uporderID'];
    $upAddorcostumerName = $_POST['upaddorcostumerName'];
    $upAddorDateOrdered = $_POST['upaddorDateOrdered'];
    $upAddorShippingAddress = $_POST['upaddorShippingAddress'];
    $upAddorContactNumber = $_POST['upaddorContactNumber'];
    $upAddorEmailAddress = $_POST['upaddorEmailAddress'];
    $upAddorPAymentmethod = $_POST['upaddorPAymentmethod'];
    $upAddorItemsOrdered = $_POST['upaddorItemsOrdered'];
    $upAddorSize = $_POST['upaddorSize'];
    $upAddorQuantity = $_POST['upaddorQuantity'];
    $upAddoramount = $_POST['upaddoramount'];


    if (!empty($UporderID)) {
        $stmt = $conn->prepare("UPDATE ordertbl SET CostumerName=?, DatePlaced=?, ShippingAddress=? , ContactNumber=?,EmailAddress=? , PaymentMethod=?, ItemsOrdered=?, Size=? ,QTY=?,Amount=? WHERE OrderID=?");
        $stmt->bind_param("ssssssssssd", $upAddorcostumerName, $upAddorDateOrdered, $upAddorShippingAddress, $upAddorContactNumber, $upAddorEmailAddress , $upAddorPAymentmethod, $upAddorItemsOrdered, $upAddorSize,  $upAddorQuantity, $upAddoramount ,$UporderID);

        if ($stmt->execute()) {
            echo "Order updated successfully";
        } else {
            echo "Error updating news record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a news item to update";
    }
}




function   updatecosorders($conn) {
    $CosUporderID = $_POST['cosuporderID'];
    $CosupAddorcostumerName = $_POST['cosupaddorcostumerName'];
    $CosupAddorDateOrdered = $_POST['cosupaddorDateOrdered'];
    $CosupAddorShippingAddress = $_POST['cosupaddorShippingAddress'];
    $CosupAddorContactNumber = $_POST['cosupaddorContactNumber'];
    $CosupAddorEmailAddress = $_POST['cosupaddorEmailAddress'];
    $CosupAddorPAymentmethod = $_POST['cosupaddorPAymentmethod'];
   


    if (!empty($UporderID)) {
        $stmt = $conn->prepare("UPDATE ordertbl SET CostumerName=?, DatePlaced=?, ShippingAddress=? , ContactNumber=?,EmailAddress=? , PaymentMethod=?, ItemsOrdered=?, Size=? ,QTY=?,Amount=? WHERE OrderID=?");
        $stmt->bind_param("ssssss", $CosupAddorcostumerName, $CosupAddorDateOrdered, $CosupAddorShippingAddress, $CosupAddorContactNumber, $CosupAddorEmailAddress , $CosupAddorPAymentmethod ,$CosUporderID);

        if ($stmt->execute()) {
            echo "Order updated successfully";
        } else {
            echo "Error updating news record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please select a news item to update";
    }
}

















?>
