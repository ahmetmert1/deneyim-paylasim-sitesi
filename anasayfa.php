<?php require_once 'controllers/authController.php';    ?>

<?php if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();

} ?>


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
    <title>Ana Sayfa</title>
</head>

<body style="background-color: #FF6666;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Ürün Yorumları</a>
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

    <?php $sql = "SELECT * FROM deneyim";
    
    

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $result = $stmt->get_result(); ?>

    <?php while($row = $result->fetch_assoc()):?>
        <br>
        <div class="card text-black bg-light mb-5 mx-auto" role="alert" style="max-width: 47rem;">
            <div class="card-header"><span style="font-size:25px"><?php echo $row['urunadi'] ?></span></div>
            <div class="card-body">
                
                <p class="card-text"><?php echo $row['deneyim'] ?></p>
                 
                <!-- <a href="" class="btn btn-light"><i class="bi bi-pencil-square"></i> Düzenle</a>
                <a onclick="" href="" class="btn btn-light"><i class="bi bi-trash"></i> Sil</a>
                 -->
                
            </div>
        </div>
    

    <?php endwhile; ?>


</body>

</html>