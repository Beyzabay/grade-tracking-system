<?php
var_dump($_POST);
$connection = mysqli_connect("localhost", "root", "", "student-grade");

if (!$connection) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

if(isset($_POST['kullaniciguncelle'])) {   
    $user_name = $_POST['user_name'];
    $city = $_POST['city'];
    $id = $_POST['student_id'];

    $query = "UPDATE `student-info` SET user_name='$user_name', city='$city' WHERE student_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Updated"); </script>';
        header("Location: index.php");
        exit;
    } else {
        echo '<script> alert("Data Not Updated: ' . mysqli_error($connection) . '"); </script>';
    }
}
