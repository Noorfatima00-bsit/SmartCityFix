<?php
// Top Navigation Bar aur Configuration ko include kar rahe hain
require_once 'includes/header.php';
?>

<!-- ================= 1. HERO SECTION ================= -->
<div class="relative rounded-3xl overflow-hidden glass-panel border border-white/10 p-8 md:p-16 my-6 flex flex-col md:flex-row items-center justify-between">
    <!-- Neon Background Glow Effect -->
    <div class="absolute -top-24 -left-24 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-2xl space-y-6 relative z-10">
        <span class="bg-cyan-500/10 border border-cyan-400/30 text-cyan-400 text-xs px-3 py-1.5 rounded-full font-semibold uppercase tracking-wider inline-flex items-center">
            <i class="fa-solid fa-bullhorn mr-1.5 animate-bounce"></i> Empowering Citizens, Transforming Cities
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight leading-none text-white">
            Report Grievances. <br>
            Track <span class="text-cyan-400 neon-text-cyan">Real-Time</span> Fixes.
        </h1>
        <p class="text-gray-300 text-base md:text-lg leading-relaxed">
            CitiFix Pro is your direct line to municipal departments. File infrastructure issues, track resolutions transparently, and shape your neighborhood's transformation.
        </p>
        
        <div class="pt-4 flex flex-col sm:flex-row items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="register.php" class="neon-btn-cyan text-cyan-400 px-8 py-3.5 rounded-xl font-bold text-center flex items-center justify-center space-x-2">
                <i class="fa-solid fa-pen-to-square"></i>
                <span>File A Complaint</span>
            </a>
            <a href="#features" class="bg-white/5 border border-white/10 hover:bg-white/10 text-white px-8 py-3.5 rounded-xl font-semibold text-center transition">
                Explore Features
            </a>
        </div>
    </div>

    <!-- Visual Dashboard Preview Metric -->
    <div class="mt-8 md:mt-0 relative z-10 w-full md:w-80 glass-panel p-6 rounded-2xl border border-white/10 bg-black/30 flex flex-col justify-between">
        <div class="flex items-center justify-between border-b border-white/5 pb-3">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Live System Feed</span>
            <span class="flex items-center text-[10px] bg-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-full border border-emerald-500/30">
                <i class="fa-solid fa-circle text-[6px] mr-1 animate-ping"></i> LIVE
            </span>
        </div>
        <div class="space-y-4 mt-4">
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-300"><i class="fa-solid fa-circle-check text-emerald-400 mr-2"></i> Resolved Today</span>
                <span class="font-bold text-white">142</span>
            </div>
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-300"><i class="fa-solid fa-spinner text-yellow-400 mr-2 animate-spin"></i> Processing</span>
                <span class="font-bold text-white">67</span>
            </div>
            <div class="w-full bg-white/5 rounded-full h-1.5 mt-2">
                <div class="bg-cyan-400 h-1.5 rounded-full" style="width: 72%"></div>
            </div>
        </div>
    </div>
</div>

<!-- ================= 2. SYSTEM LIVE STATS SECTIONS ================= -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-8">
    <div class="glass-panel p-6 rounded-2xl border border-white/10 text-center">
        <i class="fa-solid fa-users text-cyan-400 text-2xl mb-2"></i>
        <h3 class="text-2xl font-black text-white">12,450+</h3>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Registered Citizens</p>
    </div>
    <div class="glass-panel p-6 rounded-2xl border border-white/10 text-center">
        <i class="fa-solid fa-file-invoice text-yellow-400 text-2xl mb-2"></i>
        <h3 class="text-2xl font-black text-white">4,892</h3>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Total Complaints</p>
    </div>
    <div class="glass-panel p-6 rounded-2xl border border-white/10 text-center">
        <i class="fa-solid fa-screwdriver-wrench text-emerald-400 text-2xl mb-2"></i>
        <h3 class="text-2xl font-black text-white">4,120</h3>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Issues Resolved</p>
    </div>
    <div class="glass-panel p-6 rounded-2xl border border-white/10 text-center">
        <i class="fa-solid fa-bolt-lightning text-purple-400 text-2xl mb-2"></i>
        <h3 class="text-2xl font-black text-white">&lt; 48 Hrs</h3>
        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Avg Fix Window</p>
    </div>
</div>

<!-- ================= 3. TRACK COMPLAINT SEARCH BAR ================= -->
<div class="glass-panel p-6 rounded-2xl border border-white/10 my-8 bg-gradient-to-r from-cyan-950/20 to-transparent">
    <div class="max-w-3xl mx-auto text-center space-y-4">
        <h2 class="text-xl font-bold text-white">Quick Ticket Lookup</h2>
        <p class="text-xs text-gray-400">Enter your tracking reference ID to view real-time pipeline progress without logging in.</p>
        <form action="citizen/track-complaints.php" method="GET" class="flex flex-col sm:flex-row gap-2 mt-2">
            <input type="text" name="ticket_id" placeholder="e.g., CFP-89241" required 
                   class="flex-1 bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none neon-border-cyan placeholder-gray-500">
            <button type="submit" class="bg-cyan-500 hover:bg-cyan-400 text-black font-bold px-6 py-3 rounded-xl text-sm transition shrink-0 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span>Track Instantly</span>
            </button>
        </form>
    </div>
</div>

<!-- ================= 4. COMPLAINT CATEGORIES CORE GRID ================= -->
<div class="my-12" id="categories">
    <div class="text-center space-y-2 mb-8">
        <h2 class="text-2xl md:text-3xl font-black tracking-wide text-white uppercase">Operational Jurisdictions</h2>
        <p class="text-xs text-cyan-400 uppercase tracking-widest font-semibold">Select an issue division to begin profiling your grievance</p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <div class="glass-panel p-5 rounded-xl border border-white/10 hover:border-cyan-400/50 transition group cursor-pointer">
            <div class="text-cyan-400 group-hover:scale-110 transition duration-300 text-2xl mb-3"><i class="fa-solid fa-faucet-drip"></i></div>
            <h4 class="text-base font-bold text-white">Water Supply</h4>
            <p class="text-xs text-gray-400 mt-1">Contamination, supply hours drop-out, main pipeline leakages.</p>
        </div>
        <div class="glass-panel p-5 rounded-xl border border-white/10 hover:border-yellow-400/50 transition group cursor-pointer">
            <div class="text-yellow-400 group-hover:scale-110 transition duration-300 text-2xl mb-3"><i class="fa-solid fa-droplet-slash"></i></div>
            <h4 class="text-base font-bold text-white">Sewerage Management</h4>
            <p class="text-xs text-gray-400 mt-1">Gutter overflows, main structural drainage blockages.</p>
        </div>
        <div class="glass-panel p-5 rounded-xl border border-white/10 hover:border-amber-500/50 transition group cursor-pointer">
            <div class="text-amber-500 group-hover:scale-110 transition duration-300 text-2xl mb-3"><i class="fa-solid fa-fire"></i></div>
            <h4 class="text-base font-bold text-white">Sui Gas Division</h4>
            <p class="text-xs text-gray-400 mt-1">Low pressure profiles, main supply pipeline punctures.</p>
        </div>
        <div class="glass-panel p-5 rounded-xl border border-white/10 hover:border-red-400/50 transition group cursor-pointer">
            <div class="text-red-400 group-hover:scale-110 transition duration-300 text-2xl mb-3"><i class="fa-solid fa-road"></i></div>
            <h4 class="text-base font-bold text-white">Roads Infrastructure</h4>
            <p class="text-xs text-gray-400 mt-1">Pothole profiles, broken structural pavements, road layout fixes.</p>
        </div>
    </div>
</div>

<!-- ================= 5. NEW: LATEST PUBLIC COMPLAINTS RECENT FEED ================= -->
<div class="my-16 glass-panel p-6 rounded-2xl border border-white/10">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h2 class="text-xl md:text-2xl font-bold text-white">Public Transparency Board</h2>
            <p class="text-xs text-gray-400">Recently filed community tickets and their current operational workflow phase.</p>
        </div>
        <span class="text-xs bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 px-3 py-1 rounded-full mt-2 md:mt-0">
            Updates every 5 minutes
        </span>
    </div>

    <!-- Live Tickets Stack -->
    <div class="space-y-3">
        <!-- Ticket 1 -->
        <div class="bg-black/20 border border-white/5 p-4 rounded-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <span class="text-xs font-mono font-bold text-cyan-400">#CFP-9842</span>
                    <span class="text-[10px] bg-white/5 text-gray-300 px-2 py-0.5 rounded-md">Garbage</span>
                </div>
                <h4 class="text-sm font-semibold text-white">Commercial Dump Accumulation near Market Square</h4>
                <p class="text-xs text-gray-400"><i class="fa-solid fa-location-dot mr-1 text-red-400"></i> Sector G-3, Near Al-Makkah Plaza</p>
            </div>
            <span class="text-xs font-semibold bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 px-3 py-1 rounded-lg shrink-0">
                <i class="fa-solid fa-spinner animate-spin mr-1.5"></i> In Progress
            </span>
        </div>

        <!-- Ticket 2 -->
        <div class="bg-black/20 border border-white/5 p-4 rounded-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <span class="text-xs font-mono font-bold text-cyan-400">#CFP-9839</span>
                    <span class="text-[10px] bg-white/5 text-gray-300 px-2 py-0.5 rounded-md">Electricity</span>
                </div>
                <h4 class="text-sm font-semibold text-white">Main Transformer Sparking Fault</h4>
                <p class="text-xs text-gray-400"><i class="fa-solid fa-location-dot mr-1 text-red-400"></i> Street 4, VIP Block Residential Area</p>
            </div>
            <span class="text-xs font-semibold bg-red-500/10 text-red-400 border border-red-500/20 px-3 py-1 rounded-lg shrink-0">
                <i class="fa-solid fa-clock mr-1.5"></i> Pending Review
            </span>
        </div>

        <!-- Ticket 3 -->
        <div class="bg-black/20 border border-white/5 p-4 rounded-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <span class="text-xs font-mono font-bold text-cyan-400">#CFP-9712</span>
                    <span class="text-[10px] bg-white/5 text-gray-300 px-2 py-0.5 rounded-md">Water Supply</span>
                </div>
                <h4 class="text-sm font-semibold text-white">Main Pipeline Rupture and Massive Flooding</h4>
                <p class="text-xs text-gray-400"><i class="fa-solid fa-location-dot mr-1 text-red-400"></i> Main Service Road, Phase 2</p>
            </div>
            <span class="text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-3 py-1 rounded-lg shrink-0">
                <i class="fa-solid fa-circle-check mr-1.5"></i> Resolved
            </span>
        </div>
    </div>
</div>

<!-- ================= 6. NEW: CITY ANNOUNCEMENTS & MAINTENANCE NOTICES ================= -->
<div class="my-16 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="md:col-span-2 glass-panel p-6 rounded-2xl border border-white/10 space-y-4">
        <h2 class="text-xl font-bold text-white"><i class="fa-solid fa-bullhorn text-amber-400 mr-2"></i>Municipal Alerts & Maintenance Grid</h2>
        <div class="space-y-4">
            <div class="border-l-2 border-cyan-400 pl-4 py-1">
                <span class="text-[10px] text-cyan-400 font-mono font-bold">MAY 25, 2026</span>
                <h4 class="text-sm font-bold text-white">Scheduled Water Treatment Optimization</h4>
                <p class="text-xs text-gray-400 mt-0.5">Water line supply pressures will be temporary dialled down by 30% across Sector F and G zones for filtration matrix flushing operations.</p>
            </div>
            <div class="border-l-2 border-purple-400 pl-4 py-1">
                <span class="text-[10px] text-purple-400 font-mono font-bold">MAY 28, 2026</span>
                <h4 class="text-sm font-bold text-white">Smart Street-Light LED Conversion Phase 3</h4>
                <p class="text-xs text-gray-400 mt-0.5">Civil development squads will replace old fixtures with heavy neon smart solar panels along the Central Avenue Ring Highway.</p>
            </div>
        </div>
    </div>
    
    <!-- Emergency Help Widget Box inside grid -->
    <div class="glass-panel p-6 rounded-2xl border border-white/10 bg-gradient-to-b from-purple-950/20 to-black/20 flex flex-col justify-between">
        <div class="space-y-2">
            <h3 class="text-md font-bold text-white"><i class="fa-solid fa-shield-halved text-purple-400 mr-2"></i>Citizen Escrow Integrity</h3>
            <p class="text-xs text-gray-400 leading-relaxed">
                All submitted complaints pass through a digital logging matrix. Data hashes shield user credentials from direct field teams to eliminate privacy friction.
            </p>
        </div>
        <div class="border-t border-white/5 pt-4 mt-4">
            <a href="login.php" class="text-xs text-cyan-400 hover:underline font-bold flex items-center justify-between">
                <span>View Data Security Standards</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- ================= 7. SYSTEM CORE FEATURES WORKFLOW ================= -->
<div class="my-16 py-8 border-t border-white/5" id="features">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="space-y-2">
            <div class="w-10 h-10 bg-cyan-500/10 border border-cyan-400/30 flex items-center justify-center text-cyan-400 rounded-xl font-bold">1</div>
            <h3 class="text-lg font-bold text-white">Digital Geotagged Profiling</h3>
            <p class="text-xs text-gray-400 leading-relaxed">Citizens file issues by providing precise regional descriptions and uploading photographic verification evidence straight from their screens.</p>
        </div>
        <div class="space-y-2">
            <div class="w-10 h-10 bg-purple-500/10 border border-purple-400/30 flex items-center justify-center text-purple-400 rounded-xl font-bold">2</div>
            <h3 class="text-lg font-bold text-white">Automated Department Routing</h3>
            <p class="text-xs text-gray-400 leading-relaxed">Our advanced central parsing matrix funnels incoming tickets instantly to assigned regional admin managers to clear out desk backlogs.</p>
        </div>
        <div class="space-y-2">
            <div class="w-10 h-10 bg-emerald-500/10 border border-emerald-400/30 flex items-center justify-center text-emerald-400 rounded-xl font-bold">3</div>
            <h3 class="text-lg font-bold text-white">Transparent Lifecycle Tracking</h3>
            <p class="text-xs text-gray-400 leading-relaxed">No black holes. Watch your ticket update via neon color metrics as it moves systematically from Pending to Resolved status flags.</p>
        </div>
    </div>
</div>

<!-- ================= 8. NEW: CITIZEN PLATFORM FAQ ACCORDION ================= -->
<div class="my-16 max-w-4xl mx-auto space-y-4">
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-white">Frequently Asked Questions</h2>
        <p class="text-xs text-gray-400">Everything you need to know about the CitiFix Pro governance network pipeline.</p>
    </div>

    <div class="glass-panel p-4 rounded-xl border border-white/5">
        <h4 class="text-sm font-semibold text-white flex items-center justify-between cursor-pointer">
            <span>What is the absolute maximum resolution window for structural complaints?</span>
            <i class="fa-solid fa-chevron-down text-xs text-cyan-400"></i>
        </h4>
        <p class="text-xs text-gray-400 mt-2 leading-relaxed">Standard category complaints are locked onto a strict 48-to-72 hour response matrix. Critical hazards like sparking transformers or major gas bursts are flagged high-priority for dispatch inside 6 hours.</p>
    </div>

    <div class="glass-panel p-4 rounded-xl border border-white/5">
        <h4 class="text-sm font-semibold text-white flex items-center justify-between cursor-pointer">
            <span>Can I file reports anonymously without generating user credentials?</span>
            <i class="fa-solid fa-chevron-down text-xs text-cyan-400"></i>
        </h4>
        <p class="text-xs text-gray-400 mt-2 leading-relaxed">To stop spam flooding and junk logs, you must register a certified email profile. However, your visual dashboard metrics can shield your personal identity details from field supervisors.</p>
    </div>
</div>

<?php
// Page ke bottom Footer layout ko include kar rahe hain
require_once 'includes/footer.php';
?>