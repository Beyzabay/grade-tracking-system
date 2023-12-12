<?php
require_once("baglan.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
  // user-info için sorgu başladı
  $kullanicisor=$baglanti->prepare("SELECT * FROM `student-info`");
  $kullanicisor->execute(array(
    ));
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
  // user-info için sorgu bitti

  // ders için sorgu başladı
  $derssor = $baglanti->prepare("SELECT * FROM `lessons`");
  $derssor->execute();
  $derscek = $derssor->fetchAll(PDO::FETCH_ASSOC);
  // ders için sorgu bitti


  ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="p-4">
                Anasayfa > Öğrenci Detay
            </div>
            
            <!-- <form action="islem.php" method="POST"> -->
            <div class="col-md-2">
                <div class="student-image">
                    <img src="image/student-img.jpg" alt="student-image" class="st-image img-fluid">
                </div>
                <div class="student-information">
                <?php
                $connection = mysqli_connect("localhost","root","");
                $baglanti = mysqli_select_db($connection, 'student-grade');

                $query = "SELECT * FROM `student-info`";
                $query_run = mysqli_query($connection, $query);
                ?>
                    <ul>
                    <?php
                    if($query_run)
                    {
                    foreach($query_run as $row)
                    {
                    ?>
                        <li>
                        <?php echo $row['user_name']; ?>
                        </li>
                        <li>
                        <?php echo $row['student_id']; ?>
                        </li>
                        <li>
                        <?php echo $row['city']; ?>
                        </li>
                        <?php           
                         }
                            }
                          else 
                            {
                          echo "No Record Found";
                            }
                            ?>
                         <?php                                           
                        try {
                                $baglanti = new PDO("mysql:host=localhost;dbname=student-grade;charset=utf8","root");
                                $baglanti->exec("SET NAMES utf8");
                                $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                                $sorgu = $baglanti->prepare("SELECT * FROM `student-info`");
                                $sorgu->execute();
                                
                            } catch (PDOException $e) {
                            die($e->getMessage());
                        }
                        ?>                         
                        </li>
                        <button class="editbtn btn btn-primary" type="button" data-bs-toggle='modal' data-bs-target='#kullanici_guncelle'>Güncelle</button>
                    </ul>
                </div>
            </div> 
            <?php $query=$baglanti->query("SELECT * FROM `student-info`", PDO::FETCH_ASSOC);
                                                    foreach($query as $student)
                                                    {
                                                   ?>
            <!-- Kullanıcı güncelleme başladı -->
            <div class="modal fade text-left"  tabindex="-1" role="dialog" aria-labelledby="duyurular-modal-label" style="display: none;" aria-hidden="true" id="kullanici_guncelle"> 
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="duyurular-modal-label">Kullanıcı Güncelle</h4>
                        <button type="button" class="close dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="kullanicigüncelle.php" method="POST" class="form-horizontal">
                    <input type="hidden" name="student_id" id="student_id">
                        <label for="announcement-header">Ad Soyad </label>
                        <fieldset class="form-group position-relative has-icon-left border-light rounded">
                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Ad Soyad" value="<?php echo $row['user_name'];?>">
                            <div class="form-control-position">
                                <i class="la la-user"></i>
                            </div>
                        </fieldset>
                        <label for="announcement-header">City </label>
                        <fieldset class="form-group position-relative has-icon-left border-light rounded">
                            <input type="text" class="form-control" name="city" id="city" placeholder="city" value="<?php echo $row['city'];?>">
                            <div class="form-control-position">
                                <i class="la la-user"></i>
                            </div>
                        </fieldset>
                        <label for="announcement-header">ID </label>
                        <fieldset class="form-group position-relative has-icon-left border-light rounded">
                            <input type="text" class="form-control" name="student_id" id="student_id" placeholder="ID" value="<?php echo $row['student_id'];?>">
                            <div class="form-control-position">
                                <i class="la la-user"></i>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn border-danger bg-white danger waves-effect waves-light" data-dismiss="modal">İptal</button>
                            <button type="submit" name="kullaniciguncelle" class="btn border-success bg-success white waves-effect waves-light">Güncelle</button>                                                             
                            </div>
                        </fieldset>
                        </form>
                    </div>
                </div>
                </div>
                </div>
                <?php 
                }
                ?> 
            <!-- Kullanıcı güncelleme bitti -->
            <?php
        foreach ($derscek as $row) {
        ?>
            <!-- Ders Ekleme başladı -->
            <div class="modal fade text-left"  tabindex="-1" role="dialog" aria-labelledby="update-lesson" style="display: none;" aria-hidden="true" id="dersGuncelle"> 
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="update-lesson">Dersleri Güncelle</h4>
                        <button type="button" class="close dark" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="lesson_add.php" method="POST">
                    <div class="form-group">
                        <label for="lesson_name">Ders Adı </label>
                        <input type="text" class="form-control not" name="lesson_name">
                        <button class="m-1 btn btn-primary" type="submit">Ders Ekle</button>
                    </div>
                    </form>

                    <?php
                    // lessons için sorgu başlatma
                    $derssor = $baglanti->prepare("SELECT * FROM `lessons`");
                    $derssor->execute();
                    $derscek = $derssor->fetchAll(PDO::FETCH_ASSOC);
                    // lessons için sorgu bitirme
                    ?>
                    <!-- Ders listesi -->
                    <?php foreach ($derscek as $row) : ?>
                            <li class="justify-content-center">
                                <?php echo $row['lesson_name']; ?>
                                <form action="lesson_delete.php" method="POST">
                                    <input type="hidden" name="lessons_id" value="<?php echo $row['lessons_id']; ?>">
                                    <button class="m-1 btn btn-danger" type="submit"> Dersi Sil </button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </div>
                </div>
                </div>
                </div>
                <?php 
                }
                ?> 
            <div class="col-md-3">
                <div class="lessons">
                   <div class="p-tag-lesson">
                   <table id="customers">
                    <tr>
                        <th>Öğrencinin Dersleri</th>
                    </tr>
                     <?php foreach ($derscek as $row) : ?>
                    <tr>
                        <td><?php echo $row['lesson_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </table>
                   </div>
                   <button class="editbtn btn btn-success m-1" type="button" data-bs-toggle='modal' data-bs-target='#dersGuncelle'> Ders Güncelle</button>
                </div>
            </div>
        <!-- Modal içeriği -->
<div class="modal fade" tabindex="-1" role="dialog" id="notGuncelleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni not ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="grade_add.php" method="POST">
            <div class="form-group">
                <label for="lessonName">Ders Adı </label>
                <input type="text" class="form-control not" name="lessonName">
                <button class="m-1 btn btn-primary" type="submit">Ders Ekle</button>
            </div>
                    <?php
            // ortalama için sorgu başlatma
            $derssor = $baglanti->prepare("SELECT * FROM `grade_average`");
            $derssor->execute();
            $derscek = $derssor->fetchAll(PDO::FETCH_ASSOC);
            // ortalama için sorgu bitirme
            ?>
                <div class="form-group">
                    <label for="exam1">1. Sınav Notu:</label>
                    <input type="number" class="form-control not" name="exam1" required>
                </div>
                <div class="form-group">
                    <label for="exam2">2. Sınav Notu:</label>
                    <input type="number" class="form-control not" name="exam2" required>
                </div>
                <div class="form-group">
                    <label for="exam3">3. Sınav Notu:</label>
                    <input type="number" class="form-control not" name="exam3" required>
                </div>
                <button type="submit" class="btn btn-primary" id="notGuncelleButton">Yeni not ekle</button>
            </form>
                <p>Not Ortalaması: <span id="ortalama">0</span></p>
            </div>
        </div>
    </div>
</div>
            <div class="col-md-6">
                <div class="lessons">
                   <div class="p-tag-lesson">
                   <table id="customers">
                    <tr>
                        <th>Ders Adı</th>
                        <th>1.Sınav</th>
                        <th>2.Sınav</th>
                        <th>3.Sınav</th>
                        <th>Not Ortalaması</th>

                    </tr>
                     <?php foreach ($derscek as $row) : ?>
                    <tr>
                        <td><?php echo $row['lessonName']; ?></td>
                        <td><?php echo $row['exam1']; ?></td>
                        <td><?php echo $row['exam2']; ?></td>
                        <td><?php echo $row['exam3']; ?></td>
                        <td class="notOrtalamasi"><?php echo $row['average']; ?></td>

                    </tr>
                    <?php endforeach; ?>
                    </table>
                   </div>
                   <button class="editbtn btn btn-primary" type="button" data-bs-toggle='modal' data-bs-target='#notGuncelleModal'> Yeni Not Ekle </button>
                   <button class="editbtn m-2 btn btn-primary" type="button" data-bs-toggle='modal' data-bs-target="#updateModal"> Not Güncelle</button>
                </div>
            </div>
<!-- NOT ORTALAMASİ BİTTİ --> 
<!-- Ders Ekleme bitti -->
<!-- Ders notu güncelleme başladı -->
<!-- Güncelleme Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Notları Güncelle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ders Adı</th>
                            <th>1. Sınav</th>
                            <th>2. Sınav</th>
                            <th>3. Sınav</th>
                            <th>Not Ortalaması</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($derscek as $row) : ?>
                            <tr>
                                <td><?php echo $row['lessonName']; ?></td>
                                <td><?php echo $row['exam1']; ?></td>
                                <td><?php echo $row['exam2']; ?></td>
                                <td><?php echo $row['exam3']; ?></td>
                                <td class="notOrtalamasi"><?php echo $row['average']; ?></td>
                                <td>
                                <button class="btn btn-sm btn-primary edit-btn" 
                            data-grade-id="<?php echo $row['grade_id']; ?>"
                            data-exam1="<?php echo $row['exam1']; ?>"
                            data-exam2="<?php echo $row['exam2']; ?>"
                            data-exam3="<?php echo $row['exam3']; ?>"
                            data-bs-toggle="modal" data-bs-target="#updateGradeModal">
                        Düzenle
                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updateGradeModal" tabindex="-1" role="dialog" aria-labelledby="updateGradeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal İçeriği -->
            <div class="modal-header">
                <h5 class="modal-title" id="updateGradeModalLabel">Notları Güncelle iç içe modal </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_grade.php" method="POST">
                    <input type="hidden" name="grade_id" value="<?php echo $row['grade_id']; ?>">
                    <div class="form-group">
                        <label for="exam1">1. Sınav Notu:</label>
                        <input type="number" class="form-control" name="exam1" value="<?php echo $row['exam1']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exam2">2. Sınav Notu:</label>
                        <input type="number" class="form-control" name="exam2" value="<?php echo $row['exam2']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exam3">3. Sınav Notu:</label>
                        <input type="number" class="form-control" name="exam3" value="<?php echo $row['exam3']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Ders notu güncelleme bitti -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('.edit-btn').on('click', function() {
        var lessonName = $(this).closest('tr').find('td:nth-child(1)').text();
        var exam1 = $(this).closest('tr').find('td:nth-child(2)').text();
        var exam2 = $(this).closest('tr').find('td:nth-child(3)').text();
        var exam3 = $(this).closest('tr').find('td:nth-child(4)').text();
        // Bu değerleri iç içe modaldaki form elemanlarına yerleştirdik
        $('#lessonName').val(lessonName);
        $('#exam1').val(exam1);
        $('#exam2').val(exam2);
        $('#exam3').val(exam3);
    });
});

</script>
<script>
    $(document).ready(function() {
        $('.not').on('input', function() {
        // Notları al
        var exam1 = parseFloat($("input[name='exam1']").val()) || 0;
        var exam2 = parseFloat($("input[name='exam2']").val()) || 0;
        var exam3 = parseFloat($("input[name='exam3']").val()) || 0;

        // Ortalamayı hesapla
        var average = (exam1 + exam2 + exam3) / 3;
        $('#ortalama').text(average.toFixed(2));
    });
        // Notları güncelle butonuna tıklandığında
    $('#notGuncelleButton').on('click', function() {
        var exam1 = parseFloat($("input[name='exam1']").val()) || 0;
        var exam2 = parseFloat($("input[name='exam2']").val()) || 0;
        var exam3 = parseFloat($("input[name='exam3']").val()) || 0;

        // Ortalamayı hesapla
        var average = (exam1 + exam2 + exam3) / 3;
        $('#ortalama').text(average.toFixed(2));

        // Tabloya ekle
        $(this).closest('tr').find('.notOrtalamasi').text(average.toFixed(2));
            // Modalı kapat
            $('#notGuncelleModal').modal('hide');
        });
    });
</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('.editbtn').on('click', function () {
        $('#editmodal').modal('show');

        $tr = $(this).closest('ul');

        var data = $tr.children("li").map(function () {
            return $(this).text().trim(); // Her öğeyi trim() ile işleyerek boşlukları temizledik
        }).get();

        console.log(data);
        $('#user_name').val(data[0]);
        $('#student_id').val(data[1]);
        $('#city').val(data[2]);
    });
});
    </script>
    <script src="function.js"></script>
    </html>