<?php
// Har page par config automatic include ho jaye
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitiFix Pro - Smart Complaint Management System</title>
    <!-- Tailwind CSS for modern design -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Neon Glassmorphism Global Custom Styling -->
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }
        .neon-text-cyan {
            text-shadow: 0 0 10px rgba(6, 182, 212, 0.7), 0 0 20px rgba(6, 182, 212, 0.4);
        }
        .neon-border-cyan:focus {
            border-color: #06b6d4;
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.6);
            outline: none;
        }
        .neon-btn-cyan {
            background: transparent;
            border: 1px solid #06b6d4;
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.3);
            transition: all 0.3s ease;
        }
        .neon-btn-cyan:hover {
            background: #06b6d4;
            color: #000;
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.8);
        }
    </style>
</head>
<body>

<!-- Premium Glassmorphism Navbar -->
<nav class="glass-panel sticky top-0 z-50 px-6 py-4 flex justify-between items-center border-b border-white/10 m-4 rounded-2xl">
    <div class="flex items-center space-x-3">
        <div class="bg-cyan-500/20 p-2 rounded-xl border border-cyan-500/40">
            <i class="fa-solid fa-city text-cyan-400 text-xl animate-pulse"></i>
        </div>
        <span class="text-2xl font-bold tracking-wider text-white">CitiFix <span class="text-cyan-400 neon-text-cyan">Pro</span></span>
    </div>

    <!-- Navigation Links -->
    <ul class="hidden md:flex space-x-8 text-sm font-medium tracking-wide">
        <li><a href="<?php echo SITE_URL; ?>index.php" class="text-cyan-400 hover:text-white transition"><i class="fa-solid fa-house mr-1"></i> Home</a></li>
        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition"><i class="fa-solid fa-circle-info mr-1"></i> About City</a></li>
        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition"><i class="fa-solid fa-envelope mr-1"></i> Contact Helpline</a></li>
    </ul>

    <!-- Dynamic Auth Buttons (Login/Logout change hoga roles ke mutabiq) -->
    <div class="flex items-center space-x-4">
        <?php if(isset($_SESSION['user_id'])): ?>
            <!-- User Dashboard direct link agar logged in hai -->
            <a href="<?php echo SITE_URL; ?><?php echo $_SESSION['user_role']; ?>/dashboard.php" class="text-sm bg-white/10 px-4 py-2 rounded-lg hover:bg-white/20 transition">
                <i class="fa-solid fa-gauge mr-1"></i> Dashboard
            </a>
            <a href="<?php echo SITE_URL; ?>logout.php" class="text-sm bg-red-500/20 text-red-400 border border-red-500/30 px-4 py-2 rounded-lg hover:bg-red-500 hover:text-white transition">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        <?php else: ?>
            <!-- Agar log in nahi hai to default links -->
            <a href="<?php echo SITE_URL; ?>login.php" class="text-sm text-gray-300 hover:text-white transition">Sign In</a>
            <a href="<?php echo SITE_URL; ?>register.php" class="text-sm neon-btn-cyan text-cyan-400 px-5 py-2 rounded-xl font-semibold">
                <i class="fa-solid fa-user-plus mr-1"></i> Register
            </a>
        <?php endif; ?>
    </div>
</nav>

<main class="container mx-auto px-4 py-6">