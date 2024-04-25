<?php
include 'dbconnection.php';

// Controleer op fouten bij het maken van verbinding
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Ontvang het bericht en de gebruikersnaam van de frontend
$data = json_decode(file_get_contents("php://input"));

// Controleer of het bericht en de gebruikersnaam zijn ontvangen
if (!empty($data->message) && !empty($data->username)) {
    // Voeg het bericht en de gebruikersnaam toe aan de database
    $message = mysqli_real_escape_string($con, $data->message);
    $username = mysqli_real_escape_string($con, $data->username);
    mysqli_query($con, "INSERT INTO chatbase (username, message) VALUES ('$username', '$message')");

    // Geef een succesbericht terug
    echo json_encode(array("message" => "Message sent successfully."));
} else {
    // Geef een foutbericht terug als er geen bericht of gebruikersnaam is ontvangen
    echo json_encode(array("error" => "No message or username received."));
}
?>