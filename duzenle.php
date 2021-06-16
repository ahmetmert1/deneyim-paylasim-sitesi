<?php require_once 'controllers/authController.php';    ?>

<?php if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();

} ?>




<?php
$deneyim_baslik = "";
$deneyim_icerik = "";

if (isset($_GET['duzenle'])) {
    $deneyim_id = $_GET['duzenle'];



    $sql = "SELECT * FROM deneyim WHERE iddeneyim=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $deneyim_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $deneyimler = $result->fetch_assoc();

    $deneyim_baslik =  $deneyimler['urunadi'];
    $deneyim_icerik =  $deneyimler['deneyim'];

    
} 

if (isset($_POST['duzenlevekaydet-btn'])) {
    $deneyim_id_guncel = $_GET['duzenle'];

    $deneyim_baslik_guncel = $_POST['title'];
    $deneyim_icerik_guncel = $_POST['content'];   

    $sql = "UPDATE deneyim SET urunadi=? , deneyim=? WHERE iddeneyim=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi',$deneyim_baslik_guncel,$deneyim_icerik_guncel,$deneyim_id_guncel);
    if($stmt->execute()){
        header('location: profil.php');
        exit();
    }

    



}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body style="background-color: #FF6666;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="anasayfa.php">Ürün Yorumları</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item me-2">
                        <a class="nav-link active" name="profil-btn" href="profil.php" aria-current="page"><strong><?php echo $_SESSION['username'] ?></strong></a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-danger"  aria-current="page" style="color: black;" href="anasayfa.php?logout=1">Çıkış Yap</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-outline-success" name="deneyimekle-btn" href="deneyimekle.php" aria-current="page" style="color: black;">Deneyim Ekle</a>
                    </li>

                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Ürün Ara" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Git</button>
                </form> -->
            </div>
        </div>
    </nav>

    <div class="container mt-5" style="width: 34rem; border-radius: 5px">
        <form action="duzenle.php?duzenle=<?php echo $deneyim_id ?>" method="POST" class="form border-0">

            <ul>
                <li>
                    <label for="title">Ürün Adı</label>
                    <input style="font-weight: 100;" placeholder="Ürün adını giriniz" class="form-control border" required="" type="text" name="title" value='<?php echo $deneyim_baslik ?>'>
                </li>
                <br>
                <li>
                    <label for="content">Deneyiminiz</label>
                    <textarea style="font-weight: 100;" placeholder="Ürünle ilgili deneyiminizi giriniz." class="form-control" maxlength="1000" required=""  name="content" id="content" cols="60" rows="10"><?php echo $deneyim_icerik ?></textarea>
                </li>
                <div>
                    <button style="display: flex;" class="btn btn-primary mx-auto mt-2" name="duzenlevekaydet-btn" type="submit">Düzenlemeyi Bitir</button>
                </div>
            </ul>
        </form>
    </div>




</body>

</html>