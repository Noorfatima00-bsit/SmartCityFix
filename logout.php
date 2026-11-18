<?php
// Configuration rules load karke session start karte hain
require_once 'config/config.php';

// Saare session variables ko khattari (clear) kar rahe hain
$_SESSION = array();

// Session structure ko permanently destroy kar rahe hain
if (session_id() != "" || isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 2592000, '/');
}
session_destroy();

// Redirect user back to home base index module
header("Location: " . SITE_URL . "index.php");
exit();
?>