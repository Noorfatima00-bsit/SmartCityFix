<?php
// Configuration rules load kar rahe hain (Back step path variable reference)
require_once '../config/config.php';

// Route Access Guard: Agar user citizen nahi hai to access block kar dein
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'citizen') {
    header("Location: " . SITE_URL . "login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$error_msg = "";
$success_msg = "";

// Jab user complaint form submit kare
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title       = mysqli_real_escape_string($conn, trim($_POST['title']));
    $category    = mysqli_real_escape_string($conn, trim($_POST['category']));
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));
    
    // Server-side core validation entry rules
    if (empty($title) || empty($category) || empty($description)) {
        $error_msg = "Meharbani karke form ki saari fields ko lazmi pur karein!";
    } else {
        // Query to insert complaint into database tracking system
        // Default status is explicitly set to 'pending'
        $insert_complaint = "INSERT INTO complaints (user_id, title, category, description, status) 
                             VALUES ('$user_id', '$title', '$category', '$description', 'pending')";
        
        if (mysqli_query($conn, $insert_complaint)) {
            $success_msg = "Aap ki shikayat system mein kamyabi se register ho chuki hai!";
        } else {
            $error_msg = "Shikayat submit karne mein koi takneeki error aaya: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Complaint Vector - CitiFix Pro</title>
    <!-- Tailwind CSS Engine CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- FontAwesome Vector Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #050508;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        .neon-border-cyan:focus {
            border-color: #22d3ee;
            box-shadow: 0 0 15px rgba(34, 211, 238, 0.2);
        }
        .neon-text-cyan {
            text-shadow: 0 0 10px rgba(34, 211, 238, 0.5);
        }
    </style>
</head>
<body class="text-gray-200 min-h-screen flex flex-col relative overflow-x-hidden">

    <!-- Ambient Grid Orbs -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-10 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <!-- ================= TOP HEADER NAVIGATION ================= -->
    <header class="border-b border-white/5 bg-black/40 sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/20">
                    <i class="fa-solid fa-city text-black font-bold text-lg"></i>
                </div>
                <span class="text-xl font-black uppercase tracking-wider text-white">CitiFix<span class="text-cyan-400">Pro</span></span>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="dashboard.php" class="bg-white/5 hover:bg-white/10 border border-white/10 text-gray-300 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i>Back to Control Center
                </a>
            </div>
        </div>
    </header>

    <!-- ================= MAIN REGISTRATION INTEGRATION LAYER ================= -->
    <main class="flex-grow max-w-3xl w-full mx-auto px-6 py-12 relative z-10">
        
        <div class="glass-panel p-8 rounded-3xl border border-white/10 bg-black/20">
            <div class="space-y-2 mb-8 text-center">
                <h2 class="text-2xl font-black tracking-wide text-white uppercase">Initialize <span class="text-cyan-400 neon-text-cyan">Complaint Ticket</span></h2>
                <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Report real-time issues directly to authorized civic controllers</p>
            </div>

            <!-- Server Status Response Flags -->
            <?php if (!empty($error_msg)): ?>
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-xs p-4 rounded-xl mb-6 flex items-center space-x-3">
                    <i class="fa-solid fa-triangle-exclamation text-base"></i>
                    <span><?php echo $error_msg; ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($success_msg)): ?>
                <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs p-4 rounded-xl mb-6 flex items-center space-x-3">
                    <i class="fa-solid fa-circle-check text-base"></i>
                    <span><?php echo $success_msg; ?> <a href="dashboard.php" class="underline font-bold text-white ml-1">View tracking stream</a></span>
                </div>
            <?php endif; ?>

            <!-- Real-time Database Pipeline Form Execution -->
            <form action="file-complaint.php" method="POST" class="space-y-6">
                
                <!-- Complaint Title Vector -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-heading mr-2 text-cyan-400"></i>Core Subject Title</label>
                    <input type="text" name="title" placeholder="e.g., Main Street Transformer Malfunction" required
                           class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-600 transition">
                </div>

                <!-- Complaint Category Infrastructure Dropdown -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-layer-group mr-2 text-cyan-400"></i>Department Vector Category</label>
                    <div class="relative">
                        <select name="category" required
                                class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan appearance-none transition cursor-pointer">
                            <option value="" disabled selected class="bg-[#050508]">Select Authorized Stream Category</option>
                            <option value="Electricity" class="bg-[#050508]">Electricity Grid Power Failure</option>
                            <option value="Water Supply" class="bg-[#050508]">Water Management Pipeline Leakage</option>
                            <option value="Sewerage" class="bg-[#050508]">Sewerage Overflow Infrastructure</option>
                            <option value="Road Damage" class="bg-[#050508]">Civic Road Damage Potholes</option>
                            <option value="Street Lights" class="bg-[#050508]">Public Grid Street Lights Outage</option>
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500 text-xs">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <!-- Complaint Comprehensive Details Textarea -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-align-left mr-2 text-cyan-400"></i>Comprehensive Issue Log Parameters</label>
                    <textarea name="description" rows="5" placeholder="Detail the structural fault parameters, precise proximity tags, and impact depth metrics here..." required
                              class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-600 transition resize-none"></textarea>
                </div>

                <!-- Submission Pipeline Trigger Button -->
                <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-400 text-black font-black py-4 rounded-xl text-sm uppercase tracking-wider transition cursor-pointer flex items-center justify-center space-x-2 shadow-lg shadow-cyan-500/20 mt-8">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Inject Complaint Into Pipeline</span>
                </button>
            </form>
        </div>
    </main>

    <!-- Global Layout Footer -->
    <footer class="border-t border-white/5 py-6 text-center text-xs text-gray-500 mt-auto">
        <p>&copy; <?php echo date('Y'); ?> CitiFix Pro Platform. All operations security authorized.</p>
    </footer>

</body>
</html>