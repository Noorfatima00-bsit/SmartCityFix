<?php
// Top Navbar aur Configuration ko call kar rahe hain
require_once 'includes/header.php';

// Agar user pehle se logged in hai, to usko dashboard par bhej dein
if (isset($_SESSION['user_id'])) {
    header("Location: " . SITE_URL . $_SESSION['user_role'] . "/dashboard.php");
    exit();
}

$error_msg = "";
$success_msg = "";

// Jab user register ka button dabaaye (Form Submit ho)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = mysqli_real_escape_string($conn, trim($_POST['full_name']));
    $email     = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone     = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $password  = trim($_POST['password']);
    
    // Server-side validation check
    if (empty($full_name) || empty($email) || empty($phone) || empty($password)) {
        $error_msg = "Meharbani karke saari fields ko lazmi pur karein!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Aap ki enter ki gayi Email ka format sahi nahi hai!";
    } elseif (strlen($password) < 6) {
        $error_msg = "Password kam az kam 6 characters ka hona chahiye!";
    } else {
        // Check karein ke email pehle se register to nahi hai
        $check_email = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $check_email);
        
        if (mysqli_num_rows($result) > 0) {
            $error_msg = "Yeh Email pehle se register hai! Kisi doosri email se try karein.";
        } else {
            // Secure Password Hashing (Real-world industrial security standard)
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            
            // Database mein data save karne ki query
            $insert_query = "INSERT INTO users (full_name, email, password, phone, role) 
                             VALUES ('$full_name', '$email', '$hashed_password', '$phone', 'citizen')";
            
            if (mysqli_query($conn, $insert_query)) {
                $success_msg = "Aap ka account kamyabi se ban gaya hai! Ab aap Sign In kar sakte hain.";
            } else {
                $error_msg = "Account banane mein koi error aaya: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!-- ================= REGISTRATION PORTAL UI ================= -->
<div class="max-w-xl mx-auto my-12 relative z-10">
    <!-- Background Glow Effects behind form -->
    <div class="absolute -top-12 -right-12 w-48 h-48 bg-purple-500/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-cyan-500/10 rounded-full blur-2xl pointer-events-none"></div>

    <div class="glass-panel p-8 rounded-3xl border border-white/10 bg-black/20">
        <div class="text-center space-y-2 mb-8">
            <h2 class="text-3xl font-black tracking-wide text-white uppercase">Citizen <span class="text-cyan-400 neon-text-cyan">Portal</span></h2>
            <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Create your secure digital credentials identity</p>
        </div>

        <!-- System Alerts Message Notification Panel -->
        <?php if (!empty($error_msg)): ?>
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-xs p-4 rounded-xl mb-6 flex items-center space-x-3">
                <i class="fa-solid fa-triangle-exclamation text-base"></i>
                <span><?php echo $error_msg; ?></span>
            </div>
        <?php endif; ?>

        <?php if (!empty($success_msg)): ?>
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs p-4 rounded-xl mb-6 flex items-center space-x-3">
                <i class="fa-solid fa-circle-check text-base"></i>
                <span><?php echo $success_msg; ?> <a href="login.php" class="underline font-bold text-white ml-1">Sign In here</a></span>
            </div>
        <?php endif; ?>

        <!-- Registration Real HTML Form -->
        <form action="register.php" method="POST" class="space-y-5">
            
            <!-- Full Name Field -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-user mr-2 text-cyan-400"></i>Full Identity Name</label>
                <input type="text" name="full_name" placeholder="e.g., Noor Fatima" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-600 transition">
            </div>

            <!-- Email Address Field -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-envelope mr-2 text-cyan-400"></i>Secure Email Address</label>
                <input type="email" name="email" placeholder="e.g., mail@domain.com" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-600 transition">
            </div>

            <!-- Phone Number Field -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-phone mr-2 text-cyan-400"></i>Mobile Contact Vector</label>
                <input type="text" name="phone" placeholder="e.g., 03XXXXXXXXX" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-600 transition">
            </div>

            <!-- Password Field -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider block"><i class="fa-solid fa-lock mr-2 text-cyan-400"></i>Access Security Code</label>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-600 transition">
            </div>

            <!-- Submit Registration button -->
            <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-400 text-black font-black py-4 rounded-xl text-sm uppercase tracking-wider transition cursor-pointer flex items-center justify-center space-x-2 shadow-lg shadow-cyan-500/20 mt-8">
                <i class="fa-solid fa-user-plus"></i>
                <span>Initialize Registration Pipeline</span>
            </button>
        </form>

        <!-- Redirect to Login page link -->
        <div class="border-t border-white/5 mt-6 pt-6 text-center">
            <p class="text-xs text-gray-400">Already possess a digital identity dashboard profile? <a href="login.php" class="text-cyan-400 hover:underline font-bold">Sign In Portal</a></p>
        </div>
    </div>
</div>

<?php
// Footer inclusion layout
require_once 'includes/footer.php';
?>