<?php
require("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sectionName = $_POST["sectionName"];

    $sql = "UPDATE sections SET SectionName = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $name, $SectionName, $email, $studentNumber);

    if ($stmt->execute()) {
        header("Location: ../Menu/students.php");
    } else {
        echo "Error updating student.";
    }
}
?>
