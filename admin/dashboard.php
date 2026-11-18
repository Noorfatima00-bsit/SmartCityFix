<?php
session_start();
session_destroy(); // Purana sab data khatam
header("Location: ../login.php"); // Wapis login par bhej do
exit();
?>
session_start();
require_once '../config/config.php';

// Check: Agar session set hi nahi hai, TAB hi login par bhejo
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Check: Agar user admin nahi hai, TAB usey rok do
if ($_SESSION['role'] !== 'admin') {
    echo "Access Denied: Only Admin can view this page.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | CitiFix Pro</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <?php include('../includes/header.php'); ?>

    <main class="dashboard-container">
        <h2 style="color: #00d4ff;">Admin Control Center</h2>
        <div class="status-box">System Status: <span style="color: #00ff88;">Online</span></div>

        <section class="admin-stats">
            <div class="card">Total Pending: <?php echo "12"; // Yahan database se count aayega ?></div>
        </section>
    </main>

    <?php include('../includes/footer.php'); ?>
</body>
</html>