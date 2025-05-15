<?php
require("../connect.php");

if (isset($_GET['id'])) {
    $studentNumber = $_GET['id'];

    $sql = "DELETE FROM students WHERE StudentNumber = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $studentNumber);

    if ($stmt->execute()) {
        header("Location: ../Menu/students.php?deleted=1");
        exit;
    } else {
        echo "Error deleting student.";
    }
} else {
    echo "No student ID provided.";
}
?>
