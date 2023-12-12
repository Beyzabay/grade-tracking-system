<?php 
try{
    $baglanti=new PDO("mysql:host=localhost;dbname=student-grade;charset=utf8","root");
    // echo "bağlantı başarılı";
}
catch(PDOException $e) {
    echo $e -> getMessage();
}

?>