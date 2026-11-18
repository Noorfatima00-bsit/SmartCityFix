<?php
// Secure session start agar pehle se start na ho
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database Configuration Constants
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // XAMPP ka default password khali hota hai
define('DB_NAME', 'citifix_db');

// Database se connect karne ki koshish
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Connection check agar fail ho jaye
if (!$conn) {
    die("ERROR: Database se connection nahi ho saka. " . mysqli_connect_error());
}

// Global Encryption/Security Path Set Up (Future use ke liye)
define('SITE_URL', 'http://localhost/citifix-pro/');
?>