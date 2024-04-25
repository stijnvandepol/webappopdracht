<?php
$hostname = "stijndbserver.mysql.azure.com";
$username = "dbadmin";
$password = "aln8WF47bapt91Zb2D3XY7AQSM";
$database = "chatbase";
$ca_cert_path = "DigiCertGlobalRootG2.crt.pem"; // Vervang dit door het juiste pad naar het CA-certificaat

$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, $ca_cert_path, NULL, NULL);
if (!mysqli_real_connect($con, $hostname, $username, $password, $database, 3306, MYSQLI_CLIENT_SSL)) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}
?>
?>