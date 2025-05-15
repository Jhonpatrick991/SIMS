<?php
require("../connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['StudentNumber'])) {
    $StudentNumber = $_POST['StudentNumber'];

    $stmt = $con->prepare("DELETE FROM grades WHERE StudentNumber = ?");
    $stmt->bind_param("i", $gradeID);

    if ($stmt->execute()) {
        header("Location: ../Menu/grades.php?deleted=1");
        exit;
    } else {
        echo "Error deleting grade.";
    }
} else {
    echo "Invalid request.";
}
?>
