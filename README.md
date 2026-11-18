# 🏙️ SmartCityFix — Urban Citizen Grievance Portal

SmartCityFix is a full-stack web application designed to streamline urban issue reporting and municipal service management. Built with a responsive glassmorphism UI, secure PHP backend, and relational database architecture.

---

### 💻 Key Features & Architecture
* **User Grievance Reporting:** Allows citizens to log issues with categorization, location tagging, and status tracking.
* **Admin Dashboard:** Role-based access control (RBAC) for municipal officers to update ticket statuses and assign resolution teams.
* **Glassmorphism UI:** Modern translucent design crafted using standard CSS3 and HTML5.
* **Relational Database Design:** Structured MySQL database schema optimizing query execution for ticket tracking and user validation.

---

### 🛠️ Tech Stack
* **Frontend:** HTML5, CSS3 (Glassmorphism design), JavaScript
* **Backend:** PHP (Server-side logic & session handling)
* **Database:** MySQL (Relational Data Architecture)
* **Local Server:** XAMPP / Apache

---

### 🗄️ Database Schema & Setup
1. Import the database schema (`smartcityfix.sql`) into phpMyAdmin.
2. Configure database credentials in `config/config.php`:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db   = "smartcityfix";
