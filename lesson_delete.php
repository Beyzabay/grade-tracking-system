<?php
require_once("baglan.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lesson_id = $_POST['lessons_id'];

    $delete_query = $baglanti->prepare("DELETE FROM lessons WHERE lessons_id = ?");
    $delete_query->execute([$lesson_id]);

    header("Location: index.php");
    exit();
}
?>
