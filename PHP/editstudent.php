<?php
require("../connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE StudentNumber = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if (!$student) {
        echo "Student not found.";
        exit;
    }
} else {
    echo "No student ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="../CSS/another.css">
</head>
<body>
    <h2>Edit Student</h2>
    <form action="updatestudent.php" method="POST">
        <input type="hidden" name="StudentNumber" value="<?= $student['StudentNumber'] ?>">
        
        <label>Name:</label>
        <input type="text" name="StudentName" value="<?= $student['StudentName'] ?>" required><br>

        <label>SectionName:</label>
        <input type="text" name="SectionName" value="<?= $student['SectionName'] ?>" required><br>

        <label>Email:</label>
        <input type="email" name="Email" value="<?= $student['Email'] ?>" required><br>

        <button type="submit">Update</button>
        <a href="../Menu/students.php">Cancel</a>
    </form>
</body>
</html>
