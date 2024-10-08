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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "Delete News" button is clicked
    if (isset($_POST['MenuID'])) {
        $selectednews = $_POST['MenuID'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
        } else {
            // SQL to delete a record
            $sql = "DELETE FROM menu WHERE MenuID= '$selectednews'";

            if ($conn->query($sql) === TRUE) {
                echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "News Deleted Successfully",
                    }).then(function() {
                        window.location.href = "admindash.php";
                    });
                });
              </script>';
            } else {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "' . $conn->error . '",
                        });
                    });
                  </script>';
            }

            $conn->close();
        }
    }

    // Check if the "Delete Order" button is clicked
    if (isset($_POST['delorID'])) {
        $orderid = $_POST['delorID'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            echo json_encode(array('type' => 'error', 'message' => 'Connection failed. Please try again.'));
        } else {
            // SQL to delete a record
            $sql = "DELETE FROM ordertbl WHERE OrderID= '$orderid'";

            if ($conn->query($sql) === TRUE) {
                echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Order Deleted Successfully",
                    }).then(function() {
                        window.location.href = "admindash.php";
                    });
                });
              </script>';
            } else {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "' . $conn->error . '",
                        });
                    });
                  </script>';
            }

            $conn->close();
        }
    }

   
}
?>

