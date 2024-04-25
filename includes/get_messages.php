<?php
include 'dbconnection.php';

// Controleer op fouten bij het maken van verbinding
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Query om de laatste 10 berichten op te halen
$result = mysqli_query($con, "SELECT * FROM chatbase ORDER BY timestamp DESC LIMIT 100");

// Array om de berichten op te slaan
$messages = array();
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

// Stuur de berichten terug als JSON
echo json_encode($messages);
?>