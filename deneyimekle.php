<?php require_once 'controllers/authController.php';    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function calisti() {

            alert("Deneyiminiz Başarıyla eklenmiştir. !");
        }
    </script>
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
    <title>Deneyim Ekle</title>
</head>

<body style="background-color: #6FE9C0;">
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
                        <a class="btn btn-outline-danger" aria-current="page" style="color: black;" href="deneyimekle.php?logout=1">Çıkış Yap</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="deneyimekle.php" aria-current="page" style="color: black;">Deneyim Ekle</a>
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
        <form action="" method="POST" class="form border-0">

            <ul>
                <li>
                    <label for="title">Ürün Adı</label>
                    <input style="font-weight: 100;" placeholder="Ürün adını giriniz" class="form-control border" required="" type="text" name="title" value="">
                </li>
                <br>
                <li>
                    <label for="content">Deneyiminiz</label>
                    <textarea style="font-weight: 100;" placeholder="Ürünle ilgili deneyiminizi giriniz." class="form-control" maxlength="1000" required="" value="" name="content" id="content" cols="60" rows="10"></textarea>
                </li>
                <div>
                    <button style="display: flex;" onclick="calisti()" class="btn btn-primary mx-auto mt-2" name="deneyimekle-btn" type="submit">PAYLAŞ</button>
                </div>
            </ul>
        </form>
    </div>
</body>

</html>