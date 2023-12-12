<?php
require_once("baglan.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lessonName = $_POST['lessonName'];
    $exam1 = $_POST['exam1'];
    $exam2 = $_POST['exam2'];
    $exam3 = $_POST['exam3'];
    $average = ($exam1 + $exam2 + $exam3) / 3;

    try {
        $insert_query = $baglanti->prepare("INSERT INTO grade_average (lessonName, exam1, exam2, exam3, average) VALUES (?, ?, ?, ?, ?)");
        $insert_query->execute([$lessonName, $exam1, $exam2, $exam3, $average]);

        header("Location: index.php");
        exit();
    } catch(PDOException $e) {
        echo "Ekleme hatası: " . $e->getMessage();
    }
}

?>
