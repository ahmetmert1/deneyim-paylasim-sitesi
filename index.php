<?php require_once 'controllers/authController.php';    ?>

<?php if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();

} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="style.css">

    <title>Home</title>
</head>

<body style="background-color: #AC87F7;"> 


    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">

                <br>

                <div class="alert <?php echo $_SESSION['alert-class'] ;?>">
                    Başarıyla Giriş Yaptınız
                </div>

                <h3 style="color: white;">Hoşgeldin, <?php echo $_SESSION['username'] ;?></h3>

                <!-- <a href="login.php" class="logout" name="logout">Çıkış Yap</a> -->

                <div class="alert alert-warning">
                    
                    <?php echo $_SESSION['email'] ;?>
                </div>
                <a class="btn btn-block btn-lg btn-primary" href="anasayfa.php" name="" style="width: 100%;">Siteye Devam Et</a>
                <br>
                <br>
            </div>
        </div>
    </div>

</body>

</html>