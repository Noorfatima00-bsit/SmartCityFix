<?php
// Header aur Configuration rules ko access kar rahe hain
require_once 'includes/header.php';

// Agar user pehle se authenticated (logged in) hai, to usko uske dashboard par redirect karein
if (isset($_SESSION['user_id'])) {
    header("Location: " . SITE_URL . $_SESSION['user_role'] . "/dashboard.php");
    exit();
}

$error_msg = "";

// Jab user login ka form submit kare
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = trim($_POST['password']);
    
    if (empty($email) || empty($password)) {
        $error_msg = "Meharbani karke email aur password dono enter karein!";
    } else {
        // Database mein email check karne ki query
        $login_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $run_query   = mysqli_query($conn, $login_query);
        
        if (mysqli_num_rows($run_query) > 0) {
            $user_data = mysqli_fetch_assoc($run_query);
            
            // Password hash ko verify kar rahe hain
            if (password_verify($password, $user_data['password'])) {
                
                // Session parameters initialize kar rahe hain
                $_SESSION['user_id']   = $user_data['id'];
                $_SESSION['user_name'] = $user_data['full_name'];
                $_SESSION['user_email']= $user_data['email'];
                $_SESSION['user_role'] = $user_data['role']; // admin ya citizen
                
                // Role-based routing system execution
                if ($user_data['role'] == 'admin') {
                    header("Location: " . SITE_URL . "admin/dashboard.php");
                } else {
                    header("Location: " . SITE_URL . "citizen/dashboard.php");
                }
                exit();
                
            } else {
                $error_msg = "Aap ka enter kiya gaya password ghalat hai!";
            }
        } else {
            $error_msg = "Yeh email address system mein register nahi hai!";
        }
    }
}
?>

<!-- ================= AUTHENTICATION PORTAL UI ================= -->
<div class="max-w-md mx-auto my-16 relative z-10">
    <!-- Neon Background Orbs -->
    <div class="absolute -top-10 -left-10 w-40 h-40 bg-cyan-500/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-purple-500/10 rounded-full blur-2xl pointer-events-none"></div>

    <div class="glass-panel p-8 rounded-3xl border border-white/10 bg-black/30 backdrop-blur-xl">
        <div class="text-center space-y-2 mb-8">
            <h2 class="text-3xl font-black tracking-wide text-white uppercase">Secure <span class="text-cyan-400 neon-text-cyan">Login</span></h2>
            <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Access your secure identity control board</p>
        </div>

        <!-- Error Notification Banner -->
        <?php if (!empty($error_msg)): ?>
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-xs p-4 rounded-xl mb-6 flex items-center space-x-3">
                <i class="fa-solid fa-triangle-exclamation text-base"></i>
                <span><?php echo $error_msg; ?></span>
            </div>
        <?php endif; ?>

        <!-- Identity Authentication Form -->
        <form action="login.php" method="POST" class="space-y-5">
            
            <!-- Email Vector Input -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-envelope mr-2 text-cyan-400"></i>Registered Email</label>
                <input type="email" name="email" placeholder="mail@domain.com" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-600 transition">
            </div>

            <!-- Access Security Key Input -->
            <div class="space-y-1.5">
                <div class="flex justify-between items-center">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-lock mr-2 text-cyan-400"></i>Security Key</label>
                </div>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-600 transition">
            </div>

            <!-- Login Execution Action Button -->
            <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-400 text-black font-black py-4 rounded-xl text-sm uppercase tracking-wider transition cursor-pointer flex items-center justify-center space-x-2 shadow-lg shadow-cyan-500/20 mt-8">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Authenticate Credentials</span>
            </button>
        </form>

        <!-- Dynamic Redirection to Registration Module -->
        <div class="border-t border-white/5 mt-6 pt-6 text-center">
            <p class="text-xs text-gray-400">Do not possess an authorized profile vector yet? <a href="register.php" class="text-cyan-400 hover:underline font-bold">Register Identity</a></p>
        </div>
    </div>
</div>

<?php
// Footer inclusion layout
require_once 'includes/footer.php';
?>