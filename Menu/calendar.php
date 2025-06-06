<?php
require("../connect.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['username'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar - Teacher Dashboard</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="../CSS/calendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../logos/489702363_1172852834851590_9016514146118271067_n-removebg-preview 3.png" type="image/png">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <div class="logo-circle">
                    <img src="../logos/489702363_1172852834851590_9016514146118271067_n-removebg-preview 3.png" alt="Logo">
                </div>
                <span class="logo-text">Dashboard</span>
            </div>
            <nav>
                <ul>
                    <li><a href="../index.php"><img src="../logos/table.png"> <span>Dashboard</span></a></li>
                    <li class="active"><a href="../Menu/calendar.php"><img src="../logos/calendar.png"> <span>Calendar</span></a></li>
                    <li><a href="../Menu/students.php"><img src="../logos/graduation.png"><span>Students</span></a></li>
                    <li><a href="../Menu/sections.php"><img src="../logos/multiple-users-silhouette 1.png"><span>Sections</span></a></li>
                    <li><a href="../Menu/subjects.php"><img src="../logos/stack 1.png"><span>Subjects</span></a></li>
                    <li><a href="../Menu/grades.php"><img src="../logos/exam@2x.png"><span>Grades</span></a></li>
                </ul>
            </nav>
        </div>

        <div class="main-content">
            <header>
                <div class="user-info">
                    <span>Teacher A</span>
                    <div class="avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="dropdownContent blue">
                        <div class="dropdown_Avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h1>Teacher A</h1> 
                        <p>Joined on 2000 B.C.</p>
                        <button onclick="window.location.href='../logout.php'">Logout</button>
                    </div>
                </div>
                <div class="clock" id="liveClock"></div>
            </header>

            <main class="calendar-main">
                <div class="weekly-calendar" id="weeklyCalendar"></div>

                <div class="monthly-calendars">
                    <div class="calendar-slider">
                        <div class="monthly-calendar">
                            <div class="month-header">
                                <h3 id="month1Title"></h3>
                            </div>
                            <table class="month-table">
                                <thead>
                                    <tr>
                                        <th>Mo</th>
                                        <th>Tu</th>
                                        <th>We</th>
                                        <th>Th</th>
                                        <th>Fr</th>
                                        <th>Sa</th>
                                        <th>Su</th>
                                    </tr>
                                </thead>
                                <tbody id="month1Body"></tbody>
                            </table>
                        </div>

                        <div class="monthly-calendar">
                            <div class="month-header">
                                <h3 id="month2Title"></h3>
                            </div>
                            <table class="month-table">
                                <thead>
                                    <tr>
                                        <th>Mo</th>
                                        <th>Tu</th>
                                        <th>We</th>
                                        <th>Th</th>
                                        <th>Fr</th>
                                        <th>Sa</th>
                                        <th>Su</th>
                                    </tr>
                                </thead>
                                <tbody id="month2Body"></tbody>
                            </table>
                        </div>

                        <div class="monthly-calendar">
                            <div class="month-header">
                                <h3 id="month3Title"></h3>
                            </div>
                            <table class="month-table">
                                <thead>
                                    <tr>
                                        <th>Mo</th>
                                        <th>Tu</th>
                                        <th>We</th>
                                        <th>Th</th>
                                        <th>Fr</th>
                                        <th>Sa</th>
                                        <th>Su</th>
                                    </tr>
                                </thead>
                                <tbody id="month3Body"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="../JS/calendar.js"></script>
    <script src="../JS/table.js"></script>
</body>
</html>
