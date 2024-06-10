<?php
include 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logbook Registry System</title>
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>
    <div class="container">
        <header class = "menu">
        <div class="logo"><span>RCA- </span><span>lb</span></div>
        <ul class="nav">
                <li class="nav-item"><a href="#about">About</a></li>
                <li class="nav-item"><a href="#service">Service</a></li>
                <li class="nav-item"><a href="login.php">Login</a></li>
            </ul>
        </header>

        
        <main>

            <section class="intro">
            <h2>Welcome to the RCA Logbook Registry System</h2>
                <p>Our online system allows RCA students to record their activities and help them to work on them within time. No more paper-based recording as now students can record their activities digitally<br>it's very simple click the button below and get started.
 </p>               <a href="register.php" class="cta">Get Started</a>
            </section>
            <section class="features">
                <h2>Features</h2>
                <div class="feature">
                    <h3>User Management</h3>
                    <p>Authentication and authorisation where there students information may be confidential and secure.</p>
                </div>
                <div class="feature">
                    <h3>Creating records</h3>
                    <p>User-friendly and easy to use interface to record their daily actions.</p>
                </div>
                <div class="feature">
                    <h3>Listing Activities</h3>
                    <p>Make an assesment of how activities are being perfomed out.</p>
                </div>
            </section>
        </main>
        <footer>
            <p>&copy; 2024 RCA Logbook Registry System. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
