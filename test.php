<?php
// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the user input from the form
$user_id = $_GET['user_id']; // Get user input from query parameter

// SQL query with a vulnerability (no sanitization)
$sql = "SELECT * FROM users WHERE id = '$user_id'";

// Execute the query
$result = $conn->query($sql);

// Check if the user exists and display user information
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "No results found.";
}

$conn->close();
?>
