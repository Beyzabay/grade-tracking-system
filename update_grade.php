<?php
require_once("baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $grade_id = $_POST['grade_id'];
    $exam1 = $_POST['exam1'];
    $exam2 = $_POST['exam2'];
    $exam3 = $_POST['exam3'];

    $update_query = "UPDATE grade_average SET exam1 = :exam1, exam2 = :exam2, exam3 = :exam3 WHERE grade_id = :grade_id";
    $statement = $baglanti->prepare($update_query);
    $statement->bindParam(':exam1', $exam1);
    $statement->bindParam(':exam2', $exam2);
    $statement->bindParam(':exam3', $exam3);
    $statement->bindParam(':grade_id', $grade_id);

    // Güncelleme sorgusunu çalıştırdık
    if ($statement->execute()) {
        echo '<script>alert("Notlar başarıyla güncellendi.");</script>';
        header("Location: index.php");
        exit();
    } else {
        echo '<script>alert("Notlar güncellenirken bir hata oluştu.");</script>';
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
