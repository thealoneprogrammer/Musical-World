<?php
// SSL connection setup
$con = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

// Secure connection to Azure MySQL
$server = "music.mysql.database.azure.com";
$username = "music";
$password = getenv('MYSQL_PASSWORD'); // Store sensitive data securely in environment variables
$database = getenv('MYSQL_DATABASE'); // Retrieve database name from environment variable
$port = 3306;

// Initialize connection
mysqli_real_connect($con, $server, $username, $password, $database, $port, MYSQLI_CLIENT_SSL);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Secure connection established!";
}
?>

 
