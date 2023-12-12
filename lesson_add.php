<?php
require_once("baglan.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lesson_name = $_POST['lesson_name'];

    $insert_query = $baglanti->prepare("INSERT INTO lessons (lesson_name) VALUES (?)");
    $insert_query->execute([$lesson_name]);

    header("Location: index.php");
    exit();
}
?>
