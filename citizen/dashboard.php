<?php
// Configuration rules load kar rahe hain (Back step path use karte hue)
require_once '../config/config.php';

// Route Access Guard: Agar user logged in nahi hai ya citizen nahi hai, to baahar nikal dein
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'citizen') {
    header("Location: " . SITE_URL . "login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// --- METRICS DATA RETRIEVAL (Database Stats) ---
// 1. Total Complaints count
$q_total = "SELECT COUNT(id) as total FROM complaints WHERE user_id = '$user_id'";
$res_total = mysqli_query($conn, $q_total);
$stat_total = mysqli_fetch_assoc($res_total)['total'];

// 2. Pending Complaints count
$q_pending = "SELECT COUNT(id) as total FROM complaints WHERE user_id = '$user_id' AND status = 'pending'";
$res_pending = mysqli_query($conn, $q_pending);
$stat_pending = mysqli_fetch_assoc($res_pending)['total'];

// 3. Resolved Complaints count
$q_resolved = "SELECT COUNT(id) as total FROM complaints WHERE user_id = '$user_id' AND status = 'resolved'";
$res_resolved = mysqli_query($conn, $q_resolved);
$stat_resolved = mysqli_fetch_assoc($res_resolved)['total'];


// --- RECENT COMPLAINTS TABLE STREAM ---
$query_stream = "SELECT * FROM complaints WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 5";
$stream_result = mysqli_query($conn, $query_stream);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen Control Dashboard - CitiFix Pro</title>
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
        .neon-border-cyan:focus-within {
            border-color: #22d3ee;
            box-shadow: 0 0 15px rgba(34, 211, 238, 0.2);
        }
        .neon-text-cyan {
            text-shadow: 0 0 10px rgba(34, 211, 238, 0.5);
        }
    </style>
</head>
<body class="text-gray-200 min-h-screen flex flex-col relative overflow-x-hidden">

    <!-- Global Background Mesh Ambient Elements -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <!-- ================= DASHBOARD TOP HEADER NAVIGATION ================= -->
    <header class="border-b border-white/5 bg-black/40 sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/20">
                    <i class="fa-solid fa-city text-black font-bold text-lg"></i>
                </div>
                <span class="text-xl font-black uppercase tracking-wider text-white">CitiFix<span class="text-cyan-400">Pro</span></span>
            </div>
            
            <div class="flex items-center space-x-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Authenticated Operator</p>
                    <p class="text-sm font-bold text-white"><?php echo htmlspecialchars($user_name); ?></p>
                </div>
                <a href="<?php echo SITE_URL; ?>logout.php" class="bg-white/5 hover:bg-red-500/20 border border-white/10 hover:border-red-500/30 text-gray-300 hover:text-red-400 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition">
                    <i class="fa-solid fa-power-off mr-2"></i>Terminate Session
                </a>
            </div>
        </div>
    </header>

    <!-- ================= MAIN CORE CONTENT FRAMEWORK ================= -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-6 py-10 space-y-10 relative z-10">
        
        <!-- Welcome Title Hub -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 bg-gradient-to-r from-white/5 to-transparent p-6 rounded-3xl border border-white/5">
            <div>
                <h1 class="text-2xl md:text-3xl font-black text-white tracking-wide uppercase">Welcome Back, <span class="text-cyan-400 neon-text-cyan"><?php echo htmlspecialchars($user_name); ?></span></h1>
                <p class="text-sm text-gray-400 mt-1">Manage your registered civic optimization requests and system telemetry indicators.</p>
            </div>
            <div>
                <a href="file-complaint.php" class="inline-flex items-center space-x-2 bg-cyan-500 hover:bg-cyan-400 text-black font-black px-6 py-3.5 rounded-xl text-xs uppercase tracking-wider transition shadow-lg shadow-cyan-500/20">
                    <i class="fa-solid fa-circle-plus text-sm"></i>
                    <span>File New Complaint Vector</span>
                </a>
            </div>
        </div>

        <!-- ================= METRICS DATA COUNTERS GRID ================= -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <!-- Total Vector -->
            <div class="glass-panel p-6 rounded-2xl border border-white/10 flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Total Pipelines</p>
                    <p class="text-3xl font-black text-white tracking-tight"><?php echo $stat_total; ?></p>
                </div>
                <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center text-gray-400 text-xl">
                    <i class="fa-solid fa-folder-open"></i>
                </div>
            </div>

            <!-- Pending Vector -->
            <div class="glass-panel p-6 rounded-2xl border border-white/10 flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Active Verification</p>
                    <p class="text-3xl font-black text-amber-400 tracking-tight"><?php echo $stat_pending; ?></p>
                </div>
                <div class="w-12 h-12 bg-amber-500/10 border border-amber-500/20 rounded-xl flex items-center justify-center text-amber-400 text-xl">
                    <i class="fa-solid fa-hourglass-half"></i>
                </div>
            </div>

            <!-- Resolved Vector -->
            <div class="glass-panel p-6 rounded-2xl border border-white/10 flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Optimized Solved</p>
                    <p class="text-3xl font-black text-emerald-400 tracking-tight"><?php echo $stat_resolved; ?></p>
                </div>
                <div class="w-12 h-12 bg-emerald-500/10 border border-emerald-500/20 rounded-xl flex items-center justify-center text-emerald-400 text-xl">
                    <i class="fa-solid fa-shield-check"></i>
                </div>
            </div>
        </div>

        <!-- ================= COMPLAINTS DATA STREAM STREAMLINE ================= -->
        <div class="glass-panel rounded-3xl border border-white/10 overflow-hidden">
            <div class="px-6 py-5 border-b border-white/5 bg-black/20 flex justify-between items-center">
                <h3 class="text-sm font-black uppercase tracking-widest text-white"><i class="fa-solid fa-list-timeline mr-2 text-cyan-400"></i>Recent Activity Telemetry</h3>
                <span class="text-[10px] bg-cyan-500/10 text-cyan-400 font-bold px-2.5 py-1 rounded-full uppercase border border-cyan-500/20 tracking-wider">Real-time Stream</span>
            </div>

            <div class="overflow-x-auto">
                <?php if (mysqli_num_rows($stream_result) > 0): ?>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-white/5 bg-white/[0.01] text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                                <th class="px-6 py-4">ID Vector</th>
                                <th class="px-6 py-4">Core Subject Title</th>
                                <th class="px-6 py-4">Department Category</th>
                                <th class="px-6 py-4">Timeline Timestamp</th>
                                <th class="px-6 py-4 text-right">Verification Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-sm">
                            <?php while($row = mysqli_fetch_assoc($stream_result)): ?>
                                <tr class="hover:bg-white/[0.02] transition">
                                    <td class="px-6 py-4 font-mono text-xs text-cyan-400">#CFP-<?php echo $row['id']; ?></td>
                                    <td class="px-6 py-4 font-semibold text-white"><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td class="px-6 py-4 text-gray-400 text-xs uppercase tracking-wider"><?php echo htmlspecialchars($row['category']); ?></td>
                                    <td class="px-6 py-4 text-gray-400 text-xs"><?php echo date('M d, Y - h:i A', strtotime($row['created_at'])); ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <?php if ($row['status'] == 'pending'): ?>
                                            <span class="inline-block px-3 py-1 text-[10px] font-black uppercase tracking-wider bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-full">Pending</span>
                                        <?php else: ?>
                                            <span class="inline-block px-3 py-1 text-[10px] font-black uppercase tracking-wider bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-full">Resolved</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="p-12 text-center space-y-3">
                        <div class="text-gray-600 text-4xl">
                            <i class="fa-solid fa-folder-minus"></i>
                        </div>
                        <p class="text-sm text-gray-400">No telemetry log streams found in your account footprint.</p>
                        <p class="text-xs text-gray-500">Initiate a new complaint ticket to stream status responses here.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Global Layout System Footer -->
    <footer class="border-t border-white/5 py-6 text-center text-xs text-gray-500 mt-auto">
        <p>&copy; <?php echo date('Y'); ?> CitiFix Pro Platform. All security identity rights operational.</p>
    </footer>

</body>
</html>