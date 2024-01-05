<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wVv0y5xLZu6dzZLAMcSfGSE1xFkZDO9Q6M/QmbUihd2eR5Zbty2U2ls4lDds1xs8KzPQfZ85teW3cvPmmAmFYg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
</body>
</html>

 

<?php
require_once('conenction.php');

if (isset($_GET['Cosreceipt'])) {
    $searchText = $_GET['Cosreceipt'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
    $sql = "SELECT TypeofComplaint, DateofReport, ComplainantName, 	ContactNumber, Address, ProfofIdentity, NameofComplainee,IncidentDescription FROM complainttbl WHERE ComplaintID LIKE '%$searchText%'";
    $result = $conn->query($sql);




    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div style="display: flex; flex-wrap: wrap;">';

// Input Fields
echo '<div style="flex: 1; margin-right: 20px;">';
echo '<p><input type="text" value="Type of Complain: ' . $row["TypeofComplaint"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; margin-top: 20px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Date of Report: ' . $row["DateofReport"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Complainant Name: ' . $row["ComplainantName"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Contact Number: ' . $row["ContactNumber"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Home Address: ' . $row["Address"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text" value="Name of Complainee: ' . $row["NameofComplainee"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';
echo '<p><input type="text-area" value="Incident Description: ' . $row["IncidentDescription"] . '" readonly style="border: 1px solid #ccc; padding: 5px; margin-bottom: 10px; border-radius: 5px; width: 300px;"></p>';





echo '</div>';
echo '<div>';
echo '<img src="uploads/' . $row['ProfofIdentity'] . '" style="border: 1px solid #ccc; border-radius: 5px; margin-top: 1rem; margin-right: 3rem; width: 350px; height: 300px;">';
echo '</div>';
echo '</div>';
      }
    } else {
        echo "<p>No results found</p>";
    }
    $conn->close();
}
?>