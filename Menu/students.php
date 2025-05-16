<?php
require("../connect.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['username'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM students";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - Teacher Dashboard</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="../CSS/table.css">
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
                    <li><a href="../Menu/calendar.php"><img src="../logos/calendar.png"> <span>Calendar</span></a></li>
                    <li class="active"><a href="../Menu/students.php"><img src="../logos/graduation.png"><span>Students</span></a></li>
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

            <main class="table-main">
                <div class="table-container">
                    <?php if (isset($_GET['deleted'])): ?>
                        <div class="success-message">
                            <p style="color: green;">Student deleted successfully.</p>
                        </div>
                    <?php endif; ?>

                    <div class="table-header">
                        <button class="add-button" onclick="window.location.href='../PHP/createStudent.php';">
                            <i class="fas fa-plus"></i> New Student
                        </button>
                        <div class="search-container">
                            <label for="search">Search:</label>
                            <input type="text" id="search" class="search-input">
                        </div>
                    </div>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" id="select-all">
                                </th>
                                <th>Student Number</th>
                                <th>Name</th>
                                <th>Section</th>
                                <th>Subject Code</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><input type="checkbox"></td>
                                    <td><?= ($row['StudentNumber']) ?></td>
                                    <td><?= ($row['StudentName']) ?></td>
                                    <td><?= ($row['SectionName']) ?></td>
                                    <td><?= ($row['SubjectCode']) ?></td>
                                    <td><?= ($row['Email']) ?></td>
                                    <td class="actions-column">
                                        <a href="../PHP/editstudent.php?id=<?= $row['StudentNumber'] ?>" class="edit-button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="../PHP/deletestudent.php?id=<?= $row['StudentNumber'] ?>" 
                                        class="delete-button" 
                                        onclick="return confirm('Are you sure you want to delete this student?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                            </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="7">No students were found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="../JS/script.js"></script>
    <script src="../JS/table.js"></script>
</body>
</html>


