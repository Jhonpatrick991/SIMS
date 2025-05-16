<?php
require('connect.php');
if (!isset($_SESSION['loggedin']) && $_SESSION['username'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$studentCount = $con->query("SELECT COUNT(*) FROM students")->fetch_row()[0];
$sectionCount = $con->query("SELECT COUNT(*) FROM sections")->fetch_row()[0];
$subjectCount = $con->query("SELECT COUNT(*) FROM subjects")->fetch_row()[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="logos/489702363_1172852834851590_9016514146118271067_n-removebg-preview 3.png" type="image/png">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <div class="logo-circle">
                    <img src="logos/489702363_1172852834851590_9016514146118271067_n-removebg-preview 3.png" alt="Logo">
                </div>
                <span class="logo-text">Dashboard</span>
            </div>
            <nav>
                <ul>
                    <li class="active"><a href="index.php"><img src="logos/table.png"> <span>Dashboard</span></a></li>
                    <li><a href="Menu/calendar.php"><img src="logos/calendar.png"> <span>Calendar</span></a></li>
                    <li><a href="Menu/students.php"><img src="logos/graduation.png"><span>Students</span></a></li>
                    <li><a href="Menu/sections.php"><img src="logos/multiple-users-silhouette 1.png"><span>Sections</span></a></li>
                    <li><a href="Menu/subjects.php"><img src="logos/stack 1.png"><span>Subjects</span></a></li>
                    <li><a href="Menu/grades.php"><img src="logos/exam@2x.png"><span>Grades</span></a></li>
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
                        <button onclick="window.location.href='logout.php'">Logout</button>
                    </div>
                </div>
                <div class="clock" id="liveClock"></div>
            </header>

            <main>
                <div class="stats-row">
                    <div class="stat-card red">
                        <div class="stat-value"><?= $studentCount ?></div>
                        <div class="stat-title">Total Students</div>
                        <div class="more-info">
                            <span>More info</span>
                            <i class="fas fa-circle-info"></i>
                        </div>
                    </div>

                    <div class="stat-card purple">
                        <div class="stat-value"><?= $sectionCount ?></div>
                        <div class="stat-title">Registered Sections</div>
                        <div class="more-info">
                            <span>More info</span>
                            <i class="fas fa-circle-info"></i>
                        </div>
                    </div>

                    <div class="stat-card gold">
                        <div class="stat-value"><?= $subjectCount ?></div>
                        <div class="stat-title">Ongoing Subjects</div>
                        <div class="more-info">
                            <span>More info</span>
                            <i class="fas fa-circle-info"></i>
                        </div>
                    </div>
                </div>

                <!-- <div class="class-cards">
                    <div class="class-card">
                        <div class="class-header blue">
                            <div class="class-code">WS101</div>
                            <div class="class-dept">CSA</div>
                        </div>
                        <div class="class-schedule">
                            <div>Monday - 7:30am to 10:30am</div>
                            <div>Saturday - 7:30am to 10:30am</div>
                        </div>
                    </div>

                    <div class="class-card">
                        <div class="class-header purple">
                            <div class="class-code">WS101</div>
                            <div class="class-dept">CSA</div>
                        </div>
                        <div class="class-schedule">
                            <div>Monday - 7:30am to 10:30am</div>
                            <div>Saturday - 7:30am to 10:30am</div>
                        </div>
                    </div>

                    <div class="class-card">
                        <div class="class-header green">
                            <div class="class-code">WS101</div>
                            <div class="class-dept">CSA</div>
                        </div>
                        <div class="class-schedule">
                            <div>Monday - 7:30am to 10:30am</div>
                            <div>Saturday - 7:30am to 10:30am</div>
                        </div>
                    </div>

                    <div class="class-card">
                        <div class="class-header red">
                            <div class="class-code">WS101</div>
                            <div class="class-dept">CSA</div>
                        </div>
                        <div class="class-schedule">
                            <div>Monday - 7:30am to 10:30am</div>
                        </div>
                    </div>

                    <div class="class-card">
                        <div class="class-header teal">
                            <div class="class-code">WS101</div>
                            <div class="class-dept">CSA</div>
                        </div>
                        <div class="class-schedule">
                            <div>Monday - 7:30am to 10:30am</div>
                        </div>
                    </div>

                    <div class="class-card">
                        <div class="class-header gold">
                            <div class="class-code">WS101</div>
                            <div class="class-dept">CSA</div>
                        </div>
                        <div class="class-schedule">
                            <div>Monday - 7:30am to 10:30am</div>
                        </div>
                    </div>
                </div> -->
            </main>
        </div>
    </div>

    <script src="JS/script.js"></script>
</body>
</html>