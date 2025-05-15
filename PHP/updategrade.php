<?php
require("../connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['StudentNumber'])) {
    $studentNumber = $_POST['StudentNumber'];
    $subjectCode = $_POST['SubjectCode'];
    $semester = $_POST['Semester'];
    $prelim = $_POST['Prelim'];
    $midterm = $_POST['Midterm'];
    $semiFinal = $_POST['SemiFinal'];
    $final = $_POST['Final'];

    // Optionally calculate GWA or Total here

    $stmt = $con->prepare("UPDATE grades SET StudentNumber=?, SubjectCode=?, Semester=?, Prelim=?, Midterm=?, SemiFinal=?, Final=? WHERE GradeID=?");
    $stmt->bind_param("ssssiiii", $studentNumber, $subjectCode, $semester, $prelim, $midterm, $semiFinal, $final, $gradeID);

    if ($stmt->execute()) {
        header("Location: ../Menu/grades.php?updated=1");
        exit;
    } else {
        echo "Error updating grade.";
    }
} else {
    echo "Invalid request.";
}
?>
